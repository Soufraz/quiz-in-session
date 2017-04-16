<?php

namespace Soufraz;

use Soufraz\Session\SessionService;

class Quiz
{

    /**
     * Quiz methods
     * ===========================================
     */
    public function create($data)
    {
        SessionService::set('quiz', $data);
    }

    public function get()
    {
        return SessionService::get('quiz');
    }

    /**
     * Alternatives methods
     * ===========================================
     */
    public function addAlternativesToQuestion($questionId, $alternatives)
    {
        $index = $this->getQuestionIndexById($questionId);

        $questions = $this->getQuestions();
        $questions[$index]['alternatives'] = $alternatives['alternatives'];

        $quiz['questions'] = $questions;

        SessionService::set('quiz', $quiz);
    }

    /**
     * Questions methods
     * ===========================================
     */
    public function addQuestions($questions)
    {
        $quiz = SessionService::get('quiz');
        $quiz['questions'] = $questions;

        SessionService::set('quiz', $quiz);
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
        $key = $this->getQuestionIndexById($questionId);

        return $questions[$key];
    }
    
    public function getQuestionIndexById($questionId)
    {
        $questions = $this->getQuestions();
        return array_search($questionId, array_column($questions, 'id'), false);
    }

    /**
     * Game methods
     * ===========================================
     */
    public function nextQuestion()
    {
        $questions = $this->getQuestions();
        foreach ($questions as $question) {
            if (!isset($question['answer'])) {
                return $question;
            }
        }

        return false;
    }
}
