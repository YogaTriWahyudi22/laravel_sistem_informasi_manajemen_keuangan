<?php

namespace App\Http\Controllers;

use App\Models\Kelas;
use App\Models\Siswa;
use App\Models\Laporan;
use App\Models\Pembayaran;
use App\Models\Uang_Seragam;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use RealRashid\SweetAlert\Facades\Alert;

class SeragamController extends Controller
{
    public function index()
    {
        $pilih_kelas = Kelas::all();
        $pembayaran = Pembayaran::where('jenis_pembayaran', 'Uang Seragam')->first();
        $siswa = Uang_Seragam::rightjoin('siswa', 'uang_seragam.id_siswa', '=', 'siswa.id_siswa')->leftjoin('kelas', 'siswa.id_kelas', '=', 'kelas.id_kelas')->leftjoin('jurusan', 'siswa.id_jurusan', '=', 'jurusan.id_jurusan')
            ->select(
                'uang_seragam.status as status_uang',
                'kelas.kelas',
                'jurusan.nama_jurusan',
                'siswa.*',
                'kelas.id_kelas',
            )->get();
        return view('halaman_bendahara.uang_seragam.index', compact('siswa', 'pilih_kelas', 'pembayaran'));
    }

    public function cari(Request $request)
    {
        $pilih_kelas = Kelas::all();
        $pembayaran = Pembayaran::where('jenis_pembayaran', 'Uang Seragam')->first();
        $data = Uang_Seragam::rightjoin('siswa', 'uang_seragam.id_siswa', '=', 'siswa.id_siswa')->leftjoin('kelas', 'siswa.id_kelas', '=', 'kelas.id_kelas')->leftjoin('jurusan', 'siswa.id_jurusan', '=', 'jurusan.id_jurusan')
            ->select(
                'uang_seragam.status as status_uang',
                'kelas.kelas',
                'jurusan.nama_jurusan',
                'siswa.*',
                'kelas.id_kelas',
            );
        if ($request->cari) {
            $hasil = $data->where('kelas.id_kelas', $request->cari);
        } else {
            $hasil = $data;
        }
        $siswa = $hasil->get();
        return view('halaman_bendahara.uang_seragam.index', compact('siswa', 'pilih_kelas', 'pembayaran'));
    }

    public function bayar_spp(Request $request)
    {
        date_default_timezone_set("Asia/Jakarta");
        $tanggal = date('Y-m-d');
        $waktu = date("h:i:s");

        $tambah = new Uang_Seragam;
        $tambah->id_siswa = $request->id_siswa;
        $tambah->nominal = $request->nominal;
        $tambah->status = 'lunas';
        $tambah->tanggal = $tanggal;
        $tambah->waktu = $waktu;
        $tambah->save();
        $laporan = DB::table('laporan')->where('tanggal', '=', $tanggal)->first();
        if ($laporan == Null || $laporan->tanggal == Null) {
            Laporan::create([
                'saldo_awal' => $request->nominal,
                'kas_masuk' => $request->nominal,
                'tanggal' => $tanggal,
            ]);
        } elseif ($tanggal == $laporan->tanggal) {
            Laporan::where('tanggal', $tanggal)->update([
                'saldo_awal' => $request->nominal + $laporan->saldo_awal,
                'kas_masuk' => $request->nominal + $laporan->kas_masuk,
                'tanggal' => $tanggal,
            ]);
        }

        Alert::success('Data Berhasil', 'Data Berhasil Ditambah');
        return redirect()->route('uang_seragam');
    }

    public function detail($id)
    {
        $detail = Uang_Seragam::leftjoin('siswa', 'uang_seragam.id_siswa', '=', 'siswa.id_siswa')->select('siswa.*', 'uang_seragam.nominal', 'uang_seragam.status as status_pembayaran', 'uang_seragam.tanggal', 'uang_seragam.waktu')->where('siswa.id_siswa', $id)->get();
        $nama = Uang_Seragam::leftjoin('siswa', 'uang_seragam.id_siswa', '=', 'siswa.id_siswa')->where('siswa.id_siswa', $id)->first();
        return view('halaman_bendahara.uang_seragam.detail', compact('detail', 'nama'));
    }
}
