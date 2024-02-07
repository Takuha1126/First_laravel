<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Address;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call(WorkTableSeeder::class);

    }
}
