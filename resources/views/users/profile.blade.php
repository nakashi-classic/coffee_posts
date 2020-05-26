@extends('layouts.app')

@section('content')
    <div class =" d-flex flex-row">
        <div class="col-sm-4">
        @include("users.card",['user' => $user])
        </div>
        <div class="col-sm-8">
            <h3>プロフィール</h3>
        @if (Auth::id() == $user->id)
           {!! link_to_route('users.profile_edit', 'プロフィールを編集する',['id' => Auth::id()],["class"=>"nav-link btn btn-primary"]) !!}
        @endif
        </div>
    </div><br/>
    
@endsection
