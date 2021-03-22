<?php

declare(strict_types=1);

/*
 * This file is part of gpupo/mercadolivre-sdk
 * Created by Gilmar Pupo <contact@gpupo.com>
 * For the information of copyright and license you should read the file
 * LICENSE which is distributed with this source code.
 * Para a informação dos direitos autorais e de licença você deve ler o arquivo
 * LICENSE que é distribuído com este código-fonte.
 * Para obtener la información de los derechos de autor y la licencia debe leer
 * el archivo LICENSE que se distribuye con el código fuente.
 * For more information, see <https://opensource.gpupo.com/>.
 *
 */

namespace Gpupo\MercadolivreSdk\Entity\Order;

use Gpupo\CommonSdk\Entity\EntityInterface;
use Gpupo\CommonSdk\Response;
use Gpupo\CommonSdk\Traits\LoadTrait;
use Gpupo\CommonSdk\Traits\TranslatorManagerTrait;
use Gpupo\MercadolivreSdk\Entity\AbstractManager;

final class Manager extends AbstractManager
{
    use TranslatorManagerTrait;
    use LoadTrait;

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
}
