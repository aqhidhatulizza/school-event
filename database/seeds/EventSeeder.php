<?php

use Illuminate\Database\Seeder;

class EventSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('event')->truncate();
        DB::table('event')->insert([
            ['id' => 01, 'title' => 'Hari Kemerdekaan RI','start' => '2016-04-21', 'end' => '2016-04-21', 'background_color' => 'kuning', 'url' => 'www.lazada.com', 'content' => 'wali_murid', 'status' => 'Segera', 'sifat' => 'sudah kirim', 'is_remember' => 'Segera', 'created_at' => \Carbon\Carbon::now()],
            ['id' => 02, 'title' => 'Hari Raya Waisak','start' => '2016-04-9', 'end' => '2016-04-9', 'background_color' => 'hijau', 'url' => 'www.travellock.com', 'content' => 'guru', 'status' => 'Sangat Rahasia', 'sifat' => 'sudah kirim', 'is_remember' => 'Segera', 'created_at\'created_at' => \Carbon\Carbon::now()],
            ['id' => 03, 'title' => 'Hari Kebangkitan Nasional','start' => '2016-04-10', 'end' => '2016-04-10', 'background_color' => 'merah ', 'url' => 'www.tokopedia.com', 'content' => 'siswa', 'status' => 'Rahasia', 'sifat' => 'kirim,', 'is_remember' => 'Segera', 'created_at\'created_at' => \Carbon\Carbon::now()],
            ['id' => 04, 'title' => 'Hari Guru Nasional','start' => '2016-04-20', 'end' => '2016-04-22', 'background_color' => 'ungu ', 'url' => 'www.tokobagus.com', 'content' => 'guru', 'status' => 'Sangat Rahasia', 'sifat' => ',kirim', 'is_remember' => 'Segera', 'created_at' => \Carbon\Carbon::now()],
            ['id' => 05, 'title' => 'Hari PGRI','start' => '2016-04-20', 'end' => '2016-04-20', 'background_color' => 'coklat', 'url' => 'www.laravel.com', 'content' => 'siswa', 'status' => 'Rahasia', 'sifat' => 'kirim', 'is_remember' => 'Segera', 'created_at' => \Carbon\Carbon::now()],
        ]);
    }
}
