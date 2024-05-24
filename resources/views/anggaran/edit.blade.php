@extends('template.template')
@section('konten')
    <div class="content-wrapper">
    <div class="card shadow-lg">
        <div class="card-body">
                    <h4 class="card-title">Edit Anggaran</h4>
                    <form class="form-sample" action="{{url('anggaran/'.$anggaran->id)}}" method="POST">
                    @csrf @method('PATCH')
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group row">
                                <label class="col-sm-3 col-form-label">Anggaran</label>
                                <div class="col-sm-9">
                                    <input type="text" class="form-control" name="anggaran" value="{{ $anggaran->anggaran}}"/>
                                    @if ($errors->has('jenis_bbm'))
                                        <span class="text-danger">{{ $errors->first('anggaran') }}</span>
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

