@extends('template.template')
@section('konten')
    <div class="content-wrapper">
      <div class="row">
        <div class="col-md-12 grid-margin">
          <div class="row">
            <div class="col-12 col-xl-8 mb-4 mb-xl-0">
              <h3 class="font-weight-bold">Welcome Admin!</h3>
            </div>
            <div class="col-12 col-xl-4">
            <div class="justify-content-end d-flex">
              <div class="dropdown flex-md-grow-1 flex-xl-grow-0">
                <button class="btn btn-sm btn-light bg-white dropdown-toggle" type="button" id="dropdownMenuDate2" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">
                <i class="mdi mdi-calendar"></i> Today ( {{ now()->format('d-m-Y') }} )
                </button>
                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="dropdownMenuDate2">
                  <a class="dropdown-item" href="#">January - March</a>
                  <a class="dropdown-item" href="#">March - June</a>
                  <a class="dropdown-item" href="#">June - August</a>
                  <a class="dropdown-item" href="#">August - November</a>
                </div>
              </div>
            </div>
            </div>
          </div>
        </div>
      </div>
      <div class="card shadow-lg">
        <div class="card-body">
                    <h4 class="card-title">Transaksi Perlengkapan</h4>
                    <form class="form-sample" action="{{url('transaksi4')}}" method="POST">
                      @csrf @method('POST')
                        <p class="card-description">
                        Kendaraan
                        </p>
                        <div class="row">
                        <div class="col-md-6">
                            <div class="form-group row">
                            <label class="col-sm-3 col-form-label">NOPOL</label>
                            <div class="col-sm-9">
                                <select class="form-control" name="nopol">
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
                                <select class="form-control" name="bbm">
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
                                <input type="text" class="form-control" name="nama"/>
                            </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group row">
                            <label class="col-sm-3 col-form-label">Tanggal</label>
                            <div class="col-sm-9">
                                <input type="date" class="form-control" name="tanggal"/>
                            </div>
                            </div>
                        </div>
                        </div>
                        <div class="row">
                        <div class="col-md-6">
                            <div class="form-group row">
                            <label class="col-sm-3 col-form-label">No Seri Kupon</label>
                            <div class="col-sm-9">
                                <input type="text" class="form-control" name="no_seri"/>
                            </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group row">
                            <label class="col-sm-3 col-form-label">Jumlah (Liter) </label>
                            <div class="col-sm-9">
                                <input type="text" class="form-control" name="jumlah"/>
                            </div>
                            </div>
                        </div>
                        </div>
                        <div class="row">
                        <div class="col-md-6">
                            <div class="form-group row">
                            <label class="col-sm-3 col-form-label">Harga Satuan</label>
                            <div class="col-sm-9">
                                <input type="text" class="form-control" name="harga_satuan"/>
                            </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group row">
                            <label class="col-sm-3 col-form-label">Jumlah Nominal</label>
                            <div class="col-sm-9">
                                <input type="text" class="form-control" name="jumlah_nominal"/>
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
                        <button class="btn btn-light">Cancel</button>
                        </div>
                    </form>
                    </div>
        </div>
    </div>
@endsection

