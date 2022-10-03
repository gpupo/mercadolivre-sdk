<?php

declare(strict_types=1);

/*
 * This file is part of gpupo/mercadolivre-sdk created by Gilmar Pupo <contact@gpupo.com>
 * For the information of copyright and license you should read the file LICENSE which is
 * distributed with this source code. For more information, see <https://opensource.gpupo.com/>
 */

namespace Gpupo\MercadolivreSdk\Entity\Order;

use Gpupo\CommonSdk\Entity\EntityInterface;
use Gpupo\CommonSdk\Response;
use Gpupo\CommonSdk\Traits\LoadTrait;
use Gpupo\CommonSdk\Traits\TranslatorManagerTrait;
use Gpupo\MercadolivreSdk\Entity\AbstractManager;

final class Manager extends AbstractManager
{
    use LoadTrait;
    use TranslatorManagerTrait;

    protected $entity = 'Order';

    /**
     * @codeCoverageIgnore
     */
    protected function setUp()
    {
        $this->maps = $this->loadArrayFromFile(__DIR__.'/map/restful.map.php');
    }

    public function factoryDecorator(Order $order, $decoratorName)
    {
        $className = __NAMESPACE__.'\\Decorator\\'.$decoratorName;
        $instance = new $className();
        $instance->setOrder($order);

        return $instance;
    }

    /**
     * {@inheritdoc}
     */
    public function update(EntityInterface $entity, EntityInterface $existent = null)
    {
        parent::update($entity, $existent);

        $factory204 = function ($message) {
            return new Response([
                'raw' => '{"message":"'.$message.'"}',
                'httpStatusCode' => 204,
            ]);
        };

        $order = $this->findById($entity->getId());
        $status = mb_strtolower($entity->getOrderStatus());

        if ('handling' === $order['shipping']['status'] && 'processing' === $status) {
            return $factory204('Order status not changed!');
        }

        if (\in_array($status, ['processing', 'canceled', 'shipped'], true)) {
            $decorator = $this->factoryDecorator($entity, 'Status\\'.ucfirst($status));
            $decorator->setOriginalOrder($order);

            $json = $decorator->toJson();

            $mapKey = 'to'.ucfirst($status);
            $map = $this->factoryMap($mapKey, [
                'shipmentId' => $order->getShipping()->getId(),
            ]);

            return $this->execute($map, $json);
        }

        throw new \InvalidArgumentException('Order Status ['.$status.'] não suportado', 1);
    }

    public function factoryTranslator(array $data = [])
    {
        $translator = new Translator($data);

        return $translator;
    }

    public function fetchQueue($offset = 0, $limit = 50, array $parameters = [])
    {
        return $this->translatorFetch($offset, $limit, $parameters);
    }

    public function findShipmentByOrderId($orderId)
    {
        $order = $this->findById($orderId);

        if (!isset($order['shipping']['id']) || empty($order['shipping']['id'])) {
            return;
        }

        return $this->findShipmentById($order['shipping']['id']);
    }

    public function findShipmentById($shipmentId)
    {
        $responseJson = $this->perform($this->factoryMap('findShipmentById', [
            'shipmentId' => $shipmentId,
        ]));

        return $this->processResponse($responseJson);
    }

    public function findCteByShipmentId($shipmentId)
    {
        $response = $this->perform($this->factoryMap('findCteByShipmentId', [
            'shipmentId' => $shipmentId,
        ]));

        return $response;
    }

    public function findInvoiceByOrderId($orderId)
    {
        $order = $this->findById($orderId);

        if (!isset($order['shipping']['id']) || empty($order['shipping']['id'])) {
            return;
        }

        return $this->findInvoiceByShipmentId($order['shipping']['id']);
    }

    public function findInvoiceByShipmentId($shipmentId)
    {
        $responseXml = $this->perform($this->factoryMap('findInvoiceByShipmentId', [
            'shipmentId' => $shipmentId,
        ]));

        return $responseXml;
    }

    public function sendInvoiceToOrder($orderId, string $invoiceXmlContent)
    {
        $order = $this->findById($orderId);

        if (!isset($order['shipping']['id']) || empty($order['shipping']['id'])) {
            return;
        }

        return $this->sendInvoiceToShipment($order['shipping']['id'], $invoiceXmlContent);
    }

    public function sendInvoiceToShipment($shipmentId, string $invoiceXmlContent)
    {
        $request = $this->factoryRequestByMap($this->factoryMap('sendInvoiceToShipment', [
            'shipmentId' => $shipmentId,
        ]));

        $headers = $request->getHeaders();
        $headers['Content-Type'] = 'application/xml;charset=UTF-8';
        $request->set('header', $headers);
        $request->setBody($invoiceXmlContent);
        $request->setMethod('POST');
        $response = $this->getClient()->sendRequest($request);

        return $this->processResponse($response);
    }

    public function updateInvoiceToOrder($orderId, string $invoiceXmlContent)
    {
        $order = $this->findById($orderId);

        if (!isset($order['shipping']['id']) || empty($order['shipping']['id'])) {
            return;
        }

        return $this->updateInvoiceToShipment($order['shipping']['id'], $invoiceXmlContent);
    }

    public function updateInvoiceToShipment($shipmentId, string $invoiceXmlContent)
    {
        $response = $this->perform($this->factoryMap('updateInvoiceToShipment', [
            'shipmentId' => $shipmentId,
        ]), $invoiceXmlContent);

        return $this->processResponse($response);
    }

    public function billingInfo($itemId)
    {
        $response = $this->perform($this->factoryMap('billingInfo', [
            'itemId' => $itemId,
        ]));

        return $response;
    }

    public function downloadTicket($orderId, string $tmpDirectory = '/tmp')
    {
        $order = $this->findById($orderId);

        if (!isset($order['shipping']['id']) || empty($order['shipping']['id'])) {
            return;
        }

        $filename = sprintf('%s/mercadolivre_sdk_ticket-%s.pdf', $tmpDirectory, $order['shipping']['id']);
        if (file_exists($filename)) {
            return $filename;
        }

        if (empty($shipment = $this->findShipmentById($order['shipping']['id']))
            || "ready_to_ship" !== $shipment->getStatus()
            || "ready_to_print" !== $shipment->getSubstatus()
        ) {
            return;
        }

        return $this->downloadTicketByShipmentId($order['shipping']['id'], $tmpDirectory);
    }

    public function downloadTicketByShipmentId($shipmentId, string $tmpDirectory = '/tmp')
    {
        $filename = sprintf('%s/mercadolivre_sdk_ticket-%s.pdf', $tmpDirectory, $shipmentId);
        if (file_exists($filename)) {
            return $filename;
        }

        $request = $this->factoryRequestByMap($this->factoryMap('downloadTicket', [
            'shipmentId' => $shipmentId
        ]));
        $headers = $request->getHeaders();
        $headers['Accept'] = 'application/pdf';
        $request->set('header', $headers);

        return $this->downloadFileByRequest($request, $filename);
    }
}
