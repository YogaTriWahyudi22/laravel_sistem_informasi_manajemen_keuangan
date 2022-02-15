<?php

namespace App\Http\Controllers;

use App\Models\Kelas;
use App\Models\Siswa;
use App\Models\Laporan;
use App\Models\Uang_DSP;
use App\Models\Pembayaran;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use RealRashid\SweetAlert\Facades\Alert;

class DSPController extends Controller
{
    public function index()
    {
        $pilih_kelas = Kelas::all();
        $pembayaran = Pembayaran::where('jenis_pembayaran', 'Uang DSP')->first();
        $siswa = Uang_DSP::rightjoin('siswa', 'uang_dsp.id_siswa', '=', 'siswa.id_siswa')->leftjoin('kelas', 'siswa.id_kelas', '=', 'kelas.id_kelas')->leftjoin('jurusan', 'siswa.id_jurusan', '=', 'jurusan.id_jurusan')
            ->select(
                'kelas.kelas',
                'kelas.id_kelas',
                'jurusan.nama_jurusan',
                'siswa.nama_siswa',
                'siswa.nis',
                'siswa.jk',
                'uang_dsp.status as status_uang',
                'uang_dsp.id_uang_dsp',
                'uang_dsp.nominal',
                'siswa.id_siswa'
            )->get();
        return view('halaman_bendahara.uang_dsp.index', compact('siswa', 'pilih_kelas', 'pembayaran'));
    }

    public function uang_dsp(Request $request)
    {
        date_default_timezone_set("Asia/Jakarta");
        $tanggal = date('Y-m-d');
        $waktu = date("h:i:s");
        $uang_dsp = DB::table('uang_dsp')->where('id_siswa', $request->id_siswa)->first();
        $laporan = DB::table('laporan')->where('sumber', '=', 'DSP-belum-lunas')->first();
        //    JIKA PEMBAYARAN LUNAS
        if ($request->nominal == 1000000) {
            date_default_timezone_set("Asia/Jakarta");
            $tanggal = date('Y-m-d');

            $tambah = new Uang_DSP;
            $tambah->id_siswa = $request->id_siswa;
            $tambah->nominal = $request->nominal;
            $tambah->keterangan = 'lunas';
            $tambah->status = 'lunas';
            $tambah->tanggal = $tanggal;
            $tambah->waktu = $waktu;
            $tambah->save();

            // INSERT DATA KE TABLE TALPORAN
            Laporan::create([
                'tanggal_pendapatan' => $tanggal,
                'tanggal_pengeluaran' => $tanggal,
                'jumlah_pendapatan' => $request->nominal,
                'sumber' => 'uang DSP',
                'status' => 'pendapatan',
            ]);
        }
        // JIKA PEMBAYARAN KREDIT ATAU CICILAN
        else {
            $uang = explode("cicilan.", $request->nominal)[1];
            $ket = explode(".250000", $request->nominal)[0];
            date_default_timezone_set("Asia/Jakarta");
            $tanggal = date('Y-m-d');
            $tambah = new Uang_DSP;
            // JIKA DATA PADA UANG DSP KOSONG
            if ($uang_dsp == Null) {
                $tambah->id_siswa = $request->id_siswa;
                $tambah->nominal = $uang;
                $tambah->keterangan = $ket;
                $tambah->status = 'belum-lunas';
                $tambah->tanggal = $tanggal;
                $tambah->waktu = $waktu;
                $tambah->save();

                // INSERT DATA KE TABLE TALPORAN
                Laporan::create([
                    'tanggal_pendapatan' => $tanggal,
                    'tanggal_pengeluaran' => $tanggal,
                    'jumlah_pendapatan' => $uang,
                    'sumber' => 'DSP-belum-lunas',
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
            // JIKA DATA SISWA YG DI INPUTKAN SAMA DENGAN DATA SISWA YANG ADA DENGAN DATA PADA UANG DSP
            // SERTA NOMINAL PADA DATA UANG PKL == 750000
            elseif ($request->id_siswa == $uang_dsp->id_siswa && $uang_dsp->nominal == "750000") {
                $edit = Uang_DSP::where('id_siswa', $request->id_siswa)->update([
                    'tanggal_pendapatan' => $tanggal,
                    'tanggal_pengeluaran' => $tanggal,
                    'nominal' => $uang + $uang_dsp->nominal,
                    'keterangan' => 'lunas',
                    'status' => 'lunas',
                ]);

                // INSERT DATA KE TABLE LAPORAN
                Laporan::where('sumber', $laporan->sumber)->update([
                    'tanggal_pendapatan' => $tanggal,
                    'tanggal_pengeluaran' => $tanggal,
                    'jumlah_pendapatan' => $laporan->jumlah_pendapatan + $uang,
                    'sumber' => 'uang DSP',
                    'status' => 'pendapatan',
                ]);

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
            // Jika NOMINAL PADA UANG PKL < 750000 DAN DATA TIDAK KOSONG
            elseif ($request->id_siswa == $uang_dsp->id_siswa) {
                $edit = Uang_DSP::where('id_siswa', $request->id_siswa)->update([
                    'nominal' => $uang + $uang_dsp->nominal,
                ]);

                // INSERT DATA KE TABLE LAPORAN
                Laporan::where('sumber', $laporan->sumber)->update([
                    'tanggal_pendapatan' => $tanggal,
                    'tanggal_pengeluaran' => $tanggal,
                    'jumlah_pendapatan' => $laporan->jumlah_pendapatan + $uang,
                    'sumber' => 'DSP-belum-lunas',
                    'status' => 'pendapatan',
                ]);
            }
        }

        Alert::success('Data Berhasil', 'Data Berhasil Ditambah');
        return redirect()->route('dsp');
    }

    public function detail($id)
    {
        $detail = Uang_DSP::leftjoin('siswa', 'uang_dsp.id_siswa', '=', 'siswa.id_siswa')->select('uang_dsp.*')->where('uang_dsp.id_siswa', $id)->get();
        $nama = Uang_DSP::leftjoin('siswa', 'uang_dsp.id_siswa', '=', 'siswa.id_siswa')->where('uang_dsp.id_siswa', $id)->first();
        return view('halaman_bendahara.uang_dsp.detail', compact('detail', 'nama'));
    }

    public function cari(Request $request)
    {
        $pilih_kelas = Kelas::all();
        $pembayaran = Pembayaran::where('jenis_pembayaran', 'Uang DSP')->first();
        $data = Uang_DSP::rightjoin('siswa', 'uang_dsp.id_siswa', '=', 'siswa.id_siswa')->leftjoin('kelas', 'siswa.id_kelas', '=', 'kelas.id_kelas')->leftjoin('jurusan', 'siswa.id_jurusan', '=', 'jurusan.id_jurusan')
            ->select(
                'kelas.kelas',
                'kelas.id_kelas',
                'jurusan.nama_jurusan',
                'siswa.nama_siswa',
                'siswa.nis',
                'siswa.jk',
                'uang_dsp.status as status_uang',
                'uang_dsp.id_uang_dsp',
                'uang_dsp.nominal',
                'siswa.id_siswa'
            );
        if ($request->cari) {
            $hasil = $data->where('kelas.id_kelas', $request->cari);
        } else {
            $hasil = $data;
        }
        $siswa = $hasil->get();
        return view('halaman_bendahara.uang_dsp.index', compact('siswa', 'pilih_kelas', 'pembayaran'));
    }
}
