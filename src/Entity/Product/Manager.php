<?php

declare(strict_types=1);

/*
 * This file is part of gpupo/mercadolivre-sdk created by Gilmar Pupo <contact@gpupo.com>
 * For the information of copyright and license you should read the file LICENSE which is
 * distributed with this source code. For more information, see <https://opensource.gpupo.com/>
 */

namespace Gpupo\MercadolivreSdk\Entity\Product;

use Gpupo\Common\Entity\CollectionInterface;
use Gpupo\CommonSchema\TranslatorDataCollection;
use Gpupo\CommonSdk\Entity\EntityInterface;
use Gpupo\CommonSdk\Traits\TranslatorManagerTrait;
use Gpupo\MercadolivreSdk\Entity\AbstractManager;
use Gpupo\MercadolivreSdk\Entity\Product\Exceptions\AdFreezedByDealException;
use Gpupo\MercadolivreSdk\Entity\Product\Exceptions\AdHasVariationException;
use Gpupo\MercadolivreSdk\Entity\Product\Exceptions\AdInvalidFieldUpdateException;
use Gpupo\MercadolivreSdk\Entity\Product\Exceptions\AdWithoutVariationException;

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
        'save' => ['POST', '/items?'],
        'findById' => ['GET', '/items/{itemId}/'],
        'getDescription' => ['GET', '/items/{itemId}/description?'],
        'setDescription' => ['POST', '/items/{itemId}/description?'],
        'getVariations' => ['GET', '/items/{itemId}?attributes=variations'],
        //'patch'      => ['PATCH', '/products/{itemId}'],
        'update' => ['PUT', '/items/{itemId}?'],
        'updateVariation' => ['PUT', 'items/{itemId}/variations/{variationId}?'],
        'updateDescription' => ['PUT', '/items/{itemId}/description?'],
        'fetch' => ['GET', '/users/{user_id}/items/search?&offset={offset}&limit={limit}'],
        //'statusById' => ['GET', '/skus/{itemId}/bus/{buId}/status'],
        'getCategoryAttributes' => ['GET', '/categories/{categoryId}/attributes'],
        'getInfractions' => ['GET', '/moderations/infractions/{user_id}?&offset={offset}&limit={limit}'],
        'getItemInfractions' => ['GET', '/moderations/infractions/{user_id}?&element_id={itemId}'],
        'getVisits' => ['GET', '/items/visits/time_window?ids={ids}&last={last}&unit=day&ending={ending}'],
    ];

    public function findById($itemId): ?CollectionInterface
    {
        $item = parent::findById($itemId);

        if (empty($item) || 404 === $item->get('status')) {
            return null;
        }

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

    public function setDescription(string $itemId, string $text)
    {
        return $this->execute($this->factoryMap('setDescription', ['itemId' => $itemId]), json_encode(['plain_text' => $text]));
    }

    public function save(EntityInterface $entity, $route = 'save')
    {
        $clone = clone $entity;
        unset($clone['description']);

        return parent::save($clone, $route);
    }

    public function update(EntityInterface $entity, EntityInterface $existent = null, $params = null, $hasVariation = false)
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

        $canUpdateDescription = ['not_yet_active', 'active', 'paused', 'payment_required'];
        if ($entity['available_quantity'] > 0 && isset($entity['description']) && in_array(strtolower($item['status']), $canUpdateDescription)) {
            $this->execute($this->factoryMap('updateDescription', $params), json_encode($entity['description']));
        }

        if ($entity['available_quantity'] > 0) {
            $update['available_quantity'] = $entity['available_quantity'];
            if ('paused' === $item['status']) {
                $update['status'] = 'active';
            }
        } else {
            $update = ['status' => 'paused'];
        }

        if ($hasVariation) {
            unset($update['price'], $update['available_quantity'], $update['attributes']);
            $update['variations'] = [
                [
                    'id' => $params['variationId'],
                    'picture_ids' => array_map(fn($img) => $img['source'], $entity['pictures']),
                ],
            ];
        }

        try {
            return $this->execute($this->factoryMap('update', $params), json_encode($update));
        } catch (\Exception $e) {
            if ($hasVariation) {
                throw $e;
            }

            if ($this->hasVariation($params['itemId'])) {
                throw new AdHasVariationException(sprintf('Ad %s has variation', $params['itemId']));
            }

            $previousException = $e->getPrevious();
            while (null !== $previousException) {
                if (false !== mb_strpos($previousException->getMessage(), 'item.price.freezed_by_deal')) {
                    unset($update['price']);

                    try {
                        $this->execute($this->factoryMap('update', $params), json_encode($update));
                    } catch (\Throwable $e) {
                    }

                    throw new AdFreezedByDealException($previousException->getMessage());
                }

                $prevExcMessage = $previousException->getMessage();
                if (false !== mb_strpos($prevExcMessage, 'code:field_not_updatable')) {
                    $field = preg_replace('/.*references\:\[item\.([a-zA-Z_-]).*/', '${1}', $prevExcMessage);
                    if (isset($update[$field])) {
                        unset($update[$field]);

                        try {
                            $this->execute($this->factoryMap('update', $params), json_encode($update));
                        } catch (\Throwable $e) {
                        }
                    }

                    throw new AdInvalidFieldUpdateException($field, 400, $previousException);
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

    public function close(string $itemId)
    {
        $body = json_encode(['status' => 'closed']);

        return $this->execute($this->factoryMap('update', ['itemId' => $itemId]), $body);
    }

    public function delete(string $itemId)
    {
        $body = json_encode(['deleted' => 'true']);

        return $this->execute($this->factoryMap('update', ['itemId' => $itemId]), $body);
    }

    public function pause(string $itemId)
    {
        $body = json_encode(['status' => 'paused']);

        return $this->execute($this->factoryMap('update', ['itemId' => $itemId]), $body);
    }

    public function getInfractions($offset = 0, $limit = 20)
    {
        $user_id = $this->getClient()->getOptions()->get('user_id');

        $response = $this->execute($this->factoryMap('getInfractions', [
            'user_id' => $user_id,
            'offset' => $offset,
            'limit' => $limit,
        ]));

        return $this->processResponse($response);
    }

    public function getItemInfractions(string $itemId)
    {
        $user_id = $this->getClient()->getOptions()->get('user_id');
        
        $response = $this->execute($this->factoryMap('getItemInfractions', [
            'user_id' => $user_id,
            'itemId' => $itemId, 
        ]));

        return $this->processResponse($response);
    }

    public function getVisits(array $mlIds, int $windowSize, \DateTime $ending)
    {        
        $ids = implode(',', $mlIds);
        $date = $ending->format('Y-m-d');

        $response = $this->execute($this->factoryMap('getVisits', [
            'ids' => $ids,
            'last' => $windowSize,
            'ending' => $date, 
        ]));

        return $this->processResponse($response);
    }
}
