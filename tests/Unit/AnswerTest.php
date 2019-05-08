<?php

namespace Tests\Unit;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class AnswerTest extends TestCase
{
    use RefreshDatabase;

    /**
     * A basic unit test example.
     *
     * @return void
     */
    public function testAnswerCreation()
    {
        $user = factory(\App\User::class)->create();

        $question = factory(\App\Question::class)->make();
        $question->user()->associate($user);
        $question->save();

        $answer = factory(\App\Answer::class)->make();
        $answer->user()->associate($user);
        $answer->question()->associate($question);
        $answerCreated = $answer->save();

        $this->assertTrue($answerCreated);
    }
}
