<?php

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
 */

namespace Gpupo\Tests\MercadolivreSdk\Entity\Order\Decorator;

use Gpupo\MercadolivreSdk\Entity\Order\Order;
use Gpupo\Tests\MercadolivreSdk\TestCaseAbstract;

/**
 * @coversDefaultClass \Gpupo\MercadolivreSdk\Entity\Order\Decorator\AbstractDecorator
 */
abstract class AbstractDecoratorTestCase extends TestCaseAbstract
{
    protected function getExpectedArray()
    {
        return $this->getResourceJson('fixture/Order/Status/'.$this->target.'.json');
    }

    protected function getExpectedJson()
    {
        return trim($this->getResourceContent('fixture/Order/Status/'.$this->target.'.json'));
    }

    protected function getDecorator($data = [])
    {
        return $this->factory($data)->setLogger($this->getLogger());
    }

    protected function factoryDecorator(Order $order, $data = [])
    {
        $decorator = $this->getDecorator($data);
        $decorator->setOriginalOrder($order);
        
        return $decorator->setOrder($order);
    }

    /**
     * @testdox Recebe o objeto ``Order``
     * @test
     * @dataProvider dataProviderOrders
     * @covers ::setOrder
     */
    public function setOrder(Order $order)
    {
        $this->assertInstanceOf(Order::class, $this->factory()
            ->setOrder($order)->getOrder());
    }

    /**
     * @testdox Falha ao validar ``Order`` com informações mínimas requeridas ausentes
     * @test
     * @covers ::factoryArray
     * @expectedException Exception
     */
    public function validateFail()
    {
        $decorator = $this->getDecorator();
        $decorator->validate();
    }

    /**
     * @testdox Falha ao tentar submeter uma ordem incompleta para mudança de status
     * @expectedException Exception
     * @expectedExceptionMessage Attribute invalid: Order
     * @covers ::factoryArray
     * @covers ::toArray
     * @test
     */
    public function toArrayFail()
    {
        $o = $this->proxy($this->getDecorator());
        $o->set('order', '');
        $o->toArray();
    }

    /**
     * @testdox Tem sucesso ao validar as informações mínimas requeridas para uma mudança de status
     * @test
     * @covers \Gpupo\MercadolivreSdk\Entity\Order\Decorator\AbstractDecorator::validate
     * @covers ::validate
     * @covers ::toArray
     * @dataProvider dataProviderOrders
     */
    public function validate(Order $order)
    {
        $decorator = $this->getDecorator($this->getExpectedArray())->setOrder($order);
        $decorator->validate();
        $this->assertInstanceOf(Order::class, $decorator->getOrder());
    }

    /**
     * @testdox Prepara as informações como de acordo com o pedido na mudança de status
     * @test
     * @dataProvider dataProviderOrders
     * @covers \Gpupo\MercadolivreSdk\Entity\Order\Decorator\AbstractDecorator
     * @covers ::toArray
     * @covers ::factoryArray
     */
    public function toArray(Order $order)
    {
        $decorator = $this->factoryDecorator($order, $this->getExpectedArray());
        $this->assertSame($this->getExpectedArray(), $decorator->toArray());
    }

    /**
     * @testdox Prepara JSON de acordo com o pedido na mudança de status
     * @test
     * @covers ::toArray
     * @covers ::toJson
     * @covers ::factoryArray
     * @dataProvider dataProviderOrders
     */
    public function toJson(Order $order)
    {
        $decorator = $this->factoryDecorator($order, $this->getExpectedArray());
        $this->assertSame($this->getExpectedJson(), $decorator->toJson());
    }

    /**
     * @testdox Lida com as mensagens de validação
     * @expectedException InvalidArgumentException
     * @covers ::fail
     */
    public function testFailMessage()
    {
        $o = $this->proxy($this->getDecorator());
        $o->fail();
    }

    /**
     * @testdox Lida com as mensagens de validação especificando o atributo com problemas
     * @expectedException InvalidArgumentException
     * @expectedExceptionMessage Attribute invalid: foo
     * @covers ::invalid
     */
    public function testInvalidMessage()
    {
        $o = $this->proxy($this->getDecorator());
        $o->invalid('foo');
    }

    /**
     * @testdox Possui validação de Order
     * @expectedException InvalidArgumentException
     * @expectedExceptionMessage Attribute invalid: Order
     * @covers ::validate
     */
    public function testBasicValidate()
    {
        $o = $this->proxy($this->getDecorator());
        $o->set('order', '');
        $o->validate();
    }
}
