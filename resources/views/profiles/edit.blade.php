@extends('layouts.app')

@section('content')
@if (Auth::id() == $user->id)
<h1>プロフィール新規作成</h1>
    <div class="row">
        <div class="col-6">
            {!! Form::model($profile, ['route' => ['profiles.update', $user->id], 'method' => 'put']) !!}
                 <div class="form-group">
                    {!! Form::label('profile_content', 'プロフィール') !!}
                    {!! Form::text('status', null, ['class' => 'form-control']) !!}
                </div>
                
                {!! Form::submit('追加', ['class' => 'btn btn-primary']) !!}
        
            {!! Form::close() !!}
        </div>
    </div>
@endif
@endsection