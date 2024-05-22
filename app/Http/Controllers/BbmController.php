<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Bbm;
use Validator;

class BbmController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // step untuk index
        // 1. pertama dia lakukan adalah membuat variable(nama variabel nya bebas) bbm yang diamana isinya adalah dari database bbm / model bbm
        // 2. dia mengembalikan ke tampilan user dengan membawa variable tadi yang sudah di isi oleh data yang di butuhkan
        $data['bbm'] = Bbm::get();
        return view('bbm.bbm',$data);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        // step Create
        // biasanya cuma mengembalikan tampilan ke user arti dari retrun view adalah dia mengembalikan ke tampilan yang akan tampil ke user untuk input data 
        return view('bbm.tambah');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // Step menyimpan data
        // 1. dia cek ke validator fungsinya untuk validasi inputan dari user 
        // 2. dia proses untuk menyimpan datanya
        // ini adalah proses penyimpanan data 
        // 1. buat variabel dulu untuk meyimpan data dalam kasus ini variable yang di guanakan adalah $bbm diamana isinya adalah new bbm 
        // arti dari new bbm adalah kita ingin menambahkan data kedalam model bbm
        // 2. isikan variabel tersebut dengan format variable->nama_colom_di tabel = inputan di request
        // 3. adalah kita save dengan format variable->save()
        // setelah proses simoan berhasil dia akan mengembaliakan ke route yang di amana url nya adalah /bbm
        // return $request;
        $cek = Validator::make($request->all(), [
            'jenis_bbm' => ['required','unique:bbms'],
    
        ],[
            'jenis_bbm.required' => 'Jenis BBM wajib di isi !',
            'jenis_bbm.unique' => 'Jenis BBM sudah ada !',
        ]);

        if ($cek->fails()) {
            return redirect()->back()
                ->withErrors($cek)
                ->withInput();
        }else{
            $bbm = new Bbm();
            $bbm->jenis_bbm = strToUpper($request['jenis_bbm']);
            $bbm->save();
        }
        return redirect('/bbm');
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
        // step malakuakan penampilan view edit
        // 1. buat dulu variable , varaiable nya akan di isi oleh model data yang sudah di cari id nya , where disini , baca 
        // tolong carikan aku jenis bbm dimana id nya adalah yang dari url
        // 2. setelah itu tampilkan atau return view , ke user tampilan form untuk edit dengan membawa data yang sudah di cari
        $data['bbm'] = Bbm::where('id', $id)->first();
        return view('bbm.edit', $data);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        // Step menyimpan data
        // 1. dia cek ke validator fungsinya untuk validasi inputan dari user 
        // 2. dia proses untuk menyimpan datanya
        // ini adalah proses penyimpanan data 
        // 1. buat variabel dulu untuk meyimpan data dalam kasus ini variable yang di guanakan adalah $bbm diamana isinya adalah data jenis bbm
        // yang sudah di cari sebelumnya
        // 2. isikan variabel tersebut dengan format variable->nama_colom_di tabel = inputan di request
        // 3. adalah kita update dengan format variable->update()
        // setelah proses simoan berhasil dia akan mengembaliakan ke route yang di amana url nya adalah /bbm
        // return $request;
        $cek = Validator::make($request->all(), [
            'jenis_bbm' => ['required'],
    
        ],[
            'jenis_bbm.required' => 'Jenis BBM wajib di isi !',
        ]);

        if ($cek->fails()) {
            return redirect()->back()
                ->withErrors($cek)
                ->withInput();
        }else{
            $bbm = Bbm::where('id',$id)->first();
            $bbm->jenis_bbm = strToUpper($request['jenis_bbm']);
            $bbm->update();
        }
        return redirect('/bbm');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        // step untuk destrod data / hapus data
        // 1. dia akan membuat variable , diamana variable ini isinya adalah dari model yang sudah kita cari value nya dengan parameter id
        // 2. lakukan delete dengan format variable->delete(); artinya data yang sudah kita pilih tadi akan di hapus dari databse kita
        // 3. return ke url /bbm diamana isinya adalah list bbm 
        $jenis = Bbm::where('id', $id)->first();
        $jenis->delete();

        return redirect('/bbm');
    }
}
