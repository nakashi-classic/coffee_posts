@extends('layouts.app')

@section('content')

<!-- ここにページ毎のコンテンツを書く -->
    <h1>プロフィール新規作成</h1>

    <div class="row">
        <div class="col-6">
            {!! Form::model($user, ['route' => 'profiles.store']) !!}
                <div class="form-group">
                    {!! Form::label('profile', 'プロフィール') !!}
                    {!! Form::text('profile', null, ['class' => 'form-control']) !!}
                </div>
                
            <!--{!! Form::submit('追加', ['class' => 'btn btn-primary']) !!}-->
        
            {!! Form::close() !!}
        </div>
    </div>
@endsection
