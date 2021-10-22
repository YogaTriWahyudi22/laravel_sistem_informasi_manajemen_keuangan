<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Uang_Seragam extends Model
{
    use HasFactory;

    protected $table = 'uang_seragam';

    protected $primaryKey = 'id_uang_seragam';

    protected $fillable = ['id_siswa', 'nominal', 'status', 'tanggal', 'waktu'];

    public $timestamps = false;
}
