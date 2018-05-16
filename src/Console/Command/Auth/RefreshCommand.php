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
 *
 * @see http://developers.mercadolibre.com/server-side/
 * What happens if I need to work with an access_token for more than 6 hours?
 * If your app has the option offline_access selected, you will receive a refresh_token along with the access_token as
 * shown before; you should save the refresh_token to be later exchanged for a new access_token upon expiration.
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

        $config = [
            'grant_type' => 'refresh_token', // It indicates that the intended operation is to refresh a token.
            'client_id' => $this->getFactory()->getOptions()->get('client_id'), //The client ID of your application.
            'client_secret' => $this->getFactory()->getOptions()->get('secret_key'), //The Secret Key generated for your app when created.
            'refresh_token' => $data['refresh_token'], // The refresh token from the approval step.
        ];

        foreach ($config as $key => $value) {
            if (empty($value)) {
                throw new \Exception(sprintf('<bg=red>%s</> is required!', $key));
            }
        }

        $this->writeInfo($output, $config);
        $uri = $this->getFactory()->getClient()->getResourceUri('/oauth/token?'.http_build_query($config));
        $output->writeln(sprintf('Request URL to perform is <bg=black>%s</>', $uri));

        try {
            $response = $this->getFactory()->getClient()->post($uri, '');
            $data = (array) $response['body'];

            return $this->saveCredentials($data, $output);
        } catch (\Exception $exception) {
            $output->writeln(sprintf('Error: <bg=red>%s</>', $exception->getmessage()));
        }
    }
}
