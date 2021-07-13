<?php

namespace Tests\Feature\Auth;

use App\User;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Support\Facades\Auth;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class LogoutTest extends TestCase
{
    use RefreshDatabase;
    use DatabaseMigrations;
    private $accessToken = null;

    /**
     * ログアウト処理
     * @test
     */
    public function logout()
    {
        $user = factory(User::class)->create();
        $this->actingAs($user)
            ->assertTrue(Auth::check());
        $response = $this->post('logout');

        // 認証されていない状態
        $this->assertFalse(Auth::check());
        $response->assertRedirect('/');
        $response->assertStatus(302);
    }
}
