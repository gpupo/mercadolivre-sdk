<?php

declare(strict_types=1);

/*
 * This file is part of gpupo/mercadolivre-sdk
 * Created by Gilmar Pupo <contact@gpupo.com>
 * For the information of copyright and license you should read the file
 * LICENSE which is distributed with this source code.
 * Para a informação dos direitos autorais e de licença você deve ler o arquivo
 * LICENSE que é distribuído com este código-fonte.
 * Para obtener la información de los derechos de autor y la licencia debe leer
 * el archivo LICENSE que se distribuye con el código fuente.
 * For more information, see <https://opensource.gpupo.com/>.
 *
 */

$skusList = [];
if ($native) {
    foreach ($native as $sku) {

        $sellPrice = $sku->getPrice();
        $skusList[] = [
            'skuId' => $sku->getId(),
            'gtin' => $sku->getEanIsbn(),
            'name' => $sku->getName(),
            'description' => $sku->getDescription(),
            'color' => $sku->getColor(),
            'size' => $sku->getSize(),
            'gender' => $sku->getGender(),
            'height' => $sku->getHeight(),
            'width' => $sku->getWidth(),
            'depth' => $sku->getDepth(),
            'weight' => $sku->getWeight(),
            'listPrice' => $sellPrice,
            'sellPrice' => $sellPrice,
            'stock' => $sku->getStock()->getAvailable(),
            'status' => $sku->getStatus()->getActive(),
        ];
    }
}

return [
     'productId' => $native->getId(),
     'productType' => $native->getProductType(),
     'department' => $native->getCategoryId(),
     'category' => '',
     'brand' => $native->getBrand(),
     'skus' => $skusList,
 ];
