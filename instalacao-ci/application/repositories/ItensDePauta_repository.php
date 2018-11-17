<?php

namespace repositories;


use Entity\ItemDePauta;
use Entity\ItensDePauta;
use Rougin\Credo\EntityRepository;

class ItensDePauta_repository extends EntityRepository implements ItensDePauta
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

    function salvar(ItemDePauta $idp)
    {
        return $this->save($idp);
    }

}