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
use Gpupo\MercadolivreSdk\Entity\Product\Exceptions\AdHasVariationException;
use Gpupo\MercadolivreSdk\Entity\Product\Exceptions\AdWithoutVariationException;
use Gpupo\MercadolivreSdk\Entity\Product\Exceptions\AdFreezedByDealException;

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
        'getVariations' => ['GET', '/items/{itemId}?attributes=variations'],
        //'patch'      => ['PATCH', '/products/{itemId}'],
        'update' => ['PUT', '/items/{itemId}?access_token={access_token}'],
        'updateVariation' => ['PUT', 'items/{itemId}/variations/{variationId}?access_token={access_token}'],
        'updateDescription' => ['PUT', '/items/{itemId}/description?access_token={access_token}'],
        'fetch' => ['GET', '/users/{user_id}/items/search?access_token={access_token}&offset={offset}&limit={limit}'],
        //'statusById' => ['GET', '/skus/{itemId}/bus/{buId}/status'],
        'getCategoryAttributes' => ['GET', '/categories/{categoryId}/attributes'],
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

        $native = $this->factoryTranslatorByForeign($data)->import();

        return $this->save($native);
    }

    public function translatorUpdate(TranslatorDataCollection $data, $idExterno)
    {
        $native = $this->factoryTranslatorByForeign($data)->import();

        return $this->update($native, null, ['itemId' => $idExterno]);
    }

    public function factoryTranslator(array $data = [])
    {
        $translator = new Translator($data);

        return $translator;
    }

    public function update(EntityInterface $entity, EntityInterface $existent = null, $params = null, $isVariation = false)
    {
        $toFind = null;

        if (\is_array($params)) {
            $toFind = $params['itemId'];
        }

        $item = $this->findById($toFind);

        $update = [];
        $update['price'] = $entity['price'];

        foreach (['shipping', 'title', 'pictures', 'attributes'] as $field) {
            if (isset($entity[$field])) {
                $update[$field] = $entity[$field];

                if ('attributes' === $field) {
                    $update[$field] = $this->updateFilterAttributes($entity[$field], $item['category_id']);
                }
            }
        }

        if (isset($entity['description'])) {
            $this->execute($this->factoryMap('updateDescription', $params), json_encode($entity['description']));
        }

        $stock = $entity['available_quantity'];
        if ($stock > 0) {
            $update['available_quantity'] = $stock;
            if ('paused' === $item['status']) {
                $update['status'] = 'active';
            }
        } else {
            $update = ['status' => 'paused'];
        }

        if ($isVariation) {
            unset($update['price'], $update['available_quantity'], $update['pictures'], $update['attributes']);
        }

        try {
            return $this->execute($this->factoryMap('update', $params), json_encode($update));
        } catch (\Exception $e) {
            if ($isVariation) {
                throw $e;
            }

            if ($this->hasVariation($params['itemId'])) {
                throw new AdHasVariationException(sprintf('Ad %s has variation', $params['itemId']));
            }

            $previousException = $e->getPrevious();
            while (null !== $previousException) {
                if (false !== strpos($previousException->getMessage(), 'item.price.freezed_by_deal')) {
                    throw new AdFreezedByDealException($previousException->getMessage());
                }

                $previousException = $previousException->getPrevious();
            }

            throw $e;
        }
    }

    public function updateVariation(EntityInterface $entity, EntityInterface $existent = null, $params = null)
    {
        $variations = $this->getAdVariations($params['itemId']);
        $variations = $variations->get('variations');

        if (empty($variations)) {
            throw new AdWithoutVariationException('The ad has no variations');
        }
        if (\count($variations) > 1) {
            throw new \Exception('Multiple variations not supported');
        }

        $variation = [];
        $variation['price'] = $entity['price'];
        if (isset(current($variations)['pictures_ids'])) {
            $variation['pictures'] = current($variations)['pictures_ids'];
        }

        if ($entity['available_quantity'] > 0) {
            $variation['available_quantity'] = $entity['available_quantity'];
        }

        $params['variationId'] = current($variations)['id'];

        $this->execute($this->factoryMap('updateVariation', $params), json_encode($variation));

        return $this->update($entity, $existent, $params, true);
    }

    public function hasVariation($itemId): bool
    {
        try {
            $response = $this->getAdVariations($itemId);

            return !empty($response->get('variations'));
        } catch (\Exception | \Error $e) {
            return false;
        }
    }

    protected function updateFilterAttributes($updateAttributes, $categoryId)
    {
        $categoryAttributes = $this->getCategoryAttributes($categoryId);

        $ignoreAttributes = ['BRAND', 'ORIGIN'];
        foreach ($categoryAttributes as $categoryAttribute) {
            if (isset($categoryAttribute['tags']['read_only'])) {
                $ignoreAttributes[] = $categoryAttribute['id'];
            }
        }

        foreach ($updateAttributes as $key => $attribute) {
            if (\in_array($attribute['id'], $ignoreAttributes, true)) {
                unset($updateAttributes[$key]);
            }
        }

        sort($updateAttributes);

        return $updateAttributes;
    }

    protected function getAdVariations($itemId)
    {
        $response = $this->perform($this->factoryMap('getVariations', ['itemId' => $itemId]));

        return $this->processResponse($response);
    }

    protected function getCategoryAttributes($categoryId)
    {
        $response = $this->perform($this->factoryMap('getCategoryAttributes', ['categoryId' => $categoryId]));

        return $this->processResponse($response);
    }
}
