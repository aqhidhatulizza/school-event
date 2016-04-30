<?php

use Illuminate\Database\Seeder;

class KlienSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('klien')->truncate();
        DB::table('klien')->insert([
            ['id' => 1, 'nama' => 'Agus Prasetyani', 'email' => 'arif@gmail.com', 'status' => 'tetap', 'no_hp' => '087658894729','created_at' => \Carbon\Carbon::now()],
            ['id' => 2, 'nama' => 'Bagus Sujatmikoni', 'email' => 'samsul@gmail.com', 'status' => 'diam', 'no_hp' => '0876588989297','created_at' => \Carbon\Carbon::now()],
            ['id' => 3, 'nama' => 'Putri Setyowatani', 'email' => 'rohman@gmail.com', 'status' => 'tersedia', 'no_hp' => '087657382498','created_at' => \Carbon\Carbon::now()],
        ]);
    }
}
