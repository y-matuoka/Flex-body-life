<?php

use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //テストデータ
        DB::table('users')->insert([
            'name' => 'testname',
            'email' => 'test@email.com',
            'password' => bcrypt('test0000'),
            'image' => null,
            'delflag' => 0,
            'remenber_token' => null,
            'email_verified_at' => Carbon::now(),
            'authority' => 1,
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);
    }
}
