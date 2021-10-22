<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Biaya_lain extends Model
{
    use HasFactory;

    protected $table = 'biaya_lain';

    protected $primaryKey = 'id_biaya_lain';

    protected $fillable = ['id_user', 'keterangan', 'nominal', 'tanggal', 'waktu'];

    public $timestamps = false;
}
