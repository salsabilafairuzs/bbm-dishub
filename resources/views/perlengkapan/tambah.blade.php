@extends('template.template')
@section('konten')
    <div class="content-wrapper">
      <div class="card shadow-lg">
        <div class="card-body">
                    <h4 class="card-title">Tambah Data Perlengkapan</h4>
                    <form class="form-sample" action="{{url('perlengkapan')}}" method="POST">
                      @csrf @method('POST')
                        <div class="row">
                        <div class="col-md-6">
                            <div class="form-group row">
                            <label class="col-sm-3 col-form-label">Nomor Polisi</label>
                            <div class="col-sm-9">
                                <input type="text" class="form-control" name="nomor"/>
                            </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group row">
                            <label class="col-sm-3 col-form-label">Max Pengisian</label>
                            <div class="col-sm-9">
                                <input type="text" class="form-control" name="max_isi"/>
                            </div>
                            </div>
                        </div>
                        </div>
                        <div class="row">
                        <div class="col-md-6">
                            <div class="form-group row">
                            <label class="col-sm-3 col-form-label">Jenis BBM</label>
                            <div class="col-sm-9">
                                <select name="jenis_bbm" class="form-control">
                                    <option value="Pertamax">Pertamax</option>
                                    <option value="Dexlite">Dexlite</option>
                                </select>
                                {{-- <input type="text" class="form-control" name="jenis_bbm"/> --}}
                            </div>
                            </div>
                        </div>
                        </div>
                        <button type="submit" class="btn btn-primary mr-2">Submit</button>
                        <button class="btn btn-light">Cancel</button>
                    </form>
                    </div>
        </div>
    </div>
@endsection

