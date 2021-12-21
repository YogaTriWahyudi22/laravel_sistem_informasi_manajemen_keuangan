<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LaporanPendapatan extends Model
{
    use HasFactory;

    protected $table = 'laporan_pendapatan';

    protected $primaryKey = 'id_laporan';

    protected $fillable = ['tanggal', 'jumlah', 'sumber'];

    public $timestamps = false;
}
