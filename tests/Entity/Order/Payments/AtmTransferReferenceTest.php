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

use Gpupo\MercadolivreSdk\Entity\Order\Payments\AtmTransferReference;
use Gpupo\Tests\CommonSdk\Traits\EntityTrait;
use PHPUnit\Framework\TestCase as CoreTestCase;

/**
 * @coversDefaultClass \Gpupo\MercadolivreSdk\Entity\Order\Payments\AtmTransferReference
 *
 * @method int getCompanyId()                            A $company_id acessor.
 * @method     setCompanyId(integer $company_id)         A $company_id setter
 * @method int getTransactionId()                        A $transaction_id acessor.
 * @method     setTransactionId(integer $transaction_id) A $transaction_id setter
 */
class AtmTransferReferenceTest extends CoreTestCase
{
    use EntityTrait;

    const QUALIFIED = AtmTransferReference::class;

    public static function setUpBeforeClass()
    {
        static::setFullyQualifiedObject(self::QUALIFIED);
        parent::setUpBeforeClass();
    }

    /**
     * @return AtmTransferReference
     */
    public function dataProviderAtmTransferReference()
    {
        $expected = [
            'company_id' => 'integer',
            'transaction_id' => 'integer',
        ];

        return $this->dataProviderEntitySchema(self::QUALIFIED, $expected);
    }

    /**
     * @testdox Have a getter ``getCompanyId()`` to get ``CompanyId``
     * @dataProvider dataProviderAtmTransferReference
     * @cover ::getCompanyId
     * @small
     *
     * @param AtmTransferReference $atmTransferReference Main Object
     * @param array                $expected             Fixture data
     */
    public function testGetCompanyId(AtmTransferReference $atmTransferReference, array $expected)
    {
        $atmTransferReference->setCompanyId($expected['company_id']);
        $this->assertSame($expected['company_id'], $atmTransferReference->getCompanyId());
    }

    /**
     * @testdox Have a setter ``setCompanyId()`` to set ``CompanyId``
     * @dataProvider dataProviderAtmTransferReference
     * @cover ::setCompanyId
     * @small
     *
     * @param AtmTransferReference $atmTransferReference Main Object
     * @param array                $expected             Fixture data
     */
    public function testSetCompanyId(AtmTransferReference $atmTransferReference, array $expected)
    {
        $atmTransferReference->setCompanyId($expected['company_id']);
        $this->assertSame($expected['company_id'], $atmTransferReference->getCompanyId());
    }

    /**
     * @testdox Have a getter ``getTransactionId()`` to get ``TransactionId``
     * @dataProvider dataProviderAtmTransferReference
     * @cover ::getTransactionId
     * @small
     *
     * @param AtmTransferReference $atmTransferReference Main Object
     * @param array                $expected             Fixture data
     */
    public function testGetTransactionId(AtmTransferReference $atmTransferReference, array $expected)
    {
        $atmTransferReference->setTransactionId($expected['transaction_id']);
        $this->assertSame($expected['transaction_id'], $atmTransferReference->getTransactionId());
    }

    /**
     * @testdox Have a setter ``setTransactionId()`` to set ``TransactionId``
     * @dataProvider dataProviderAtmTransferReference
     * @cover ::setTransactionId
     * @small
     *
     * @param AtmTransferReference $atmTransferReference Main Object
     * @param array                $expected             Fixture data
     */
    public function testSetTransactionId(AtmTransferReference $atmTransferReference, array $expected)
    {
        $atmTransferReference->setTransactionId($expected['transaction_id']);
        $this->assertSame($expected['transaction_id'], $atmTransferReference->getTransactionId());
    }
}
