<?php

namespace App\Http\Controllers;

use App\Models\RodaEmpat;
use Illuminate\Http\Request;

class rodaempatController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data['rodaempat'] = RodaEmpat::get();

        return view('rodaempat.roda-empat', $data);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('rodaempat.tambah');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $rodaempat = new RodaEmpat();
        $rodaempat->no_pol = $request['nomor'];
        $rodaempat->max_pengisian = $request['max_isi'];
        $rodaempat->jenis_bbm = $request['jenis_bbm'];
        $rodaempat->save();

        return redirect('/rodaempat');
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
        $data['rodaempat'] = RodaEmpat::where('id', $id)->first();

        return view('rodaempat.edit', $data);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $rodaempat = RodaEmpat::where('id', $id)->first();
        $rodaempat->no_pol = $request['nomor'];
        $rodaempat->max_pengisian = $request['max_isi'];
        $rodaempat->jenis_bbm = $request['jenis_bbm'];
        $rodaempat->update();

        return redirect('/rodaempat');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $rodaempat = RodaEmpat::where('id', $id)->first();
        $rodaempat->delete();

        return redirect('/rodaempat');
    }
}
