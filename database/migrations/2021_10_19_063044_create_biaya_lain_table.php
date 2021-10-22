<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBiayaLainTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('biaya_lain', function (Blueprint $table) {
            $table->bigIncrements('id_biaya_lain');
            $table->integer('id_user');
            $table->string('keterangan');
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
        Schema::dropIfExists('biaya_lain');
    }
}
