@extends('layouts.app')

@section('content')
    @if (Auth::check())
    <div class="center jumbotron">
        <div class="text-center">
            <h1>一緒に楽しいコーヒーライフを！</h1>
            <h3>飲んだコーヒー豆の情報を記録・共有するサイトです。</h3><br>
        </div>
    </div>
    <div class="container d-flex flex-row justify-content-around">
            <div class="col-md-3 alert alert-warning" role="alert">
                <p>コーヒーの情報を共有することのできるサイトです。</p>
            </div>
            <div class="col-md-3 alert alert-warning" role="alert"><p>いろんな人とコーヒーの情報を共有することができます。</p></div> 
            <div class="col-md-3 alert alert-warning" role="alert"><p>マイページから自分の投稿を確認できます。</p></div>
    </div>
    <div class="container d-flex flex-row justify-content-around">
            <div class="col-md-3 text-center">
                <h5>コンセプト</h5>
            </div>
            <div class="col-md-3 text-center">
                <h5>{!! link_to_route('users.show', '投稿', ['id' => Auth::id()]) !!}</h5>
            </div>
            <div class="col-md-3 text-center">
                <h5>{!! link_to_route('users.profile', 'プロフィール', ['id' => Auth::id()]) !!}</h5>
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