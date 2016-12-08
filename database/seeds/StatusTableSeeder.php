<?php

use Illuminate\Database\Seeder;

class StatusTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $date = new DateTime();
        DB::table('status')->insert([
            'code' => 'CREATE',
            'name' =>'Criado',
            'created_at' => $date
        ]);
    }
}
