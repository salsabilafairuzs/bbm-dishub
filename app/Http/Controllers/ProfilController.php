<?php

namespace App\Http\Controllers;

use App\Models\Profil;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ProfilController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // return Auth::user()->email;
        $data['profil'] = Profil::where('email',Auth::user()->email)->first();
        // return $data;

        return view('profil.profil',$data);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
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
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        // return $request;
        $profil = Profil::where('id',$id)->first();
        $profil->nama_profil = $request['name'];
        if (!empty($request->file('foto'))) {
            if (!empty($profil->foto_profil)) {
                // Hapus foto lama
                $oldFilePath = public_path().'/backend/images/profil/'.$profil->foto_profil;
                if (file_exists($oldFilePath)) {
                    unlink($oldFilePath);
                }
            }

            // $transaksi->bukti_pembayaran = 'buktiFoto-'.time().$transaksi->no_pol.$count.'.png';
            $file = $request->file('foto');
            $newFileName =  'profil-'.time().$profil->nama_profil.'.png';
            $file->move(public_path().'/backend/images/profil', $newFileName);
            $profil->foto_profil = $newFileName;
        }
        $profil->update();
        return redirect('profil');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
