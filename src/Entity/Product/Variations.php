<?php

namespace Gpupo\MercadolivreSdk\Entity\Product;

use Gpupo\CommonSdk\Entity\CollectionAbstract;
use Gpupo\CommonSdk\Traits\FinderTrait;

final class Variations extends CollectionAbstract
{
    use FinderTrait;

    public function factoryElement($data)
    {
        return new Variation\Item($data);
    }
}
