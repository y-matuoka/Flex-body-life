<?php

namespace Tests\Unit;

use Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;
use App\User;
use App\Course;
use Carbon\Carbon;
use Database\Factories\UserFactory;

class CourseUpdateTest extends TestCase
{
    use RefreshDatabase;
    /**
     * A basic unit test example.
     *
     * @return void
     */

    public function testUpdateMethod()
    {
        $user = factory(User::class)->create();
        $course = factory(Course::class)->create(['user_id' => $user->id ]);

        //リクエストを送信してコースを更新
        $response = $this->actingAs($user)->post(route('course.edit', [
            'button1' => true,
            'id' => $course->id,
        ]));

        //データベースにコース１が更新されてるか
        $this->assertDatabaseHas('courses',[
            'id' => $course->id,
            'course' => '1',
            'Achievement_date' => Carbon::now()->addDay(7)->toDateTimeString(),
        ]);
        // リクエストを送信してコースを2に変更
        $response = $this->actingAs($user)->post(route('course.edit', [
            'button2' => true,
            'id' => $course->id,
        ]));
        
        //リダイレクト
        $response->assertRedirect(route('courses.updated'));

        //データベースにコース２が更新されてるか
        $this->assertDatabaseHas('courses',[
            'id' => $course->id,
            'course' => '2',
            'Achievement_date' => Carbon::now()->addDay(7)->toDateTimeString(),
        ]);
    }
}
