<?php

namespace Gpupo\MercadolivreSdk\Entity\Product\Variation;

use Gpupo\CommonSdk\Entity\EntityAbstract;
use Gpupo\CommonSdk\Entity\EntityInterface;

class Item extends EntityAbstract implements EntityInterface
{
    public function getSchema()
    {
        return [
            'attribute_combinations' => 'collection',
            'available_quantity'     => 'number',
            'price'                  => 'number',
            'picture_ids'            => 'array',
        ];
    }
}
