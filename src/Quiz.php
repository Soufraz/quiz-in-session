<?php

namespace Soufraz;

use Soufraz\Session\SessionService;

class Quiz
{

    public function create($data)
    {
        SessionService::set('quiz', $data);
    }

    public function get()
    {
        return SessionService::get('quiz');
    }

}

