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
foreach ($items as $item) {
    $quantity += $item['quantity'];
}

return [
     'merchant' => [
         'name'         => 'MERCADOLIVRE',
         'marketplace'  => '',
         'originNumber' => '',
     ],
     'orderNumber'    => $native->getId(),
     'acceptedOffer'  => $native['order_items'],
     'orderStatus'    => $native->getStatus(),
     'orderDate'      => $native['date_created'],
     'customer'       => $native->getBuyer(),
     'billingAddress' => $native->getShipping()['receiver_address'],
     'currency'       => 'BRL',
     'price'          => $native['total_amount'],
     'discount'       => 0,
     'quantity'       => $quantity,
     'freight'        => '',
     'total'          => $native['total_amount'],
 ];
