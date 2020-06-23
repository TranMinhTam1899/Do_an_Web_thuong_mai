<?php

use Illuminate\Database\Seeder;

class ImgsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        DB::table('imgs')->insert([
            'produce_id' => '1',
            'user_id' => '1',
            'post_id' => '1',
            'url' =>  'public/upload/1.img',
            'style' => '1',
            'status' => '1',           
        ]);
        DB::table('imgs')->insert([
            'produce_id' => '2',
            'user_id' => '2',
            'post_id' => '1',
            'url' =>  'public/upload/2.img',
            'style' => '1',
            'status' => '1',           
        ]);
        DB::table('imgs')->insert([
            'produce_id' => '3',
            'user_id' => '3',
            'post_id' => '1',
            'url' =>  'public/upload/3.img',
            'style' => '1',
            'status' => '1',           
        ]);
        DB::table('imgs')->insert([
            'produce_id' => '4',
            'user_id' => '4',
            'post_id' => '1',
            'url' =>  'public/upload/4.img',
            'style' => '1',
            'status' => '1',           
        ]);
    }
}
