<?php

defined('BASEPATH') OR exit('No direct script access allowed');


class ReuniaoNewController extends CI_Controller
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
        $this->output->set_content_type('application/json');

        $repository = $this->reuniaoReoisitory();
        $reunioes = $repository->find_all();

        $normalizer = new \Symfony\Component\Serializer\Normalizer\ObjectNormalizer();
        $normalizer->setCircularReferenceLimit(1);
        $normalizer->setIgnoredAttributes(array("reunioes", "membros", "itensDePauta"));

        $normalizer->setCircularReferenceHandler(function ($object) {
            return $object->getId();
        });

        $encoders = array(new \Symfony\Component\Serializer\Encoder\JsonEncoder());
        $normalizers = array($normalizer);

        $serializer = new \Symfony\Component\Serializer\Serializer($normalizers, $encoders);

        $jsonContent = $serializer->serialize($reunioes, 'json');

        echo $jsonContent;
    }

    public function create()
    {

    }

    public function store()
    {

    }

    public function show()
    {

    }

    public function edit()
    {

    }

    public function update()
    {

    }

    public function destroy()
    {

    }

    private function reuniaoReoisitory()
    {
        $credo = new Rougin\Credo\Credo($this->db);
        return $repository = $credo->get_repository('Entity\Reuniao');
    }

}