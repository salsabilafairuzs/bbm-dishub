@extends('template.template')
@section('konten')
    <div class="content-wrapper">
        <div class="card shadow-lg">
            <div class="card-body">
                <div class="row">
                <h4 class="card-title" style="margin-left:20px">Tambah Data User</h4>
                    <div class="col-md-12">
                        <form action="{{ url('save-user') }}" method="post">
                            @csrf
                            <div class="row">
                                <div class="col-md-6">
                                    <label for="">Nama User</label>
                                    <input type="text" name="name" class="form-control" value="{{ old('name') }}">
                                    @if ($errors->has('name'))
                                        <span class="text-danger">{{ $errors->first('name') }}</span>
                                    @endif
                                </div>

                                <div class="col-md-6">
                                    <label for="">Email User</label>
                                    <input type="text" name="email" class="form-control" value="{{ old('email') }}">
                                    @if ($errors->has('email'))
                                        <span class="text-danger">{{ $errors->first('email') }}</span>
                                    @endif
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <label for="">Password</label>
                                    <input type="text" name="password" class="form-control">
                                    @if ($errors->has('password'))
                                        <span class="text-danger">{{ $errors->first('password') }}</span>
                                    @endif
                                </div>

                                <div class="col-md-6">
                                    <label for="">Role</label>
                                    <select name="roles" id="" class="form-control">
                                        @foreach ($role as $item)
                                            <option value="{{ $item->name }}">{{ $item->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="row" style="margin-left:10px; margin-top:20px;">
                                    <a href="/manajemen-user" class="btn btn-sm btn-primary">kembali</a>
                                    {{-- <a href="" style="margin-left:10px;" class="btn btn-sm btn-success" type="submit">Simpan</a> --}}
                                    <button type="submit" style="margin-left:10px;" class="btn btn-sm btn-success">Simpan</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
