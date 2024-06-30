@extends('template.template')
@section('konten')
    <div class="content-wrapper">
    <div class="card shadow-lg">
        <div class="card-body">
                    <h4 class="card-title">Tambah Data Jenis Kendaraan</h4>
                    <form class="form-sample" action="{{url('jenis')}}" method="POST">
                    @csrf @method('POST')
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group row">
                                    <label class="col-sm-3 col-form-label">Jenis Kendaraan</label>
                                    <div class="col-sm-9">
                                        <input type="text" class="form-control" name="jenis_kendaraan" value="{{ old('jenis_kendaraan') }}"/>
                                        @if ($errors->has('jenis_kendaraan'))
                                            <span class="text-danger">{{ $errors->first('jenis_kendaraan') }}</span>
                                        @endif
                                    </div>
                                </div>
                            </div>
                        </div>
                        <button type="submit" class="btn btn-primary mr-2">Submit</button>
                        {{-- <button class="btn btn-light">Cancel</button> --}}
                        <a href="/jenis" class="btn btn-light">Cancel</a>
                    </form>
                    </div>
        </div>
    </div>
@endsection

