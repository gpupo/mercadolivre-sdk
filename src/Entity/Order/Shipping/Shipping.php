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

class Shipping extends EntityAbstract implements EntityInterface
{
    /**
     * @codeCoverageIgnore
     */
    public function getSchema(): array
    {
        return [
            'cost' => 'integer',
            'currency_id' => 'string',
            'date_created' => 'string',
            'date_first_printed' => 'string',
            'id' => 'integer',
            'picking_type' => 'string',
            'receiver_address' => 'object',
            'sender_id' => 'integer',
            'service_id' => 'integer',
            'shippingCode' => 'string',
            'shipment_type' => 'string',
            'shipping_items' => 'object',
            'shipping_mode' => 'string',
            'shipping_option' => 'object',
            'status' => 'string',
            'substatus' => 'string',
        ];
    }
}
