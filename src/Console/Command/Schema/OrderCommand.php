<?php

declare(strict_types=1);

/*
 * This file is part of gpupo/mercadolivre-sdk created by Gilmar Pupo <contact@gpupo.com>
 * For the information of copyright and license you should read the file LICENSE which is
 * distributed with this source code. For more information, see <https://opensource.gpupo.com/>
 */

namespace Gpupo\MercadolivreSdk\Console\Command\Schema;

use Gpupo\MercadolivreSdk\Console\Command\AbstractCommand;
use Gpupo\MercadolivreSdk\Entity\Order\Order;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;
use Symfony\Component\Yaml\Yaml;

/**
 * @codeCoverageIgnore
 */
final class OrderCommand extends AbstractCommand
{
    /**
     * {@inheritdoc}
     */
    protected function configure()
    {
        $this
            ->setName(self::NAME_PREFIX.'schema:order')
            ->setDescription('Dump Order Schema');
    }

    /**
     * {@inheritdoc}
     */
    protected function execute(InputInterface $input, OutputInterface $output)
    {
        $order = new Order();
        $schema = $this->getSchema($order);
        $this->writeInfo($output, $schema);
        $content = Yaml::dump($schema, 8);

        file_put_contents('Resources/schema/order.yaml', $content);

        return 0;
    }
}
