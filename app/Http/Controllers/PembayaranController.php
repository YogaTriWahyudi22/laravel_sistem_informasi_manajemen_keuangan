<?php

namespace App\Http\Controllers;

use App\Models\Pembayaran;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;

class PembayaranController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $index = Pembayaran::all();
        return view('halaman_bendahara.pembayaran.index', compact('index'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('halaman_bendahara.pembayaran.tambah');
    }

    public function ajax_tambah(Request $request)
    {
        if ($request->jenis == "Uang Pendaftaran") {
            echo "125000";
        } elseif ($request->jenis == "Uang Seragam") {
            echo "300000";
        } elseif ($request->jenis == "Uang DSP") {
            echo "1000000";
        } elseif ($request->jenis == "Uang SPP") {
            echo "100000";
        } elseif ($request->jenis == "Uang Ujian") {
            echo "80000";
        } elseif ($request->jenis == "Uang PKL") {
            echo "700000";
        }
    }
    public function store(Request $request)
    {
        $tambah = new Pembayaran;
        $tambah->kode = $request->kode;
        $tambah->jenis_pembayaran = $request->jenis_pembayaran;
        $tambah->nominal = $request->nominal;
        $tambah->save();

        Alert::success('Data Berhasil', 'Data Berhasil Ditambah');
        return redirect()->route('pembayaran');
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
        $edit = Pembayaran::where('id_pembayaran', $id)->first();
        return view('halaman_bendahara.pembayaran.edit', compact('edit'));
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
        $update = Pembayaran::where('id_pembayaran', $id)->first();
        $update->kode = $request->kode;
        $update->jenis_pembayaran = $request->jenis_pembayaran;
        $update->nominal = $request->nominal;
        $update->save();

        Alert::success('Data Berhasil', 'Data Berhasil Diupdate');
        return redirect()->route('pembayaran');
    }


    public function destroy($id)
    {
        $delete = Pembayaran::where('id_pembayaran', $id)->first();
        $delete->delete();
        Alert::error('Data Berhasil', 'Data Berhasil Dihapus');
        return redirect()->route('pembayaran');
    }
}
