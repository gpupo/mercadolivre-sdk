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

namespace  Gpupo\MercadolivreSdk\Tests\Entity\Order;

use Gpupo\CommonSchema\TranslatorDataCollection;
use Gpupo\MercadolivreSdk\Entity\Order\Order;
use Gpupo\MercadolivreSdk\Entity\Order\Translator;
use  Gpupo\MercadolivreSdk\Tests\TestCaseAbstract;

/**
 * @coversDefaultClass \Gpupo\MercadolivreSdk\Entity\Order\Translator
 */
class TranslatorTest extends TestCaseAbstract
{
    /**
     * @return \Gpupo\MercadolivreSdk\Entity\Order\Translator
     */
    public function dataProviderTranslator()
    {
        $list = [];

        foreach ($this->providerOrders() as $order) {
            $translator = new Translator(['native' => $order]);

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
        $this->expectExceptionMessage('Order missed!');

        $t = new Translator();
        $t->export();
    }

    /**
     * @testdox Usa o método ``export()`` para converter o pedido em schema comum em pedido Mercado Livre
     * @cover ::translateTo
     * @dataProvider dataProviderTranslator
     */
    public function testTranslateTo(Translator $translator)
    {
        $translated = $translator->export();
        $this->assertInstanceOf(TranslatorDataCollection::class, $translated);
        $this->assertInternalType('array', $translated->toArray(), 'internal type');
    }

    /**
     * @testdox Usa o método ``import()`` para traduzir o pedido Mercado Livre em schema comum
     * @cover ::translateFrom
     * @dataProvider dataProviderTranslator
     */
    public function testTranslateFrom(Translator $translator)
    {
        $foreign = $translator->export();
        $this->assertInstanceOf(TranslatorDataCollection::class, $foreign);
        $translator->setForeign($foreign);
        $translated = $translator->import();
        $this->assertInstanceOf(Order::class, $translated);
        $this->assertInternalType('array', $translated->toArray(), 'internal type');
    }
}
