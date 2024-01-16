<?php

namespace App\Http\Controllers;

use Validator;
use App\Models\Transaksi4;
use App\Models\Perlengkapan;
use Illuminate\Http\Request;

class Transaksi4Controller extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data['transaksi4'] = Transaksi4::get();
        return view('transaksi4.transaksi4', $data);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $data['perlengkapan'] = Perlengkapan::get();
        return view('transaksi4.tambah',$data);
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
            $count = Transaksi4::where('no_pol',$request['nopol'])->count() + 1;

        $transaksi4 = new Transaksi4();
        $transaksi4->no_pol = $request['no_pol'];
        $transaksi4->jenis_bbm = $request['bbm'];
        $transaksi4->nama_pemohon = $request['nama'];
        $transaksi4->no_seri_kupon = $request['no_seri'];
        $transaksi4->tanggal = $request['tanggal'];
        $transaksi4->jumlah_liter = $request['jumlah'];
        $transaksi4->jumlah_nominal= $request['jumlah_nominal'];

        $name = 'buktiFoto-'.$transaksi4->no_pol.$count.'.png';
            $image['filePath'] = $name;
            $file->move(public_path().'/buktiTransaksi4', $name);
            
            $transaksi4->bukti_pembayaran = $name;

        $transaksi4->save();
    }
        return redirect('/transaksi4');
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
        $data['transaksi4'] = Transaksi4::where('id', $id)->first();

        return view('transaksi4.edit', $data);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $transaksi4 = Transaksi4::where('id', $id)->first();
        $transaksi4->no_pol = $request['nopol'];
        $transaksi4->jenis_bbm = $request['bbm'];
        $transaksi4->nama_pemohon = $request['nama'];
        $transaksi4->no_seri_kupon = $request['no_seri'];
        $transaksi4->tanggal = $request['tanggal'];
        $transaksi4->jumlah_liter = $request['jumlah'];
        $transaksi4->jumlah_nominal= $request['jumlah_nominal'];
        $transaksi4->save();

        return redirect('/transaksi4');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $transaksi4 = Transaksi4::where('id', $id)->first();
        $transaksi4->delete();

        return redirect('/transaksi4');
    }
}
