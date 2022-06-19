<?php

use Illuminate\Database\Seeder;
use Carbon\Carbon;

class ComponentSeeders extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      DB::table('master_component')->truncate();
      DB::table('master_component')->insert([[
          'component_name' => 'Free Tests',
          'component_uri'=> 'dailytest.png',
          'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
          'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
      ],[
        'component_name' => 'AIAPGET',
        'component_uri'=> 'logo.png',
        'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
        'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
      ],[
        'component_name' => 'Subscribe',
        'component_uri'=> 'membership.png',
        'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
        'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
      ],[
        'component_name' => 'Other Exam',
        'component_uri'=> 'test_series.png',
        'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
        'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
      ],[
        'component_name' => 'Audio Video',
        'component_uri'=> 'vedio_lecture.png',
        'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
        'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
      ],[
        'component_name' => 'Reading Stuff',
        'component_uri'=> 'readingmaterial.png',
        'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
        'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
      ],[
        'component_name' => 'Study Tips',
        'component_uri'=> 'study_tips.png',
        'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
        'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
      ],[
        'component_name' => 'Mnemonics',
        'component_uri'=> 'menmonics.png',
        'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
        'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
      ],[
        'component_name' => 'UG Student',
        'component_uri'=> 'graduate.png',
        'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
        'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
      ],[
        'component_name' => 'Q Format',
        'component_uri'=> 'dailytest.png',
        'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
        'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
      ],[
        'component_name' => 'How to Use',
        'component_uri'=> 'question_mark.png',
        'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
        'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
      ],[
        'component_name' => 'My wallet',
        'component_uri'=> 'wallet.png',
        'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
        'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
      ],[
        'component_name' => 'Invite Friend',
        'component_uri'=> 'invite_friends.png',
        'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
        'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
      ],[
        'component_name' => 'My Profile',
        'component_uri'=> 'profile.png',
        'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
        'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
      ],[
        'component_name' => 'About Us',
        'component_uri'=> 'aboutus.png',
        'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
        'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
      ],[
        'component_name' => 'Ambiguity',
        'component_uri'=> 'query.png',
        'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
        'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
      ],[
        'component_name' => 'Games',
        'component_uri'=> 'greetings.png',
        'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
        'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
      ],[
        'component_name' => 'FAQ',
        'component_uri'=> 'faq.png',
        'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
        'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
      ]]);
    }
}
