<?php

use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class Training_mixesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //トレーニングデータ
        $training_mixes = [
        [
            'training_name' => 'ミックス',
            'description' => 'ランダム詳細',
            'training_image' => 'squat.jpg',
            'training_ level' => 0,//初級
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ],
        [
            'training_name' => 'ミックス2',
            'description' => 'ランダム詳細',
            'training_image' => 'squat.jpg',
            'training_ level' => 1,//中級
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]
    ];

        //データベースに挿入
        foreach($training_mixes as $mix){
            DB::table('training_mixes')->insert($mix);
        }
    }
}
