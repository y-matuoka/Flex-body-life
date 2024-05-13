<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use App\User;
use App\GoalSetting;
use Illuminate\Support\Facades\Auth;

class GoalSettingControllerTest extends TestCase
{
    use RefreshDatabase;

    /**
     * Test if user can store a new goal setting.
     *
     * @return void
     */
    public function test_user_can_store_goal_setting()
    {
        // テストユーザーを作成
        $user = factory(User::class)->create();
        // テスト用の目標設定データ
        $data = [
            'goal_content' => 'Test goal content'
        ];
        // ユーザーでログイン
        Auth::login($user);
        // 目標設定をストアするリクエストを送信
        $response = $this->post(route('goal_setting.index'), $data);
        // ストアが成功したかどうかを確認
        $response->assertRedirect(route('goal.edit'));
        $this->assertDatabaseHas('goal_setting', $data);
    }

    /**
     * Test if user can update their goal setting.
     *
     * @return void
     */
    public function test_user_can_update_goal_setting()
    {
        // テストユーザーを作成
        $user = factory(User::class)->create();
        // テスト用の目標設定を作成
        $goalSetting = factory(GoalSetting::class)->create(['user_id' => $user->id]);
        // 更新用のデータ
        $data = [
            'goal_content' => 'Updated goal content'
        ];
        // ユーザーでログイン
        Auth::login($user);
        // 目標設定を更新するリクエストを送信
        $response = $this->put(route('goal_setting.update', $goalSetting->id), $data);
        // 更新が成功したかどうかを確認
        $response->assertRedirect(route('goal_setting.update'));
        $this->assertDatabaseHas('goal_setting', $data);
    }
}
