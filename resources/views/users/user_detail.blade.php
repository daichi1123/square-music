@extends('layouts.app')

@section('content')

<div class="container">
    <div class="row text-center">
        <div class="col-lg-12 mt-2">
            <h1>ユーザー</h1>
        </div>

        <div>
            <div style="float: left;">
                <section class="mt-3 mb-5">
                    <h2>
                        ユーザ名：
                        {{ $user->last_name }}
                        {{ $user->middle_name }} 
                        {{ $user->first_name }}
                        さん
                    </h2>
                </section>
                <section class="text-left">
                    <h2>
                        国名：{{ $user->country->country_name }}
                    </h2>
                    <h2>
                        性別：{{ $user->sex }}
                    </h2>
                    <h2>
                        年齢：{{ $user->age->age_name }}
                    </h2>
                </section>
            </div>
            <div style="float: right;">
                @if($user->profile_image)
                <section class="mb-4 mt-4 mr-5">
                    <img 
                        class="profile_image detail_image"
                        src="{{ Storage::url($user->profile_image) }}"
                        alt=""
                    />
                </section>
                @else
                <section class="mb-3 mr-3">
                    <i class="fas fa-user-circle" style="font-size: 180px;"></i>
                </section>
                @endif

                @if( Auth::id() !== $user->id && Auth::check())
                <section class="mr-5">
                    <follow-button
                        class="follow-detail-page"
                        :initial-is-followed-by='@json($user->isFollowedBy(Auth::user()))'
                        :authorized='@json(Auth::check())'
                        endpoint="{{ route('users.follow', ['id' => $user->id]) }}"
                    >
                    </follow-button>
                </section>
                @endif
                
            </div>
        </div>
    </div>
    <div class="col-lg-12 my-3">
        <div class="card text-center">
            <div class="card-header">
                <h4>
                    <b>自己紹介</b>    
                </h4>
            </div>
            <div class="card-body">
                <h4 class="card-title">
                    {{$user->self_introduction}}
                </h4>
            </div>
        </div>
    </div>
    <div class="col-6">
        @if($user->insta_id)
        <a class="insta_btn2" href="{{ 'https://www.instagram.com/'.$user->insta_id.'/' }}" target="_blank">
            <i class="fab fa-instagram"></i>&nbsp;<span>アプリへ</span>
        </a>
        @else
        <span class="pl-1"></span>
        @endif

        <a class="chat_btn" href="{{ route('home.chat') }}">
            <i class="far fa-comment fa-flip-horizontal"></i>&nbsp;<span>チャットへ</span>
        </a>
    </div>
    <div class="text-left">
        <h2 class="py-3">プレイリスト一覧</h2>
    </div>
    <div class="row">
        @foreach ($songs as $key => $song)
        <div class="col-lg-4 py-2">
            <div class="card border" style="display: flow-root;">
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
                <div>※プレイリストが登録されていない場合は、こちらが表示されます</div>
                @endif
                </div>
                <div>
                @if($song)
                    <song-favorite
                        :initial-is-favorite-by='@json($song->isFavoriteBy(Auth::user()))'
                        :initial-count-favorites='@json($song->count_favorites)'
                        :authorized='@json(Auth::check())'
                        endpoint="{{ route('songs.favorite', ['song' => $song]) }}"
                        style="display: inline-flex;"
                    >
                    </song-favorite>
                    @if (Auth::id() == $user->id)
                    <span class="pl-1"></span>
                    @endif
                @else
                    <span class="pl-1"></span>
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
</div>

@endsection
