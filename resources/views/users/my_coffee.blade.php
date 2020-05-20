@extends('layouts.app')

@section('content')
    <div class="row">
        <div class="col-sm-12">
            @include('users.navtabs', ['user' => $user])
            @if (Auth::id() == $user->id)
                @if (count($coffee_posts) > 0)
                    @include('coffee_posts.coffee_posts', ['coffee_posts' => $coffee_posts])
                @endif
            @endif
        </div>
    </div>
@endsection