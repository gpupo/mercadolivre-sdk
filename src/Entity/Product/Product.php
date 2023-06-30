<?php

declare(strict_types=1);

/*
 * This file is part of gpupo/mercadolivre-sdk created by Gilmar Pupo <contact@gpupo.com>
 * For the information of copyright and license you should read the file LICENSE which is
 * distributed with this source code. For more information, see <https://opensource.gpupo.com/>
 */

namespace Gpupo\MercadolivreSdk\Entity\Product;

use Gpupo\CommonSdk\Entity\EntityAbstract;
use Gpupo\CommonSdk\Entity\EntityInterface;

class Product extends EntityAbstract implements EntityInterface
{
    /**
     * @codeCoverageIgnore
     */
    public function getSchema(): array
    {
        return [
            'id' => 'string',
            'title' => 'string',
            'description' => 'array',
            'category_id' => 'string',
            'price' => 'number',
            'currency_id' => 'string',
            'buying_mode' => 'string',
            'listing_type_id' => 'string',
            'condition' => 'string',
            'pictures' => 'object',
            'available_quantity' => 'number',
            'shipping' => 'array',
            'official_store_id' => 'string',
            'status' => 'string',
            'seller_id' => 'string',
            'permalink' => 'string',
            'attributes' => 'array',
            'sold_quantity' => 'integer',
            'video_id' => 'string',
        ];
    }
}
