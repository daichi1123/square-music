<div class="movies row mt-5 text-center">
    @foreach ($songs as $key => $song)
        @if($loop->iteration % 3 == 1 && $loop->iteration != 1)
            </div>
            <div class="row text-center mt-3">
        @endif
            <div class="col-lg-4 mb-5">
                <div class="song text-left d-inline-block">
                    <div>
                        @if($song)
                            <iframe src="{{ 'https://open.spotify.com/embed/playlist/'.$song->url }}?controls=1&loop=1&playlist={{ $song->url }}" width="300" height="380" frameborder="0" allowtransparency="true" allow="encrypted-media"></iframe>
                        @else
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
                </div>
            </div>
    @endforeach
</div>

{{ $songs->links('pagination::bootstrap-4') }}