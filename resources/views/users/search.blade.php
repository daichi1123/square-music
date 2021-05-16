@extends('layouts.app')


@section('content')

<div>
    <div class="row mt-4">
        <div class="col-lg-12 text-center">
            <h1>ユーザ検索画面</h1>
        </div>
    </div>

    <form method="get" action="{{ route('users.search') }}">
        <div class="row">
            <div class="input-group mt-4 col-md-7 offset-2">
                <h2 class="mr-4">ユーザ名</h2>
                <input type="text" class="form-control" name="first_name">
                <span class="input-group-btn">
                    <button type="submit" class="btn btn-primary ml-4">検索</button>
                </span>
            </div>
        </div>

        <div class="form-group mt-4 col-md-7 offset-2">
            {!! Form::label('country_id', '国名', ['class' => 'h2']) !!}
            <select name="country_id" class="form-control">
                @foreach(config('country_list') as $countryId => $countryName)
                    <option value="{{ $countryId }}">{{$countryName}}</option>
                @endforeach
            </select>
        </div>
        @if (count($errors) > 0)
            @foreach ($errors->get('country_id') as $error)
                <div class="text-danger">{{ $error }}</div>
            @endforeach
        @endif
    </form>

    <p>全{{ $users->count() }}名</p>
    <table border="3" class="table text-center mt-4" style="border-collapse: collapse">
    <thead class="bg-success">
        <tr>
            <th>ユーザ名</th>
            <th>プレイリスト数</th>
            <th>国名</th>
            <th>年齢</th>
            <th>性別</th>
            <th></th>
        </tr>
    </thead>
    @foreach($users as $user)
    <tbody class='h4'>
        <tr>
            <td>{{ $user->first_name }}</td>
            <td>
                @if(isset($songs))
                    {{ $user->songs->count() }}
                @else
                    0
                @endif
            </td>
            <td>{{ $user->country->country_name }}</td>
            <td>{{ $user->age->age_name }}</td>
            <td>{{ $user->sex }}</td>
            <td name="name" value="">
                <a href="{{ action('UsersController@showDetail', $user->id) }}" class="btn btn-primary">ユーザ詳細画面</a>
            </td>
        </tr>
    </tbody>
    @endforeach
    </table>
    <div class="row justify-content-center">
        {{ $users->appends(request()->input())->links() }}
    </div>

    @if( $users->count() <= 0 )
        <div class="row justify-content-center">
            <h2>検索結果がありませんでした</h2>
        </div>
    @endif
</div>

@endsection
