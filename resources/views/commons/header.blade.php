<header class="mb-5">

    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">

        <a class="navbar-brand text-white" href="/">Square Music</a>

        <button class="navbar-toggler" data-toggle="collapse" data-target="#nav-bar" type="button">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="nav-bar">
            <ul class="navbar-nav mr-auto"></ul>
            <ul class="navbar-nav">
                @if (Auth::check())
                <li class="nav-item"><a class="nav-link text-white" href="{{ route('users.search') }}">ユーザ一覧</a></li>
                    <li class="nav-item"><a class="nav-link text-white" name="id" href="{{ route('users.show', auth()->user()->id) }}">マイページ</a></li>
                    <li class="nav-item"><a class="nav-link text-white" name="id" href="{{ route('songs.create') }}" value={{ Auth::id() }}>プレイリスト登録</a></li>
                    <li class="nav-item"><a class="nav-link text-white" href="{{ route('logout') }}">ログアウト</a></li>
                @else
                    <li class="nav-item"><a class="nav-link text-white" href="{{ route('signup') }}">新規登録</a></li>
                    <li class="nav-item"><a class="nav-link text-white" href="{{ route('login') }}">ログイン</a></li>
                @endif
            </ul>
        </div>
    </nav>
</header>