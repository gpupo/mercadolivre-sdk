<?php

declare(strict_types=1);

/*
 * This file is part of gpupo/mercadolivre-sdk created by Gilmar Pupo <contact@gpupo.com>
 * For the information of copyright and license you should read the file LICENSE which is
 * distributed with this source code. For more information, see <https://opensource.gpupo.com/>
 */

namespace Gpupo\MercadolivreSdk\Client;

use Gpupo\CommonSchema\ArrayCollection\Application\API\OAuth\Client\AccessToken;
use Gpupo\CommonSdk\Client\ClientAbstract;
use Gpupo\CommonSdk\Client\ClientInterface;

final class Client extends ClientAbstract implements ClientInterface
{
    const ENDPOINT = 'api.mercadolibre.com';

    const ACCEPT_DEFAULT = 'application/json';

    private $ml;

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
        if ($this->getOptions()->get('client_refresh_token') && !empty($this->getOptions()->get('client_refresh_token'))) {
            $pars = [
                'grant_type' => 'refresh_token',
                'client_id' => $this->getOptions()->get('client_id'),
                'client_secret' => $this->getOptions()->get('client_secret'),
                'refresh_token' => $this->getOptions()->get('client_refresh_token'),
            ];
        } else {
            $pars = [
                'grant_type' => 'client_credentials',
                'client_id' => $this->getOptions()->get('client_id'),
                'client_secret' => $this->getOptions()->get('client_secret'),
            ];
        }

        $this->setMode('form');
        $request = $this->post($this->getOauthUrl('/token'), $pars);
        $accessToken = $request->getData(AccessToken::class);

        return $accessToken;
    }

    protected function renderAuthorization(): array
    {
        return [
            'Authorization' => sprintf('Bearer %s', $this->getOptions()->get('access_token')),
        ];
    }

    protected function getOauthUrl($path)
    {
        return $this->getOptions()->get('oauth_url').$path;
    }
}
