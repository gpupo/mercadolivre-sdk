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
use Gpupo\MercadolivreSdk\Entity\Order\Shipping\ShippingOption;
use PHPUnit\Framework\TestCase as CoreTestCase;

/**
 * @coversDefaultClass \Gpupo\MercadolivreSdk\Entity\Order\Shipping\ShippingOption
 *
 * @method float                                                         getCost()                                                                                               A $cost acessor.
 * @method                                                               setCost(float $cost)                                                                                    A $cost setter
 * @method string                                                        getCurrencyId()                                                                                         A $currency_id acessor.
 * @method                                                               setCurrencyId(string $currency_id)                                                                      A $currency_id setter
 * @method Gpupo\MercadolivreSdk\Entity\Order\Shipping\EstimatedDelivery getEstimatedDelivery()                                                                                  A $estimated_delivery acessor.
 * @method                                                               setEstimatedDelivery(Gpupo\MercadolivreSdk\Entity\Order\Shipping\EstimatedDelivery $estimated_delivery) A $estimated_delivery setter
 * @method int                                                           getId()                                                                                                 A $id acessor.
 * @method                                                               setId(integer $id)                                                                                      A $id setter
 * @method string                                                        getName()                                                                                               A $name acessor.
 * @method                                                               setName(string $name)                                                                                   A $name setter
 * @method int                                                           getShippingMethodId()                                                                                   A $shipping_method_id acessor.
 * @method                                                               setShippingMethodId(integer $shipping_method_id)                                                        A $shipping_method_id setter
 * @method Gpupo\MercadolivreSdk\Entity\Order\Shipping\Speed             getSpeed()                                                                                              A $speed acessor.
 * @method                                                               setSpeed(Gpupo\MercadolivreSdk\Entity\Order\Shipping\Speed $speed)                                      A $speed setter
 */
class ShippingOptionTest extends CoreTestCase
{
    use EntityTrait;

    const QUALIFIED = ShippingOption::class;

    public static function setUpBeforeClass(): void
    {
        static::setFullyQualifiedObject(self::QUALIFIED);
        parent::setUpBeforeClass();

    }

    /**
     * @return ShippingOption
     */
    public function dataProviderShippingOption()
    {
        $expected = [
            'cost' => 'number',
            'currency_id' => 'string',
            'estimated_delivery' => 'object',
            'id' => 'integer',
            'name' => 'string',
            'shipping_method_id' => 'integer',
            'speed' => 'object',
        ];

        return $this->dataProviderEntitySchema(self::QUALIFIED, $expected);
    }

    /**
     * @testdox Have a getter ``getCost()`` to get ``Cost``
     * @dataProvider dataProviderShippingOption
     * @cover ::getCost
     * @small
     *
     * @param ShippingOption $shippingOption Main Object
     * @param array          $expected       Fixture data
     */
    public function testGetCost(ShippingOption $shippingOption, array $expected)
    {
        $shippingOption->setCost($expected['cost']);
        $this->assertSame($expected['cost'], $shippingOption->getCost());
    }

    /**
     * @testdox Have a setter ``setCost()`` to set ``Cost``
     * @dataProvider dataProviderShippingOption
     * @cover ::setCost
     * @small
     *
     * @param ShippingOption $shippingOption Main Object
     * @param array          $expected       Fixture data
     */
    public function testSetCost(ShippingOption $shippingOption, array $expected)
    {
        $shippingOption->setCost($expected['cost']);
        $this->assertSame($expected['cost'], $shippingOption->getCost());
    }

    /**
     * @testdox Have a getter ``getCurrencyId()`` to get ``CurrencyId``
     * @dataProvider dataProviderShippingOption
     * @cover ::getCurrencyId
     * @small
     *
     * @param ShippingOption $shippingOption Main Object
     * @param array          $expected       Fixture data
     */
    public function testGetCurrencyId(ShippingOption $shippingOption, array $expected)
    {
        $shippingOption->setCurrencyId($expected['currency_id']);
        $this->assertSame($expected['currency_id'], $shippingOption->getCurrencyId());
    }

    /**
     * @testdox Have a setter ``setCurrencyId()`` to set ``CurrencyId``
     * @dataProvider dataProviderShippingOption
     * @cover ::setCurrencyId
     * @small
     *
     * @param ShippingOption $shippingOption Main Object
     * @param array          $expected       Fixture data
     */
    public function testSetCurrencyId(ShippingOption $shippingOption, array $expected)
    {
        $shippingOption->setCurrencyId($expected['currency_id']);
        $this->assertSame($expected['currency_id'], $shippingOption->getCurrencyId());
    }

    /**
     * @testdox Have a getter ``getEstimatedDelivery()`` to get ``EstimatedDelivery``
     * @dataProvider dataProviderShippingOption
     * @cover ::getEstimatedDelivery
     * @small
     *
     * @param ShippingOption $shippingOption Main Object
     * @param array          $expected       Fixture data
     */
    public function testGetEstimatedDelivery(ShippingOption $shippingOption, array $expected)
    {
        $shippingOption->setEstimatedDelivery($expected['estimated_delivery']);
        $this->assertSame($expected['estimated_delivery'], $shippingOption->getEstimatedDelivery());
    }

