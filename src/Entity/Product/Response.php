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

use Gpupo\CommonSdk\Entity\EntityAbstract;
use Gpupo\CommonSdk\Entity\EntityInterface;

final class Response extends EntityAbstract implements EntityInterface
{
    /**
     * @codeCoverageIgnore
     */
    public function getSchema()
    {
        return [
            'id'              => 'string',
            'title'           => 'string',
            'category_id'     => 'string',
            'price'           => 'number',
            'currency_id'     => 'string',
            'buying_mode'     => 'string',
            'listing_type_id' => 'string',
            'condition'       => 'string',
            'description'     => 'string',
            'variations'      => 'collection',
            'pictures'        => 'collection',
            'status'          => 'string',
        ];
    }
}
