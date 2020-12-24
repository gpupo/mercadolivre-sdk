<?php

declare(strict_types=1);

/*
 * This file is part of gpupo/mercadolivre-sdk created by Gilmar Pupo <contact@gpupo.com>
 * For the information of copyright and license you should read the file LICENSE which is
 * distributed with this source code. For more information, see <https://opensource.gpupo.com/>
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
