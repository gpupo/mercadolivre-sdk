<?php

declare(strict_types=1);

/*
 * This file is part of gpupo/mercadolivre-sdk created by Gilmar Pupo <contact@gpupo.com>
 * For the information of copyright and license you should read the file LICENSE which is
 * distributed with this source code. For more information, see <https://opensource.gpupo.com/>
 */

$shipping = '';
if ($foreign->get('tracking')) {
    $shipping = [
        'shippingCode' => $foreign->get('tracking')['trackingNumber'],
    ];
}

return [
    'id' => $foreign->get('orderNumber'),
    'status' => $foreign->get('orderStatus'),
    'status_detail' => '',
    'date_created' => '',
    'date_closed' => '',
    'order_items' => '',
    'total_amount' => '',
    'currency_id' => '',
    'buyer' => '',
    'seller' => '',
    'payments' => '',
    'feedback' => '',
    'shipping' => $shipping,
    'tags' => '',
];
