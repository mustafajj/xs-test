<?php

namespace Database\Seeders;

use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CategoriesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('categories')->insert([
            ['name' => 'Hybrid Work', 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['name' => 'Hybrid Work Research', 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['name' => 'Hybrid Work Resources', 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['name' => 'Modern Collaboration', 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['name' => 'Employee Experience', 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['name' => 'Next Gen Endpoints and Devices', 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
        ]);
    }
}
