@extends('layouts.app')

@section('content')

<!-- ここにページ毎のコンテンツを書く -->
   <h1 class="text-center">コーヒーの情報を投稿する</h1>

    @if (Auth::id() == $user->id)
    <div class="row">
    {!! Form::open(['route' => 'coffee_posts.store']) !!}
        <div class="offset-sm-2 col-sm-8 form-group row alert alert-dark" role="alert">
            <p>コーヒー名</p>
            {!! Form::text('coffee_name', old('coffee_name'), ['class' => 'form-control', 'rows' => '2']) !!}
            <p>購入店舗</p>
            {!! Form::text('purchase_store', old('purchase_store'), ['class' => 'form-control', 'rows' => '2']) !!}
            <p>焙煎度</p>
            {!! Form::text('roast', old('roast'), ['class' => 'form-control', 'rows' => '2']) !!}
            <p>抽出方法</p>
            {!! Form::text('brew', old('brew'), ['class' => 'form-control', 'rows' => '2']) !!}
            <p>評価(1~5)</p>
            {!! Form::text('score', old('score'), ['class' => 'form-control', 'rows' => '2']) !!}
            <p>コメント</p>
            {!! Form::textarea('comment', old('comment'), ['class' => 'form-control', 'rows' => '2']) !!}
        </div>
    <div class="col-12 text-center">{!! Form::submit('投稿する', ['class' => 'btn btn-lg btn-success']) !!}</div>
    {!! Form::close() !!}
    </div>
    @endif
    
@endsection