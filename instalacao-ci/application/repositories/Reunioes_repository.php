<?php

namespace repositories;


use Entity\Reuniao;
use Entity\Reunioes;
use Rougin\Credo\EntityRepository;

class Reunioes_repository extends EntityRepository implements Reunioes
{

    function abrirReuniao(Reuniao $reuniao)
    {
        if ($reuniao->getEstaAberta()) {
            $this->save($reuniao);
        } else {
            throw new \InvalidArgumentException("A reunião não pôde ser aberta.");
        }
    }

}