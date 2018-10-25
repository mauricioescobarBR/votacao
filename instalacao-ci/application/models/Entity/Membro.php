<?php

namespace Entity;

use Doctrine\Common\Collections\ArrayCollection;


/**
 * @Entity
 * @Table(name = "membros")
 */
class Membro
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
     * @ManyToMany(targetEntity="Reuniao", mappedBy="membros")
     */
    private $reunioes;

    /**
     * @Column(type="string", unique=true)
     */
    private $token;

    /**
     * Membro constructor.
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
     * @return mixed
     */
    public function getToken()
    {
        return $this->token;
    }

    /**
     * @param mixed $token
     */
    public function setToken($token)
    {
        $this->token = $token;
    }

}
