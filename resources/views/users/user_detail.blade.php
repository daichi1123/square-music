@extends('layouts.app')

@section('content')

@if($user === null)
    <div class="text-center">
        <h1 class="mt-5 col-lg-12">ユーザが見つかりません</h1>
        <h3 class="mt-5 col-lg-12"></h3>

        <a href="/products" class="btn btn-primary mt-5">ホームへ</a>
    </div>
@else
    <div class="container">
        <div class="row text-center">
            <div class="col-lg-12 mt-4">
                <h1>ユーザー</h1>
            </div>
            <div class="col-lg-12 mt-4 mb-3">
                <h2 class="text-left">ユーザ名：{{ $user->last_name }} {{ $user->middle_name }} {{ $user->first_name }}さん</h2>
            </div>
        </div>
        <div class="row text-right">
            <div class="col-lg-12">
                <h2 class="text-left">国名：{{ $user->country->country_name }}</h2>
            </div>
        </div>
        <div class="row text-left">
            <div class="col-lg-12 mt-3">
                <h2>自己紹介文</h2>
            </div>
            <div class="col-lg-12 mt-3">
                <h2>{{ $user->introduction }}</h2>
            </div>
        </div>
    </div>

    
@endif

@endsection
