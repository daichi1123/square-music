@extends('layouts.app')

@section('content')

    <div class="center jumbotron bg-success">
        <div class="text-center text-white">
            <h1>Square Music</h1>
        </div>
    </div>

    <div class="text-center">
        <h3 class="login_title text-left d-inline-block mt-5">ログイン</h3>
    </div>

    <div class="row mt-5 mb-5">
        <div class="col-sm-6 offset-sm-3">
            <form action="{{ route('login.post') }}" method="post">
            @csrf
                <div class="form-group">
                    <label name="email">メールアドレス：</label>
                    <b style="color:red">test1@example.com</b><br>
                    <input type="text" name="email" value="{{ old('email') }}" class="form-control" autofocus>
                </div>

                <div class="form-group">
                    <label name="password">パスワード：</label>
                    <b style="color:red">example1</b><br>
                    <input type="text" name="password" class="form-control">
                </div>

                <div class="d-flex justify-content-around py-5 col-sm-8 col-auto container">
                    <input type="submit" class='btn btn btn-primary mt-2' value="ログイン">
                </div>
            </form>
            <div class="text-center">
                <a href="{{ route('signup') }}" class="text-center d-inline-block">
                    ユーザ登録していない
                </a>
            </div>
        </div>
    </div>
    
@endsection