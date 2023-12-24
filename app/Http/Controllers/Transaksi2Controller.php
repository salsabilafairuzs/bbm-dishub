<?php

namespace App\Http\Controllers;

use App\Models\Transaksi2;
use Illuminate\Http\Request;

class Transaksi2Controller extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data['transaksi2'] = Transaksi2::get();
        return view('transaksi2.transaksi2', $data);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('transaksi2.tambah');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $transaksi2 = new Transaksi2();
        $transaksi2->no_pol = $request['nopol'];
        $transaksi2->jenis_bbm = $request['bbm'];
        $transaksi2->nama_pemohon = $request['nama'];
        $transaksi2->no_seri_kupon = $request['no_seri'];
        $transaksi2->tanggal = $request['tanggal'];
        $transaksi2->jumlah_liter = $request['jumlah'];
        $transaksi2->harga_satuan = $request['harga_satuan'];
        $transaksi2->jumlah_nominal= $request['jumlah_nominal'];
        $transaksi2->save();

        return redirect('/transaksi2');
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
        $data['transaksi2'] = Transaksi2::where('id', $id)->first();

        return view('transaksi2.edit', $data);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $transaksi2 = Transaksi2::where('id', $id)->first();
        $transaksi2->no_pol = $request['nopol'];
        $transaksi2->jenis_bbm = $request['bbm'];
        $transaksi2->nama_pemohon = $request['nama'];
        $transaksi2->no_seri_kupon = $request['no_seri'];
        $transaksi2->tanggal = $request['tanggal'];
        $transaksi2->jumlah_liter = $request['jumlah'];
        $transaksi2->harga_satuan = $request['harga_satuan'];
        $transaksi2->jumlah_nominal= $request['jumlah_nominal'];
        $transaksi2->update();

        return redirect('/transaksi2');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $transaksi2 = Transaksi2::where('id', $id)->first();
        $transaksi2->delete();

        return redirect('/transaksi2');
    }
}
