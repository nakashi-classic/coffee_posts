@extends('layouts.app')

@section('content')
    <div class="row">
        <div class="col-sm-12">
            @include('users.navtabs', ['user' => $user])
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