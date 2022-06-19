<?php

use Illuminate\Database\Seeder;
use Carbon\Carbon;

class HeadersSeedT extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      DB::table('test_header_3')->truncate();//test_header_3_id, test_header_1_id, test_header_2_id, test_header_3, created_at, updated_at
      DB::table('test_header_3')->insert([[
          'test_header_1_id' => '1',
          'test_header_2_id'=> '1',
          'test_header_3'=> 'AYURVED',
          'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
          'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
      ],[
          'test_header_1_id' => '1',
            'test_header_2_id'=> '1',
            'test_header_3'=> 'MODERN',
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
      ],[
          'test_header_1_id' => '1',
          'test_header_2_id'=> '2',
            'test_header_3'=> 'AYURVED',
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
      ],[
          'test_header_1_id' => '1',
            'test_header_2_id'=> '2',
            'test_header_3'=> 'MODERN',
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
      ],[
          'test_header_1_id' => '1',
            'test_header_2_id'=> '3',//, , ,
            'test_header_3'=> 'AYURVED',
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
      ],[
          'test_header_1_id' => '1',
            'test_header_2_id'=> '3',
            'test_header_3'=> 'MODERN',
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
      ],[
          'test_header_1_id' => '1',
            'test_header_2_id'=> '4',
            'test_header_3'=> 'AYURVED',
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
      ],[
          'test_header_1_id' => '1',
            'test_header_2_id'=> '4',
            'test_header_3'=> 'MODERN',
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
      ],[
          'test_header_1_id' => '2',
            'test_header_2_id'=> '5',
            'test_header_3'=> 'STHAN',
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
      ],[
          'test_header_1_id' => '2',
            'test_header_2_id'=> '5',
            'test_header_3'=> 'MEGA TEST',
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
      ],[
          'test_header_1_id' => '2',
            'test_header_2_id'=> '6',
            'test_header_3'=> 'STHAN',
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
      ],[
          'test_header_1_id' => '2',
            'test_header_2_id'=> '6',
            'test_header_3'=> 'MEGA TEST',
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
      ],[
          'test_header_1_id' => '2',
            'test_header_2_id'=> '7',
            'test_header_3'=> 'STHAN',
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
      ],[
          'test_header_1_id' => '2',
            'test_header_2_id'=> '7',
            'test_header_3'=> 'MEGA TEST',
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
      ],[
          'test_header_1_id' => '2',
            'test_header_2_id'=> '8',
            'test_header_3'=> 'STHAN',
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
      ],[
          'test_header_1_id' => '2',
            'test_header_2_id'=> '8',
            'test_header_3'=> 'MEGA TEST',
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
      ],[
          'test_header_1_id' => '3',
            'test_header_2_id'=> '9',
            'test_header_3'=> 'STHAN',//Kashyap
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
      ],[
           'test_header_1_id' => '3',
            'test_header_2_id'=> '9',
            'test_header_3'=> 'MEGA TEST',//Kashyap
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
      ],[
          'test_header_1_id' => '3',
            'test_header_2_id'=> '10',
            'test_header_3'=> 'STHAN',
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
      ],[
           'test_header_1_id' => '3',
            'test_header_2_id'=> '10',
            'test_header_3'=> 'MEGA TEST',
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
      ],[
          'test_header_1_id' => '3',
            'test_header_2_id'=> '11',
            'test_header_3'=> 'STHAN',//Kashyap
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
      ],[
          'test_header_1_id' => '3',
            'test_header_2_id'=> '11',
            'test_header_3'=> 'MEGA TEST',//Kashyap
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
      ],[
          'test_header_1_id' => '3',
            'test_header_2_id'=> '12',
            'test_header_3'=> 'STHAN',//, , ,
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
      ],[
          'test_header_1_id' => '3',
            'test_header_2_id'=> '12',
            'test_header_3'=> 'MEGA TEST',//Kashyap
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
      ]]);
    }
}
