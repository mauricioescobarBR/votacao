<?php

defined('BASEPATH') OR exit('No direct script access allowed');


include APPPATH . 'controllers\EncaminhamentoEvent.php';

use Doctrine\Common\Collections\ArrayCollection;
use Sse\SSE;

class ReuniaoSSEResource
{

    private $reunioes;

    private function __construct()
    {
        $this->reunioes = new ArrayCollection();
    }

    private function __clone()
    {
    }

    private function __wakeup()
    {
    }

    public function conecta()
    {
        // Create the SSE handler
        $sse = new SSE();
        // You can limit how long the SSE handler to save resources
        $sse->exec_limit = 20;
        // Add the event handler to the SSE handler
        $sse->addEventListener('encaminhamento', new EncaminhamentoEvent());

        $this->reunioes->add($sse);

        $response = $sse->createResponse();
        $response->send();

//        if ($sse->get('is_reconnect') == false)
//        {
//            dump($sse->get('is_reconnect'));
//        }
    }

    public static function getInstance()
    {
        static $instance = null;
        if (null === $instance) {
            $instance = new static();
        }

        return $instance;
    }

}