@extends('layouts.app')

@section('content')
    <div class="row">
        <aside class="col-sm-4">
            @include('users.card', ['user' => $user])
            @if ($user->profiles()->exists())
                <div class="mb-0">自己紹介：{{ $user->profiles->profile }}</div>
            @endif
            @if (Auth::id() == $user->id)
            <p>{!! link_to_route('profiles.create', "自己紹介を追加", ['id' => Auth::id()], ['class' => 'btn btn-sm btn-success']) !!}</p>
            @endif
        </aside>
        <div class="col-sm-8">
            @include('users.navtabs', ['user' => $user])
            @if (count($coffee_posts) > 0)
                @include('coffee_posts.coffee_posts', ['coffee_posts' => $coffee_posts])
            @endif
        </div>        
            
    </div>
@endsection