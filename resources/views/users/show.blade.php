@extends('layouts.app')

@section('content')
    <div class="row">
        <aside class="col-sm-4">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">{{ $user->name }}</h3>
                </div>
                <div class="card-body">
                    <img class="rounded img-fluid" src="{{ Gravatar::src($user->email, 500) }}" alt="">
                </div>
            </div>
        </aside>
        <div class="col-sm-8">
            <ul class="nav nav-tabs nav-justified mb-3">
                <li class="nav-item"><a href="#" class="nav-link">TimeLine</a></li>
                <li class="nav-item"><a href="#" class="nav-link">Followings</a></li>
                <li class="nav-item"><a href="#" class="nav-link">Followers</a></li>
                <li class="nav-item"><a href="#" class="nav-link">Favorite</a></li>
                <li class="nav-item"><a href="#" class="nav-link">My coffee</a></li>
            </ul>
            @if (Auth::id() == $user->id)
                @if (count($coffee_posts) > 0)
                    @include('coffee_posts.coffee_posts', ['coffee_posts' => $coffee_posts])
                @endif
                {!! Form::open(['route' => 'coffee_posts.store']) !!}
                    <div class="form-group row">
                        <p>コーヒー名</p>
                        {!! Form::text('coffee_name', old('coffee_name'), ['class' => 'form-control', 'rows' => '2']) !!}
                        <p>購入店舗</p>
                        {!! Form::text('purchase_store', old('coffee_name'), ['class' => 'form-control', 'rows' => '2']) !!}
                        <p>焙煎度</p>
                        {!! Form::text('roast', old('roast'), ['class' => 'form-control', 'rows' => '2']) !!}
                        <p>抽出方法</p>
                        {!! Form::text('brew', old('brew'), ['class' => 'form-control', 'rows' => '2']) !!}
                        <p>評価</p>
                        {!! Form::text('score', old('score'), ['class' => 'form-control', 'rows' => '2']) !!}
                        <p>コメント</p>
                        {!! Form::textarea('comment', old('comment'), ['class' => 'form-control', 'rows' => '2']) !!}
                        {!! Form::submit('投稿する', ['class' => 'btn btn-primary btn-block']) !!}
                    </div>
                {!! Form::close() !!}
            @endif
        </div>
    </div>
@endsection