@extends('layouts.app')


@section('content')

<div>
    <div class="row mt-4">
        <div class="col-lg-12 text-center">
            <h1>ユーザ検索画面</h1>
        </div>
    </div>

    <form action="{{ route('users.search') }}" method="get">
        <div class="row">
            <div class="input-group mt-4 col-md-7 offset-2">
                <h2 class="mr-4">ユーザ名</h2>
                <input class="form-control" name="first_name" type="text" />
                <span class="input-group-btn">
                    <button class="btn btn-primary ml-4" type="submit">検索</button>
                </span>
            </div>
        </div>

        <div class="form-group mt-4 col-md-7 offset-2">
            {!! Form::label('country_id', '国名', ['class' => 'h2']) !!}
            <select class="form-control" name="country_id">
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
    <table class="table text-center mt-4" style="border-collapse: collapse" border="3">
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
        @if(Auth::check())
            @if (Auth::id() != $user->id)
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
                    <td name="name">
                        <a class="btn btn-primary" href="{{ action('UsersController@showDetail', $user->id) }}">ユーザ詳細画面</a>
                    </td>
                </tr>
            </tbody>
            @endif
        @endif
    @endforeach
    </table>
    <div class="row justify-content-center">
        {{ $users->appends(request()->input())->links() }}
    </div>

    @if( $users->count() <= 0 )
    <div class="row justify-content-center">
        <h2 class="py-5">検索結果がありませんでした</h2>
    </div>
    @endif
</div>

@endsection
