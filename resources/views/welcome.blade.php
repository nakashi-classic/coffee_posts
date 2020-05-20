@extends('layouts.app')

@section('content')
    @if (Auth::check())
    <div class="center jumbotron">
        <div class="text-center">
            <h1>一緒に楽しいコーヒーライフを！</h1>
            <h3>飲んだコーヒー豆の情報を記録・共有するサイトです。</h3><br>
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