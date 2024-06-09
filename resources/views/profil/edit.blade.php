@extends('template.template')
@section('konten')
    <div class="content-wrapper">
      <div class="card shadow-lg">
        <div class="card-body">
          <div class="row">
            {{-- <h4 class="card-title" style="margin-left:20px">Profil</h4> --}}
          </div>
            <div class="row">
                {{-- <button class="btn btn-primary btn-sm" style="margin-left:40px; margin-top:20px;">Tambah</button> --}}
                <div class="col-md-12">
                <div class="card-header">
                    {{-- <a href="" class="btn btn-primary" style="float: right">Edit profil</a> --}}
                    <h4>Edit Profile</h4>
                    <br>
                </div>
                  {{-- <a href="{{url('/profil')}}" class="btn btn-primary btn-md" style="margin-right:40px; margin-top:5px; margin-bottom:10px; padding:10px; border-radius:7px;"><i class="fas fa-plus" style="margin-right:10px;"></i>Tambah</a> --}}
                  <div class="card">

                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-12">
                                <form action="{{ route('profil.update',$profil->id) }}" method="POST" enctype="multipart/form-data">
                                    @csrf @method('PATCH')
                                  {{-- <div class="form-group row">
                                    <label for="username" class="col-4 col-form-label">User Name</label>
                                    <div class="col-8">
                                      <input id="username" name="username" readonly value="{{ Auth::user()->name }}" class="form-control" type="text">
                                    </div>
                                  </div> --}}
                                  <div class="form-group row">
                                    <label for="name" class="col-4 col-form-label">Nama</label>
                                    <div class="col-8">
                                      <input name="name" placeholder="Nama" value="{{ $profil->nama_profil }}" class="form-control here" type="text">
                                    </div>
                                  </div>
                                    <div class="form-group row">
                                        <label for="lastname" class="col-4 col-form-label">Email</label>
                                        <div class="col-8">
                                        <input id="lastname" name="lastname" value="{{ $profil->email }}" readonly placeholder="Last Name" class="form-control here" type="text">
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <label for="lastname" class="col-4 col-form-label">Foto</label>
                                        <div class="col-8">
                                        <input name="foto" value="{{ $profil->email }}"  class="form-control here" type="file">
                                        </div>
                                    </div>
                                  <div class="form-group row">
                                    <div class="offset-4 col-8">
                                      <button name="submit" type="submit" class="btn btn-success">Simpan</button>
                                      {{-- <button name="submit" type="submit" class="btn btn-danger">Cancel</button> --}}
                                      <a href="/profil" class="btn btn-danger">Cancel</a>
                                    </div>
                                  </div>
                                </form>
                            </div>
                        </div>

                    </div>
                </div>
                </div>
              </div>
        </div>
      </div>
    </div>
@endsection
