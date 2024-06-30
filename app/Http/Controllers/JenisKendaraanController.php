<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\JenisKendaraan;
use Validator;

class JenisKendaraanController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data['jenis'] = JenisKendaraan::get();
        return view('jenis.jenis',$data);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('jenis.tambah');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $cek = Validator::make($request->all(), [
            'jenis_kendaraan' => ['required','unique:jenis_kendaraans'],
    
        ],[
            'jenis_kendaraan.required' => 'Jenis Kendaraan wajib di isi !',
            'jenis_kendaraan.unique' => 'Jenis Kendaraan sudah ada !',
        ]);

        if ($cek->fails()) {
            return redirect()->back()
                ->withErrors($cek)
                ->withInput();
        }else{
            $jenis = new JenisKendaraan();
            $jenis->jenis_kendaraan = strToUpper($request['jenis_kendaraan']);
            $jenis->save();
        }
        return redirect('/jenis');
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
        $data['jenis'] = JenisKendaraan::where('id', $id)->first();

        return view('jenis.edit', $data);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $cek = Validator::make($request->all(), [
            'jenis_kendaraan' => ['required'],
    
        ],[
            'jenis_kendaraan.required' => 'Jenis Kendaraan wajib di isi !',
        ]);

        if ($cek->fails()) {
            return redirect()->back()
                ->withErrors($cek)
                ->withInput();
        }else{
            $jenis = JenisKendaraan::where('id',$id)->first();
            $jenis->jenis_kendaraan = strToUpper($request['jenis_kendaraan']);
            $jenis->update();
        }
        return redirect('/jenis');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $jenis = JenisKendaraan::where('id', $id)->first();
        $jenis->delete();

        return redirect('/jenis');
    }
}
