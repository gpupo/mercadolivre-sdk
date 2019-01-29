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

namespace Gpupo\MercadolivreSdk\Entity\Product;

use Gpupo\Common\Entity\CollectionInterface;
use Gpupo\CommonSchema\TranslatorDataCollection;
use Gpupo\CommonSdk\Entity\EntityInterface;
use Gpupo\CommonSdk\Traits\TranslatorManagerTrait;
use Gpupo\MercadolivreSdk\Entity\AbstractManager;

final class Manager extends AbstractManager
{
    use TranslatorManagerTrait;

    protected $entity = 'Product';

    protected $strategy = [
        'info' => false,
    ];

    /**
     * @codeCoverageIgnore
     */
    protected $maps = [
        'save' => ['POST', '/items?access_token={access_token}'],
        'findById' => ['GET', '/items/{itemId}/'],
        'getDescription' => ['GET', '/items/{itemId}/description?access_token={access_token}'],
        //'patch'      => ['PATCH', '/products/{itemId}'],
        'update' => ['PUT', '/items/{itemId}?access_token={access_token}'],
        'fetch' => ['GET', '/users/{user_id}/items/search?access_token={access_token}&offset={offset}&limit={limit}'],
        //'statusById' => ['GET', '/skus/{itemId}/bus/{buId}/status'],
    ];

    public function findById($itemId): ?CollectionInterface
    {
        $item = parent::findById($itemId);
        $description = $this->getDescription($itemId);
        $item->set('description', $description);

        return $item;
    }

    public function getDescription($itemId)
    {
        $response = $this->perform($this->factoryMap('getDescription', ['itemId' => $itemId]));

        return $this->processResponse($response);
    }

    public function translatorInsert(TranslatorDataCollection $data, $mlCategory)
    {
        $data->set('extras', [
            'category' => $mlCategory,
            'currency_id' => 'BRL',
            'buying_mode' => 'buy_it_now',
            'listing_type_id' => 'bronze',
            'condition' => 'new',
            'official_store_id' => 955,
            'shipping' => [
                'mode' => 'me1',
                'local_pick_up' => false,
                'free_shipping' => false,
                'methods' => [],
                'dimensions' => null,
                'tags' => [],
            ],
        ]);

        $native = $this->factoryTranslatorByForeign($data)->translateFrom();

        return $this->save($native);
    }

    public function translatorUpdate(TranslatorDataCollection $data, $idExterno)
    {
        $native = $this->factoryTranslatorByForeign($data)->translateFrom();

        return $this->update($native, null, ['itemId' => $idExterno]);
    }

    public function factoryTranslator(array $data = [])
    {
        $translator = new Translator($data);

        return $translator;
    }

    public function update(EntityInterface $entity, EntityInterface $existent = null, $params = null)
    {
        $item = $this->findById($params['itemId']);

        $update = [];
        $update['price'] = $entity['price'];
        $update['title'] = $entity['title'];
        $update['pictures'] = $entity['pictures'];

        $stock = $entity['available_quantity'];
        if ($stock > 0) {
            $update['available_quantity'] = $stock;
            if ('paused' === $item['status']) {
                $update['status'] = 'active';
            }
        } else {
            $update['status'] = 'paused';
        }

        return $this->execute($this->factoryMap('update', $params), json_encode($update));
    }
}
