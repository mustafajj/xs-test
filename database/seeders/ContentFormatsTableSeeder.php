<?php

namespace Database\Seeders;

use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ContentFormatsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('content_formats')->insert([
            ['name' => 'On-demand Videos', 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['name' => 'Events and Webinars', 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['name' => 'Articles and eBooks', 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['name' => 'Immersion Workshops', 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['name' => 'Technical Training', 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['name' => 'End User Training', 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
        ]);
    }
}
