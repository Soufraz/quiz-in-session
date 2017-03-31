<?php

namespace Soufraz\Session;

class MemorySessionAdapter implements SessionAdapter
{
    private $session = array();

    public function get($var)
    {
        return isset($this->session[$var]) ? $this->session[$var] : null;
    }

    public function set($var, $value)
    {
        $this->session[$var] = $value;
    }
}