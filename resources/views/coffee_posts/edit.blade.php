@extends('layouts.app')

@section('content')

<!-- ここにページ毎のコンテンツを書く -->
    <h1>id: {{ $coffee_posts->id }} のタスク編集ページ</h1>

    <div class="row">
        <div class="col-6">
            {!! Form::model($coffee_post, ['route' => ['coffee_posts.update', $coffee_post->id], 'method' => 'put']) !!}
                <div class="form-group">
                    {!! Form::label('coffee_name', 'コーヒー名') !!}
                    {!! Form::text('coffee_name', null, ['class' => 'form-control']) !!}
                </div>
                <div class="form-group">
                    {!! Form::label('purchase_store', '購入店舗') !!}
                    {!! Form::text('purchase_store', null, ['class' => 'form-control']) !!}
                </div>
                <div class="form-group">
                    {!! Form::label('roast', '焙煎度') !!}
                    {!! Form::text('roast', null, ['class' => 'form-control']) !!}
                </div>
                <div class="form-group">
                    {!! Form::label('brew', '抽出方法') !!}
                    {!! Form::text('brew', null, ['class' => 'form-control']) !!}
                </div>
                <div class="form-group">
                    {!! Form::label('score', '評価') !!}
                    {!! Form::text('score', null, ['class' => 'form-control']) !!}
                </div>
                <div class="form-group">
                    {!! Form::label('comment', 'コメント') !!}
                    {!! Form::text('comment', null, ['class' => 'form-control']) !!}
                </div>
        
            {!! Form::submit('更新', ['class' => 'btn btn-primary']) !!}
        
        </div>
    </div>
    
@endsection
