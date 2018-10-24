<?php

namespace Entity;


/**
 * @Entity
 * @Table(name="votacoes")
 */
class Reuniao {

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
     * @ManyToMany(targetEntity="Membro", mappedBy="reunioes")
     * @JoinTable(name="membros_reunioes")
     */
    private $membros;

    /**
     * @OneToOne(targetEntity="Moderador", cascade={"persist", "remove"})
     */
    private $moderador;

    /**
     * @OneToMany(targetEntity="ItemDePauta", mappedBy="reuniao")
     */
    private $itensDePauta;

    

//    public Long getId() {
//        return id;
//    }
//
//    public List<Membro> getMembros() {
//        return membros;
//    }
//
//    public void setMembros(List<Membro> membros) {
//        this.membros = membros;
//    }
//
//    public Moderador getModerador() {
//        return moderador;
//    }
//
//    public void setModerador(Moderador moderador) {
//        if (moderador == null) {
//            throw new IllegalArgumentException();
//        } else {
//            this.moderador = moderador;
//        }
//    }
//
//    public List<ItemDePauta> getItensDePauta() {
//        return itensDePauta;
//    }
//
//    public void setItensDePauta(List<ItemDePauta> itensDePauta) {
//        this.itensDePauta = itensDePauta;
//    }
//
//    public String getDescricao() {
//        return descricao;
//    }
//
//    public void setDescricao(String descricao) {
//        if (descricao == null || descricao == "") {
//            throw new IllegalArgumentException();
//        } else {
//            this.descricao = descricao;
//        }
//    }
//
//    public LocalDate getData() {
//        return data;
//    }
//
//    public void setData(LocalDate data) {
//        if (data == null) {
//            throw new IllegalArgumentException();
//        } else {
//            this.data = data;
//        }
//    }
//
//    public LocalTime getHorario() {
//        return horario;
//    }
//
//    public void setHorario(LocalTime horario) {
//        if (horario == null) {
//            throw new IllegalArgumentException();
//        } else {
//            this.horario = horario;
//        }
//    }
//
//    public void setReuniaoOrdinaria(TipoDaReuniao tipoDaReuniao) {
//        this.tipoDaReuniao = TipoDaReuniao.ORDINARIA;
//    }
//
//    public void setReuniaoExtraordinaria(TipoDaReuniao tipoDaReuniao) {
//        this.tipoDaReuniao = TipoDaReuniao.EXTRAORDINARIA;
//    }
//
//    public Boolean getEstaAberta() {
//        return estaAberta;
//    }
//
//    public void setEstaAberta(Boolean estaAberta) {
//        this.estaAberta = estaAberta;
//    }
//
//    public void setId(Long id) {
//        this.id = id;
//    }
//
//    public TipoDaReuniao getTipoDaReuniao() {
//        return tipoDaReuniao;
//    }
//
//    public void setTipoDaReuniao(TipoDaReuniao tipoDaReuniao) {
//        this.tipoDaReuniao = tipoDaReuniao;
//    }
//
//    @Override
//    public String toString() {
//        return "Reuniao{" +
//                "id=" + id +
//                ", descricao='" + descricao + '\'' +
//                ", data=" + data +
//                ", horario=" + horario +
//                ", estaAberta=" + estaAberta +
//                ", moderador=" + moderador +
//                '}';
//    }

}
