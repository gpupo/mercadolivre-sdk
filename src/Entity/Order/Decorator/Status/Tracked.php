<?php

/*
 * This file is part of gpupo/netshoes-sdk
 * Created by Gilmar Pupo <g@g1mr.com>
 * For the information of copyright and license you should read the file
 * LICENSE which is distributed with this source code.
 * Para a informação dos direitos autorais e de licença você deve ler o arquivo
 * LICENSE que é distribuído com este código-fonte.
 * Para obtener la información de los derechos de autor y la licencia debe leer
 * el archivo LICENSE que se distribuye con el código fuente.
 * For more information, see <http://www.g1mr.com/>.
 */

namespace Gpupo\MercadolivreSdk\Entity\Order\Decorator\Status;

use Gpupo\MercadolivreSdk\Entity\Order\Decorator\AbstractDecorator;
use Gpupo\MercadolivreSdk\Entity\Order\Decorator\DecoratorInterface;

class Tracked extends AbstractDecorator implements DecoratorInterface
{
    protected $name = 'Tracked';

    protected function factoryArray()
    {
        return [
          "tracking_number" => $this->getOrder()->getShipping()->getShippingCode(),
          "service_id"      => 1,
        ];
    }
}
