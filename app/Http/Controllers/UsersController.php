<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

use App\User;
use App\Song;
use App\Country;

class UsersController extends Controller
{
    protected $user;

    public function __construct(User $user)
    {
        $this->user = $user;
    }

    public function index()
    {
        $users = User::orderBy('id','desc')->paginate(9);
        
        return view('home', compact('users'));
    }

    public function show($id)
    {
        $user = User::findOrFail($id);
        if(auth()->user()->id !== $user->id) {
            return back();
        }

        $songs = $user->songs()->orderBy('id', 'desc')->paginate(9);

        $data=[
            'user' => $user,
            'songs' => $songs,
        ];

        $data += $this->counts($user);

        return view('users.show',$data);
    }
    
    public function mypage($id)
    {
        $user = User::findOrFail($id);
        return view('users.my_detail', compact('user'));
    }

    public function editUser($id)
    {
        $user = User::findOrFail($id);
        $registeredCountryName = $user->country->country_name;
        $registeredAgeName = $user->age->age_name;
        $sexName = $user->sex;

        return view('users.user_edit', compact('user', 'registeredCountryName', 'registeredAgeName', 'sexName'));
    }

    public function updateUser(Request $request, $id)
    {
        $updatingUserInfo = User::findOrFail($id);
        $this->validate($request, $this->user->rules());
        $selectRequestParameter = $request
            ->only([
                'id', 
                'first_name', 
                'middle_name', 
                'last_name', 
                'email', 
                'country_id',
                'age_id',
                'sex'
            ]);
        // デッドロック時のトランザクションリトライ回数
        $retryTimes = 5;
        
        if (\Auth::id() == $id) {
            DB::transaction(function () use($selectRequestParameter, $updatingUserInfo) {
                $updatingUserInfo->fill($selectRequestParameter)->save();
            }, $retryTimes);
        }

        return redirect()->route('user.index');
    }

    // 削除完了
    public function deletePage($id)
    {
        $userComfirm = User::findOrFail($id);
        return view('users.user_confirm', compact('userComfirm'));
    }

    public function deleteUser($id)
    {
        $deletingUser = User::findOrFail($id);
        // デッドロック時のトランザクションリトライ回数
        $retryTimes = 5;
        DB::transaction(function () use($deletingUser) {
            $deletingUser->delete();
        }, $retryTimes);

        return redirect()->route('user.index');
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
