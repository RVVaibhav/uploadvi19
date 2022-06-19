<?php

use Illuminate\Database\Seeder;

class headersT extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('test_header_2')->truncate();
        DB::table('test_header_2')->insert([[
            'header_1' => 'ALL',
        ],[
            'header_1' => 'SOLVED',
        ],[
            'header_1' => 'UNSOLVED',
        ]]);
    }
}
