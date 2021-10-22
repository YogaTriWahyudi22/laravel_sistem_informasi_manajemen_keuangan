<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Uang_SPP extends Model
{
    use HasFactory;

    protected $table = 'uang_spp';

    protected $primaryKey = 'id_uang_spp';

    protected $fillable = ['id_siswa', 'bulan', 'nominal', 'tanggal', 'waktu'];

    public $timestamps = false;
}
