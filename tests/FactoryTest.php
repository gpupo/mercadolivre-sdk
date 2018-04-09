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

namespace Gpupo\Tests\MercadolivreSdk;

use Gpupo\MercadolivreSdk\Client\Client;
use Gpupo\MercadolivreSdk\Client\Ml;
use Gpupo\MercadolivreSdk\Factory;
use Gpupo\Tests\CommonSdk\FactoryTestAbstract;

/**
 * @coversNothing
 */
class FactoryTest extends FactoryTestAbstract
{
    public $namespace = '\Gpupo\MercadolivreSdk\\';

    public function getFactory()
    {
        return Factory::getInstance();
    }

    /**
     * Dá acesso a ``Factory``.
     */
    public function testSetClient()
    {
        $factory = new Factory();

        $factory->setClient([
        ]);

        $this->assertInstanceOf(Client::class, $factory->getClient());
    }

    /**
     * Dá acesso a Sdk Oficial.
     */
    public function testAccessMl()
    {
        $factory = new Factory();

        $factory->setClient([]);

        $this->assertInstanceOf(Ml::class, $factory->getClient()->accessMl());
    }

    /**
     * @dataProvider dataProviderManager
     *
     * @param mixed $objectExpected
     * @param mixed $target
     */
    public function testCentralizaAcessoAManagers($objectExpected, $target)
    {
        return $this->assertInstanceOf(
            $objectExpected,
            $this->createObject($this->getFactory(), 'factoryManager', $target)
        );
    }

    public function dataProviderObjetos()
    {
        return [
            [$this->namespace.'Entity\Product\Product', 'product', null],
        ];
    }

    public function dataProviderManager()
    {
        return [
            [$this->namespace.'Entity\Product\Manager', 'product'],
        ];
    }
}
