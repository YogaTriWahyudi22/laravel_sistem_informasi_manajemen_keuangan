<?php

namespace App\Http\Controllers;

use App\Models\Gaji;
use App\Models\Laporan;
use App\Models\Biaya_lain;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use RealRashid\SweetAlert\Facades\Alert;

class BiayaLainController extends Controller
{
    public function index()
    {
        $biaya_lain = Biaya_lain::leftjoin('users', 'biaya_lain.id_user', '=', 'users.id')->select('biaya_lain.*', 'users.nama')->get();
        return view('halaman_bendahara.biaya_lain.index', compact('biaya_lain'));
    }

    public function tambah(Request $request)
    {
        date_default_timezone_set("Asia/Jakarta");
        $tanggal = date('Y-m-d');
        $waktu = date("h:i:s");

        $nominal = explode("Rp.", $request->nominal)[1];
        $nominal_baru = explode(".", $nominal);
        $nominal_jelas = (int) implode($nominal_baru);

        $tambah = new Biaya_lain;
        $tambah->id_user = $request->id_user;
        $tambah->keterangan = $request->keterangan;
        $tambah->nominal = $nominal_jelas;
        $tambah->tanggal = $tanggal;
        $tambah->waktu = $waktu;
        $tambah->save();

        $laporan = DB::table('laporan')->where('tanggal', '=', $tanggal)->first();
        if ($laporan == Null) {
            Laporan::create([
                'kas_keluar' => $nominal_jelas,
                'tanggal' => $tanggal,
            ]);
        } elseif ($tanggal == $laporan->tanggal) {
            Laporan::where('tanggal', $tanggal)->update([
                'saldo_awal' => $laporan->saldo_awal - $nominal_jelas,
                'kas_keluar' => $nominal_jelas + $laporan->kas_keluar,
                'tanggal' => $tanggal,
            ]);
        } else {
            Laporan::where('tanggal', $tanggal)->create([
                'kas_masuk' => $nominal_jelas,
                'tanggal' => $tanggal,
            ]);
            Laporan::update([
                'saldo_awal' => $laporan->saldo_awal - $nominal_jelas,
            ]);
        }
        Alert::success('Data Berhasil', 'Data Berhasil Ditambah');
        return redirect()->route('pembayaran_lain');
    }

    public function detail($id)
    {
        $detail = Biaya_lain::leftjoin('users', 'biaya_lain.id_user', '=', 'users.id')->where('id_biaya_lain', $id)->get();
        return view('halaman_bendahara.biaya_lain.detail', compact('detail'));
    }
}
