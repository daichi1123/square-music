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
        <div class="row text-right">
            <div class="col-lg-12">
                <h2 class="text-left">
                    国名：
                    {{ $user->country->country_name }}
                </h2>
            </div>
        </div>
        <div>
            <h2 class="text-left">プレイリスト一覧</h2>
            <div>
                
            </div>
        </div>
    </div>

@endsection
