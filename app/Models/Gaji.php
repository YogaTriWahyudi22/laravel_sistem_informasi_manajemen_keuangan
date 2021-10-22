<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Gaji extends Model
{
    use HasFactory;

    protected $table = 'gaji';

    protected $primaryKey = 'id_gaji';

    protected $fillable = ['id_guru', 'periode', 'jam', 'nominal', 'tanggal', 'waktu'];
    public $timestamps = false;
}
