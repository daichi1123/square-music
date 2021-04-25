@extends('layouts.app')

@section('content')

    <div class="text-right">
        {{ Auth::user()->name }}
    </div>

    <div class="container">
        <h2 class="mt-5 text-success">Spotifyプレイリスト登録</h2>

        <form action="{{ route('songs.store') }}" method="post">
        @csrf
            <div class="form-group mt-5">
                <label></label>
                <br>例）PlaylistのURLが <span>https://open.spotify.com/playlist/2LS1HBjVWGLjlYwoizbncs?si=dIo5UbFCTVKgutdeKPqaTQ なら</span>
                <div>  "playlist/"の直後の "<span class="text-success">2LS1HBjVWGLjlYwoizbncs?si=dIo5UbFCTVKgutdeKPqaTQ</span>" を入力</div>
                <div class="text-danger">＊プレイリスト以外の登録はできません</div>
                <input name="url" class='form-control' placeholder="2LS1HBjVWGLjlYwoizbncs?si=dIo5UbFCTVKgutdeKPqaTQ (SpotifyURL入力欄)" autofocus>
            </div>

            <div class="form-group mt-4">
                <label name="comment" class="mt-3">Playlistのコメント</label>
                <input name="comment" class="form-control" placeholder="このプレイリストについてのコメント">
            </div>    
                <div class="d-flex justify-content-around col-sm-8 col-auto container">
                    <input type=submit value="登録" class="btn btn-lg btn-primary mt-5">
                </div>
            </div>
        </from>
        <div class="text-center mt-3">
            <a href="https://open.spotify.com/" class="text-center d-inline-block">
                SpotifyでURLを取得する
            </a>
        </div>

        <h2 class="mt-3">Your Playlists</h2>

        @include('songs.songs', compact('songs'))

    </div>



@endsection