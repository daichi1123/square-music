@if(Auth::check())

    @if (Auth::id() != $user->id)

        @if ($song)
            @if (Auth::user()->is_favorite($song->id))

                {!! Form::open(['route' => ['favorites.unfavorite', $song->id], 'method' => 'delete', 'style' => 'display: inline-flex;']) !!}
                    {!! Form::button('<i class="fas fa-heart unfav"></i>', ["class" => 'unfav-button', 'type' => 'submit']) !!}
                {!! Form::close() !!}

            @else

                {!! Form::open(['route' => ['favorites.favorite', $song->id], 'method' => 'post', 'style' => 'display: inline-flex']) !!}
                    {!! Form::button('<i class="far fa-heart fav"></i>', ['class' => 'fav-button', 'type' => 'submit']) !!}
                {!! Form::close() !!}

            @endif
        @endif

    @endif

@endif
