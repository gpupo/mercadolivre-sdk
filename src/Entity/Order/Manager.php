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
use Gpupo\MercadolivreSdk\Entity\Order\Message\MessageCollection;
use Gpupo\MercadolivreSdk\Entity\Order\Message\Message;
use Gpupo\MercadolivreSdk\Entity\Order\Message\Translator as MessageTranslator;

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
        $status = strtolower($entity->getOrderStatus());

        if ('handling' === $order['shipping']['status'] && 'processing' === $status) {
            return $factory204('Order status not changed!');
        }

        if (in_array($status, ['processing', 'canceled', 'shipped'], true)) {
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

    public function findMessagesByOrderId($itemId)
    {
        $responseJson = $this->perform($this->factoryMap('findMessagesByOrderId', ['itemId' => $itemId]));
        $result = $this->processResponse($responseJson);

        $messages = new MessageCollection();
        if(!isset($result['results'])){
            return $messages;
        }

        foreach($result['results'] as $raw){
            $message = new Message($raw);
            $messages->add($message);
        }

        return $messages;
    }
}
