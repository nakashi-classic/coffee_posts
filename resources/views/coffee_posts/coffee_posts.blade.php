<ul class="list-unstyled">
    @foreach ($coffee_posts as $coffee_post)
        <li class="media mb-3">
            <img class="mr-2 rounded" src="{{ Gravatar::src($coffee_post->user->email, 50) }}" alt="">
            <div class="media-body">
                <div>
                    {!! link_to_route('users.show', $coffee_post->user->name, ['id' => $coffee_post->user->id]) !!} <span class="text-muted">posted at {{ $coffee_post->created_at }}</span>
                </div>
                <div>
                    <p class="mb-0">{!! nl2br(e($coffee_post->coffee_name)) !!}</p>
                    <p class="mb-0">{!! nl2br(e($coffee_post->brew)) !!}</p>
                    <p class="mb-0">{!! nl2br(e($coffee_post->score)) !!}</p>
                </div>
                <div>
                    @include('favorites.favorite_button', ['coffee_posts' => $coffee_posts])
                    @if (Auth::id() == $coffee_post->user_id)
                        {!! Form::open(['route' => ['coffee_posts.destroy', $coffee_post->id], 'method' => 'delete']) !!}
                            {!! Form::submit('Delete', ['class' => 'btn btn-danger btn-sm']) !!}
                        {!! Form::close() !!}
                    @endif
                </div>
            </div>
        </li>
    @endforeach
</ul>
{{ $coffee_posts->links('pagination::bootstrap-4') }}