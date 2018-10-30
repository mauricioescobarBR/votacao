<?php
/**
 * Created by PhpStorm.
 * User: pedro
 * Date: 30/10/2018
 * Time: 20:37
 */

namespace Repository;


use Entity\Reuniao;
use Entity\Reunioes;

class ReuniaoRepository extends AbstractRepository implements Reunioes
{

    function abrirReuniao(Reuniao $reuniao)
    {
        if ($reuniao->getEstaAberta())
        {
            $this->save($reuniao);
        } else {
            throw new \InvalidArgumentException("A reunião não pôde ser aberta.");
        }
    }

}