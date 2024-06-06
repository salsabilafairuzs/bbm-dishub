<?php

namespace App\Http\Controllers;

use Validator;
use App\Models\Bbm;
use App\Models\Kendaraan;
use App\Models\Transaksi;
use Illuminate\Http\Request;
use App\Models\JenisKendaraan;
use Illuminate\Support\Facades\Auth;

class TransaksiController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        if(Auth::user()->roles()->first()->name == 'bendahara'){
            $data['transaksi'] = Transaksi::where('status','proses')->with('jenisKendaraan')->get();
        }else{
            $data['transaksi'] = Transaksi::with('jenisKendaraan')->get();
        }

        return view('transaksi.transaksi',$data);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $data['jenis'] = JenisKendaraan::get();
        $data['bbm'] = Bbm::get();
        $data['kendaraan'] = Kendaraan::get();
        return view('transaksi.tambah',$data);
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
            $count = Transaksi::where('no_pol',$request['nopol'])->count() + 1;
            $cari = Kendaraan::where('no_pol',$request->input('no_pol'))->first();

            // return $cari;

            $transaksi = new Transaksi();
            $transaksi->jenis_id = $cari->jenis_id;
            $transaksi->no_pol = $request['no_pol'];
            $transaksi->jenis_bbm = $request['bbm'];
            $transaksi->nama_pemohon = $request['nama'];
            $transaksi->no_seri_kupon = $request['no_seri'];
            $transaksi->tanggal = $request['tanggal'];
            $transaksi->jumlah_liter = $request['jumlah'];
            $transaksi->jumlah_nominal= $request['jumlah_nominal'];

            $name = 'buktiFoto-'.time().$transaksi->no_pol.$count.'.png';
            $image['filePath'] = $name;
            $file->move(public_path().'/buktiTransaksi', $name);

            $transaksi->bukti_pembayaran = $name;

            $transaksi->save();
        }
        return redirect('/transaksi');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $data = Transaksi::where('id', $id)->first();
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
        $data['jenis'] = JenisKendaraan::get();
        $data['kendaraan'] = Kendaraan::get();
        $data['transaksi'] = Transaksi::where('id',$id)->first();
        return view('transaksi.edit',$data);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $transaksi = Transaksi::where('id', $id)->first();
        // $transaksi->no_pol = $request['nopol'];
        $transaksi->jenis_bbm = $request['bbm'];
        $transaksi->nama_pemohon = $request['nama'];
        $transaksi->no_seri_kupon = $request['no_seri'];
        $transaksi->tanggal = $request['tanggal'];
        $transaksi->jumlah_liter = $request['jumlah'];
        $transaksi->jumlah_nominal= $request['jumlah_nominal'];
        $transaksi->update();

        return redirect('/transaksi');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $transaksi = Transaksi::where('id', $id)->first();
        $file_path = public_path().'/buktiTransaksi/'.$transaksi->bukti_pembayaran;

        // Menghapus data transaksi
        $transaksi->delete();

        // Menghapus file terkait
        if (file_exists($file_path)) {
            unlink($file_path);
        }
        return redirect('/transaksi');
    }

    public function ubahStatus(Request $request) {
        // return $request;
        if($request['acc']){
            $transaksi = Transaksi::where('id', $request['id'])->first();
            $transaksi->alasan = $request['alasan'];
            $transaksi->status = 'acc';
            $transaksi->update();
            return redirect('/transaksi');
        }elseif($request['revisi']){
            $transaksi = Transaksi::where('id', $request['id'])->first();
            $transaksi->alasan = $request['alasan'];
            $transaksi->status = 'revisi';
            $transaksi->update();
            return redirect('/transaksi');
        }else{
            $transaksi = Transaksi::where('id', $request['id'])->first();
            $transaksi->alasan = $request['alasan'];
            $transaksi->status = 'ditolak';
            $transaksi->update();
            return redirect('/transaksi');
        }
    }
}
