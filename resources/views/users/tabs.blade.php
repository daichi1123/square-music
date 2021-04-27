<h1 class="text-right">{{ $user->first_name }}</h1>

@include('follow.follow_button', compact('user'))

<ul class="nav nav-tabs nav-justified mt-5 mb-2">
    <li class="nav-item nav-link {{ Request::is('users/' . $user->id) ? 'active' : '' }}"><a href="{{ route('users.show',['id'=>$user->id]) }}" class="">My Playlist<br><div class="badge badge-secondary">{{ $count_songs }}</div></a></li>
    <li class="nav-item nav-link {{ Request::is('users/*/followers') ? 'active' : '' }}"><a href="{{ route('followers',['id'=>$user->id]) }}" class="">フォロワー<br><div class="badge badge-secondary">{{ $count_followers }}</div></a></li>
    <li class="nav-item nav-link {{ Request::is('users/*/followings') ? 'active' : '' }}"><a href="{{ route('followings',['id'=>$user->id]) }}" class="">フォロー中<br><div class="badge badge-secondary">{{ $count_followings }}</div></a></li>
</ul>