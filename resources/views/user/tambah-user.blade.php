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
                                <div class="col-md-6 mb-3">
                                    <label for="">Nama User</label>
                                    <input type="text" name="name" class="form-control" value="{{ old('name') }}">
                                    @if ($errors->has('name'))
                                        <span class="text-danger">{{ $errors->first('name') }}</span>
                                    @endif
                                </div>

                                <div class="col-md-6 mb-3">
                                    <label for="">Email User</label>
                                    <input type="text" name="email" class="form-control" value="{{ old('email') }}">
                                    @if ($errors->has('email'))
                                        <span class="text-danger">{{ $errors->first('email') }}</span>
                                    @endif
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6 mb-3">
                                    <label for="">Password</label>
                                    <input type="text" name="password" class="form-control">
                                    @if ($errors->has('password'))
                                        <span class="text-danger">{{ $errors->first('password') }}</span>
                                    @endif
                                </div>

                                <div class="col-md-6 mb-3">
                                    <label for="">Role</label>
                                    <select name="roles" id="" class="form-control">
                                        @foreach ($role as $item)
                                            <option value="{{ $item->name }}">{{ $item->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="col-md-12 mt-3 mb-3"> <!-- Tambahkan margin atas (mt-3) -->
                                    <button type="submit" class="btn btn-primary mr-2">Submit</button>
                                    <a href="/manajemen-user" class="btn btn-light">Cancel</a>
                                </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
