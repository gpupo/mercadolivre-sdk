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
use Gpupo\Common\Entity\CollectionInterface;
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
        $this->assertSame('/items?', $route->getResource());
        $headerList = $manager->getClient()->factoryRequest('/items')->getHeader();
        $this->assertSame('Bearer fooToken', $headerList['Authorization']);
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

    public function testSave()
    {
        $data = $this->getResourceJson('mockup/Product/item.json');
        $entity = new Product($data);

        $manager = $this->getManager();
        $product = $manager->save($entity);
        $this->assertInstanceOf(CommonResponse::class, $product);
    }

    public function testSetDescription()
    {
        $id = "MLB803848501";
        $text = "Descripción con Texto Plano  \n";

        $manager = $this->getManager();
        $product = $manager->setDescription($id, $text);
        $this->assertInstanceOf(CommonResponse::class, $product);
    }

    public function testGetVisits()
    {
        $ids = [ "MLB803848501" ];
        $windowSize = 3;
        $ending = new \DateTime('now');

        $manager = $this->getManager('day_visits.json');
        $visits = $manager->getVisits($ids, $windowSize, $ending);
        
        $this->assertInstanceOf(CollectionInterface::class, $visits);
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

    /**
     * @testdox Testa construção do array de update a enviar no corpo da requisição pro MELI
     * @covers ::factoryUpdateArray
     */
    public function testFactoryUpdateArray()
    {
        $data = $this->getResourceJson('mockup/Product/item.json');
        $item = new Product($data);

        $id = 'MLB803848501';
        $manager = $this->getManager($id.'.json');
        $externalItem = $manager->findById($id);
        
        // muda apenas price e available_quantity
        $item['price'] += 10;
        $item['available_quantity'] -= 1;

        $array = $manager->factoryUpdateArray($item, $externalItem);

        $this->assertNotEmpty($array);
        $this->assertSame($array, ['price' => 379.55, 'available_quantity' => 180.0]);

        // ignora case sensitive no titulo
        $item['title'] = "Perfume AZZARO Pour Homme EDT Masculino";
        $array = $manager->factoryUpdateArray($item, $externalItem);
        $this->assertArrayNotHasKey('title', $array);

        // agora considera mudança no titulo
        $item['title'] = "Perfume AZZARO Pour Homme EDT Masculino Ultimas Unidades";
        $array = $manager->factoryUpdateArray($item, $externalItem);
        $this->assertArrayHasKey('title', $array);

        $shipping = $item->getShipping();
        $shipping['mode'] = 'me2';
        $item->setShipping($shipping);
        $array = $manager->factoryUpdateArray($item, $externalItem);
        $this->assertArrayHasKey('shipping', $array);
    }

    /**
     * @testdox Testa facade de attributes
     * @covers ::updateFilterAttributes
     */
    public function testUpdateFilterAttributes()
    {
        $data = $this->getResourceJson('mockup/Product/item.json');
        $item = new Product($data);

        $manager = $this->getManager();
        $array = $manager->updateFilterAttributes($item['attributes'], 'MLB5399');

        $this->assertNotEmpty($array);
        $this->assertSame($array, [
            [
                'id' => 'GENDER',
                'name' => 'Gênero',
                'value_id' => '111070',
                'value_name' => 'Masculino',
                'attribute_group_id' => 'DFLT',
                'attribute_group_name' => 'Outros',
            ]
        ]);
    }
}
