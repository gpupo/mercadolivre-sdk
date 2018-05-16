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

namespace Gpupo\MercadolivreSdk\Client;

use Meli;

class Ml extends Meli
{
    public function setRefreshToken($refresh_token)
    {
        $this->refresh_token = $refresh_token;
    }

    public function getAuthRedirectUrl($url)
    {
        return $this->getAuthUrl($url, self::$AUTH_URL['MLB']);
    }
}
