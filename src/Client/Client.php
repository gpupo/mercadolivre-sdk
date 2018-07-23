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

use Gpupo\CommonSchema\ArrayCollection\Application\API\OAuth\Client\AccessToken;
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
        $domain = 'api.mercadolibre.com';

        return [
            'app_id' => false,
            'secret_key' => false,
            'access_token' => false,
            'refresh_token' => false,
            'user_id' => false,
            'users_url' => sprintf('https://%s/users', $domain),
            'base_url' => sprintf('https://%s', $domain),
            'oauth_url' => sprintf('https://%s/oauth', $domain),
            'verbose' => true,
            'cacheTTL' => 3600,
            'offset' => 0,
            'limit' => 30,
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

    public function requestToken()
    {
        $pars = [
          'grant_type' => 'client_credentials',
          'client_id' => $this->getOptions()->get('client_id'),
          'client_secret' => $this->getOptions()->get('client_secret'),
        ];

        $this->setMode('form');
        $request = $this->post($this->getOauthUrl('/token'), $pars);
        $accessToken = $request->getData(AccessToken::class);

        return $accessToken;
    }

    protected function renderAuthorization()
    {
        $list = [];

        return $list;
    }

    protected function getOauthUrl($path)
    {
        return $this->getOptions()->get('oauth_url').$path;
    }
}
