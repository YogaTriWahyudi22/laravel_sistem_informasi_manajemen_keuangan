<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Siswa;
use Illuminate\Http\Request;

class LaporanArsipController extends Controller
{
    public function piutang()
    {
        $data_siswa = Siswa::leftjoin('kelas', 'siswa.id_kelas', '=', 'kelas.id_kelas')->get();
        return view('halaman_bendahara.laporan_arsip.piutang', compact('data_siswa'));
    }

    public function cari_piutang(Request $request)
    {
        $id_siswa = $request->nama_siswa;

        $siswa = Siswa::leftjoin('kelas', 'siswa.id_kelas', '=', 'kelas.id_kelas');
        if ($request->nama_siswa) {
            $result = $siswa->where('siswa.id_siswa', $request->nama_siswa);
        } else {
            $result = $siswa;
        }
        $data_siswa = $result->get();

        return view('halaman_bendahara.laporan_arsip.piutang', compact('data_siswa', 'id_siswa'));
    }

    public function piutang_print()
    {
        $user_kepsek = User::where('status', 'kepsek')->first();
        $user_yayasan = User::where('status', 'ketua_yayasan')->first();
        $data_siswa = Siswa::leftjoin('kelas', 'siswa.id_kelas', '=', 'kelas.id_kelas')->get();

        return view('halaman_bendahara.laporan_arsip.print', compact('data_siswa', 'user_kepsek', 'user_yayasan'));
    }

    public function piutang_print1($id)
    {
        $user_kepsek = User::where('status', 'kepsek')->first();
        $user_yayasan = User::where('status', 'ketua_yayasan')->first();
        $data_siswa = Siswa::leftjoin('kelas', 'siswa.id_kelas', '=', 'kelas.id_kelas')->where('siswa.id_siswa', $id)->get();

        return view('halaman_bendahara.laporan_arsip.print1', compact('data_siswa', 'user_kepsek', 'user_yayasan'));
    }

    public function arsip_siswa()
    {
        $data_arsip = Siswa::leftjoin('kelas', 'siswa.id_kelas', '=', 'kelas.id_kelas')->get();
        return view('halaman_bendahara.laporan_arsip.arsip_siswa', compact('data_arsip'));
    }

    public function cari_arsip(Request $request)
    {
        $arsip = $request->arsip_siswa;

        $siswa = Siswa::leftjoin('kelas', 'siswa.id_kelas', '=', 'kelas.id_kelas');
        if ($request->arsip_siswa) {
            $result = $siswa->where('siswa.id_siswa', $request->arsip_siswa);
        } else {
            $result = $siswa;
        }
        $data_arsip = $result->get();

        return view('halaman_bendahara.laporan_arsip.arsip_siswa', compact('data_arsip', 'arsip'));
    }

    public function arsip_print()
    {
        $user_kepsek = User::where('status', 'kepsek')->first();
        $user_yayasan = User::where('status', 'ketua_yayasan')->first();
        $data_arsip = Siswa::leftjoin('kelas', 'siswa.id_kelas', '=', 'kelas.id_kelas')->get();

        return view('halaman_bendahara.laporan_arsip.arsip_print', compact('data_arsip', 'user_kepsek', 'user_yayasan'));
    }

    public function arsip_print1($id)
    {
        $user_kepsek = User::where('status', 'kepsek')->first();
        $user_yayasan = User::where('status', 'ketua_yayasan')->first();
        $data_arsip = Siswa::leftjoin('kelas', 'siswa.id_kelas', '=', 'kelas.id_kelas')->where('siswa.id_siswa', $id)->get();

        return view('halaman_bendahara.laporan_arsip.arsip_print', compact('data_arsip', 'user_kepsek', 'user_yayasan'));
    }
}
