<?php

declare(strict_types=1);

/*
 * This file is part of gpupo/mercadolivre-sdk created by Gilmar Pupo <contact@gpupo.com>
 * For the information of copyright and license you should read the file LICENSE which is
 * distributed with this source code. For more information, see <https://opensource.gpupo.com/>
 */

namespace  Gpupo\MercadolivreSdk\Tests\Client;

use Gpupo\MercadolivreSdk\Client\Ml;
use Gpupo\MercadolivreSdk\Tests\TestCaseAbstract;
use Meli;

/**
 * @coversNothing
 */
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
