<?php

namespace Entity;


/**
 * @Entity(repositoryClass="repositories\Encaminhamento_repository")
 * @Table(name="encaminhamentos")
 */
class Encaminhamento
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
    private $descricao;

    /**
     * @Column(type="integer", nullable=false)
     */
    private $somaVoto = 0;

    /**
     * @ManyToOne(targetEntity="Entity\ItemDePauta", inversedBy="encaminhamentos")
     */
    private $itemDePauta;

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
    public function getDescricao()
    {
        return $this->descricao;
    }

    /**
     * @param mixed $descricao
     */
    public function setDescricao($descricao)
    {
        $this->descricao = $descricao;
    }

    /**
     * @return mixed
     */
    public function getSomaVoto()
    {
        return $this->somaVoto;
    }

    /**
     * @param mixed $somaVoto
     */
    public function setSomaVoto($somaVoto)
    {
        $this->somaVoto = $somaVoto;
    }

    /**
     * @return mixed
     */
    public function getItemDePauta()
    {
        return $this->itemDePauta;
    }

    /**
     * @param mixed $itemDePauta
     */
    public function setItemDePauta(ItemDePauta $itemDePauta)
    {
        $this->itemDePauta = $itemDePauta;
    }

}
