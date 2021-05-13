@extends('layouts.app')

@section('content')

<div class="container">
    <h1 class="text-center py-5">ユーザー情報修正</h1>
    <form action="{{ route('signup.post')}}" method="post">
    @csrf
    <div class="form-group row">
        <label class="col-sm-2 text-sm-center offset-sm-1">名前</label>
        <label class="col-sm-1 text-sm-right col-2 col-form-label">名</label>
        <input class="col-sm-2" type="text" name="first_name" value="{{ old('first_name') }}" autofocus/>
        <label class="col-sm-1 text-sm-right col-2 col-form-label"></label>
        <input class="col-sm-2" type="text" name="middle_name" value="{{ old('middle_name') }}" placeholder="(未記入OK)ミドルネーム"/>
        <label class="col-sm-1 text-sm-right col-2 col-form-label">姓</label>
        <input class="col-sm-2" name="last_name" value="{{ old('last_name') }}"/>
    </div>

    <div class="form-group row">
        <label class="col-sm-4 col-form-label text-sm-center">メールアドレス</label>
        <input class="col-sm-6" type="text" name="email" value="{{ old('email') }}">
    </div>
    <div class="form-group row">
        <label class="col-sm-4 col-form-label text-sm-center">メールアドレス確認</label>
        <input class="col-sm-6" type="text" name="email_confirmation">
    </div>
    <div class="form-group row">
        <label class="col-sm-4 col-form-label text-sm-center">パスワード</label>
        <input class="col-sm-6" type="text" name="password">
    </div>
    <div class="form-group row">
        <label class="col-sm-4 col-form-label text-sm-center">パスワード確認</label>
        <input class="col-sm-6" type="text" name="password_confirmation">
    </div>
    <div class="form-group row">
        <label class="country_id col-sm-4 col-form-label text-sm-right">国名</label>
        <select name="country_id" class="form-control col-sm-4">
        @foreach(config('country_list') as $countryId => $countryName)
            <option value="{{ $countryId }}">{{$countryName}}</option>
        @endforeach
        </select>
    </div>
    <div class="form-group row">
        <label class="age_id col-sm-4 col-form-label text-sm-right">年齢</label>
        <select name="age_id" class="form-control col-sm-4">
        @foreach(config('age_list') as $ageId => $ageName)
            <option value="{{ $ageId }}">{{$ageName}}</option>
        @endforeach
        </select>
    </div>
    <div class="form-group row">
        <label for="radio01" class="col-md-4 col-form-label text-md-right">性別</label>
        <div class="col-md-6 mt-1">
            <div class="form-check form-check-inline">
                <input class="form-check-input" type="radio" id="inlineRadio01" name="sex" value="男性">
                <label class="form-check-label" for="inlineRadio01">男性</label>
            </div>
            <div class="form-check form-check-inline">
                <input class="form-check-input" type="radio" id="inlineRadio02"  name="sex" value="女性">
                <label class="form-check-label" for="inlineRadio02">女性</label>
            </div>
            <div class="form-check form-check-inline">
                <input class="form-check-input" type="radio" id="inlineRadio03"  name="sex" value="その他" checked="checked">
                <label class="form-check-label" for="inlineRadio03">その他</label>
            </div>
        </div>
    </div>
    <div class="d-flex justify-content-around py-5 col-sm-8 col-auto container">
        <input type="submit" class="btn btn-primary" value="登録">
    </form>
    </div>
</div>

@endsection