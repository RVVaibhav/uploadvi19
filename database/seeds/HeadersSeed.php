<?php

use Illuminate\Database\Seeder;
use Carbon\Carbon;
class HeadersSeed extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()  {
      //test_header_2_id, test_header_1_id, test_header_2, created_at, updated_at
          DB::table('test_header_2')->truncate();
          DB::table('test_header_2')->insert([[
              'test_header_1_id' => '1',
              'test_header_2'=> 'First Year',
              'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
              'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
          ],[
              'test_header_1_id' => '1',
                'test_header_2'=> 'Second Year',
                'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
          ],[
              'test_header_1_id' => '1',
                'test_header_2'=> 'Third Year',
                'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
          ],[
              'test_header_1_id' => '1',
                'test_header_2'=> 'Fourth Year',
                'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
          ],[
              'test_header_1_id' => '2',
                'test_header_2'=> 'Charaka',
                'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
          ],[
              'test_header_1_id' => '2',
                'test_header_2'=> 'Sushrut',
                'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
          ],[
              'test_header_1_id' => '2',
                'test_header_2'=> 'Vagbhat',
                'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
          ],[
              'test_header_1_id' => '2',
                'test_header_2'=> 'Other Samhita',
                'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
          ],[
              'test_header_1_id' => '3',
                'test_header_2'=> 'First Year',
                'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
          ],[
              'test_header_1_id' => '3',
                'test_header_2'=> 'Second Year',
                'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
          ],[
              'test_header_1_id' => '3',
                'test_header_2'=> 'Third Year',
                'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
          ],[
                'test_header_1_id' => '3',
                'test_header_2'=> 'Fourth Year',
                'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
          ]]);
      }  //

}
