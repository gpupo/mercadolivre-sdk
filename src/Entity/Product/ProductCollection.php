<?php

declare(strict_types=1);

/*
 * This file is part of gpupo/mercadolivre-sdk created by Gilmar Pupo <contact@gpupo.com>
 * For the information of copyright and license you should read the file LICENSE which is
 * distributed with this source code. For more information, see <https://opensource.gpupo.com/>
 */

namespace Gpupo\MercadolivreSdk\Entity\Product;

use Gpupo\Common\Entity\CollectionAbstract;
use Gpupo\Common\Entity\CollectionInterface;

final class ProductCollection extends CollectionAbstract implements CollectionInterface
{
    /**
     * @codeCoverageIgnore
     */
    protected function getKey()
    {
        return 'results';
    }

    protected function factoryEntity($id)
    {
        return new Product(['id' => $id]);
    }
}
