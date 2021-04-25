<header class="mb-5">

    <nav class="navbar navbar-expand-lg navbar-light bg-dark">

        <a class="navbar-brand text-white" href="/">Square Music</a>

        <button type="button" class="navbar-toggler" data-toggle="collapse" data-target="#nav-bar">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="nav-bar">
            <ul class="navbar-nav mr-auto"></ul>
            <ul class="navbar-nav">
                @if (Auth::check())
                    <li class="nav-item"><a href="{{ route('songs.create') }}" class="nav-link text-white" name="id" value={{ Auth::id() }}>プレイリスト登録</a></li>
                    <li class="nav-item"><a href="/" class="nav-link text-white">検索</a></li>
                    <li class="nav-item"><a href="/" class="nav-link text-white">いいね</a></li>
                    <li class="nav-item"><a href="/" class="nav-link text-white">ユーザ情報</a></li>
                    <li class="nav-item"><a href="{{ route('logout') }}" class="nav-link text-white">ログアウト</a></li>
                @else
                    <li class="nav-item"><a href="{{ route('signup') }}" class="nav-link text-white">新規登録</a></li>
                    <li class="nav-item"><a href="{{ route('login') }}" class="nav-link text-white">ログイン</a></li>
                @endif
            </ul>
            <script>
                // @if (session('flash_message'))
                //     $(function ()
                //     {
                //         toastr.warning('{{ session('flash_message') }}');
                //     });
                // @endif
            </script>
        </div>
    </nav>
</header>