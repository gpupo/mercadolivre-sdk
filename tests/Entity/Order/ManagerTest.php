<?php

declare(strict_types=1);

/*
 * This file is part of gpupo/mercadolivre-sdk created by Gilmar Pupo <contact@gpupo.com>
 * For the information of copyright and license you should read the file LICENSE which is
 * distributed with this source code. For more information, see <https://opensource.gpupo.com/>
 */

namespace  Gpupo\MercadolivreSdk\Tests\Entity\Order;

use Gpupo\CommonSchema\TranslatorDataCollection;
use Gpupo\MercadolivreSdk\Client\Client;
use Gpupo\MercadolivreSdk\Entity\Message\To;
use Gpupo\MercadolivreSdk\Entity\Order\Manager;
use Gpupo\MercadolivreSdk\Entity\Order\Order;
use Gpupo\MercadolivreSdk\Entity\Order\OrderCollection;
use Gpupo\MercadolivreSdk\Tests\TestCaseAbstract;

/**
 * @coversDefaultClass \Gpupo\MercadolivreSdk\Entity\Order\Manager
 */
class ManagerTest extends TestCaseAbstract
{
    /**
     * @testdox Administra operações de SKUs
     */
    public function testManager()
    {
        $manager = $this->getManager('list.json');

        $this->assertInstanceOf(Manager::class, $manager);

        return $manager;
    }

    /**
     * @depends testManager
     * @covers ::getClient
     *
     * @param mixed $manager
     */
    public function testPossuiObjetoClient($manager)
    {
        $this->assertInstanceOf(Client::class, $manager->getClient());
    }

    /**
     * @testdox Get a list of Orders
     *
     * @depends testManager
     * @covers ::fetch
     * @covers ::execute
     * @covers ::factoryMap
     */
    public function testFetch(Manager $manager)
    {
        $orderCollection = $manager->fetch();
        $this->assertInstanceOf(OrderCollection::class, $orderCollection);
        $this->assertGreaterThan(5, $orderCollection->getMetadata()->count());
        $this->assertSame(1, $orderCollection->count());

        foreach ($orderCollection as $order) {
            $this->commonAsserts($order);
        }

        return $orderCollection;
    }

    /**
     * @testdox Get a empty list of Orders
     *
     * @covers \Gpupo\MercadolivreSdk\Entity\AbstractManager::findById
     * @covers ::execute
     * @covers ::factoryMap
     */
    public function testFetchNotFound()
    {
        $manager = $this->getManager('notfound.json');
        $this->assertNull($manager->findById(1001));
    }

    /**
     * @testdox Get a list of Common Schema Orders
     *
     * @depends testManager
     * @covers ::translatorFetch
     * @covers \Gpupo\MercadolivreSdk\Entity\Order\Translator::translateTo
     */
    public function testTranslatorFetch(Manager $manager)
    {
        $list = $manager->translatorFetch(0, 50, []);
        $this->assertInstanceOf(TranslatorDataCollection::class, $list);

        $this->assertSame(1, $list->count());

        foreach ($list as $order) {
            $this->assertInstanceOf(TranslatorDataCollection::class, $order);
        }

        return $list;
    }

    /**
     * @testdox Get a list of most recent Common Schema Orders
     *
     * @depends testManager
     * @covers ::fetchQueue
     * @covers \Gpupo\MercadolivreSdk\Entity\Order\Translator::translateTo
     */
    public function testFetchQueue(Manager $manager)
    {
        $list = $manager->fetchQueue();
        $this->assertInstanceOf(TranslatorDataCollection::class, $list);
        $this->assertSame(1, $list->count());
        foreach ($list as $order) {
            $this->assertInstanceOf(TranslatorDataCollection::class, $order);
        }

        return $list;
    }

    /**
     * @testdox Get a order based on order number
     * @covers ::findById
     * @covers ::execute
     * @covers ::factoryMap
     * @covers \Gpupo\MercadolivreSdk\Client\Client::getDefaultOptions
     * @covers \Gpupo\MercadolivreSdk\Client\Client::renderAuthorization
     */
    public function testFindBy()
    {
        $manager = $this->getManager('item.json');
        $order = $manager->findById(1068825849);
        $this->assertInstanceOf(Order::class, $order);
        $this->commonAsserts($order);
    }

    /**
     * @testdox Update the shipping status to Processing
     *
     * @dataProvider dataProviderOrders
     * @covers ::fetch
     * @covers ::execute
     * @covers ::update
     * @covers ::factoryMap
     */
    public function testSaveStatusToProcessing(Order $order)
    {
        $manager = $this->getManager();
        $order->setOrderStatus('processing');
        $order->getShipping()->setShipmentId('123456');

        $this->assertSame(200, $manager->update($order)->getHttpStatusCode());
    }

    /**
     * @testdox Update the shipping status to shipped
     *
     * @dataProvider dataProviderOrders
     * @covers ::fetch
     * @covers ::execute
     * @covers ::update
     * @covers ::factoryMap
     */
    public function testSaveStatusToShipped(Order $order)
    {
        $manager = $this->getManager();
        $order->setOrderStatus('shipped');
        $order->getShipping()->setShippingCode('TR1234567891');
        $order->getShipping()->setShipmentId('123456');

        $this->assertSame(200, $manager->update($order)->getHttpStatusCode());
    }

    /**
     * @testdox Fetch invoice xml from shipment
     * 
     * @covers ::factoryMap
     * @covers ::perform
     * @covers ::processResponse
     * @covers ::findInvoiceByShipmentId
     */
    public function testFindInvoiceByShipmentId()
    {
        $manager = $this->getManager('invoice.xml');
        $result = $manager->findInvoiceByShipmentId(1);
        $this->assertNotNull($result);
        $this->assertIsObject($result);
        $this->assertStringContainsString('<?xml version="1.0" encoding="UTF-8"?>', $result->getResponseRaw());
    }

    /**
     * @testdox Fetch invoice xml from shipment fail
     * 
     * @covers ::factoryMap
     * @covers ::perform
     * @covers ::processResponse
     * @covers ::findInvoiceByShipmentId
     */
    public function testFindInvoiceByShipmentIdFail()
    {
        $manager = $this->getManager('notfound.json');
        $result = $manager->findInvoiceByShipmentId(1);
        $this->assertNotNull($result);
        $this->assertIsObject($result);
    }

    protected function getManager($filename = 'item.json')
    {
        $manager = $this->getFactory()->factoryManager('order');
        $manager->setDryRun($this->factoryResponseFromFixture('mockup/Order/'.$filename));

        return $manager;
    }

    protected function commonAsserts(Order $order)
    {
        $this->assertSame((int) '1068825849', (int) $order->getId());
        $this->assertSame('pending', $order->getShipping()->getStatus());
        $this->assertSame(20676482441, $order->getShipping()->getId());
    }
}
