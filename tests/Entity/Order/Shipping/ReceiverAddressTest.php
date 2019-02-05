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
use Gpupo\MercadolivreSdk\Entity\Order\Shipping\ReceiverAddress;
use PHPUnit\Framework\TestCase as CoreTestCase;

/**
 * @coversDefaultClass \Gpupo\MercadolivreSdk\Entity\Order\Shipping\ReceiverAddress
 *
 * @method string                                              getAddressLine()                                                         A $address_line acessor.
 * @method                                                     setAddressLine(string $address_line)                                     A $address_line setter
 * @method Gpupo\MercadolivreSdk\Entity\Order\Shipping\City    getCity()                                                                A $city acessor.
 * @method                                                     setCity(Gpupo\MercadolivreSdk\Entity\Order\Shipping\City $city)          A $city setter
 * @method string                                              getComment()                                                             A $comment acessor.
 * @method                                                     setComment(string $comment)                                              A $comment setter
 * @method Gpupo\MercadolivreSdk\Entity\Order\Shipping\Country getCountry()                                                             A $country acessor.
 * @method                                                     setCountry(Gpupo\MercadolivreSdk\Entity\Order\Shipping\Country $country) A $country setter
 * @method int                                                 getId()                                                                  A $id acessor.
 * @method                                                     setId(integer $id)                                                       A $id setter
 * @method string                                              getLatitude()                                                            A $latitude acessor.
 * @method                                                     setLatitude(string $latitude)                                            A $latitude setter
 * @method string                                              getLongitude()                                                           A $longitude acessor.
 * @method                                                     setLongitude(string $longitude)                                          A $longitude setter
 * @method Gpupo\MercadolivreSdk\Entity\Order\Shipping\State   getState()                                                               A $state acessor.
 * @method                                                     setState(Gpupo\MercadolivreSdk\Entity\Order\Shipping\State $state)       A $state setter
 * @method string                                              getStreetName()                                                          A $street_name acessor.
 * @method                                                     setStreetName(string $street_name)                                       A $street_name setter
 * @method string                                              getStreetNumber()                                                        A $street_number acessor.
 * @method                                                     setStreetNumber(string $street_number)                                   A $street_number setter
 * @method string                                              getZipCode()                                                             A $zip_code acessor.
 * @method                                                     setZipCode(string $zip_code)                                             A $zip_code setter
 */
class ReceiverAddressTest extends CoreTestCase
{
    use EntityTrait;

    const QUALIFIED = ReceiverAddress::class;

    public static function setUpBeforeClass(): void
    {
        static::setFullyQualifiedObject(self::QUALIFIED);
        parent::setUpBeforeClass(): void;
    }

    /**
     * @return ReceiverAddress
     */
    public function dataProviderReceiverAddress()
    {
        $expected = [
            'address_line' => 'string',
            'city' => 'object',
            'comment' => 'string',
            'country' => 'object',
            'id' => 'integer',
            'latitude' => 'string',
            'longitude' => 'string',
            'state' => 'object',
            'street_name' => 'string',
            'street_number' => 'string',
            'zip_code' => 'string',
        ];

        return $this->dataProviderEntitySchema(self::QUALIFIED, $expected);
    }

    /**
     * @testdox Have a getter ``getAddressLine()`` to get ``AddressLine``
     * @dataProvider dataProviderReceiverAddress
     * @cover ::getAddressLine
     * @small
     *
     * @param ReceiverAddress $receiverAddress Main Object
     * @param array           $expected        Fixture data
     */
    public function testGetAddressLine(ReceiverAddress $receiverAddress, array $expected)
    {
        $receiverAddress->setAddressLine($expected['address_line']);
        $this->assertSame($expected['address_line'], $receiverAddress->getAddressLine());
    }

    /**
     * @testdox Have a setter ``setAddressLine()`` to set ``AddressLine``
     * @dataProvider dataProviderReceiverAddress
     * @cover ::setAddressLine
     * @small
     *
     * @param ReceiverAddress $receiverAddress Main Object
     * @param array           $expected        Fixture data
     */
    public function testSetAddressLine(ReceiverAddress $receiverAddress, array $expected)
    {
        $receiverAddress->setAddressLine($expected['address_line']);
        $this->assertSame($expected['address_line'], $receiverAddress->getAddressLine());
    }

    /**
     * @testdox Have a getter ``getCity()`` to get ``City``
     * @dataProvider dataProviderReceiverAddress
     * @cover ::getCity
     * @small
     *
     * @param ReceiverAddress $receiverAddress Main Object
     * @param array           $expected        Fixture data
     */
    public function testGetCity(ReceiverAddress $receiverAddress, array $expected)
    {
        $receiverAddress->setCity($expected['city']);
        $this->assertSame($expected['city'], $receiverAddress->getCity());
    }

