<?php

use Illuminate\Database\Seeder;
use Carbon\Carbon;

class Headers extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      DB::table('test_header_1')->truncate();
        DB::table('test_header_1')->insert([[
            'header_1' => 'BAMS',
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
        ],[
            'header_1' => 'SAMHITA',
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
        ],[
            'header_1' => 'SET',
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
        ]]);
    }
}
