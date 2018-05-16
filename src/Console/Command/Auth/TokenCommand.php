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

        try {
            $redirectUrl = $client->accessMl()->getAuthRedirectUrl($url);
            $question = new ConfirmationQuestion(sprintf('Open url <bg=black>%s</> in your browser? (y/n)', $redirectUrl), false);

            if ($this->getApplication()->getHelperSet()->get('question')->ask($input, $output, $question)) {
                exec("open ${redirectUrl}");
            }

            $output->writeln('The authorization code is used to exchange it for the access_token.');
            $question = new Question('code (starts with <bg=blue>TG-</>): ');
            $code = $this->getApplication()->getHelperSet()->get('question')->ask($input, $output, $question);
            $response = $client->accessMl()->authorize($code, $url);
            $data = (array) $response['body'];

            return $this->saveCredentials($data, $output);
        } catch (\Exception $exception) {
            $output->writeln(sprintf('Error: <bg=red>%s</>', $exception->getmessage()));
        }
    }
}
