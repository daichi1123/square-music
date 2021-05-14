<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

use App\User; 
use App\Song; 

class SongsController extends Controller
{
    /**
     * 他のメソッドでSongクラスをインスタンス化せずに使用可能にしている
     * 
     * @param  App\Song $song
     */
    public function __construct(Song $song)
    {
        $this->song = $song;
    }

    /**
     * プレイリスト登録ページに遷移・自身が持っているプレイリスト一覧を表示
     */
    public function create()
    {
        $user = \Auth::user();
        $songs = $user->songs()->orderBy('id', 'desc')->paginate(9);
        
        $data = [
            'user' => $user,
            'songs' => $songs,
        ];
        
        return view('songs.create', $data);
    }

    /**
     * プレイリスト登録ページで登録した内容を登録
     * 
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, $this->song->rules());
        $newSongInfo = $request;
        // デッドロック発生時のトランザクション再試行回数
        $retryTimes = 5;
        DB::transaction(function () use($newSongInfo, $retryTimes) {
            $newSongInfo->user()->songs()->create([
                'url' => $newSongInfo->url,
                'comment' => $newSongInfo->comment,
            ]);
        }, $retryTimes);

        return back()->with('flash_message_store', __('プレイリスト作成に成功しました。'));
    }

    /**
     * 指定したプレイリストを削除
     * 
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $deletingSong = Song::findOrFail($id);
        // デッドロック発生時のトランザクション再試行回数
        $retryTimes = 5;
        if(\Auth::id() == $deletingSong->user_id) {
            DB::transaction(function () use($deletingSong, $retryTimes) {
                $deletingSong->delete();
            }, $retryTimes);   
        }

        return back()->with('flash_message_delete', __('プレイリスト削除に成功しました。'));
    }
}
