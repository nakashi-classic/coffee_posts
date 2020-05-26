@extends('layouts.app')

@section('content')
    <div class="row">
        <aside class="col-sm-4">
            @include('users.card', ['user' => $user])
            <div class="mb-0">自己紹介：{!! nl2br(e($user->profile_content)) !!}</div>
            @if (Auth::id() == $user->id)
            <p>{!! link_to_route('profiles.create', "自己紹介を追加", ['id' => Auth::id()], ['class' => 'btn btn-sm btn-primary']) !!}</p>
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