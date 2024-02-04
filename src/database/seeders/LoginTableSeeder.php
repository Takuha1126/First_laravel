<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class LoginTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $param = [
        'name' => 'tory',
        'email' => 'text@icloud.com',
        'password' => '1126',
        ];
        DB::table('Addresses')->insert($param);
        $param = [
        'name' => 'nancy',
        'email' => 'text@icloud.com',
        'password' => '5512',
        ];
        DB::table('Addresses')->insert($param);
    }
}
