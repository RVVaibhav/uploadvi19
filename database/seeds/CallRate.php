<?php

use Illuminate\Database\Seeder;

class CallRate extends Seeder{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('call_rates')->truncate();
        DB::table('call_rates')->insert([[
            'call_type' => 'Video Call',
            'coin_per_sec' => 10,
        ],[
            'call_type' => 'Audio Call',
            'coin_per_sec' => 5,
        ]]);
    }
}
