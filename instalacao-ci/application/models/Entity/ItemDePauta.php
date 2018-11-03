<?php

namespace Entity;

use Doctrine\Common\Collections\ArrayCollection;


/**
 * @Entity
 * @Table(name="itens_de_pauta")
 */
class ItemDePauta
{

    /**
     * @Id
     * @Column(type="integer", nullable=false)
     * @GeneratedValue(strategy="IDENTITY")
     */
    private $id;


    /**
 * @OneToOne(targetEntity="Votacao", cascade={"persist", "remove", "merge", "refresh"}, orphanRemoval=true)
     */
    private $primeiroTurno;

    /**
     * @OneToOne(targetEntity="Votacao", cascade={"persist", "remove", "merge", "refresh"}, orphanRemoval=true)
     */
    private $segundoTurno;

    /**
     * @Column(type="string", nullable=false)
     */
    private $relator;

    /**
     * @Column(type="string", nullable=false)
     */
    private $descricao;

    /**
     * @ManyToOne(targetEntity="Reuniao", inversedBy="itensDePauta")
     */
    private $reuniao;

    /**
     * @Column(nullable = true)
     * @OneToMany(targetEntity="Encaminhamento", mappedBy="itemDePauta", cascade={"persist", "remove"})
     */
    private $encaminhamentos;

    /**
     * @Column(type="boolean", nullable=false)
     */
    private $temSegundoTurno;

    /**
     * @Column(type="integer", nullable=false)
     */
    private $ordem;

    /**
     * ItemDePauta constructor.
     */
    public function __construct()
    {
        $this->encaminhamentos = new ArrayCollection();
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
    public function getPrimeiroTurno()
    {
        return $this->primeiroTurno;
    }

    /**
     * @param mixed $primeiroTurno
     */
    public function setPrimeiroTurno(Votacao $primeiroTurno)
    {
        $this->primeiroTurno = $primeiroTurno;
    }

    /**
     * @return mixed
     */
    public function getSegundoTurno()
    {
        return $this->segundoTurno;
    }

    /**
     * @param mixed $segundoTurno
     */
    public function setSegundoTurno(Votacao $segundoTurno)
    {
        $this->segundoTurno = $segundoTurno;
    }

    /**
     * @return mixed
     */
    public function getRelator()
    {
        return $this->relator;
    }

    /**
     * @param mixed $relator
     */
    public function setRelator($relator)
    {
        $this->relator = $relator;
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
    public function getReuniao()
    {
        return $this->reuniao;
    }

    /**
     * @param mixed $reuniao
     */
    public function setReuniao(Reuniao $reuniao)
    {
        $this->reuniao = $reuniao;
    }

    /**
     * @return mixed
     */
    public function getEncaminhamentos()
    {
        return $this->encaminhamentos;
    }

    /**
     * @param mixed $encaminhamentos
     */
    public function setEncaminhamentos($encaminhamentos)
    {
        $this->encaminhamentos = new ArrayCollection($encaminhamentos);
    }

    /**
     * @return mixed
     */
    public function getTemSegundoTurno()
    {
        return $this->temSegundoTurno;
    }

    /**
     * @param mixed $temSegundoTurno
     */
    public function setTemSegundoTurno($temSegundoTurno)
    {
        $this->temSegundoTurno = $temSegundoTurno;
    }

    /**
     * @return mixed
     */
    public function getOrdem()
    {
        return $this->ordem;
    }

    /**
     * @param mixed $ordem
     */
    public function setOrdem($ordem)
    {
        $this->ordem = $ordem;
    }

//    public void adiciona(Encaminhamento encaminhamento) {
//        if (this.encaminhamentos == null) {
//            this.encaminhamentos = new ArrayList<>();
//        }
//        if (encaminhamento == null) {
//            throw new IllegalArgumentException("O encaminhamento não pode ser nulo!");
//        }
//
//        this.encaminhamentos.add(encaminhamento);
//    }
//
//    public void removeEncaminhamento(Encaminhamento encaminhamento) {
//        if (this.encaminhamentos == null) {
//            this.encaminhamentos = new ArrayList<>();
//        }
//
//        if (this.encaminhamentos.size() == 0) {
//            throw new ArrayIndexOutOfBoundsException("A lista de encaminhamentos está vazia!");
//        }
//
//        this.encaminhamentos.remove(encaminhamento);
//    }
//
//    public void cancelaVotacao(){
//        this.primeiroTurno = null;
//        this.segundoTurno = null;
//    }

}
