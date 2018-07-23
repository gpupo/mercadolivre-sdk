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

namespace  Gpupo\MercadolivreSdk\Tests\Entity\Order;

use Gpupo\Common\Entity\CollectionInterface;
use Gpupo\MercadolivreSdk\Entity\Order\Order;
use Gpupo\MercadolivreSdk\Entity\Order\OrderCollection;
use Gpupo\MercadolivreSdk\Entity\Order\StatusDetail;
use Gpupo\MercadolivreSdk\Tests\TestCaseAbstract;
use  Gpupo\Tests\CommonSdk\Traits\EntityTrait;

/**
 * @coversDefaultClass \Gpupo\MercadolivreSdk\Entity\Order\Order
 */
class OrderTest extends TestCaseAbstract
{
    use EntityTrait;

    const QUALIFIED = 'Gpupo\MercadolivreSdk\Entity\Order\Order';

    public static function setUpBeforeClass()
    {
        static::setFullyQualifiedObject(self::QUALIFIED);
        parent::setUpBeforeClass();
    }

    /**
     * @return \Gpupo\MercadolivreSdk\Entity\Order\Order
     */
    public function dataProviderOrder()
    {
        $list = [];
        $data = $this->getResourceJson('mockup/Order/list-private.json');

        $results = $data['results'];
        $collection = new OrderCollection($data);

        foreach ($collection as $order) {
            $expected = current($results);
            $list[] = [$order, $expected];
            next($results);
        }

        return $list;
    }

    /**
     * @testdox ``getSchema()``
     * @cover ::getSchema
     * @dataProvider dataProviderOrder
     */
    public function testGetSchema(Order $order)
    {
        $this->assertSame('string', $order->getSchema()['status']);
        $this->assertSame('integer', $order->getSchema()['id']);
    }

    /**
     * @testdox Possui método ``getId()`` para acessar Id
     * @dataProvider dataProviderOrder
     * @cover ::get
     * @cover ::getSchema
     * @small
     *
     * @param null|mixed $expected
     */
    public function testGetId(Order $order, $expected = null)
    {
        $this->assertSame($order->getId(), (int) ($expected['id']));
    }

    /**
     * @testdox Possui método ``setId()`` que define Id
     * @dataProvider dataProviderOrder
     * @cover ::set
     * @cover ::getSchema
     * @small
     *
     * @param null|mixed $expected
     */
    public function testSetId(Order $order, $expected = null)
    {
        $order->setId($expected['id']);
        $this->assertSame($order->getId(), (int) $expected['id']);
    }

    /**
     * @testdox Possui método ``getStatus()`` para acessar Status
     * @dataProvider dataProviderOrder
     * @cover ::get
     * @cover ::getSchema
     * @small
     *
     * @param null|mixed $expected
     */
    public function testGetStatusOrder(Order $order, $expected = null)
    {
        $this->assertSchemaGetter('status', 'string', $order, $expected);
    }

    /**
     * @testdox Possui método ``setStatus()`` que define Status
     * @dataProvider dataProviderOrder
     * @cover ::set
     * @cover ::getSchema
     * @small
     *
     * @param null|mixed $expected
     */
    public function testSetStatusOrder(Order $order, $expected = null)
    {
        $this->assertSchemaSetter('status', 'string', $order);
    }

    /**
     * @testdox Possui método ``getStatusDetail()`` para acessar StatusDetail
     * @dataProvider dataProviderOrder
     * @cover ::get
     * @cover ::getSchema
     * @small
     *
     * @param null|mixed $expected
     */
    public function testGetStatusDetail(Order $order, $expected = null)
    {
        $this->assertInstanceOf(StatusDetail::class, $order->getStatusDetail());
    }

    /**
     * @testdox Possui método ``setStatusDetail()`` que define StatusDetail
     * @dataProvider dataProviderOrder
     * @cover ::set
     * @cover ::getSchema
     * @small
     *
     * @param null|mixed $expected
     */
    public function testSetStatusDetail(Order $order, $expected = null)
    {
        $this->assertSchemaSetter('status_detail', 'boolean', $order);
    }

