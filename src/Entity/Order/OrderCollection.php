<?php

declare(strict_types=1);

/*
 * This file is part of gpupo/mercadolivre-sdk created by Gilmar Pupo <contact@gpupo.com>
 * For the information of copyright and license you should read the file LICENSE which is
 * distributed with this source code. For more information, see <https://opensource.gpupo.com/>
 */

namespace Gpupo\MercadolivreSdk\Entity\Order;

use Gpupo\Common\Entity\CollectionInterface;
use Gpupo\MercadolivreSdk\Entity\AbstractMetadata;

final class OrderCollection extends AbstractMetadata implements CollectionInterface
{
    /**
     * @codeCoverageIgnore
     */
    protected function getKey()
    {
        return 'results';
    }

    protected function factoryEntity(array $data)
    {
        return new Order($data);
    }
}
