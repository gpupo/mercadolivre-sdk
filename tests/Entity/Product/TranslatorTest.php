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

use Gpupo\CommonSchema\TranslatorDataCollection;
use Gpupo\MercadolivreSdk\Entity\Product\Product;
use Gpupo\MercadolivreSdk\Entity\Product\Translator;
use  Gpupo\MercadolivreSdk\Tests\TestCaseAbstract;

/**
 * @coversDefaultClass \Gpupo\MercadolivreSdk\Entity\Product\Translator
 */
class TranslatorTest extends TestCaseAbstract
{
    /**
     * @return \Gpupo\MercadolivreSdk\Entity\Product\Translator
     */
    public function dataProviderTranslator()
    {
        $list = [];

        foreach ($this->providerProducts() as $product) {
            if (!is_a($product, Product::class)) {
                throw new \InvalidArgumentException(sprintf('$product must be a mercadolivre-sdk entity! [%s] received', \get_class($product)));
            }
            $translator = new Translator(['native' => $product]);

            $list[] = [$translator];
        }

        return $list;
    }

    /**
     * @testdox Falha ao tentar traduzir para extrangeiro sem possuir nativo
     * @covers ::translateFrom
     */
    public function testLoadMapFailForeign()
    {
        $this->expectException(\Gpupo\CommonSchema\TranslatorException::class);
        $this->expectExceptionMessage('Foreign object missed!');

        $t = new Translator();
        $t->import();
    }

    /**
     * @testdox Falha ao tentar traduzir para nativo sem possuir estrangeiro
     * @covers ::translateTo
     */
    public function testLoadMapFailNative()
    {
        $this->expectException(\Gpupo\CommonSchema\TranslatorException::class);
        $this->expectExceptionMessage('Product missed!');

        $t = new Translator();
        $t->export();
    }

    /**
     * @testdox ``loadMap()``
     * @cover ::loadMap
     *
     * @dataProvider dataProviderArrayExpected
     * @group todo
     *
     * @param mixed $expected
     */
    public function testLoadMap($expected)
    {
        $product = new Product($expected);

        $t = $this->proxy(new Translator());
        $foreign = new TranslatorDataCollection([
            'skuSellerId' => '111',
        ]);

        $t->setForeign($foreign);
        $t->setNative($product);

        $list = $t->loadMap('native');
        $this->assertSame($product->get('skuSellerId'), $list['productId']);

        $list = $t->loadMap('foreign');
        $this->assertSame($foreign->get('productId'), $list['skuSellerId']);
    }

    /**
     * @testdox ``export()``
     * @cover ::translateTo
     * @group todo
     * @dataProvider dataProviderTranslator
     */
    public function testTranslateTo(Translator $translator)
    {
        $translated = $translator->export();
        $this->assertInstanceOf(TranslatorDataCollection::class, $translated);
        $this->assertIsArray($translated->toArray(), 'internal type');
    }

    /**
     * @testdox ``import()``
     * @cover ::translateFrom
     * @group todo
     * @dataProvider dataProviderTranslator
     */
    public function testTranslateFrom(Translator $translator)
    {
        $foreign = $translator->export();
        $this->assertInstanceOf(TranslatorDataCollection::class, $foreign);
        $translator->setForeign($foreign);
        $translated = $translator->import();
        $this->assertInstanceOf(Product::class, $translated);
        $this->assertIsArray($translated->toArray(), 'internal type');
    }

    public function dataProviderArrayExpected()
    {
        $list = [];
        $i = 1;
        while ($i <= 50) {
            ++$i;
            $id = rand();
            $price = rand(100, 9999) / rand(3, 55);
            $list[] = [[
                'skuSellerId' => $id,
                'price' => [
                    'default' => (float) $price,
                    'offer' => (float) ($price * rand(40, 97)) / 100,
                ],
                'stock' => rand(),
                'status' => ($price > rand()),
                'brand' => 'Acme',
            ]];
        }

        return $list;
    }
}
