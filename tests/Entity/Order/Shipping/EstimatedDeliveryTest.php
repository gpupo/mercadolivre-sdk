<?php

declare(strict_types=1);

/*
 * This file is part of gpupo/mercadolivre-sdk created by Gilmar Pupo <contact@gpupo.com>
 * For the information of copyright and license you should read the file LICENSE which is
 * distributed with this source code. For more information, see <https://opensource.gpupo.com/>
 */

namespace  Gpupo\MercadolivreSdk\Tests\Entity\Order\Shipping;

use Gpupo\CommonSdk\Tests\Traits\EntityTrait;
use Gpupo\MercadolivreSdk\Entity\Order\Shipping\EstimatedDelivery;
use PHPUnit\Framework\TestCase as CoreTestCase;

/**
 * @coversDefaultClass \Gpupo\MercadolivreSdk\Entity\Order\Shipping\EstimatedDelivery
 *
 * @method string getDate()                      A $date acessor.
 * @method        setDate(string $date)          A $date setter
 * @method string getTimeFrom()                  A $time_from acessor.
 * @method        setTimeFrom(string $time_from) A $time_from setter
 * @method string getTimeTo()                    A $time_to acessor.
 * @method        setTimeTo(string $time_to)     A $time_to setter
 */
class EstimatedDeliveryTest extends CoreTestCase
{
    use EntityTrait;

    const QUALIFIED = EstimatedDelivery::class;

    public static function setUpBeforeClass(): void
    {
        static::setFullyQualifiedObject(self::QUALIFIED);
        parent::setUpBeforeClass();
    }

    /**
     * @return EstimatedDelivery
     */
    public function dataProviderEstimatedDelivery()
    {
        $expected = [
            'date' => 'string',
            'time_from' => 'string',
            'time_to' => 'string',
        ];

        return $this->dataProviderEntitySchema(self::QUALIFIED, $expected);
    }

    /**
     * @testdox Have a getter ``getDate()`` to get ``Date``
     * @dataProvider dataProviderEstimatedDelivery
     * @cover ::getDate
     * @small
     *
     * @param EstimatedDelivery $estimatedDelivery Main Object
     * @param array             $expected          Fixture data
     */
    public function testGetDate(EstimatedDelivery $estimatedDelivery, array $expected)
    {
        $estimatedDelivery->setDate($expected['date']);
        $this->assertSame($expected['date'], $estimatedDelivery->getDate());
    }

    /**
     * @testdox Have a setter ``setDate()`` to set ``Date``
     * @dataProvider dataProviderEstimatedDelivery
     * @cover ::setDate
     * @small
     *
     * @param EstimatedDelivery $estimatedDelivery Main Object
     * @param array             $expected          Fixture data
     */
    public function testSetDate(EstimatedDelivery $estimatedDelivery, array $expected)
    {
        $estimatedDelivery->setDate($expected['date']);
        $this->assertSame($expected['date'], $estimatedDelivery->getDate());
    }

    /**
     * @testdox Have a getter ``getTimeFrom()`` to get ``TimeFrom``
     * @dataProvider dataProviderEstimatedDelivery
     * @cover ::getTimeFrom
     * @small
     *
     * @param EstimatedDelivery $estimatedDelivery Main Object
     * @param array             $expected          Fixture data
     */
    public function testGetTimeFrom(EstimatedDelivery $estimatedDelivery, array $expected)
    {
        $estimatedDelivery->setTimeFrom($expected['time_from']);
        $this->assertSame($expected['time_from'], $estimatedDelivery->getTimeFrom());
    }

    /**
     * @testdox Have a setter ``setTimeFrom()`` to set ``TimeFrom``
     * @dataProvider dataProviderEstimatedDelivery
     * @cover ::setTimeFrom
     * @small
     *
     * @param EstimatedDelivery $estimatedDelivery Main Object
     * @param array             $expected          Fixture data
     */
    public function testSetTimeFrom(EstimatedDelivery $estimatedDelivery, array $expected)
    {
        $estimatedDelivery->setTimeFrom($expected['time_from']);
        $this->assertSame($expected['time_from'], $estimatedDelivery->getTimeFrom());
    }

    /**
     * @testdox Have a getter ``getTimeTo()`` to get ``TimeTo``
     * @dataProvider dataProviderEstimatedDelivery
     * @cover ::getTimeTo
     * @small
     *
     * @param EstimatedDelivery $estimatedDelivery Main Object
     * @param array             $expected          Fixture data
     */
    public function testGetTimeTo(EstimatedDelivery $estimatedDelivery, array $expected)
    {
        $estimatedDelivery->setTimeTo($expected['time_to']);
        $this->assertSame($expected['time_to'], $estimatedDelivery->getTimeTo());
    }

    /**
     * @testdox Have a setter ``setTimeTo()`` to set ``TimeTo``
     * @dataProvider dataProviderEstimatedDelivery
     * @cover ::setTimeTo
     * @small
     *
     * @param EstimatedDelivery $estimatedDelivery Main Object
     * @param array             $expected          Fixture data
     */
    public function testSetTimeTo(EstimatedDelivery $estimatedDelivery, array $expected)
    {
        $estimatedDelivery->setTimeTo($expected['time_to']);
        $this->assertSame($expected['time_to'], $estimatedDelivery->getTimeTo());
    }
}
