@extends('template.template')
@section('konten')
    <div class="content-wrapper">
    <div class="card shadow-lg">
        <div class="card-body">
                    <h4 class="card-title">Transaksi Bus & Elf</h4>
                    <form class="form-sample" action="{{url('transaksi3/'.$transaksi3->id)}}" method="POST">
                    @csrf @method('PATCH')
                        <p class="card-description">
                        Kendaraan
                        </p>
                        <div class="row">
                        <div class="col-md-6">
                            <div class="form-group row">
                            <label class="col-sm-3 col-form-label">NOPOL</label>
                            <div class="col-sm-9">
                                <select class="form-control" name="nopol" value="{{ $transaksi3->no_pol }}">
                                <option>AE 8902 KKL</option>
                                <option>FAE 5729 KH</option>
                                </select>
                            </div>
                            </div>
                        </div>
                        </div>
                        
                        <div class="row">
                        <div class="col-md-6">
                            <div class="form-group row">
                            <label class="col-sm-3 col-form-label">Jenis BBM</label>
                            <div class="col-sm-9">
                                <select class="form-control" name="bbm" value="{{ $transaksi3->jenis_bbm }}"/>
                                <option>Dexlite</option>
                                <option>Pertamax</option>
                                </select>
                            </div>
                            </div>
                        </div>
                        </div>
                        <p class="card-description">
                        Detail Transaksi
                        </p>
                        <div class="row">
                        <div class="col-md-6">
                            <div class="form-group row">
                            <label class="col-sm-3 col-form-label">Nama Pemohon</label>
                            <div class="col-sm-9">
                                <input type="text" class="form-control" name="nama" value="{{ $transaksi3->nama_pemohon }}"/>
                            </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group row">
                            <label class="col-sm-3 col-form-label">Tanggal</label>
                            <div class="col-sm-9">
                                <input type="date" class="form-control" name="tanggal" value="{{ $transaksi3->tanggal }}"/>
                            </div>
                            </div>
                        </div>
                        </div>
                        <div class="row">
                        <div class="col-md-6">
                            <div class="form-group row">
                            <label class="col-sm-3 col-form-label">No Seri Kupon</label>
                            <div class="col-sm-9">
                                <input type="text" class="form-control" name="no_seri" value="{{ $transaksi3->no_seri_kupon}}"/>
                            </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group row">
                            <label class="col-sm-3 col-form-label">Jumlah (Liter) </label>
                            <div class="col-sm-9">
                                <input type="text" class="form-control" name="jumlah" value="{{ $transaksi3->jumlah_liter }}"/>
                            </div>
                            </div>
                        </div>
                        </div>
                        <div class="row">
                        <div class="col-md-6">
                            <div class="form-group row">
                            <label class="col-sm-3 col-form-label">Jumlah Nominal</label>
                            <div class="col-sm-9">
                                <input type="text" class="form-control" name="jumlah_nominal" value="{{ $transaksi3->jumlah_nominal }}"/>
                            </div>
                            </div>
                        </div>
                        </div>
                        <div class="form-group">
                        <label>Bukti Pembayaran</label>
                        <input type="file" name="img[]" class="file-upload-default">
                        <div class="input-group col-xs-12">
                            <input type="text" class="form-control file-upload-info" disabled placeholder="Upload Bukti Pembayaran">
                            <span class="input-group-append">
                            <button class="file-upload-browse btn btn-primary" type="button">Upload</button>
                            </span>
                        </div>
                        </div>
                        <button type="submit" class="btn btn-primary mr-2">Submit</button>
                        {{-- <button class="btn btn-light">Cancel</button> --}}
                        <a href="/transaksi3" class="btn btn-light">Cancel</a>
                        </div>
                    </form>
                    </div>
        </div>
    </div>
@endsection