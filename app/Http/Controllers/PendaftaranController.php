<?php

namespace App\Http\Controllers;

use App\Models\Draf;
use App\Models\Kelas;
use App\Models\Siswa;
use App\Models\Laporan;
use App\Models\Pembayaran;
use App\Models\Pendaftaran;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use RealRashid\SweetAlert\Facades\Alert;

class PendaftaranController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $index = Draf::leftjoin('jurusan', 'draf_pendaftaran.id_jurusan', '=', 'jurusan.id_jurusan')->select('draf_pendaftaran.*', 'jurusan.nama_jurusan')->get();
        $pembayaran = Pembayaran::where('jenis_pembayaran', '=', 'Uang Pendaftaran')->first();
        return view('halaman_bendahara.pendaftaran.index', compact('index', 'pembayaran'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('halaman_bendahara.pendaftaran.tambah');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        date_default_timezone_set("Asia/Jakarta");
        $tanggal = date('Y-m-d');

        $tambah = new Draf;
        $tambah->nama_siswa = $request->nama_siswa;
        $tambah->id_jurusan = $request->id_jurusan;
        $tambah->nis = $request->nis;
        $tambah->jk = $request->jk;
        $tambah->tanggal_lahir = $request->tanggal_lahir;
        $tambah->wali_siswa = $request->wali_siswa;
        $tambah->alamat_siswa = $request->alamat_siswa;
        $tambah->tanggal = $tanggal;
        $tambah->save();
        Alert::success('Data Berhasil', 'Data Berhasil Ditambah');
        return redirect()->route('pendaftaran');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $edit = Draf::where('id_draf', $id)->first();
        $jurusan = DB::table('jurusan')->get();
        return view('halaman_bendahara.pendaftaran.edit', compact('edit', 'jurusan'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        date_default_timezone_set("Asia/Jakarta");
        $tanggal = date('Y-m-d');

        $update = Draf::where('id_draf', $id)->first();
        $update->nis = $request->nis;
        $update->nama_siswa = $request->nama_siswa;
        $update->id_jurusan = $request->id_jurusan;
        $update->jk = $request->jk;
        $update->tanggal_lahir = $request->tanggal_lahir;
        $update->wali_siswa = $request->wali_siswa;
        $update->alamat_siswa = $request->alamat_siswa;
        $update->tanggal = $tanggal;
        $update->save();

        Alert::success('Data Berhasil', 'Data Berhasil Diupdate');
        return redirect()->route('pendaftaran');
    }

    public function bayar(Request $request, $id)
    {
        date_default_timezone_set("Asia/Jakarta");
        $tanggal = date('Y-m-d');
        $bayar = Draf::where('id_draf', $id)->first();
        $bayar->bayar = $request->bayar;
        $bayar->save();
        $laporan = DB::table('laporan')->where('tanggal', '=', $tanggal)->first();
        if ($laporan == Null || $laporan->tanggal == Null) {

            Laporan::create([
                'saldo_awal' => $request->bayar,
                'kas_masuk' => $request->bayar,
                'tanggal' => $tanggal,
            ]);
        } elseif ($laporan != Null && $tanggal == $laporan->tanggal) {
            Laporan::where('tanggal', $tanggal)->update([
                'saldo_awal' => $request->bayar + $bayar->bayar,
                'kas_masuk' => $request->bayar + $bayar->bayar,
                'tanggal' => $tanggal,
            ]);
        }
        Alert::success('Data Berhasil', 'Data Berhasil Diupdate');
        return redirect()->route('pendaftaran');
    }

    public function siswa(Request $request, $id)
    {
        date_default_timezone_set("Asia/Jakarta");
        $tanggal = date('Y-m-d');
        $waktu = date("h:i:s");

        $kelas = new Siswa;
        $kelas->id_kelas = $request->id_kelas;
        $kelas->id_jurusan = $request->id_jurusan;
        $kelas->nama_siswa = $request->nama_siswa;
        $kelas->nis = $request->nis;
        $kelas->jk = $request->jk;
        $kelas->tanggal_lahir = $request->tanggal_lahir;
        $kelas->wali_siswa = $request->wali_siswa;
        $kelas->alamat_siswa = $request->alamat_siswa;
        $kelas->status = 'Aktif';

        $kelas->save();
        Pendaftaran::create([
            'nominal' => $request->bayar,
            'nama_siswa' => $request->nama_siswa,
            'waktu' => $waktu,
            'tanggal_lahir' => $tanggal,
        ]);
        Draf::where('id_draf', $id)->delete();
        Alert::success('Data Berhasil', 'Siswa Baru Berhasil ditambahkan');
        return redirect()->route('pendaftaran');
    }
    public function destroy($id)
    {
        $hapus = Draf::where('id_pendaftaran', $id)->first();
        $hapus->delete();

        Alert::error('Data Berhasil', 'Data Berhasil Dihapus');
        return redirect()->route('pendaftaran');
    }
}
