@extends('layouts.app')

@section('content')
    @if (Auth::check())
    <div class="row">
            <aside class="col-sm-4">
                @include('users.card', ['user' => Auth::user()])
                @if ($user->profiles()->exists())
                <div class="mb-0">自己紹介：{{ $user->profiles->profile }}</div>
                @endif
                @if (Auth::id() == $user->id)
                <p>{!! link_to_route('profiles.create', "自己紹介を更新", ['id' => Auth::id()], ['class' => 'btn btn-success btn-sm']) !!}</p>
                @endif
            </aside>
            <div class="col-sm-8">
                @if (count($coffee_posts) > 0)
                <h2 class="text-center alert alert-success text-dark round" role="alert">タイムライン</h2>
                <div class="rounded" role="alert">@include('coffee_posts.coffee_posts', ['coffee_posts' => $coffee_posts])</div>
                @endif
            </div>
        </div>
    @else
    <div class="center jumbotron">
        <div class="text-center">
            <h1>一緒に楽しいコーヒーライフを！</h1>
            <h4>飲んだコーヒー豆の情報を記録・共有するサイトです。</h4><br>
            {!! link_to_route('signup.get', '会員登録', [], ['class' => 'btn btn-lg btn-success']) !!}
        </div>
    </div>
    @endif
@endsection