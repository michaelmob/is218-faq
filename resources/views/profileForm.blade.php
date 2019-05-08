@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">My Profile</div>
                <div class="card-body">
                    @if ($edit)
                        {!! Form::model($profile, ['route' => [ 'profiles.update', $user->id, $profile->id ], 'method' => 'PATCH']) !!}
                    @else()
                        {!! Form::model($profile, ['route' => [ 'profiles.store', $user->id ], 'method' => 'POST']) !!}
                    @endif
                    <div class="form-group">
                        {!! Form::label('fname', 'First Name') !!}
                        {!! Form::text('fname', $profile->fname, [ 'required' => 'required' ]) !!}
                    </div>
                    <div class="form-group">
                        {!! Form::label('lname', 'Last Name') !!}
                        {!! Form::text('lname', $profile->lname, [ 'required' => 'required' ]) !!}
                    </div>
                    <div class="form-group">
                        {!! Form::label('body', 'Body') !!}
                        {!! Form::text('body', $profile->body, [ 'required' => 'required' ]) !!}
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
