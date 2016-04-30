<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEventTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('event', function (Blueprint $table) {
            $table->string('id');
            $table->string('title');
            $table->date('start');
            $table->date('end');
            $table->string('background_color');
            $table->string('border_color');
            $table->string('url');
            $table->string('content');
            // siswa, guru, wali murid
            $table->string('status');
            // rahasia, penting, formal
            $table->string('sifat');
            // sudah kirim reminder
            $table->boolean('is_remember');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('event');
    }
}
