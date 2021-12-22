<?php

namespace App\Http\Controllers;

use App\Models\Laporan;
use Illuminate\Http\Request;
use App\Models\LaporanPendapatan;
use App\Models\LaporanPengeluaran;
use Illuminate\Support\Facades\DB;

class LaporanController extends Controller
{
    public function index()
    {
        return view('halaman_bendahara.laporan.laporan');
    }

    public function laporan_keungan_bulanan()
    {
        $laporan = Laporan::all();
        $jumlah = DB::table('laporan')
            ->select(
                DB::raw('SUM(jumlah_pendapatan) as pendapatan'),
                DB::raw('SUM(jumlah_pengeluaran) as pengeluaran')
            )->first();
        return view('halaman_bendahara.laporan.laporan_keungan_bulanan', compact('laporan', 'jumlah'));
    }

    public function cari_bulan(Request $request)
    {
        $periode = $request->periode;
        $cari = DB::table('laporan');
        $cari_bulan = DB::table('laporan')
            ->select(DB::raw('SUM(jumlah_pendapatan) as pendapatan'), DB::raw('SUM(jumlah_pengeluaran) as pengeluaran'));

        if ($request->periode) {
            $hasil = $cari->whereMonth('tanggal_pendapatan', [$request->periode])->orwhereMonth('tanggal_pengeluaran', [$request->periode]);
            $hasil2 = $cari_bulan->whereMonth('tanggal_pendapatan', [$request->periode])->orwhereMonth('tanggal_pengeluaran', [$request->periode]);
        } else {
            $hasil = $cari;
            $hasil = $cari_bulan;
        }

        $laporan = $hasil->get();
        $jumlah = $hasil2->first();
        return view('halaman_bendahara.laporan.laporan_keungan_bulanan', compact('laporan', 'jumlah', 'periode'));
    }

    public function print($periode)
    {
        $laporan = DB::table('laporan')->whereMonth('tanggal_pendapatan', [$periode])->orwhereMonth('tanggal_pengeluaran', [$periode])->get();
        $jumlah = DB::table('laporan')
            ->select(DB::raw('SUM(jumlah_pendapatan) as pendapatan'), DB::raw('SUM(jumlah_pengeluaran) as pengeluaran'))
            ->whereMonth('tanggal_pendapatan', [$periode])->orwhereMonth('tanggal_pengeluaran', [$periode])->first();
        return view('halaman_bendahara.print.print', compact('laporan', 'jumlah'));
    }

    public function print1()
    {
        $laporan = Laporan::all();
        $jumlah = DB::table('laporan')
            ->select(
                DB::raw('SUM(jumlah_pendapatan) as pendapatan'),
                DB::raw('SUM(jumlah_pengeluaran) as pengeluaran')
            )->first();
        return view('halaman_bendahara.print.print', compact('laporan', 'jumlah'));
    }

    public function laporan_keungan_tahunan()
    {
        $tahunan = DB::table('laporan')
            ->select(
                DB::raw('YEAR(tanggal_pendapatan) AS pendapatan_tahunan'),
                DB::raw('YEAR(tanggal_pengeluaran) AS pengeluaran_tahunan'),
                DB::raw('MONTH(tanggal_pendapatan) AS pendapatan_bulan'),
                DB::raw('MONTH(tanggal_pengeluaran) AS pengeluaran_bulan'),
                DB::raw('SUM(jumlah_pendapatan) AS TotalPendapatan'),
                DB::raw('SUM(jumlah_pengeluaran) AS TotalPengeluaran')
            )
            ->get();
        return view('halaman_bendahara.laporan.laporan_keuangan_tahunan', compact('tahunan'));
    }

    public function cari_tahunan(Request $request)
    {
        $periode_tahunan = $request->periode_tahunan;

        $cari_tahunan = DB::table('laporan')
            ->select(
                DB::raw('YEAR(tanggal_pendapatan) AS pendapatan_tahunan'),
                DB::raw('YEAR(tanggal_pengeluaran) AS pengeluaran_tahunan'),
                DB::raw('MONTH(tanggal_pendapatan) AS pendapatan_bulan'),
                DB::raw('MONTH(tanggal_pengeluaran) AS pengeluaran_bulan'),
                DB::raw('SUM(jumlah_pendapatan) AS TotalPendapatan'),
                DB::raw('SUM(jumlah_pengeluaran) AS TotalPengeluaran')
            );
        if ($request->periode_tahunan) {
            $result = $cari_tahunan->whereYear('tanggal_pendapatan', [$request->periode_tahunan])->orwhereYear('tanggal_pengeluaran', [$request->periode_tahunan]);
        } else {
            $result = $cari_tahunan;
        }
        $tahunan = $result->get();
        return view('halaman_bendahara.laporan.laporan_keuangan_tahunan', compact('tahunan', 'periode_tahunan'));
    }

    public function print_tahun($periode_tahunan)
    {
        $tahunan = DB::table('laporan')
            ->select(
                DB::raw('YEAR(tanggal_pendapatan) AS pendapatan_tahunan'),
                DB::raw('YEAR(tanggal_pengeluaran) AS pengeluaran_tahunan'),
                DB::raw('MONTH(tanggal_pendapatan) AS pendapatan_bulan'),
                DB::raw('MONTH(tanggal_pengeluaran) AS pengeluaran_bulan'),
                DB::raw('SUM(jumlah_pendapatan) AS TotalPendapatan'),
                DB::raw('SUM(jumlah_pengeluaran) AS TotalPengeluaran')
            )->whereYear('tanggal_pendapatan', [$periode_tahunan])->orwhereYear('tanggal_pengeluaran', [$periode_tahunan])->get();
        // dd($tahunan);
        return view('halaman_bendahara.print.print_tahunan', compact('tahunan'));
    }

    public function print_tahun1()
    {
        $tahunan = DB::table('laporan')
            ->select(
                DB::raw('YEAR(tanggal_pendapatan) AS pendapatan_tahunan'),
                DB::raw('YEAR(tanggal_pengeluaran) AS pengeluaran_tahunan'),
                DB::raw('MONTH(tanggal_pendapatan) AS pendapatan_bulan'),
                DB::raw('MONTH(tanggal_pengeluaran) AS pengeluaran_bulan'),
                DB::raw('SUM(jumlah_pendapatan) AS TotalPendapatan'),
                DB::raw('SUM(jumlah_pengeluaran) AS TotalPengeluaran')
            )
            ->get();
        return view('halaman_bendahara.print.print_tahunan', compact('tahunan'));
    }
}
