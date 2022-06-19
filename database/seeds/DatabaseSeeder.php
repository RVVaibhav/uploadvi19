<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // $this->call(UsersTableSeeder::class);
        $this->call(UserSeeder::class);
        $this->call(headers::class);
        $this->call(HeadersSeed::class);
        $this->call(HeadersSeedT::class);
        $this->call(Headers::class);
        $this->call(HeadersFour::class);

    }
}
