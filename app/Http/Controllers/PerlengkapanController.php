<?php

namespace App\Http\Controllers;

use App\Models\Perlengkapan;
use Illuminate\Http\Request;

class PerlengkapanController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data['perlengkapan'] = Perlengkapan::get();
        return view('perlengkapan.perlengkapan', $data);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('perlengkapan.tambah');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $perlengkapan = new Perlengkapan();
        $perlengkapan->no_pol = $request['nomor'];
        $perlengkapan->max_pengisian = $request['max_isi'];
        $perlengkapan->jenis_bbm = $request['jenis_bbm'];
        $perlengkapan->save();

        return redirect('/perlengkapan');
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
        $data['perlengkapan'] = Perlengkapan::where('id', $id)->first();

        return view('perlengkapan.edit', $data);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $perlengkapan = Perlengkapan::where('id', $id)->first();
        $perlengkapan->no_pol = $request['nomor'];
        $perlengkapan->max_pengisian = $request['max_isi'];
        $perlengkapan->jenis_bbm = $request['jenis_bbm'];
        $perlengkapan->update();

        return redirect('/perlengkapan');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $perlengkapan = Perlengkapan::where('id', $id)->first();
        $perlengkapan->delete();

        return redirect('/perlengkapan');
    }
}
