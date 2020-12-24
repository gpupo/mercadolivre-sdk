<?php

declare(strict_types=1);

/*
 * This file is part of gpupo/mercadolivre-sdk created by Gilmar Pupo <contact@gpupo.com>
 * For the information of copyright and license you should read the file LICENSE which is
 * distributed with this source code. For more information, see <https://opensource.gpupo.com/>
 */

namespace Gpupo\MercadolivreSdk\Entity;

use Gpupo\Common\Entity\ArrayCollection;
use Gpupo\CommonSdk\Entity\Metadata\MetadataContainerAbstract;
use Gpupo\CommonSdk\Traits\FinderTrait;

abstract class AbstractMetadata extends MetadataContainerAbstract
{
    use FinderTrait;

    protected function cutMetadata($raw)
    {
        if (empty($raw) || !\is_array($raw)) {
            return [[]];
        }

        unset($raw['results']);

        return $raw;
    }

    protected function normalizeMetas($metas)
    {
        foreach ($metas as $key => $value) {
            if (\is_array($value)) {
                $metas[$key] = new ArrayCollection($value);
            }
        }

        return $metas;
    }
}
