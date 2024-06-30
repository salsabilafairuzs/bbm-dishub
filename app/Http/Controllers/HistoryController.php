<?php

namespace App\Http\Controllers;

use App\Models\Transaksi;
use Illuminate\Http\Request;

class HistoryController extends Controller
{
    public function acc() {
        $data['transaksi'] = Transaksi::where('status','acc')->with('jenisKendaraan')->get();
        return view('history.acc',$data);
    }

    public function revisi() {
        $data['transaksi'] = Transaksi::where('status','revisi')->with('jenisKendaraan')->get();
        return view('history.revisi',$data);
    }

    public function tolak() {
        $data['transaksi'] = Transaksi::where('status','ditolak')->with('jenisKendaraan')->get();
        return view('history.tolak',$data);
    }

}
