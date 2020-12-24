<?php

declare(strict_types=1);

/*
 * This file is part of gpupo/mercadolivre-sdk created by Gilmar Pupo <contact@gpupo.com>
 * For the information of copyright and license you should read the file LICENSE which is
 * distributed with this source code. For more information, see <https://opensource.gpupo.com/>
 */

namespace Gpupo\MercadolivreSdk\Entity\Order\Decorator\Status;

use Gpupo\MercadolivreSdk\Entity\Order\Decorator\AbstractDecorator;
use Gpupo\MercadolivreSdk\Entity\Order\Decorator\DecoratorInterface;

class Processing extends AbstractDecorator implements DecoratorInterface
{
    protected $name = 'Processing';

    protected function factoryArray()
    {
        return [
            'status' => 'handling',
        ];
    }
}
