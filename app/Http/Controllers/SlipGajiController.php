<?php

namespace App\Http\Controllers;

use App\Models\Gaji;
use App\Models\Guru;
use Illuminate\Http\Request;

class SlipGajiController extends Controller
{
    public function slip_ganji()
    {
        $slip_gaji = Guru::all();
        return view('halaman_bendahara.slip_gaji.slip_gaji', compact('slip_gaji'));
    }

    public function detail_slip_gaji($id_guru)
    {
        $detail_slip = Guru::leftjoin('gaji', 'guru.id_guru', '=', 'gaji.id_guru')->where('gaji.id_guru', $id_guru)->get();
        return view('halaman_bendahara.slip_gaji.detail_slip', compact('detail_slip'));
    }

    public function cetak_slide($periode)
    {
        $cetak_slip = Guru::leftjoin('gaji', 'guru.id_guru', '=', 'gaji.id_guru')->where('gaji.periode', $periode)->first();
        return view('halaman_bendahara.slip_gaji.cetak', compact('cetak_slip'));
    }
}
