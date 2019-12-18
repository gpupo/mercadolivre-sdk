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

namespace  Gpupo\MercadolivreSdk\Tests\Entity\Order\Shipping;

use Gpupo\CommonSdk\Tests\Traits\EntityTrait;
use Gpupo\MercadolivreSdk\Entity\Order\Shipping\Shipping;
use PHPUnit\Framework\TestCase as CoreTestCase;

/**
 * @coversDefaultClass \Gpupo\MercadolivreSdk\Entity\Order\Shipping\Shipping
 *
 * @method int                                                                  getCost()                                                                                              A $cost acessor.
 * @method                                                                      setCost(integer $cost)                                                                                 A $cost setter
 * @method string                                                               getCurrencyId()                                                                                        A $currency_id acessor.
 * @method                                                                      setCurrencyId(string $currency_id)                                                                     A $currency_id setter
 * @method string                                                               getDateCreated()                                                                                       A $date_created acessor.
 * @method                                                                      setDateCreated(string $date_created)                                                                   A $date_created setter
 * @method string                                                               getDateFirstPrinted()                                                                                  A $date_first_printed acessor.
 * @method                                                                      setDateFirstPrinted(string $date_first_printed)                                                        A $date_first_printed setter
 * @method int                                                                  getId()                                                                                                A $id acessor.
 * @method                                                                      setId(integer $id)                                                                                     A $id setter
 * @method string                                                               getPickingType()                                                                                       A $picking_type acessor.
 * @method                                                                      setPickingType(string $picking_type)                                                                   A $picking_type setter
 * @method Gpupo\MercadolivreSdk\Entity\Order\Shipping\ReceiverAddress          getReceiverAddress()                                                                                   A $receiver_address acessor.
 * @method                                                                      setReceiverAddress(Gpupo\MercadolivreSdk\Entity\Order\Shipping\ReceiverAddress $receiver_address)      A $receiver_address setter
 * @method int                                                                  getSenderId()                                                                                          A $sender_id acessor.
 * @method                                                                      setSenderId(integer $sender_id)                                                                        A $sender_id setter
 * @method int                                                                  getServiceId()                                                                                         A $service_id acessor.
 * @method                                                                      setServiceId(integer $service_id)                                                                      A $service_id setter
 * @method string                                                               getShipmentType()                                                                                      A $shipment_type acessor.
 * @method                                                                      setShipmentType(string $shipment_type)                                                                 A $shipment_type setter
 * @method Gpupo\MercadolivreSdk\Entity\Order\Shipping\ShippingItems\Collection getShippingItems()                                                                                     A $shipping_items acessor.
 * @method                                                                      setShippingItems(Gpupo\MercadolivreSdk\Entity\Order\Shipping\ShippingItems\Collection $shipping_items) A $shipping_items setter
 * @method string                                                               getShippingMode()                                                                                      A $shipping_mode acessor.
 * @method                                                                      setShippingMode(string $shipping_mode)                                                                 A $shipping_mode setter
 * @method Gpupo\MercadolivreSdk\Entity\Order\Shipping\ShippingOption           getShippingOption()                                                                                    A $shipping_option acessor.
 * @method                                                                      setShippingOption(Gpupo\MercadolivreSdk\Entity\Order\Shipping\ShippingOption $shipping_option)         A $shipping_option setter
 * @method string                                                               getStatus()                                                                                            A $status acessor.
 * @method                                                                      setStatus(string $status)                                                                              A $status setter
 * @method string                                                               getSubstatus()                                                                                         A $substatus acessor.
 * @method                                                                      setSubstatus(string $substatus)                                                                        A $substatus setter
 */
class ShippingTest extends CoreTestCase
{
    use EntityTrait;

    const QUALIFIED = Shipping::class;

    public static function setUpBeforeClass(): void
    {
        static::setFullyQualifiedObject(self::QUALIFIED);
        parent::setUpBeforeClass();
    }

