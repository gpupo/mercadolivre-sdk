<?php

$skusList = [];

if ($native->getSkus()) {
    foreach ($native->getSkus() as $sku) {
        $sellPrice = null;
        if ($sku->getPriceSchedule()) {
            $sellPrice = $sku->getPriceSchedule()->getPriceTo();
        }
        $skusList[] = [
            'skuId'       => $sku->getId(),
            'gtin'        => $sku->getEanIsbn(),
            'name'        => $sku->getName(),
            'description' => $sku->getDescription(),
            'color'       => $sku->getColor(),
            'size'        => $sku->getSize(),
            'gender'      => $sku->getGender(),
            'height'      => $sku->getHeight(),
            'width'       => $sku->getWidth(),
            'depth'       => $sku->getDepth(),
            'weight'      => $sku->getWeight(),
            'listPrice'   => $sku->getPrice()->getPrice(),
            'sellPrice'   => $sellPrice,
            'stock'       => $sku->getStock()->getAvailable(),
            'status'      => $sku->getStatus()->getActive(),
        ];
    }
}

return [
     'productId'   => $native->getId(),
     'productType' => $native->getProductType(),
     'department'  => $native->getDepartment(),
     'category'    => '',
     'brand'       => $native->getBrand(),
     'skus'        => $skusList,
 ];
