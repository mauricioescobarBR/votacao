<?php

namespace Entity;


use Doctrine\Common\Collections\ArrayCollection;


/**
 * @Entity
 * @Table(name="moderadores")
 */
class Moderador
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
     * @OneToMany(targetEntity="Entity\Reuniao", mappedBy="moderador")
     */
    private $reunioes;

    /**
     * Moderador constructor.
     */
    public function __construct()
    {
        $this->reunioes = new ArrayCollection();
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

    /**
     * @return mixed
     */
    public function getReunioes()
    {
        return $this->reunioes;
    }

    /**
     * @param mixed $reunioes
     */
    public function setReunioes($reunioes)
    {
        $this->reunioes = $reunioes;
    }

    /**
     * @param Reuniao $reuniao
     */
    public function abrirReuniao(Reuniao $reuniao)
    {
        $reuniao->setEstaAberta(true);
    }

}
