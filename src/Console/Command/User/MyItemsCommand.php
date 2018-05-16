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

namespace Gpupo\MercadolivreSdk\Console\Command\User;

use Gpupo\Common\Traits\TableTrait;
use Gpupo\MercadolivreSdk\Console\Command\AbstractCommand;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;

/**
 * @codeCoverageIgnore
 */
final class MyItemsCommand extends AbstractCommand
{
    use TableTrait;

    /**
     * {@inheritdoc}
     */
    protected function configure()
    {
        $this
            ->setName(self::prefix.'user:items')
            ->setDescription('Mercado Livre user items');
    }

    /**
     * {@inheritdoc}
     */
    protected function execute(InputInterface $input, OutputInterface $output)
    {
        $projectData = $this->getProjectData();

        if (!array_key_exists('user_id', $projectData)) {
            throw new \Exception('User Id required!');
        }

        $this->getFactory()->getLogger()->addInfo('Project Data', $projectData);
        $manager = $this->getFactory()->factoryManager('generic');
        $data = $manager->getFromRoute(['GET', '/users/{user_id}/items/search?access_token={access_token}&limit=10'], $projectData);

        $this->displayTableResults($output, $data);

        //$this->writeInfo($output, $data);
    }
}
