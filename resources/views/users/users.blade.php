@if (session('flash_message'))
    <div class="alert alert-success">
        {{ session('flash_message') }}
    </div>
@endif

<h1 class="mt-4">Users</h1>

<div class="row mt-5">
    @foreach ($users as $key => $user)
        @php
            $song=$user->songs->last();
        @endphp

        @if($loop->iteration % 3 == 1 && $loop->iteration != 1)
</div>
<div class="row py-3 pb-1">
        @endif
        <div class="col-lg-4">
            <div class="card border">
                <div class="card-header">
                    @if($user->profile_image)
                    <a href="{{ route('users.detail', $user->id) }}">
                        <img 
                            class="profile_image icon_image"
                            src="{{ Storage::url($user->profile_image) }}"
                            alt=""
                        />
                    </a>
                    @else
                    <a class="mb-5" href="{{ route('users.detail', $user->id) }}" style="font-size: 30px;">
                        <i class="fas fa-user-circle"></i>
                    </a>
                    @endif
                    <b>
                    @if(Auth::check())
                        <a href="{{ route('users.detail', $user->id) }}">
                        {{ $user->first_name }}
                        </a>
                    @else
                        {{ $user->first_name }}
                    @endif
                    </b>
                    <span>from</span>
                    <b>{{ $user->country->country_name }}</b>
                    @if( Auth::id() !== $user->id && Auth::check())
                    <follow-button
                        style="display: inline-block;"
                        :initial-is-followed-by='@json($user->isFollowedBy(Auth::user()))'
                        :authorized='@json(Auth::check())'
                        endpoint="{{ route('users.follow', ['id' => $user->id]) }}"
                    >
                    </follow-button>
                    @endif
                </div>
                <div class="text-center">
                @if(isset($song))
                <iframe 
                    class="card-img-top"
                    src="{{ 'https://open.spotify.com/embed/playlist/'.$song->url }}?controls=1&loop=1&playlist={{ $song->url }}"
                    width="300" 
                    height="380" 
                    frameborder="0"
                    allowtransparency="true"
                    allow="encrypted-media"
                >
                </iframe>
                @else
                <iframe
                    class="card-img-top"
                    src="https://open.spotify.com/embed/playlist/6UeSakyzhiEt4NB3UAd6NQ"
                    width="300"
                    height="380"
                    frameborder="0"
                    allowtransparency="true"
                    allow="encrypted-media"
                >
                </iframe>
                @endif
                </div>
                <div>
                @if (Auth::user())
                    @if($user->insta_id)
                        @if(Auth::check())
                            @if (Auth::id() != $user->id)
                            <a class="insta_btn ml-1" href="{{ 'https://www.instagram.com/'.$user->insta_id.'/' }}" data-toggle="tooltip" data-placement="top" title="???????????????" target="_blank">
                                <span class="insta">
                                    <i class="fab fa-instagram"></i>
                                </span> 
                            </a>
                            @endif
                        @endif
                    @else
                        <span class="pl-1"></span>
                    @endif
                    <a class="ml-1" href="{{ route('home.chat') }}" data-toggle="tooltip" data-placement="top" title="????????????????????????" style="color:black; font-size: 32px;">
                        <i class="far fa-comment fa-flip-horizontal"></i>
                    </a>
                    @if($song)
                        <song-favorite
                            :initial-is-favorite-by='@json($song->isFavoriteBy(Auth::user()))'
                            :initial-count-favorites='@json($song->count_favorites)'
                            :authorized='@json(Auth::check())'
                            endpoint="{{ route('songs.favorite', ['song' => $song]) }}"
                            style="display: inline-flex;"
                        >
                        </song-favorite>
                        @if(Auth::check())
                            @if (Auth::id() == $user->id)
                            <span class="pl-1"></span>
                            @endif
                        @endif
                    @else
                        <span class="pl-1"></span>
                    @endif
                    <hr class="card-line" />
                @endif
                </div>
                @if(isset($song->comment))
                <div class="card-text py-1">
                    &nbsp;{{ $song->comment }}
                </div>
                @else
                <div class="card-text py-1">
                    ???????????????????????????????????????
                </div>
                @endif
            </div>
        </div>
    @endforeach
</div>
<div class="pt-2">
    {{ $users->links('pagination::bootstrap-4') }}
</div>
