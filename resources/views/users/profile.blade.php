@extends('layouts.app')

@section('content')
    <aside class="col-sm-4">
        <div class="card">
            <div class="card-header">
                <h3 class="card-title">{{ $user->name }}</h3>
            </div>
            <div class="card-body">
                <img class="rounded img-fluid" src="{{ Gravatar::src($user->email, 500) }}" alt="">
            </div>
        </div>
                @include('user_follow.follow_button', ['user' => $user])
    </aside>
@if (Auth::id() == $user->id)
    @if (count($coffee_posts) > 0)
    @include('coffee_posts.coffee_posts', ['coffee_posts' => $coffee_posts])
    @endif
@endif

@endsection
