<?php

namespace App\Http\Controllers;

use App\Models\Guru;
use App\Models\Siswa;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class LaporanGuruMahasiswa extends Controller
{
    public function laporan_keuangan_mahasiswa()
    {
        $mahasiswa = Siswa::leftjoin('uang_dsp', 'siswa.id_siswa', '=', 'uang_dsp.id_siswa')->leftjoin('uang_pkl', 'siswa.id_siswa', '=', 'uang_pkl.id_siswa')->leftjoin('uang_seragam', 'siswa.id_siswa', '=', 'uang_seragam.id_siswa')->leftjoin('uang_spp', 'siswa.id_siswa', '=', 'uang_spp.id_siswa')->leftjoin('uang_ujian', 'siswa.id_siswa', '=', 'uang_ujian.id_siswa')
            ->select(
                DB::raw('nama_siswa'),
                DB::raw('SUM(uang_dsp.nominal) AS TotalDSP'),
                DB::raw('SUM(uang_pkl.nominal) AS TotalPKL'),
                DB::raw('SUM(uang_seragam.nominal) AS TotalSeragam'),
                DB::raw('SUM(uang_spp.nominal) AS TotalSPP'),
                DB::raw('SUM(uang_ujian.nominal) AS TotalUjian'),
                DB::raw('MONTH(uang_dsp.tanggal) AS bulan_semua'),
            )->groupby('siswa.id_siswa')->get();
        return view('halaman_bendahara.laporan.laporan_keuangan_siswa', compact('mahasiswa'));
    }

    public function cari_siswa(Request $request)
    {
        $siswa = $request->nama_siswa;
        $cari_siswa = Siswa::leftjoin('uang_dsp', 'siswa.id_siswa', '=', 'uang_dsp.id_siswa')->leftjoin('uang_pkl', 'siswa.id_siswa', '=', 'uang_pkl.id_siswa')->leftjoin('uang_seragam', 'siswa.id_siswa', '=', 'uang_seragam.id_siswa')->leftjoin('uang_spp', 'siswa.id_siswa', '=', 'uang_spp.id_siswa')->leftjoin('uang_ujian', 'siswa.id_siswa', '=', 'uang_ujian.id_siswa')
            ->select(
                DB::raw('nama_siswa'),
                DB::raw('SUM(uang_dsp.nominal) AS TotalDSP'),
                DB::raw('SUM(uang_pkl.nominal) AS TotalPKL'),
                DB::raw('SUM(uang_seragam.nominal) AS TotalSeragam'),
                DB::raw('SUM(uang_spp.nominal) AS TotalSPP'),
                DB::raw('SUM(uang_ujian.nominal) AS TotalUjian'),
                DB::raw('MONTH(uang_dsp.tanggal) AS bulan_semua'),
            )->groupby('siswa.id_siswa');
        if ($request->nama_siswa) {
            $hasil_cari = $cari_siswa->where('siswa.nama_siswa', [$request->nama_siswa]);
        } else {
            $hasil_cari = $cari_siswa;
        }
        $mahasiswa = $hasil_cari->get();
        return view('halaman_bendahara.laporan.laporan_keuangan_siswa', compact('mahasiswa', 'siswa'));
    }

    public function print_siswa($siswa)
    {
        $siswa_print = $siswa;
        $print_siswa = Siswa::leftjoin('uang_dsp', 'siswa.id_siswa', '=', 'uang_dsp.id_siswa')->leftjoin('uang_pkl', 'siswa.id_siswa', '=', 'uang_pkl.id_siswa')->leftjoin('uang_seragam', 'siswa.id_siswa', '=', 'uang_seragam.id_siswa')->leftjoin('uang_spp', 'siswa.id_siswa', '=', 'uang_spp.id_siswa')->leftjoin('uang_ujian', 'siswa.id_siswa', '=', 'uang_ujian.id_siswa')
            ->leftjoin('kelas', 'siswa.id_kelas', '=', 'kelas.id_kelas')
            ->select(
                DB::raw('siswa.nama_siswa'),
                DB::raw('siswa.nis'),
                DB::raw('kelas.kelas'),
                DB::raw('SUM(uang_dsp.nominal) AS TotalDSP'),
                DB::raw('SUM(uang_pkl.nominal) AS TotalPKL'),
                DB::raw('SUM(uang_seragam.nominal) AS TotalSeragam'),
                DB::raw('SUM(uang_spp.nominal) AS TotalSPP'),
                DB::raw('SUM(uang_ujian.nominal) AS TotalUjian'),
                DB::raw('MONTH(uang_dsp.tanggal) AS bulan_semua'),
            )->groupby('siswa.id_siswa')->where('siswa.nama_siswa', $siswa)->get();
        return view('halaman_bendahara.print.print_keuangan_siswa', compact('print_siswa', 'siswa_print'));
    }

    public function print_siswa1()
    {
        $print_siswa = Siswa::leftjoin('uang_dsp', 'siswa.id_siswa', '=', 'uang_dsp.id_siswa')->leftjoin('uang_pkl', 'siswa.id_siswa', '=', 'uang_pkl.id_siswa')->leftjoin('uang_seragam', 'siswa.id_siswa', '=', 'uang_seragam.id_siswa')->leftjoin('uang_spp', 'siswa.id_siswa', '=', 'uang_spp.id_siswa')->leftjoin('uang_ujian', 'siswa.id_siswa', '=', 'uang_ujian.id_siswa')
            ->select(
                DB::raw('nama_siswa'),
                DB::raw('SUM(uang_dsp.nominal) AS TotalDSP'),
                DB::raw('SUM(uang_pkl.nominal) AS TotalPKL'),
                DB::raw('SUM(uang_seragam.nominal) AS TotalSeragam'),
                DB::raw('SUM(uang_spp.nominal) AS TotalSPP'),
                DB::raw('SUM(uang_ujian.nominal) AS TotalUjian'),
                DB::raw('MONTH(uang_dsp.tanggal) AS bulan_semua'),
            )->groupby('siswa.id_siswa')->get();
        return view('halaman_bendahara.print.print_keuangan_siswa', compact('print_siswa'));
    }

    public function laporan_gaji_bulan()
    {
        $guru = Guru::leftjoin('gaji', 'guru.id_guru', '=', 'gaji.id_guru')->get();
        return view('halaman_bendahara.laporan.gaji_bulanan', compact('guru'));
    }

    public function gaji_bulanan(Request $request)
    {
        $cari_guru_bulanan = $request->guru_bulanan;
        $cari_guru = Guru::leftjoin('gaji', 'guru.id_guru', '=', 'gaji.id_guru');
        if ($request->guru_bulanan) {
            $result = $cari_guru->whereMonth('gaji.tanggal', [$request->guru_bulanan]);
        } else {
            $result = $cari_guru;
        }

        $guru = $result->get();

        return view('halaman_bendahara.laporan.gaji_bulanan', compact('guru', 'cari_guru_bulanan'));
    }

    public function print_gaji_bulan($cari_guru_bulanan)
    {
        $print_guru = Guru::leftjoin('gaji', 'guru.id_guru', '=', 'gaji.id_guru')->whereMonth('gaji.tanggal', $cari_guru_bulanan)->get();
        return view('halaman_bendahara.print.print_gaji_bulanan', compact('print_guru'));
    }

    public function print_gaji_bulan1()
    {
        $print_guru = Guru::leftjoin('gaji', 'guru.id_guru', '=', 'gaji.id_guru')->get();
        return view('halaman_bendahara.print.print_gaji_bulanan', compact('print_guru'));
    }

    public function laporan_gaji_tahunan()
    {
        $guru_tahun = Guru::leftjoin('gaji', 'guru.id_guru', '=', 'gaji.id_guru')->get();
        return view('halaman_bendahara.laporan.gaji_tahunan', compact('guru_tahun'));
    }

    public function gaji_tahunan(Request $request)
    {
        $cari_guru_tahunan = $request->guru_tahun;
        $guru_tahun = Guru::leftjoin('gaji', 'guru.id_guru', '=', 'gaji.id_guru')->whereYear('gaji.tanggal', $request->guru_tahun)->get();
        return view('halaman_bendahara.laporan.gaji_tahunan', compact('guru_tahun', 'cari_guru_tahunan'));
    }

    public function print_gaji_tahun($cari_guru_tahunan)
    {
        $print_gaji = Guru::leftjoin('gaji', 'guru.id_guru', '=', 'gaji.id_guru')->whereYear('gaji.tanggal', $cari_guru_tahunan)->get();
        return view('halaman_bendahara.print.print_gaji_tahunan', compact('print_gaji'));
    }

    public function print_gaji_tahun1()
    {
        $print_gaji = Guru::leftjoin('gaji', 'guru.id_guru', '=', 'gaji.id_guru')->get();
        return view('halaman_bendahara.print.print_gaji_tahunan', compact('print_gaji'));
    }
}
