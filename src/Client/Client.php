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

use Gpupo\CommonSdk\Client\ClientAbstract;
use Gpupo\CommonSdk\Client\ClientInterface;

final class Client extends ClientAbstract implements ClientInterface
{
    private $ml;

    /**
     * @codeCoverageIgnore
     */
    public function getDefaultOptions()
    {
        return [
            'app_id' => false,
            'secret_key' => false,
            'access_token' => false,
            'refresh_token' => false,
            'base_url' => 'https://api.mercadolibre.com',
            'verbose' => true,
            'sslVersion' => 'SecureTransport',
            'cacheTTL' => 3600,
            'sslVerifyPeer' => true,
        ];
    }

    public function accessMl()
    {
        if (empty($this->ml)) {
            $this->ml = new Ml(
                $this->getOptions()->get('client_id'),
                $this->getOptions()->get('secret_key'),
                $this->getOptions()->get('access_token'),
                $this->getOptions()->get('refresh_token')
            );
        }

        return $this->ml;
    }

    protected function renderAuthorization()
    {
        $list = [];

        return $list;
    }
}
