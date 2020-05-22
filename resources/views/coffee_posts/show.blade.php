@extends('layouts.app')

@section('content')

<!-- ここにページ毎のコンテンツを書く -->
    <h1>id = {{ $coffee_post->id }} のタスク詳細ページ</h1>

    <table class="table table-bordered">
        <tr>
            <th>id</th>
            <td>{{ $coffee_post->id }}</td>
        </tr>
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
    {!! link_to_route('coffee_posts.edit', 'このタスクを編集', ['id' => $coffee_post->id], ['class' => 'btn btn-light']) !!}
    
    {!! Form::model($coffee_post, ['route' => ['coffee_posts.destroy', $coffee_post->id], 'method' => 'delete']) !!}
        {!! Form::submit('削除', ['class' => 'btn btn-danger']) !!}
    {!! Form::close() !!}

@endsection
