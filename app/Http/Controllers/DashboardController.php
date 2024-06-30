<?php

namespace App\Http\Controllers;

use App\Models\Kendaraan;
use App\Models\Transaksi;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data['kendaraan'] = Kendaraan::get()->count();
        $data['bus'] = Kendaraan::where('jenis_id',1)->count();
        $data['roda2'] = Kendaraan::where('jenis_id',2)->count();
        $data['roda4'] = Kendaraan::where('jenis_id',3)->count();
        $data['perlengkapan'] = Kendaraan::where('jenis_id',4)->count();
        $data['transaksi'] = Transaksi::limit(7)->get();
        $data['acc'] = Transaksi::where('status','acc')->count();
        $data['revisi'] = Transaksi::where('status','revisi')->count();
        $data['tolak'] = Transaksi::where('status','ditolak')->count();
        return view('dashboard',$data);
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
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
