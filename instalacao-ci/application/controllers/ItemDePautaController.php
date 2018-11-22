<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class ItemDePautaController extends CI_Controller {

    private $credo;
    private $encaminhamentoRepository;
    private $itemDePautaRepository;

    public function __construct() {
        //parent:: __construct();
        //$this->load->helper(array('form', 'utility', 'secao', 'mensagens'));
        //$this->load->library(array('session', 'form_validation', 'doctrine'));
        //$this->load->model(array('m_admin', 'm_token', 'm_site'));
        parent::__construct();
        $this->load->library(array('session', 'form_validation', 'unit_test'));
        $this->load->repository('Encaminhamento');
        $this->load->repository('ItensDePauta');
        $this->load->database();
        $this->credo = new Rougin\Credo\Credo($this->db);
        $this->encaminhamentoRepository = $this->credo->get_repository('Entity\Encaminhamento');
        $this->itemDePautaRepository = $this->credo->get_repository('Entity\ItemDePauta');
    }

    /**
     * Selecionar encaminhamento - recebe o id do item de pauta
     * como parâmetro.
     * @param $id
     */
	public function set_encaminhamento($id){
        //$group = new Entity\ItemDePauta;
        //$this->load->('');

        $dados['idp'] = $this->get_ip($id);
        if ($dados['idp'] == null)
        {
            echo "Não encontrado!";
            return false;
        }
        $this->load->view("encaminhamento", $dados);

	}

	private function get_ip($id)
    {
        $IDP = $this->itemDePautaRepository->find($id);
        if ($IDP == null){
            return false;
        }
        return $IDP;
    }

    private function criaIDP()
    {
        $IDP = new Entity\ItemDePauta();
        $IDP->setDescricao("Item de pauta para demonstração");
        $IDP->setRelator("Joselino Falcão Jr.");
        $IDP->setTemSegundoTurno(0);
        $IDP->setOrdem(1);

        $itemSalvo = $this->itemDePautaRepository->salvar($IDP);

        for ($index = 0; $index < 3; $index++)
        {
            $itemSalvo->adicionaEncaminhamento($this->criaEncaminhamento($index, $itemSalvo));
        }

        $itemSalvo = $this->itemDePautaRepository->salvar($itemSalvo);

        dump($itemSalvo);
        return $itemSalvo;
    }
}
