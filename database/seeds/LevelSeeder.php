<?php

use Illuminate\Database\Seeder;

class LevelSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::statement('SET FOREIGN_KEY_CHECKS=0;');
        DB::table('algorithms')->truncate();
        DB::table('slideusers')->truncate();
        DB::table('levels')->truncate();
        DB::statement('SET FOREIGN_KEY_CHECKS=1;');
        DB::table('levels')->insert([[
            'levelno' => '1',
            'from_coin' => 0,
            'to_coin' => 15,
        ],[
            'levelno' => '2',
            'from_coin' => 16,
            'to_coin' => 50,
        ],[
            'levelno' => '3',
            'from_coin' => 50,
            'to_coin' => 100,
   		]]);
    }
}
