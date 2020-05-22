@if (Auth::user()->is_favoriting($coffee_post->id))
    {!! Form::open(['route' => ['favorites.unfavorite', $coffee_post->id], 'method' => 'delete']) !!}
        {!! Form::submit('お気に入り中', ['class' => "btn btn-warning btn-sm"]) !!}
    {!! Form::close() !!}
@else
    {!! Form::open(['route' => ['favorites.favorite', $coffee_post->id]]) !!}
        {!! Form::submit('お気に入り', ['class' => "btn btn-success btn-sm"]) !!}
    {!! Form::close() !!}
@endif
