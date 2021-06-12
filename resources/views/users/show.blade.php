@extends('layouts.app')

@section('content')

<div class="container">
    <div class="col-lg-12 text-center mt-2">
        <h1>
            マイページ
        </h1>
    </div>

    <div class="col-lg-12 mt-4 mb-3">
        <div class="text-left d-inline-flex">
            <h3>
                ユーザ名：
                {{ $user->last_name }} 
                {{ $user->middle_name }} 
                {{ $user->first_name }}
                さん
            </h3>
        </div>
        <div class="text-right d-inline-flex float-right">
            <h1>
                <a class="badge badge-pill badge-success" href="{{ route('user.edit', ['id' => $user->id]) }}">ユーザ情報修正</a>
            </h1>
        </div>
    </div>

    <div class="col-lg-6 mt-4 mb-3">
        <div class="card text-center">
            <div class="card-header">
                <h4>
                    <b>
                        総いいね数
                    </b> 
                </h4>
            </div>
            <div class="card-body">
                <h4 class="card-title">
                    <b>
                    {{$user->favorites_user->count()}}
                    </b>
                </h4>
            </div>
        </div>
    </div>
    <div class="col-lg-12 mb-4">
        <div class="card text-center">
            <div class="card-header">
                <h4>
                    <b>自己紹介</b>    
                </h4>
            </div>
            <div class="card-body">
                <h4 class="card-title">
                    <b>
                    {{$user->favorites_user->count()}}
                    </b>
                </h4>
            </div>
        </div>
    </div>

</div>

<ul class="nav nav-tabs nav-justified mt-5 mb-4">
    <li class="nav-item nav-link {{ Request::is('users/' . $user->id) ? 'active' : '' }}"><a href="{{ route('users.show', auth()->user()->id) }}">Playlist<br><div class="badge badge-secondary">{{ $count_songs }}</div></a></li>
    <li class="nav-item nav-link {{ Request::is('users/*/followers') ? 'active' : '' }}"><a href="{{ route('followers', ['id'=>$user->id]) }}">フォロワー<br><div class="badge badge-secondary">{{ $count_followers }}</div></a></li>
    <li class="nav-item nav-link {{ Request::is('users/*/followings') ? 'active' : '' }}"><a href="{{ route('followings', ['id'=>$user->id]) }}">フォロー中<br><div class="badge badge-secondary">{{ $count_followings }}</div></a></li>
</ul>

<h1>Playlist</h1>

@include('songs.songs', compact('songs'))

@endsection
