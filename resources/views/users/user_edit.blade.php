@extends('layouts.app')

@section('content')

<div class="pb-5">
    <div class="card">
        <div class="card-header">ユーザ情報修正</div>
            <form action="{{ route('user.update', ['id' => $user->id]) }}" method="post">
            @csrf
            @method('PUT')
            <div class="form-group mt-5">
                <label class="col-sm-4 text-sm-center pt-2">名前</label>
                <input class="col-sm-2" type="text" name="first_name" value="{{ $user->first_name }}" placeholder="(名)太郎" autofocus />
                <input class="col-sm-2" type="text" name="middle_name" value="{{ $user->middle_name }}" placeholder="(未記入OK)ミドルネーム" />
                <input class="col-sm-2" name="last_name" value="{{ $user->last_name }}" placeholder="(姓)山田" />
            </div>
    
            <div class="form-group">
                <label class="col-sm-4 col-form-label text-sm-center">メールアドレス</label>
                <input class="col-sm-6" id="email" name="email" type="email" value="{{ $user->email }}" placeholder="test1@example.com" autocomplete="email">
                @error('email')
                <span class="invalid-feedback offset-sm-4" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
                @enderror
            </div>
            <div class="form-group">
                <label class="col-sm-4 col-form-label text-sm-center">メールアドレス確認</label>
                <input class="col-sm-6" name="email_confirmation" type="text"  placeholder="test1@example.com">
            </div>
            <div class="form-group row pt-3">
                <label class="country_id col-sm-5 col-form-label text-sm-right">国名</label>
                <select class="form-control col-sm-4"> name="country_id">
                @foreach(config('country_list') as $countryId => $countryName)
                    <option value="{{ $countryId }}" @if(old('country_id', $registeredCountryName) == $countryName) selected @endif>{{$countryName}}</option>
                @endforeach
                </select>
            </div>
            <div class="form-group row">
                <label class="age_id col-sm-5 col-form-label text-sm-right">年齢</label>
                <select class="form-control col-sm-4" name="age_id">
                @foreach(config('age_list') as $ageId => $ageName)
                    <option value="{{ $ageId }}" @if(old('age_id', $registeredAgeName) == $ageName) selected @endif>{{$ageName}}</option>
                @endforeach
                </select>
            </div>
            <div class="form-group row">
                <label class="col-md-5 col-form-label text-md-right" for="radio01">性別</label>
                <div class="col-md-6 mt-1">
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" id="inlineRadio01" name="sex" type="radio" value="男性" @if(old('sex', $sexName) == '男性') checked @endif />
                        <label class="form-check-label" for="inlineRadio01">男性</label>
                    </div>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" id="inlineRadio02" name="sex" type="radio" value="女性" @if(old('sex', $sexName) == '女性') checked @endif />
                        <label class="form-check-label" for="inlineRadio02">女性</label>
                    </div>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" id="inlineRadio03" name="sex" type="radio" value="その他" @if(old('sex', $sexName) == 'その他') checked @endif />
                        <label class="form-check-label" for="inlineRadio03">その他</label>
                    </div>
                </div>
            </div>
            <div class="d-flex justify-content-around pb-4 col-sm-8 col-auto container">
                <input class="btn btn-primary" type="submit" value="変更" />
            </div>
        </form>
        <div class="text-center pb-3">
            <a href="#">パスワードを変更する</a>
        </div>
        </div>
    </div>
</div>

@endsection