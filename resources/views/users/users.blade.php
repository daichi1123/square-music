
<h1 class="mt-4">Users</h1>

<div class="movies row mt-5 text-center">
    @foreach ($users as $key => $user)
        @php
            $song=$user->songs->last();
        @endphp

        @if($loop->iteration % 3 == 1 && $loop->iteration != 1)
            </div>
            <div class="row text-center mt-3">
        @endif
        <div class="col-lg-4 mb-5">
            <div class="movie text-left d-inline-block">
                <b>{{ $user->first_name }}</b> <span>from</span> {{ $user->country->country_name }}
                <div>
                    @if($song)
                        <div class="text-right">
                            <span class="badge badge-pill badge-success">いいね {{ $song->favorite_users->count() }}</span>
                        </div>
                        <iframe src="{{ 'https://open.spotify.com/embed/playlist/'.$song->url }}?controls=1&loop=1&playlist={{ $song->url }}" width="300" height="380" frameborder="0" allowtransparency="true" allow="encrypted-media"></iframe>
                    @else
                        <div class="text-right">
                            <span class="badge badge-pill badge-danger">未実装</span>
                        </div>
                        <iframe src="https://open.spotify.com/playlist/" width="300" height="380" frameborder="0" allowtransparency="true" allow="encrypted-media"></iframe>
                    @endif
                </div>
                <p>
                    @if(isset($song->comment))
                        {{ $song->comment }}
                    @else
                        <span>※コメント登録されてません</span>
                    @endif
                </p>
                @include('follow.follow_button', ['user'=>$user])
                @include('favorite.favorite_button', ['song'=>$song])
            </div>
        </div>
    @endforeach
</div>
{{ $users->links('pagination::bootstrap-4') }}