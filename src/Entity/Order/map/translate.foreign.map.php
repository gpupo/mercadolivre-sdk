<?php

/*
 * This file is part of gpupo/mercadolivre-sdk
 * Created by Gilmar Pupo <g@g1mr.com>
 * For the information of copyright and license you should read the file
 * LICENSE which is distributed with this source code.
 * Para a informação dos direitos autorais e de licença você deve ler o arquivo
 * LICENSE que é distribuído com este código-fonte.
 * Para obtener la información de los derechos de autor y la licencia debe leer
 * el archivo LICENSE que se distribuye con el código fuente.
 * For more information, see <http://www.g1mr.com/>.
 */

$shipping = '';
 if ($foreign->get('tracking')) {
     $shipping = [
         'shippingCode' => $foreign->get('tracking')['trackingNumber'],
     ];
 }

return [
    "id"            => $foreign->get('orderNumber'),
    "status"        => $foreign->get('orderStatus'),
    "status_detail" => '',
    "date_created"  => '',
    "date_closed"   => '',
    "order_items"   => '',
    "total_amount"  => '',
    "currency_id"   => '',
    "buyer"         => '',
    "seller"        => '',
    "payments"      => '',
    "feedback"      => '',
    "shipping"      => $shipping,
    "tags"          => '',
];
