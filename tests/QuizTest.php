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

    public function testGetAllQuizzes()
    {
        $this->assertNotEmpty($this->quiz->get());
    }
}
