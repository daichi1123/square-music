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
            <div class="card" style="display: flow-root;">
                <div class="card-header">
                    <b>
                    @if(Auth::check())
                        <a href="{{ route('detail.user', $user->id) }}">
                        {{ $user->first_name }}
                        </a>
                    @else
                        {{ $user->first_name }}
                    @endif
                    </b>
                    <span>from</span>
                    <b>{{ $user->country->country_name }}</b>
                    @if($song)
                    <span class="badge badge-pill badge-success">いいね {{ $song->favorite_users->count() }}</span>
                    @else
                    <span class="badge badge-pill badge-danger">未登録</span>
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
                    @if($song)
                        @include('favorite.favorite_button', ['song'=>$song])
                        @if(Auth::check())
                            @if (Auth::id() == $user->id)
                            <span class="pl-1"></span>
                            @endif
                        @endif
                    @else
                        <span class="pl-1"></span>
                    @endif
                    <a href="{{ route('home.chat') }}" style="color:black; font-size: 32px;">
                        <i class="far fa-comment fa-flip-horizontal"></i>
                    </a>
                    @if($user->insta_id)
                        @if(Auth::check())
                            @if (Auth::id() != $user->id)
                            <a class="insta_btn" href="{{ 'https://www.instagram.com/'.$user->insta_id.'/' }}" target="_blank">
                                <span class="insta">
                                    <i class="fab fa-instagram"></i>
                                </span> 
                            </a>
                            @endif
                        @endif
                    @else
                        <span class="pl-1"></span>
                    @endif
                    @include('follow.follow_button', ['user'=>$user])
                @endif
                </div>
                @if(isset($song->comment))
                <div class="card-text py-1">
                    &nbsp;{{ $song->comment }}
                </div>
                @else
                <div class="card-text py-1">
                    ※コメント登録されてません
                </div>
                @endif
            </div>
        </div>
    @endforeach
</div>
<div class="pt-2">
    {{ $users->links('pagination::bootstrap-4') }}
</div>
