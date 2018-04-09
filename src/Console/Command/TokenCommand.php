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
    public function main($app)
    {
        $this->getApp()->appendCommand('auth:token', 'Get the token')
            ->setCode(function (InputInterface $input, OutputInterface $output) use ($app) {
                $list = $app->processInputParameters([], $input, $output);
                $client = $app->factorySdk($list)->getClient();
                $meli = $client->accessMl();
                $url = $list['app_url'];

                try {
                    $redirectUrl = $meli->getAuthUrl($url, $meli::$AUTH_URL['MLB']);
                    $output->writeln('Open this url in your browser:'.$redirectUrl);
                    $question = new Question('code: ');
                    $code = $this->getApp()->getHelperSet()->get('question')->ask($input, $output, $question);
                    $output->writeln($code);
                    $user = $meli->authorize($code, $url);
                    dump($user);
                } catch (\Exception $e) {
                    $app->showException($e, $output);
                }
            });
    }
}
