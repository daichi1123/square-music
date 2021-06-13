@extends('layouts.app')

@section('content')

<div id="container">
    <div class="row justify-content-center my-3">
        <h1>ユーザ削除確認画面</h1>
    </div>
    <h3 class="delete_contents text-center">コンテンツを本当に削除よろしいですか。</h3>
    
    <div class="row my-5 justify-content-center">
        <div class="col-3">
            <b>
                <button type="button" class="btn btn-outline-primary mb-12" onclick='history.back()'>サイトに戻る</button>
            </b>
        </div>
        <div>
            <a class="btn btn-outline-danger" data-toggle="modal" data-target="#deleteModal">削除をする？</a>
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
                <a class="ml-3 btn btn-secondary" data-dismiss="modal">戻る</a>
            </div>
        </div>
    </div>
</div>

<!-- モーダルを開くボタン・リンク -->
{{-- <div class="container">
    <div class="row my-3">
        <h1>ユーザ削除確認画面</h1>
    </div>
    <div class="row mb-5">
        <div class="col-2">
            <button type="button" class="btn btn-primary mb-12" data-toggle="modal" data-target="#testModal">ボタンで開く</button>
        </div>
        <div class="col-2">
            <a class="btn btn-primary" data-toggle="modal" data-target="#testModal">リンクボタンで開く</a>
        </div>
    </div>
</div> --}}

<!-- ボタン・リンククリック後に表示される画面の内容 -->
{{-- <div class="modal fade" id="testModal" tabindex="-1" role="dialog" aria-labelledby="basicModal" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="myModalLabel">削除確認画面</h4>
            </div>
            <div class="modal-body">
                <label>データを削除しますか？</label>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">閉じる</button>
                <button type="button" class="btn btn-danger">削除</button>
            </div>
        </div>
    </div>
</div> --}}

@endsection