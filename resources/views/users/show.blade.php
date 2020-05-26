@extends('layouts.app')

@section('content')
    <div class="row">
        <aside class="col-sm-4">
            @include('users.card', ['user' => $user])
        </aside>
        <div class="col-sm-8">
            @include('users.navtabs', ['user' => $user])
            @if (count($coffee_posts) > 0)
                @include('coffee_posts.coffee_posts', ['coffee_posts' => $coffee_posts])
            @endif
        </div>        
            
    </div>
@endsection