    /**
     * @return Shipping
     */
    public function dataProviderShipping()
    {
        $expected = [
            'cost' => 'integer',
            'currency_id' => 'string',
            'date_created' => 'string',
            'date_first_printed' => 'string',
            'id' => 'integer',
            'picking_type' => 'string',
            'receiver_address' => 'object',
            'sender_id' => 'integer',
            'service_id' => 'integer',
            'shipment_type' => 'string',
            'shipping_items' => 'object',
            'shipping_mode' => 'string',
            'shipping_option' => 'object',
            'status' => 'string',
            'substatus' => 'string',
        ];

        return $this->dataProviderEntitySchema(self::QUALIFIED, $expected);
    }

    /**
     * @testdox Have a getter ``getCost()`` to get ``Cost``
     * @dataProvider dataProviderShipping
     * @cover ::getCost
     * @small
     *
     * @param Shipping $shipping Main Object
     * @param array    $expected Fixture data
     */
    public function testGetCost(Shipping $shipping, array $expected)
    {
        $shipping->setCost($expected['cost']);
        $this->assertSame($expected['cost'], $shipping->getCost());
    }

    /**
     * @testdox Have a setter ``setCost()`` to set ``Cost``
     * @dataProvider dataProviderShipping
     * @cover ::setCost
     * @small
     *
     * @param Shipping $shipping Main Object
     * @param array    $expected Fixture data
     */
    public function testSetCost(Shipping $shipping, array $expected)
    {
        $shipping->setCost($expected['cost']);
        $this->assertSame($expected['cost'], $shipping->getCost());
    }

    /**
     * @testdox Have a getter ``getCurrencyId()`` to get ``CurrencyId``
     * @dataProvider dataProviderShipping
     * @cover ::getCurrencyId
     * @small
     *
     * @param Shipping $shipping Main Object
     * @param array    $expected Fixture data
     */
    public function testGetCurrencyId(Shipping $shipping, array $expected)
    {
        $shipping->setCurrencyId($expected['currency_id']);
        $this->assertSame($expected['currency_id'], $shipping->getCurrencyId());
    }

    /**
     * @testdox Have a setter ``setCurrencyId()`` to set ``CurrencyId``
     * @dataProvider dataProviderShipping
     * @cover ::setCurrencyId
     * @small
     *
     * @param Shipping $shipping Main Object
     * @param array    $expected Fixture data
     */
    public function testSetCurrencyId(Shipping $shipping, array $expected)
    {
        $shipping->setCurrencyId($expected['currency_id']);
        $this->assertSame($expected['currency_id'], $shipping->getCurrencyId());
    }

    /**
     * @testdox Have a getter ``getDateCreated()`` to get ``DateCreated``
     * @dataProvider dataProviderShipping
     * @cover ::getDateCreated
     * @small
     *
     * @param Shipping $shipping Main Object
     * @param array    $expected Fixture data
     */
    public function testGetDateCreated(Shipping $shipping, array $expected)
    {
        $shipping->setDateCreated($expected['date_created']);
        $this->assertSame($expected['date_created'], $shipping->getDateCreated());
    }

    /**
     * @testdox Have a setter ``setDateCreated()`` to set ``DateCreated``
     * @dataProvider dataProviderShipping
     * @cover ::setDateCreated
     * @small
     *
     * @param Shipping $shipping Main Object
     * @param array    $expected Fixture data
     */
    public function testSetDateCreated(Shipping $shipping, array $expected)
    {
        $shipping->setDateCreated($expected['date_created']);
        $this->assertSame($expected['date_created'], $shipping->getDateCreated());
    }