    /**
     * @testdox Possui método ``getDateCreated()`` para acessar DateCreated
     * @dataProvider dataProviderOrder
     * @cover ::get
     * @cover ::getSchema
     * @small
     *
     * @param null|mixed $expected
     */
    public function testGetDateCreated(Order $order, $expected = null)
    {
        $this->assertSchemaGetter('date_created', 'string', $order, $expected);
    }

    /**
     * @testdox Possui método ``setDateCreated()`` que define DateCreated
     * @dataProvider dataProviderOrder
     * @cover ::set
     * @cover ::getSchema
     * @small
     *
     * @param null|mixed $expected
     */
    public function testSetDateCreated(Order $order, $expected = null)
    {
        $this->assertSchemaSetter('date_created', 'string', $order);
    }

    /**
     * @testdox Possui método ``getDateClosed()`` para acessar DateClosed
     * @dataProvider dataProviderOrder
     * @cover ::get
     * @cover ::getSchema
     * @small
     *
     * @param null|mixed $expected
     */
    public function testGetDateClosed(Order $order, $expected = null)
    {
        $this->assertSchemaGetter('date_closed', 'string', $order, $expected);
    }

    /**
     * @testdox Possui método ``setDateClosed()`` que define DateClosed
     * @dataProvider dataProviderOrder
     * @cover ::set
     * @cover ::getSchema
     * @small
     *
     * @param null|mixed $expected
     */
    public function testSetDateClosed(Order $order, $expected = null)
    {
        $this->assertSchemaSetter('date_closed', 'string', $order);
    }

    /**
     * @testdox Possui método ``getOrderItems()`` para acessar OrderItems
     * @dataProvider dataProviderOrder
     * @cover ::get
     * @cover ::getSchema
     * @small
     *
     * @param null|mixed $expected
     */
    public function testGetOrderItems(Order $order, $expected = null)
    {
        $this->assertInstanceOf(CollectionInterface::class, $order['order_items']);
    }

    /**
     * @testdox Possui método ``setOrderItems()`` que define OrderItems
     * @dataProvider dataProviderOrder
     * @cover ::set
     * @cover ::getSchema
     * @small
     *
     * @param null|mixed $expected
     */
    public function testSetOrderItems(Order $order, $expected = null)
    {
        $this->assertSchemaSetter('order_items', 'collection', $order);
    }

    /**
     * @testdox Possui método ``getTotalAmount()`` para acessar TotalAmount
     * @dataProvider dataProviderOrder
     * @cover ::get
     * @cover ::getSchema
     * @small
     *
     * @param null|mixed $expected
     */
    public function testGetTotalAmount(Order $order, $expected = null)
    {
        $this->assertSame((float) $expected['total_amount'], $order->getTotalAmount(), 'Teste qualquer');
    }

    /**
     * @testdox Possui método ``setTotalAmount()`` que define TotalAmount
     * @dataProvider dataProviderOrder
     * @cover ::set
     * @cover ::getSchema
     * @small
     *
     * @param null|mixed $expected
     */
    public function testSetTotalAmount(Order $order, $expected = null)
    {
        $this->assertSchemaSetter('total_amount', 'number', $order);
    }

    /**
     * @testdox Possui método ``getCurrencyId()`` para acessar CurrencyId
     * @dataProvider dataProviderOrder
     * @cover ::get
     * @cover ::getSchema
     * @small
     *
     * @param null|mixed $expected
     */
    public function testGetCurrencyId(Order $order, $expected = null)
    {
        $this->assertSchemaGetter('currency_id', 'string', $order, $expected);
    }

    /**
     * @testdox Possui método ``setCurrencyId()`` que define CurrencyId
     * @dataProvider dataProviderOrder
     * @cover ::set
     * @cover ::getSchema
     * @small
     *
     * @param null|mixed $expected
     */
    public function testSetCurrencyId(Order $order, $expected = null)
    {
        $this->assertSchemaSetter('currency_id', 'string', $order);
    }

    /**
     * @testdox Possui método ``getBuyer()`` para acessar Buyer
     * @dataProvider dataProviderOrder
     * @cover ::get
     * @cover ::getSchema
     * @small
     *
     * @param null|mixed $expected
     */
    public function testGetBuyer(Order $order, $expected = null)
    {
        $this->assertInstanceOf(CollectionInterface::class, $order['buyer']);
    }

