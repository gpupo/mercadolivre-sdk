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

namespace Gpupo\MercadolivreSdk\Console\Command;

use Gpupo\CommonSdk\Console\Command\AbstractCommand as Core;
use Symfony\Component\Console\Input\InputOption;

/**
 * @codeCoverageIgnore
 */
abstract class AbstractCommand extends Core
{
    const NAME_PREFIX = 'markethub:mercadolivre:';

    public function getProjectDataFilename(): string
    {
        return sprintf('var/data/markethub-mercadolivre-%d.yaml', $this->getFactory()->getOptions()->get('client_id'));
    }

    protected function addOptionsForList()
    {
        $this
            ->addOption(
                'offset',
                null,
                InputOption::VALUE_REQUIRED,
                'Current offset of list',
                0
            )
            ->addOption(
                'max',
                null,
                InputOption::VALUE_REQUIRED,
                'Max items quantity',
                100
            );
    }
}