    /**
     * @testdox Have a getter ``getDateFirstPrinted()`` to get ``DateFirstPrinted``
     * @dataProvider dataProviderShipping
     * @cover ::getDateFirstPrinted
     * @small
     *
     * @param Shipping $shipping Main Object
     * @param array    $expected Fixture data
     */
    public function testGetDateFirstPrinted(Shipping $shipping, array $expected)
    {
        $shipping->setDateFirstPrinted($expected['date_first_printed']);
        $this->assertSame($expected['date_first_printed'], $shipping->getDateFirstPrinted());
    }

    /**
     * @testdox Have a setter ``setDateFirstPrinted()`` to set ``DateFirstPrinted``
     * @dataProvider dataProviderShipping
     * @cover ::setDateFirstPrinted
     * @small
     *
     * @param Shipping $shipping Main Object
     * @param array    $expected Fixture data
     */
    public function testSetDateFirstPrinted(Shipping $shipping, array $expected)
    {
        $shipping->setDateFirstPrinted($expected['date_first_printed']);
        $this->assertSame($expected['date_first_printed'], $shipping->getDateFirstPrinted());
    }

    /**
     * @testdox Have a getter ``getId()`` to get ``Id``
     * @dataProvider dataProviderShipping
     * @cover ::getId
     * @small
     *
     * @param Shipping $shipping Main Object
     * @param array    $expected Fixture data
     */
    public function testGetId(Shipping $shipping, array $expected)
    {
        $shipping->setId($expected['id']);
        $this->assertSame($expected['id'], $shipping->getId());
    }

    /**
     * @testdox Have a setter ``setId()`` to set ``Id``
     * @dataProvider dataProviderShipping
     * @cover ::setId
     * @small
     *
     * @param Shipping $shipping Main Object
     * @param array    $expected Fixture data
     */
    public function testSetId(Shipping $shipping, array $expected)
    {
        $shipping->setId($expected['id']);
        $this->assertSame($expected['id'], $shipping->getId());
    }

    /**
     * @testdox Have a getter ``getPickingType()`` to get ``PickingType``
     * @dataProvider dataProviderShipping
     * @cover ::getPickingType
     * @small
     *
     * @param Shipping $shipping Main Object
     * @param array    $expected Fixture data
     */
    public function testGetPickingType(Shipping $shipping, array $expected)
    {
        $shipping->setPickingType($expected['picking_type']);
        $this->assertSame($expected['picking_type'], $shipping->getPickingType());
    }

    /**
     * @testdox Have a setter ``setPickingType()`` to set ``PickingType``
     * @dataProvider dataProviderShipping
     * @cover ::setPickingType
     * @small
     *
     * @param Shipping $shipping Main Object
     * @param array    $expected Fixture data
     */
    public function testSetPickingType(Shipping $shipping, array $expected)
    {
        $shipping->setPickingType($expected['picking_type']);
        $this->assertSame($expected['picking_type'], $shipping->getPickingType());
    }

    /**
     * @testdox Have a getter ``getReceiverAddress()`` to get ``ReceiverAddress``
     * @dataProvider dataProviderShipping
     * @cover ::getReceiverAddress
     * @small
     *
     * @param Shipping $shipping Main Object
     * @param array    $expected Fixture data
     */
    public function testGetReceiverAddress(Shipping $shipping, array $expected)
    {
        $shipping->setReceiverAddress($expected['receiver_address']);
        $this->assertSame($expected['receiver_address'], $shipping->getReceiverAddress());
    }

    /**
     * @testdox Have a setter ``setReceiverAddress()`` to set ``ReceiverAddress``
     * @dataProvider dataProviderShipping
     * @cover ::setReceiverAddress
     * @small
     *
     * @param Shipping $shipping Main Object
     * @param array    $expected Fixture data
     */
    public function testSetReceiverAddress(Shipping $shipping, array $expected)
    {
        $shipping->setReceiverAddress($expected['receiver_address']);
        $this->assertSame($expected['receiver_address'], $shipping->getReceiverAddress());
    }

