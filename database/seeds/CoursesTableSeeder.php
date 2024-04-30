<?php

use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CoursesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('courses')->insert([
            'user_id' => 1,
            'course' => 0,
            'created_at' => Carbon::now(),
            'modified_at' => Carbon::now(),
        ]);
    }
}
