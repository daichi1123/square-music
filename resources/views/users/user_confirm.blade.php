@extends('layouts.app')

@section('content')

<div id="menu_1">
    <ul>
        <li><a href="#">コンテンツ削除確認画面</a></li>
    </ul>
</div>
    <p class="delete_contents">コンテンツを本当に削除よろしいですか。</p>
<div id="library_delete">
    <ul>
        <li>
        <form action="{{ route('user.delete', ['id' => $userComfirm->id]) }}" method="POST">
        @csrf
        @method('PUT')
            <input id="delete_button" type="submit" value="削除する">
        </form>
        </li>
        <li id="library_delete_2">
            <a href="#" onclick='history.back()'>戻る</a>
        </li>
    </ul>
</div>
@endsection