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

namespace Gpupo\MercadolivreSdk\Entity\Order;

use DateInterval;
use DateTime;
use Gpupo\CommonSdk\Entity\EntityInterface;
use Gpupo\CommonSdk\Response;
use Gpupo\CommonSdk\Traits\LoadTrait;
use Gpupo\CommonSdk\Traits\TranslatorManagerTrait;
use Gpupo\MercadolivreSdk\Entity\AbstractManager;

final class Manager extends AbstractManager
{
    use TranslatorManagerTrait;
    use LoadTrait;

    protected $entity = 'Order';

    /**
     * @codeCoverageIgnore
     */
    protected function setUp()
    {
        $this->maps = $this->loadArrayFromFile(__DIR__.'/map/restful.map.php');
    }
    
    /**
     * {@inheritdoc}
     */
    public function update(EntityInterface $entity, EntityInterface $existent = null)
    {

    }

    public function factoryTranslator(array $data = [])
    {
        $translator = new Translator($data);

        return $translator;
    }

    public function fetchQueue($offset = 0, $limit = 50, array $parameters = [])
    {
        return $this->translatorFetch($offset, $limit, $parameters);
    }
}
