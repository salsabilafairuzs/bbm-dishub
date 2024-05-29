@extends('template.template')
@section('konten')
    <div class="content-wrapper">
    <div class="card shadow-lg">
        <div class="card-body">
                    <h4 class="card-title">Tambah Data Jenis BBM</h4>
                    <form class="form-sample" action="{{url('bbm')}}" method="POST">
                    @csrf @method('POST')
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group row">
                                    <label class="col-sm-3 col-form-label">Jenis BBM</label>
                                    <div class="col-sm-9">
                                        <input type="text" class="form-control" name="jenis_bbm" value="{{ old('jenis_bbm') }}"/>
                                        
                                        @if ($errors->has('jenis_bbm'))
                                            <span class="text-danger">{{ $errors->first('jenis_bbm') }}</span>
                                        @endif
                                    </div>
                                </div>
                            </div>
                        </div>
                        <button type="submit" class="btn btn-primary mr-2">Submit</button>
                        {{-- <button class="btn btn-light">Cancel</button> --}}
                        <a href="/bbm" class="btn btn-light">Cancel</a>
                    </form>
                    </div>
        </div>
    </div>
@endsection

