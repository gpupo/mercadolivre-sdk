<?php

/*
 * This file is part of gpupo/mercadolivre-sdk
 * Created by Gilmar Pupo <g@g1mr.com>
 * For the information of copyright and license you should read the file
 * LICENSE which is distributed with this source code.
 * Para a informação dos direitos autorais e de licença você deve ler o arquivo
 * LICENSE que é distribuído com este código-fonte.
 * Para obtener la información de los derechos de autor y la licencia debe leer
 * el archivo LICENSE que se distribuye con el código fuente.
 * For more information, see <http://www.g1mr.com/>.
 */

namespace Gpupo\MercadolivreSdk\Entity;

use Gpupo\CommonSdk\Entity\EntityInterface;
use Gpupo\CommonSdk\Entity\ManagerAbstract;
use Gpupo\CommonSdk\Entity\ManagerInterface;

abstract class AbstractManager extends ManagerAbstract implements ManagerInterface
{
    protected function fetchDefaultParameters()
    {
        return [
        ];
    }

    public function factoryMap($operation, array $parameters = null)
    {
        return parent::factoryMap($operation, array_merge($this->fetchDefaultParameters(), (array) $parameters));
    }

    /**
     * @codeCoverageIgnore
     *
     * @return Gpupo\Common\Entity\CollectionAbstract|null|false
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

    public function save(EntityInterface $entity, $route = 'save')
    {
        return $this->execute($this->factoryMap($route), $entity->toJson($route));
    }

    /**
     * @return Gpupo\Common\Entity\CollectionAbstract|false
     */
    public function findById($itemId)
    {
        $data = parent::findById($itemId);

        if (empty($data)) {
            return false;
        }

        return $this->factoryEntity($data->last());
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
            'entity'   => $entity,
            'existent' => $existent,
        ]);
    }
}
