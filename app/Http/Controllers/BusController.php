<?php

namespace App\Http\Controllers;

use App\Models\Bus;
use Validator;
use Illuminate\Http\Request;

class BusController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data['bus'] = Bus::get();
        // return $data; die;
        return view('bus.bus', $data);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('bus.tambah');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // return $request;

        $cek = Validator::make($request->all(), [
            'name' => ['required'],
            'no_pol' => ['required','unique:buses'],
            'max_isi' => ['required'],
    
        ],[
            'name' => 'Nama Kendaraan wajib di isi !',
            'no_pol.required'=> 'Nomor Polisi wajib diisi !',
            'no_pol.unique'=> 'Nomor Polisi sudah ada !',
            'max_isi.required'=> 'Max Pengisian wajib diisi !',
        ]);

        if ($cek->fails()) {
            return redirect()->back()
                ->withErrors($cek)
                ->withInput();
        }else{
            $bus = new Bus();
            $bus->name = $request['name'];
            $bus->no_pol = $request['no_pol'];
            $bus->max_pengisian = $request['max_isi'];
            $bus->jenis_bbm = $request['jenis_bbm'];
            $bus->save();
        }
        return redirect('/bus');
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
        $data['bus'] = Bus::where('id', $id)->first();

        return view('bus.edit', $data);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        // return $request; die;
        $cek = Validator::make($request->all(), [
            'name' => ['required'],
            'no_pol' => ['required'],
            'max_isi' => ['required'],
    
        ],[
            'name' => 'Nama Kendaraan wajib di isi !',
            'no_pol.required'=> 'Nomor Polisi wajib diisi !',
            'max_isi.required'=> 'Max Pengisian wajib diisi !',
        ]);

        if ($cek->fails()) {
            return redirect()->back()
                ->withErrors($cek)
                ->withInput();
        }else{
            $bus = Bus::where('id', $id)->first();
            $bus->name = $request['name'];
            $bus->no_pol = $request['no_pol'];
            $bus->max_pengisian = $request['max_isi'];
            $bus->jenis_bbm = $request['jenis_bbm'];
            $bus->update();
        }

        return redirect('/bus');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $bus = Bus::where('id', $id)->first();
        $bus->delete();

        return redirect('/bus');
    }
}
