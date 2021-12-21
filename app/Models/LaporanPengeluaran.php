<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LaporanPengeluaran extends Model
{
    use HasFactory;

    protected $table = 'laporan_pengeluaran';

    protected $primaryKey = 'id_laporan_pengeluaran';

    protected $fillable = ['tanggal_pengeluaran', 'keterangan', 'satuan', 'banyak', 'jumlah'];

    public $timestamps = false;
}
