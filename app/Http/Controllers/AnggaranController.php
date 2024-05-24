<?php

namespace App\Http\Controllers;

use App\Models\Anggaran;
use Illuminate\Http\Request;

class AnggaranController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data['anggaran'] = Anggaran::get();
        return view('anggaran.anggaran',$data);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('anggaran.tambah');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
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
        $data['anggaran'] = Anggaran::where('id', $id)->first();
        return view('anggaran.edit', $data);
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
        $anggaran = Anggaran::where('id', $id)->first();
        $anggaran->delete();

        return redirect('/anggaran');
    }
}
