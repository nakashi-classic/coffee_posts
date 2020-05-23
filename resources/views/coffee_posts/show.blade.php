@extends('layouts.app')

@section('content')

<!-- ここにページ毎のコンテンツを書く -->
    <h1>投稿したコーヒーの詳細</h1>

    <table class="table table-bordered">
        <tr>
            <th>コーヒー名</th>
            <td>{{ $coffee_post->coffee_name }}</td>
        </tr>
        <tr>
            <th>購入店舗</th>
            <td>{{ $coffee_post->purchase_store }}</td>
        </tr>
        <tr>
            <th>焙煎度</th>
            <td>{{ $coffee_post->roast }}</td>
        </tr>
        <tr>
            <th>抽出方法</th>
            <td>{{ $coffee_post->brew }}</td>
        </tr>
        <tr>
            <th>評価</th>
            <td>{{ $coffee_post->score }}</td>
        </tr>
        <tr>
            <th>コメント</th>
            <td>{{ $coffee_post->comment }}</td>
        </tr>
    </table>
    
    {!! link_to_route('coffee_posts.edit', 'このコーヒーを編集', ['id' => $coffee_post->id], ['class' => 'btn btn-light']) !!}
    
    {!! Form::open(['route' => ['coffee_posts.destroy', $coffee_post->id], 'method' => 'delete']) !!}
            {!! Form::submit('削除', ['class' => 'btn btn-danger btn-sm']) !!}
    {!! Form::close() !!}
    
@endsection
