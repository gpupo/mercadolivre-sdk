<?php

declare(strict_types=1);

/*
 * This file is part of gpupo/mercadolivre-sdk created by Gilmar Pupo <contact@gpupo.com>
 * For the information of copyright and license you should read the file LICENSE which is
 * distributed with this source code. For more information, see <https://opensource.gpupo.com/>
 */

namespace Gpupo\MercadolivreSdk\Entity\Message;

use Gpupo\Common\Entity\CollectionInterface;
use Gpupo\CommonSdk\Entity\CollectionAbstract;

class UserCollection extends CollectionAbstract implements CollectionInterface
{
    public function factoryElement($data)
    {
        return new User($data);
    }
}
