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
    <div class="d-flex justify-content-around py-5 col-sm-8 col-auto container">
        <input type="submit" class="btn btn-primary" value="登録">
    </form>
    </div>
</div>

@endsection