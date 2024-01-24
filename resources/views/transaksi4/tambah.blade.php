@extends('template.template')
@section('konten')
    <div class="content-wrapper">
    <div class="card shadow-lg">
        <div class="card-body">
                    <h4 class="card-title">Transaksi Perlengkapan</h4>
                    <form class="form-sample" action="{{url('transaksi4')}}" method="POST" enctype="multipart/form-data">
                    @csrf @method('POST')
                        <p class="card-description">
                        Kendaraan
                        </p>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group row">
                                <label class="col-sm-3 col-form-label">NOPOL</label>
                                <div class="col-sm-9">
                                    <select class="form-control" name="no_pol">
                                        @foreach ($perlengkapan as $item)
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
                                    <select class="form-control" name="bbm">
                                    <option>Dexlite</option>
                                    <option>Pertamax</option>
                                    </select>
                                </div>
                                </div>
                            </div>
                        </div>
                        <hr>
                        <p class="card-description">
                        Detail Transaksi
                        </p>
                        <br>
                        <div class="row">
                        <div class="col-md-6">
                            <div class="form-group row">
                            <label class="col-sm-3 col-form-label">Nama Pemohon <sup class="text-danger">*</sup></label>
                            <div class="col-sm-9">
                                <input type="text" class="form-control" name="nama"/>
                                @if ($errors->has('nama'))
                                    <span class="text-danger">{{ $errors->first('nama') }}</span>
                                @endif
                            </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group row">
                            <label class="col-sm-3 col-form-label">Tanggal <sup class="text-danger">*</sup></label>
                            <div class="col-sm-9">
                                <input type="date" class="form-control" name="tanggal"/>
                                @if ($errors->has('tanggal'))
                                    <span class="text-danger">{{ $errors->first('tanggal') }}</span>
                                @endif
                            </div>
                            </div>
                        </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group row">
                                <label class="col-sm-3 col-form-label">No Seri Kupon <sup class="text-danger">*</sup></label>
                                <div class="col-sm-9">
                                    <input type="text" class="form-control" name="no_seri"/>
                                    @if ($errors->has('no_seri'))
                                        <span class="text-danger">{{ $errors->first('no_seri') }}</span>
                                    @endif
                                </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group row">
                                <label class="col-sm-3 col-form-label">Jumlah (Liter) <sup class="text-danger">*</sup></label>
                                <div class="col-sm-9">
                                    <input type="text" class="form-control" name="jumlah"/>
                                    @if ($errors->has('jumlah'))
                                        <span class="text-danger">{{ $errors->first('jumlah') }}</span>
                                    @endif
                                </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group row">
                                <label class="col-sm-3 col-form-label">Jumlah Nominal <sup class="text-danger">*</sup></label>
                                <div class="col-sm-9">
                                    <input type="text" class="form-control" name="jumlah_nominal"/>
                                    @if ($errors->has('jumlah_nominal'))
                                        <span class="text-danger">{{ $errors->first('jumlah_nominal') }}</span>
                                    @endif
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
                        <a href="/transaksi1" class="btn btn-light">Cancel</a>
                        </div>
                    </form>
                    </div>
        </div>
    </div>
@endsection