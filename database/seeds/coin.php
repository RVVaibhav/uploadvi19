<?php

use Illuminate\Database\Seeder;

class coin extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('coins')->truncate();
        DB::table('coins')->insert([[
            'coin_rs' => 1,
            'coins' => 10,
        ],[
            'coin_rs' => 5,
            'coins' => 50,
        ],[
            'coin_rs' => 10,
            'coins' => 100,
        ],[
            'coin_rs' => 25,
            'coins' => 250,
        ],[
            'coin_rs' => 50,
            'coins' => 500,
        ]]);
    }
}
