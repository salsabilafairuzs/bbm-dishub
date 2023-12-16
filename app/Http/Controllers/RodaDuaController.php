<?php

namespace App\Http\Controllers;

use App\Models\RodaDua;
use Illuminate\Http\Request;

class RodaDuaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data['rodadua'] = RodaDua::get();

        return view('rodadua.roda-dua', $data);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('rodadua.tambah');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $rodadua = new RodaDua();
        $rodadua->no_pol = $request['nomor'];
        $rodadua->max_pengisian = $request['max_isi'];
        $rodadua->jenis_bbm = $request['jenis_bbm'];
        $rodadua->save();

        return redirect('/rodadua');
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
        $data['rodadua'] = RodaDua::where('id', $id)->first();

        return view('rodadua.edit', $data);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $rodadua = RodaDua::where('id', $id)->first();
        $rodadua->no_pol = $request['nomor'];
        $rodadua->max_pengisian = $request['max_isi'];
        $rodadua->jenis_bbm = $request['jenis_bbm'];
        $rodadua->update();

        return redirect('/rodadua');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $rodadua = RodaDua::where('id', $id)->first();
        $rodadua->delete();

        return redirect('/rodadua');
    }
}
