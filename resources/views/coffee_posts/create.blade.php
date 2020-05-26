@extends('layouts.app')

@section('content')

<!-- ここにページ毎のコンテンツを書く -->
   <h1>投稿したコーヒーの編集ページ</h1>

    <div class="row">
        <div class="col-6">
            @if (Auth::id() == $user->id)
    {!! Form::open(['route' => 'coffee_posts.store']) !!}
        <div class ="col-sm-12 text-center"><h2>投稿する</h2></div>
        <div class="form-group row alert alert-info" role="alert">
            <p>コーヒー名</p>
            {!! Form::text('coffee_name', old('coffee_name'), ['class' => 'form-control', 'rows' => '2']) !!}
            <p>購入店舗</p>
            {!! Form::text('purchase_store', old('purchase_store'), ['class' => 'form-control', 'rows' => '2']) !!}
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