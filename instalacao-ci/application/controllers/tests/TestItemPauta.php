<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class TestItemPauta extends \CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->library(array('session', 'form_validation', 'unit_test'));
    }

    public function index()
    {
        $this->getAll();
    }

    public function get_all()
    {
        $this->load->repository('Itens_de_pauta');
        $this->load->database();

        $credo = new Rougin\Credo\Credo($this->db);
        $repository = $credo->get_repository('Entity\ItemDePauta');
        $IDP = $repository->findAll();
        $test = sizeof($IDP);

        $expected_result = 7;
        $test_name = "Get all Itens De Pauta";
        echo $this->unit->run($test, $expected_result, $test_name);
    }

    /*public function setItemPauta()
    {

        $IDP = $this->criaIDP();
        $em = $this->doctrine->em;

        $em->persist($IDP);
        $em->flush();

        $test = true;
        $expected_result = true;
        $test_name = "Salvar ItemDePauta";
        echo $this->unit->run($test, $expected_result, $test_name);
    }

    private function criaIDP()
    {
        $IDP = new \Entity\ItemDePauta;
        $IDP->setDescricao("Item de pauta demonstração");
        $IDP->setRelator("Joselino Falcão");
        $IDP->setTemSegundoTurno(0);
        $IDP->setOrdem(1);

        return $IDP;
    }*/
}
