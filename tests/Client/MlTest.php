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

namespace Gpupo\Tests\MercadolivreSdk\Client;

use Gpupo\MercadolivreSdk\Client\Ml;
use Gpupo\Tests\MercadolivreSdk\TestCaseAbstract;
use Meli;

class MlTest extends TestCaseAbstract
{
    public function testLoad()
    {
        $meli = new Meli('1234', 'a secret', 'Access_Token', 'Refresh_Token');
        $this->assertInstanceof(Meli::class, $meli);
    }

    public function testMlClass()
    {
        $meli = new Ml('1234', 'secret', 'Access_Token', 'Refresh_Token');
        $this->assertInstanceof(Meli::class, $meli);
        $this->assertInstanceof(Ml::class, $meli);

        return $meli;
    }

    /**
     * @depends testMlClass
     */
    public function testGetAuthUrl(Ml $ml)
    {
        $ru = 'https://www.foo.com/bar';
        $redirect_uri = $ml->getAuthUrl($ru, 'https://auth.mercadolivre.com.br');

        $this->assertSame('https://auth.mercadolivre.com.br/authorization?client_id=1234&response_type=code&redirect_uri='.urlencode($ru), $redirect_uri);
    }

    /**
     * @depends testMlClass
     */
    public function testMakePath(Ml $ml)
    {
        $p = $ml->make_path('/items/MLB12343412/descriptions');

        $this->assertSame('https://api.mercadolibre.com/items/MLB12343412/descriptions', $p);
    }
}
