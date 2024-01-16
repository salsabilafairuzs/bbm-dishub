@extends('template.template')
@section('konten')
    <div class="content-wrapper">
        <div class="card shadow-lg">
            <div class="card-body">
                <div class="row">
                <h4 class="card-title" style="margin-left:20px">Data Transaksi Roda 2</h4>
                    <div class="col-md-12">
                        <a href="{{url('/transaksi3/create')}}" class="btn btn-primary btn-md" style="margin-right:40px; margin-top:5px; margin-bottom:10px; padding:10px; border-radius:7px;"><i class="fas fa-plus" style="margin-right:10px;"></i>Tambah</a>
                        <table class="table table-striped table-bordered">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Nomor Polisi</th>
                                <th>Nama</th>
                                <th>Tanggal</th>
                                <th>No Seri Kupon</th>
                                <th>Jumlah</th>
                                <th>Bukti</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                        @foreach ($transaksi3 as $item)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $item->no_pol }}</td>
                            <td>{{ $item->nama_pemohon }}</td>
                            <td>{{ $item->tanggal }}</td>
                            <td>{{ $item->no_seri_kupon}}</td>
                            <td>{{ $item->jumlah_nominal }}</td>
                            <td><img src="{{ asset('buktiTransaksi3/' . $item->bukti_pembayaran) }}" width="90px" height="78%" style="border-radius: 1px;"></td>
                            <td>
                                <a class="btn btn-warning btn-sm" style="border-radius:4px;"  href=""><i class="fas fa-info"></i></a>
                                <a class="btn btn-success btn-sm" style="border-radius:4px;"  href="{{ url('transaksi3/'.$item->id.'/edit')}}"><i class="fas fa-pencil-alt"></i></a>
                                <a class="btn btn-danger btn-sm" style="border-radius:4px;"  onclick="return confirm('Apakah anda yakin ingin menghapusnya?')?true:false" href="{{ url('transaksi3-hapus/'.$item->id)}}"><i class="fas fa-trash-alt"></i></a>
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