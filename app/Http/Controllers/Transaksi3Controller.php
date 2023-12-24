<?php

namespace App\Http\Controllers;

use App\Models\Transaksi3;
use Illuminate\Http\Request;

class Transaksi3Controller extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data['transaksi3'] = Transaksi3::get();
        return view('transaksi3.transaksi3', $data);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('transaksi3.tambah');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $transaksi3 = new Transaksi3();
        $transaksi3->no_pol = $request['nopol'];
        $transaksi3->jenis_bbm = $request['bbm'];
        $transaksi3->nama_pemohon = $request['nama'];
        $transaksi3->no_seri_kupon = $request['no_seri'];
        $transaksi3->tanggal = $request['tanggal'];
        $transaksi3->jumlah_liter = $request['jumlah'];
        $transaksi3->harga_satuan = $request['harga_satuan'];
        $transaksi3->jumlah_nominal= $request['jumlah_nominal'];
        $transaksi3->save();

        return redirect('/transaksi3');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $data['transaksi3'] = Transaksi3::where('id', $id)->first();

        return view('transaksi3.edit', $data);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $transaksi3 = Transaksi3::where('id', $id)->first();
        $transaksi3->no_pol = $request['nopol'];
        $transaksi3->jenis_bbm = $request['bbm'];
        $transaksi3->nama_pemohon = $request['nama'];
        $transaksi3->no_seri_kupon = $request['no_seri'];
        $transaksi3->tanggal = $request['tanggal'];
        $transaksi3->jumlah_liter = $request['jumlah'];
        $transaksi3->harga_satuan = $request['harga_satuan'];
        $transaksi3->jumlah_nominal= $request['jumlah_nominal'];
        $transaksi3->update();

        return redirect('/transaksi3');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $transaksi3 = Transaksi3::where('id', $id)->first();
        $transaksi3->delete();

        return redirect('/transaksi3');
    }
}
