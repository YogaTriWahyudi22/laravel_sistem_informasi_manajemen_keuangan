<?php

namespace App\Http\Controllers;

use App\Models\Guru;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;

class GuruController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $index = Guru::all();
        return view('halaman_admin.kelola_guru.index', compact('index'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('halaman_admin.kelola_guru.tambah');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $tambah = new Guru;
        $tambah->nama_guru = $request->nama_guru;
        $tambah->nip = $request->nip;
        $tambah->nohp = $request->nohp;
        $tambah->jk = $request->jk;
        $tambah->bidang = $request->bidang;
        $tambah->alamat = $request->alamat;
        $tambah->status = $request->status;
        $tambah->save();
        Alert::success('Data Berhasil', 'Data Berhasil ditambahkan');
        return redirect()->route('guru');
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
        $edit = Guru::where('id_guru', $id)->first();
        return view('halaman_admin.kelola_guru.edit', compact('edit'));
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
        $update = Guru::where('id_guru', $id)->first();
        $update->nama_guru = $request->nama_guru;
        $update->nip = $request->nip;
        $update->nohp = $request->nohp;
        $update->jk = $request->jk;
        $update->bidang = $request->bidang;
        $update->alamat = $request->alamat;
        $update->status = $request->status;
        $update->save();
        Alert::success('Data Berhasil', 'Data Berhasil diupdate');
        return redirect()->route('guru');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $delete = Guru::where('id_guru', $id)->first();
        $delete->delete();
        Alert::error('Data Berhasil', 'Data Berhasil dihapus');
        return redirect()->route('guru');
    }
}
