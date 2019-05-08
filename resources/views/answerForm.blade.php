@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    @if ($edit)
                        Edit Answer
                    @else
                        Create Answer
                    @endif
                </div>
                <div class="card-body">
                    @if ($edit)
                        {!! Form::model($answer, ['route' => [ 'answers.update', $answer], 'method' => 'PATCH' ]) !!}
                    @else()
                        {!! Form::model($answer, ['route' => [ 'answers.store', $answer], 'method' => 'POST' ]) !!}
                    @endif
                    <div class="form-group">
                        {!! Form::hidden('question_id', request()->input('question_id')) !!}
                        {!! Form::label('body', 'Body') !!}
                        {!! Form::text('body', $answer->body, ['class' => 'form-control','required' => 'required']) !!}
                    </div>
                    <button class="btn btn-success float-right" type="submit">
                        Save
                    </button>
                    {!! Form::close() !!}
                </div>

            </div>
        </div>
    </div>
</div>
@endsection
