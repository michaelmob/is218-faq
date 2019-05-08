@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row ">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Question</div>
                <div class="card-body">
                    {{ $question->body }}
                </div>
                <div class="card-footer">
                    <a class="btn btn-primary float-right" href="{{ route('questions.edit', [ 'id'=> $question->id ]) }}">
                       Edit This Question
                    </a>
                    {{ Form::open(['method' => 'DELETE', 'route' => [ 'questions.destroy', $question->id ]]) }}
                    <button class="btn btn-danger float-right mr-2" type="submit">
                        Delete
                    </button>
                    {!! Form::close() !!}
                    <span>
                        by
                        <a href="{{ route('profiles.show', [ 'id' => $question->user->id ]) }}">
                            {{ $question->user->name }}
                        </a>
                    </span>
                </div>
            </div>
        </div>

        <div class="col-md-4">
            <p>
                <a class="btn btn-primary" style="width:100%" href="{{ route('answers.create', [ 'question_id'=> $question->id ]) }}">
                    Answer This Question
                </a>
            </p>

            @forelse ($question->answers as $answer)
                <div class="card mb-3">
                    <div class="card-body">{{ $answer->body }}</div>
                    <div class="card-footer">
                        <span>
                            by
                            <a href="{{ route('profiles.show', [ 'id' => $answer->user->id ]) }}">
                                {{ $answer->user->name }}
                            </a>
                        </span>
                        <a class="btn btn-primary float-right" href="{{ route('answers.show', [ 'answer_id' => $answer->id ]) }}">
                            View
                        </a>
                        <a class="btn btn-primary float-right mr-2" href="{{ route('answers.clap', [ 'answer_id' => $answer->id ]) }}">
                            👏{{ $answer->claps }}
                        </a>
                    </div>
                </div>
            @empty
                <div class="card">
                    <div class="card-body">No answers... yet!</div>
                </div>
            @endforelse
        </div>
    </div>
</div>
@endsection
