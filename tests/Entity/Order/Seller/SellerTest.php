<?php

declare(strict_types=1);

/*
 * This file is part of gpupo/mercadolivre-sdk created by Gilmar Pupo <contact@gpupo.com>
 * For the information of copyright and license you should read the file LICENSE which is
 * distributed with this source code. For more information, see <https://opensource.gpupo.com/>
 */

namespace  Gpupo\MercadolivreSdk\Tests\Entity\Order\Seller;

use Gpupo\CommonSdk\Tests\Traits\EntityTrait;
use Gpupo\MercadolivreSdk\Entity\Order\Seller\Seller;
use PHPUnit\Framework\TestCase as CoreTestCase;

/**
 * @coversDefaultClass \Gpupo\MercadolivreSdk\Entity\Order\Seller\Seller
 *
 * @method int                                                        getId()                                                                                            A $id acessor.
 * @method                                                            setId(integer $id)                                                                                 A $id setter
 * @method string                                                     getNickname()                                                                                      A $nickname acessor.
 * @method                                                            setNickname(string $nickname)                                                                      A $nickname setter
 * @method string                                                     getEmail()                                                                                         A $email acessor.
 * @method                                                            setEmail(string $email)                                                                            A $email setter
 * @method Gpupo\MercadolivreSdk\Entity\Order\Seller\Phone            getPhone()                                                                                         A $phone acessor.
 * @method                                                            setPhone(Gpupo\MercadolivreSdk\Entity\Order\Seller\Phone $phone)                                   A $phone setter
 * @method Gpupo\MercadolivreSdk\Entity\Order\Seller\AlternativePhone getAlternativePhone()                                                                              A $alternative_phone acessor.
 * @method                                                            setAlternativePhone(Gpupo\MercadolivreSdk\Entity\Order\Seller\AlternativePhone $alternative_phone) A $alternative_phone setter
 * @method string                                                     getFirstName()                                                                                     A $first_name acessor.
 * @method                                                            setFirstName(string $first_name)                                                                   A $first_name setter
 * @method string                                                     getLastName()                                                                                      A $last_name acessor.
 * @method                                                            setLastName(string $last_name)                                                                     A $last_name setter
 */
class SellerTest extends CoreTestCase
{
    use EntityTrait;

    const QUALIFIED = Seller::class;

    public static function setUpBeforeClass(): void
    {
        static::setFullyQualifiedObject(self::QUALIFIED);
        parent::setUpBeforeClass();
    }

    /**
     * @return Seller
     */
    public function dataProviderSeller()
    {
        $expected = [
            'id' => 'integer',
            'nickname' => 'string',
            'email' => 'string',
            'phone' => 'object',
            'alternative_phone' => 'object',
            'first_name' => 'string',
            'last_name' => 'string',
        ];

        return $this->dataProviderEntitySchema(self::QUALIFIED, $expected);
    }

    /**
     * @testdox Have a getter ``getId()`` to get ``Id``
     * @dataProvider dataProviderSeller
     * @cover ::getId
     * @small
     *
     * @param Seller $seller   Main Object
     * @param array  $expected Fixture data
     */
    public function testGetId(Seller $seller, array $expected)
    {
        $seller->setId($expected['id']);
        $this->assertSame($expected['id'], $seller->getId());
    }

    /**
     * @testdox Have a setter ``setId()`` to set ``Id``
     * @dataProvider dataProviderSeller
     * @cover ::setId
     * @small
     *
     * @param Seller $seller   Main Object
     * @param array  $expected Fixture data
     */
    public function testSetId(Seller $seller, array $expected)
    {
        $seller->setId($expected['id']);
        $this->assertSame($expected['id'], $seller->getId());
    }

    /**
     * @testdox Have a getter ``getNickname()`` to get ``Nickname``
     * @dataProvider dataProviderSeller
     * @cover ::getNickname
     * @small
     *
     * @param Seller $seller   Main Object
     * @param array  $expected Fixture data
     */
    public function testGetNickname(Seller $seller, array $expected)
    {
        $seller->setNickname($expected['nickname']);
        $this->assertSame($expected['nickname'], $seller->getNickname());
    }

    /**
     * @testdox Have a setter ``setNickname()`` to set ``Nickname``
     * @dataProvider dataProviderSeller
     * @cover ::setNickname
     * @small
     *
     * @param Seller $seller   Main Object
     * @param array  $expected Fixture data
     */
    public function testSetNickname(Seller $seller, array $expected)
    {
        $seller->setNickname($expected['nickname']);
        $this->assertSame($expected['nickname'], $seller->getNickname());
    }

