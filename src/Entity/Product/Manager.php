<?php

namespace Gpupo\MercadolivreSdk\Entity\Product;

use Gpupo\CommonSdk\Traits\TranslatorManagerTrait;
use Gpupo\MercadolivreSdk\Entity\AbstractManager;
use Gpupo\CommonSchema\TranslatorDataCollection;
use Gpupo\MercadolivreSdk\Factory;

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
        'save'       => ['POST', '/items?access_token={access_token}'],
        //'findById'   => ['GET', '/products/{itemId}'],
        //'patch'      => ['PATCH', '/products/{itemId}'],
        //'update'     => ['PUT', '/products/{itemId}'],
        //'fetch'      => ['GET', '/products?page={offset}&size={limit}'],
        //'statusById' => ['GET', '/skus/{itemId}/bus/{buId}/status'],
    ];

    public function translatorInsertProduct(TranslatorDataCollection $data, $mlCategory, array $combinations = [])
    {
        $data->set('extras', [
            'category' => $mlCategory,
            'combinations' => $combinations,
            'currency_id' => 'BRL',
            'buying_mode' => 'buy_it_now',
            'listing_type_id' => 'bronze',
            'condition' => 'new',
        ]);

        $native = $this->factoryTranslatorByForeign($data)->translateFrom();

        return $this->save($native);
    }

    public function factoryTranslator(array $data = [])
    {
        $translator = new Translator($data);

        return $translator;
    }


}
