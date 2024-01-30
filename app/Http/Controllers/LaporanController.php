<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class LaporanController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        
        $data['laporan'] = Laporan::get();
        return view('laporan.laporan', $data);
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
        $laporan = new Laporan();
        $laporan->no_pol = $request['no_pol'];
        $laporan->jenis_bbm = $request['bbm'];
        $laporan->nama_pemohon = $request['nama'];
        $laporan->no_seri_kupon = $request['no_seri'];
        $laporan->tanggal = $request['tanggal'];
        $laporan->jumlah_liter = $request['jumlah'];
        $laporan->jumlah_nominal= $request['jumlah_nominal'];

        $laporan->bukti_pembayaran = $name;
        
        $laporan->save();

        return redirect('/laporan');
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
