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
use Gpupo\MercadolivreSdk\Entity\Order\Shipping\Speed;
use PHPUnit\Framework\TestCase as CoreTestCase;

/**
 * @coversDefaultClass \Gpupo\MercadolivreSdk\Entity\Order\Shipping\Speed
 *
 * @method string getHandling()                 A $handling acessor.
 * @method        setHandling(string $handling) A $handling setter
 * @method string getShipping()                 A $shipping acessor.
 * @method        setShipping(string $shipping) A $shipping setter
 */
class SpeedTest extends CoreTestCase
{
    use EntityTrait;

    const QUALIFIED = Speed::class;

    public static function setUpBeforeClass(): void
    {
        static::setFullyQualifiedObject(self::QUALIFIED);
        parent::setUpBeforeClass();

    }

    /**
     * @return Speed
     */
    public function dataProviderSpeed()
    {
        $expected = [
            'handling' => 'string',
            'shipping' => 'string',
        ];

        return $this->dataProviderEntitySchema(self::QUALIFIED, $expected);
    }

    /**
     * @testdox Have a getter ``getHandling()`` to get ``Handling``
     * @dataProvider dataProviderSpeed
     * @cover ::getHandling
     * @small
     *
     * @param Speed $speed    Main Object
     * @param array $expected Fixture data
     */
    public function testGetHandling(Speed $speed, array $expected)
    {
        $speed->setHandling($expected['handling']);
        $this->assertSame($expected['handling'], $speed->getHandling());
    }

    /**
     * @testdox Have a setter ``setHandling()`` to set ``Handling``
     * @dataProvider dataProviderSpeed
     * @cover ::setHandling
     * @small
     *
     * @param Speed $speed    Main Object
     * @param array $expected Fixture data
     */
    public function testSetHandling(Speed $speed, array $expected)
    {
        $speed->setHandling($expected['handling']);
        $this->assertSame($expected['handling'], $speed->getHandling());
    }

    /**
     * @testdox Have a getter ``getShipping()`` to get ``Shipping``
     * @dataProvider dataProviderSpeed
     * @cover ::getShipping
     * @small
     *
     * @param Speed $speed    Main Object
     * @param array $expected Fixture data
     */
    public function testGetShipping(Speed $speed, array $expected)
    {
        $speed->setShipping($expected['shipping']);
        $this->assertSame($expected['shipping'], $speed->getShipping());
    }

    /**
     * @testdox Have a setter ``setShipping()`` to set ``Shipping``
     * @dataProvider dataProviderSpeed
     * @cover ::setShipping
     * @small
     *
     * @param Speed $speed    Main Object
     * @param array $expected Fixture data
     */
    public function testSetShipping(Speed $speed, array $expected)
    {
        $speed->setShipping($expected['shipping']);
        $this->assertSame($expected['shipping'], $speed->getShipping());
    }
}