    /**
     * @testdox Have a setter ``setCity()`` to set ``City``
     * @dataProvider dataProviderReceiverAddress
     * @cover ::setCity
     * @small
     *
     * @param ReceiverAddress $receiverAddress Main Object
     * @param array           $expected        Fixture data
     */
    public function testSetCity(ReceiverAddress $receiverAddress, array $expected)
    {
        $receiverAddress->setCity($expected['city']);
        $this->assertSame($expected['city'], $receiverAddress->getCity());
    }

    /**
     * @testdox Have a getter ``getComment()`` to get ``Comment``
     * @dataProvider dataProviderReceiverAddress
     * @cover ::getComment
     * @small
     *
     * @param ReceiverAddress $receiverAddress Main Object
     * @param array           $expected        Fixture data
     */
    public function testGetComment(ReceiverAddress $receiverAddress, array $expected)
    {
        $receiverAddress->setComment($expected['comment']);
        $this->assertSame($expected['comment'], $receiverAddress->getComment());
    }

    /**
     * @testdox Have a setter ``setComment()`` to set ``Comment``
     * @dataProvider dataProviderReceiverAddress
     * @cover ::setComment
     * @small
     *
     * @param ReceiverAddress $receiverAddress Main Object
     * @param array           $expected        Fixture data
     */
    public function testSetComment(ReceiverAddress $receiverAddress, array $expected)
    {
        $receiverAddress->setComment($expected['comment']);
        $this->assertSame($expected['comment'], $receiverAddress->getComment());
    }

    /**
     * @testdox Have a getter ``getCountry()`` to get ``Country``
     * @dataProvider dataProviderReceiverAddress
     * @cover ::getCountry
     * @small
     *
     * @param ReceiverAddress $receiverAddress Main Object
     * @param array           $expected        Fixture data
     */
    public function testGetCountry(ReceiverAddress $receiverAddress, array $expected)
    {
        $receiverAddress->setCountry($expected['country']);
        $this->assertSame($expected['country'], $receiverAddress->getCountry());
    }

    /**
     * @testdox Have a setter ``setCountry()`` to set ``Country``
     * @dataProvider dataProviderReceiverAddress
     * @cover ::setCountry
     * @small
     *
     * @param ReceiverAddress $receiverAddress Main Object
     * @param array           $expected        Fixture data
     */
    public function testSetCountry(ReceiverAddress $receiverAddress, array $expected)
    {
        $receiverAddress->setCountry($expected['country']);
        $this->assertSame($expected['country'], $receiverAddress->getCountry());
    }

    /**
     * @testdox Have a getter ``getId()`` to get ``Id``
     * @dataProvider dataProviderReceiverAddress
     * @cover ::getId
     * @small
     *
     * @param ReceiverAddress $receiverAddress Main Object
     * @param array           $expected        Fixture data
     */
    public function testGetId(ReceiverAddress $receiverAddress, array $expected)
    {
        $receiverAddress->setId($expected['id']);
        $this->assertSame($expected['id'], $receiverAddress->getId());
    }

    /**
     * @testdox Have a setter ``setId()`` to set ``Id``
     * @dataProvider dataProviderReceiverAddress
     * @cover ::setId
     * @small
     *
     * @param ReceiverAddress $receiverAddress Main Object
     * @param array           $expected        Fixture data
     */
    public function testSetId(ReceiverAddress $receiverAddress, array $expected)
    {
        $receiverAddress->setId($expected['id']);
        $this->assertSame($expected['id'], $receiverAddress->getId());
    }

    /**
     * @testdox Have a getter ``getLatitude()`` to get ``Latitude``
     * @dataProvider dataProviderReceiverAddress
     * @cover ::getLatitude
     * @small
     *
     * @param ReceiverAddress $receiverAddress Main Object
     * @param array           $expected        Fixture data
     */
    public function testGetLatitude(ReceiverAddress $receiverAddress, array $expected)
    {
        $receiverAddress->setLatitude($expected['latitude']);
        $this->assertSame($expected['latitude'], $receiverAddress->getLatitude());
    }

    /**
     * @testdox Have a setter ``setLatitude()`` to set ``Latitude``
     * @dataProvider dataProviderReceiverAddress
     * @cover ::setLatitude
     * @small
     *
     * @param ReceiverAddress $receiverAddress Main Object
     * @param array           $expected        Fixture data
     */
    public function testSetLatitude(ReceiverAddress $receiverAddress, array $expected)
    {
        $receiverAddress->setLatitude($expected['latitude']);
        $this->assertSame($expected['latitude'], $receiverAddress->getLatitude());
    }

    /**
     * @testdox Have a getter ``getLongitude()`` to get ``Longitude``
     * @dataProvider dataProviderReceiverAddress
     * @cover ::getLongitude
     * @small
     *
     * @param ReceiverAddress $receiverAddress Main Object
     * @param array           $expected        Fixture data
     */
    public function testGetLongitude(ReceiverAddress $receiverAddress, array $expected)
    {
        $receiverAddress->setLongitude($expected['longitude']);
        $this->assertSame($expected['longitude'], $receiverAddress->getLongitude());
    }

