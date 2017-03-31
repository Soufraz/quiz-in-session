<?php

namespace Soufraz\Tests;

use Soufraz\Quiz;
use Soufraz\Session\MemorySessionAdapter;
use Soufraz\Session\SessionService;

SessionService::init(new MemorySessionAdapter());

class QuizTest extends \PHPUnit_Framework_TestCase
{

    public $quiz;

    protected function setUp() {
        $this->quiz = new Quiz();
    }

    public function testCreateQuiz()
    {
        $data = [
            'title' => 'The first quiz of all'
        ];
        $this->quiz->create($data);

        $this->assertNotEmpty($this->quiz->get());
    }

    public function testAddQuestionsToQuiz()
    {
        $data = [
            [
                'id' => 10,
                'title' => 'How many continents are there on earth?'
            ],
            [
                'id' => 20,
                'title' => 'When was php released?'
            ],
            [
                'id' => 30,
                'title' => 'Bill Gates really stolen a Steve Jobs idea?'
            ]
        ];

        $this->quiz->addQuestions($data);

        $quiz = $this->quiz->get();
        $this->assertNotEmpty($quiz['questions']);
    }

    public function testAddAlternativesToQuestions()
    {

        // Mocking a question
        $data = [
            'question_id' => 10,
            'alternatives' => [
                'five',
                'six',
                'seven',
            ]
        ];

        $this->quiz->addAlternativesToQuestion($data['question_id'], $data);

        // Mocking another question
        $data = [
            'question_id' => 20,
            'alternatives' => [
                '1993',
                '1994',
                '1995',
            ]
        ];

        $this->quiz->addAlternativesToQuestion($data['question_id'], $data);

        // Mocking one more question
        $data = [
            'question_id' => 30,
            'alternatives' => [
                'no',
                'yes',
                'i don\'t know',
                'they both became rich.. so i don\'t care',
            ]
        ];

        $this->quiz->addAlternativesToQuestion($data['question_id'], $data);

        $quiz = $this->quiz->get();
        $totalQuestions = count($quiz['questions']);
        $this->assertEquals($totalQuestions, 3);
        
    }

    public function testGetQuiz()
    {
        $this->assertNotEmpty($this->quiz->get());
    }
}
