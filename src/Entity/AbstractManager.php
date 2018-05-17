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

namespace Gpupo\MercadolivreSdk\Entity;

use Gpupo\CommonSdk\Entity\EntityInterface;
use Gpupo\CommonSdk\Entity\ManagerAbstract;
use Gpupo\CommonSdk\Entity\ManagerInterface;

abstract class AbstractManager extends ManagerAbstract implements ManagerInterface
{
    public function factoryMap($operation, array $parameters = null)
    {
        $all = array_merge($this->fetchDefaultParameters(), (array) $parameters);

        return parent::factoryMap($operation, $all);
    }

    public function save(EntityInterface $entity, $route = 'save')
    {
        return $this->execute($this->factoryMap($route), $entity->toJson($route));
    }

    /**
     * @param mixed $itemId
     *
     * @return false|Gpupo\Common\Entity\CollectionAbstract
     */
    public function findById($itemId)
    {
        $data = parent::findById($itemId);

        if (empty($data) || 404 === $data->get('status')) {
            return false;
        }

        return $this->factoryEntity($data->toArray());
    }

    /**
     * {@inheritdoc}
     *
     * @codeCoverageIgnore
     */
    public function update(EntityInterface $entity, EntityInterface $existent = null)
    {
        $text = 'Chamada a Atualização de entity '.$this->entity;

        return $this->log('debug', $text, [
            'entity' => $entity,
            'existent' => $existent,
        ]);
    }

    protected function fetchDefaultParameters()
    {
        return (array) $this->getClient()->getOptions()->toArray();
    }

    /**
     * @codeCoverageIgnore
     *
     * @param mixed $data
     *
     * @return null|false|Gpupo\Common\Entity\CollectionAbstract
     */
    protected function fetchPrepare($data)
    {
        if (empty($data)) {
            return false;
        }

        return $this->factoryEntityCollection($data);
    }

    protected function factoryEntityCollection($data)
    {
        return $this->factoryNeighborObject($this->getEntityName().'Collection', $data);
    }
}
