<?php

declare(strict_types=1);

/*
 * This file is part of gpupo/mercadolivre-sdk created by Gilmar Pupo <contact@gpupo.com>
 * For the information of copyright and license you should read the file LICENSE which is
 * distributed with this source code. For more information, see <https://opensource.gpupo.com/>
 */

$extras = $foreign->get('extras');
$sku = $foreign->get('skus')[0];

$imgList = [];
foreach ($sku['images'] as $image) {
    $imgList[] = ['source' => $image['url']];
}

$array = [
    'title' => mb_substr($sku['name'], 0, 60),
    'available_quantity' => $sku['stock'],
    'price' => $sku['sellPrice'],
    'description' => $sku['description'],
    'pictures' => $imgList,
    'category_id' => $extras['category'],
    'currency_id' => $extras['currency_id'],
    'buying_mode' => $extras['buying_mode'],
    'listing_type_id' => $extras['listing_type_id'],
    'condition' => $extras['condition'],
    'shipping' => $extras['shipping'],
    'official_store_id' => $extras['official_store_id'],
];

return $array;
