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

use Gpupo\Common\Entity\CollectionAbstract;
use Gpupo\Common\Entity\CollectionInterface;

class UserCollection extends CollectionAbstract implements CollectionInterface
{
    public function __construct($data)
    {
        foreach ($data as $item) {
            if (!\is_array($item)) {
                break;
            }

            $this->add($this->factoryElement($item));
        }
    }

    public function factoryElement($data)
    {
        return new User($data);
    }
}
