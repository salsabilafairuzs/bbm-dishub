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
use Illuminate\Support\Facades\Auth;

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
        if($request['lanjut']){
            if($request['filter'] == 'all'){
                $data['transaksi'] = Transaksi::with('jenisKendaraan')->where('status','acc')->orderBy('tanggal','ASC')->get();
                return view('laporan.laporan',$data);
            }else if($request['filter'] == 'bulan'){
                $data['transaksi'] = Transaksi::with('jenisKendaraan')->whereMonth('tanggal',$request['bulan'])->where('status','acc')->orderBy('tanggal','ASC')->get();
                return view('laporan.laporan',$data);
            }else if($request['filter'] == 'tahun'){
                $data['transaksi'] = Transaksi::with('jenisKendaraan')->whereYear('tanggal',intval($request['tahun']))->where('status','acc')->orderBy('tanggal','ASC')->get();
                return view('laporan.laporan',$data);
            }else{
                $data['transaksi'] = Transaksi::with('jenisKendaraan')->whereMonth('tanggal',$request['bulan'])->whereYear('created_at',intval($request['tahun']))->where('status','acc')->orderBy('tanggal','ASC')->get();
                return view('laporan.laporan',$data);
            }

        }else{

            if($request['filter'] == 'all'){
                $data['transaksi'] = Transaksi::with('jenisKendaraan')->where('status','acc')->orderBy('tanggal','ASC')->get();
                $data['jumlah'] = Transaksi::sum('jumlah_nominal');
                $data['dexlite'] = Transaksi::where('jenis_bbm','Dexlite')->sum('jumlah_liter');
                $data['pertamax'] = Transaksi::where('jenis_bbm','Pertamax')->sum('jumlah_liter');
                // return $data;
                $no = 1;
                if(Auth::user()->roles()->first()->name == 'superadmin' || Auth::user()->roles()->first()->name == 'admin'){
                    $pdf = PDF::loadView('laporan.laporan-pdf2', $data);
                }else{
                    $pdf = PDF::loadView('laporan.laporan-pdf', $data);
                }
                $pdf->setPaper('A4', 'potret');
                return $pdf->stream();

            }else if($request['filter'] == 'bulan'){
                $data['transaksi'] = Transaksi::with('jenisKendaraan')->whereMonth('tanggal',$request['bulan'])->where('status','acc')->orderBy('tanggal','ASC')->get();
                $data['jumlah'] = Transaksi::whereMonth('tanggal',$request['bulan'])->sum('jumlah_nominal');
                $data['dexlite'] = Transaksi::whereMonth('tanggal',$request['bulan'])->where('jenis_bbm','Dexlite')->sum('jumlah_liter');
                $data['pertamax'] = Transaksi::whereMonth('tanggal',$request['bulan'])->where('jenis_bbm','Pertamax')->sum('jumlah_liter');

                $no = 1;

                if(Auth::user()->roles()->first()->name == 'superadmin' || Auth::user()->roles()->first()->name == 'admin'){
                    $pdf = PDF::loadView('laporan.laporan-pdf2', $data);
                }else{
                    $pdf = PDF::loadView('laporan.laporan-pdf', $data);
                }
                // $pdf = PDF::loadView('laporan.laporan-pdf', $data);
                $pdf->setPaper('A4', 'potret');
                return $pdf->stream();
            }else if($request['filter'] == 'tahun'){
                $data['transaksi'] = Transaksi::with('jenisKendaraan')->whereYear('tanggal',intval($request['tahun']))->where('status','acc')->orderBy('tanggal','ASC')->get();
                $data['jumlah'] = Transaksi::whereYear('tanggal',intval($request['tahun']))->sum('jumlah_nominal');
                $data['dexlite'] = Transaksi::whereYear('tanggal',intval($request['tahun']))->where('jenis_bbm','Dexlite')->sum('jumlah_liter');
                $data['pertamax'] = Transaksi::whereYear('tanggal',intval($request['tahun']))->where('jenis_bbm','Pertamax')->sum('jumlah_liter');

                $no = 1;
                if(Auth::user()->roles()->first()->name == 'superadmin' || Auth::user()->roles()->first()->name == 'admin'){
                    $pdf = PDF::loadView('laporan.laporan-pdf2', $data);
                }else{
                    $pdf = PDF::loadView('laporan.laporan-pdf', $data);
                }
                // $pdf = PDF::loadView('laporan.laporan-pdf', $data);
                $pdf->setPaper('A4', 'potret');
                return $pdf->stream();
            }
            else{
                $data['transaksi'] = Transaksi::with('jenisKendaraan')->whereMonth('tanggal',$request['bulan'])->whereYear('tanggal',intval($request['tahun']))->where('status','acc')->orderBy('tanggal','ASC')->get();
                $data['jumlah'] = Transaksi::whereMonth('tanggal',$request['bulan'])->whereYear('tanggal',intval($request['tahun']))->sum('jumlah_nominal');
                $data['dexlite'] = Transaksi::whereMonth('tanggal',$request['bulan'])->whereYear('tanggal',intval($request['tahun']))->where('jenis_bbm','Dexlite')->sum('jumlah_liter');
                $data['pertamax'] = Transaksi::whereMonth('tanggal',$request['bulan'])->whereYear('tanggal',intval($request['tahun']))->where('jenis_bbm','Pertamax')->sum('jumlah_liter');
                $no = 1;
                if(Auth::user()->roles()->first()->name == 'superadmin' || Auth::user()->roles()->first()->name == 'admin'){
                    $pdf = PDF::loadView('laporan.laporan-pdf2', $data);
                }else{
                    $pdf = PDF::loadView('laporan.laporan-pdf', $data);
                }
                // $pdf = PDF::loadView('laporan.laporan-pdf', $data);
                $pdf->setPaper('A4', 'potret');
                return $pdf->stream();
            }
        }


        // return $data;die;

    }
}
