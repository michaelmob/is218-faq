@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    @if ($edit)
                        Edit Question
                    @else
                        Create Question
                    @endif
                </div>
                <div class="card-body">
                    @if ($edit)
                        {!! Form::model($question, ['route' => ['questions.update', $question->id], 'method' => 'patch']) !!}
                    @else()
                        {!! Form::model($question, ['action' => 'QuestionController@store']) !!}
                    @endif
                    <div class="form-group">
                        {!! Form::label('body', 'Body') !!}
                        {!! Form::text('body', $question->body, ['class' => 'form-control','required' => 'required']) !!}
                    </div>
                    <button class="btn btn-primary float-right" type="submit">Submit</button>
                    {!! Form::close() !!}
                </div>

            </div>
        </div>
    </div>
</div>
@endsection
