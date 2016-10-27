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

$extras = $foreign->get('extras');
$sku = $foreign->get('skus')[0];

$imgList = [];
foreach ($sku['images'] as $image) {
    $imgList[] = ['source' => $image['url']];
}

$array = [
     'title'              => substr($sku['name'], 0, 60),
     'available_quantity' => $sku['stock'],
     'category_id'        => $extras['category'],
     'price'              => $sku['sellPrice'],
     'currency_id'        => $extras['currency_id'],
     'buying_mode'        => $extras['buying_mode'],
     'listing_type_id'    => $extras['listing_type_id'],
     'condition'          => $extras['condition'],
     'description'        => $sku['description'],
     'pictures'           => $imgList,
 ];

return $array;
