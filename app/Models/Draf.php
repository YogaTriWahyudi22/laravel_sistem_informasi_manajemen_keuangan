<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Draf extends Model
{
    use HasFactory;

    protected $table = 'draf_pendaftaran';

    protected $primaryKey = 'id_draf';

    protected $fillable = ['id_jurusan', 'nama_siswa', 'nis', 'jk', 'tanggal_lahir', 'wali_siswa', 'alamat_siswa', 'status', 'kelas', 'bayar', 'tanggal'];
    public $timestamps = false;
}
