<?php

namespace App\Http\Controllers;

use App\Models\Laporan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class LaporanController extends Controller
{
    public function index()
    {
        $tgl_kemarin = date('Y-m-d', strtotime('-1 day', strtotime(date('Y-m-d'))));
        $laporan = DB::table('laporan')
            ->where('tanggal', $tgl_kemarin)
            ->first();
        $index = Laporan::all();
        return view('halaman_bendahara.laporan.laporan', compact('index', 'laporan'));
    }

    public function detail($id)
    {
        $laporan = Laporan::first();

        $pendaftaran = Laporan::leftjoin('pendaftaran', 'laporan.tanggal', '=', 'pendaftaran.tanggal_lahir')->where('id_laporan', $id)->orwhere('pendaftaran.tanggal_lahir', $laporan->tanggal)->get();

        $uang_spp = Laporan::leftjoin('uang_spp', 'laporan.tanggal', '=', 'uang_spp.tanggal')->leftjoin('siswa', 'uang_spp.id_siswa', '=', 'siswa.id_siswa')->where('id_laporan', $id)->orwhere('uang_spp.tanggal', $laporan->tanggal)->get();

        $uang_pkl = Laporan::leftjoin('uang_pkl', 'laporan.tanggal', '=', 'uang_pkl.tanggal')->leftjoin('siswa', 'uang_pkl.id_siswa', '=', 'siswa.id_siswa')->where('id_laporan', $id)->orwhere('uang_pkl.tanggal', $laporan->tanggal)->get();

        $uang_seragam = Laporan::leftjoin('uang_seragam', 'laporan.tanggal', '=', 'uang_seragam.tanggal')->leftjoin('siswa', 'uang_seragam.id_siswa', '=', 'siswa.id_siswa')->where('id_laporan', $id)->orwhere('uang_seragam.tanggal', $laporan->tanggal)->get();

        $uang_ujian = Laporan::leftjoin('uang_ujian', 'laporan.tanggal', '=', 'uang_ujian.tanggal')->leftjoin('siswa', 'uang_ujian.id_siswa', '=', 'siswa.id_siswa')->where('id_laporan', $id)->orwhere('uang_ujian.tanggal', $laporan->tanggal)->get();

        $biaya_lain = Laporan::leftjoin('biaya_lain', 'laporan.tanggal', '=', 'biaya_lain.tanggal')->leftjoin('users', 'biaya_lain.id_user', '=', 'users.id')->where('id_laporan', $id)->orwhere('biaya_lain.tanggal', $laporan->tanggal)->get();

        $gaji = Laporan::leftjoin('gaji', 'laporan.tanggal', '=', 'gaji.tanggal')->where('id_laporan', $id)->orwhere('gaji.tanggal', $laporan->tanggal)->get();


        return view('halaman_bendahara.laporan.detail', compact('pendaftaran', 'uang_spp', 'uang_pkl', 'uang_seragam', 'uang_ujian', 'biaya_lain', 'gaji'));
    }
}
