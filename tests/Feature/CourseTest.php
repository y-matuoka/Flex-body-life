<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use App\User;
use App\Course;
use Carbon\Carbon;

class CourseTest extends TestCase
{
    use RefreshDatabase;

    public function test_store_with_button1()
    {
        $user = factory(User::class)->create(); ;

        $response = $this->actingAs($user)->post('/courses/index', [
            'button1' => 'true'
        ]);

        $response->assertRedirect('/training/index');
        $this->assertDatabaseHas('courses', [
            'user_id' => $user->id,
            'course' => 1,
            'Achievement_date' => Carbon::now()->addDay(7),
        ]);
    }
}

