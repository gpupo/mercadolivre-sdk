<?php

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

    private function loadMap($name)
    {
        $file = __DIR__.'/map/translate.'.$name.'.map.php';
        $method = 'get'.ucfirst($name);

        return $this->loadArrayFromFile($file, [$name => $this->$method()]);
    }

    /**
     * {@inheritdoc}
     */
    public function translateTo()
    {
        if (!$this->getNative() instanceof Order) {
            throw new TranslatorException('Order missed!');
        }

        return $this->factoryOutputCollection($this->loadMap('native'));
    }

    /**
     * {@inheritdoc}
     */
    public function translateFrom()
    {
        if (!$this->getForeign() instanceof TranslatorDataCollection) {
            throw new TranslatorException('Foreign missed!');
        }

        return new Order($this->loadMap('foreign'));
    }
}