    /**
     * @testdox Have a setter ``setEstimatedDelivery()`` to set ``EstimatedDelivery``
     * @dataProvider dataProviderShippingOption
     * @cover ::setEstimatedDelivery
     * @small
     *
     * @param ShippingOption $shippingOption Main Object
     * @param array          $expected       Fixture data
     */
    public function testSetEstimatedDelivery(ShippingOption $shippingOption, array $expected)
    {
        $shippingOption->setEstimatedDelivery($expected['estimated_delivery']);
        $this->assertSame($expected['estimated_delivery'], $shippingOption->getEstimatedDelivery());
    }

    /**
     * @testdox Have a getter ``getId()`` to get ``Id``
     * @dataProvider dataProviderShippingOption
     * @cover ::getId
     * @small
     *
     * @param ShippingOption $shippingOption Main Object
     * @param array          $expected       Fixture data
     */
    public function testGetId(ShippingOption $shippingOption, array $expected)
    {
        $shippingOption->setId($expected['id']);
        $this->assertSame($expected['id'], $shippingOption->getId());
    }

    /**
     * @testdox Have a setter ``setId()`` to set ``Id``
     * @dataProvider dataProviderShippingOption
     * @cover ::setId
     * @small
     *
     * @param ShippingOption $shippingOption Main Object
     * @param array          $expected       Fixture data
     */
    public function testSetId(ShippingOption $shippingOption, array $expected)
    {
        $shippingOption->setId($expected['id']);
        $this->assertSame($expected['id'], $shippingOption->getId());
    }

    /**
     * @testdox Have a getter ``getName()`` to get ``Name``
     * @dataProvider dataProviderShippingOption
     * @cover ::getName
     * @small
     *
     * @param ShippingOption $shippingOption Main Object
     * @param array          $expected       Fixture data
     */
    public function testGetName(ShippingOption $shippingOption, array $expected)
    {
        $shippingOption->setName($expected['name']);
        $this->assertSame($expected['name'], $shippingOption->getName());
    }

    /**
     * @testdox Have a setter ``setName()`` to set ``Name``
     * @dataProvider dataProviderShippingOption
     * @cover ::setName
     * @small
     *
     * @param ShippingOption $shippingOption Main Object
     * @param array          $expected       Fixture data
     */
    public function testSetName(ShippingOption $shippingOption, array $expected)
    {
        $shippingOption->setName($expected['name']);
        $this->assertSame($expected['name'], $shippingOption->getName());
    }

    /**
     * @testdox Have a getter ``getShippingMethodId()`` to get ``ShippingMethodId``
     * @dataProvider dataProviderShippingOption
     * @cover ::getShippingMethodId
     * @small
     *
     * @param ShippingOption $shippingOption Main Object
     * @param array          $expected       Fixture data
     */
    public function testGetShippingMethodId(ShippingOption $shippingOption, array $expected)
    {
        $shippingOption->setShippingMethodId($expected['shipping_method_id']);
        $this->assertSame($expected['shipping_method_id'], $shippingOption->getShippingMethodId());
    }

    /**
     * @testdox Have a setter ``setShippingMethodId()`` to set ``ShippingMethodId``
     * @dataProvider dataProviderShippingOption
     * @cover ::setShippingMethodId
     * @small
     *
     * @param ShippingOption $shippingOption Main Object
     * @param array          $expected       Fixture data
     */
    public function testSetShippingMethodId(ShippingOption $shippingOption, array $expected)
    {
        $shippingOption->setShippingMethodId($expected['shipping_method_id']);
        $this->assertSame($expected['shipping_method_id'], $shippingOption->getShippingMethodId());
    }

    /**
     * @testdox Have a getter ``getSpeed()`` to get ``Speed``
     * @dataProvider dataProviderShippingOption
     * @cover ::getSpeed
     * @small
     *
     * @param ShippingOption $shippingOption Main Object
     * @param array          $expected       Fixture data
     */
    public function testGetSpeed(ShippingOption $shippingOption, array $expected)
    {
        $shippingOption->setSpeed($expected['speed']);
        $this->assertSame($expected['speed'], $shippingOption->getSpeed());
    }

    /**
     * @testdox Have a setter ``setSpeed()`` to set ``Speed``
     * @dataProvider dataProviderShippingOption
     * @cover ::setSpeed
     * @small
     *
     * @param ShippingOption $shippingOption Main Object
     * @param array          $expected       Fixture data
     */
    public function testSetSpeed(ShippingOption $shippingOption, array $expected)
    {
        $shippingOption->setSpeed($expected['speed']);
        $this->assertSame($expected['speed'], $shippingOption->getSpeed());
    }
}
