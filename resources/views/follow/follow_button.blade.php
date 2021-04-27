@if(Auth::check())

    @if (Auth::id() != $user->id)

        @if (Auth::user()->is_following($user->id))
        
        <form action="{{ route('unfollow', $user->id) }}" method="POST">
        @csrf
        @method('DELETE')
            <input type="submit" value="アンフォロー" class="button btn btn-danger mt-1">
        </form>
            
        @else
        
        <form action="{{ route('follow', $user->id) }}" method="POST">
        @csrf
        @method('POST')
            <input type="submit" value="フォローする" class="button btn btn-primary mt-1">
        </form>

        
            
        @endif
    
    @endif

@endif