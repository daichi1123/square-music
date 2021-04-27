<div class="songs row mt-3 text-center">
    @foreach ($songs as $key => $song)
        @if($loop->iteration % 3 == 1 && $loop->iteration != 1)
            </div>
            <div class="row text-center mt-3">
        @endif
            <div class="col-lg-4 mb-5">
                <div class="song text-left d-inline-block">
                    <div>
                        @if($song)
                            <div class="text-right">
                                <span class="badge badge-pill badge-danger">未実装</span>
                            </div>
                            <iframe src="{{ 'https://open.spotify.com/embed/playlist/'.$song->url }}?controls=1&loop=1&playlist={{ $song->url }}" width="300" height="380" frameborder="0" allowtransparency="true" allow="encrypted-media"></iframe>
                        @else
                            <div class="text-right">
                                <span class="badge badge-pill badge-danger">未実装</span>
                            </div>
                            <iframe src="https://open.spotify.com/embed/" width="300" height="380" frameborder="0"></iframe>
                        @endif
                    </div>
                    <p>
                        @if(isset($song->comment))
                               コメント：{{ $song->comment }}
                        @else
                            <span>※コメント登録されてません</span>
                        @endif
                    </p>
                    @if(Auth::id() == $song->user_id)
                        <form action="{{ route('songs.destroy', $song->id) }}" method='POST'>
                        @csrf
                        @method('DELETE')
                            <input type="submit" value="プレイリストを削除する" class="button btn btn-danger">
                        </form>
                    @endif
                </div>
            </div>
    @endforeach
</div>

{{ $songs->links('pagination::bootstrap-4') }}