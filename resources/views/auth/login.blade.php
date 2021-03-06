@extends('layouts.app')

@section('content')

    <div class="center jumbotron bg-success">
        <div class="text-center text-white">
            <h1>Square Music</h1>
        </div>
    </div>

    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8 py-5">
                <div class="card border">
                    <div class="card-header">ログイン</div>
    
                    <div class="card-body">
                        <form action="{{ route('login.post') }}" method="POST">
                        @csrf
                        <div class="form-group row">
                            <label class="col-md-4 col-form-label text-md-right" for="email">メールアドレス</label>
                            <div class="col-md-6">
                                <input class="form-control" name="email" type="email" value="test1@example.com" placeholder="test1@example.com" autocomplete="email">
                            </div>
                        </div>

                        <div class="form-group row">
                            <label class="col-md-4 col-form-label text-md-right" for="password">パスワード</label>

                            <div class="col-md-6">
                                <input class="form-control js-password" name="password" type="password" value="example1" placeholder="example1" autocomplete="password">
                            </div>
                        </div>
                        <div>
                            <input class="offset-sm-4" id="js-passcheck" type="checkbox" />
                            <label for="js-password">パスワードを表示する</label>
                        </div>
                        <div class="d-flex justify-content-around col-sm-8 col-auto container">
                            <input class="btn btn btn-primary mt-2" type="submit" value="ログイン">
                        </div>
                        </form>
                        <div class="text-center pt-2">
                        @if (Route::has('password.request'))
                            <a class="btn btn-link" href="{{ route('password.request') }}" style='outline: none;'>
                                {{ __('パスワードを忘れた') }}
                            </a>
                        @endif
                        </div>
                        <hr>
                        <div class="text-center">
                            <p class="mt-1">
                                <font size="2">
                                    <strong>初めての方は</strong>
                                </font>
                            </p>
                            <a class="btn" type="button" href="/signup">新規登録をする</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
