<?php

declare(strict_types=1);

/*
 * This file is part of gpupo/mercadolivre-sdk created by Gilmar Pupo <contact@gpupo.com>
 * For the information of copyright and license you should read the file LICENSE which is
 * distributed with this source code. For more information, see <https://opensource.gpupo.com/>
 */

namespace  Gpupo\MercadolivreSdk\Tests\Entity\Order;

use Gpupo\MercadolivreSdk\Entity\Order\Order;
use Gpupo\MercadolivreSdk\Tests\TestCaseAbstract;

/**
 * @coversDefaultClass \Gpupo\MercadolivreSdk\Entity\Order\StatusDetail
 */
class StatusDetailTest extends TestCaseAbstract
{
    public function testIsAObjectOfOrder()
    {
        $order = new Order([
            'id' => 'Foo12233',
            'status_detail' => [
                'code' => 'bar',
                'description' => 'Hello World',
            ],
        ]);

        $this->assertSame('bar', $order->getStatusDetail()->getCode());
        $this->assertSame('Hello World', $order->getStatusDetail()->getDescription());
    }
}
