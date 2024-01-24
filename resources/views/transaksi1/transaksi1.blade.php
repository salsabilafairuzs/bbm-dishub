@extends('template.template')
@section('konten')
    <div class="content-wrapper">
        <div class="card shadow-lg">
            <div class="card-body">
                <div class="row">
                <h4 class="card-title" style="margin-left:20px">Data Transaksi Bus & Elf</h4>
                    <div class="col-md-12">
                        <a href="{{url('/transaksi1/create')}}" class="btn btn-primary btn-md" style="margin-right:40px; margin-top:5px; margin-bottom:10px; padding:10px; border-radius:7px;"><i class="fas fa-plus" style="margin-right:10px;"></i>Tambah</a>
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
                        @foreach ($transaksi1 as $item)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $item->no_pol }}</td>
                            <td>{{ $item->nama_pemohon }}</td>
                            <td>{{ $item->tanggal }}</td>
                            <td>{{ $item->no_seri_kupon}}</td>
                            <td>{{ $item->jumlah_nominal }}</td>
                            <td><img src="{{ asset('buktiTransaksi1/' . $item->bukti_pembayaran) }}" width="90px" height="78%" style="border-radius: 1px;"></td>
                            <td>
                                <a class="btn btn-warning btn-sm" style="border-radius:4px;"  data-bs-toggle="modal" data-bs-target="#modalDetail" href=""><i class="fas fa-info"></i></a>
                                <a class="btn btn-success btn-sm" style="border-radius:4px;"  href="{{ url('transaksi1/'.$item->id.'/edit')}}"><i class="fas fa-edit"></i></a>
                                <a class="btn btn-danger btn-sm" style="border-radius:4px;"  onclick="return confirm('Apakah anda yakin ingin menghapusnya?')?true:false" href="{{ url('transaksi1-hapus/'.$item->id)}}"><i class="fas fa-trash-alt"></i></a>
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

    {{-- Modal Detail --}}
    <div class="modal fade" id="modalDetail" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog modal-xl">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Detail Transaksi 1</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="mb-3 row">
                        <label class="col-md-2 col-form-label">Nomor Polisi</label>
                        <span class="col-md-9">:&nbsp;
                            <label class="col-form-label" id="no_pol"></label>
                        </span>
                    </div>
                    <div class="mb-3 row">
                        <label class="col-md-2 col-form-label">Nama Pemohon</label>
                        <span class="col-md-9 col-form-label" style="padding-top: 0;display: flex;padding-top: calc(.47rem + var(--bs-border-width));">:&nbsp;
                            <label class="col-form-label" id="nama_pemohon" style="padding-top: 0;"></label>
                        </span>
                    </div>
                    <div class="mb-3 row">
                        <label class="col-md-2 col-form-label">Tanggal</label>
                        <span class="col-md-9">:&nbsp;
                            <label class="col-form-label" id="tanggal"></label>
                        </span>
                    </div>
                    <div class="mb-3 row">
                        <label class="col-md-2 col-form-label">Nomer Seri Kupon</label>
                        <span class="col-md-9">:&nbsp;
                            <label class="col-form-label" id="no_seri_kupon"></label>
                        </span>
                    </div>
                    <div class="mb-3 row">
                        <label class="col-md-2 col-form-label">Jumlah Nominal/label>
                        <span class="col-md-9">:&nbsp;
                            <label class="col-form-label" id="jumlah_nominal></label>
                        </span>
                    </div>
                    <div class="mb-3 row">
                        <label class="col-md-2 col-form-label">Bukti Transaksi</label>
                        <span class="col-md-9">:&nbsp;
                            <label class="col-form-label" id="bukti_pembayaran"></label>
                        </span>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button>
                </div>
            </div>
        </div>
    </div>
@endsection