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

use Gpupo\MercadolivreSdk\Factory;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Output\OutputInterface;
use Symfony\Component\Yaml\Yaml;

/**
 * @codeCoverageIgnore
 */
abstract class AbstractCommand extends Command
{
    const prefix = 'markethub:mercadolivre:';

    protected $factory;

    public function __construct(Factory $factory)
    {
        $this->factory = $factory;

        parent::__construct();
    }

    public function getProjectDataFilename()
    {
        return sprintf('var/mercadolivre-%d.yaml', $this->getFactory()->getOptions()->get('client_id'));
    }

    public function getFactory(): Factory
    {
        return $this->factory;
    }

    protected function getProjectData(): array
    {
        $data = Yaml::parseFile($this->getProjectDataFilename());

        return $data;
    }

    protected function writeProjectData(array $data)
    {
        $data['created_at'] = date('c');
        $content = Yaml::dump($data);

        return file_put_contents($this->getProjectDataFilename(), $content);
    }

    protected function writeInfo(OutputInterface $output, $info, $tabs = '')
    {
        $tabs = $tabs."\t";
        foreach ($info as $key => $value) {
            if (is_array($value)) {
                $output->writeln(sprintf($tabs.'<bg=green;fg=black> %s </>', $key));
                $this->writeInfo($output, $value, $tabs);
            } else {
                $output->writeln(sprintf($tabs.'%s: <bg=black> %s </>', $key, $value));
            }
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
