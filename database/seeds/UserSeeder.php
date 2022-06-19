<?php

use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            'name' => 'vaibhav',
            'gender' => 'male',
            'mobile' => '9595095220',
            'role' => 'admin',
            'password' => bcrypt('admin321'),
        ],[
            'name' => 'amol',
            'gender' => 'male',
            'mobile' => '860083786',
            'role' => 'admin',
            'password' => bcrypt('admin321'),
        ],[
            'name' => 'suraj',
            'gender' => 'male',
            'mobile' => '9561784087',
            'role' => 'admin',
            'password' => bcrypt('admin321'),
        ],[
            'name' => 'gauri',
            'gender' => 'male',
            'mobile' => '7276885293',
            'role' => 'admin',
            'password' => bcrypt('admin321'),
        ]);
    }
}
