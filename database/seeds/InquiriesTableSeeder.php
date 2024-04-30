<?php

use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class InquiriesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('inquiries')->insert([
            'name' => 'testname',
            'emial' => 'test@email.com',
            'comment' => 'testtesttest',
            'created_at' => Carbon::now(),
            'modified_at' => Carbon::now(),
        ]);
    }
}
