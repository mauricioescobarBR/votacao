<?php

namespace Entity;


/**
 * @Entity
 * @Table(name="votos")
 */
class Voto
{

    /**
     * @Id
     * @Column(type="integer", nullable=false)
     * @GeneratedValue(strategy="IDENTITY")
     */
    private $id;

    /**
     * @OneToOne(targetEntity="Membro")
     */
    private $votante;

    /**
     * @OneToOne(targetEntity="Encaminhamento")
     */
    private $escolha;

    /**
     * Voto constructor.
     * @param $votante
     * @param $escolha
     */
    public function __construct(Membro $votante, Encaminhamento $escolha)
    {
        $this->votante = $votante;
        $this->escolha = $escolha;
    }

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
    public function getVotante()
    {
        return $this->votante;
    }

    /**
     * @param mixed $votante
     */
    public function setVotante(Membro $votante)
    {
        $this->votante = $votante;
    }

    /**
     * @return mixed
     */
    public function getEscolha()
    {
        return $this->escolha;
    }

    /**
     * @param mixed $escolha
     */
    public function setEscolha(Encaminhamento $escolha)
    {
        $this->escolha = $escolha;
    }

//
//    public Voto(Membro membro, Encaminhamento encaminhamento) {
//        this.setVotante(membro);
//        this.setEscolha(encaminhamento);
//    }

}
