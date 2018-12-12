<?php

use Sse\Event;

class EncaminhamentoEvent implements Event
{

    private $var;

    public function check()
    {
        $this->var = rand(0, 3);
        if ($this->var == 0)
        {
            return true;
        } else {
            return false;
        }
    }

    public function update()
    {
        // Send formatted time
        return date('l, F jS, Y, h:i:s A') . ' ' . $this->var;
    }

}