    /**
     * @testdox Have a getter ``getSenderId()`` to get ``SenderId``
     * @dataProvider dataProviderShipping
     * @cover ::getSenderId
     * @small
     *
     * @param Shipping $shipping Main Object
     * @param array    $expected Fixture data
     */
    public function testGetSenderId(Shipping $shipping, array $expected)
    {
        $shipping->setSenderId($expected['sender_id']);
        $this->assertSame($expected['sender_id'], $shipping->getSenderId());
    }

    /**
     * @testdox Have a setter ``setSenderId()`` to set ``SenderId``
     * @dataProvider dataProviderShipping
     * @cover ::setSenderId
     * @small
     *
     * @param Shipping $shipping Main Object
     * @param array    $expected Fixture data
     */
    public function testSetSenderId(Shipping $shipping, array $expected)
    {
        $shipping->setSenderId($expected['sender_id']);
        $this->assertSame($expected['sender_id'], $shipping->getSenderId());
    }

    /**
     * @testdox Have a getter ``getServiceId()`` to get ``ServiceId``
     * @dataProvider dataProviderShipping
     * @cover ::getServiceId
     * @small
     *
     * @param Shipping $shipping Main Object
     * @param array    $expected Fixture data
     */
    public function testGetServiceId(Shipping $shipping, array $expected)
    {
        $shipping->setServiceId($expected['service_id']);
        $this->assertSame($expected['service_id'], $shipping->getServiceId());
    }

    /**
     * @testdox Have a setter ``setServiceId()`` to set ``ServiceId``
     * @dataProvider dataProviderShipping
     * @cover ::setServiceId
     * @small
     *
     * @param Shipping $shipping Main Object
     * @param array    $expected Fixture data
     */
    public function testSetServiceId(Shipping $shipping, array $expected)
    {
        $shipping->setServiceId($expected['service_id']);
        $this->assertSame($expected['service_id'], $shipping->getServiceId());
    }

    /**
     * @testdox Have a getter ``getShipmentType()`` to get ``ShipmentType``
     * @dataProvider dataProviderShipping
     * @cover ::getShipmentType
     * @small
     *
     * @param Shipping $shipping Main Object
     * @param array    $expected Fixture data
     */
    public function testGetShipmentType(Shipping $shipping, array $expected)
    {
        $shipping->setShipmentType($expected['shipment_type']);
        $this->assertSame($expected['shipment_type'], $shipping->getShipmentType());
    }

    /**
     * @testdox Have a setter ``setShipmentType()`` to set ``ShipmentType``
     * @dataProvider dataProviderShipping
     * @cover ::setShipmentType
     * @small
     *
     * @param Shipping $shipping Main Object
     * @param array    $expected Fixture data
     */
    public function testSetShipmentType(Shipping $shipping, array $expected)
    {
        $shipping->setShipmentType($expected['shipment_type']);
        $this->assertSame($expected['shipment_type'], $shipping->getShipmentType());
    }

    /**
     * @testdox Have a getter ``getShippingItems()`` to get ``ShippingItems``
     * @dataProvider dataProviderShipping
     * @cover ::getShippingItems
     * @small
     *
     * @param Shipping $shipping Main Object
     * @param array    $expected Fixture data
     */
    public function testGetShippingItems(Shipping $shipping, array $expected)
    {
        $shipping->setShippingItems($expected['shipping_items']);
        $this->assertSame($expected['shipping_items'], $shipping->getShippingItems());
    }

    /**
     * @testdox Have a setter ``setShippingItems()`` to set ``ShippingItems``
     * @dataProvider dataProviderShipping
     * @cover ::setShippingItems
     * @small
     *
     * @param Shipping $shipping Main Object
     * @param array    $expected Fixture data
     */
    public function testSetShippingItems(Shipping $shipping, array $expected)
    {
        $shipping->setShippingItems($expected['shipping_items']);
        $this->assertSame($expected['shipping_items'], $shipping->getShippingItems());
    }

