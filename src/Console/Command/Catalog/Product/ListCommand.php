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

namespace Gpupo\MercadolivreSdk\Console\Command\Catalog\Product;

use Gpupo\MercadolivreSdk\Console\Command\AbstractCommand;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;
use Gpupo\Common\Traits\TableTrait;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputOption;


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
            ->setName(self::prefix.'catalog:product:list')
            ->setDescription('Get the product list on Mercado Livre')
            ->addOption(
                'offset',
                null,
                InputOption::VALUE_REQUIRED,
                'Current offset of list',
                0
            )
            ->addOption(
                'max',
                null,
                InputOption::VALUE_REQUIRED,
                'Max items quantity',
                100
            );
    }

    /**
     * {@inheritdoc}
     */
    protected function execute(InputInterface $input, OutputInterface $output)
    {
        $productManager = $this->getFactory()->factoryManager('product');
        $offset = $input->getOption('offset');
        $max = $input->getOption('max');

        $items = [];
        try {
            $output->writeln(sprintf('Fetching from %d to %d', $offset, ($offset+$this->limit)));
            $response = $productManager->rawFetch($offset, $this->limit);
            $paging = $response->get('paging');
            $total = $paging['total'];
            $output->writeln(sprintf('Total: <bg=green;fg=black> %d </>', $total));
            $items = array_merge($items, $response->get('results'));
            while ($offset < ($total - $this->limit) && $offset < ($max - $this->limit)) {
                $offset += $this->limit;
                $output->writeln(sprintf('Fetching from %d to %d', $offset, ($offset+$this->limit)));
                $response = $productManager->rawFetch($offset, $this->limit);
                $items = array_merge($items, $response->get('results'));
            }

            $collection = [];

            foreach($items as $item) {
                $collection[] = [
                    'id' => $item,
                ];
            }
            $this->displayTableResults($output, $collection);
        } catch (\Exception $exception) {
            $output->writeln(sprintf('Error: <bg=red>%s</>', $exception->getmessage()));
        }
    }
}
