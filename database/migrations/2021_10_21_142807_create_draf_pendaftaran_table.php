<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDrafPendaftaranTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('draf_pendaftaran', function (Blueprint $table) {
            $table->bigIncrements('id_draf');
            $table->bigInteger('id_jurusan');
            $table->string('nama_siswa', '100');
            $table->bigInteger('nis');
            $table->string('jk', '20');
            $table->date('tanggal_lahir');
            $table->string('wali_siswa', '100');
            $table->string('alamat_siswa');
            $table->string('status', '20')->default('Tidak Aktif');
            $table->bigInteger('kelas')->nullable();
            $table->bigInteger('bayar')->nullable();
            $table->date('tanggal');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('draf_pendaftaran');
    }
}
