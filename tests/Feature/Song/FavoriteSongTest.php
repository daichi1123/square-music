<?php

namespace Tests\Feature\Song;

use App\User;
use App\Song;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class FavoriteSongTest extends TestCase
{
    use RefreshDatabase;

    /**
     * 引数がnullの場合
     *
     * @test
     */
    public function isFavoriteByNull()
    {
        $song = factory(Song::class)->create();
        $result = $song->isFavoriteBy(null);
        $this->assertFalse($result);
    }

    /**
     * いいねしている場合
     *
     * @test
     */
    public function isFavoriteByTheUser()
    {
        $song = factory(Song::class)->create();
        $user = factory(User::class)->create();
        $song->favorites()->attach($user);

        $result = $song->isFavoriteBy($user);

        $this->assertTrue($result);
    }

    /**
     * いいねしていない場合
     *
     * @test
     */
    public function isLikedByAnother()
    {
        $song = factory(Song::class)->create();
        $user = factory(User::class)->create();
        $another = factory(User::class)->create();
        $song->favorites()->attach($another);

        $result = $song->isFavoriteBy($user);

        $this->assertFalse($result);
    }
}
