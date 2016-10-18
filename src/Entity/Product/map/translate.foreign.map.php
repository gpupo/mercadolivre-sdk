<?php

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
