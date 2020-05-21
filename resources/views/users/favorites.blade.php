@extends('layouts.app')

@section('content')
    <div class="row">
        <div class="col-sm-12">
            @include('users.navtabs', ['user' => $user])
            @if (count($favorites) > 0)
                @include('coffee_posts.coffee_posts', ['coffee_posts' => $favorites])
            @endif
        </div>
    </div>
@endsection