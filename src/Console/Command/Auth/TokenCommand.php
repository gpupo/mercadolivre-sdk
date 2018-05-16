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
use Symfony\Component\Console\Question\ConfirmationQuestion;
use Symfony\Component\Console\Question\Question;

/**
 * @codeCoverageIgnore
 *
 * @see http://developers.mercadolibre.com/server-side/
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
            $question = new ConfirmationQuestion(sprintf('Open url <bg=black>%s</> in your browser? (y/n)', $redirectUrl), false);

            if ($this->getApplication()->getHelperSet()->get('question')->ask($input, $output, $question)) {
                exec("open ${redirectUrl}");
            }

            $output->writeln('The authorization code is used to exchange it for the access_token.');
            $question = new Question('code (starts with <bg=blue>TG-</>): ');
            $code = $this->getApplication()->getHelperSet()->get('question')->ask($input, $output, $question);
            $response = $meli->authorize($code, $url);
            $data = (array) $response['body'];

            return $this->saveCredentials($data, $output);
        } catch (\Exception $exception) {
            $output->writeln(sprintf('Error: <bg=red>%s</>', $exception->getmessage()));
        }
    }

    /**
     * Content of $data:
     * access_token
     * token_type
     * expires_in
     * scope
     * user_id.
     */
    protected function saveCredentials(array $data, OutputInterface $output)
    {
        $output->writeln('An access key to private resources valid for 6 hours');

        $this->writeInfo($output, $data);

        if (!array_key_exists('access_token', $data)) {
            throw new \Exception($data['message']);
        }

        if (!array_key_exists('refresh_token', $data)) {
            $output->writeln([
                'Warning: <bg=red>Offline App</>',
                '- If your App has the option offline_access selected, you will receive a refresh_token along with the access_token',
                '- refresh_token is <bg=red>not present</>',
            ]);
        }

        $this->writeProjectData($data);
    }
}
