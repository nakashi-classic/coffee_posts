@extends('layouts.app')

@section('content')

<!-- ここにページ毎のコンテンツを書く -->
    <h1 class="text-center">投稿したコーヒーの編集ページ</h1>
            {!! Form::model($coffee_post, ['route' => ['coffee_posts.update', $coffee_post->id], 'method' => 'put']) !!}
        <div class="row center">
            <div class="offset-sm-2 col-sm-8 alert alert-success">
                
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
            </div>
        </div>
    
          <div class="text-center">{{ Form::button('<i class="fas fa-coffee"></i>', ['type' => 'submit','class' => 'btn btn-success btn-lg' ] ) }} </div>  
        
@endsection
