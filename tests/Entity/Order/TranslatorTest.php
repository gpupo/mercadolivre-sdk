<?php

/*
 * This file is part of gpupo/netshoes-sdk
 * Created by Gilmar Pupo <contact@gpupo.com>
 * For the information of copyright and license you should read the file
 * LICENSE which is distributed with this source code.
 * Para a informação dos direitos autorais e de licença você deve ler o arquivo
 * LICENSE que é distribuído com este código-fonte.
 * Para obtener la información de los derechos de autor y la licencia debe leer
 * el archivo LICENSE que se distribuye con el código fuente.
 * For more information, see <https://opensource.gpupo.com/>.
 */

namespace Gpupo\Tests\MercadolivreSdk\Entity\Order;

use Gpupo\CommonSchema\TranslatorDataCollection;
use Gpupo\MercadolivreSdk\Entity\Order\Order;
use Gpupo\MercadolivreSdk\Entity\Order\Translator;
use Gpupo\Tests\MercadolivreSdk\TestCaseAbstract;

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
     * @expectedException \Gpupo\CommonSchema\TranslatorException
     * @expectedExceptionMessage Foreign object missed!
     * @covers ::translateFrom
     * @test
     */
    public function loadMapFailForeign()
    {
        $t = new Translator();
        $t->translateFrom();
    }

    /**
     * @testdox Falha ao tentar traduzir para nativo sem possuir estrangeiro
     * @expectedException \Gpupo\CommonSchema\TranslatorException
     * @expectedExceptionMessage Order missed!
     * @covers ::translateTo
     * @test
     */
    public function loadMapFailNative()
    {
        $t = new Translator();
        $t->translateTo();
    }

    /**
     * @testdox ``translateTo()``
     * @cover ::translateTo
     * @dataProvider dataProviderTranslator
     * @test
     */
    public function translateTo(Translator $translator)
    {
        $translated = $translator->translateTo();
        $this->assertInstanceOf(TranslatorDataCollection::class, $translated);
        $this->assertInternalType('array', $translated->toArray(), 'internal type');
    }

    /**
     * @testdox ``translateFrom()``
     * @cover ::translateFrom
     * @dataProvider dataProviderTranslator
     * @test
     */
    public function translateFrom(Translator $translator)
    {
        $foreign = $translator->translateTo();
        $this->assertInstanceOf(TranslatorDataCollection::class, $foreign);
        $translator->setForeign($foreign);
        $translated = $translator->translateFrom();
        $this->assertInstanceOf(Order::class, $translated);
        $this->assertInternalType('array', $translated->toArray(), 'internal type');
    }
}
