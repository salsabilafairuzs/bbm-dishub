@extends('template.template')
@section('konten')
    <div class="content-wrapper">
        <div class="row">
            <div class="col-md-4">
                <div class="card shadow-lg" style="background-color:cadetblue;">
                    <div class="card-body">
                        <div class="row">
                            <h1 class="card-title" style="margin-left:20px; color:white;">Penggunaan</h1>
                        </div>
                        <br>
                        <div class="row">
                            <div class="col-md-8">
                                <h3 style="color:white;"> Rp 12.000.000</h3>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card shadow-lg" style="background-color:indianred">
                    <div class="card-body">
                        <div class="row">
                            <h1 class="card-title" style="margin-left:20px; color:white;">Saldo</h1>
                        </div>
                        <br>
                        <div class="row">
                            <div class="col-md-8">
                                <h3 style="color:white;">Rp 450.000.000</h3>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card shadow-lg" style="background-color:darkslateblue">
                    <div class="card-body">
                        <div class="row">
                            <h1 class="card-title" style="margin-left:20px; color:white;">Total Anggaran</h1>
                        </div>
                        <br>
                        <div class="row">
                            <div class="col-md-8">
                                <h3 style="color:white;">Rp 450.000.000</h3>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <br>
        <div class="row">
            <div class="col-md-12">
                <div class="card shadow-lg">
                    <div class="card-body">
                        <div class="row">
                            <h4 class="card-title" style="margin-left:20px;">Anggaran</h4>
                        </div>
                        <br>
                        <div class="row">
                            <div class="col-md-12">
                                <a href="{{url('/anggaran/create')}}" class="btn btn-primary btn-md" style="margin-right:40px; margin-bottom:10px; padding:10px; border-radius:7px;"><i class="fas fa-plus" style="margin-right:10px;"></i>Pengajuan</a>
                                <table class="table table-striped table-bordered">
                                    <thead>
                                        <tr class="text-center">
                                            <th>No</th>
                                            <th>Kegiatan</th>
                                            <th>Tanggal Realisasi</th>
                                            <th>Jumlah Anggaran</th>
                                            <th>Aksi</th>
                                        </tr>
                                    </thead>   
                                    <tbody>
                                        @foreach ($anggaran as $item)
                                        <tr>
                                            <td>{{ $loop->iteration }}</td>  
                                            <td>{{ $item->kegiatan }}</td>
                                            <td>{{ $item->tanggal }}</td>
                                            <td>{{ $item->anggaran }}</td>
                                                <td>
                                                <a class="btn btn-success btn-sm" style="border-radius:4px;" href="{{ url('anggaran/'.$item->id.'/edit')}}"><i class="fas fa-edit"></i></i></a>
                                                <a class="btn btn-danger btn-sm" style="border-radius:4px;"  onclick="return confirm('Apakah anda yakin ingin menghapusnya?')?true:false" href="{{ url('anggaran-hapus/'.$item->id)}}"><i class="fas fa-trash-alt"></i></a>
                                            </td>
                                        </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
