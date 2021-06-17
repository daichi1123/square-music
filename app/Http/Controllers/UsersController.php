<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use App\Rules\HalfWidth;

use App\User;
use App\Song;
use App\Country;

class UsersController extends Controller
{
    protected $user;

    /**
     * ファイル内でUserデータをインスタンス化せずに使用可能にしている
     * 
     * @param  App\User $user
     */
    public function __construct(User $user)
    {
        $this->user = $user;
    }

    /**
     * ユーザ一覧を表示して、ユーザ毎に最新のプレイリストを一件表示
     * 
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = User::orderBy('id', 'desc')->paginate(9);

        return view('home', compact('users'));
    }

    /**
     * マイページで登録したプレイリスト・総いいね数・自己紹介文を表示する
     * 自身のプロフィール内容を変更するページに遷移可能
     * 
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $user = User::findOrFail($id);
        if (auth()->user()->id !== $user->id) {
            return back();
        }

        $songs = $user->songs()->orderBy('id', 'desc')->paginate(9);

        $data = [
            'user' => $user,
            'songs' => $songs,
        ];

        $data += $this->counts($user);

        return view('users.mypage', $data);
    }

    /**
     * 自身のユーザ情報を変更するためのページ表示
     * 
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function editUser($id)
    {
        if (Auth::id() == $id) {
            $user = User::findOrFail($id);
            $registeredCountryName = $user->country->country_name;
            $registeredAgeName = $user->age->age_name;
            $sexName = $user->sex;

            return view('users.user_edit', compact(
                'user',
                'registeredCountryName',
                'registeredAgeName',
                'sexName'
            ));
        } else {
            return back();
        }
    }

    /**
     * 自身のユーザ情報を更新する処理
     * 
     * @param  \Illuminate\Http\Request  $request
     * @param int $id
     * @return \Illuminate\Http\Response
     */
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
                'sex',
                'self_introduction',
                'insta_id'
            ]);
        // デッドロック時のトランザクションリトライ回数
        $retryTimes = 5;

        if (Auth::id() == $id) {
            DB::transaction(function () use ($selectRequestParameter, $updatingUserInfo) {
                $updatingUserInfo->fill($selectRequestParameter)->save();
            }, $retryTimes);
        }

        return redirect()->route('user.index');
    }

    /**
     * プレイリスト作成ページでinstagramのID登録or変更する処理
     * 
     * @param  \Illuminate\Http\Request  $request
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function updateInstaId(Request $request, $id)
    {
        $updatingUserInfo = User::findOrFail($id);
        $request->validate([
            'insta_id' => ['nullable', 'string', new HalfWidth, 'max:50']
        ]);
        $selectRequestParameter = $request
            ->only([
                'id',
                'insta_id',
            ]);
        // デッドロック時のトランザクションリトライ回数
        $retryTimes = 5;

        if (Auth::id() == $id) {
            DB::transaction(function () use ($selectRequestParameter, $updatingUserInfo) {
                $updatingUserInfo->fill($selectRequestParameter)->save();
            }, $retryTimes);
        }

        return back()->with('flash_message_insta', __('をInstagramのIDとして登録完了'));
    }

    /**
     * 自身のユーザ情報を削除するページを表示
     * 
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function deletePage($id)
    {
        if (Auth::id() == $id) {
            $userComfirm = User::findOrFail($id);
            return view('users.user_confirm', compact('userComfirm'));
        } else {
            return back();
        }
    }

    /**
     * 自身のユーザ情報を削除する処理
     * 
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function deleteUser($id)
    {
        $deletingUser = User::findOrFail($id);
        // デッドロック時のトランザクションリトライ回数
        $retryTimes = 5;
        DB::transaction(function () use ($deletingUser) {
            $deletingUser->delete();
        }, $retryTimes);

        return redirect()->route('user.index');
    }

    /**
     * フォローしている数・ユーザを表示する
     * 
     * @param int $id
     * @return \Illuminate\Http\Response
     */
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

    /**
     * フォローされている数・ユーザを表示する
     * 
     * @param int $id
     * @return \Illuminate\Http\Response
     */
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

    /**
     * ユーザの名前・国名でユーザを検索する
     * 
     * @param  \Illuminate\Http\Request  $request
     * @param  App\Song $songs
     * @return \Illuminate\Http\Response
     */
    public function search(Request $request, Song $songs)
    {
        $query = User::query();
        $countries = Country::pickUpColumn();

        $searchName = $request->input('first_name');
        $countryId = $request->input('country_id');

        if (isset($searchName)) {
            $query->where('first_name', 'like', '%' . $searchName . '%');
        }
        if (isset($countryId)) {
            $query->where('country_id', $countryId);
        }

        $users = $query->orderBy('first_name', 'asc')->paginate(9);

        return view('users.search', compact('users', 'countries', 'songs'));
    }

    /**
     * 個別ユーザの詳細情報を表示する
     * 
     * @param  App\Song $song
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function showDetail(Song $song, $id)
    {
        $user = User::find($id);
        $songs = $user->songs()->orderBy('id', 'desc')->paginate(9);

        $data = [
            'user' => $user,
            'songs' => $songs,
        ];

        $data += $this->counts($user);

        return view('users.user_detail', compact('user', 'songs', 'data'));
    }
}
