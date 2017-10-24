<?php

/*
 * This file is part of gpupo/netshoes-sdk
 * Created by Gilmar Pupo <contact@gpupo.com>
 * For the information of copyright and license you should read the file
 * LICENSE which is distributed with this source code.
 * Para a informação dos direitos autorais e de licença você deve ler o arquivo
 * LICENSE que é distribuído com este código-fonte.
 * Para obtener la información de los derechos de autor y la licencia debe leer
 * el archivo LICENSE que se distribuye con el código fuente.
 * For more information, see <https://opensource.gpupo.com/>.
 */

namespace Gpupo\Tests\MercadolivreSdk\Entity\Order;

use Gpupo\CommonSchema\TranslatorDataCollection;
use Gpupo\MercadolivreSdk\Client\Client;
use Gpupo\MercadolivreSdk\Entity\Order\Manager;
use Gpupo\MercadolivreSdk\Entity\Order\Order;
use Gpupo\Tests\MercadolivreSdk\TestCaseAbstract;
use Gpupo\MercadolivreSdk\Entity\Order\OrderCollection;

/**
 * @coversDefaultClass \Gpupo\MercadolivreSdk\Entity\Order\Manager
 */
class ManagerTest extends TestCaseAbstract
{
    protected function getManager($filename = 'item.json')
    {
        $manager = $this->getFactory()->factoryManager('order');
        $manager->setDryRun($this->factoryResponseFromFixture('fixture/Order/'.$filename));

        return $manager;
    }

    protected function commonAsserts(Order $order)
    {
        $this->assertSame((int)'768570754', (int)$order->getId());
        $this->assertSame('pending', $order->getShipping()->getStatus());
        $this->assertSame(20676482441, $order->getShipping()->getId());
    }
    /**
     * @testdox Administra operações de SKUs
     * @test
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
     */
    public function testPossuiObjetoClient($manager)
    {
        $this->assertInstanceOf(Client::class, $manager->getClient());
    }

    /**
     * @testdox Get a list of Orders
     * @test
     * @depends testManager
     * @covers ::fetch
     * @covers ::execute
     * @covers ::factoryMap
     */
    public function fetch(Manager $manager)
    {
        $list = $manager->fetch();

        $this->assertInstanceOf(OrderCollection::class, $list);

        $this->assertSame(1, $list->count());

        foreach ($list as $order) {
            $this->commonAsserts($order);
        }

        return $list;
    }

    /**
     * @testdox Get a empty list of Orders
     * @test
     * @covers \Gpupo\MercadolivreSdk\Entity\AbstractManager::findById
     * @covers ::execute
     * @covers ::factoryMap
     */
    public function fetchNotFound()
    {
        $manager = $this->getManager('notfound.json');
        $this->assertFalse($manager->findById(1001));
    }

    /**
     * @testdox Get a list of Common Schema Orders
     * @test
     * @depends testManager
     * @covers ::translatorFetch
     * @covers \Gpupo\MercadolivreSdk\Entity\Order\Translator::translateTo
     */
    public function translatorFetch(Manager $manager)
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
     * @test
     * @depends testManager
     * @covers ::fetchQueue
     * @covers \Gpupo\MercadolivreSdk\Entity\Order\Translator::translateTo
     */
    public function fetchQueue(Manager $manager)
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
        $order = $manager->findById(768570754);
        $this->assertInstanceOf(Order::class, $order);
        $this->commonAsserts($order);
    }

    /**
     * @testdox Update the shipping status to Processing
     * @test
     * @dataProvider dataProviderOrders
     * @covers ::fetch
     * @covers ::execute
     * @covers ::update
     * @covers ::factoryMap
     */
    public function saveStatusToProcessing(Order $order)
    {
        $manager = $this->getManager();
        $order->setOrderStatus('processing');
        $order->getShipping()->setShipmentId('123456');

        $this->assertSame(200, $manager->update($order)->getHttpStatusCode());
    }

    /**
     * @testdox Update the shipping status to shipped
     * @test
     * @dataProvider dataProviderOrders
     * @covers ::fetch
     * @covers ::execute
     * @covers ::update
     * @covers ::factoryMap
     */
    public function saveStatusToShipped(Order $order)
    {
        $manager = $this->getManager();
        $order->setOrderStatus('shipped');
        $order->getShipping()->setShippingCode('TR1234567891');
        $order->getShipping()->setShipmentId('123456');

        $this->assertSame(200, $manager->update($order)->getHttpStatusCode());
    }
}
