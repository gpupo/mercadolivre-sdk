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

namespace Gpupo\MercadolivreSdk\Tests\Entity\Message;

use Gpupo\MercadolivreSdk\Entity\Message\Message;
use Gpupo\MercadolivreSdk\Entity\Message\From;
use Gpupo\MercadolivreSdk\Tests\TestCaseAbstract;
use Gpupo\Tests\CommonSdk\Traits\EntityTrait;

/**
 * @coversDefaultClass \Gpupo\MercadolivreSdk\Entity\Message\Message
 */
class MessageTest extends TestCaseAbstract
{
    use EntityTrait;

    public function dataProviderMessage()
    {
        $data = $this->getResourceJson('mockup/Message/item.json');

        return $this->dataProviderEntitySchema(Message::class, $data);
    }

    /**
     * @testdox Possui método ``getFrom()`` para acessar o objeto Remetente
     * @dataProvider dataProviderMessage
     * @cover ::get
     * @cover ::getSchema
     * @small
     *
     * @param null|mixed $expected
     */
    public function testGetFrom(Message $message, $expected = null)
    {
        $this->assertInstanceOf(From::class, $message->getFrom());
    }
}
