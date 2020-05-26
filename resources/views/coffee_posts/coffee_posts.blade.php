<ul class="list-unstyled">
    @foreach ($coffee_posts as $coffee_post)
        <li class="media mb-3">
            <img class="mr-2 rounded" src="{{ Gravatar::src($coffee_post->user->email, 50) }}" alt="">
            <div class="media-body">
                <div>
                    {!! link_to_route('users.show', $coffee_post->user->name, ['id' => $coffee_post->user->id]) !!} <span class="text-muted">posted at {{ $coffee_post->created_at }}</span>
                </div>
                <tbody>
                    <tr>
                    <p>コーヒー名：<td class="mb-0">{!! nl2br(e($coffee_post->coffee_name)) !!}</td></p>
                    <p>焙煎度：<td class="mb-0">{!! nl2br(e($coffee_post->roast)) !!}</td></p>
                    <p>コメント：<td class="mb-0">{!! nl2br(e($coffee_post->comment)) !!}</td></p>
                    </tr>
                </tbody>
                <div class =row d-flex>
                    @include('favorites.favorite_button', ['coffee_posts' => $coffee_posts])
                    @if (Auth::id() == $coffee_post->user_id)
                        {!! Form::open(['route' => ['coffee_posts.destroy', $coffee_post->id], 'method' => 'delete']) !!}
                            {!! Form::submit('削除', ['class' => 'btn btn-danger btn-sm']) !!}
                        {!! Form::close() !!}
                    @endif
                <p>{!! link_to_route('coffee_posts.show', "詳細", ['id' => $coffee_post->id], ['class' => 'btn btn-sm btn-primary']) !!}</p>
                </div>
            </div>
        </li>
    @endforeach
</ul>
{{ $coffee_posts->links('pagination::bootstrap-4') }}