    /**
     * @testdox Have a getter ``getShippingMode()`` to get ``ShippingMode``
     * @dataProvider dataProviderShipping
     * @cover ::getShippingMode
     * @small
     *
     * @param Shipping $shipping Main Object
     * @param array    $expected Fixture data
     */
    public function testGetShippingMode(Shipping $shipping, array $expected)
    {
        $shipping->setShippingMode($expected['shipping_mode']);
        $this->assertSame($expected['shipping_mode'], $shipping->getShippingMode());
    }

    /**
     * @testdox Have a setter ``setShippingMode()`` to set ``ShippingMode``
     * @dataProvider dataProviderShipping
     * @cover ::setShippingMode
     * @small
     *
     * @param Shipping $shipping Main Object
     * @param array    $expected Fixture data
     */
    public function testSetShippingMode(Shipping $shipping, array $expected)
    {
        $shipping->setShippingMode($expected['shipping_mode']);
        $this->assertSame($expected['shipping_mode'], $shipping->getShippingMode());
    }

    /**
     * @testdox Have a getter ``getShippingOption()`` to get ``ShippingOption``
     * @dataProvider dataProviderShipping
     * @cover ::getShippingOption
     * @small
     *
     * @param Shipping $shipping Main Object
     * @param array    $expected Fixture data
     */
    public function testGetShippingOption(Shipping $shipping, array $expected)
    {
        $shipping->setShippingOption($expected['shipping_option']);
        $this->assertSame($expected['shipping_option'], $shipping->getShippingOption());
    }

    /**
     * @testdox Have a setter ``setShippingOption()`` to set ``ShippingOption``
     * @dataProvider dataProviderShipping
     * @cover ::setShippingOption
     * @small
     *
     * @param Shipping $shipping Main Object
     * @param array    $expected Fixture data
     */
    public function testSetShippingOption(Shipping $shipping, array $expected)
    {
        $shipping->setShippingOption($expected['shipping_option']);
        $this->assertSame($expected['shipping_option'], $shipping->getShippingOption());
    }

    /**
     * @testdox Have a getter ``getStatus()`` to get ``Status``
     * @dataProvider dataProviderShipping
     * @cover ::getStatus
     * @small
     *
     * @param Shipping $shipping Main Object
     * @param array    $expected Fixture data
     */
    public function testGetStatus(Shipping $shipping, array $expected)
    {
        $shipping->setStatus($expected['status']);
        $this->assertSame($expected['status'], $shipping->getStatus());
    }

    /**
     * @testdox Have a setter ``setStatus()`` to set ``Status``
     * @dataProvider dataProviderShipping
     * @cover ::setStatus
     * @small
     *
     * @param Shipping $shipping Main Object
     * @param array    $expected Fixture data
     */
    public function testSetStatus(Shipping $shipping, array $expected)
    {
        $shipping->setStatus($expected['status']);
        $this->assertSame($expected['status'], $shipping->getStatus());
    }

    /**
     * @testdox Have a getter ``getSubstatus()`` to get ``Substatus``
     * @dataProvider dataProviderShipping
     * @cover ::getSubstatus
     * @small
     *
     * @param Shipping $shipping Main Object
     * @param array    $expected Fixture data
     */
    public function testGetSubstatus(Shipping $shipping, array $expected)
    {
        $shipping->setSubstatus($expected['substatus']);
        $this->assertSame($expected['substatus'], $shipping->getSubstatus());
    }

    /**
     * @testdox Have a setter ``setSubstatus()`` to set ``Substatus``
     * @dataProvider dataProviderShipping
     * @cover ::setSubstatus
     * @small
     *
     * @param Shipping $shipping Main Object
     * @param array    $expected Fixture data
     */
    public function testSetSubstatus(Shipping $shipping, array $expected)
    {
        $shipping->setSubstatus($expected['substatus']);
        $this->assertSame($expected['substatus'], $shipping->getSubstatus());
    }
}
