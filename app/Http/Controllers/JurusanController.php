<?php

namespace App\Http\Controllers;

use App\Models\Jurusan;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;

class JurusanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $index = Jurusan::all();
        return view('halaman_admin.kelola_jurusan.index', compact('index'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('halaman_admin.kelola_jurusan.tambah');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $tambah = new Jurusan;
        $tambah->nama_jurusan = $request->nama_jurusan;
        $tambah->save();

        Alert::success('Data Berhasil', 'Data Berhasil ditambahkan');
        return redirect()->route('jurusan');
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
        $edit = Jurusan::where('id_jurusan', $id)->first();
        return view('halaman_admin.kelola_jurusan.edit', compact('edit'));
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
        $update = Jurusan::where('id_jurusan', $id)->first();
        $update->nama_jurusan = $request->nama_jurusan;

        $update->save();

        Alert::success('Data Berhasil', 'Data Berhasil diupdate');
        return redirect()->route('jurusan');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $delete = Jurusan::where('id_jurusan', $id)->first();
        $delete->delete();

        Alert::error('Data Berhasil', 'Data Berhasil dihapus');
        return redirect()->route('jurusan');
    }
}
