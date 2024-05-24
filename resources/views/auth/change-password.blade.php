@extends('template.template')
@section('konten')
    <div class="content-wrapper">
        <div class="card shadow-lg">
            <div class="card-body">
                <div class="row mb-3">
                    <h1 class="card-title" style="margin-left: 20px;">Ubah Password</h1>
                </div>
                <form method="POST" class="form-horizontal" action="{{ url('/change-password')}}">
                    @csrf

                    @if (session('status'))
                    <div class="alert alert-success"> {{ session('status') }}</div>
                        
                    @elseif (session('error'))
                    <div class="alert alert-danger"> {{ session('error') }}</div>
                    
                    @endif

                    <div class="row">
                        <div class="col-md-12">
                            <p>Silahkan masukkan password lama dan password baru untuk mengubah password</p>
                            <br>
                            <div class="mb-3">
                                <label for="oldPassword" class="form-label">Password Lama</label>
                                <input type="password" id="oldPassword" name="old_password" class="form-control" required>
                            </div>
                            <div class="mb-3">
                                <label for="newPassword" class="form-label">Password Baru</label>
                                <input type="password" id="newPassword" name="new_password" class="form-control" required>
                            </div>
                            <div class="mb-3">
                                <label for="repeatPassword" class="form-label">Konfirmasi Password Baru</label>
                                <input type="password" id="repeatPassword" name="repeat_password" class="form-control" required>
                            </div>
                        </div>
                    </div>
                    <div class="row mt-2">
                        <div class="col-md-3">
                            <div class="d-grid gap-2">
                                <button type="submit" name="lanjut" class="btn btn-primary btn-md" style="margin-right:40px; margin-bottom:10px; padding:10px; border-radius:7px;">Simpan</button>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
        <br>
    </div>
@endsection
