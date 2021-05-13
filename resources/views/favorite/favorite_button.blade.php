@if(Auth::check())

    @if (Auth::id() != $user->id)

        @if ($song)
            @if (Auth::user()->is_favorite($song->id))

                {!! Form::open(['route' => ['favorites.unfavorite', $song->id], 'method' => 'delete']) !!}
                    {!! Form::button('<i class="fas fa-heart unfav"></i>', ["class" => 'unfav-button', 'type' => 'submit']) !!}
                {!! Form::close() !!}

            @else

                {!! Form::open(['route' => ['favorites.favorite', $song->id]]) !!}
                    {!! Form::button('<i class="far fa-heart fav"></i>', ['class' => 'fav-button', 'type' => 'submit']) !!}
                {!! Form::close() !!}

            @endif
        @endif

    @endif

@endif

<style>
    .unfav-button {
        /* border-radius:30px; */
        background-color: transparent;
        border: none;
        cursor: pointer;
        outline: none;
        padding: 0;
        appearance: none;
    }
    .fav {
        color: #262626;
    }
    .unfav {
        color: #ff3366;
    }
    .fa-heart{
        font-size: 32px;
    }
    .fav-button {
        /* border-radius:30px; */
        background-color: transparent;
        border: none;
        cursor: pointer;
        outline: none;
        padding-top: 0px;
        appearance: none;
    }
</style>