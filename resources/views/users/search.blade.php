@extends('layouts.app')


@section('content')

<div>
    <div class="row mt-4">
        <div class="col-lg-12 text-center">
            <h1>ユーザ検索画面</h1>
        </div>
    </div>

    <form action="{{ route('users.search') }}" method="get">
        <div>
            <h2 class="offset-2 mr-4">ユーザ名</h2>
            <div class="input-group mt-4 text-center">
                <input class="form-control col-md-7 offset-2" name="first_name" type="text" />
                <span class="input-group-btn">
                    <button class="btn btn-primary ml-4" type="submit">検索</button>
                </span>
            </div>
        </div>

        <div>
            <h2 class="offset-2 mr-4 mt-4">国名</h2>
            <div class="form-group mt-4 text-center">
                <select class="custom-select custom-select-lg col-md-8" name="country_id">
                    @foreach(config('country_list') as $countryId => $countryName)
                        <option value="{{ $countryId }}">{{$countryName}}</option>
                    @endforeach
                </select>
            @if (count($errors) > 0)
                @foreach ($errors->get('country_id') as $error)
                    <div class="text-danger">{{ $error }}</div>
                @endforeach
            @endif
            </div>
        <div>
    </form>

    <p>全{{ $users->count() }}名</p>
    <div class="row my-3">
        @foreach ($users as $key => $user)
            @php
                $song=$user->songs->last();
            @endphp
    
            @if($loop->iteration % 3 == 1 && $loop->iteration != 1)
    </div>
    <div class="row py-3 pb-1">
            @endif
            <div class="col-lg-4">
                <div class="card border" style="display: flow-root;">
                @if ($user->profile_image)
                    <img 
                        class="profile_image card-img-top h-100"
                        src="{{ Storage::url($user->profile_image) }}"
                        alt=""
                    />
                @else
                    <div class="text-center">
                        <i class="fas fa-user"></i>
                    </div>
                @endif
                    <div class="card-body">
                        <h5 class="card-title">{{ $user->first_name }}</h5>
                        <p class="card-text">{{$user->self_introduction}}</p>
                        <p class="card-text">{{ $user->country->country_name }}</p>
                        <a class="btn btn-primary" href="{{ action('UsersController@showDetail', $user->id) }}">ユーザ詳細</a>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
    <div class="row">
        {{ $users->appends(request()->input())->links() }}
    </div>

    @if( $users->count() <= 0 )
    <div class="row text-center">
        <h2 class="py-5">検索結果がありませんでした</h2>
    </div>
    @endif
</div>

</div>
</div>

@endsection
