<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Uang_Ujian extends Model
{
    use HasFactory;

    protected $table = 'uang_ujian';

    protected $primaryKey = 'id_uang_ujian';

    protected $fillable = ['id_siswa', 'nominal', 'periode', 'tanggal', 'waktu'];

    public $timestamps = false;
}
