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

namespace  Gpupo\MercadolivreSdk\Tests\Entity\Product;

use Gpupo\MercadolivreSdk\Entity\Product\Product;
use Gpupo\Tests\CommonSdk\Traits\EntityTrait;
use PHPUnit\Framework\TestCase as CoreTestCase;

/**
 * @coversDefaultClass \Gpupo\MercadolivreSdk\Entity\Product\Product
 *
 * @method string                                                           getId()                                                                                 A $id acessor.
 * @method                                                                  setId(string $id)                                                                       A $id setter
 * @method string                                                           getTitle()                                                                              A $title acessor.
 * @method                                                                  setTitle(string $title)                                                                 A $title setter
 * @method string                                                           getDescription()                                                                        A $description acessor.
 * @method                                                                  setDescription(string $description)                                                     A $description setter
 * @method string                                                           getCategoryId()                                                                         A $category_id acessor.
 * @method                                                                  setCategoryId(string $category_id)                                                      A $category_id setter
 * @method float                                                            getPrice()                                                                              A $price acessor.
 * @method                                                                  setPrice(float $price)                                                                  A $price setter
 * @method string                                                           getCurrencyId()                                                                         A $currency_id acessor.
 * @method                                                                  setCurrencyId(string $currency_id)                                                      A $currency_id setter
 * @method string                                                           getBuyingMode()                                                                         A $buying_mode acessor.
 * @method                                                                  setBuyingMode(string $buying_mode)                                                      A $buying_mode setter
 * @method string                                                           getListingTypeId()                                                                      A $listing_type_id acessor.
 * @method                                                                  setListingTypeId(string $listing_type_id)                                               A $listing_type_id setter
 * @method string                                                           getCondition()                                                                          A $condition acessor.
 * @method                                                                  setCondition(string $condition)                                                         A $condition setter
 * @method Gpupo\MercadolivreSdk\Entity\Product\Pictures\PicturesCollection getPictures()                                                                           A $pictures acessor.
 * @method                                                                  setPictures(Gpupo\MercadolivreSdk\Entity\Product\Pictures\PicturesCollection $pictures) A $pictures setter
 * @method float                                                            getAvailableQuantity()                                                                  A $available_quantity acessor.
 * @method                                                                  setAvailableQuantity(float $available_quantity)                                         A $available_quantity setter
 * @method array                                                            getShipping()                                                                           A $shipping acessor.
 * @method                                                                  setShipping(array $shipping)                                                            A $shipping setter
 * @method float                                                            getOfficialStoreId()                                                                    A $official_store_id acessor.
 * @method                                                                  setOfficialStoreId(float $official_store_id)                                            A $official_store_id setter
 */
class ProductGeneratedTest extends CoreTestCase
{
    use EntityTrait;

    const QUALIFIED = Product::class;

    public static function setUpBeforeClass()
    {
        static::setFullyQualifiedObject(self::QUALIFIED);
        parent::setUpBeforeClass();
    }

    /**
     * @return Product
     */
    public function dataProviderProduct()
    {
        $expected = [
            'id' => 'string',
            'title' => 'string',
            'description' => 'array',
            'category_id' => 'string',
            'price' => 'number',
            'currency_id' => 'string',
            'buying_mode' => 'string',
            'listing_type_id' => 'string',
            'condition' => 'string',
            'pictures' => 'object',
            'available_quantity' => 'number',
            'shipping' => 'array',
            'official_store_id' => 'number',
            'status' => 'string',
        ];

        return $this->dataProviderEntitySchema(self::QUALIFIED, $expected);
    }

    /**
     * @testdox Have a getter ``getId()`` to get ``Id``
     * @dataProvider dataProviderProduct
     * @cover ::getId
     * @small
     *
     * @param Product $product  Main Object
     * @param array   $expected Fixture data
     */
    public function testGetId(Product $product, array $expected)
    {
        $product->setId($expected['id']);
        $this->assertSame($expected['id'], $product->getId());
    }

