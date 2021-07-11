<header class="mb-5">
    <nav class="navbar navbar-icon-top navbar-expand-lg navbar-dark bg-dark">
        <a class="navbar-brand" href="/" style="font-size: 32px;">{{ config('app.name', 'Square Music') }}</a>
        <button 
            class="navbar-toggler"
            type="button"
            data-toggle="collapse"
            data-target="#navbarSupportedContent"
            aria-controls="navbarSupportedContent"
            aria-expanded="false"
            aria-label="Toggle navigation"
        >
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav mr-auto"></ul>
            <ul class="navbar-nav">
                @if (Auth::check())
                <li class="nav-item active">
                    <a class="nav-link" href="/">
                    <i class="fa fa-home"></i>
                    Home
                    <span class="sr-only">(current)</span>
                    </a>
                </li>
                <li class="nav-item active">
                    <a class="nav-link" href="{{ route('users.show', auth()->user()->id) }}">
                    <i class="fa fa-user-alt"></i>
                    マイページ
                    <span class="sr-only">(current)</span>
                    </a>
                </li>
                <li class="nav-item active">
                    <a class="nav-link" href="{{ route('users.search') }}">
                    <i class="fa fa-search"></i>
                    ユーザ検索
                    <span class="sr-only">(current)</span>
                    </a>
                </li>
                <li class="nav-item active">
                    <a class="nav-link" href="{{ route('songs.create') }}" value={{ Auth::id() }}>
                    <i class="fa fa-music"></i>
                    曲登録
                    <span class="sr-only">(current)</span>
                    </a>
                </li>
                <li class="nav-item active">
                    <a class="nav-link" href="{{ route('logout') }}">
                    <i class="fa fa-sign-out-alt"></i>
                    ログアウト
                    <span class="sr-only">(current)</span>
                    </a>
                </li>
                @else
                <li class="nav-item active">
                    <a class="nav-link" href="{{ route('signup') }}">
                    <i class="fa fa-plus"></i>
                    新規登録
                    <span class="sr-only">(current)</span>
                    </a>
                </li>
                <li class="nav-item active">
                    <a class="nav-link" href="{{ route('login') }}">
                    <i class="fa fa-sign-in-alt"></i>
                    ログイン
                    <span class="sr-only">(current)</span>
                    </a>
                </li>
                @endif
            </ul>
        </div>
    </nav>
</header>