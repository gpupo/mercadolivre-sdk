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

namespace Gpupo\MercadolivreSdk\Entity\Order\Message;

use Gpupo\Common\Entity\CollectionInterface;
use Gpupo\CommonSdk\Entity\EntityAbstract;
use Gpupo\CommonSdk\Entity\EntityInterface;

class Message extends EntityAbstract implements EntityInterface, CollectionInterface
{
    /**
     * @codeCoverageIgnore
     */
    public function getSchema()
    {
        return [
            '_id' => 'string',
            'message_id' => 'string',
            'date' => 'string',
            'date_received' => 'string',
            'date_available' => 'string',
            'date_notified' => 'string',
            'date_read' => 'string',
            'from' => 'object',
            'to' => 'object',
            'subject' => 'string',
            'text' => 'object',
            'client_id' => 'integer',
        ];
    }
}
