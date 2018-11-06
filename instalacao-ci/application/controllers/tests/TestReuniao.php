<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class TestReuniao extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->library('unit_test');
    }

    /*public function index()
    {
        echo "Classes de testes";
        $test = $this->division(10, 2);
        $expected_result = 5;
        $test_name = "Divisão 10 por 2";
        echo $this->unit->run($test, $expected_result, $test_name);
    }

    public function getReuniao(){
        //$this->load->model('Entity/Reuniao');
        $this->load->repository('Reunioes');
        $this->load->database();

        $credo = new Rougin\Credo\Credo($this->db);
        $repository = $credo->get_repository('Entity\Reuniao');
        $data['reunioes'] = $repository->find_all();

    }

    /*public function index()
    {
        //$this->load->model('Entity/Reuniao');
        $this->load->repository('Reunioes');
        $this->load->database();

        $credo = new Rougin\Credo\Credo($this->db);
        $repository = $credo->get_repository('Entity\Reuniao');
        $data['reunioes'] = $repository->find_all();

        $this->load->view("itens_pauta", $data);
    }*/
}
