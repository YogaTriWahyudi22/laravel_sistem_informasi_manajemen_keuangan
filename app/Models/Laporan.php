<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Laporan extends Model
{
    use HasFactory;

    protected $table = 'laporan';

    protected $primaryKey = 'id_laporan';

    protected $fillable = ['saldo_awal', 'kas_masuk', 'kas_keluar', 'tanggal'];

    public $timestamps = false;
}