    /**
     * @testdox Have a setter ``setId()`` to set ``Id``
     * @dataProvider dataProviderProduct
     * @cover ::setId
     * @small
     *
     * @param Product $product  Main Object
     * @param array   $expected Fixture data
     */
    public function testSetId(Product $product, array $expected)
    {
        $product->setId($expected['id']);
        $this->assertSame($expected['id'], $product->getId());
    }

    /**
     * @testdox Have a getter ``getTitle()`` to get ``Title``
     * @dataProvider dataProviderProduct
     * @cover ::getTitle
     * @small
     *
     * @param Product $product  Main Object
     * @param array   $expected Fixture data
     */
    public function testGetTitle(Product $product, array $expected)
    {
        $product->setTitle($expected['title']);
        $this->assertSame($expected['title'], $product->getTitle());
    }

    /**
     * @testdox Have a setter ``setTitle()`` to set ``Title``
     * @dataProvider dataProviderProduct
     * @cover ::setTitle
     * @small
     *
     * @param Product $product  Main Object
     * @param array   $expected Fixture data
     */
    public function testSetTitle(Product $product, array $expected)
    {
        $product->setTitle($expected['title']);
        $this->assertSame($expected['title'], $product->getTitle());
    }

    /**
     * @testdox Have a getter ``getDescription()`` to get ``Description``
     * @dataProvider dataProviderProduct
     * @cover ::getDescription
     * @small
     *
     * @param Product $product  Main Object
     * @param array   $expected Fixture data
     */
    public function testGetDescription(Product $product, array $expected)
    {
        $product->setDescription($expected['description']);
        $this->assertSame($expected['description'], $product->getDescription());
    }

    /**
     * @testdox Have a setter ``setDescription()`` to set ``Description``
     * @dataProvider dataProviderProduct
     * @cover ::setDescription
     * @small
     *
     * @param Product $product  Main Object
     * @param array   $expected Fixture data
     */
    public function testSetDescription(Product $product, array $expected)
    {
        $product->setDescription($expected['description']);
        $this->assertSame($expected['description'], $product->getDescription());
    }

    /**
     * @testdox Have a getter ``getCategoryId()`` to get ``CategoryId``
     * @dataProvider dataProviderProduct
     * @cover ::getCategoryId
     * @small
     *
     * @param Product $product  Main Object
     * @param array   $expected Fixture data
     */
    public function testGetCategoryId(Product $product, array $expected)
    {
        $product->setCategoryId($expected['category_id']);
        $this->assertSame($expected['category_id'], $product->getCategoryId());
    }

    /**
     * @testdox Have a setter ``setCategoryId()`` to set ``CategoryId``
     * @dataProvider dataProviderProduct
     * @cover ::setCategoryId
     * @small
     *
     * @param Product $product  Main Object
     * @param array   $expected Fixture data
     */
    public function testSetCategoryId(Product $product, array $expected)
    {
        $product->setCategoryId($expected['category_id']);
        $this->assertSame($expected['category_id'], $product->getCategoryId());
    }

    /**
     * @testdox Have a getter ``getPrice()`` to get ``Price``
     * @dataProvider dataProviderProduct
     * @cover ::getPrice
     * @small
     *
     * @param Product $product  Main Object
     * @param array   $expected Fixture data
     */
    public function testGetPrice(Product $product, array $expected)
    {
        $product->setPrice($expected['price']);
        $this->assertSame($expected['price'], $product->getPrice());
    }

    /**
     * @testdox Have a setter ``setPrice()`` to set ``Price``
     * @dataProvider dataProviderProduct
     * @cover ::setPrice
     * @small
     *
     * @param Product $product  Main Object
     * @param array   $expected Fixture data
     */
    public function testSetPrice(Product $product, array $expected)
    {
        $product->setPrice($expected['price']);
        $this->assertSame($expected['price'], $product->getPrice());
    }

    /**
     * @testdox Have a getter ``getCurrencyId()`` to get ``CurrencyId``
     * @dataProvider dataProviderProduct
     * @cover ::getCurrencyId
     * @small
     *
     * @param Product $product  Main Object
     * @param array   $expected Fixture data
     */
    public function testGetCurrencyId(Product $product, array $expected)
    {
        $product->setCurrencyId($expected['currency_id']);
        $this->assertSame($expected['currency_id'], $product->getCurrencyId());
    }

