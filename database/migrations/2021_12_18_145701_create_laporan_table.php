<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateLaporanTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('laporan', function (Blueprint $table) {
            $table->bigIncrements('id_laporan');
            $table->date('tanggal_pendapatan')->nullable();
            $table->bigInteger('jumlah_pendapatan')->nullable();
            $table->string('sumber', '20')->nullable();
            $table->date('tanggal_pengeluaran')->nullable();
            $table->text('keterangan')->nullable();
            $table->string('satuan', '10')->nullable();
            $table->integer('banyak')->nullable();
            $table->bigInteger('jumlah_pengeluaran')->nullable();
            $table->string('status', '20')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('laporan');
    }
}
