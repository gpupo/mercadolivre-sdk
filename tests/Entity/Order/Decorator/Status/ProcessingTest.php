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

namespace Gpupo\Tests\MercadolivreSdk\Entity\Order\Decorator\Status;

use Gpupo\MercadolivreSdk\Entity\Order\Decorator\Status\Processing;
use Gpupo\Tests\MercadolivreSdk\Entity\Order\Decorator\AbstractDecoratorTestCase;

/**
 * @coversDefaultClass \Gpupo\MercadolivreSdk\Entity\Order\Decorator\Status\Processing
 */
class ProcessingTest extends AbstractDecoratorTestCase
{
    protected $target = 'Processing';

    protected function factory($data = [])
    {
        return new Processing($data);
    }
}
