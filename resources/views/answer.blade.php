@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">Answer</div>
                <div class="card-body">
                    {{ $answer->body }}
                </div>
                <div class="card-footer">
                    {!! Form::open(['method' => 'DELETE', 'route' => ['answers.destroy', $answer->id]]) !!}
                    <button class="btn btn-danger float-right" type="submit">
                        Delete
                    </button>
                    {!! Form::close() !!}
                    <a class="btn btn-primary float-right mr-2" href="{{ route('answers.edit', [ 'answer_id'=> $answer->id ]) }}">
                        Edit This Answer
                    </a>
                    <a class="btn btn-primary float-right mr-2" href="{{ route('answers.clap', [ 'answer_id' => $answer->id ]) }}">
                        👏{{ $answer->claps }}
                    </a>
                    <a class="btn float-right mr-2" href="{{ route('questions.show', [ 'answer_id'=> $answer->question ]) }}">
                        Go To Question
                    </a>
                </div>
            </div>

        </div>
    </div>
</div>
@endsection
