<?php

declare(strict_types=1);

/*
 * This file is part of gpupo/mercadolivre-sdk created by Gilmar Pupo <contact@gpupo.com>
 * For the information of copyright and license you should read the file LICENSE which is
 * distributed with this source code. For more information, see <https://opensource.gpupo.com/>
 */

namespace  Gpupo\MercadolivreSdk\Tests\Entity\Order\Decorator\Status;

use Gpupo\MercadolivreSdk\Entity\Order\Decorator\Status\Shipped;
use Gpupo\MercadolivreSdk\Tests\Entity\Order\Decorator\AbstractDecoratorTestCase;

/**
 * @coversDefaultClass \Gpupo\MercadolivreSdk\Entity\Order\Decorator\Status\Shipped
 */
class ShippedTest extends AbstractDecoratorTestCase
{
    protected $target = 'Shipped';

    protected function factory($data = [])
    {
        return new Shipped($data);
    }
}
