<?php

namespace App\Http\Controllers;

use App\Models\Transaksi1;
use Illuminate\Http\Request;

class Transaksi1Controller extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data['transaksi1'] = Transaksi1::get();
        return view('transaksi1.transaksi1', $data);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('transaksi1.tambah');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // return $request; 

        $transaksi1 = new Transaksi1();
        $transaksi1->no_pol = $request['nopol'];
        $transaksi1->jenis_bbm = $request['bbm'];
        $transaksi1->nama_pemohon = $request['nama'];
        $transaksi1->no_seri_kupon = $request['no_seri'];
        $transaksi1->tanggal = $request['tanggal'];
        $transaksi1->jumlah_liter = $request['jumlah'];
        $transaksi1->harga_satuan = $request['harga_satuan'];
        $transaksi1->jumlah_nominal= $request['jumlah_nominal'];
        $transaksi1->save();

        return redirect('/transaksi1');
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
        $data['transaksi1'] = Transaksi1::where('id', $id)->first();

        return view('transaksi1.edit', $data);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $transaksi1 = Transaksi1::where('id', $id)->first();
        $transaksi1->no_pol = $request['nopol'];
        $transaksi1->jenis_bbm = $request['bbm'];
        $transaksi1->nama_pemohon = $request['nama'];
        $transaksi1->no_seri_kupon = $request['no_seri'];
        $transaksi1->tanggal = $request['tanggal'];
        $transaksi1->jumlah_liter = $request['jumlah'];
        $transaksi1->harga_satuan = $request['harga_satuan'];
        $transaksi1->jumlah_nominal= $request['jumlah_nominal'];
        $transaksi1->update();

        return redirect('/transaksi1');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $transaksi1 = Transaksi1::where('id', $id)->first();
        $transaksi1->delete();

        return redirect('/transaksi1');
    }
}
