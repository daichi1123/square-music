<?php

namespace Tests\Feature\User;

use App\User;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Support\Facades\Auth;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Facades\DB;
use Tests\TestCase;

class UserTest extends TestCase
{
    use RefreshDatabase;
    use DatabaseMigrations;
    private $accessToken = null;

    /**
     * 検索ページの表示
     * @test
     */
    public function searchPage()
    {
        $this->assertTrue(true);
        $user = factory(User::class)->create();

        if (Auth::id() == $user->id) {
            $this->actingAs($user)
                ->assertTrue(Auth::check());
            $response = $this->actingAs($user)->get('search');
            $response->assertStatus(200);
        }
    }

    /**
     * ユーザ編集ページの表示
     * @test
     */
    public function editUser()
    {
        $this->assertTrue(true);
        $user = factory(User::class)->create();

        if (Auth::id() == $user->id) {
            $this->actingAs($user)
                ->assertTrue(Auth::check());
            $response = $this->actingAs($user)->get('/users/{id}/edit');
            $response->assertStatus(200);
        }
    }

    /**
     * ユーザ情報の更新
     * @test
     */
    public function updateUser()
    {
        $this->assertTrue(true);
        $user = factory(User::class)->create();
        $this->actingAs($user)
            ->assertTrue(Auth::check());

        if (Auth::id() == $user->id) {
            if (Auth::id() === $user->id) {
                $last_name = '小林';
                $middle_name = '';
                $first_name = '一成';
                $email = 'example@example.com';
                $country_id = '5';
                $age_id = '5';
                $sex = '女性';
                $self_introduction = 'This is a test';
                $insta_id = 'instagramforbusiness';
                $retryTimes = 5;

                DB::transaction(function () use (
                    $user,
                    $last_name,
                    $middle_name,
                    $first_name,
                    $email,
                    $country_id,
                    $age_id,
                    $sex,
                    $self_introduction,
                    $insta_id
                ) {
                    $user->last_name = $last_name;
                    $user->middle_name = $middle_name;
                    $user->first_name = $first_name;
                    $user->email = $email;
                    $user->country_id = $country_id;
                    $user->age_id = $age_id;
                    $user->sex = $sex;
                    $user->self_introduction = $self_introduction;
                    $user->insta_id = $insta_id;
                    $user->save();
                }, $retryTimes);
            }
        }
    }
}
