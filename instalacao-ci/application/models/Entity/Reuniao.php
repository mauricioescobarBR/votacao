<?php

namespace Entity;


use Doctrine\Common\Collections\ArrayCollection;


/**
 * @Entity(repositoryClass="repositories\Reunioes_repository")
 * @Table(name="reunioes")
 */
class Reuniao
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
     * @Column(type="date", nullable=false)
     */
    private $data;

    /**
     * @Column(type="time", nullable=false)
     */
    private $horario;

    /**
     * @Column(type="boolean", nullable=false)
     */
    private $estaAberta;

    /**
     * @Column(type="string", nullable=false)
     */
    private $tipoDaReuniao;

    /**
     * @ManyToMany(targetEntity="Entity\Membro", mappedBy="reunioes")
     * @JoinTable(name="membros_reunioes")
     */
    private $membros;

    /**
     * @OneToOne(targetEntity="Entity\Moderador")
     */
    private $moderador;

    /**
     * @OneToMany(targetEntity="Entity\ItemDePauta", mappedBy="reuniao")
     */
    private $itensDePauta;

    /**
     * Reuniao constructor.
     */
    public function __construct()
    {
        $this->membros = new ArrayCollection();
        $this->itensDePauta = new ArrayCollection();
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
    public function getData()
    {
        return $this->data;
    }

    /**
     * @param mixed $data
     */
    public function setData($data)
    {
        $this->data = $data;
    }

    /**
     * @return mixed
     */
    public function getHorario()
    {
        return $this->horario;
    }

    /**
     * @param mixed $horario
     */
    public function setHorario($horario)
    {
        $this->horario = $horario;
    }

    /**
     * @return mixed
     */
    public function getEstaAberta()
    {
        return $this->estaAberta;
    }

    /**
     * @param mixed $estaAberta
     */
    public function setEstaAberta($estaAberta)
    {
        $this->estaAberta = $estaAberta;
    }

    /**
     * @return mixed
     */
    public function getTipoDaReuniao()
    {
        return $this->tipoDaReuniao;
    }

    /**
     * @param mixed $tipoDaReuniao
     */
    public function setTipoDaReuniao($tipoDaReuniao)
    {
        if (!in_array($tipoDaReuniao, TipoDaReuniao::getAvailableTypes())) {
            throw new \InvalidArgumentException("Invalid type");
        }

        $this->tipoDaReuniao = $tipoDaReuniao;
    }

    /**
     * @return mixed
     */
    public function getMembros()
    {
        return $this->membros;
    }

    /**
     * @param mixed $membros
     */
    public function setMembros($membros)
    {
        $this->membros = $membros;
    }

    /**
     * @return mixed
     */
    public function getModerador()
    {
        return $this->moderador;
    }

    /**
     * @param mixed $moderador
     */
    public function setModerador($moderador)
    {
        $this->moderador = $moderador;
    }

    /**
     * @return mixed
     */
    public function getItensDePauta()
    {
        return $this->itensDePauta;
    }

    /**
     * @param mixed $itensDePauta
     */
    public function setItensDePauta($itensDePauta)
    {
        $this->itensDePauta = $itensDePauta;
    }

}
