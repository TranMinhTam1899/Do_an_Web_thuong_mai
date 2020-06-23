<?php

use Illuminate\Database\Seeder;

class PostTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //title	short_desc	desc	author_id	status	created_at	updated_at	
        DB::table('posts')->insert([
            'title' => 'post mau',
            'short_desc' => 'abc',
            'desc' => 'abcdef',
            'author_id' =>  '1',
            'status' => '1',
                   
        ]);
    }
}
