<?php

declare(strict_types=1);

/*
 * This file is part of gpupo/mercadolivre-sdk created by Gilmar Pupo <contact@gpupo.com>
 * For the information of copyright and license you should read the file LICENSE which is
 * distributed with this source code. For more information, see <https://opensource.gpupo.com/>
 */

namespace  Gpupo\MercadolivreSdk\Tests\Entity\Product;

use Gpupo\CommonSdk\Response as CommonResponse;
use Gpupo\MercadolivreSdk\Entity\Product\Manager;
use Gpupo\MercadolivreSdk\Entity\Product\Product;
use Gpupo\MercadolivreSdk\Tests\TestCaseAbstract;

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
     */
    public function testAccessToken()
    {
        $manager = $this->getFactory()->factoryManager('product');
        $route = $manager->factoryMap('save');
        $this->assertSame('/items?access_token=fooToken', $route->getResource());
    }

    /**
     * @testdox ``translatorInsertProduct()``
     * @cover ::translatorInsertProduct
     * @group todo
     * @dataProvider dataProviderManager
     */
    public function testTranslatorInsertProduct(Manager $manager)
    {
        $this->markTestIncomplete('translatorInsertProduct() incomplete!');
    }

    /**
     * @testdox Recupera informações de um produto especifico a partir de Id
     * @covers ::findById
     * @covers ::execute
     * @covers ::factoryMap
     * @covers \Gpupo\MercadolivreSdk\Client\Client::getDefaultOptions
     * @covers \Gpupo\MercadolivreSdk\Client\Client::renderAuthorization
     */
    public function testFindBy()
    {
        $id = 'MLB803848501';
        $manager = $this->getManager($id.'.json');
        $product = $manager->findById($id);
        $this->assertInstanceOf(Product::class, $product, 'Test instance');
        $this->assertSame($id, $product->getId(), 'Test $id');
    }

    public function testUpdate()
    {
        $data = $this->getResourceJson('mockup/Product/item.json');
        $entity = new Product($data);

        $manager = $this->getManager();
        $product = $manager->update($entity);
        $this->assertInstanceOf(CommonResponse::class, $product);
    }

    protected function getManager($filename = null, $code = 200)
    {
        if (empty($filename)) {
            $filename = 'item.json';
        }

        $path = sprintf('mockup/Product/%s', $filename);
        $manager = $this->getFactory()->factoryManager('product');
        $response = $this->factoryResponseFromFixture($path, $code);
        $manager->setDryRun($response);

        return $manager;
    }
}
