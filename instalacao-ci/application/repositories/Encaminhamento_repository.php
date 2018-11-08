<?php

namespace repositories;


use Entity\Encaminhamento;
use Entity\Encaminhamentos;
use Entity\ItemDePauta;
use Entity\ItensDePauta;
use Rougin\Credo\EntityRepository;
//use Rougin\Credo\Repository;

class Encaminhamento_repository extends EntityRepository implements Encaminhamentos
{

    function salvar(Encaminhamento $enc)
    {
        //    $this->save($itp);
    }



}