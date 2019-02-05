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
use Gpupo\MercadolivreSdk\Entity\Order\Buyer\Buyer;
use PHPUnit\Framework\TestCase as CoreTestCase;

/**
 * @coversDefaultClass \Gpupo\MercadolivreSdk\Entity\Order\Buyer\Buyer
 */
class BuyerTest extends CoreTestCase
{
    use EntityTrait;

    const QUALIFIED = Buyer::class;

    public static function setUpBeforeClass(): void
    {
        static::setFullyQualifiedObject(self::QUALIFIED);
        parent::setUpBeforeClass(): void;
    }

    /**
     * @return Buyer
     */
    public function dataProviderBuyer()
    {
        $expected = [
            'id' => 'integer',
            'nickname' => 'string',
            'email' => 'string',
            'phone' => 'object',
            'alternative_phone' => 'object',
            'first_name' => 'string',
            'last_name' => 'string',
            'billing_info' => 'object',
        ];

        return $this->dataProviderEntitySchema(self::QUALIFIED, $expected);
    }

    /**
     * @testdox Have a getter ``getId()`` to get ``Id``
     * @dataProvider dataProviderBuyer
     * @cover ::getId
     * @small
     *
     * @param Buyer $buyer    Main Object
     * @param array $expected Fixture data
     */
    public function testGetId(Buyer $buyer, array $expected)
    {
        $buyer->setId($expected['id']);
        $this->assertSame($expected['id'], $buyer->getId());
    }

    /**
     * @testdox Have a setter ``setId()`` to set ``Id``
     * @dataProvider dataProviderBuyer
     * @cover ::setId
     * @small
     *
     * @param Buyer $buyer    Main Object
     * @param array $expected Fixture data
     */
    public function testSetId(Buyer $buyer, array $expected)
    {
        $buyer->setId($expected['id']);
        $this->assertSame($expected['id'], $buyer->getId());
    }

    /**
     * @testdox Have a getter ``getNickname()`` to get ``Nickname``
     * @dataProvider dataProviderBuyer
     * @cover ::getNickname
     * @small
     *
     * @param Buyer $buyer    Main Object
     * @param array $expected Fixture data
     */
    public function testGetNickname(Buyer $buyer, array $expected)
    {
        $buyer->setNickname($expected['nickname']);
        $this->assertSame($expected['nickname'], $buyer->getNickname());
    }

    /**
     * @testdox Have a setter ``setNickname()`` to set ``Nickname``
     * @dataProvider dataProviderBuyer
     * @cover ::setNickname
     * @small
     *
     * @param Buyer $buyer    Main Object
     * @param array $expected Fixture data
     */
    public function testSetNickname(Buyer $buyer, array $expected)
    {
        $buyer->setNickname($expected['nickname']);
        $this->assertSame($expected['nickname'], $buyer->getNickname());
    }

    /**
     * @testdox Have a getter ``getEmail()`` to get ``Email``
     * @dataProvider dataProviderBuyer
     * @cover ::getEmail
     * @small
     *
     * @param Buyer $buyer    Main Object
     * @param array $expected Fixture data
     */
    public function testGetEmail(Buyer $buyer, array $expected)
    {
        $buyer->setEmail($expected['email']);
        $this->assertSame($expected['email'], $buyer->getEmail());
    }

    /**
     * @testdox Have a setter ``setEmail()`` to set ``Email``
     * @dataProvider dataProviderBuyer
     * @cover ::setEmail
     * @small
     *
     * @param Buyer $buyer    Main Object
     * @param array $expected Fixture data
     */
    public function testSetEmail(Buyer $buyer, array $expected)
    {
        $buyer->setEmail($expected['email']);
        $this->assertSame($expected['email'], $buyer->getEmail());
    }

    /**
     * @testdox Have a getter ``getPhone()`` to get ``Phone``
     * @dataProvider dataProviderBuyer
     * @cover ::getPhone
     * @small
     *
     * @param Buyer $buyer    Main Object
     * @param array $expected Fixture data
     */
    public function testGetPhone(Buyer $buyer, array $expected)
    {
        $buyer->setPhone($expected['phone']);
        $this->assertSame($expected['phone'], $buyer->getPhone());
    }

