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

namespace Gpupo\MercadolivreSdk\Entity\Product;

use Gpupo\CommonSchema\TranslatorDataCollection;
use Gpupo\CommonSdk\Traits\TranslatorManagerTrait;
use Gpupo\MercadolivreSdk\Entity\AbstractManager;
use Gpupo\MercadolivreSdk\Entity\Product\Pictures;
use Gpupo\MercadolivreSdk\Entity\Product\Variation\Item;
use Gpupo\CommonSdk\Entity\EntityInterface;

final class Manager extends AbstractManager
{
    use TranslatorManagerTrait;

    protected $entity = 'Response';

    protected $strategy = [
        'info' => false,
    ];

    /**
     * @codeCoverageIgnore
     */
    protected $maps = [
        'save'          => ['POST', '/items?access_token={access_token}'],
        'saveVariation' => ['POST', '/items/{itemId}/variations?access_token={access_token}'],
        'findById'      => ['GET', '/items/{itemId}/'],
        //'patch'      => ['PATCH', '/products/{itemId}'],
        'update'        => ['PUT', '/items/{itemId}?access_token={access_token}'],
        //'fetch'      => ['GET', '/products?page={offset}&size={limit}'],
        //'statusById' => ['GET', '/skus/{itemId}/bus/{buId}/status'],
    ];

    public function translatorInsertProduct(TranslatorDataCollection $data, $mlCategory, array $combinations = [])
    {
        $data->set('extras', [
            'category'        => $mlCategory,
            'combinations'    => $combinations,
            'currency_id'     => 'BRL',
            'buying_mode'     => 'buy_it_now',
            'listing_type_id' => 'bronze',
            'condition'       => 'new',
        ]);

        $native = $this->factoryTranslatorByForeign($data)->translateFrom();

        return $this->save($native);
    }

    public function translatorInsertVariation(TranslatorDataCollection $data, $idExterno, array $combinations = [])
    {
        // faz get
        $product = $this->findById($idExterno);

        $imageList = $newImages = [];
        foreach ($product['pictures'] as $picture) {
            $imageList[] = ['id' => $picture['id']];
        }

        foreach ($data['skus'][0]['images'] as $images) {
            $imageList[] = ['source' => $images['url']];
            $newImages[] = $images['url'];
        }

        // envia fotos pro produto
        $entity = new Pictures(['pictures' => $imageList]);
        $result = $this->update($entity, null, ['itemId' => $idExterno]);

        // manda nova variation com ids das fotos
        $variation = [
            'attribute_combinations' => $combinations,
            'picture_ids'            => $newImages,
            'price'                  => $data['skus'][0]['sellPrice'],
            'available_quantity'     => $data['skus'][0]['stock'],
        ];

        return $this->saveVariation(new Item($variation), ['itemId' => $idExterno]);
    }

    public function factoryTranslator(array $data = [])
    {
        $translator = new Translator($data);

        return $translator;
    }

    public function saveVariation(EntityInterface $entity, $params = null)
    {
        return $this->execute($this->factoryMap('saveVariation', $params), json_encode($entity->toArray()));
    }

    public function update(EntityInterface $entity, EntityInterface $existent = null, $params = null)
    {
        return $this->execute($this->factoryMap('update', $params), json_encode($entity->toArray()));
    }
}
