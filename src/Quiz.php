<?php

namespace Soufraz;

use Soufraz\Session\SessionService;

class Quiz
{

    public function create($data)
    {
        SessionService::set('quiz', $data);
    }

    public function addQuestions($questions)
    {
        $quiz = SessionService::get('quiz');
        $quiz['questions'] = $questions;

        SessionService::set('quiz', $quiz);
    }

    public function get()
    {
        return SessionService::get('quiz');
    }

}

