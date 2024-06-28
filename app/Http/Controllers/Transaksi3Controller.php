<?php

namespace App\Http\Controllers;

use Validator;
use App\Models\RodaDua;
use App\Models\Transaksi3;
use Illuminate\Http\Request;

class Transaksi3Controller extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data['transaksi3'] = Transaksi3::get();
        return view('transaksi3.transaksi3', $data);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $data['rodadua'] = RodaDua::get();
        return view('transaksi3.tambah',$data);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $cek = Validator::make($request->all(), [
            'nama' => ['required'],
            'tanggal' => ['required'],
            'no_seri' => ['required'],
            'jumlah' => ['required','numeric'],
            'jumlah_nominal' => ['required','numeric'],
            'foto' => ['required', 'image', 'mimes:jpeg,png,jpg', 'max:2048'],
    
        ],[
            'nama.required'=> 'Nama wajib diisi !',
            'tanggal.required'=> 'Tanggal wajib diisi !',
            'no_seri.required'=> 'Nomor Seri wajib diisi !',
            'jumlah.required'=> 'Jumlah wajib diisi !',
            'jumlah.numeric'=> 'Jumlah Wajib Number!',
            'jumlah_nominal.required'=> 'Jumlah Nominal wajib diisi !',
            'jumlah_nominal.numeric'=> 'Jumlah Nominal wajib Number !',
            'foto.required' => 'Foto wajib diunggah!',
            'foto.image' => 'File harus berupa gambar!',
            'foto.mimes' => 'Format file harus jpeg, png, atau jpg!',
            'foto.max' => 'Ukuran file maksimum adalah 2MB!',
        ]);

        if ($cek->fails()) {
            return redirect()->back()
                ->withErrors($cek)
                ->withInput();
        }else{
            $file = $request->file('foto');
            $count = Transaksi3::where('no_pol',$request['nopol'])->count() + 1;

        $transaksi3 = new Transaksi3();
        $transaksi3->no_pol = $request['no_pol'];
        $transaksi3->jenis_bbm = $request['bbm'];
        $transaksi3->nama_pemohon = $request['nama'];
        $transaksi3->no_seri_kupon = $request['no_seri'];
        $transaksi3->tanggal = $request['tanggal'];
        $transaksi3->jumlah_liter = $request['jumlah'];
        $transaksi3->jumlah_nominal= $request['jumlah_nominal'];
        
        $name = 'buktiFoto-'.$transaksi3->no_pol.$count.'.png';
        $image['filePath'] = $name;
        $file->move(public_path().'/buktiTransaksi3', $name);
        
        $transaksi3->bukti_pembayaran = $name;

        $transaksi3->save();
    }
        return redirect('/transaksi3');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $data = Transaksi3::where('id', $id)->first();
        return response()->json([
            'success' => true,
            'data'=>$data,
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $data['transaksi3'] = Transaksi3::where('id', $id)->first();

        return view('transaksi3.edit', $data);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $transaksi3 = Transaksi3::where('id', $id)->first();
        $transaksi3->no_pol = $request['nopol'];
        $transaksi3->jenis_bbm = $request['bbm'];
        $transaksi3->nama_pemohon = $request['nama'];
        $transaksi3->no_seri_kupon = $request['no_seri'];
        $transaksi3->tanggal = $request['tanggal'];
        $transaksi3->jumlah_liter = $request['jumlah'];
        $transaksi3->jumlah_nominal= $request['jumlah_nominal'];
        $transaksi3->update();

        return redirect('/transaksi3');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $transaksi3 = Transaksi3::where('id', $id)->first();
        $transaksi3->delete();

        return redirect('/transaksi3');
    }
}
