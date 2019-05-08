@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row ">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">{{ $profile->user->name }}'s Profile</div>

                <div class="card-body ">
                    <span class="font-weight-bold">First Name:</span> {{ $profile->fname }}</br>
                    <span class="font-weight-bold">Last Name: </span>{{ $profile->lname }}</br>
                    <span class="font-weight-bold">Body: </span>{{ $profile->body }}</br>
                </div>
                <div class="card-footer">
                </div>

            </div>
        </div>
    </div>
</div>
@endsection
