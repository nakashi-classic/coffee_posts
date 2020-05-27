@if (Auth::user()->is_favoriting($coffee_post->id))
    {!! Form::open(['route' => ['favorites.unfavorite', $coffee_post->id], 'method' => 'delete']) !!}
        {{ Form::button('<i class="fas fa-star"></i>', ['type' => 'submit','class' => 'btn btn-success btn-sm' ] )  }}
    {!! Form::close() !!}
@else
    {!! Form::open(['route' => ['favorites.favorite', $coffee_post->id]]) !!}
        {{ Form::button('<i class="far fa-star"></i>', ['type' => 'submit','class' => 'btn btn-success btn-sm' ] )  }}
    {!! Form::close() !!}
@endif