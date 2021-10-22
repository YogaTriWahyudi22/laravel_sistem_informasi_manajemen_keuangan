<?php

namespace App\Http\Controllers;

use App\Models\Jurusan;
use App\Models\Kelas;
use App\Models\Siswa;
use RealRashid\SweetAlert\Facades\Alert;
use Illuminate\Http\Request;

class SiswaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $index = Siswa::join('kelas', 'siswa.id_kelas', '=', 'kelas.id_kelas')->join('jurusan', 'siswa.id_jurusan', '=', 'jurusan.id_jurusan')
            ->select('kelas.kelas', 'jurusan.nama_jurusan', 'siswa.*')->get();
        return view('halaman_admin.kelola_siswa.index', compact('index'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $kelas = Kelas::all();
        $jurusan = Jurusan::all();
        return view('halaman_admin.kelola_siswa.tambah', compact('kelas', 'jurusan'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $tambah = new Siswa;
        $tambah->id_kelas = $request->id_kelas;
        $tambah->id_jurusan = $request->id_jurusan;
        $tambah->nama_siswa = $request->nama_siswa;
        $tambah->nis = $request->nis;
        $tambah->jk = $request->jk;
        $tambah->tanggal_lahir = $request->tanggal_lahir;
        $tambah->wali_siswa = $request->wali_siswa;
        $tambah->alamat_siswa = $request->alamat_siswa;
        $tambah->status = $request->status;
        $tambah->save();

        Alert::success('Data Berhasil', 'Data Berhasil ditambahkan');
        return redirect()->route('siswa');
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
        $edit = Siswa::where('id_siswa', $id)->first();
        $kelas = Kelas::all();
        $jurusan = Jurusan::all();
        return view('halaman_admin.kelola_siswa.edit', compact('edit', 'kelas', 'jurusan'));
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
        $update = Siswa::where('id_siswa', $id)->first();
        $update->id_kelas = $request->id_kelas;
        $update->id_jurusan = $request->id_jurusan;
        $update->nama_siswa = $request->nama_siswa;
        $update->nis = $request->nis;
        $update->jk = $request->jk;
        $update->tanggal_lahir = $request->tanggal_lahir;
        $update->wali_siswa = $request->wali_siswa;
        $update->alamat_siswa = $request->alamat_siswa;
        $update->status = $request->status;
        $update->save();
        Alert::success('Data Berhasil', 'Data Berhasil diupdate');
        return redirect()->route('siswa');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $delete = Siswa::where('id_siswa', $id)->first();
        $delete->delete();
        Alert::error('Data Berhasil', 'Data Berhasil dihapus');
        return redirect()->route('siswa');
    }
}
