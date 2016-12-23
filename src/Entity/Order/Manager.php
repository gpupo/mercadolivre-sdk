<?php

/*
 * This file is part of gpupo/mercadolivre-sdk
 * Created by Gilmar Pupo <g@g1mr.com>
 * For the information of copyright and license you should read the file
 * LICENSE which is distributed with this source code.
 * Para a informação dos direitos autorais e de licença você deve ler o arquivo
 * LICENSE que é distribuído com este código-fonte.
 * Para obtener la información de los derechos de autor y la licencia debe leer
 * el archivo LICENSE que se distribuye con el código fuente.
 * For more information, see <http://www.g1mr.com/>.
 */

namespace Gpupo\MercadolivreSdk\Entity\Order;

use DateInterval;
use DateTime;
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
                'raw'            => '{"message":"'.$message.'"}',
                'httpStatusCode' => 204,
            ]);
        };

        #TODO
        /*if (empty($existent)) {
            $existent = $this->resolvePrevious($entity);
        }

        if ($entity->getOrderStatus() === $existent->getOrderStatus()) {
            $this->log('info', 'Order sem atualização');

            return $factory204('Order status not changed!');
        }

        if ('processing' === $entity->getOrderStatus()) {
            return $factory204('Order status not used!');
        }

        $entity = $this->normalizeShipping($entity, $existent);
        */
        $order = $this->findById($entity->getId());

        $status = strtolower($entity->getOrderStatus());
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
}
