<?php

namespace Entity;


defined('BASEPATH') OR exit('No direct script access allowed');


/**
 * @Entity
 * @Table(name="secretarios")
 */
class Secretario
{

    /**
     * @Id
     * @Column(type="integer", nullable=false)
     * @GeneratedValue(strategy="IDENTITY")
     */
    private $id;

    /**
     * @Column(type="string", nullable=false)
     */
    private $nome;

    /**
     * @return mixed
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @param mixed $id
     */
    public function setId($id)
    {
        $this->id = $id;
    }

    /**
     * @return mixed
     */
    public function getNome()
    {
        return $this->nome;
    }

    /**
     * @param mixed $nome
     */
    public function setNome($nome)
    {
        $this->nome = $nome;
    }

//    public List<ItemDePauta> adicionaOrdemNos(List<ItemDePauta> itensDePautas) {
//
//        for (int i = 0; i < itensDePautas.size(); i++) {
//            itensDePautas.get(i).setOrdem(i + 1);
//        }
//        return itensDePautas;
//    }
//
//    public List<ItemDePauta> moveOrdemDosItens(List<ItemDePauta> itens, ItemDePauta itemASerMovido, ItemDePauta itemASerOrdenado) {
//
//        Integer itemMover = itemASerMovido.getOrdem();
//        Integer itemASerSubstituido = itemASerOrdenado.getOrdem();
//
//        itens.get(itemASerSubstituido).setOrdem(itemMover);
//        itens.get(itemMover).setOrdem(itemASerSubstituido);
//        Collections.sort(itens);
//
//        return itens;
//    }

}

