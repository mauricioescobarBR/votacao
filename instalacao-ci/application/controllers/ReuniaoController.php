<?php

defined('BASEPATH') OR exit('No direct script access allowed');


include APPPATH . 'controllers\ReuniaoSSEResource.php';

class ReuniaoController extends CI_Controller
{
    private $REPOSITORY;

    public function __construct() {
        parent::__construct();

<<<<<<< HEAD
=======
    public function __construct()
    {
        parent::__construct();
        $this->init();
    }

    private function init()
    {
        //$this->load->model('Entity/Reuniao');
>>>>>>> a7ed2665a75f0a42c705e0bfe605f5a5e7b1bb0b
        $this->load->repository('Reunioes');
        $this->load->library(array('session', 'form_validation', 'unit_test'));
        $this->load->database();
    }

<<<<<<< HEAD
        $credo = new Rougin\Credo\Credo($this->db);
        $this->REPOSITORY = $credo->get_repository('Entity\Reuniao');
    }

    public function index()
    {
        $data['reunioes'] = $this->REPOSITORY->find_all();
=======
    public function index()
    {
        $data['reunioes'] = $this->carregaTodas();
>>>>>>> a7ed2665a75f0a42c705e0bfe605f5a5e7b1bb0b

        $this->load->view("reunioes", $data);
    }

<<<<<<< HEAD
    public function reuniao($id)
    {
        $dados['reuniao'] = $this->get_reuniao($id);
        if ($dados['reuniao'] == null) {
            echo "Não encontrado!";
            return false;
        }
        $dados['statusReuniao'] = "Fechada";
        if($dados['reuniao']->getEstaAberta() == '1'){
               $dados['statusReuniao'] = "Aberta";
        }
        return $this->load->view("reuniao", $dados);
    }

    public function set_status_reuniao()
    {
        $reuniao_id = $this->input->post("reuniao_id");
        $reuniao = $this->get_reuniao($reuniao_id);
        if ($reuniao == null)
        {
            echo "Não encontrado!";
            return false;
        }

        // inverte o estado da reunião
        if ($reuniao->getEstaAberta() == '0')
        {
           $reuniao->setEstaAberta('1');
        }
        else
        {
            $reuniao->setEstaAberta('0');
        }

        // salva reunião
        $reuniao = $this->REPOSITORY->save($reuniao);
       //dump($reuniao);

        $this->reuniao($reuniao_id);
    }

    private function get_reuniao($id)
    {
        return $this->REPOSITORY->find($id);
    }
=======
    public function abrirReuniao($id)
    {
        $repository = $this->pegaRepositoryDeReuniao();
        $reuniao = $repository->find($id);
        $reuniao->setEstaAberta(!$reuniao->getEstaAberta());

        $repository->abrirReuniao($reuniao);
        $this->load->helper('url');
        redirect('/reunioes/');
    }

    public function mostraReuniao($id)
    {
        $repository = $this->pegaRepositoryDeReuniao();
        $reuniao = $repository->find($id);
        dump($reuniao);
    }

    public function resgitraReuniao($id, $token)
    {
        $connection = ReuniaoSSEResource::getInstance();
        $connection->conecta();
    }

    private function pegaRepositoryDeReuniao()
    {
        $credo = new Rougin\Credo\Credo($this->db);
        return $repository = $credo->get_repository('Entity\Reuniao');
    }

    public function registraReuniao()
    {
        $data['reunioes'] = $this->carregaTodas();

        $this->load->view("registra_reuniao", $data);
    }

    private function carregaTodas()
    {
        $repository = $this->pegaRepositoryDeReuniao();
        return $repository->find_all();
    }

>>>>>>> a7ed2665a75f0a42c705e0bfe605f5a5e7b1bb0b
}
