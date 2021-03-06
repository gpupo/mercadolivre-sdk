<?php

declare(strict_types=1);

/*
 * This file is part of gpupo/mercadolivre-sdk created by Gilmar Pupo <contact@gpupo.com>
 * For the information of copyright and license you should read the file LICENSE which is
 * distributed with this source code. For more information, see <https://opensource.gpupo.com/>
 */

namespace Gpupo\MercadolivreSdk\Console\Command\Schema;

use Gpupo\MercadolivreSdk\Console\Command\AbstractCommand;
use Gpupo\MercadolivreSdk\Entity\Product\Product;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;
use Symfony\Component\Yaml\Yaml;

/**
 * @codeCoverageIgnore
 */
final class ProductCommand extends AbstractCommand
{
    /**
     * {@inheritdoc}
     */
    protected function configure()
    {
        $this
            ->setName(self::NAME_PREFIX.'schema:product')
            ->setDescription('Dump Product Schema');
    }

    /**
     * {@inheritdoc}
     */
    protected function execute(InputInterface $input, OutputInterface $output)
    {
        $product = new Product();
        $schema = $this->getSchema($product);
        $this->writeInfo($output, $schema);
        $content = Yaml::dump($schema, 8);

        file_put_contents('Resources/schema/product.yaml', $content);

        return 0;
    }
}
