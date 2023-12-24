@extends('template.template')
@section('konten')
    <div class="content-wrapper">
        <div class="card shadow-lg">
            <div class="card-body">
                <div class="row">
                <h4 class="card-title" style="margin-left:20px">Data Transaksi Roda 2</h4>
                    <div class="col-md-12">
                    <a href="{{url('/transaksi4/create')}}" class="btn btn-primary btn-md" style="margin-right:40px; margin-top:5px; margin-bottom:10px;">Tambah</a>
                    <table class="table table-striped table-bordered">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Nomor Polisi</th>
                                <th>Nama</th>
                                <th>Tanggal</th>
                                <th>No Seri Kupon</th>
                                <th>Jumlah</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                        @foreach ($transaksi4 as $item)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $item->no_pol }}</td>
                            <td>{{ $item->nama_pemohon }}</td>
                            <td>{{ $item->tanggal }}</td>
                            <td>{{ $item->no_seri_kupon}}</td>
                            <td>{{ $item->jumlah_nominal }}</td>
                            <td>
                                <a class="btn btn-warning btn-sm btn-square" href=""><i class="fas fa-info"></i></a>
                                <a class="btn btn-success btn-sm btn-square" href="{{ url('transaksi4/'.$item->id.'/edit')}}"><i class="fas fa-pencil-alt"></i></a>
                                <a class="btn btn-danger btn-sm btn-square" onclick="return confirm('Apakah anda yakin ingin menghapusnya?')?true:false" href="{{ url('transaksi4-hapus/'.$item->id)}}"><i class="fas fa-trash-alt"></i></a>
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
@endsection