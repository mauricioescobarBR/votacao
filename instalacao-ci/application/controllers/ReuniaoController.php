<?php

defined('BASEPATH') OR exit('No direct script access allowed');

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
        $repository = $this->pegaRepositoryDeReuniao();
        $data['reunioes'] = $repository->find_all();

        $this->load->view("reunioes", $data);
    }

    public function abrirReuniao($id) {
        $repository = $this->pegaRepositoryDeReuniao();
        $reuniao = $repository->find($id);
        $reuniao->setEstaAberta(!$reuniao->getEstaAberta());

        $repository->abrirReuniao($reuniao);
        $this->load->helper('url');
        redirect('/reunioes/');
    }

    public function mostraReuniao($id) {
        $repository = $this->pegaRepositoryDeReuniao();
        $reuniao = $repository->find($id);
        dump($reuniao);
    }

    private function pegaRepositoryDeReuniao()
    {
        $credo = new Rougin\Credo\Credo($this->db);
        return $repository = $credo->get_repository('Entity\Reuniao');
    }

}