    /**
     * @testdox Have a setter ``setCurrencyId()`` to set ``CurrencyId``
     * @dataProvider dataProviderProduct
     * @cover ::setCurrencyId
     * @small
     *
     * @param Product $product  Main Object
     * @param array   $expected Fixture data
     */
    public function testSetCurrencyId(Product $product, array $expected)
    {
        $product->setCurrencyId($expected['currency_id']);
        $this->assertSame($expected['currency_id'], $product->getCurrencyId());
    }

    /**
     * @testdox Have a getter ``getBuyingMode()`` to get ``BuyingMode``
     * @dataProvider dataProviderProduct
     * @cover ::getBuyingMode
     * @small
     *
     * @param Product $product  Main Object
     * @param array   $expected Fixture data
     */
    public function testGetBuyingMode(Product $product, array $expected)
    {
        $product->setBuyingMode($expected['buying_mode']);
        $this->assertSame($expected['buying_mode'], $product->getBuyingMode());
    }

    /**
     * @testdox Have a setter ``setBuyingMode()`` to set ``BuyingMode``
     * @dataProvider dataProviderProduct
     * @cover ::setBuyingMode
     * @small
     *
     * @param Product $product  Main Object
     * @param array   $expected Fixture data
     */
    public function testSetBuyingMode(Product $product, array $expected)
    {
        $product->setBuyingMode($expected['buying_mode']);
        $this->assertSame($expected['buying_mode'], $product->getBuyingMode());
    }

    /**
     * @testdox Have a getter ``getListingTypeId()`` to get ``ListingTypeId``
     * @dataProvider dataProviderProduct
     * @cover ::getListingTypeId
     * @small
     *
     * @param Product $product  Main Object
     * @param array   $expected Fixture data
     */
    public function testGetListingTypeId(Product $product, array $expected)
    {
        $product->setListingTypeId($expected['listing_type_id']);
        $this->assertSame($expected['listing_type_id'], $product->getListingTypeId());
    }

    /**
     * @testdox Have a setter ``setListingTypeId()`` to set ``ListingTypeId``
     * @dataProvider dataProviderProduct
     * @cover ::setListingTypeId
     * @small
     *
     * @param Product $product  Main Object
     * @param array   $expected Fixture data
     */
    public function testSetListingTypeId(Product $product, array $expected)
    {
        $product->setListingTypeId($expected['listing_type_id']);
        $this->assertSame($expected['listing_type_id'], $product->getListingTypeId());
    }

    /**
     * @testdox Have a getter ``getCondition()`` to get ``Condition``
     * @dataProvider dataProviderProduct
     * @cover ::getCondition
     * @small
     *
     * @param Product $product  Main Object
     * @param array   $expected Fixture data
     */
    public function testGetCondition(Product $product, array $expected)
    {
        $product->setCondition($expected['condition']);
        $this->assertSame($expected['condition'], $product->getCondition());
    }

    /**
     * @testdox Have a setter ``setCondition()`` to set ``Condition``
     * @dataProvider dataProviderProduct
     * @cover ::setCondition
     * @small
     *
     * @param Product $product  Main Object
     * @param array   $expected Fixture data
     */
    public function testSetCondition(Product $product, array $expected)
    {
        $product->setCondition($expected['condition']);
        $this->assertSame($expected['condition'], $product->getCondition());
    }

    /**
     * @testdox Have a getter ``getPictures()`` to get ``Pictures``
     * @dataProvider dataProviderProduct
     * @cover ::getPictures
     * @small
     *
     * @param Product $product  Main Object
     * @param array   $expected Fixture data
     */
    public function testGetPictures(Product $product, array $expected)
    {
        $product->setPictures($expected['pictures']);
        $this->assertSame($expected['pictures'], $product->getPictures());
    }

