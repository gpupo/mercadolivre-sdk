<?php

declare(strict_types=1);

/*
 * This file is part of gpupo/mercadolivre-sdk created by Gilmar Pupo <contact@gpupo.com>
 * For the information of copyright and license you should read the file LICENSE which is
 * distributed with this source code. For more information, see <https://opensource.gpupo.com/>
 */

namespace Gpupo\MercadolivreSdk;

use Gpupo\CommonSdk\FactoryAbstract;
use Gpupo\CommonSdk\FactoryInterface;
use Gpupo\MercadolivreSdk\Client\Client;

/**
 * Construtor principal, estendido pelo Factory de MarkethubBundle.
 */
class Factory extends FactoryAbstract implements FactoryInterface
{
    protected $name = 'mercadolivre-sdk';

    public function setClient(array $clientOptions = [])
    {
        $this->client = new Client($clientOptions, $this->getLogger(), $this->getSimpleCache());
    }

    public function getNamespace()
    {
        return '\\'.__NAMESPACE__.'\Entity\\';
    }

    protected function getSchema(): array
    {
        return [
            'product' => [
                'class' => Entity\Product\Product::class,
                'manager' => Entity\Product\Manager::class,
            ],
            'order' => [
                'class' => Entity\Order\Order::class,
                'manager' => Entity\Order\Manager::class,
            ],
            'message' => [
                'class' => Entity\Message\Message::class,
                'manager' => Entity\Message\Manager::class,
            ],
            'generic' => [
                'manager' => Entity\GenericManager::class,
            ],
            'user' => [
                'manager' => Entity\User\Manager::class,
            ],
        ];
    }
}
