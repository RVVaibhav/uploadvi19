<?php

use Illuminate\Database\Seeder;
use Carbon\Carbon;
class TestHeaders extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      DB::table('test_details')->truncate();
//test_id
      DB::table('test_details')->insert([[
          'test_header_3_id' => '0',
          'test_header_1_id'=> '1',
          'test_header_2_id' => '0',
          'test_header_4_id'=> '0',
          'test_name' => 'Demo',
          'description'=> 'Demo test',
          'duration' => '1',
          'start_date'=> '2020-06-30',
          'expire_date' => '2020-06-30',
          'attempt_limit'=> '3',
          'correct_score' => '1',
          'is_view_correct_answers_allowed'=> 1,
          'incorrect_score' => '1.5',
          'admin_id' =>1,
          'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
          'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
      ]]);
    }
}
