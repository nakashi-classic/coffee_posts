@extends('layouts.app')

@section('content')
    <div class="row">
        <div class="col-sm-12">
            @include('users.navtabs', ['user' => $user])
            @include('users.users', ['users' => $users])
        </div>
    </div>
@endsection