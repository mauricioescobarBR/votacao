<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class ReuniaoController extends CI_Controller
{

    public function index()
    {
        $this->load->model('Entity\Reuniao');
        $this->load->repository('Reunioes');
        $this->load->database();

        $credo = new Rougin\Credo\Credo($this->db);
        $repository = $credo->get_repository('Entity\Reuniao');
        $data['reunioes'] = $repository->find_all();

        $this->load->view("US04", $data);
    }

}
