<?php

use Illuminate\Database\Seeder;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            'name' => 'Berg',
            'email' => 'berg@stickpaper.com.br',
            'password' => bcrypt('berg123'),
            'admin' => 1
        ]);
        DB::table('users')->insert([
            'name' => 'Dhiego',
            'email' => 'vieira.dhiego@gmail.com',
            'password' => bcrypt('senhadhg44'),
            'admin' => 1
        ]);
    }
}
