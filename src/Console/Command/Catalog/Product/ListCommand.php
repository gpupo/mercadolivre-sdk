<?php

declare(strict_types=1);

/*
 * This file is part of gpupo/mercadolivre-sdk created by Gilmar Pupo <contact@gpupo.com>
 * For the information of copyright and license you should read the file LICENSE which is
 * distributed with this source code. For more information, see <https://opensource.gpupo.com/>
 */

namespace Gpupo\MercadolivreSdk\Console\Command\Catalog\Product;

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
        $this->setName(self::NAME_PREFIX.'catalog:product:list')->setDescription('Get the product list on Mercado Livre');
        $this->addOptionsForList();
    }

    /**
     * {@inheritdoc}
     */
    protected function execute(InputInterface $input, OutputInterface $output)
    {
        $productManager = $this->getFactory()->factoryManager('product');
        $offset = $input->getOption('offset');
        $max = $input->getOption('max');
        $output->writeln(sprintf('Max items from this fetch is <fg=blue> %d </>', $max));
        $items = [];

        try {
            $output->writeln(sprintf('Fetching from %d to %d', $offset, ($offset + $this->limit)));
            $response = $productManager->rawFetch($offset, $this->limit);
            $paging = $response->get('paging');
            $total = $paging['total'];
            $output->writeln(sprintf('Total: <bg=green;fg=black> %d </>', $total));
            $items = array_merge($items, $response->get('results'));
            while ($offset < ($total - $this->limit) && $offset < ($max - $this->limit)) {
                $offset += $this->limit;
                $output->writeln(sprintf('Fetching from %d to %d', $offset, ($offset + $this->limit)));
                $response = $productManager->rawFetch($offset, $this->limit);
                $items = array_merge($items, $response->get('results'));
            }

            $collection = [];

            foreach ($items as $item) {
                $collection[] = [
                    'id' => $item,
                ];
            }
            $this->displayTableResults($output, $collection);
        } catch (\Exception $exception) {
            $output->writeln(sprintf('Error: <bg=red>%s</>', $exception->getmessage()));
        }

        return 0;
    }
}
