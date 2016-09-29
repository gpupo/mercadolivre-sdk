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

namespace Gpupo\MercadolivreSdk\Console\Command;

use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;

/**
 * @codeCoverageIgnore
 */
final class AuthCommand extends AbstractCommand
{
    public function main($app)
    {
        $this->getApp()->appendCommand('auth:refresh', 'Refresh token change')
            ->setCode(function (InputInterface $input, OutputInterface $output) use ($app) {

                $list = $app->processInputParameters([], $input, $output);
                $client = $app->factorySdk($list)->getClient();

                $tokenFile = 'var/mercadolivre-token.json';

                try {
                    $data = $app->jsonLoadFromFile($tokenFile);
                    $config = [
                        'grant_type'    => 'refresh_token',
                        'refresh_token' => $data['refresh_token'],
                        'client_id'     => $client->getOptions()->get('client_id'),
                        'client_secret' => $client->getOptions()->get('access_token'),
                    ];

                    $uri = 'https://api.mercadolibre.com/oauth/token?'.http_build_query($config);
                    $response = $client->post($uri, '');
                    $data = $response->getData();
                    $data->set('created_at', date('c'));
                    $app->jsonSaveToFile($data->toArray(), $tokenFile, $output);
                    $output->writeln($data['created_at']);
                    $output->writeln('New access token: '.$data['access_token']);
                    $output->writeln('New refresh token: '.$data['refresh_token']);
                } catch (\Exception $e) {
                    $app->showException($e, $output);
                }
            });
    }
}
