@extends('template.template')
@section('konten')
    <div class="content-wrapper">
    <div class="card shadow-lg">
        <div class="card-body">
                    <h4 class="card-title">Edit Data Kendaraan</h4>
                    <form class="form-sample" action="{{url('kendaraan/'.$kendaraan->id)}}" method="POST">
                    @csrf @method('PATCH')
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group row">
                                <label class="col-sm-3 col-form-label">Jenis Kendaraan</label>
                                <div class="col-sm-9">
                                    {{-- <input type="text" class="form-control" name="name" value="{{ old('name') }}"/> --}}
                                    <select name="jenis_kendaraan" class="form-control">
                                        @foreach ($jenis as $item)
                                            <option value="{{ $item->id }}">{{ $item->jenis_kendaraan }}</option>
                                        @endforeach
                                    </select>
                                    @if ($errors->has('jenis_kendaraan'))
                                        <span class="text-danger">{{ $errors->first('jenis_kendaraan') }}</span>
                                    @endif
                                </div>
                            </div>
                        </div>
                    </div>
                        <div class="row">
                        <div class="col-md-6">
                            <div class="form-group row">
                            <label class="col-sm-3 col-form-label">Nama Kendaraan</label>
                            <div class="col-sm-9">
                                <input type="text" class="form-control" name="name" value="{{ $kendaraan->name }}"/>
                                @if ($errors->has('name'))
                                    <span class="text-danger">{{ $errors->first('name') }}</span>
                                @endif
                            </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group row">
                            <label class="col-sm-3 col-form-label">Nomor Polisi</label>
                            <div class="col-sm-9">
                                <input type="text" class="form-control" name="no_pol" value="{{ $kendaraan->no_pol}}"/>
                                @if ($errors->has('no_pol'))
                                    <span class="text-danger">{{ $errors->first('no_pol') }}</span>
                                @endif
                            </div>
                            </div>
                        </div>
                    </div>

                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group row">
                                <label class="col-sm-3 col-form-label">Max Pengisian</label>
                                <div class="col-sm-9">
                                    <input type="text" class="form-control" name="max_isi" value="{{ $kendaraan->max_pengisian }}"/>
                                    @if ($errors->has('max_isi'))
                                        <span class="text-danger">{{ $errors->first('max_isi') }}</span>
                                    @endif
                                </div>
                                </div>
                            </div>
                        {{-- <div class="col-md-6">
                            <div class="form-group row">
                            <label class="col-sm-3 col-form-label">Jenis BBM</label>
                            <div class="col-sm-9">
                                <select name="jenis_bbm" class="form-control">
                                    <option value="Pertamax">Pertamax</option>
                                    <option value="Dexlite">Dexlite</option>
                                </select>
                                {{-- <input type="text" class="form-control" name="jenis_bbm"/> --}}
                            {{-- </div>
                            </div>
                        </div> --}} 
                        </div>
                        <button type="submit" class="btn btn-primary mr-2">Submit</button>
                        {{-- <button class="btn btn-light">Cancel</button> --}}
                        <a href="/kendaraan" class="btn btn-light">Cancel</a>
                    </form>
                    </div>
        </div>
    </div>
@endsection

