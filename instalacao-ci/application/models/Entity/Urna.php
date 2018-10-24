<?php

namespace Entity;
use Doctrine\Common\Collections\ArrayCollection;


/**
 * @Entity
 * @Table(name="urnas")
 */
class Urna
{

    /**
     * @Id
     * @Column(type="integer", nullable=false)
     * @GeneratedValue(strategy="IDENTITY")
     */
    private $id;

    /**
     * @ManyToMany(targetEntity="Voto", orphanRemoval=true)
     * @JoinTable(name="urnas_votos",
     *      joinColumns={@JoinColumn(name="urna_id", referencedColumnName="id")},
     *      inverseJoinColumns={@JoinColumn(name="votos_id", referencedColumnName="id", unique=true)}
     *      )
     */
    private $votosParaContagem;

    /**
     * Urna constructor.
     */
    public function __construct()
    {
        $this->votosParaContagem = new ArrayCollection();
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
    public function getVotosParaContagem()
    {
        return $this->votosParaContagem;
    }

    /**
     * @param mixed $votosParaContagem
     */
    public function setVotosParaContagem($votosParaContagem)
    {
        $this->votosParaContagem = $votosParaContagem;
    }

//    public void recebe(Voto voto) {
//        if (this.votosParaContagem == null) {
//            this.votosParaContagem = new ArrayList<>();
//        }
//
//        this.votosParaContagem.add(voto);
//    }

}
