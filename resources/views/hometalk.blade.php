@extends('layouts.app')

@section('content')

<div class="chat-container row justify-content-center">
    <div class="chat-area">
        <div class="card">
            <div class="card-header">Chat Page</div>
            <div class="card-body chat-card">
                <div id="review-data"></div>
            </div>
        </div>
    </div>
</div>

<form method="POST" action="{{route('chat.add')}}">
    @csrf
    <div class="mx-auto review-container py-3">
        <div class="input-group review-area">
            <textarea 
                class="form-control" 
                id="review" 
                name="review" 
                placeholder="push massage (shift + Enter)"
                aria-label="With textarea"
                onkeydown="if(event.shiftKey&&event.keyCode==13){document.getElementById('submit').click();return false};"
                autofocus
            ></textarea>
            <button class="btn btn-outline-primary review-btn" id="submit" type="submit">Submit</button>
        </div>
    </div>
</form>


@section('js')
<script src="{{ asset('js/main.js') }}"></script>
@endsection

@endsection