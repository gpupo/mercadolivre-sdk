<?php

namespace Gpupo\MercadolivreSdk\Entity\Product;

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
        $pars = [$name => $this->$method()];

        return $this->loadArrayFromFile($file, $pars);
    }

    /**
     * {@inheritdoc}
     */
    public function translateTo()
    {
        if (!$this->getNative() instanceof Product) {
            throw new TranslatorException('Product missed!');
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
        $map = $this->loadMap('foreign');

        return new Product($map);
    }
}
