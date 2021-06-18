@extends('layouts.app')

@section('content')
@if (session('flash_message_delete'))
    <div class="alert alert-danger">
        {{ session('flash_message_delete') }}
    </div>
@endif
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

    @include('users.users')

@endsection