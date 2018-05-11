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

namespace Entity\Order;

use Gpupo\Common\Entity\Collection;
use Gpupo\MercadolivreSdk\Entity\Order\Order;
use Gpupo\Tests\CommonSdk\Traits\EntityTrait;
use Gpupo\Tests\MercadolivreSdk\TestCaseAbstract;

/**
 * @coversDefaultClass \Gpupo\MercadolivreSdk\Entity\Order\Order
 *
 * @method string     getId()                                 Acesso a id
 * @method            setId(string $id)                       Define id
 * @method string     getStatus()                             Acesso a status
 * @method            setStatus(string $status)               Define status
 * @method bool       getStatusDetail()                       Acesso a status_detail
 * @method            setStatusDetail(boolean $status_detail) Define status_detail
 * @method string     getDateCreated()                        Acesso a date_created
 * @method            setDateCreated(string $date_created)    Define date_created
 * @method string     getDateClosed()                         Acesso a date_closed
 * @method            setDateClosed(string $date_closed)      Define date_closed
 * @method collection getOrderItems()                         Acesso a order_items
 * @method            setOrderItems(collection $order_items)  Define order_items
 * @method float      getTotalAmount()                        Acesso a total_amount
 * @method            setTotalAmount(float $total_amount)     Define total_amount
 * @method string     getCurrencyId()                         Acesso a currency_id
 * @method            setCurrencyId(string $currency_id)      Define currency_id
 * @method collection getBuyer()                              Acesso a buyer
 * @method            setBuyer(collection $buyer)             Define buyer
 * @method collection getSeller()                             Acesso a seller
 * @method            setSeller(collection $seller)           Define seller
 * @method collection getPayments()                           Acesso a payments
 * @method            setPayments(collection $payments)       Define payments
 * @method collection getFeedback()                           Acesso a feedback
 * @method            setFeedback(collection $feedback)       Define feedback
 * @method collection getShipping()                           Acesso a shipping
 * @method            setShipping(collection $shipping)       Define shipping
 * @method array      getTags()                               Acesso a tags
 * @method            setTags(array $tags)                    Define tags
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
        $expected = [
          'id' => 123456,
          'status' => 'string',
          'status_detail' => true,
          'date_created' => 'string',
          'date_closed' => 'string',
          'order_items' => 'collection',
          'total_amount' => 299.33,
          'currency_id' => 'string',
          'buyer' => 'collection',
          'seller' => 'collection',
          'payments' => 'collection',
          'feedback' => 'collection',
          'shipping' => 'collection',
          'tags' => [],
        ];

        return $this->dataProviderEntitySchema(self::QUALIFIED, $expected);
    }

    /**
     * @testdox ``getSchema()``
     * @cover ::getSchema
     * @dataProvider dataProviderOrder
     */
    public function testGetSchema(Order $order)
    {
        $this->markTestIncomplete('getSchema() incomplete!');
    }

    /**
     * @testdox ``loadArrayFromFile()``
     * @cover ::loadArrayFromFile
     * @dataProvider dataProviderOrder
     */
    public function testLoadArrayFromFile(Order $order)
    {
        $this->markTestIncomplete('loadArrayFromFile() incomplete!');
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
        $this->assertSame($order['id'], (int) ($expected['id']));
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
        $this->assertSchemaSetter('id', 'string', $order);
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
        $this->assertSchemaGetter('status_detail', 'boolean', $order, $expected);
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
        $this->assertInstanceOf(Collection::class, $order['order_items']);
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
        $this->assertSame($order['total_amount'], $expected['total_amount']);
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
        $this->assertInstanceOf(Collection::class, $order['buyer']);
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
        $this->assertInstanceOf(Collection::class, $order['seller']);
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
        $this->assertInstanceOf(Collection::class, $order['payments']);
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
        $this->assertInstanceOf(Collection::class, $order['feedback']);
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
        $this->assertInstanceOf(Collection::class, $order['shipping']);
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
