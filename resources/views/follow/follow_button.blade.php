@if(Auth::check())

    @if (Auth::id() != $user->id)

        @if (Auth::user()->is_following($user->id))
        
        <form action="{{ route('unfollow', $user->id) }}" method="POST" style='text-align: right; display: inline'>
        @csrf
        @method('DELETE')
            <input type="submit" value="アンフォロー" class="button btn btn-danger unfollow-button">
        </form>
            
        @else
        
        <form action="{{ route('follow', $user->id) }}" method="POST">
        @csrf
        @method('POST')
            <input type="submit" value="フォローする" class="button btn btn-primary follow-button">
        </form>

        
            
        @endif
    
    @endif

@endif

<style>

</style>