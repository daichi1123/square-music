<?php

namespace Tests\Feature\Auth;

use App\User;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Support\Facades\Auth;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Facades\DB;
use Tests\TestCase;

class LoginTest extends TestCase
{
    use RefreshDatabase;
    use DatabaseMigrations;
    private $accessToken = null;

    /**
     * ログイン処理
     * @test
     */
    public function login()
    {
        $user = factory(User::class)->create();
        // 認証されないことを確認
        $this->assertFalse(Auth::check());

        // ログイン処理
        $response = $this->post('login', [
            'email' => $user->email,
            'password' => 'example100'
        ]);

        $this->assertTrue(Auth::check());
        // ログイン後にトップページにリダイレクト
        $response->assertRedirect('/');
    }
}
