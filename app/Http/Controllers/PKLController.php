<?php

namespace App\Http\Controllers;

use App\Models\Laporan;
use App\Models\Uang_PKL;
use App\Models\Pembayaran;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use RealRashid\SweetAlert\Facades\Alert;

class PKLController extends Controller
{
    public function index()
    {
        date_default_timezone_set("Asia/Jakarta");
        $tanggal = date('Y-m-d');

        $pembayaran = Pembayaran::where('jenis_pembayaran', 'Uang PKL')->first();
        $siswa = Uang_PKL::rightjoin('siswa', 'uang_pkl.id_siswa', '=', 'siswa.id_siswa')->leftjoin('kelas', 'siswa.id_kelas', '=', 'kelas.id_kelas')->leftjoin('jurusan', 'siswa.id_jurusan', '=', 'jurusan.id_jurusan')
            ->select(
                'kelas.kelas',
                'kelas.id_kelas',
                'jurusan.nama_jurusan',
                'siswa.nama_siswa',
                'siswa.nis',
                'siswa.jk',
                'uang_pkl.status as status_uang',
                'uang_pkl.id_uang_pkl',
                'uang_pkl.nominal',
                'siswa.id_siswa'
            )->get();
        return view('halaman_bendahara.uang_pkl.index', compact('siswa', 'pembayaran'));
    }

    public function uang_pkl(Request $request)
    {
        date_default_timezone_set("Asia/Jakarta");
        $tanggal = date('Y-m-d');
        $waktu = date("h:i:s");

        $uang_pkl = DB::table('uang_pkl')->where('id_siswa', $request->id_siswa)->first();
        //    jika pembayarannya lunas
        if ($request->nominal == 700000) {

            $tambah = new Uang_PKL;
            $tambah->id_siswa = $request->id_siswa;
            $tambah->nominal = $request->nominal;
            $tambah->keterangan = 'lunas';
            $tambah->status = 'lunas';
            $tambah->tanggal = $tanggal;
            $tambah->waktu = $waktu;
            $tambah->save();

            // Insert Data ke Laporan
            Laporan::create([
                'tanggal_pendapatan' => $tanggal,
                'tanggal_pengeluaran' => $tanggal,
                'jumlah_pendapatan' => $request->nominal,
                'sumber' => 'uang PKL ',
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
        }
        // jika pembayarannya nyicil
        else {
            $uang = explode("cicilan.", $request->nominal)[1];
            $ket = explode(".350000", $request->nominal)[0];
            $tambah = new Uang_PKL;
            // jika data uang PKL kosong
            if ($uang_pkl == Null) {
                $tambah->id_siswa = $request->id_siswa;
                $tambah->nominal = $uang;
                $tambah->keterangan = $ket;
                $tambah->status = 'belum-lunas';
                $tambah->tanggal = $tanggal;
                $tambah->waktu = $waktu;
                $tambah->save();

                // Insert Data ke Laporan
                Laporan::create([
                    'tanggal_pendapatan' => $tanggal,
                    'tanggal_pengeluaran' => $tanggal,
                    'jumlah_pendapatan' => $uang,
                    'sumber' => 'PKL-belum-lunas',
                    'status' => 'pendapatan',
                ]);

                // $laporan = DB::table('laporan')->where('tanggal', '=', $tanggal)->first();
                // if ($laporan == Null || $laporan->tanggal == Null) {
                //     Laporan::create([
                //         'saldo_awal' => $uang,
                //         'kas_masuk' => $uang,
                //         'tanggal' => $tanggal,
                //     ]);
                // } elseif ($tanggal == $laporan->tanggal) {
                //     Laporan::where('tanggal', $tanggal)->update([
                //         'saldo_awal' => $uang + $laporan->saldo_awal,
                //         'kas_masuk' => $uang + $laporan->kas_masuk,
                //         'tanggal' => $tanggal,
                //     ]);
                // }
            }
            // JIKA DATA SISWA YG DI INPUTKAN SAMA DENGAN DATA SISWA YANG ADA DENGAN DATA PADA UANG PKL
            // SERTA NOMINAL PADA DATA UANG PKL == 350000
            elseif ($request->id_siswa == $uang_pkl->id_siswa && $uang_pkl->nominal == "350000") {
                Uang_PKL::where('id_siswa', $request->id_siswa)->update([
                    'tanggal_pendapatan' => $tanggal,
                    'tanggal_pengeluaran' => $tanggal,
                    'nominal' => $uang + $uang_pkl->nominal,
                    'keterangan' => 'lunas',
                    'status' => 'lunas',
                ]);
                // JIKA DATA LAPORAN SUMBER NYA SAMA DENGAN PKL-belum-lunas
                $laporan = DB::table('laporan')->where('sumber', '=', 'PKL-belum-lunas')->get();
                foreach ($laporan as $key => $value) {
                    Laporan::where('sumber', $value->sumber)->update([
                        'tanggal_pendapatan' => $tanggal,
                        'tanggal_pengeluaran' => $tanggal,
                        'jumlah_pendapatan' => $value->jumlah_pendapatan + $uang,
                        'sumber' => 'uang PKL',
                        'status' => 'pendapatan',
                    ]);
                }

                // if ($laporan == Null || $laporan->tanggal == Null) {
                //     Laporan::create([
                //         'saldo_awal' => $uang,
                //         'kas_masuk' => $uang,
                //         'tanggal' => $tanggal,
                //     ]);
                // } elseif ($tanggal == $laporan->tanggal) {
                //     Laporan::where('tanggal', $tanggal)->update([
                //         'saldo_awal' => $uang + $laporan->saldo_awal,
                //         'kas_masuk' => $uang + $laporan->kas_masuk,
                //         'tanggal' => $tanggal,
                //     ]);
                // }
            }
            // elseif ($request->id_siswa == $uang_pkl->id_siswa) {
            // $edit = Uang_PKL::where('id_siswa', $request->id_siswa)->update([
            //     'nominal' => $uang + $uang_pkl->nominal,
            // ]);
            // $laporan = DB::table('laporan')->where('tanggal', '=', $tanggal)->first();
            // if ($laporan == Null || $laporan->tanggal == Null) {
            //     Laporan::create([
            //         'saldo_awal' => $uang,
            //         'kas_masuk' => $uang,
            //         'tanggal' => $tanggal,
            //     ]);
            // } elseif ($tanggal == $laporan->tanggal) {
            //     Laporan::where('tanggal', $tanggal)->update([
            //         'saldo_awal' => $uang + $laporan->saldo_awal,
            //         'kas_masuk' => $uang + $laporan->kas_masuk,
            //         'tanggal' => $tanggal,
            //     ]);
            // }
            // }
        }

        Alert::success('Data Berhasil', 'Data Berhasil Ditambah');
        return redirect()->route('pkl');
    }

    public function detail($id)
    {
        $detail = Uang_PKL::leftjoin('siswa', 'uang_pkl.id_siswa', '=', 'siswa.id_siswa')->select('uang_pkl.*')->where('uang_pkl.id_uang_pkl', $id)->get();
        $nama = Uang_PKL::leftjoin('siswa', 'uang_pkl.id_siswa', '=', 'siswa.id_siswa')->where('uang_pkl.id_uang_pkl', $id)->first();
        return view('halaman_bendahara.uang_pkl.detail', compact('detail', 'nama'));
    }
}
