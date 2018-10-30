<?php

namespace Repository;

use Doctrine\ORM\EntityRepository;
use Doctrine\ORM\UnitOfWork;

abstract class AbstractRepository extends EntityRepository
{

    public function getReference($class, $id)
    {
        return $this->getEntityManager()->getReference($class, $id);
    }

    public function save($entity)
    {
        if ($this->getEntityManager()->getUnitOfWork()->getEntityState($entity) == UnitOfWork::STATE_NEW)
        {
           $this->getEntityManager()->persist($entity);
        }
        $this->getEntityManager()->flush();
        return $entity;
    }

    public function delete($id)
    {
        $entity = $this->getReference($this->getClassName(), $id);
        $this->getEntityManager()->remove($entity);
        $this->getEntityManager()->flush();
    }

}