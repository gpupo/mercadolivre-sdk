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

$skusList = [];
$extras = $foreign->get('extras');

$a = function ($key, $array) {
    if (array_key_exists($key, (array) $array)) {
        return $array[$key];
    }
};

foreach ((array) $foreign->get('skus') as $sku) {
    $f = function ($key) use ($a, $sku) {
        return $a($key, $sku);
    };
    foreach ($f('images') as $image) {
        (array) $imgList[] = $image['url'];
    }
    $skusList[] = [
            'attribute_combinations' => $extras['combinations'],
            'available_quantity'     => $f('stock'),
            'price'                  => $f('sellPrice'),
            'picture_ids'            => $imgList,
            'description'            => $f('description'),
        ];
}

$title = $foreign->get('skus')[0]['name'];

$array = [
     'title'           => $title,
     'category_id'     => $extras['category'],
     'price'           => $skusList[0]['price'],
     'currency_id'     => $extras['currency_id'],
     'buying_mode'     => $extras['buying_mode'],
     'listing_type_id' => $extras['listing_type_id'],
     'condition'       => $extras['condition'],
     'description'     => $skusList[0]['description'],
     'variations'      => [$skusList[0]],
 ];

return $array;
