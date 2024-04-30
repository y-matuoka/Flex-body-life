<?php
use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class EvaluationsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        $user = DB::table('users')->first();
        $course = DB::table('courses')->first();
        $goal_setting = DB::table('goal_settings')->first();
        
        if($user && $course && $goal_setting){
            DB::table('evaluations')->insert([
                'user_id'=> $user->id,
                'course_id'=> $course->id,
                'goal_setting_id'=> $goal_setting->id,
                'created_at'=> Carbon::now(),
                'updated_at'=> Carbon::now(),
        ]);
        }
    }
}
