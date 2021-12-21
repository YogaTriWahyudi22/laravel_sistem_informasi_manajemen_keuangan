<?php

namespace App\Http\Controllers;

use App\Models\Gaji;
use App\Models\Laporan;
use App\Models\Biaya_lain;
use App\Models\LaporanPengeluaran;
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

        Laporan::create([
            'tanggal_pendapatan' => $tanggal,
            'tanggal_pengeluaran' => $tanggal,
            'keterangan' => $request->keterangan,
            'satuan' => $request->satuan,
            'banyak' => $request->banyak,
            'jumlah_pengeluaran' => $nominal_jelas,
            'status' => 'pengeluaran',
        ]);

        // $laporan = DB::table('laporan')->where('tanggal_pengeluaran', '=', $tanggal)->first();

        // // jika data dilaporan kosong
        // if ($laporan == Null) {
        //     Laporan::create([
        //         'tanggal_pengeluaran' => $tanggal,
        //         'keterangan' => $request->keterangan,
        //         'satuan' => $request->satuan,
        //         'banyak' => $request->banyak,
        //         'jumlah_pengeluaran' => $nominal_jelas,
        //         'status' => 'pengeluaran',
        //     ]);
        // } elseif ($tanggal == $laporan->tanggal) {
        //     // jika data di laporan ada tetapi tanggal yang di inputkan sama dengan tanggal yg sudah ada
        //     Laporan::where('tanggal_pengeluaran', $tanggal)->update([
        //         'jumlah_pengeluaran' => $laporan->jumlah + $nominal_jelas,
        //     ]);
        // } else {
        //     // jika data sudah ada dan tanggal yg ada di dalam berbeda dengan request
        //     Laporan::create([
        //         'tanggal_pengeluaran' => $tanggal,
        //         'keterangan' => $request->keterangan,
        //         'satuan' => $request->satuan,
        //         'banyak' => $request->banyak,
        //         'jumlah_pengeluaran' => $nominal_jelas,
        //         'status' => 'pengeluaran',
        //     ]);
        // }
        Alert::success('Data Berhasil', 'Data Berhasil Ditambah');
        return redirect()->route('pembayaran_lain');
    }

    public function detail($id)
    {
        $detail = Biaya_lain::leftjoin('users', 'biaya_lain.id_user', '=', 'users.id')->where('id_biaya_lain', $id)->get();
        return view('halaman_bendahara.biaya_lain.detail', compact('detail'));
    }
}
