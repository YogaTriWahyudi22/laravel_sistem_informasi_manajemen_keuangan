<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUangSeragamTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('uang_seragam', function (Blueprint $table) {
            $table->bigIncrements('id_uang_seragam');
            $table->bigInteger('id_siswa');
            $table->bigInteger('nominal');
            $table->string('status', '30');
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
        Schema::dropIfExists('uang_seragam');
    }
}
