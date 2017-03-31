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

    public function addAlternativesToQuestion($question_id, $alternatives)
    {
        $quiz = SessionService::get('quiz');
        $questions = $quiz['questions'];

        $key = array_search($question_id, array_column($questions, 'id'), false);

        $questions[$key]['alternatives'] = $alternatives['alternatives'];

        $quiz['questions'] = $questions;

        SessionService::set('quiz', $quiz);
    }

    public function get()
    {
        return SessionService::get('quiz');
    }

}

