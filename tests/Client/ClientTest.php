<?php

declare(strict_types=1);

/*
 * This file is part of gpupo/mercadolivre-sdk created by Gilmar Pupo <contact@gpupo.com>
 * For the information of copyright and license you should read the file LICENSE which is
 * distributed with this source code. For more information, see <https://opensource.gpupo.com/>
 */

namespace  Gpupo\MercadolivreSdk\Tests\Client;

use Gpupo\CommonSdk\Client\ClientInterface;
use Gpupo\MercadolivreSdk\Tests\TestCaseAbstract;

/**
 * @coversNothing
 */
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
