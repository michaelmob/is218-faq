<?php

namespace Tests\Unit;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class QuestionTest extends TestCase
{
    /**
     * Test if question is created.
     *
     * @return void
     */
    public function testQuestionCreation()
    {
        $user = factory(\App\User::class)->create();

        $question = factory(\App\Question::class)->make();
        $question->user()->associate($user);
        $questionCreated = $question->save();

        $this->assertTrue($questionCreated);
    }
}
