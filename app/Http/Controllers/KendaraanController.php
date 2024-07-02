<?php

namespace App\Http\Controllers;

use App\Models\Kendaraan;
use Illuminate\Http\Request;
use App\Models\JenisKendaraan;
use Validator;

class KendaraanController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data['kendaraan'] = Kendaraan::with('jenisKendaraan')->orderBy('created_at','DESC')->get();
        // return $data; die;

        return view('kendaraan.kendaraan',$data);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $data['jenis'] = JenisKendaraan::get();
        return view('kendaraan.tambah',$data);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $cek = Validator::make($request->all(), [
            'jenis_kendaraan' => ['required'],
            'name' => ['required'],
            'no_pol' => ['required','unique:kendaraans'],
            'max_isi' => ['required'],
    
        ],[
            'jenis_kendaraan.required' => 'Nama Kendaraan wajib di isi !',
            'name.required' => 'Nama Kendaraan wajib di isi !',
            'name.unique' => 'Nama Kendaraan Sudah ada!',
            'no_pol.required'=> 'Nomor Polisi wajib diisi !',
            'no_pol.unique'=> 'Nomor Polisi sudah ada !',
            'max_isi.required'=> 'Max Pengisian wajib diisi !',
        ]);

        if ($cek->fails()) {
            return redirect()->back()
                ->withErrors($cek)
                ->withInput();
        }else{
            $kendaraan = new Kendaraan();
            $kendaraan->jenis_id = $request['jenis_kendaraan'];
            $kendaraan->name = ucwords($request['name']);
            $kendaraan->no_pol = $request['no_pol'];
            $kendaraan->max_pengisian = $request['max_isi'];
            $kendaraan->save();
        }
        return redirect('/kendaraan');
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

        $data['jenis'] = JenisKendaraan::get();
        $data['kendaraan'] = Kendaraan::where('id',$id)->first();
        // return $data; die;
        return view('kendaraan.edit',$data);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $cek = Validator::make($request->all(), [
            'jenis_kendaraan' => ['required'],
            'name' => ['required'],
            'no_pol' => ['required'],
            'max_isi' => ['required'],
    
        ],[
            'jenis_kendaraan.required' => 'Jenis Kendaraan wajib di isi !',
            'name.required' => 'Nama Kendaraan wajib di isi !',
            'no_pol.required'=> 'Nomor Polisi wajib diisi !',
            'no_pol.unique'=> 'Nomor Polisi sudah ada !',
            'max_isi.required'=> 'Max Pengisian wajib diisi !',
        ]);

        if ($cek->fails()) {
            return redirect()->back()
                ->withErrors($cek)
                ->withInput();
        }else{
            $kendaraan = Kendaraan::where('id',$id)->first();
            $kendaraan->jenis_id = $request['jenis_kendaraan'];
            $kendaraan->name = ucwords($request['name']);
            $kendaraan->no_pol = $request['no_pol'];
            $kendaraan->max_pengisian = $request['max_isi'];
            $kendaraan->update();
        }
        return redirect('/kendaraan');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $kendaraan = Kendaraan::where('id',$id)->delete();
        return redirect('kendaraan');

    }
}
