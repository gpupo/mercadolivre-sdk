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

namespace Gpupo\MercadolivreSdk\Entity\Message;

use Gpupo\CommonSdk\Entity\EntityInterface;
use Gpupo\CommonSdk\Response;
use Gpupo\CommonSdk\Traits\LoadTrait;
use Gpupo\CommonSdk\Traits\TranslatorManagerTrait;
use Gpupo\MercadolivreSdk\Entity\AbstractManager;
use Gpupo\MercadolivreSdk\Entity\Message\Message;
use Gpupo\MercadolivreSdk\Entity\Message\MessageCollection;

final class Manager extends AbstractManager
{
    use TranslatorManagerTrait;
    use LoadTrait;

    protected $entity = 'Message';

    /**
     * @codeCoverageIgnore
     */
    protected function setUp()
    {
        $this->maps = $this->loadArrayFromFile(__DIR__.'/map/restful.map.php');
    }

    public function findByOrderId(Order $order)
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
