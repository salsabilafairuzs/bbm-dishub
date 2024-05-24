@extends('template.template')
@section('konten')
    <div class="content-wrapper">
      <div class="card shadow-lg">
        <div class="card-body">
          <div class="row">
            <h4 class="card-title" style="margin-left:20px">Anggaran</h4>
          </div>
            <div class="row">
                {{-- <button class="btn btn-primary btn-sm" style="margin-left:40px; margin-top:20px;">Tambah</button> --}}
                <div class="col-md-12">
                  <a href="{{url('/anggaran/create')}}" class="btn btn-primary btn-md" style="margin-right:40px; margin-top:5px; margin-bottom:10px; padding:10px; border-radius:7px;"><i class="fas fa-plus" style="margin-right:10px;"></i>Tambah</a>
                  <table class="table table-striped table-bordered">
                    <thead>
                        <tr>
                            <th>Name</th>
                            <th>Amount</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                      @foreach ($anggaran as $item)
                        <tr>
                          <td>{{ $loop->iteration }}</td>  
                          <td>{{ $item->anggaran}}</td>
                            <td>
                              <a class="btn btn-success btn-sm" style="border-radius:4px;" href="{{ url('bbm/'.$item->id.'/edit')}}"><i class="fas fa-edit"></i></i></a>
                              <a class="btn btn-danger btn-sm" style="border-radius:4px;"  onclick="return confirm('Apakah anda yakin ingin menghapusnya?')?true:false" href="{{ url('bbm-hapus/'.$item->id)}}"><i class="fas fa-trash-alt"></i></a>
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


