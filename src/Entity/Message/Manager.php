<?php

declare(strict_types=1);

/*
 * This file is part of gpupo/mercadolivre-sdk created by Gilmar Pupo <contact@gpupo.com>
 * For the information of copyright and license you should read the file LICENSE which is
 * distributed with this source code. For more information, see <https://opensource.gpupo.com/>
 */

namespace Gpupo\MercadolivreSdk\Entity\Message;

use Gpupo\CommonSdk\Traits\LoadTrait;
use Gpupo\CommonSdk\Traits\TranslatorManagerTrait;
use Gpupo\MercadolivreSdk\Entity\AbstractManager;
use Gpupo\MercadolivreSdk\Entity\Order\Order;

final class Manager extends AbstractManager
{
    use LoadTrait;
    use TranslatorManagerTrait;

    protected $entity = 'Message';

    /**
     * @codeCoverageIgnore
     */
    protected function setUp()
    {
        $this->maps = $this->loadArrayFromFile(__DIR__.'/map/restful.map.php');
    }

    public function findByOrderId(Order $order): MessageCollection
    {
        $messages = new MessageCollection();
        $offset = 0;

        do {
            $results = $this->fetchMessages($order->getId(), $offset);

            foreach ($results['results'] as $raw) {
                $message = new Message($raw);
                $messages->add($message);
            }

            $offset = $messages->count();
        } while ($messages->count() !== $results['paging']['total']);

        return $messages;
    }

    public function create(Message $message): ?Message
    {
        $data = $message->toCreation();
        $response = $this->execute($this->factoryMap('create'), json_encode($data));

        if ($this->isHttpStatusCodeOK($response->getHttpStatusCode())) {
            return new Message($response->getData()->first());
        }

        throw new \Exception(sprintf('Error #%d on creation', $response->getHttpStatusCode()));
    }

    protected function fetchMessages($itemId, $offset = 0, $limit = 50)
    {
        $responseJson = $this->perform($this->factoryMap('findByOrderId', [
            'itemId' => $itemId,
            'offset' => $offset,
            'limit' => $limit,
        ]));

        $results = $this->processResponse($responseJson);

        return $results;
    }
}
