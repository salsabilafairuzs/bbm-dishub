<?php

namespace App\Http\Controllers;

use App\Models\Transaksi4;
use Illuminate\Http\Request;

class Transaksi4Controller extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data['transaksi4'] = Transaksi4::get();
        return view('transaksi4.transaksi4', $data);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('transaksi4.tambah');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $transaksi4 = new Transaksi4();
        $transaksi4->no_pol = $request['nopol'];
        $transaksi4->jenis_bbm = $request['bbm'];
        $transaksi4->nama_pemohon = $request['nama'];
        $transaksi4->no_seri_kupon = $request['no_seri'];
        $transaksi4->tanggal = $request['tanggal'];
        $transaksi4->jumlah_liter = $request['jumlah'];
        $transaksi4->harga_satuan = $request['harga_satuan'];
        $transaksi4->jumlah_nominal= $request['jumlah_nominal'];
        $transaksi4->save();

        return redirect('/transaksi4');
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
        $data['transaksi4'] = Transaksi4::where('id', $id)->first();

        return view('transaksi4.edit', $data);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $transaksi4 = Transaksi4::where('id', $id)->first();
        $transaksi4->no_pol = $request['nopol'];
        $transaksi4->jenis_bbm = $request['bbm'];
        $transaksi4->nama_pemohon = $request['nama'];
        $transaksi4->no_seri_kupon = $request['no_seri'];
        $transaksi4->tanggal = $request['tanggal'];
        $transaksi4->jumlah_liter = $request['jumlah'];
        $transaksi4->harga_satuan = $request['harga_satuan'];
        $transaksi4->jumlah_nominal= $request['jumlah_nominal'];
        $transaksi4->save();

        return redirect('/transaksi4');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $transaksi4 = Transaksi4::where('id', $id)->first();
        $transaksi4->delete();

        return redirect('/transaksi4');
    }
}
