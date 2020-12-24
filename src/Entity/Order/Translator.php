<?php

declare(strict_types=1);

/*
 * This file is part of gpupo/mercadolivre-sdk created by Gilmar Pupo <contact@gpupo.com>
 * For the information of copyright and license you should read the file LICENSE which is
 * distributed with this source code. For more information, see <https://opensource.gpupo.com/>
 */

namespace Gpupo\MercadolivreSdk\Entity\Order;

use Gpupo\CommonSchema\AbstractTranslator;
use Gpupo\CommonSchema\TranslatorDataCollection;
use Gpupo\CommonSchema\TranslatorException;
use Gpupo\CommonSchema\TranslatorInterface;
use Gpupo\CommonSdk\Traits\LoadTrait;

final class Translator extends AbstractTranslator implements TranslatorInterface
{
    use LoadTrait;

    /**
     * {@inheritdoc}
     */
    public function export(): TranslatorDataCollection
    {
        if (!$this->getNative() instanceof Order) {
            throw new TranslatorException('Order missed!');
        }

        return $this->factoryOutputCollection($this->loadMap('native'));
    }

    /**
     * {@inheritdoc}
     */
    public function import(): Order
    {
        if (!$this->getForeign() instanceof TranslatorDataCollection) {
            throw new TranslatorException('Foreign missed!');
        }

        return new Order($this->loadMap('foreign'));
    }

    private function loadMap($name): array
    {
        $file = __DIR__.'/map/translate.'.$name.'.map.php';
        $method = 'get'.ucfirst($name);

        return $this->loadArrayFromFile($file, [$name => $this->{$method}()]);
    }
}
