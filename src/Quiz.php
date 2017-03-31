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

    public function addAlternativesToQuestion($questionId, $alternatives)
    {
        $key = $this->getKeyByQuestionId($questionId);

        $questions = $this->getQuestions();
        $questions[$key]['alternatives'] = $alternatives['alternatives'];

        $quiz['questions'] = $questions;

        SessionService::set('quiz', $quiz);
    }

    public function get()
    {
        return SessionService::get('quiz');
    }

    public function getQuestions()
    {
        $quiz = SessionService::get('quiz');
        return $quiz['questions'];
    }

    public function getCountQuestions()
    {
        $questions = $this->getQuestions();
        return count($questions);
    }

    public function getQuestionById($questionId)
    {
        $questions = $this->getQuestions();
        $key = $this->getKeyByQuestionId($questionId);

        return $questions[$key];
    }
    
    public function getKeyByQuestionId($questionId)
    {
        $questions = $this->getQuestions();
        return array_search($questionId, array_column($questions, 'id'), false);
    }
}
