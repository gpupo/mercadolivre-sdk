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
$quantity = 0;
$items = $native['order_items'];
$acceptedOffer = [];
foreach ($items as $item) {
    $quantity += $item['quantity'];
    $acceptedOffer[] = [
        'itemOffered' => [
            'sku' => $item['item']['id'],
        ],
        'quantity' => $item['quantity'],
        'price' => $item['unit_price'],
    ];
}
$dateTime = new DateTime($native['date_created']);

$translateStatus = function ($status) {
    $string = strtoupper($status);
    $list = include __DIR__.'/status.map.php';
    $find = array_search($string, $list, true);

    return empty($find) ? $string : $find;
};

return [
     'merchant' => [
         'name'         => 'MERCADOLIVRE',
         'marketplace'  => 'MERCADOLIVRE',
         'originNumber' => '',
     ],
     'orderNumber'    => $native->getId(),
     'acceptedOffer'  => $acceptedOffer,
     'orderStatus'    => $translateStatus($native->getStatus()),
     'orderDate'      => $dateTime->format('Y-m-d H:i:s'),
     'customer'       => [
         'document'   => $native['buyer']['billing_info']['doc_number'],
         'name' => $native['buyer']['first_name'].' '.$native['buyer']['last_name'],
         'telephone'  => '('.$native['buyer']['phone']['area_code'].') '.$native['buyer']['phone']['number'],
         'email' => $native['buyer']['email'],
     ],
     'billingAddress' => [
         'streetAddress'       => $native->getShipping()['receiver_address']['street_name'],
         'addressComplement'   => $native->getShipping()['receiver_address']['comment'],
         'addressReference'    => '',
         'addressNumber'       => $native->getShipping()['receiver_address']['street_number'],
         'addressLocality'     => $native->getShipping()['receiver_address']['city']['name'],
         'addressRegion'       => str_replace('BR-', '', $native->getShipping()['receiver_address']['state']['id']),
         'addressNeighborhood' => '',
         'postalCode'          => $native->getShipping()['receiver_address']['zip_code'],
     ],
     'currency'       => 'BRL',
     'price'          => $native['total_amount'],
     'discount'       => 0,
     'quantity'       => $quantity,
     'freight'        => '',
     'total'          => $native['total_amount'],
 ];
