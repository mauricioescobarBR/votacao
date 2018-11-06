<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class TestItemPauta extends \CI_Controller
{

    // variáveis comuns para todas as operações com banco de dados
    private $credo;
    private $repository;

    /**
     * TestItemPauta constructor.
     * Deve-se atentar a chamada do repositório,
     * Chamada da database,
     * e atribuição de valores as variáveis credo e repository,
     * pois estas acontecem em toda operação de banco de dados
     */
    public function __construct()
    {
        parent::__construct();
        $this->load->library(array('session', 'form_validation', 'unit_test'));
        $this->load->repository('Itens_de_pauta');
        $this->load->database();

        $this->credo = new Rougin\Credo\Credo($this->db);
        $this->repository = $this->credo->get_repository('Entity\ItemDePauta');
    }


    /**
     * Chamando todos os testes em uma única view
     */
    public function index()
    {
        $this->get_all();
        $this->get_item_pauta();
    }

    /**
     * Testes para pegar todos os itens de pauta salvos no banco,
     * e comparar com o tamanho pre-definido do array
     */
    public function get_all()
    {
        $test_name = "Get all Itens De Pauta";
        $IDP = $this->repository->findAll();
        $test = sizeof($IDP);
        $expected_result = 7;
        echo $this->unit->run($test, $expected_result, $test_name);
    }

    /**
     * Dá get no item de pauta 5 e avalia se os dados obtidos
     * conferem com os que estão no banco
     */
    public function get_item_pauta()
    {
        $test_name = "Get item de pauta 5";
        $IDP = $this->repository->getById(5);
        $test = $IDP->getRelator();
        $expected_result = "Mauricio El Uri";
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
