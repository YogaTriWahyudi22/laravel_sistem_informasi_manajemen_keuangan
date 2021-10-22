<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Uang_DSP extends Model
{
    use HasFactory;

    protected $table = 'uang_dsp';

    protected $primaryKey = 'id_uang_dsp';

    protected $fillable = ['id_siswa', 'nominal', 'keterangan', 'status', 'tanggal', 'waktu'];

    public $timestamps = false;
}
