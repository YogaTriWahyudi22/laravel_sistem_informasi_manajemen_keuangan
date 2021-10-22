<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pendaftaran extends Model
{
    use HasFactory;

    protected $table = 'pendaftaran';

    protected $primaryKey = 'id_pendaftaran';

    protected $fillable = ['nominal', 'nama_siswa', 'waktu', 'tanggal_lahir'];

    public $timestamps = false;
}
