<?php

namespace Soufraz\Session;

interface SessionAdapter
{
    public function get($var);

    public function set($var, $value);
}