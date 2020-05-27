@extends('layouts.app')

@section('content')

<!-- ここにページ毎のコンテンツを書く -->
    <h1 class="text-center">プロフィール新規作成</h1></br>

    <div class="row text-center">
        <div class="col-12">
            {!! Form::model($user, ['route' => 'profiles.store']) !!}
                <div class="form-group text-center">
                    <h3>{!! Form::label('profile', 'プロフィール') !!}</h3>
                    {!! Form::textarea('profile', null, ['class' => 'form-control']) !!}
                </div>
                
            {{ Form::button('<i class="fas fa-coffee"></i>', ['type' => 'submit','class' => 'btn btn-success btn-lg center' ] )  }}
        
            {!! Form::close() !!}
        </div>
    </div>
@endsection
