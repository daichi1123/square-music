<?php

namespace Tests\Feature\Song;

use App\User;
use App\Song;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Tests\TestCase;

class CreateSongTest extends TestCase
{
    use RefreshDatabase;
    use DatabaseMigrations;
    private $accessToken = null;

    /**
     * A basic feature test example.
     *
     * @test
     */
    public function createSong()
    {
        $this->assertTrue(true);
        $user = factory(User::class)->create();

        if (Auth::id() == $user->id) {
            $response = $this->actingAs($user)->get('/songs/create');
            $response->assertStatus(200);
        }
    }


    /**
     * A basic feature test example.
     *
     * @test
     */
    public function registerSong()

    {
        $this->assertTrue(true);
        $user = factory(User::class)->create();
        $song = new Song;
        $registerUrl = '5FxvEg7p95V0SjLFzS0fjq?si=08d0b1209c704ed5';
        $registerComment = 'this is a test';
        $retryTimes = 5;

        DB::transaction(function () use ($user, $song, $registerUrl, $registerComment) {
            $song->user_id = $user->id;
            $song->url = $registerUrl;
            $song->comment = $registerComment;
            $song->save();
        }, $retryTimes);
    }

    /**
     * A basic feature test example.
     *
     * @test
     */
    public function updateSong()
    {
        $this->assertTrue(true);
        $user = factory(User::class)->create();
        $song = factory(Song::class)->create();

        if ($user->id === $song->user_id) {
            $updateUrl = '5FxvEg7p95V0SjLFzS0fjq?si=08d0b1209c704ed5';
            $updateComment = 'this is a test';
            $retryTimes = 5;

            DB::transaction(function () use ($user, $song, $updateUrl, $updateComment) {
                $song->user_id = $user->id;
                $song->url = $updateUrl;
                $song->comment = $updateComment;
                $song->save();
            }, $retryTimes);
        }
    }
}