    /**
     * @testdox Possui método ``setBuyer()`` que define Buyer
     * @dataProvider dataProviderOrder
     * @cover ::set
     * @cover ::getSchema
     * @small
     *
     * @param null|mixed $expected
     */
    public function testSetBuyer(Order $order, $expected = null)
    {
        $this->assertSchemaSetter('buyer', 'collection', $order);
    }

    /**
     * @testdox Possui método ``getSeller()`` para acessar Seller
     * @dataProvider dataProviderOrder
     * @cover ::get
     * @cover ::getSchema
     * @small
     *
     * @param null|mixed $expected
     */
    public function testGetSeller(Order $order, $expected = null)
    {
        $this->assertInstanceOf(CollectionInterface::class, $order['seller']);
    }

    /**
     * @testdox Possui método ``setSeller()`` que define Seller
     * @dataProvider dataProviderOrder
     * @cover ::set
     * @cover ::getSchema
     * @small
     *
     * @param null|mixed $expected
     */
    public function testSetSeller(Order $order, $expected = null)
    {
        $this->assertSchemaSetter('seller', 'collection', $order);
    }

    /**
     * @testdox Possui método ``getPayments()`` para acessar Payments
     * @dataProvider dataProviderOrder
     * @cover ::get
     * @cover ::getSchema
     * @small
     *
     * @param null|mixed $expected
     */
    public function testGetPayments(Order $order, $expected = null)
    {
        $this->assertInstanceOf(CollectionInterface::class, $order['payments']);
    }

    /**
     * @testdox Possui método ``setPayments()`` que define Payments
     * @dataProvider dataProviderOrder
     * @cover ::set
     * @cover ::getSchema
     * @small
     *
     * @param null|mixed $expected
     */
    public function testSetPayments(Order $order, $expected = null)
    {
        $this->assertSchemaSetter('payments', 'collection', $order);
    }

    /**
     * @testdox Possui método ``getFeedback()`` para acessar Feedback
     * @dataProvider dataProviderOrder
     * @cover ::get
     * @cover ::getSchema
     * @small
     *
     * @param null|mixed $expected
     */
    public function testGetFeedback(Order $order, $expected = null)
    {
        $this->assertInternalType('array', $order->getFeedback());
    }

    /**
     * @testdox Possui método ``setFeedback()`` que define Feedback
     * @dataProvider dataProviderOrder
     * @cover ::set
     * @cover ::getSchema
     * @small
     *
     * @param null|mixed $expected
     */
    public function testSetFeedback(Order $order, $expected = null)
    {
        $this->assertSchemaSetter('feedback', 'collection', $order);
    }

    /**
     * @testdox Possui método ``getShipping()`` para acessar Shipping
     * @dataProvider dataProviderOrder
     * @cover ::get
     * @cover ::getSchema
     * @small
     *
     * @param null|mixed $expected
     */
    public function testGetShipping(Order $order, $expected = null)
    {
        $this->assertInstanceOf(CollectionInterface::class, $order['shipping']);
    }

    /**
     * @testdox Possui método ``setShipping()`` que define Shipping
     * @dataProvider dataProviderOrder
     * @cover ::set
     * @cover ::getSchema
     * @small
     *
     * @param null|mixed $expected
     */
    public function testSetShipping(Order $order, $expected = null)
    {
        $this->assertSchemaSetter('shipping', 'collection', $order);
    }

    /**
     * @testdox Possui método ``getTags()`` para acessar Tags
     * @dataProvider dataProviderOrder
     * @cover ::get
     * @cover ::getSchema
     * @small
     *
     * @param null|mixed $expected
     */
    public function testGetTags(Order $order, $expected = null)
    {
        $this->assertSchemaGetter('tags', [], $order, $expected);
    }

    /**
     * @testdox Possui método ``setTags()`` que define Tags
     * @dataProvider dataProviderOrder
     * @cover ::set
     * @cover ::getSchema
     * @small
     *
     * @param null|mixed $expected
     */
    public function testSetTags(Order $order, $expected = null)
    {
        $this->assertSchemaSetter('tags', [], $order);
    }
}
