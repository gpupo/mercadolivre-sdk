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
        //'findById'   => ['GET', '/products/{itemId}'],
        //'patch'      => ['PATCH', '/products/{itemId}'],
        //'update'     => ['PUT', '/products/{itemId}'],
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

    public function factoryTranslator(array $data = [])
    {
        $translator = new Translator($data);

        return $translator;
    }
}
