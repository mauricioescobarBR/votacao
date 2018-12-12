<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class ReuniaoController extends CI_Controller
{
    private $REPOSITORY;

    public function __construct() {
        parent::__construct();

        $this->load->repository('Reunioes');
        $this->load->library(array('session', 'form_validation', 'unit_test'));
        $this->load->database();

        $credo = new Rougin\Credo\Credo($this->db);
        $this->REPOSITORY = $credo->get_repository('Entity\Reuniao');
    }

    public function index()
    {
        $data['reunioes'] = $this->REPOSITORY->find_all();

        $this->load->view("reunioes", $data);
    }

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
}
