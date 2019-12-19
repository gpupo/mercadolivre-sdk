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

namespace  Gpupo\MercadolivreSdk\Tests;

use Gpupo\CommonSdk\Tests\TestCaseAbstract as CommonSdkTestCaseAbstract;
use Gpupo\MercadolivreSdk\Entity\Order\Order;
use Gpupo\MercadolivreSdk\Entity\Product\Product;
use Gpupo\MercadolivreSdk\Factory;

abstract class TestCaseAbstract extends CommonSdkTestCaseAbstract
{
    private $factory;

    public static function getResourcesPath()
    {
        return \dirname(__DIR__).'/Resources/';
    }

    public function factoryClient()
    {
        return $this->getFactory()->getClient();
    }

    public function providerProducts()
    {
        $manager = $this->getFactory()->factoryManager('product');
        $manager->setDryRun($this->factoryResponseFromFixture('mockup/Product/list.json'));

        return $manager->fetch();
    }

    public function dataProviderProducts()
    {
        $list = [];

        foreach ($this->providerProducts() as $product) {
            if (!is_a($product, Product::class)) {
                throw new \InvalidArgumentException(sprintf('$product must be a mercadolivre-sdk entity! [%s] received', \get_class($product)));
            }
            $list[] = [$product];
        }

        return $list;
    }

    public function providerOrders()
    {
        $manager = $this->getFactory()->factoryManager('order');
        $manager->setDryRun($this->factoryResponseFromFixture('mockup/Order/list.json'));

        return $manager->fetch();
    }

    public function dataProviderOrders()
    {
        $list = [];

        foreach ($this->providerOrders() as $order) {
            if (!is_a($order, Order::class)) {
                throw new \InvalidArgumentException(sprintf('$product must be a mercadolivre-sdk entity! [%s] received', \get_class($order)));
            }
            $list[] = [$order];
        }

        return $list;
    }

    protected function getOptions()
    {
        return [
            'app_id' => $this->getConstant('APP_ID'),
            'secret_key' => $this->getConstant('SECRET_KEY'),
            'access_token' => $this->getConstant('ACCESS_TOKEN'),
            'verbose' => $this->getConstant('VERBOSE'),
            'dryrun' => $this->getConstant('DRYRUN'),
            'registerPath' => $this->getConstant('REGISTER_PATH'),
        ];
    }

    protected function getFactory()
    {
        if (!$this->factory) {
            $this->factory = Factory::getInstance()->setup($this->getOptions(), $this->getLogger());
        }

        return $this->factory;
    }

    /**
     * Requer Implementação mas não será abstrato para não impedir testes que não o usam.
     *
     * @param null|mixed $filename
     */
    protected function getManager($filename = null)
    {
        unset($filename);
    }

    protected function hasToken()
    {
        return $this->hasConstant('SECRET_KEY');
    }
}