    /**
     * @testdox Have a getter ``getEmail()`` to get ``Email``
     * @dataProvider dataProviderSeller
     * @cover ::getEmail
     * @small
     *
     * @param Seller $seller   Main Object
     * @param array  $expected Fixture data
     */
    public function testGetEmail(Seller $seller, array $expected)
    {
        $seller->setEmail($expected['email']);
        $this->assertSame($expected['email'], $seller->getEmail());
    }

    /**
     * @testdox Have a setter ``setEmail()`` to set ``Email``
     * @dataProvider dataProviderSeller
     * @cover ::setEmail
     * @small
     *
     * @param Seller $seller   Main Object
     * @param array  $expected Fixture data
     */
    public function testSetEmail(Seller $seller, array $expected)
    {
        $seller->setEmail($expected['email']);
        $this->assertSame($expected['email'], $seller->getEmail());
    }

    /**
     * @testdox Have a getter ``getPhone()`` to get ``Phone``
     * @dataProvider dataProviderSeller
     * @cover ::getPhone
     * @small
     *
     * @param Seller $seller   Main Object
     * @param array  $expected Fixture data
     */
    public function testGetPhone(Seller $seller, array $expected)
    {
        $seller->setPhone($expected['phone']);
        $this->assertSame($expected['phone'], $seller->getPhone());
    }

    /**
     * @testdox Have a setter ``setPhone()`` to set ``Phone``
     * @dataProvider dataProviderSeller
     * @cover ::setPhone
     * @small
     *
     * @param Seller $seller   Main Object
     * @param array  $expected Fixture data
     */
    public function testSetPhone(Seller $seller, array $expected)
    {
        $seller->setPhone($expected['phone']);
        $this->assertSame($expected['phone'], $seller->getPhone());
    }

    /**
     * @testdox Have a getter ``getAlternativePhone()`` to get ``AlternativePhone``
     * @dataProvider dataProviderSeller
     * @cover ::getAlternativePhone
     * @small
     *
     * @param Seller $seller   Main Object
     * @param array  $expected Fixture data
     */
    public function testGetAlternativePhone(Seller $seller, array $expected)
    {
        $seller->setAlternativePhone($expected['alternative_phone']);
        $this->assertSame($expected['alternative_phone'], $seller->getAlternativePhone());
    }

    /**
     * @testdox Have a setter ``setAlternativePhone()`` to set ``AlternativePhone``
     * @dataProvider dataProviderSeller
     * @cover ::setAlternativePhone
     * @small
     *
     * @param Seller $seller   Main Object
     * @param array  $expected Fixture data
     */
    public function testSetAlternativePhone(Seller $seller, array $expected)
    {
        $seller->setAlternativePhone($expected['alternative_phone']);
        $this->assertSame($expected['alternative_phone'], $seller->getAlternativePhone());
    }

    /**
     * @testdox Have a getter ``getFirstName()`` to get ``FirstName``
     * @dataProvider dataProviderSeller
     * @cover ::getFirstName
     * @small
     *
     * @param Seller $seller   Main Object
     * @param array  $expected Fixture data
     */
    public function testGetFirstName(Seller $seller, array $expected)
    {
        $seller->setFirstName($expected['first_name']);
        $this->assertSame($expected['first_name'], $seller->getFirstName());
    }

    /**
     * @testdox Have a setter ``setFirstName()`` to set ``FirstName``
     * @dataProvider dataProviderSeller
     * @cover ::setFirstName
     * @small
     *
     * @param Seller $seller   Main Object
     * @param array  $expected Fixture data
     */
    public function testSetFirstName(Seller $seller, array $expected)
    {
        $seller->setFirstName($expected['first_name']);
        $this->assertSame($expected['first_name'], $seller->getFirstName());
    }

    /**
     * @testdox Have a getter ``getLastName()`` to get ``LastName``
     * @dataProvider dataProviderSeller
     * @cover ::getLastName
     * @small
     *
     * @param Seller $seller   Main Object
     * @param array  $expected Fixture data
     */
    public function testGetLastName(Seller $seller, array $expected)
    {
        $seller->setLastName($expected['last_name']);
        $this->assertSame($expected['last_name'], $seller->getLastName());
    }

    /**
     * @testdox Have a setter ``setLastName()`` to set ``LastName``
     * @dataProvider dataProviderSeller
     * @cover ::setLastName
     * @small
     *
     * @param Seller $seller   Main Object
     * @param array  $expected Fixture data
     */
    public function testSetLastName(Seller $seller, array $expected)
    {
        $seller->setLastName($expected['last_name']);
        $this->assertSame($expected['last_name'], $seller->getLastName());
    }
}
