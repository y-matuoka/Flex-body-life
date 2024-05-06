<?php

use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class Training_musclesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //トレーニングデータ
        $training_muscles =[
        [
            'training_name' => 'スクワット',
            'description' => '足を肩幅程度に開き、つま先は正面またはやや外側に開いた状態にする。',
            'training_image' => 'squat.jpg',
            'training_level' => 0,//初級
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ],
        [
            'training_name' => 'スクワット',
            'description' => '足を肩幅程度に開き、つま先は正面またはやや外側に開いた状態にする。',
            'training_image' => 'squat.jpg',
            'training_level' => 1,//中級
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ],
        [
            'training_name' => 'スクワット',
            'description' => '足を肩幅程度に開き、つま先は正面またはやや外側に開いた状態にする。',
            'training_image' => 'squat.jpg',
            'training_level' => 2,//上級
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]
    ];
        //データベースに挿入
        foreach($training_muscles as $muscle){
            DB::table('training_muscles')->insert($muscle);
        }
    }
}