    /**
     * @testdox Have a setter ``setPhone()`` to set ``Phone``
     * @dataProvider dataProviderBuyer
     * @cover ::setPhone
     * @small
     *
     * @param Buyer $buyer    Main Object
     * @param array $expected Fixture data
     */
    public function testSetPhone(Buyer $buyer, array $expected)
    {
        $buyer->setPhone($expected['phone']);
        $this->assertSame($expected['phone'], $buyer->getPhone());
    }

    /**
     * @testdox Have a getter ``getAlternativePhone()`` to get ``AlternativePhone``
     * @dataProvider dataProviderBuyer
     * @cover ::getAlternativePhone
     * @small
     *
     * @param Buyer $buyer    Main Object
     * @param array $expected Fixture data
     */
    public function testGetAlternativePhone(Buyer $buyer, array $expected)
    {
        $buyer->setAlternativePhone($expected['alternative_phone']);
        $this->assertSame($expected['alternative_phone'], $buyer->getAlternativePhone());
    }

    /**
     * @testdox Have a setter ``setAlternativePhone()`` to set ``AlternativePhone``
     * @dataProvider dataProviderBuyer
     * @cover ::setAlternativePhone
     * @small
     *
     * @param Buyer $buyer    Main Object
     * @param array $expected Fixture data
     */
    public function testSetAlternativePhone(Buyer $buyer, array $expected)
    {
        $buyer->setAlternativePhone($expected['alternative_phone']);
        $this->assertSame($expected['alternative_phone'], $buyer->getAlternativePhone());
    }

    /**
     * @testdox Have a getter ``getFirstName()`` to get ``FirstName``
     * @dataProvider dataProviderBuyer
     * @cover ::getFirstName
     * @small
     *
     * @param Buyer $buyer    Main Object
     * @param array $expected Fixture data
     */
    public function testGetFirstName(Buyer $buyer, array $expected)
    {
        $buyer->setFirstName($expected['first_name']);
        $this->assertSame($expected['first_name'], $buyer->getFirstName());
    }

    /**
     * @testdox Have a setter ``setFirstName()`` to set ``FirstName``
     * @dataProvider dataProviderBuyer
     * @cover ::setFirstName
     * @small
     *
     * @param Buyer $buyer    Main Object
     * @param array $expected Fixture data
     */
    public function testSetFirstName(Buyer $buyer, array $expected)
    {
        $buyer->setFirstName($expected['first_name']);
        $this->assertSame($expected['first_name'], $buyer->getFirstName());
    }

    /**
     * @testdox Have a getter ``getLastName()`` to get ``LastName``
     * @dataProvider dataProviderBuyer
     * @cover ::getLastName
     * @small
     *
     * @param Buyer $buyer    Main Object
     * @param array $expected Fixture data
     */
    public function testGetLastName(Buyer $buyer, array $expected)
    {
        $buyer->setLastName($expected['last_name']);
        $this->assertSame($expected['last_name'], $buyer->getLastName());
    }

    /**
     * @testdox Have a setter ``setLastName()`` to set ``LastName``
     * @dataProvider dataProviderBuyer
     * @cover ::setLastName
     * @small
     *
     * @param Buyer $buyer    Main Object
     * @param array $expected Fixture data
     */
    public function testSetLastName(Buyer $buyer, array $expected)
    {
        $buyer->setLastName($expected['last_name']);
        $this->assertSame($expected['last_name'], $buyer->getLastName());
    }

    /**
     * @testdox Have a getter ``getBillingInfo()`` to get ``BillingInfo``
     * @dataProvider dataProviderBuyer
     * @cover ::getBillingInfo
     * @small
     *
     * @param Buyer $buyer    Main Object
     * @param array $expected Fixture data
     */
    public function testGetBillingInfo(Buyer $buyer, array $expected)
    {
        $buyer->setBillingInfo($expected['billing_info']);
        $this->assertSame($expected['billing_info'], $buyer->getBillingInfo());
    }

    /**
     * @testdox Have a setter ``setBillingInfo()`` to set ``BillingInfo``
     * @dataProvider dataProviderBuyer
     * @cover ::setBillingInfo
     * @small
     *
     * @param Buyer $buyer    Main Object
     * @param array $expected Fixture data
     */
    public function testSetBillingInfo(Buyer $buyer, array $expected)
    {
        $buyer->setBillingInfo($expected['billing_info']);
        $this->assertSame($expected['billing_info'], $buyer->getBillingInfo());
    }
}
