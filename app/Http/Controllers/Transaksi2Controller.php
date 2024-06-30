<?php

namespace App\Http\Controllers;

use Validator;
use App\Models\RodaEmpat;
use App\Models\Transaksi2;
use Illuminate\Http\Request;

class Transaksi2Controller extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data['transaksi2'] = Transaksi2::get();
        return view('transaksi2.transaksi2', $data);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $data['rodaempat'] = RodaEmpat::get();
        return view('transaksi2.tambah',$data);
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
            $count = Transaksi2::where('no_pol',$request['nopol'])->count() + 1;

        $transaksi2 = new Transaksi2();
        $transaksi2->no_pol = $request['no_pol'];
        $transaksi2->jenis_bbm = $request['bbm'];
        $transaksi2->nama_pemohon = $request['nama'];
        $transaksi2->no_seri_kupon = $request['no_seri'];
        $transaksi2->tanggal = $request['tanggal'];
        $transaksi2->jumlah_liter = $request['jumlah'];
        $transaksi2->jumlah_nominal= $request['jumlah_nominal'];

        $name = 'buktiFoto-'.$transaksi2->no_pol.$count.'.png';
            $image['filePath'] = $name;
            $file->move(public_path().'/buktiTransaksi2', $name);
            
            $transaksi2->bukti_pembayaran = $name;
            
            $transaksi2->save();
        }

        return redirect('/transaksi2');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $data = Transaksi2::where('id', $id)->first();
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
        $data['transaksi2'] = Transaksi2::where('id', $id)->first();

        return view('transaksi2.edit', $data);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $transaksi2 = Transaksi2::where('id', $id)->first();
        $transaksi2->no_pol = $request['nopol'];
        $transaksi2->jenis_bbm = $request['bbm'];
        $transaksi2->nama_pemohon = $request['nama'];
        $transaksi2->no_seri_kupon = $request['no_seri'];
        $transaksi2->tanggal = $request['tanggal'];
        $transaksi2->jumlah_liter = $request['jumlah'];
        $transaksi2->harga_satuan = $request['harga_satuan'];
        $transaksi2->jumlah_nominal= $request['jumlah_nominal'];
        $transaksi2->update();

        return redirect('/transaksi2');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $transaksi2 = Transaksi2::where('id', $id)->first();
        $transaksi2->delete();

        return redirect('/transaksi2');
    }
}
