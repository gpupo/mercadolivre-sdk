<?php

declare(strict_types=1);

/*
 * This file is part of gpupo/mercadolivre-sdk created by Gilmar Pupo <contact@gpupo.com>
 * For the information of copyright and license you should read the file LICENSE which is
 * distributed with this source code. For more information, see <https://opensource.gpupo.com/>
 */

namespace Gpupo\MercadolivreSdk\Entity;

use Gpupo\CommonSdk\Map;

final class GenericManager extends AbstractManager
{
    public function factorySimpleMap(array $route, array $parameters = null)
    {
        $pars = array_merge($this->fetchDefaultParameters(), (array) $parameters);
        $map = new Map($route, $pars);

        return $map;
    }

    public function getFromRoute(array $route, array $parameters = null)
    {
        $map = $this->factorySimpleMap($route, $parameters);
        $perform = $this->perform($map);

        return $perform->getData();
    }
}
