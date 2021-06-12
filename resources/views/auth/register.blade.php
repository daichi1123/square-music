@extends('layouts.app')

@section('content')

<div class="pb-5">
    <div class="card">
        <div class="card-header">新規登録</div>
            <form action="{{ route('signup.post')}}" method="post">
            @csrf
            <div class="form-group mt-5">
                <label class="col-sm-4 text-sm-center pt-2">名前</label>
                <input class="col-sm-2" name="first_name" type="text" value="{{ old('first_name') }}" placeholder="(名)太郎" autofocus />
                <input class="col-sm-2" name="middle_name" type="text" value="{{ old('middle_name') }}" placeholder="(未記入OK)ミドルネーム" />
                <input class="col-sm-2" name="last_name" type="text" value="{{ old('last_name') }}" placeholder="(姓)山田" />
            </div>
    
            <div class="form-group">
                <label class="col-sm-4 col-form-label text-sm-center">メールアドレス</label>
                <input class="col-sm-6" name="email" type="email" value="{{ old('email') }}" placeholder="test1@example.com" autocomplete="email" />
            </div>
            <div class="form-group">
                <label class="col-sm-4 col-form-label text-sm-center">メールアドレス確認</label>
                <input class="col-sm-6" name="email_confirmation" type="email" value="{{ old('email_confirmation') }}" placeholder="test1@example.com" />
            </div>
            <div class="form-group">
                <label class="col-sm-4 col-form-label text-sm-center">パスワード</label>
                <input class="col-sm-6 js-password" type="password" placeholder="exampledata" name="password" />
            </div>
            <div class="form-group">
                <label class="col-sm-4 col-form-label text-sm-center">パスワード確認</label>
                <input class="col-sm-6 js-password" type="password" placeholder="(確認用)exampledata" name="password_confirmation" />
            </div>
            <div>
                <input class="offset-sm-4" id="js-passcheck" type="checkbox" />
                <label for="js-password">パスワードを表示する</label>
            </div>
            <div class="form-group row">
                <label class="country_id col-sm-4 col-form-label text-sm-right">国名</label>
                <select class="form-control col-sm-4" name="country_id">
                @foreach(config('country_list') as $countryId => $countryName)
                    <option value="{{ $countryId }}">{{$countryName}}</option>
                @endforeach
                </select>
            </div>
            <div class="form-group row">
                <label class="age_id col-sm-4 col-form-label text-sm-right">年齢</label>
                <select class="form-control col-sm-4" name="age_id">
                @foreach(config('age_list') as $ageId => $ageName)
                    <option value="{{ $ageId }}">{{$ageName}}</option>
                @endforeach
                </select>
            </div>
            <div class="form-group row">
                <label class="col-md-4 col-form-label text-md-right" for="radio01">性別</label>
                <div class="col-md-6 mt-1">
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" id="inlineRadio01" name="sex" type="radio" value="男性" />
                        <label class="form-check-label" for="inlineRadio01">男性</label>
                    </div>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" id="inlineRadio02" name="sex" type="radio" value="女性" />
                        <label class="form-check-label" for="inlineRadio02">女性</label>
                    </div>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" id="inlineRadio03" name="sex" type="radio" value="その他" checked="checked" />
                        <label class="form-check-label" for="inlineRadio03">その他</label>
                    </div>
                </div>
            </div>
            <div class="form-group">
                <label class="col-sm-4 col-form-label text-sm-center">Instagram&nbsp;ID</label>
                <input class="col-sm-6" name="insta_id" type="text" placeholder="InstagramのID記述してください" />
            </div>
            <div class="d-flex justify-content-around pb-4 col-sm-8 col-auto container">
                <input class="btn btn-primary" type="submit" value="新規登録">
            </div>
        </form>
        </div>
    </div>
</div>

@endsection
