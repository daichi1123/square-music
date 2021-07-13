<?php

namespace Tests\Feature\User;

use App\User;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Support\Facades\Auth;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Facades\DB;
use Tests\TestCase;

class FollowUserTest extends TestCase
{
    use RefreshDatabase;
    use DatabaseMigrations;
    private $accessToken = null;

    /**
     * 引数がnullの場合
     *
     * @test
     */
    public function isFollowedByNull()
    {
        $user = factory(User::class)->create();
        $result = $user->isFollowedBy(null);
        $this->assertFalse($result);
    }

    /**
     * followしている場合
     *
     * @test
     */
    public function isFollowedByAnotherUser()
    {
        $user = factory(User::class)->create();
        $another = factory(User::class)->create();
        $user->followings()->attach($another);

        $result = $another->isFollowedBy($user);

        $this->assertTrue($result);
    }

    /**
     * followされている場合
     *
     * @test
     */
    public function isFollowedByMe()
    {
        $another = factory(User::class)->create();
        $user = factory(User::class)->create();
        $another->followers()->attach($user);

        $result = $another->isFollowedBy($user);

        $this->assertTrue($result);
    }
}
