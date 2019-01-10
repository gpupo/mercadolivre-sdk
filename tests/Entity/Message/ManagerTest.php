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

namespace  Gpupo\MercadolivreSdk\Tests\Entity\Message;

use Gpupo\MercadolivreSdk\Client\Client;
use Gpupo\MercadolivreSdk\Entity\Message\From;
use Gpupo\MercadolivreSdk\Entity\Message\Manager;
use Gpupo\MercadolivreSdk\Entity\Message\Message;
use Gpupo\MercadolivreSdk\Entity\Message\MessageCollection;
use Gpupo\MercadolivreSdk\Entity\Message\Text;
use Gpupo\MercadolivreSdk\Entity\Message\To;
use Gpupo\MercadolivreSdk\Entity\Message\User;
use Gpupo\MercadolivreSdk\Entity\Message\UserCollection;
use Gpupo\MercadolivreSdk\Tests\TestCaseAbstract;

/**
 * @coversDefaultClass \Gpupo\MercadolivreSdk\Entity\Message\Manager
 */
class ManagerTest extends TestCaseAbstract
{
    /**
     * @testdox Administra operações
     */
    public function testManager()
    {
        $manager = $this->getManager('list.json');

        $this->assertInstanceOf(Manager::class, $manager);

        return $manager;
    }

    public function testCreateMessage()
    {
        $sdk = $this->getFactory();
        $message = $sdk->createMessage([
            'subject' => 'Foobar',
            'text'  => ['plain' => 'Hello World'],
        ]);

        $manager = $this->getManager('creationResponse.json');
        $response = $manager->create($message);
        $this->assertsame(200, $response->getHttpStatusCode());
    }

    /**
     * @depends testManager
     * @covers ::getClient
     *
     * @param mixed $manager
     */
    public function testPossuiObjetoClient($manager)
    {
        $this->assertInstanceOf(Client::class, $manager->getClient());
    }

    /**
     * @testdox Get messages based on order number
     * @covers ::findByOrderId
     * @covers ::execute
     */
    public function testFindByOrderId()
    {
        $manager = $this->getManager('list.json');
        $order = $this->getFactory()->createOrder(['id' => 1068825849]);
        $messages = $manager->findByOrderId($order);
        $message = $messages->first();
        $this->assertInstanceOf(MessageCollection::class, $messages);
        $this->assertInstanceOf(Message::class, $message);
        $this->assertInstanceOf(From::class, $message->getFrom());
        $this->assertInstanceOf(User::class, $message->getFrom());
        $this->assertInstanceOf(To::class, $message->getTo());
        $this->assertInstanceOf(UserCollection::class, $message->getTo());
        $this->assertInstanceOf(User::class, $message->getTo()->first());
        $this->assertInstanceOf(Text::class, $message->getText());
        $this->commonAssertsMessage($messages);
    }

    public function commonAssertsMessage(MessageCollection $messages)
    {
        $this->assertSame('43b450d6bd3f47fb94394041b26c519f', $messages->first()->getMessageId());
        $this->assertSame((int) '76601286', (int) $messages->first()->getFrom()->getUserId());
        $this->assertSame((int) '106459677', (int) $messages->first()->getTo()->first()->getUserId());
    }

    protected function getManager($filename = 'item.json')
    {
        $manager = $this->getFactory()->factoryManager('message');
        $manager->setDryRun($this->factoryResponseFromFixture('mockup/Message/'.$filename));

        return $manager;
    }
}