    /**
     * @testdox Have a setter ``setLongitude()`` to set ``Longitude``
     * @dataProvider dataProviderReceiverAddress
     * @cover ::setLongitude
     * @small
     *
     * @param ReceiverAddress $receiverAddress Main Object
     * @param array           $expected        Fixture data
     */
    public function testSetLongitude(ReceiverAddress $receiverAddress, array $expected)
    {
        $receiverAddress->setLongitude($expected['longitude']);
        $this->assertSame($expected['longitude'], $receiverAddress->getLongitude());
    }

    /**
     * @testdox Have a getter ``getState()`` to get ``State``
     * @dataProvider dataProviderReceiverAddress
     * @cover ::getState
     * @small
     *
     * @param ReceiverAddress $receiverAddress Main Object
     * @param array           $expected        Fixture data
     */
    public function testGetState(ReceiverAddress $receiverAddress, array $expected)
    {
        $receiverAddress->setState($expected['state']);
        $this->assertSame($expected['state'], $receiverAddress->getState());
    }

    /**
     * @testdox Have a setter ``setState()`` to set ``State``
     * @dataProvider dataProviderReceiverAddress
     * @cover ::setState
     * @small
     *
     * @param ReceiverAddress $receiverAddress Main Object
     * @param array           $expected        Fixture data
     */
    public function testSetState(ReceiverAddress $receiverAddress, array $expected)
    {
        $receiverAddress->setState($expected['state']);
        $this->assertSame($expected['state'], $receiverAddress->getState());
    }

    /**
     * @testdox Have a getter ``getStreetName()`` to get ``StreetName``
     * @dataProvider dataProviderReceiverAddress
     * @cover ::getStreetName
     * @small
     *
     * @param ReceiverAddress $receiverAddress Main Object
     * @param array           $expected        Fixture data
     */
    public function testGetStreetName(ReceiverAddress $receiverAddress, array $expected)
    {
        $receiverAddress->setStreetName($expected['street_name']);
        $this->assertSame($expected['street_name'], $receiverAddress->getStreetName());
    }

    /**
     * @testdox Have a setter ``setStreetName()`` to set ``StreetName``
     * @dataProvider dataProviderReceiverAddress
     * @cover ::setStreetName
     * @small
     *
     * @param ReceiverAddress $receiverAddress Main Object
     * @param array           $expected        Fixture data
     */
    public function testSetStreetName(ReceiverAddress $receiverAddress, array $expected)
    {
        $receiverAddress->setStreetName($expected['street_name']);
        $this->assertSame($expected['street_name'], $receiverAddress->getStreetName());
    }

    /**
     * @testdox Have a getter ``getStreetNumber()`` to get ``StreetNumber``
     * @dataProvider dataProviderReceiverAddress
     * @cover ::getStreetNumber
     * @small
     *
     * @param ReceiverAddress $receiverAddress Main Object
     * @param array           $expected        Fixture data
     */
    public function testGetStreetNumber(ReceiverAddress $receiverAddress, array $expected)
    {
        $receiverAddress->setStreetNumber($expected['street_number']);
        $this->assertSame($expected['street_number'], $receiverAddress->getStreetNumber());
    }

    /**
     * @testdox Have a setter ``setStreetNumber()`` to set ``StreetNumber``
     * @dataProvider dataProviderReceiverAddress
     * @cover ::setStreetNumber
     * @small
     *
     * @param ReceiverAddress $receiverAddress Main Object
     * @param array           $expected        Fixture data
     */
    public function testSetStreetNumber(ReceiverAddress $receiverAddress, array $expected)
    {
        $receiverAddress->setStreetNumber($expected['street_number']);
        $this->assertSame($expected['street_number'], $receiverAddress->getStreetNumber());
    }

    /**
     * @testdox Have a getter ``getZipCode()`` to get ``ZipCode``
     * @dataProvider dataProviderReceiverAddress
     * @cover ::getZipCode
     * @small
     *
     * @param ReceiverAddress $receiverAddress Main Object
     * @param array           $expected        Fixture data
     */
    public function testGetZipCode(ReceiverAddress $receiverAddress, array $expected)
    {
        $receiverAddress->setZipCode($expected['zip_code']);
        $this->assertSame($expected['zip_code'], $receiverAddress->getZipCode());
    }

    /**
     * @testdox Have a setter ``setZipCode()`` to set ``ZipCode``
     * @dataProvider dataProviderReceiverAddress
     * @cover ::setZipCode
     * @small
     *
     * @param ReceiverAddress $receiverAddress Main Object
     * @param array           $expected        Fixture data
     */
    public function testSetZipCode(ReceiverAddress $receiverAddress, array $expected)
    {
        $receiverAddress->setZipCode($expected['zip_code']);
        $this->assertSame($expected['zip_code'], $receiverAddress->getZipCode());
    }
}
