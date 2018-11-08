<?php

namespace repositories;


use Entity\ItemDePauta;
use Entity\ItensDePauta;
use Rougin\Credo\EntityRepository;
//use Rougin\Credo\Repository;

class Itens_de_pauta_repository extends EntityRepository implements ItensDePauta
{

    function salvar(ItemDePauta $itp)
    {
    //    $this->save($itp);
    }



}