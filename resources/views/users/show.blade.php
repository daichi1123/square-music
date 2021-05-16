@extends('layouts.app')

@section('content')

<h1 class="text-right">{{ $user->first_name }}</h1>

<ul class="nav nav-tabs nav-justified mt-5 mb-4">
    <li class="nav-item nav-link {{ Request::is('users/' . $user->id) ? 'active' : '' }}"><a href="{{ route('users.show', auth()->user()->id) }}" class="">Playlist<br><div class="badge badge-secondary">{{ $count_songs }}</div></a></li>
    <li class="nav-item nav-link {{ Request::is('users/*/followers') ? 'active' : '' }}"><a href="{{ route('followers', ['id'=>$user->id]) }}" class="">フォロワー<br><div class="badge badge-secondary">{{ $count_followers }}</div></a></li>
    <li class="nav-item nav-link {{ Request::is('users/*/followings') ? 'active' : '' }}"><a href="{{ route('followings', ['id'=>$user->id]) }}" class="">フォロー中<br><div class="badge badge-secondary">{{ $count_followings }}</div></a></li>
</ul>

<h1>Playlist</h1>

@include('songs.songs', compact('songs'))

@endsection
