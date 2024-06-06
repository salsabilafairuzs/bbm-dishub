@extends('template.template')
@section('konten')
    <div class="content-wrapper">
      <div class="card shadow-lg">
        <div class="card-body">
          <div class="row">
            <h4 class="card-title" style="margin-left:20px">Profil</h4>
          </div>
            <div class="row">
                {{-- <button class="btn btn-primary btn-sm" style="margin-left:40px; margin-top:20px;">Tambah</button> --}}
                <div class="col-md-12">
                  <a href="{{url('/profil')}}" class="btn btn-primary btn-md" style="margin-right:40px; margin-top:5px; margin-bottom:10px; padding:10px; border-radius:7px;"><i class="fas fa-plus" style="margin-right:10px;"></i>Tambah</a>
                  
                </div>
              </div>
        </div>
      </div>
    </div>
@endsection


