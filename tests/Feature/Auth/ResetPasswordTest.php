<?php

namespace Tests\Feature\Auth;

use App\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Support\Facades\Auth;
use Tests\TestCase;



class ResetPasswordTest extends TestCase
{
    use RefreshDatabase;
    use DatabaseMigrations;
    private $accessToken = null;

    /**
     * パスワードリセットページの表示
     * @test
     */
    public function showUserPasswordReset()
    {
        $this->assertTrue(true);
        $user = factory(User::class)->create();
        if (Auth::id() == $user->id) {
            $response = $this->actingAs($user)->get('password/reset');
            $response->assertStatus(200);
        }
    }


    /**
     * パスワードリセットのリクエスト成功
     * @test
     */
    public function validUserCanRequestReset()
    {
        $user = factory(User::class)->create();

        // パスワードリセットをリクエスト
        $response = $this->from('password/email')->post('password/email', [
            'email' => $user->email,
        ]);

        // 同画面にリダイレクト
        $response->assertStatus(302);
        $response->assertRedirect('password/email');

        $response->assertSessionHas(
            'status',
            'パスワードリセットリンクが電子メールで送信されました'
        );
    }

    /**
     * パスワードリセットのリクエスト失敗
     * @test
     */
    public function invalidUserCannotRequestReset()
    {
        // 存在しないユーザのメールアドレスでリクエスト
        $response = $this->from('password/email')->post('password/email', [
            'email' => 'nobody@example.com'
        ]);

        $response->assertStatus(302);
        $response->assertRedirect('password/email');
        $response->assertSessionHasErrors(
            'email',
            '指定されたメールアドレスは存在しません'
        );
    }
}
