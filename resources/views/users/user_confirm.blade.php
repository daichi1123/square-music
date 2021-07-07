@extends('layouts.app')

@section('content')

<div id="container">
    <div class="text-center my-3">
        <h1>ユーザ削除確認画面</h1>
    </div>
    <h3 class="delete_contents text-center mt-3">コンテンツを本当に削除よろしいですか。</h3>
    
    <div class="row justify-content-center my-5">
        <div class="btn-group shadow-none">
            <button class="btn btn-primary mr-5 btn-lg offset-3 col-3" type="button" onclick='history.back()'>サイトに戻る</button>
            <a class="btn btn-danger btn-lg offset-2 col-3" data-toggle="modal" data-target="#deleteModal">削除をする？</a>
        </div>
    </div>
</div>

<div class="modal fade" id="deleteModal" tabindex="-1" role="dialog" aria-labelledby="basicModal" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="myModalLabel">削除確認</h4>
            </div>
            <div class="modal-body">
                <label>本当によろしいですか？</label>
            </div>
            <div class="modal-footer">
                <form action="{{ route('user.delete', ['id' => $userComfirm->id]) }}" method="POST">
                @csrf
                @method('PUT')
                <input class="btn btn-danger" id="delete_button" type="submit" value="削除">
                </form>
                <a class="ml-3 btn" data-dismiss="modal">戻る</a>
            </div>
        </div>
    </div>
</div>

@endsection