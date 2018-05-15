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

namespace Gpupo\MercadolivreSdk\Console\Command;

use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;
use Symfony\Component\Console\Question\Question;

/**
 * @codeCoverageIgnore
 */
final class TokenCommand extends AbstractCommand
{
    /**
     * {@inheritdoc}
     */
    protected function configure()
    {
        $this
            ->setName(self::prefix.'auth:token')
            ->setDescription('Get Mercado Livre token');
    }

    /**
     * {@inheritdoc}
     */
    protected function execute(InputInterface $input, OutputInterface $output)
    {
        $url = $this->getFactory()->getOptions()->get('app_url');
        $client = $this->getFactory()->getClient();
        $meli = $client->accessMl();

        try {
            $redirectUrl = $meli->getAuthUrl($url, $meli::$AUTH_URL['MLB']);
            $output->writeln(sprintf('Open this url in your browser: <bg=black>%s</>', $redirectUrl));
            $question = new Question('code: ');
            $code = $this->getApplication()->getHelperSet()->get('question')->ask($input, $output, $question);
            $response = $meli->authorize($code, $url);
            $data = (array) $response['body'];

            if (!array_key_exists('access_token', $data)) {
                throw new \Exception($data['message']);
            }

            $this->writeProjectData($data);
            $output->writeln('New access token: '.$data['access_token']);
        } catch (\Exception $exception){
            $output->writeln(sprintf('Error: <bg=red>%s</>', $exception->getmessage()));
        }
    }
}
