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

namespace Gpupo\MercadolivreSdk\Console\Command\Message;

use Gpupo\Common\Traits\TableTrait;
use Gpupo\MercadolivreSdk\Console\Command\AbstractCommand;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;

class ListCommand extends AbstractCommand
{
    use TableTrait;

    /**
     * {@inheritdoc}
     */
    protected function configure()
    {
        $this
            ->setName(self::NAME_PREFIX.'message:list')
            ->setDescription('List a messages on Mercado Livre')
            ->addArgument('id', InputArgument::REQUIRED, 'Order ID');
    }

    /**
     * {@inheritdoc}
     */
    protected function execute(InputInterface $input, OutputInterface $output)
    {
        $id = $input->getArgument('id');

        try {
            $order = $this->getFactory()->createOrder(['id' => $id]);
            $messageManager = $this->getFactory()->factoryManager('message');
            $messageCollection = $messageManager->findByOrderId($order);

            $output->writeln(sprintf('Total: <bg=green;fg=black> %d </>', $messageCollection->count()));
            $this->displayTableResults($output, $messageCollection);
        } catch (\Exception $exception) {
            $output->writeln(sprintf('Error: <bg=red>%s</>', $exception->getmessage()));
        }
    }
}
