@extends('layouts.app')

@section('content')
@if (Auth::id() == $user->id)
<div class="col-12 text-center"><h1>プロフィールの編集</h1></div>
 @if (Auth::id() == $user->id)
    {!! Form::model($user, ['route' => ['users.update', $user->id], 'method' => 'put']) !!}
        <div class ="col-sm-12 text-center"><h2>自己紹介</h2></div>
        <div class="form-group row alert alert-info" role="alert">
            {!! Form::text('profile_content', old('profile_content'), ['class' => 'form-control', 'rows' => '2']) !!}
        </div>
    {!! Form::submit('更新する', ['class' => 'btn btn-primary']) !!}
    @endif
@endif
@endsection