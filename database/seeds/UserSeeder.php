<?php

use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        DB::table('users')->truncate();
        DB::table('users')->insert([
            ['id' => 1, 'nama' => 'Agus Prasetyo', 'email' => 'Aqhidhatul@gmail.com', 'password' => 'qwerty', 'created_at' => \Carbon\Carbon::now()],
            ['id' => 2, 'nama' => 'Bagus Sujatmiko', 'email' => 'Izza@gmail.com', 'password' => 'qwery', 'created_at' => \Carbon\Carbon::now()],
            ['id' => 3, 'nama' => 'Putri Setyowati', 'email' => 'Iftitah@gmail.com', 'password' => 'qwerty', 'created_at' => \Carbon\Carbon::now()],
        ]);
    }
}
