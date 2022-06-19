<?php

use Illuminate\Database\Seeder;

class SecretChat extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('secret_chats')->truncate();
        DB::table('secret_chats')->insert([[
            'secret_chat_min' => 1,
            'secret_chat_coin' => 10,
        ],[
            'secret_chat_min' => 2,
            'secret_chat_coin' => 100,
        ],[
            'secret_chat_min' => 3,
            'secret_chat_coin' => 500,
   		]]);
    }
}
