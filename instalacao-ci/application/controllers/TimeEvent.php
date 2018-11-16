<?php

use Sse\Event;

class TimeEvent implements Event
{

    public function check()
    {
        // Time always updates, so always return true
        return true;
    }

    public function update()
    {
        // Send formatted time
        return date('l, F jS, Y, h:i:s A');
    }

}