@extends('template.template')
@section('konten')
    <div class="content-wrapper">
    <div class="card shadow-lg">
        <div class="card-body">
                    <h4 class="card-title">Tambah Data Bus & Elf</h4>
                    <form class="form-sample" action="{{url('perlengkapan')}}" method="POST">
                    @csrf @method('POST')
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group row">
                                <label class="col-sm-3 col-form-label">Nama Barang</label>
                                <div class="col-sm-9">
                                    <input type="text" class="form-control" name="name" value="{{ old('name') }}"/>
                                    @if ($errors->has('name'))
                                        <span class="text-danger">{{ $errors->first('name') }}</span>
                                    @endif
                                </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group row">
                                <label class="col-sm-3 col-form-label">Max per Minggu/ per Bulan</label>
                                <div class="col-sm-9">
                                    <input type="text" class="form-control" name="max_isi" value="{{ old('max_isi') }}"/>
                                    @if ($errors->has('max_isi'))
                                        <span class="text-danger">{{ $errors->first('max_isi') }}</span>
                                    @endif
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
                        {{-- <button class="btn btn-light">Cancel</button> --}}
                        <a href="/bus" class="btn btn-light">Cancel</a>
                    </form>
                    </div>
        </div>
    </div>
@endsection

