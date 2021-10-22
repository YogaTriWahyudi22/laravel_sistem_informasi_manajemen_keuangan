<?php

namespace App\Http\Controllers;

use App\Models\Gaji;
use App\Models\Laporan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use RealRashid\SweetAlert\Facades\Alert;

class GajiController extends Controller
{
    public function index()
    {
        $gaji = Gaji::rightjoin('guru', 'gaji.id_guru', '=', 'guru.id_guru')
            ->select(
                'guru.id_guru',
                'guru.nama_guru',
                'guru.nip',
                'guru.jk',
                'guru.nohp',
                'guru.bidang',

            )->get();
        return view('halaman_bendahara.gaji_guru.index', compact('gaji'));
    }

    public function tambah()
    {
        return view('halaman_bendahara.gaji_guru.tambah');
    }
    public function store(Request $request)
    {
        date_default_timezone_set("Asia/Jakarta");
        $tanggal = date('Y-m-d');
        $waktu = date("h:i:s");

        $tambah = new Gaji;
        $tambah->id_guru = $request->id_guru;
        $tambah->periode = $request->periode;
        $tambah->jam = $request->jam;
        $tambah->nominal = $request->nominal;
        $tambah->tanggal = $tanggal;
        $tambah->waktu = $waktu;
        $tambah->save();

        $laporan = DB::table('laporan')->where('tanggal', '=', $tanggal)->first();
        if ($laporan == Null) {
            Laporan::create([
                'kas_keluar' => $request->nominal,
                'tanggal' => $tanggal,
            ]);
        } elseif ($tanggal == $laporan->tanggal) {
            Laporan::where('tanggal', $tanggal)->update([
                'saldo_awal' => $laporan->saldo_awal - $request->nominal,
                'kas_keluar' => $request->nominal + $laporan->kas_keluar,
                'tanggal' => $tanggal,
            ]);
        } else {
            Laporan::where('tanggal', $tanggal)->create([
                'kas_masuk' => $request->nominal,
                'tanggal' => $tanggal,
            ]);
            Laporan::update([
                'saldo_awal' => $laporan->saldo_awal - $request->nominal,
            ]);
        }

        Alert::success('Data Berhasil', 'Data Berhasil ditambahkan');
        return redirect()->route('pembayaran_gaji');
    }

    public function detail($id)
    {
        $detail = Gaji::leftjoin('guru', 'gaji.id_guru', '=', 'guru.id_guru')->select('gaji.*',)->where('guru.id_guru', $id)->get();
        $nama = Gaji::leftjoin('guru', 'gaji.id_guru', '=', 'guru.id_guru')->where('guru.id_guru', $id)->first();
        return view('halaman_bendahara.gaji_guru.detail', compact('detail', 'nama'));
    }
}
