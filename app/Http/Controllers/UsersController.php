<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\User;
use App\Song;
use App\Country;

class UsersController extends Controller
{
    public function index()
    {
        $users = User::orderBy('id','desc')->paginate(9);
        
        return view('home', compact('users'));
    }

    public function show($id)
    {
        $user = User::find($id);
        $songs = $user->songs()->orderBy('id', 'desc')->paginate(9);

        $data=[
            'user' => $user,
            'songs' => $songs,
        ];

        $data += $this->counts($user);

        return view('users.show',$data);
    }

    public function followings($id)
    {
        $user = User::find($id);
        $followings = $user->followings()->paginate(9);

        $data = [
            'user' => $user, 
            'users' => $followings, 
        ];

        $data += $this->counts($user);

        return view('users.followings', $data);
    }

    public function followers($id)
    {
        $user = User::find($id);
        $followers = $user->followers()->paginate(9);

        $data = [
            'user' => $user,
            'users' => $followers,
        ];

        $data += $this->counts($user);

        return view('users.followers', $data);
    }
    
    public function search(Request $request, Song $songs) {
        $query = User::query();
        $countries = Country::pickUpColumn();

        $searchName = $request->input('first_name');
        $countryId = $request->input('country_id');

        if (isset($searchName)) {
            $query->where('first_name', 'like', '%'.$searchName.'%');
        }
        if (isset($countryId)) {
            $query->where('country_id', $countryId);
        }

        $users = $query->orderBy('first_name', 'asc')->paginate(9);

        return view('users.search', compact('users', 'countries', 'songs'));
    }

    public function showDetail(Song $song, $id)
    {
        $user = User::find($id);
        $songs = $user->songs()->orderBy('id', 'desc')->paginate(9);

        $data=[
            'user' => $user,
            'songs' => $songs,
        ];

        $data += $this->counts($user);

        return view('users.user_detail', compact('user', 'songs', 'data'));
    }
}
