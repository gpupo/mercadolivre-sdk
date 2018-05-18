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

namespace Gpupo\Tests\MercadolivreSdk\Entity\Order\Decorator;

use Gpupo\MercadolivreSdk\Entity\Order\Order;
use Gpupo\Tests\MercadolivreSdk\TestCaseAbstract;

/**
 * @coversDefaultClass \Gpupo\MercadolivreSdk\Entity\Order\Decorator\AbstractDecorator
 */
abstract class AbstractDecoratorTestCase extends TestCaseAbstract
{
    /**
     * @testdox Recebe o objeto ``Order``
     *
     * @dataProvider dataProviderOrders
     * @covers ::setOrder
     */
    public function testSetOrder(Order $order)
    {
        $this->assertInstanceOf(Order::class, $this->factory()
            ->setOrder($order)->getOrder());
    }

    /**
     * @testdox Falha ao validar ``Order`` com informações mínimas requeridas ausentes
     *
     * @covers ::factoryArray
     */
    public function testValidateFail()
    {
        $this->expectException(\Exception::class);

        $decorator = $this->getDecorator();
        $decorator->validate();
    }

    /**
     * @testdox Falha ao tentar submeter uma ordem incompleta para mudança de status
     * @covers ::factoryArray
     * @covers ::toArray
     */
    public function testToArrayFail()
    {
        $this->expectException(\Exception::class);
        $this->expectExceptionMessage('Attribute invalid: Order');
        $o = $this->proxy($this->getDecorator());
        $o->set('order', '');
        $o->toArray();
    }

    /**
     * @testdox Tem sucesso ao validar as informações mínimas requeridas para uma mudança de status
     *
     * @covers \Gpupo\MercadolivreSdk\Entity\Order\Decorator\AbstractDecorator::validate
     * @covers ::validate
     * @covers ::toArray
     * @dataProvider dataProviderOrders
     */
    public function testValidate(Order $order)
    {
        $decorator = $this->getDecorator($this->getExpectedArray())->setOrder($order);
        $decorator->validate();
        $this->assertInstanceOf(Order::class, $decorator->getOrder());
    }

    /**
     * @testdox Prepara as informações como de acordo com o pedido na mudança de status
     *
     * @dataProvider dataProviderOrders
     * @covers \Gpupo\MercadolivreSdk\Entity\Order\Decorator\AbstractDecorator
     * @covers ::toArray
     * @covers ::factoryArray
     */
    public function testToArray(Order $order)
    {
        $decorator = $this->factoryDecorator($order, $this->getExpectedArray());
        $this->assertSame($this->getExpectedArray(), $decorator->toArray());
    }

    /**
     * @testdox Prepara JSON de acordo com o pedido na mudança de status
     *
     * @covers ::toArray
     * @covers ::toJson
     * @covers ::factoryArray
     * @dataProvider dataProviderOrders
     */
    public function testToJson(Order $order)
    {
        $decorator = $this->factoryDecorator($order, $this->getExpectedArray());
        $this->assertSame($this->getExpectedJson(), $decorator->toJson());
    }

    /**
     * @testdox Lida com as mensagens de validação
     * @covers ::fail
     */
    public function testFailMessage()
    {
        $this->expectException(\InvalidArgumentException::class);

        $o = $this->proxy($this->getDecorator());
        $o->fail();
    }

    /**
     * @testdox Lida com as mensagens de validação especificando o atributo com problemas
     * @covers ::invalid
     */
    public function testInvalidMessage()
    {
        $this->expectException(\InvalidArgumentException::class);
        $this->expectExceptionMessage('Attribute invalid: foo');

        $o = $this->proxy($this->getDecorator());
        $o->invalid('foo');
    }

    /**
     * @testdox Possui validação de Order
     * @covers ::validate
     */
    public function testBasicValidate()
    {
        $this->expectException(\InvalidArgumentException::class);
        $this->expectExceptionMessage('Attribute invalid: Order');

        $o = $this->proxy($this->getDecorator());
        $o->set('order', '');
        $o->validate();
    }

    protected function getExpectedArray()
    {
        return $this->getResourceJson('mockup/Order/Status/'.$this->target.'.json');
    }

    protected function getExpectedJson()
    {
        return trim($this->getResourceContent('mockup/Order/Status/'.$this->target.'.json'));
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
}
