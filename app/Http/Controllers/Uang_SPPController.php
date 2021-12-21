<?php

namespace App\Http\Controllers;

use App\Models\Kelas;
use App\Models\Siswa;
use App\Models\Laporan;
use App\Models\Uang_SPP;
use App\Models\Pembayaran;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use RealRashid\SweetAlert\Facades\Alert;

class Uang_SPPController extends Controller
{
    public function index()
    {
        $pilih_kelas = Kelas::all();
        $pembayaran = Pembayaran::where('jenis_pembayaran', 'Uang SPP')->first();
        $siswa = Siswa::join('kelas', 'siswa.id_kelas', '=', 'kelas.id_kelas')->join('jurusan', 'siswa.id_jurusan', '=', 'jurusan.id_jurusan')->select('kelas.kelas', 'jurusan.nama_jurusan', 'siswa.*')->get();
        return view('halaman_bendahara.uang_spp.index', compact('siswa', 'pilih_kelas', 'pembayaran'));
    }

    public function cari(Request $request)
    {
        $pilih_kelas = Kelas::all();
        $pembayaran = Pembayaran::where('jenis_pembayaran', 'Uang SPP')->first();
        $data = Siswa::join('kelas', 'siswa.id_kelas', '=', 'kelas.id_kelas')->join('jurusan', 'siswa.id_jurusan', '=', 'jurusan.id_jurusan')->select('kelas.kelas', 'jurusan.nama_jurusan', 'siswa.*');
        if ($request->cari) {
            $hasil = $data->where('kelas.id_kelas', $request->cari);
        } else {
            $hasil = $data;
        }
        $siswa = $hasil->get();
        return view('halaman_bendahara.uang_spp.index', compact('siswa', 'pilih_kelas', 'pembayaran'));
    }

    public function bayar_spp(Request $request)
    {
        date_default_timezone_set("Asia/Jakarta");
        $tanggal = date('Y-m-d');
        $waktu = date("h:i:s");

        $tambah = new Uang_SPP;
        $tambah->id_siswa = $request->id_siswa;
        $tambah->bulan = $request->bulan;
        $tambah->nominal = $request->nominal;
        $tambah->tanggal = $tanggal;
        $tambah->waktu = $waktu;
        $tambah->save();

        // INSERT DATA KE LAPORAN
        Laporan::create([
            'tanggal_pendapatan' => $tanggal,
            'tanggal_pengeluaran' => $tanggal,
            'jumlah_pendapatan' => $request->nominal,
            'sumber' => 'uang SPP',
            'status' => 'pendapatan',
        ]);

        // $laporan = DB::table('laporan')->where('tanggal', '=', $tanggal)->first();
        // if ($laporan == Null || $laporan->tanggal == Null) {
        //     Laporan::create([
        //         'saldo_awal' => $request->nominal,
        //         'kas_masuk' => $request->nominal,
        //         'tanggal' => $tanggal,
        //     ]);
        // } elseif ($tanggal == $laporan->tanggal) {
        //     Laporan::where('tanggal', $tanggal)->update([
        //         'saldo_awal' => $request->nominal + $laporan->saldo_awal,
        //         'kas_masuk' => $request->nominal + $laporan->kas_masuk,
        //         'tanggal' => $tanggal,
        //     ]);
        // }
        Alert::success('Data Berhasil', 'Data Berhasil Ditambah');
        return redirect()->route('uang_spp');
    }

    public function detail($id)
    {
        $detail = Uang_SPP::leftjoin('siswa', 'uang_spp.id_siswa', '=', 'siswa.id_siswa')->where('siswa.id_siswa', $id)->get();
        $nama = Uang_SPP::leftjoin('siswa', 'uang_spp.id_siswa', '=', 'siswa.id_siswa')->where('siswa.id_siswa', $id)->first();
        return view('halaman_bendahara.uang_spp.detail', compact('detail', 'nama'));
    }
}
