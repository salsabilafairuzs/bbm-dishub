<?php

namespace App\Http\Controllers;

use App\Models\Anggaran;
use Illuminate\Http\Request;
use Validator;

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
        $cek = Validator::make($request->all(), [
            'divisi' => ['required'],
            'kegiatan' => ['required'],
            'tanggal' => ['required'],
            'anggaran' => ['required','numeric'],

    
        ],[
            'divisi.required'=> 'Divisi wajib diisi !',
            'kegiatan.required'=> 'Kegiatan wajib diisi !',
            'tanggal.required'=> 'Tanggal wajib diisi !',
            'anggaran.required'=> 'Jumlah Anggaran wajib diisi !',
            'anggaran.numeric'=> 'Jumlah Anggaran Wajib Number!',
        ]);

        if ($cek->fails()) {
            return redirect()->back()
                ->withErrors($cek)
                ->withInput();
        }else{
            $anggaran = new Anggaran();
            $anggaran->divisi = $request['divisi'];
            $anggaran->kegiatan = $request['kegiatan'];
            $anggaran->tanggal = $request['tanggal'];
            $anggaran->anggaran = $request['anggaran'];
            $anggaran->save();
        }   
        return redirect('/anggaran');
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
        $cek = Validator::make($request->all(), [
            'divisi' => ['required'],
            'kegiatan' => ['required'],
            'tanggal' => ['required'],
            'anggaran' => ['required','numeric'],

    
        ],[
            'divisi.required'=> 'Divisi wajib diisi !',
            'kegiatan.required'=> 'Kegiatan wajib diisi !',
            'tanggal.required'=> 'Tanggal wajib diisi !',
            'anggaran.required'=> 'Jumlah Anggaran wajib diisi !',
            'anggaran.numeric'=> 'Jumlah Anggaran Wajib Number!',
        ]);

        if ($cek->fails()) {
            return redirect()->back()
                ->withErrors($cek)
                ->withInput();
        }else{
            $anggaran = Anggaran::where('id',$id)->first();
            $anggaran->divisi = $request['divisi'];
            $anggaran->kegiatan = $request['kegiatan'];
            $anggaran->tanggal = $request['tanggal'];
            $anggaran->anggaran = $request['anggaran'];
            $anggaran->update();
        }   
        return redirect('/anggaran');
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
