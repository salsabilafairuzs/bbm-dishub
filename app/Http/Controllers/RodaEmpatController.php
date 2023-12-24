<?php

namespace App\Http\Controllers;

use App\Models\RodaEmpat;
use Validator;
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
        $cek = Validator::make($request->all(), [
            'no_pol' => ['required','unique:buses'],
            'max_isi' => ['required'],
    
        ],[
            'no_pol.required'=> 'Nomor Polisi wajib diisi !',
            'no_pol.unique'=> 'Nomor Polisi sudah ada !',
            'max_isi.required'=> 'Max Pengisian wajib diisi !',
        ]);

        if ($cek->fails()) {
            return redirect()->back()
                ->withErrors($cek)
                ->withInput();
        }else{
            $rodaempat = new RodaEmpat();
            $rodaempat->no_pol = $request['no_pol'];
            $rodaempat->max_pengisian = $request['max_isi'];
            $rodaempat->jenis_bbm = $request['jenis_bbm'];
            $rodaempat->save();
        }
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
        
        $cek = Validator::make($request->all(), [
            'no_pol' => ['required','unique:buses'],
            'max_isi' => ['required'],
    
        ],[
            'no_pol.required'=> 'Nomor Polisi wajib diisi !',
            'no_pol.unique'=> 'Nomor Polisi sudah ada !',
            'max_isi.required'=> 'Max Pengisian wajib diisi !',
        ]);

        if ($cek->fails()) {
            return redirect()->back()
                ->withErrors($cek)
                ->withInput();
        }else{
            $rodaempat = new RodaEmpat();
            $rodaempat->no_pol = $request['no_pol'];
            $rodaempat->max_pengisian = $request['max_isi'];
            $rodaempat->jenis_bbm = $request['jenis_bbm'];
            $rodaempat->update();
        }
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
