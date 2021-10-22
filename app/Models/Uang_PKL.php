<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Uang_PKL extends Model
{
    use HasFactory;

    protected $table = 'uang_pkl';

    protected $primaryKey = 'id_uang_pkl';

    protected $fillable = ['id_siswa', 'nominal', 'keterangan', 'status', 'tanggal', 'waktu'];

    public $timestamps = false;
}
