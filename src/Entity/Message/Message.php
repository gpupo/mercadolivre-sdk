<?php

declare(strict_types=1);

/*
 * This file is part of gpupo/mercadolivre-sdk created by Gilmar Pupo <contact@gpupo.com>
 * For the information of copyright and license you should read the file LICENSE which is
 * distributed with this source code. For more information, see <https://opensource.gpupo.com/>
 */

namespace Gpupo\MercadolivreSdk\Entity\Message;

use Gpupo\CommonSdk\Entity\EntityAbstract;
use Gpupo\CommonSdk\Entity\EntityInterface;

class Message extends EntityAbstract implements EntityInterface
{
    /**
     * @codeCoverageIgnore
     */
    public function getSchema(): array
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
            'attachments' => 'array',
        ];
    }

    public function toCreation(): array
    {
        return $this->partitionByArrayKey([
            'from',
            'to',
            'subject',
            'text',
            'attachments',
        ]);
    }
}
