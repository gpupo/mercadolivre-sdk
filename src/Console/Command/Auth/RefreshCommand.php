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

namespace Gpupo\MercadolivreSdk\Console\Command\Auth;

use Gpupo\MercadolivreSdk\Console\Command\AbstractCommand;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;

/**
 * @codeCoverageIgnore
 */
final class RefreshCommand extends AbstractCommand
{
    /**
     * {@inheritdoc}
     */
    protected function configure()
    {
        $this
            ->setName(self::prefix.'auth:refresh')
            ->setDescription('Refresh Mercado Livre token');
    }

    /**
     * {@inheritdoc}
     */
    protected function execute(InputInterface $input, OutputInterface $output)
    {
        $data = $this->getProjectData();

        if (!array_key_exists('refresh_token', $data)) {
            throw new \Exception('Refresh Token required!');
        }

        $output->writeln(sprintf('Old access token: <bg=black>%s</>', $data['refresh_token']));
        $client = $this->getFactory()->getClient();

        $config = [
            'grant_type' => 'refresh_token',
            'refresh_token' => $data['refresh_token'],
            'client_id' => $client->getOptions()->get('client_id'),
            'client_secret' => $client->getOptions()->get('access_token'),
        ];

        $uri = $client->getResourceUri('/oauth/token?'.http_build_query($config));
        $output->writeln('Request: '.$uri);

        try {
            $response = $client->post($uri, '');
            $this->writeProjectData((array) $data);
            $output->writeln($data['created_at']);
            $output->writeln('New access token: '.$data['access_token']);
            if (array_key_exists('refresh_token', $data)) {
                $output->writeln('New refresh token: '.$data['refresh_token']);
            }
        } catch (\Exception $exception) {
            $output->writeln(sprintf('Error: <bg=red>%s</>', $exception->getmessage()));
        }
    }
}
