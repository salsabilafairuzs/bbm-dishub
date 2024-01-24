<?php

namespace App\Http\Controllers;

use App\Models\Perlengkapan;
use Validator;
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
        $cek = Validator::make($request->all(), [
            'name' => ['required', 'unique:perlengkapans'],
            'max_isi' => ['required'],
    
        ],[
            'name' => 'Nama Barang wajib di isi !',
            'name.unique'=> 'Nama Barang sudah ada !',
            'max_isi.required'=> 'Max Pengisian wajib diisi !',
        ]);

        if ($cek->fails()) {
            return redirect()->back()
                ->withErrors($cek)
                ->withInput();
        }else{
            $perlengkapan = new Perlengkapan();
            $perlengkapan->name = $request['name'];
            $perlengkapan->max_pengisian = $request['max_isi'];
            $perlengkapan->jenis_bbm = $request['jenis_bbm'];
            $perlengkapan->save();
        }
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
        $cek = Validator::make($request->all(), [
            'name' => ['required'],
            'max_isi' => ['required'],
    
        ],[
            'name' => 'Nama Kendaraan wajib di isi !',
            'max_isi.required'=> 'Max Pengisian wajib diisi !',
        ]);

        if ($cek->fails()) {
            return redirect()->back()
                ->withErrors($cek)
                ->withInput();
        }else{
            $perlengkapan = Perlengkapan::where('id', $id)->first();
            $perlengkapan->name = $request['name'];
            $perlengkapan->max_pengisian = $request['max_isi'];
            $perlengkapan->jenis_bbm = $request['jenis_bbm'];
            $perlengkapan->update();
        }

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
