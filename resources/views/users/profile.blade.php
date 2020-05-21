@extends('layouts.app')

@section('content')
    <div class =" d-flex flex-row">
        <div class="col-sm-4">
        @include("users.card",['user' => $user])
        </div>
        <div class="col-sm-8">
            <h3>プロフィール</h3>
        @if (Auth::id() == $user->id)
           {!! link_to_route('signup.get', 'プロフィールを編集する', [], ['class' => 'btn btn-lg btn-primary']) !!}
        @endif
        </div>
    </div><br/>
    <div class = "offset-1 col-10 justify-content-center alert alert-warning">
        <div class="text-center"><h3>コーヒーを記録する</h3></div>
        <div class="offset-3">
    @if (Auth::id() == $user->id)
        @if (count($coffee_posts) > 0)
        @include('coffee_posts.coffee_posts', ['coffee_posts' => $coffee_posts])
        @endif
    @endif
        </div>
    </div>

@endsection
