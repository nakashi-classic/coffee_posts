@extends('layouts.app')

@section('content')
@if (Auth::id() == $user->id)
<div class="center"><h1>自己紹介の編集</h1></div>
@endif
@endsection