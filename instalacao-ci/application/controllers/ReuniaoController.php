<?php

defined('BASEPATH') OR exit('No direct script access allowed');


include APPPATH . 'controllers\ReuniaoSSEResource.php';

class ReuniaoController extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->init();
    }

    private function init()
    {
        $this->load->model('Entity\Reuniao');
        $this->load->repository('Reunioes');
        $this->load->database();
    }

    public function index()
    {
        $data['reunioes'] = $this->carregaTodas();

        $this->load->view("reunioes", $data);
    }

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

}
