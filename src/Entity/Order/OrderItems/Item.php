<?php

declare(strict_types=1);

/*
 * This file is part of gpupo/mercadolivre-sdk created by Gilmar Pupo <contact@gpupo.com>
 * For the information of copyright and license you should read the file LICENSE which is
 * distributed with this source code. For more information, see <https://opensource.gpupo.com/>
 */

namespace Gpupo\MercadolivreSdk\Entity\Order\OrderItems;

use Gpupo\CommonSdk\Entity\EntityAbstract;
use Gpupo\CommonSdk\Entity\EntityInterface;
use Gpupo\CommonSdk\Traits\LoadTrait;

final class Item extends EntityAbstract implements EntityInterface
{
    use LoadTrait;

    protected $primaryKey = 'id';

    /**
     * @codeCoverageIgnore
     */
    public function getSchema(): array
    {
        return [
            'id' => 'string',
            'title' => 'string',
            'category_id' => 'string',
            'variation_id' => 'string',
            'quantity' => 'integer',
            'unit_price' => 'number',
            'currency_id' => 'string',
            'sale_fee' => 'number',
            'condition' => 'string',
            'warranty' => 'string',
            'seller_custom_field' => 'string',
            'variation_attributes' => 'array',
            'differential_pricing_id' => 'integer',
            'listing_type_id' => 'string',
            'base_currency_id' => 'string',
            'full_unit_price' => 'number',
            'base_exchange_rate' => 'number',
            'manufacturing_days' => 'integer',
        ];
    }
}
