<?php

namespace Gpupo\MercadolivreSdk;

use Gpupo\CommonSdk\FactoryAbstract;
use Gpupo\MercadolivreSdk\Client\Client;

/**
 * Construtor principal, estendido pelo Factory de MarkethubBundle.
 */
class Factory extends FactoryAbstract
{
    public function setClient(array $clientOptions = [])
    {
        $this->client = new Client($clientOptions, $this->logger);
    }

    public function getNamespace()
    {
        return  '\\'.__NAMESPACE__.'\Entity\\';
    }

    protected function getSchema($namespace = null)
    {
        return [
            'product' => [
                'class'   => $namespace.'Product\Product',
                'manager' => $namespace.'Product\Manager',
            ],
            'order' => [
                'class'   => $namespace.'Order\Order',
                'manager' => $namespace.'Order\Manager',
            ],
        ];
    }
}
