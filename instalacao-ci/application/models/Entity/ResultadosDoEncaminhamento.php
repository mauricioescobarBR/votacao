<?php

namespace Entity;

use Doctrine\Common\Collections\ArrayCollection;


/**
 * @Entity
 * @Table(name="resultados_do_encaminhamento")
 */
class ResultadosDoEncaminhamento
{

    /**
     * @Id
     * @Column(type="integer", nullable=false)
     * @GeneratedValue(strategy="IDENTITY")
     */
    private $id;

    /**
     * @OneToOne(targetEntity="Encaminhamento", cascade={"refresh"})
     */
    private $encaminhamento;

    /**
     * @ManyToMany(targetEntity="Membro", orphanRemoval=false, cascade={"refresh"})
     * @JoinTable(name="resultados_do_encaminhamento_membros",
     *      joinColumns={@JoinColumn(name="resultados_do_encaminhamento_id", referencedColumnName="id")},
     *      inverseJoinColumns={@JoinColumn(name="membros_id", referencedColumnName="id", unique=true)}
     *      )
     */
    private $votantes;

    /**
     * @Column(type="integer", nullable=false)
     */
    private $quantidadeDeVotos = 0;

    /**
     * @Column(type="float", nullable=false)
     */
    private $porcentagem = 0.0;

    /**
     * ResultadosDoEncaminhamento constructor.
     */
    public function __construct()
    {
        $this->votantes = new ArrayCollection();
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
    public function getEncaminhamento()
    {
        return $this->encaminhamento;
    }

    /**
     * @param mixed $encaminhamento
     */
    public function setEncaminhamento($encaminhamento)
    {
        $this->encaminhamento = $encaminhamento;
    }

    /**
     * @return mixed
     */
    public function getVotantes()
    {
        return $this->votantes;
    }

    /**
     * @param mixed $votantes
     */
    public function setVotantes($votantes)
    {
        $this->votantes = $votantes;
    }

    /**
     * @return mixed
     */
    public function getQuantidadeDeVotos()
    {
        return $this->quantidadeDeVotos;
    }

    /**
     * @param mixed $quantidadeDeVotos
     */
    public function setQuantidadeDeVotos($quantidadeDeVotos)
    {
        $this->quantidadeDeVotos = $quantidadeDeVotos;
    }

    /**
     * @return mixed
     */
    public function getPorcentagem()
    {
        return $this->porcentagem;
    }

    /**
     * @param mixed $porcentagem
     */
    public function setPorcentagem($porcentagem)
    {
        $this->porcentagem = $porcentagem;
    }

//    public ResultadosDoEncaminhamento computaUmVoto() {
//        setQuantidadeDeVotos();
//        return this;
//    }
//
//    public ResultadosDoEncaminhamento eAdiciona(Membro votante) {
//        if(votantes == null){
//           votantes = new ArrayList<>();
//        }
//        this.votantes.add(votante);
//
//        return this;
//    }
//
//    public int compareTo(ResultadosDoEncaminhamento outroResultado){
//        if (this.quantidadeDeVotos > outroResultado.quantidadeDeVotos) {
//            return -1;
//        }
//        if (this.quantidadeDeVotos < outroResultado.quantidadeDeVotos){
//            return 1;
//        }
//        return 0;
//    }

}
