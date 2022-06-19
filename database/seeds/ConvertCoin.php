<?php

use Illuminate\Database\Seeder;

class ConvertCoin extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('convert_coins')->truncate();
        DB::table('convert_coins')->insert([[
            'convert_coin_rs' => 1,
            'convert_coin' => 10,
        ],[
            'convert_coin_rs' => 5,
            'convert_coin' => 50,
        ],[
            'convert_coin_rs' => 10,
            'convert_coin' => 100,
        ],[
            'convert_coin_rs' => 25,
            'convert_coin' => 250,
        ],[
            'convert_coin_rs' => 50,
            'convert_coin' => 500,
        ],[
            'convert_coin_rs' => 100,
            'convert_coin' => 250,
   		]]);
    }
}
