<?php

/*
 * This file is part of gpupo/netshoes-sdk
 * Created by Gilmar Pupo <contact@gpupo.com>
 * For the information of copyright and license you should read the file
 * LICENSE which is distributed with this source code.
 * Para a informação dos direitos autorais e de licença você deve ler o arquivo
 * LICENSE que é distribuído com este código-fonte.
 * Para obtener la información de los derechos de autor y la licencia debe leer
 * el archivo LICENSE que se distribuye con el código fuente.
 * For more information, see <https://opensource.gpupo.com/>.
 */

namespace Gpupo\MercadolivreSdk\Entity;

use Gpupo\CommonSdk\Entity\Metadata\MetadataContainerAbstract;
use Gpupo\CommonSdk\Traits\FinderTrait;

abstract class AbstractMetadata extends MetadataContainerAbstract
{
    use FinderTrait;

    protected function cutMetadata($raw)
    {
        if (empty($raw) || !is_array($raw)) {
            return [[]];
        }

        if (array_key_exists('_links', $raw)) {
            foreach ($raw['_links'] as $k => $v) {
                $raw['links'][] = [
                    'rel'  => $k,
                    'href' => current($v),
                ];
            }
        }

        return  $this->dataPiece('links', $raw);
    }

    protected function normalizeMetas($metas)
    {
        $data = [];
        $rm = [
            'http://sandbox-catalogo-vs.netshoes.local/mp-catalogo-api/rs',
            'http://api-sandbox.netshoes.com.br/api',
        ];

        if (is_array($metas)) {
            foreach ($metas as $meta) {
                if (array_key_exists('rel', $meta)) {
                    $data[$meta['rel']] = str_replace($rm, '', $meta['href']);
                }
            }
        }

        return $data;
    }
}
