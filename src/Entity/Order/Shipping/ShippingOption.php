<?php

declare(strict_types=1);

/*
 * This file is part of gpupo/mercadolivre-sdk created by Gilmar Pupo <contact@gpupo.com>
 * For the information of copyright and license you should read the file LICENSE which is
 * distributed with this source code. For more information, see <https://opensource.gpupo.com/>
 */

namespace Gpupo\MercadolivreSdk\Entity\Order\Shipping;

use Gpupo\CommonSdk\Entity\EntityAbstract;
use Gpupo\CommonSdk\Entity\EntityInterface;

class ShippingOption extends EntityAbstract implements EntityInterface
{
    /**
     * @codeCoverageIgnore
     */
    public function getSchema(): array
    {
        return [
            'cost' => 'number',
            'list_cost' => 'number',
            'currency_id' => 'string',
            'estimated_delivery' => 'object',
            'id' => 'integer',
            'name' => 'string',
            'shipping_method_id' => 'integer',
            'speed' => 'object',
        ];
    }
}
