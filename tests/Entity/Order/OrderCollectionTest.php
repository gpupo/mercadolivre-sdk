<?php

declare(strict_types=1);

/*
 * This file is part of gpupo/mercadolivre-sdk created by Gilmar Pupo <contact@gpupo.com>
 * For the information of copyright and license you should read the file LICENSE which is
 * distributed with this source code. For more information, see <https://opensource.gpupo.com/>
 */

namespace  Gpupo\MercadolivreSdk\Tests\Entity\Order;

use Gpupo\MercadolivreSdk\Entity\Order\Order;
use Gpupo\MercadolivreSdk\Entity\Order\OrderCollection;
use Gpupo\MercadolivreSdk\Tests\TestCaseAbstract;

/**
 * @coversDefaultClass \Gpupo\MercadolivreSdk\Entity\Order\OrderCollection
 */
class OrderCollectionTest extends TestCaseAbstract
{
    /**
     * @testdox Is a Container of multiples Orders
     */
    public function testIsAContainer()
    {
        $orderCollection = new OrderCollection($this->getData());
        $this->assertInstanceOf(Order::class, $orderCollection->first());

        return $orderCollection;
    }

    /**
     * @depends testIsAContainer
     */
    public function testHasMetadata(OrderCollection $orderCollection)
    {
        $this->assertGreaterThan(3, $orderCollection->getMetadata()->count());
        $paging = $orderCollection->getMetadata()->get('paging');
        $this->assertSame(166, $paging->get('total'), 'Paging Total');
        $sort = $orderCollection->getMetadata()->get('sort');
        $this->assertSame('date_asc', $sort->get('id'), 'Sort');
    }

    protected function getData()
    {
        return $this->getResourceJson('mockup/Order/list-private.json');
    }
}
