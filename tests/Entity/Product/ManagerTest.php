<?php

/*
 * This file is part of gpupo/mercadolivre-sdk
 * Created by Gilmar Pupo <g@g1mr.com>
 * For the information of copyright and license you should read the file
 * LICENSE which is distributed with this source code.
 * Para a informação dos direitos autorais e de licença você deve ler o arquivo
 * LICENSE que é distribuído com este código-fonte.
 * Para obtener la información de los derechos de autor y la licencia debe leer
 * el archivo LICENSE que se distribuye con el código fuente.
 * For more information, see <http://www.g1mr.com/>.
 */

namespace Entity\Product;

use Gpupo\MercadolivreSdk\Entity\Product\Manager;
use Gpupo\Tests\MercadolivreSdk\TestCaseAbstract;

/**
 * @coversDefaultClass \Gpupo\MercadolivreSdk\Entity\Product\Manager
 */
class ManagerTest extends TestCaseAbstract
{
    /**
     * @return \Gpupo\MercadolivreSdk\Entity\Product\Manager
     */
    public function dataProviderManager()
    {
        return [[new Manager()]];
    }

    /**
     * @testdox rotas possuem access_token como parâmetro GET
     * @cover ::factoryMap
     * @test
     */
    public function accessToken()
    {
        $manager = $this->getFactory()->factoryManager('product');
        $route = $manager->factoryMap('save');
        $this->assertSame('/items?access_token=fooToken', $route->getResource());
    }

    /**
     * @testdox ``translatorInsertProduct()``
     * @cover ::translatorInsertProduct
     * @dataProvider dataProviderManager
     * @test
     */
    public function translatorInsertProduct(Manager $manager)
    {
        $this->markTestIncomplete('translatorInsertProduct() incomplete!');
    }
}
