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
            ['id' => 1, 'nama' => 'Agus Prasetyo', 'email' => 'aqhidhatul@gmail.com', 'password' => bcrypt('qwerty'), 'created_at' => \Carbon\Carbon::now()],
            ['id' => 2, 'nama' => 'Bagus Sujatmiko', 'email' => 'izza@gmail.com', 'password' => bcrypt('qwerty'), 'created_at' => \Carbon\Carbon::now()],
            ['id' => 3, 'nama' => 'Putri Setyowati', 'email' => 'iftitah@gmail.com', 'password' => bcrypt('qwerty'), 'created_at' => \Carbon\Carbon::now()],
            ['id' => 4, 'nama' => 'Putri Setyowati', 'email' => 'admin@mail.com', 'password' => bcrypt('qwerty'), 'created_at' => \Carbon\Carbon::now()],
        ]);
    }
}
