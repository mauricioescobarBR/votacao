<?php

namespace Entity;


/**
 * @Entity
 * @Table(name="votacoes")
 */
class Votacao
{

    /**
     * @Id
     * @Column(type="integer", nullable=false)
     * @GeneratedValue(strategy="IDENTITY")
     */
    private $id;

    /**
     * @Column(type="boolean", nullable=false)
     */
    private $votacaoAberta = false;

    /**
     * @OneToOne(targetEntity="Urna", mappedBy="urnas", cascade={"persist", "remove", "merge"}, orphanRemoval=true)
     * @JoinColumn(name="urna_id", referencedColumnName="id")
     */
    private $urna;

    /**
     * @OneToOne(targetEntity="ItemDePauta")
     * @JoinColumn(name="itemdepauta_id", referencedColumnName="id")
     */
    private $itemDePauta;

    /**
     * @OneToOne(targetEntity="ResultadoDaVotacao", cascade={"persist", "remove", "merge", "refresh"})
     */
    private $resultado;

    /**
     * @Column(type="string", nullable=false)
     */
    private $status = StatusVotacao::FECHADA;

    /**
     * @Column(type="string", nullable=false)
     */
    private $turno;

    /**
     * Votacao constructor.
     * @param $urna
     * @param $itemDePauta
     */
    public function __construct(Urna $urna, ItemDePauta $itemDePauta)
    {
        $this->urna = $urna;
        $this->itemDePauta = $itemDePauta;
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
    public function getVotacaoAberta()
    {
        return $this->votacaoAberta;
    }

    /**
     * @param mixed $votacaoAberta
     */
    public function setVotacaoAberta($votacaoAberta)
    {
        $this->votacaoAberta = $votacaoAberta;
    }

    /**
     * @return mixed
     */
    public function getUrna()
    {
        return $this->urna;
    }

    /**
     * @param mixed $urna
     */
    public function setUrna($urna)
    {
        $this->urna = $urna;
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
    public function setItemDePauta($itemDePauta)
    {
        $this->itemDePauta = $itemDePauta;
    }

    /**
     * @return mixed
     */
    public function getResultado()
    {
        return $this->resultado;
    }

    /**
     * @param mixed $resultado
     */
    public function setResultado($resultado)
    {
        $this->resultado = $resultado;
    }

    /**
     * @return mixed
     */
    public function getStatus()
    {
        return $this->status;
    }

    /**
     * @param mixed $status
     */
    public function setStatus($status)
    {
        if (!in_array($status, StatusVotacao::getAvailableTypes())) {
            throw new \InvalidArgumentException("Invalid type");
        }

        $this->status = $status;
    }

    /**
     * @return mixed
     */
    public function getTurno()
    {
        return $this->turno;
    }

    /**
     * @param mixed $turno
     */
    public function setTurno($turno)
    {
        if (!in_array($turno, Turno::getAvailableTypes())) {
            throw new \InvalidArgumentException("Invalid type");
        }

        $this->turno = $turno;
    }

//    public void registraVotoNaUrna(Voto voto) {
//        this.getUrna().recebe(voto);
//    }

}
