<?php
use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class Training_stretchesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //トレーニングデータ
        $training_stretches = [
        [
            'training_name' => 'スクワットストレッチ',
            'description' => '足を肩幅程度に開き、つま先は正面またはやや外側に開いた状態にする。',
            'training_image' => 'stretches.jpg',
            'training_level' => 0,//初級
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ],
        [
            'training_name' => 'スクワットストレッチ',
            'description' => '足を肩幅程度に開き、つま先は正面またはやや外側に開いた状態にする。',
            'training_image' => 'stretches.jpg',
            'training_level' => 1,//中級
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ],
        [
            'training_name' => 'スクワットストレッチ',
            'description' => '足を肩幅程度に開き、つま先は正面またはやや外側に開いた状態にする。',
            'training_image' => 'stretches.jpg',
            'training_level' => 2,//上級
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]
    ];

        //データベースに挿入
        foreach($training_stretches as $training){
            DB::table('training_stretches')->insert($training);
        }
    }
}
