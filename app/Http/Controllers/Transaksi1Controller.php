<?php

namespace App\Http\Controllers;

use App\Models\Bus;
use App\Models\Transaksi1;
use Illuminate\Http\Request;
use Validator;

class Transaksi1Controller extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data['transaksi1'] = Transaksi1::get();
        return view('transaksi1.transaksi1', $data);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $data['bus'] = Bus::get();
        return view('transaksi1.tambah',$data);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // return $request; 
        // die;
        $cek = Validator::make($request->all(), [
            'nama' => ['required'],
            'tanggal' => ['required'],
            'no_seri' => ['required'],
            'jumlah' => ['required','numeric'],
            'harga_satuan' => ['required','numeric'],
            'jumlah_nominal' => ['required','numeric'],
            'foto' => ['required', 'image', 'mimes:jpeg,png,jpg', 'max:2048'],
    
        ],[
            'nama.required'=> 'Nama wajib diisi !',
            'tanggal.required'=> 'Tangal wajib diisi !',
            'no_seri.required'=> 'Nomor Seri wajib diisi !',
            'jumlah.required'=> 'Jumlah wajib diisi !',
            'jumlah.numeric'=> 'Jumlah Wajib Number!',
            'harga_satuan.required'=> 'harga Satuan wajib diisi !',
            'harga_satuan.numeric'=> 'harga Satuan Wajib Number !',
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
            $count = Transaksi1::where('no_pol',$request['nopol'])->count() + 1;

            $transaksi1 = new Transaksi1();
            $transaksi1->no_pol = $request['no_pol'];
            $transaksi1->jenis_bbm = $request['bbm'];
            $transaksi1->nama_pemohon = $request['nama'];
            $transaksi1->no_seri_kupon = $request['no_seri'];
            $transaksi1->tanggal = $request['tanggal'];
            $transaksi1->jumlah_liter = $request['jumlah'];
            $transaksi1->harga_satuan = $request['harga_satuan'];
            $transaksi1->jumlah_nominal= $request['jumlah_nominal'];

            $name = 'buktiFoto-'.$transaksi1->no_pol.$count.'.png';
            $image['filePath'] = $name;
            $file->move(public_path().'/buktiTransaksi1', $name);
            
            $transaksi1->bukti_pembayaran = $name;
            
            $transaksi1->save();
        }   
        return redirect('/transaksi1');
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
        $data['transaksi1'] = Transaksi1::where('id', $id)->first();

        return view('transaksi1.edit', $data);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $transaksi1 = Transaksi1::where('id', $id)->first();
        $transaksi1->no_pol = $request['nopol'];
        $transaksi1->jenis_bbm = $request['bbm'];
        $transaksi1->nama_pemohon = $request['nama'];
        $transaksi1->no_seri_kupon = $request['no_seri'];
        $transaksi1->tanggal = $request['tanggal'];
        $transaksi1->jumlah_liter = $request['jumlah'];
        $transaksi1->harga_satuan = $request['harga_satuan'];
        $transaksi1->jumlah_nominal= $request['jumlah_nominal'];
        $transaksi1->update();

        return redirect('/transaksi1');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $transaksi1 = Transaksi1::where('id', $id)->first();
        $transaksi1->delete();

        return redirect('/transaksi1');
    }
}
