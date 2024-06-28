@extends('template.template')
@section('konten')
    <div class="content-wrapper">
      <div class="card shadow-lg">
        <div class="card-body">
          <div class="row">
            <h4 class="card-title" style="margin-left:20px">Data Master Kendaraan</h4>
          </div>
            <div class="row">
                {{-- <button class="btn btn-primary btn-sm" style="margin-left:40px; margin-top:20px;">Tambah</button> --}}
                <div class="col-md-12">
                  <a href="{{url('/kendaraan/create')}}" class="btn btn-primary btn-md" style="margin-right:40px; margin-top:5px; margin-bottom:10px; padding:10px; border-radius:7px;"><i class="fas fa-plus" style="margin-right:10px;"></i>Tambah</a>
                  <table class="table table-striped table-bordered">
                    <thead>
                        <tr class="text-center">
                            <th>No</th>
                            <th>Jenis Kendaraan</th>
                            <th>Nama Kendaraan</th>
                            <th>Nomor Polisi</th>
                            <th>Max 1x Permintaan</th>
                            {{-- <th>Jenis BBM</th> --}}
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                      @foreach ($kendaraan as $item)
                        <tr class="text-center">
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $item->jenisKendaraan->jenis_kendaraan }}</td>
                            <td>{{ $item->name }}</td>
                            <td>{{ $item->no_pol }}</td>
                            <td>{{ $item->max_pengisian }}</td>
                            {{-- <td>{{ $item->jenis_bbm }}</td> --}}
                            <td>
                              <a class="btn btn-success btn-sm" style="border-radius:4px;" href="{{ url('kendaraan/'.$item->id.'/edit')}}"><i class="fas fa-edit"></i></i></a>
                              <a class="btn btn-danger btn-sm" style="border-radius:4px;"  onclick="return confirm('Apakah anda yakin ingin menghapusnya?')?true:false" href="{{ url('kendaraan-hapus/'.$item->id)}}"><i class="fas fa-trash-alt"></i></a>
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
