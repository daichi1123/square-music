@extends('layouts.app')

@section('content')
    <div class="center jumbotron bg-success">
        <div class="text-center text-white">
            <h1>Square Music</h1>
        </div>
    </div>

    <div class="text-right">
        @if(Auth::check())
            {{ Auth::user()->first_name }}
        @endif
    </div>

    @include('users.users', compact('users'))

@endsection