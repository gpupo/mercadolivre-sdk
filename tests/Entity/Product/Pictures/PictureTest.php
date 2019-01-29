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

namespace  Gpupo\MercadolivreSdk\Tests\Entity\Product\Pictures;

use Gpupo\CommonSdk\Tests\Traits\EntityTrait;
use Gpupo\MercadolivreSdk\Entity\Product\Pictures\Picture;
use PHPUnit\Framework\TestCase as CoreTestCase;

/**
 * @coversDefaultClass \Gpupo\MercadolivreSdk\Entity\Product\Pictures\Picture
 *
 * @method string getId()                          A $id acessor.
 * @method        setId(string $id)                A $id setter
 * @method string getUrl()                         A $url acessor.
 * @method        setUrl(string $url)              A $url setter
 * @method string getSecureUrl()                   A $secure_url acessor.
 * @method        setSecureUrl(string $secure_url) A $secure_url setter
 * @method string getSize()                        A $size acessor.
 * @method        setSize(string $size)            A $size setter
 * @method string getMaxSize()                     A $max_size acessor.
 * @method        setMaxSize(string $max_size)     A $max_size setter
 * @method string getQuality()                     A $quality acessor.
 * @method        setQuality(string $quality)      A $quality setter
 */
class PictureTest extends CoreTestCase
{
    use EntityTrait;

    const QUALIFIED = Picture::class;

    public static function setUpBeforeClass()
    {
        static::setFullyQualifiedObject(self::QUALIFIED);
        parent::setUpBeforeClass();
    }

    /**
     * @return Picture
     */
    public function dataProviderPicture()
    {
        $expected = [
            'id' => 'string',
            'url' => 'string',
            'secure_url' => 'string',
            'size' => 'string',
            'max_size' => 'string',
            'quality' => 'string',
        ];

        return $this->dataProviderEntitySchema(self::QUALIFIED, $expected);
    }

    /**
     * @testdox Have a getter ``getId()`` to get ``Id``
     * @dataProvider dataProviderPicture
     * @cover ::getId
     * @small
     *
     * @param Picture $picture  Main Object
     * @param array   $expected Fixture data
     */
    public function testGetId(Picture $picture, array $expected)
    {
        $picture->setId($expected['id']);
        $this->assertSame($expected['id'], $picture->getId());
    }

    /**
     * @testdox Have a setter ``setId()`` to set ``Id``
     * @dataProvider dataProviderPicture
     * @cover ::setId
     * @small
     *
     * @param Picture $picture  Main Object
     * @param array   $expected Fixture data
     */
    public function testSetId(Picture $picture, array $expected)
    {
        $picture->setId($expected['id']);
        $this->assertSame($expected['id'], $picture->getId());
    }

    /**
     * @testdox Have a getter ``getUrl()`` to get ``Url``
     * @dataProvider dataProviderPicture
     * @cover ::getUrl
     * @small
     *
     * @param Picture $picture  Main Object
     * @param array   $expected Fixture data
     */
    public function testGetUrl(Picture $picture, array $expected)
    {
        $picture->setUrl($expected['url']);
        $this->assertSame($expected['url'], $picture->getUrl());
    }

    /**
     * @testdox Have a setter ``setUrl()`` to set ``Url``
     * @dataProvider dataProviderPicture
     * @cover ::setUrl
     * @small
     *
     * @param Picture $picture  Main Object
     * @param array   $expected Fixture data
     */
    public function testSetUrl(Picture $picture, array $expected)
    {
        $picture->setUrl($expected['url']);
        $this->assertSame($expected['url'], $picture->getUrl());
    }

    /**
     * @testdox Have a getter ``getSecureUrl()`` to get ``SecureUrl``
     * @dataProvider dataProviderPicture
     * @cover ::getSecureUrl
     * @small
     *
     * @param Picture $picture  Main Object
     * @param array   $expected Fixture data
     */
    public function testGetSecureUrl(Picture $picture, array $expected)
    {
        $picture->setSecureUrl($expected['secure_url']);
        $this->assertSame($expected['secure_url'], $picture->getSecureUrl());
    }

    /**
     * @testdox Have a setter ``setSecureUrl()`` to set ``SecureUrl``
     * @dataProvider dataProviderPicture
     * @cover ::setSecureUrl
     * @small
     *
     * @param Picture $picture  Main Object
     * @param array   $expected Fixture data
     */
    public function testSetSecureUrl(Picture $picture, array $expected)
    {
        $picture->setSecureUrl($expected['secure_url']);
        $this->assertSame($expected['secure_url'], $picture->getSecureUrl());
    }

    /**
     * @testdox Have a getter ``getSize()`` to get ``Size``
     * @dataProvider dataProviderPicture
     * @cover ::getSize
     * @small
     *
     * @param Picture $picture  Main Object
     * @param array   $expected Fixture data
     */
    public function testGetSize(Picture $picture, array $expected)
    {
        $picture->setSize($expected['size']);
        $this->assertSame($expected['size'], $picture->getSize());
    }

    /**
     * @testdox Have a setter ``setSize()`` to set ``Size``
     * @dataProvider dataProviderPicture
     * @cover ::setSize
     * @small
     *
     * @param Picture $picture  Main Object
     * @param array   $expected Fixture data
     */
    public function testSetSize(Picture $picture, array $expected)
    {
        $picture->setSize($expected['size']);
        $this->assertSame($expected['size'], $picture->getSize());
    }

    /**
     * @testdox Have a getter ``getMaxSize()`` to get ``MaxSize``
     * @dataProvider dataProviderPicture
     * @cover ::getMaxSize
     * @small
     *
     * @param Picture $picture  Main Object
     * @param array   $expected Fixture data
     */
    public function testGetMaxSize(Picture $picture, array $expected)
    {
        $picture->setMaxSize($expected['max_size']);
        $this->assertSame($expected['max_size'], $picture->getMaxSize());
    }

    /**
     * @testdox Have a setter ``setMaxSize()`` to set ``MaxSize``
     * @dataProvider dataProviderPicture
     * @cover ::setMaxSize
     * @small
     *
     * @param Picture $picture  Main Object
     * @param array   $expected Fixture data
     */
    public function testSetMaxSize(Picture $picture, array $expected)
    {
        $picture->setMaxSize($expected['max_size']);
        $this->assertSame($expected['max_size'], $picture->getMaxSize());
    }

    /**
     * @testdox Have a getter ``getQuality()`` to get ``Quality``
     * @dataProvider dataProviderPicture
     * @cover ::getQuality
     * @small
     *
     * @param Picture $picture  Main Object
     * @param array   $expected Fixture data
     */
    public function testGetQuality(Picture $picture, array $expected)
    {
        $picture->setQuality($expected['quality']);
        $this->assertSame($expected['quality'], $picture->getQuality());
    }

    /**
     * @testdox Have a setter ``setQuality()`` to set ``Quality``
     * @dataProvider dataProviderPicture
     * @cover ::setQuality
     * @small
     *
     * @param Picture $picture  Main Object
     * @param array   $expected Fixture data
     */
    public function testSetQuality(Picture $picture, array $expected)
    {
        $picture->setQuality($expected['quality']);
        $this->assertSame($expected['quality'], $picture->getQuality());
    }
}
