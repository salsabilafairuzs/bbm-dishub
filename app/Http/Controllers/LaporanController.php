<?php

namespace App\Http\Controllers;

use PDF;
use App\Models\Laporan;
use App\Models\Transaksi;
use App\Models\Transaksi1;
use App\Models\Transaksi2;
use App\Models\Transaksi3;
use App\Models\Transaksi4;
use Illuminate\Http\Request;

class LaporanController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('laporan.laporan');
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

    public function cariLaporan(Request $request){
        // return $request; die;
        if($request['lanjut']){
            if($request['filter'] == 'all'){
                $data['transaksi'] = Transaksi::with('jenisKendaraan')->get();
                return view('laporan.laporan',$data);
    
            }else{
                $data['transaksi'] = Transaksi::with('jenisKendaraan')->whereMonth('created_at',$request['bulan'])->get();
                return view('laporan.laporan',$data);
            }
        }else{
            if($request['filter'] == 'all'){
                $data['transaksi'] = Transaksi::with('jenisKendaraan')->get();
                $data['jumlah'] = Transaksi::sum('jumlah_nominal');
                $no = 1;
                // return $data['peminjaman']; die;
                $pdf = PDF::loadView('laporan.laporan-pdf', $data);
                $pdf->setPaper('A4', 'potret');
                return $pdf->stream();
    
            }else{
                $data['transaksi'] = Transaksi::with('jenisKendaraan')->whereMonth('created_at',$request['bulan'])->get();
                $data['jumlah'] = Transaksi::whereMonth('created_at',$request['bulan'])->sum('jumlah_nominal');
                $no = 1;
                // return $data['peminjaman']; die;
                $pdf = PDF::loadView('laporan.laporan-pdf', $data);
                $pdf->setPaper('A4', 'potret');
                return $pdf->stream();
            }
        }
        

        // return $data;die;
        
    }
}
