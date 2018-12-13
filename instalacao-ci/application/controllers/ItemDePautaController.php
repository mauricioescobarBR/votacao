<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class ItemDePautaController extends CI_Controller
{

    private $credo;
    private $encaminhamentoRepository;
    private $itemDePautaRepository;

    public function __construct()
    {
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
    public function set_encaminhamentos()
    {
        header('Content-Type: application/json');

        $data = $this->input->raw_input_stream;
        $data = json_decode($data);

        $itemDePauta = $this->get_ip($data->data->itemId);

        $length = count($data->data->encaminhamentos);
        for ($index = 0; $index < $length; $index++) {
            $itemDePauta->adicionaEncaminhamento($this->criaEncaminhamento($data->data->encaminhamentos[$index]->descricao, $itemDePauta));
        }

        $itemDePauta = $this->itemDePautaRepository->salvar($itemDePauta);

        echo $itemDePauta;
//
//        echo $data;

//	    $id_ip = $this->input->post("item_pauta_id");
//	    $idp = $this->get_ip($id_ip);
//
//	    $descricoesjson = $this->input->post("descricoes");
//
//	    $descricoes = json_decode($descricoesjson, true);
//
//	    $this->set_encam($idp, $descricoes);
//
//	    return true;
    }

    public function item_pauta($id)
    {
        $dados['item'] = $this->get_ip($id);
        if ($dados['item'] == null) {
            echo "Não encontrado!";
            return false;
        }
        return $this->load->view("encaminhar", $dados);
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
        foreach ($descricoes as $descricao) {
            $item_pauta->adicionaEncaminhamento(
                $this->criaEncaminhamento($descricao, $item_pauta)
            );
        }
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

        for ($index = 0; $index < 3; $index++) {
            $itemSalvo->adicionaEncaminhamento($this->criaEncaminhamento($index, $itemSalvo));
        }

        $itemSalvo = $this->itemDePautaRepository->salvar($itemSalvo);

        dump($itemSalvo);
        return $itemSalvo;
    }

    public function encaminharItem(\Entity\ItemDePauta $itemDePauta)
    {
        $version = new \ElephantIO\Engine\SocketIO\Version1X("http://localhost:3001");

        $client = new \ElephantIO\Client($version);
        $client->initialize();
        $client->emit($this->serializaItem($itemDePauta));
        $client->close();
    }

    private function serializaItem(\Entity\ItemDePauta $itemDePauta)
    {
        $normalizer = new \Symfony\Component\Serializer\Normalizer\ObjectNormalizer();
        $normalizer->setCircularReferenceLimit(1);
        $normalizer->setIgnoredAttributes(array("primeiroTurno", "segundoTurno", "reuniao", "temSegundoTurno"));
        $normalizer->setCircularReferenceHandler(function ($object) {
            return $object->getId();
        });

        $encoders = array(new \Symfony\Component\Serializer\Encoder\JsonEncoder());

        $normalizers = array($normalizer);

        $serializer = new \Symfony\Component\Serializer\Serializer($normalizers, $encoders);

        $jsonContent = $serializer->serialize($itemDePauta, 'json');

        return $jsonContent;
    }

    public function envia()
    {
        $data = [
            "nome" => $this->input->post('nome'),
            "descricao" => $this->input->post('descricao'),
        ];

        $version = new \ElephantIO\Engine\SocketIO\Version2X("http://localhost:3001");

        $client = new \ElephantIO\Client($version);
        $client->initialize();
        $client->emit('encaminhamento', $data);
        $client->close();

        redirect('/encaminhar');
    }

}