    /**
     * @testdox Have a setter ``setPictures()`` to set ``Pictures``
     * @dataProvider dataProviderProduct
     * @cover ::setPictures
     * @small
     *
     * @param Product $product  Main Object
     * @param array   $expected Fixture data
     */
    public function testSetPictures(Product $product, array $expected)
    {
        $product->setPictures($expected['pictures']);
        $this->assertSame($expected['pictures'], $product->getPictures());
    }

    /**
     * @testdox Have a getter ``getAvailableQuantity()`` to get ``AvailableQuantity``
     * @dataProvider dataProviderProduct
     * @cover ::getAvailableQuantity
     * @small
     *
     * @param Product $product  Main Object
     * @param array   $expected Fixture data
     */
    public function testGetAvailableQuantity(Product $product, array $expected)
    {
        $product->setAvailableQuantity($expected['available_quantity']);
        $this->assertSame($expected['available_quantity'], $product->getAvailableQuantity());
    }

    /**
     * @testdox Have a setter ``setAvailableQuantity()`` to set ``AvailableQuantity``
     * @dataProvider dataProviderProduct
     * @cover ::setAvailableQuantity
     * @small
     *
     * @param Product $product  Main Object
     * @param array   $expected Fixture data
     */
    public function testSetAvailableQuantity(Product $product, array $expected)
    {
        $product->setAvailableQuantity($expected['available_quantity']);
        $this->assertSame($expected['available_quantity'], $product->getAvailableQuantity());
    }

    /**
     * @testdox Have a getter ``getShipping()`` to get ``Shipping``
     * @dataProvider dataProviderProduct
     * @cover ::getShipping
     * @small
     *
     * @param Product $product  Main Object
     * @param array   $expected Fixture data
     */
    public function testGetShipping(Product $product, array $expected)
    {
        $product->setShipping($expected['shipping']);
        $this->assertSame($expected['shipping'], $product->getShipping());
    }

    /**
     * @testdox Have a setter ``setShipping()`` to set ``Shipping``
     * @dataProvider dataProviderProduct
     * @cover ::setShipping
     * @small
     *
     * @param Product $product  Main Object
     * @param array   $expected Fixture data
     */
    public function testSetShipping(Product $product, array $expected)
    {
        $product->setShipping($expected['shipping']);
        $this->assertSame($expected['shipping'], $product->getShipping());
    }

    /**
     * @testdox Have a getter ``getOfficialStoreId()`` to get ``OfficialStoreId``
     * @dataProvider dataProviderProduct
     * @cover ::getOfficialStoreId
     * @small
     *
     * @param Product $product  Main Object
     * @param array   $expected Fixture data
     */
    public function testGetOfficialStoreId(Product $product, array $expected)
    {
        $product->setOfficialStoreId($expected['official_store_id']);
        $this->assertSame($expected['official_store_id'], $product->getOfficialStoreId());
    }

    /**
     * @testdox Have a setter ``setOfficialStoreId()`` to set ``OfficialStoreId``
     * @dataProvider dataProviderProduct
     * @cover ::setOfficialStoreId
     * @small
     *
     * @param Product $product  Main Object
     * @param array   $expected Fixture data
     */
    public function testSetOfficialStoreId(Product $product, array $expected)
    {
        $product->setOfficialStoreId($expected['official_store_id']);
        $this->assertSame($expected['official_store_id'], $product->getOfficialStoreId());
    }

    /**
     * @testdox Have a getter ``getStatus()`` to get ``Status``
     * @dataProvider dataProviderProduct
     * @cover ::getStatus
     * @small
     *
     * @param Product $product  Main Object
     * @param array   $expected Fixture data
     */
    public function testGetStatus(Product $product, array $expected)
    {
        $product->setStatus($expected['status']);
        $this->assertSame($expected['status'], $product->getStatus());
    }

    /**
     * @testdox Have a setter ``setStatus()`` to set ``Status``
     * @dataProvider dataProviderProduct
     * @cover ::setStatus
     * @small
     *
     * @param Product $product  Main Object
     * @param array   $expected Fixture data
     */
    public function testSetStatus(Product $product, array $expected)
    {
        $product->setStatus($expected['status']);
        $this->assertSame($expected['status'], $product->getStatus());
    }
}
