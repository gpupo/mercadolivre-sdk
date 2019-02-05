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

namespace  Gpupo\MercadolivreSdk\Tests\Entity\Order\Payments;

use Gpupo\CommonSdk\Tests\Traits\EntityTrait;
use Gpupo\MercadolivreSdk\Entity\Order\Payments\Collector;
use PHPUnit\Framework\TestCase as CoreTestCase;

/**
 * @coversDefaultClass \Gpupo\MercadolivreSdk\Entity\Order\Payments\Collector
 *
 * @method int getId()            A $id acessor.
 * @method     setId(integer $id) A $id setter
 */
class CollectorTest extends CoreTestCase
{
    use EntityTrait;

    const QUALIFIED = Collector::class;

    public static function setUpBeforeClass(): void
    {
        static::setFullyQualifiedObject(self::QUALIFIED);
        parent::setUpBeforeClass(): void;
    }

    /**
     * @return Collector
     */
    public function dataProviderCollector()
    {
        $expected = [
            'id' => 'integer',
        ];

        return $this->dataProviderEntitySchema(self::QUALIFIED, $expected);
    }

    /**
     * @testdox Have a getter ``getId()`` to get ``Id``
     * @dataProvider dataProviderCollector
     * @cover ::getId
     * @small
     *
     * @param Collector $collector Main Object
     * @param array     $expected  Fixture data
     */
    public function testGetId(Collector $collector, array $expected)
    {
        $collector->setId($expected['id']);
        $this->assertSame($expected['id'], $collector->getId());
    }

    /**
     * @testdox Have a setter ``setId()`` to set ``Id``
     * @dataProvider dataProviderCollector
     * @cover ::setId
     * @small
     *
     * @param Collector $collector Main Object
     * @param array     $expected  Fixture data
     */
    public function testSetId(Collector $collector, array $expected)
    {
        $collector->setId($expected['id']);
        $this->assertSame($expected['id'], $collector->getId());
    }
}
