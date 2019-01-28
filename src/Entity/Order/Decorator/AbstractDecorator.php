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

namespace Gpupo\MercadolivreSdk\Entity\Order\Decorator;

use Gpupo\Common\Entity\Collection;
use Gpupo\CommonSdk\Traits\LoggerTrait;
use Gpupo\MercadolivreSdk\Entity\Order\Order;

abstract class AbstractDecorator extends Collection
{
    use LoggerTrait;

    protected $name = '';

    public function setOrder(Order $order)
    {
        $this->set('order', $order);
        $this->initLogger($order->getLogger());

        return $this;
    }

    public function getOrder()
    {
        return $this->get('order');
    }

    public function setOriginalOrder($order)
    {
        $this->set('originalOrder', $order);

        return $this;
    }

    public function getOriginalOrder()
    {
        return $this->get('originalOrder');
    }

    public function validate()
    {
        $order = $this->getOrder();

        if (empty($order)) {
            $this->invalid('Order');
        }

        $this->getOrder()->check();

        return $this;
    }

    public function toArray(): array
    {
        try {
            $this->validate();
            $array = $this->factoryArray();
        } catch (\Exception $e) {
            return $this->fail($this->name.' ('.$e->getMessage().')');
        }

        return $array;
    }

    protected function factoryArray()
    {
        throw new \InvalidArgumentException('factoryArray() deve ser sobrecarregado!');
    }

    protected function fail($string = '')
    {
        $message = 'Order incomplete for status ['.$string.']';
        $this->log('error', $message, [
            'order' => $this->getOrder(),
        ]);

        throw new \InvalidArgumentException($message);
    }

    protected function invalid($string = '')
    {
        $message = 'Attribute invalid: '.$string.' ';

        throw new \InvalidArgumentException($message);
    }
}
