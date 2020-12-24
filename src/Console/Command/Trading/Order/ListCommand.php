<?php

declare(strict_types=1);

/*
 * This file is part of gpupo/mercadolivre-sdk created by Gilmar Pupo <contact@gpupo.com>
 * For the information of copyright and license you should read the file LICENSE which is
 * distributed with this source code. For more information, see <https://opensource.gpupo.com/>
 */

namespace Gpupo\MercadolivreSdk\Console\Command\Trading\Order;

use Gpupo\Common\Traits\TableTrait;
use Gpupo\MercadolivreSdk\Console\Command\AbstractCommand;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;

class ListCommand extends AbstractCommand
{
    use TableTrait;

    private $limit = 50;

    /**
     * {@inheritdoc}
     */
    protected function configure()
    {
        $this
            ->setName(self::NAME_PREFIX.'trading:order:list')
            ->setDescription('Get the Order list on Mercado Livre')
            ->addOptionsForList();
    }

    /**
     * {@inheritdoc}
     */
    protected function execute(InputInterface $input, OutputInterface $output)
    {
        $orderManager = $this->getFactory()->factoryManager('order');
        $offset = $input->getOption('offset');
        $max = $input->getOption('max');
        $output->writeln(sprintf('Max items from this fetch is <fg=blue> %d </>', $max));
        $items = [];

        try {
            $output->writeln(sprintf('Fetching from %d to %d', $offset, ($offset + $this->limit)));
            $response = $orderManager->rawFetch($offset, $this->limit);

            $paging = $response->get('paging');
            $total = $paging['total'];
            $output->writeln(sprintf('Total: <bg=green;fg=black> %d </>', $total));
            $this->displayTableResults($output, $response->get('results'));
        } catch (\Exception $exception) {
            $output->writeln(sprintf('Error: <bg=red>%s</>', $exception->getmessage()));
        }

        return 0;
    }
}
