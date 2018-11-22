<?php

namespace repositories;


use Entity\Encaminhamento;
use Entity\Encaminhamentos;
use Rougin\Credo\EntityRepository;

class Encaminhamento_repository extends EntityRepository implements Encaminhamentos
{

    public function getReference($id, $class = null)
    {
        if (!$class) {
            $class = $this->getClassName();
        }
        return $this->getEntityManager()->getReference($class, $id);
    }

    public function save($entity)
    {
        $this->getEntityManager()->persist($entity);
        $this->getEntityManager()->flush();
        return $entity;
    }

    public function delete($id)
    {
        $entity = $this->getReference($this->getClassName(), $id);
        $this->getEntityManager()->remove($entity);
        $this->getEntityManager()->flush();
    }

    function salvar(Encaminhamento $enc)
    {
        return $this->save($enc);
    }

}