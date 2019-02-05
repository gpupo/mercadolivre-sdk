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

namespace  Gpupo\MercadolivreSdk\Tests\Entity\Order\Buyer;

use Gpupo\CommonSdk\Tests\Traits\EntityTrait;
use Gpupo\MercadolivreSdk\Entity\Order\Buyer\BillingInfo;
use PHPUnit\Framework\TestCase as CoreTestCase;

/**
 * @coversDefaultClass \Gpupo\MercadolivreSdk\Entity\Order\Buyer\BillingInfo
 */
class BillingInfoTest extends CoreTestCase
{
    use EntityTrait;

    const QUALIFIED = BillingInfo::class;

    public static function setUpBeforeClass(): void
    {
        static::setFullyQualifiedObject(self::QUALIFIED);
        parent::setUpBeforeClass();

    }

    /**
     * @return BillingInfo
     */
    public function dataProviderBillingInfo()
    {
        $expected = [
            'doc_type' => 'string',
            'doc_number' => 'string',
        ];

        return $this->dataProviderEntitySchema(self::QUALIFIED, $expected);
    }

    /**
     * @testdox Have a getter ``getDocType()`` to get ``DocType``
     * @dataProvider dataProviderBillingInfo
     * @cover ::getDocType
     * @small
     *
     * @param BillingInfo $billingInfo Main Object
     * @param array       $expected    Fixture data
     */
    public function testGetDocType(BillingInfo $billingInfo, array $expected)
    {
        $billingInfo->setDocType($expected['doc_type']);
        $this->assertSame($expected['doc_type'], $billingInfo->getDocType());
    }

    /**
     * @testdox Have a setter ``setDocType()`` to set ``DocType``
     * @dataProvider dataProviderBillingInfo
     * @cover ::setDocType
     * @small
     *
     * @param BillingInfo $billingInfo Main Object
     * @param array       $expected    Fixture data
     */
    public function testSetDocType(BillingInfo $billingInfo, array $expected)
    {
        $billingInfo->setDocType($expected['doc_type']);
        $this->assertSame($expected['doc_type'], $billingInfo->getDocType());
    }

    /**
     * @testdox Have a getter ``getDocNumber()`` to get ``DocNumber``
     * @dataProvider dataProviderBillingInfo
     * @cover ::getDocNumber
     * @small
     *
     * @param BillingInfo $billingInfo Main Object
     * @param array       $expected    Fixture data
     */
    public function testGetDocNumber(BillingInfo $billingInfo, array $expected)
    {
        $billingInfo->setDocNumber($expected['doc_number']);
        $this->assertSame($expected['doc_number'], $billingInfo->getDocNumber());
    }

    /**
     * @testdox Have a setter ``setDocNumber()`` to set ``DocNumber``
     * @dataProvider dataProviderBillingInfo
     * @cover ::setDocNumber
     * @small
     *
     * @param BillingInfo $billingInfo Main Object
     * @param array       $expected    Fixture data
     */
    public function testSetDocNumber(BillingInfo $billingInfo, array $expected)
    {
        $billingInfo->setDocNumber($expected['doc_number']);
        $this->assertSame($expected['doc_number'], $billingInfo->getDocNumber());
    }
}
