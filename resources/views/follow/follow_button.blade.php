@if(Auth::check())
    @if (Auth::id() != $user->id)
        @if (Auth::user()->is_following($user->id))
        <form action="{{ route('unfollow', $user->id) }}" method="POST" style="display: grid;">
        @csrf
        @method('DELETE')
            <input class="button btn btn-danger unfollow-button" type="submit" value="アンフォロー" />
        </form>
        @else
        <form action="{{ route('follow', $user->id) }}" method="POST" style="display: grid;">
        @csrf
        @method('POST')
            <input class="button btn btn-primary follow-button" type="submit" value="フォローする" />
        </form>
        @endif
    @endif
@endif
