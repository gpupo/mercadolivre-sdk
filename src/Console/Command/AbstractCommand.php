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
use Symfony\Component\Yaml\Yaml;
use Symfony\Component\Console\Output\OutputInterface;

/**
 * @codeCoverageIgnore
 */
abstract class AbstractCommand extends Command
{
    const prefix = 'gpupo:mercadolivre:';

    public $file = 'var/mercadolivre.yaml';

    protected $factory;

    public function __construct(Factory $factory)
    {
        $this->factory = $factory;

        parent::__construct();
    }

    public function getFactory(): Factory
    {
        return $this->factory;
    }

    protected function getProjectData(): array
    {
        $data = Yaml::parseFile($this->file);

        return $data;
    }

    protected function writeProjectData(array $data)
    {
        $data['created_at'] = date('c');
        $content = Yaml::dump($data);

        return file_put_contents($this->file, $content);
    }

    protected function writeInfo(OutputInterface $output, $info, $tabs = '')
    {
        $tabs = $tabs . "\t";
        foreach ($info as $key => $value) {
            if (is_array($value)) {
                $output->writeln(sprintf($tabs."<bg=green;fg=black> %s </>", $key));
                $this->writeInfo($output, $value, $tabs);
            } else {
                $output->writeln(sprintf($tabs."%s: <bg=black> %s </>", $key, $value));
            }
        }
    }
}
