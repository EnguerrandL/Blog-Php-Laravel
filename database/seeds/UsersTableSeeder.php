<?php

use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            'name' => 'Enguerrand',
            'email' => 'enguerrand@mail.fr',
            'password' => bcrypt('enguerrandadmin'),
        ]);
        // Laurent ALLEGRE
        DB::table('users')->insert([
            'name' => 'test',
            'email' => 'test@test.fr',
            'password' => bcrypt('testtest'),
        ]);
    }
}
