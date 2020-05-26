@extends('layouts.app')

@section('content')
    @if (Auth::check())
    <div class="row">
            <aside class="col-sm-4">
                @include('users.card', ['user' => Auth::user()])
            </aside>
            <div class="col-sm-8">
                @if (count($coffee_posts) > 0)
                <h2 class="text-center alert alert-dark" role="alert"k text-white rounded">タイムライン</h2>
                    @include('coffee_posts.coffee_posts', ['coffee_posts' => $coffee_posts])
                @endif
            </div>
        </div>
    @else
    <div class="center jumbotron">
        <div class="text-center">
            <h1>一緒に楽しいコーヒーライフを！</h1>
            <h3>飲んだコーヒー豆の情報を記録・共有するサイトです。</h3><br>
            {!! link_to_route('signup.get', '会員登録', [], ['class' => 'btn btn-lg btn-primary']) !!}
        </div>
    </div>
    @endif
@endsection