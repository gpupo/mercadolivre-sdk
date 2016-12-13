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

 $put = function () {
     return [
         'PUT',
         '/shipments/{shipmentId}?access_token={access_token}',
     ];
 };

return [
    'save' => [
        'POST',
        '/orders',
    ],
    'fetch' => [
        'GET',
        '/orders/search/recent?seller=227595621&access_token={access_token}'
    ],
    'findById' => [
        'GET',
        '/orders/{itemId}?access_token={access_token}',
    ],
    'toTracked'   => $put(),
    'toProcessing'  => $put(),
    'toShipped'   => $put(),
    'toDelivered' => $put(),
    'toCanceled'  => $put(),
];
