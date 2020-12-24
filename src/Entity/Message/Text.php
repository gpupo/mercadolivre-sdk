<?php

declare(strict_types=1);

/*
 * This file is part of gpupo/mercadolivre-sdk created by Gilmar Pupo <contact@gpupo.com>
 * For the information of copyright and license you should read the file LICENSE which is
 * distributed with this source code. For more information, see <https://opensource.gpupo.com/>
 */

namespace Gpupo\MercadolivreSdk\Entity\Message;

use Gpupo\CommonSdk\Entity\EntityAbstract;
use Gpupo\CommonSdk\Entity\EntityInterface;

class Text extends EntityAbstract implements EntityInterface
{
    protected function setUp()
    {
        $this->setRequiredSchema(['plain']);
    }

    /**
     * @codeCoverageIgnore
     */
    public function getSchema(): array
    {
        return [
            'plain' => 'string',
        ];
    }
}
