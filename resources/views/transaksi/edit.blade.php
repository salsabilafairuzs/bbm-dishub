@extends('template.template')
@section('konten')
    <div class="content-wrapper">
    <div class="card shadow-lg">
        <div class="card-body">
                    <h4 class="card-title">Edit Transaksi Kendaraan</h4>
                    <form class="form-sample" action="{{url('transaksi/'.$transaksi->id)}}" method="POST" enctype="multipart/form-data">
                    @csrf @method('PATCH')
                        <p class="card-description">
                        Kendaraan
                        </p>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group row">
                                <label class="col-sm-3 col-form-label">NOPOL</label>
                                <div class="col-sm-9">
                                    {{-- <input type="text" class="form-control" name="nama" value="{{ $transaksi->nama_pemohon }}"/> --}}
                                    <select class="form-control" name="no_pol">
                                        @foreach ($kendaraan as $item)
                                            <option value="{{ $item->no_pol }}">{{ $item->no_pol }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group row">
                                <label class="col-sm-3 col-form-label">Jenis BBM</label>
                                <div class="col-sm-9">
                                    {{-- <input type="date" class="form-control" name="tanggal" value="{{ $transaksi->tanggal }}"/> --}}
                                    <select class="form-control" name="bbm" value="{{ $transaksi->jenis_bbm }}"/>
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
                                <input type="text" class="form-control" name="nama" value="{{ $transaksi->nama_pemohon }}"/>
                            </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group row">
                            <label class="col-sm-3 col-form-label">Tanggal</label>
                            <div class="col-sm-9">
                                <input type="date" class="form-control" name="tanggal" value="{{ $transaksi->tanggal }}"/>
                            </div>
                            </div>
                        </div>
                        </div>
                        <div class="row">
                        <div class="col-md-6">
                            <div class="form-group row">
                            <label class="col-sm-3 col-form-label">No Seri Kupon</label>
                            <div class="col-sm-9">
                                <input type="text" class="form-control" name="no_seri" value="{{ $transaksi->no_seri_kupon}}"/>
                            </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group row">
                            <label class="col-sm-3 col-form-label">Jumlah (Liter) </label>
                            <div class="col-sm-9">
                                <input type="text" class="form-control" name="jumlah" value="{{ $transaksi->jumlah_liter }}"/>
                            </div>
                            </div>
                        </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group row">
                                <label class="col-sm-3 col-form-label">Jumlah Nominal</label>
                                <div class="col-sm-9">
                                    <input type="text" class="form-control" name="jumlah_nominal" value="{{ $transaksi->jumlah_nominal }}"/>
                                </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group row">
                                    <label class="col-sm-3 col-form-label">Bukti Pembayaran<sup class="text-danger">*</sup></label>
                                    <div class="col-sm-9">
                                        <input type="file" class="form-control" name="foto"/>
                                        @if ($errors->has('foto'))
                                            <span class="text-danger">{{ $errors->first('foto') }}</span>
                                        @endif
                                    </div>
                                </div>
                            </div>
                        </div>
                        <button type="submit" class="btn btn-primary mr-2">Submit</button>
                        {{-- <button class="btn btn-light">Cancel</button> --}}
                        <a href="/transaksi" class="btn btn-light">Cancel</a>
                        </div>
                    </form>
                    </div>
        </div>
    </div>
@endsection
