@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="center jumbotron bg-success">
            <div class="text-center text-white">
                <h1>Music Sharing</h1>
            </div>
        </div>
        <div class="row">
            <div class="col-xs-12 col-md-6 text-center mt-5">
                <div class="col-xs-12 col-md-12 text-center py-5">
                    <button type="button" onclick="location.href='{{ route('signup') }}'" class="btn btn-lg btn-primary btn-md">
                        新規登録
                    </button>
                </div>
            </div>
            <div class="col-xs-12 col-md-6 text-center mt-5">
                <div class="col-xs-12 col-md-12 text-center py-5">
                    <button type="button" onclick="location.href='{{ route('login') }}'" class="btn btn-lg btn-primary btn-md">
                        ログイン
                    </button>
                </div>
            </div>
        </div>
    </div>
@endsection