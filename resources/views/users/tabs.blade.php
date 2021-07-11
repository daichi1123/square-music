<div class="row">
    <div class="col-lg-12 text-center mt-2">
        <h1>
            マイページ
        </h1>
    </div>

    <div>
        <div style="float: left;">
            <section class="mb-3">
                <h3>
                    ユーザ名：
                    {{ $user->last_name }} 
                    {{ $user->middle_name }} 
                    {{ $user->first_name }}
                    さん
                </h3>
            </section>
            <section>
                @if (isset($user->profile_image))
                <section class="text-center">
                    <img 
                        class="profile_image"
                        src="{{ Storage::url($user->profile_image) }}"
                        alt=""
                        width="250px"
                        height="200px"
                    />
                </section>
                @endif

                <form action="{{route('profile.store')}}" enctype="multipart/form-data" method="post">
                    @csrf
                    <section class="text-center">
                        <label class="" for="image">
                            プロフィール画像
                        </label>
                        <section>
                            <input class="" type="file" name="profile_image" />
                        </section>
                    </section>
                    <section class="btn-toolbar mt-4 justify-content-center" role="toolbar">
                        <input class="btn btn-primary mr-2" type="submit" value="画像アップロード" />
                </form>
                    
                <form action="{{route('profile.delete', ['id'=>$user->id])}}" method="post">
                    @csrf
                    @method('DELETE')
                        <input class="btn btn-danger" type="submit" value="削除" />
                    </section>
                </form>
            </section>
        </div>
        <div style="float: right;">
            <section>
                <h1>
                    <a class="badge badge-pill badge-success" href="{{ route('users.edit', ['id' => $user->id]) }}">ユーザ情報修正</a>
                </h1>
            </section>
        </div>
    </div>

</div>

<ul class="nav nav-tabs nav-justified mt-5 mb-2">
    <li class="nav-item nav-link {{ Request::is('users/' . $user->id) ? 'active' : '' }}"><a href="{{ route('users.mypage', auth()->user()->id) }}">Playlist<br><div class="badge badge-secondary">{{ $count_songs }}</div></a></li>
    <li class="nav-item nav-link {{ Request::is('users/*/followers') ? 'active' : '' }}"><a href="{{ route('users.followers', ['id'=>$user->id]) }}">フォロワー<br><div class="badge badge-secondary">{{ $count_followers }}</div></a></li>
    <li class="nav-item nav-link {{ Request::is('users/*/followings') ? 'active' : '' }}"><a href="{{ route('users.followings',['id'=>$user->id]) }}">フォロー中<br><div class="badge badge-secondary">{{ $count_followings }}</div></a></li>
</ul>