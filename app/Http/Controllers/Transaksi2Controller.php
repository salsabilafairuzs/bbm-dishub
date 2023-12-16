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
        return view('transaksi2.transaksi2');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $transaksi = new Transaksi2();
        $transaksi->no_pol = $request['nopol'];
        $transaksi->jenis_bbm = $request['bbm'];
        $transaksi->nama_pemohon = $request['nama'];
        $transaksi->no_seri_kupon = $request['no_seri'];
        $transaksi->tanggal = $request['tanggal'];
        $transaksi->jumlah_liter = $request['jumlah'];
        $transaksi->harga_satuan = $request['harga_satuan'];
        $transaksi->jumlah_nominal= $request['jumlah_nominal'];
        $transaksi->save();

        return back();
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
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
