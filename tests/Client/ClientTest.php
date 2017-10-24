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

namespace Gpupo\Tests\MercadolivreSdk\Client;

use Gpupo\CommonSdk\Client\ClientInterface;
use Gpupo\Tests\MercadolivreSdk\TestCaseAbstract;

class ClientTest extends TestCaseAbstract
{
    /**
     * @covers \Gpupo\MercadolivreSdk\Client\Client::getDefaultOptions
     * @covers \Gpupo\MercadolivreSdk\Client\Client::renderAuthorization
     */
    public function testSucessoAoDefinirOptions()
    {
        $client = $this->factoryClient();
        $this->assertInstanceOf(ClientInterface::class, $client);

        return $client;
    }

    /**
     * @depends testSucessoAoDefinirOptions
     */
    public function testGerenciaUriDeRecurso(ClientInterface $client)
    {
        $this->assertSame(
            'https://api.mercadolibre.com/items/MLB12343412/descriptions',
            $client->getResourceUri('/items/MLB12343412/descriptions')
        );
    }
}
