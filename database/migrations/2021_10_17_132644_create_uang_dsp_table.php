<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUangDspTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('uang_dsp', function (Blueprint $table) {
            $table->bigIncrements('id_uang_dsp');
            $table->bigInteger('id_siswa');
            $table->bigInteger('nominal');
            $table->string('keterangan', '50');
            $table->string('status', '50');
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
        Schema::dropIfExists('uang_dsp');
    }
}
