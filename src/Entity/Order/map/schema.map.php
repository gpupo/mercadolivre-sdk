<?php

declare(strict_types=1);

/*
 * This file is part of gpupo/mercadolivre-sdk created by Gilmar Pupo <contact@gpupo.com>
 * For the information of copyright and license you should read the file LICENSE which is
 * distributed with this source code. For more information, see <https://opensource.gpupo.com/>
 */

return [
    'id' => 'integer',
    'pack_id' => 'string',
    'status' => 'string',
    'status_detail' => 'object',
    'date_created' => 'string',
    'date_closed' => 'string',
    'order_items' => 'object',
    'total_amount' => 'number',
    'currency_id' => 'string',
    'buyer' => 'object',
    'seller' => 'object',
    'payments' => 'object',
    'feedback' => 'array',
    'shipping' => 'object',
    'tags' => 'array',
];
