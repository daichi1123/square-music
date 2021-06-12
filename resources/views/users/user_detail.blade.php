@extends('layouts.app')

@section('content')

<div class="container">
    <div class="row text-center">
        <div class="col-lg-12 mt-2">
            <h1>ユーザー</h1>
        </div>
        <div class="col-lg-12 mt-4 mb-3">
            <h2 class="text-left">
                ユーザ名：
                {{ $user->last_name }}
                {{ $user->middle_name }} 
                {{ $user->first_name }}
                さん
            </h2>
        </div>
    </div>
    <div class="row">
        <div class="col-lg-12">
            <h2 class="text-left">
                国名：{{ $user->country->country_name }}
            </h2>
        </div>
    </div>
    <div>
        <h2>
            性別：{{ $user->sex }}
        </h2>
        <h2>
            年齢：{{ $user->age->age_name }}
        </h2>
    </div>
    <div class="col-6">
        @if($user->insta_id)
        <a class="insta_btn2" href="{{ 'https://www.instagram.com/'.$user->insta_id.'/' }}" target="_blank">
            <i class="fab fa-instagram"></i>&nbsp;<span>アプリへ</span>
        </a>
        @else
        <span class="pl-1"></span>
        @endif

        <a class="chat_btn" href="#">
            <i class="far fa-comment fa-flip-horizontal"></i>&nbsp;<span>チャットへ</span>
        </a>
    </div>
    @include('follow.follow_button', ['user'=>$user])
    <div class="text-left">
        <h2 class="py-3">プレイリスト一覧</h2>
    </div>
    <div class="row">
        @foreach ($songs as $key => $song)
        <div class="col-lg-4 py-2">
            <div class="card" style="display: flow-root;">
                <div class="card-header text-right">
                    @if(isset($song))
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
                    src="https://open.spotify.com/embed/playlist/6UeSakyzhiEt4NB3UAd6NQ"width="300"
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
