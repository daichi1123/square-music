@extends('layouts.app')

@section('content')

@if (session('flash_message_store'))
    <div class="alert alert-success">
        {{ session('flash_message_store') }}
    </div>
@endif
@if (session('flash_message_delete'))
    <div class="alert alert-danger">
        {{ session('flash_message_delete') }}
    </div>
@endif

    <div class="text-right">
        {{ Auth::user()->first_name }}
    </div>

    <div class="container">
        <h2 class="mt-5 text-success">Spotifyプレイリスト登録</h2>
        {!! Form::open(['route'=>'songs.store', 'class' => 'store-playlist']) !!}
            <div class="form-group mt-5">
                <br>例）PlaylistのURLが 
                <span>https://open.spotify.com/playlist/2LS1HBjVWGLjlYwoizbncs?si=dIo5UbFCTVKgutdeKPqaTQ なら</span>
                <div> 
                    &emsp;
                    <span>"</span>
                    <span class="text-success">playlist/</span>
                    <span>"の直後の"</span>
                    <span class="text-success">2LS1HBjVWGLjlYwoizbncs?si=dIo5UbFCTVKgutdeKPqaTQ</span>
                    <span>"を入力</span>
                </div>
                <div class="text-danger mt-1 mb-1">＊プレイリスト以外の登録はできません</div>
                {!! Form::text('url',null,['class'=>'form-control', 'placeholder'=>'2LS1HBjVWGLjlYwoizbncs?si=dIo5UbFCTVKgutdeKPqaTQ (SpotifyURL入力欄)', 'autofocus']) !!}
                
                {!! Form::label('comment','Playlistのコメント',['class'=> 'mt-3']) !!}
                {!! Form::text('comment',null,['class'=>'form-control', 'placeholder'=>'このプレイリストについてのコメント']) !!}
                
                <div class="d-flex justify-content-around col-sm-8 col-auto container">
                    {!! Form::submit('登録', ['class'=> 'btn btn-lg btn-primary mt-5 register']) !!}
                </div>

            </div>
        {!! Form::close() !!}
        <div class="text-center mt-3">
            <a class="text-center d-inline-block" href="https://open.spotify.com/">
                SpotifyでURLを取得する
            </a>
        </div>

    </div>
        <h2 class="mt-3">Your Playlists</h2>
        @include('songs.songs')


@endsection
