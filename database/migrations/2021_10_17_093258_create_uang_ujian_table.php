<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUangUjianTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('uang_ujian', function (Blueprint $table) {
            $table->bigIncrements('id_uang_ujian');
            $table->bigInteger('id_siswa');
            $table->bigInteger('nominal');
            $table->string('periode', '50');
            $table->date('tanggal');
            $table->time('waktu');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('uang_ujian');
    }
}
