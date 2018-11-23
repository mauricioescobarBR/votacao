<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class ItemDePautaController extends CI_Controller {

    private $credo;
    private $encaminhamentoRepository;
    private $itemDePautaRepository;

    public function __construct() {
        parent::__construct();
       // , 'utility'));
//        , 'secao', 'mensagens'));

        //$this->load->library(array('session', 'form_validation', 'doctrine'));
        //$this->load->model(array('m_admin', 'm_token', 'm_site'));
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
	public function set_encaminhamentos(){
	    $id_ip = $this->input->post("item_pauta_id");
	    $idp = $this->get_ip($id_ip);

	    $descricoes = array (
	      1 => "À favor",
          2 => "Contra",
          3 => "Abstenção"
        );

	    $this->set_encam($idp, $descricoes);

	    return true;


        //$group = new Entity\ItemDePauta;
        //$this->load->('');

    /*    $dados['idp'] = $this->get_ip($id);
        if ($dados['idp'] == null)
        {
            echo "Não encontrado!";
            return false;
        }
        $this->load->view("encaminhamento", $dados);
*/

	}

	public function item_pauta($id)
    {
        $dados['idp'] = $this->get_ip($id);
        if ($dados['idp'] == null)
        {
            echo "Não encontrado!";
            return false;
        }
        return $this->load->view("encaminhamento", $dados);
    }

	private function get_ip($id)
    {
        return $this->itemDePautaRepository->find($id);
    }

    /**
     * Recebe o item de pauta (já com get do banco)
     * @param $item_pauta
     */
    private function set_encam($item_pauta, $descricoes)
    {
        foreach ($descricoes as $descricao)
        {
            $item_pauta->adicionaEncaminhamento($this->criaEncaminhamento($descricao, $item_pauta));
        }
/*        for ($index = 0; $index < 3; $index++)
        {
            $itemSalvo->adicionaEncaminhamento($this->criaEncaminhamento($index, $itemSalvo));
        }
*/

        $item_pauta = $this->itemDePautaRepository->salvar($item_pauta);
        dump($item_pauta);
    }

    private function criaEncaminhamento($descricao, $item)
    {
        $encaminhamento = new Entity\Encaminhamento();
        $encaminhamento->setDescricao($descricao);
        $encaminhamento->setItemDePauta($item);

        $encaminhamento = $this->encaminhamentoRepository->salvar($encaminhamento);

        return $encaminhamento;
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
