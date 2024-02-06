<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;


class WorkTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $param = [
            'user_id' => 1,
            'start_time' => '2024-11-10 8:00:00',
            'end_time' => '2024-11-10 17:00:00',
        ];
        DB::table('works')->insert($param);
        $param = [
            'user_id' => 2,
            'start_time' => '2024-11-10 8:00:00',
            'end_time' => '2024-11-10 17:00:00',
        ];
        DB::table('works')->insert($param);
        $param = [
            'user_id' => 3,
            'start_time' => '2024-11-10 8:00:00',
            'end_time' => '2024-11-10 17:00:00',
        ];
        DB::table('works')->insert($param);
        $param = [
            'user_id' => 4,
            'start_time' => '2024-11-10 8:00:00',
            'end_time' => '2024-11-10 17:00:00',
        ];
        DB::table('works')->insert($param);
        $param = [
            'user_id' => 5,
            'start_time' => '2024-11-10 8:00:00',
            'end_time' => '2024-11-10 17:00:00',
        ];
        DB::table('works')->insert($param);
        $param = [
            'user_id' => 6,
            'start_time' => '2024-11-10 8:00:00',
            'end_time' => '2024-11-10 17:00:00',
        ];
        DB::table('works')->insert($param);
    }
}
