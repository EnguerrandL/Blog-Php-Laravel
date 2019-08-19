<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PostsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // DB::table('posts')->insert([
        //     'title' => 'Title from seeders',
        //     'content' => 'Content from seeders',
        //     'picture' => '', 
        //     'active' => 0, 
        //     'created_at' => '2019-08-08 00:00:00',
        //     'updated_at' => '2019-08-20 00:00:00',
        // ]);
        
        for ($i = 1; $i < 20; $i++) {
        DB::table('posts')->insert([
            'title' => Str::random(10),
            'content' => Str::random(255),
            'active' => rand(0,1), 
            'created_at' => new DateTime('now'),
            'updated_at' => new DateTime('now'),
            
        ]);
        
        }
    }
}
