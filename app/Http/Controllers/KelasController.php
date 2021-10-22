<?php

namespace App\Http\Controllers;

use App\Models\Kelas;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;

class KelasController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $index = Kelas::all();
        return view('halaman_admin.kelola_kelas.index', compact('index'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('halaman_admin.kelola_kelas.tambah');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $tambah = new Kelas;
        $tambah->kelas = $request->kelas;
        $tambah->nama_kelas = $request->nama_kelas;
        $tambah->wali_kelas = $request->wali_kelas;
        $tambah->save();
        Alert::success('Data Berhasil', 'Data Berhasil Ditambah');
        return redirect()->route('kelas');
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
        $edit = Kelas::where('id_kelas', $id)->first();
        return view('halaman_admin.kelola_kelas.edit', compact('edit'));
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
        $update = Kelas::where('id_kelas', $id)->first();
        $update->kelas = $request->kelas;
        $update->nama_kelas = $request->nama_kelas;
        $update->wali_kelas = $request->wali_kelas;
        $update->save();
        Alert::success('Data Berhasil', 'Data Berhasil Diupdate');
        return redirect()->route('kelas');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $delete = Kelas::where('id_kelas', $id)->first();
        $delete->delete();
        Alert::error('Data Berhasil', 'Data Berhasil Dihapus');
        return redirect()->route('kelas');
    }
}
