<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class TestEncaminhamentos extends \CI_Controller
{

    // variável fixa, para testar operações de get, insert e etc...
    private $tamanho_banco;
    // variáveis comuns para todas as operações com banco de dados
    private $credo;
    private $encaminhamentoRepository;
    private $itemDePautaRepository;

    /**
     * TestEncaminhamento constructor.
     * Deve-se atentar a chamada do repositório,
     * Chamada da database,
     * e atribuição de valores as variáveis credo e repository,
     * pois estas acontecem em toda operação de banco de dados
     */
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
     * Chamando todos os testes em uma única view
     */
    public function index()
    {
//        $this->get_all();
        //$this->get_item_pauta();
//        $this->set_encaminhamento();
        //$this->deleta_item_pauta();
        $this->criaIDP();
    }

    /**
     * Testes para pegar todos os itens de pauta salvos no banco,
     * e comparar com o tamanho pre-definido do array
     */
    public function get_all()
    {
        $test_name = "Get all Encaminhamentos";
        $enc = $this->encaminhamentoRepository->findAll();
        $this->tamanho_banco = sizeof($enc);
        $expected_result = $this->tamanho_banco >= 0;
        echo $this->unit->run($this->tamanho_banco, $expected_result, $test_name);
    }

    /**
     * Dá get no item de pauta 5 e avalia se os dados obtidos
     * conferem com os que estão no banco
     */
    //public function get_item_pauta()
//    {
//        $test_name = "Get item de pauta 5";
    //      $IDP = $this->repository->find(5);
//        $test = $IDP->getRelator();
//        $expected_result = "Mauricio El Uri";
//        echo $this->unit->run($test, $expected_result, $test_name);
//    }


    public function set_encaminhamento()
    {
        $test_name = "Salvar encaminhamento";

        $IDP = new Entity\ItemDePauta();
        $IDP = $this->encaminhamentoRepository->find(5);

        $encaminhamento = $this->criaEncaminhamento($IDP);

        // Salvando encaminhamento
        $em = $this->doctrine->em;

        $em->persist($encaminhamento);
        $em->flush();

        // Verificando se foi salvo no bd
        $encaminhamentos = $this->encaminhamentoRepository->findAll();
        $test = sizeof($encaminhamentos);

        // Tamanho do banco deve ser igual ao original + 1
        $expected_result = $this->tamanho_banco+1;
        echo $this->unit->run($test, $expected_result, $test_name);
    }


    /**
     * Não está funcionando
     **/

    //  public function deleta_item_pauta(){
//        $test_name = "Deletar item de pauta";
//
//        $IDP = $this->repository->find(10);

//        echo $IDP->getDescricao();

//        $em = $this->doctrine->em;
//        $IDP = $em->detach($IDP);
    //      $em->remove($IDP);
//        $em->flush();

    // Verificando se foi removido do bd
    //      $test = $this->repository->find(10);

//        var_dump($test);

    //      $expected_result = false;
//        echo $this->unit->run($test, $expected_result, $test_name);
    //  }

    private function criaEncaminhamento($nome, $item)
    {
        $encaminhamento = new Entity\Encaminhamento();
        $encaminhamento->setDescricao("À favor - " . $nome);
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
