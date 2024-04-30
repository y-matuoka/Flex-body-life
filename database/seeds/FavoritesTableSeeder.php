<?php

use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class FavoritesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('favorites')->insert([
            'user_id' => 1,
            'stretches_id' => 1,
            'muscle_training_id' => 2,
            'training_mix_id' => 3,
            'created_at' => Carbon::now(),
            'modified_at' => Carbon::now(),
        ]);
    }
}
