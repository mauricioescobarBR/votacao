<?php

namespace Entity;


use Doctrine\Common\Collections\ArrayCollection;


/**
 * @Entity
 * @Table(name="resultados")
 */
class ResultadoDaVotacao
{

    /**
     * @Id
     * @Column(type="integer", nullable=false)
     * @GeneratedValue(strategy="IDENTITY")
     */
    private $id;

    /**
     * @ManyToMany(targetEntity="ResultadosDoEncaminhamento", orphanRemoval=true, cascade={"persist", "remove", "merge", "refresh"})
     * @JoinTable(name="resultados_resultados_do_encaminhamento",
     *      joinColumns={@JoinColumn(name="resultados_id", referencedColumnName="id")},
     *      inverseJoinColumns={@JoinColumn(name="resultados_do_encaminhamento_id", referencedColumnName="id", unique=true)}
     *      )
     */
    private $resultadosDoEncaminhamentos;

    /**
     * ResultadoDaVotacao constructor.
     */
    public function __construct()
    {
        $this->resultadosDoEncaminhamentos = new ArrayCollection();
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
    public function getResultadosDoEncaminhamentos()
    {
        return $this->resultadosDoEncaminhamentos;
    }

    /**
     * @param mixed $resultadosDoEncaminhamentos
     */
    public function setResultadosDoEncaminhamentos($resultadosDoEncaminhamentos)
    {
        $this->resultadosDoEncaminhamentos = $resultadosDoEncaminhamentos;
    }

//
//    public void adicionaUm(ResultadosDoEncaminhamento resultadosDoEncaminhamento){
//        if(this.resultadosDoEncaminhamentos == null){
//            this.resultadosDoEncaminhamentos = new ArrayList<>();
//        }
//        this.resultadosDoEncaminhamentos.add(resultadosDoEncaminhamento);
//    }
//
//    public void ordenar(){
//        Collections.sort(this.resultadosDoEncaminhamentos);
//    }

}
