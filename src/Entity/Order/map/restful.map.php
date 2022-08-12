<?php

declare(strict_types=1);

/*
 * This file is part of gpupo/mercadolivre-sdk created by Gilmar Pupo <contact@gpupo.com>
 * For the information of copyright and license you should read the file LICENSE which is
 * distributed with this source code. For more information, see <https://opensource.gpupo.com/>
 */

$put = function () {
    return [
        'PUT',
        '/shipments/{shipmentId}?',
    ];
};

return [
    'save' => [
        'POST',
        '/orders',
    ],
    'fetch' => [
        'GET',
        '/orders/search/recent?seller={user_id}&',
    ],
    'findById' => [
        'GET',
        '/orders/{itemId}?',
    ],
    'findShipmentById' => [
        'GET',
        '/shipments/{shipmentId}?',
    ],
    'findCteByShipmentId' => [
        'GET',
        '/shipments/{shipmentId}/cte?doctype=xml&',
    ],
    'findInvoiceByShipmentId' => [
        'GET',
        '/shipments/{shipmentId}/invoice_data?siteId=MLB'
    ],
    'sendInvoiceToShipment' => [
        'POST',
        '/shipments/{shipmentId}/invoice_data?siteId=MLB'
    ],
    'updateInvoiceToShipment' => [
        'PUT',
        '/shipments/{shipmentId}/invoice_data?siteId=MLB'
    ],
    'billingInfo' => [
        'GET',
        '/orders/{itemId}/billing_info?',
    ],
    'downloadTicket' => [
        'GET',
        '/shipment_labels?shipment_ids={shipmentId}&response_type=pdf',
    ],
    'toTracked' => $put(),
    'toProcessing' => $put(),
    'toShipped' => $put(),
    'toDelivered' => $put(),
    'toCanceled' => $put(),
];
