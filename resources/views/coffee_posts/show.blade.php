@extends('layouts.app')

@section('content')

<!-- ここにページ毎のコンテンツを書く -->
    <h1 class="text-center">投稿したコーヒーの詳細</h1>

    <table class="table table-hover">
        <tr class="table-success">
            <td>コーヒー名</td>
            <td>{{ $coffee_post->coffee_name }}</td>
        </tr>
        <tr>
            <td>購入店舗</td>
            <td>{{ $coffee_post->purchase_store }}</td>
        </tr>
        <tr class="table-success">
            <td>焙煎度</td>
            <td>{{ $coffee_post->roast }}</td>
        </tr>
        <tr>
            <td>抽出方法</td>
            <td>{{ $coffee_post->brew }}</td>
        </tr>
        <tr class="table-success">
            <td>評価(1~5)</td>
            <td>{{ $coffee_post->score }}</td>
        </tr>
        <tr>
            <td>コメント</td>
            <td>{{ $coffee_post->comment }}</td>
        </tr>
    </table>
     @if (Auth::id() == $coffee_post->user_id)
    {!! link_to_route('coffee_posts.edit', 'このコーヒーを編集', ['id' => $coffee_post->id], ['class' => 'btn btn-success']) !!}
    
    {!! Form::open(['route' => ['coffee_posts.destroy', $coffee_post->id], 'method' => 'delete']) !!}
             {{ Form::button('<i class="fas fa-trash-alt"></i>', ['type' => 'submit','class' => 'btn btn-danger btn-sm' ] )  }}
    {!! Form::close() !!}
    @endif
@endsection
