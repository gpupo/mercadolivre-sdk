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

namespace Gpupo\MercadolivreSdk\Entity\Order;

use Gpupo\CommonSdk\Entity\EntityAbstract;
use Gpupo\CommonSdk\Entity\EntityInterface;
use Gpupo\CommonSdk\Traits\LoadTrait;

final class Order extends EntityAbstract implements EntityInterface
{
    use LoadTrait;

    protected $primaryKey = 'id';

    public function getSchema(): array
    {
        return $this->loadArrayFromFile(__DIR__.'/map/schema.map.php');
    }

    public function check()
    {
        $this->setRequiredSchema(['id']);

        return $this->isValid();
    }
}
