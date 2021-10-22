<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUangSppTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('uang_spp', function (Blueprint $table) {
            $table->bigIncrements('id_uang_spp');
            $table->bigInteger('id_siswa');
            $table->string('bulan', '30');
            $table->bigInteger('nominal');
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
        Schema::dropIfExists('uang_spp');
    }
}
