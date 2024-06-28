@extends('template.template')
@section('konten')
    <div class="content-wrapper">
        <div class="card shadow-lg">
            <div class="card-body">
                <div class="row">
                <h4 class="card-title" style="margin-left:20px">Data Transaksi Bus & Elf</h4>
                    <div class="col-md-12">
                      <a href="{{url('/transaksi1/create')}}" class="btn btn-primary btn-md" style="margin-right:40px; margin-top:5px; margin-bottom:10px; padding:10px; border-radius:7px;"><i class="fas fa-plus" style="margin-right:10px;"></i>Tambah</a>
                      {{-- <a class="btn btn-primary btn-md" onclick="modalTambah()" style="margin-right:40px; margin-top:5px; margin-bottom:10px;">Tambah</a> --}}
                    <table class="table table-striped table-bordered">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Nomor Polisi</th>
                                <th>Nama</th>
                                <th>Tanggal</th>
                                <th>No Seri Kupon</th>
                                <th>Jumlah</th>
                                <th>Foto</th>
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
                            <td><img src="{{ asset('buktiTransaksi1/' . $item->bukti_pembayaran) }}" style="border-radius: 6px;" width="90px" height="78%"></td>
                            <td>
                                <a class="btn btn-warning btn-sm" style="border-radius:4px;" onclick="detailForm({{ $item->id }})"><i class="fas fa-info"></i></a>
                                <a class="btn btn-success btn-sm" style="border-radius:4px;" href="{{ url('transaksi1/'.$item->id.'/edit')}}"><i class="fas fa-pencil-alt"></i></a>
                                <a class="btn btn-danger btn-sm" style="border-radius:4px;" onclick="return confirm('Apakah anda yakin ingin menghapusnya?')?true:false" href="{{ url('transaksi1-hapus/'.$item->id)}}"><i class="fas fa-trash-alt"></i></a>
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
    {{-- ini script modal start--}}
      <div class="modal fade" id="modal" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="staticBackdropLabel">Modal title</h5>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
              <form>
                <div class="row">
                  <div class="col-md-6 mb-3" >
                    <label for="">Nomor Polisi</label>
                    <input type="text" readonly class="form-control" name="nopol">
                  </div>
                  <div class="col-md-6 mb-3">
                    <label for="">Jenis BBM</label>
                    <input type="text" readonly class="form-control" name="jenis">
                  </div>
                </div>
                <div class="row">
                  <div class="col-md-6 mb-3">
                    <label for="">Nama Pemohon</label>
                    <input type="text" readonly class="form-control" name="pemohon">
                  </div>
                  <div class="col-md-6 mb-3">
                    <label for="">Nomor Seri Kupon</label>
                    <input type="text" readonly class="form-control" name="seri">
                  </div>
                </div>
                <div class="row">
                  <div class="col-md-6 mb-3">
                    <label for="">Tanggal Isi</label>
                    <input type="text" readonly class="form-control" name="tanggal">
                  </div>
                  <div class="col-md-6 mb-3">
                    <label for="">Jumlah Liter</label>
                    <input type="text" readonly class="form-control" name="liter">
                  </div>
                </div>
                <div class="row">
                  <div class="col-md-6 mb-3">
                    <label for="">Jumlah Liter</label>
                    <input type="text" readonly class="form-control" name="jumlah">
                  </div>
                </div>
              </div>
              </form>
              <div class="modal-footer">
                <button type="button" class="btn btn-secondary text-white" data-dismiss="modal">Close</button>
                {{-- <button type="button" class="btn btn-primary">Understood</button> --}}
              </div>
            </div>
          
          </div>
        </div>
      </div>
    {{-- ini script modal end--}}
@endsection
@section('script')
  <script>
    function modalTambah(){
      $('#modalTambah').modal('show')
      $('.modal-title').text('Tambah Data Transaksi')
      $('#password').attr('hidden', false);
    }

    function detailForm(id) {
            $('#modal').modal('show')
            $('.modal-title').text('Detail Transaksi')
            $.ajax({  
                url: '/detail-transaksi1/'+id+'/show', 
                type: 'GET',
                dataType: 'json',
            })
            .done(function(data) {
                $('input[name="nopol"]').val(data.data.no_pol)
                $('input[name="jenis"]').val(data.data.jenis_bbm)
                $('input[name="pemohon"]').val(data.data.nama_pemohon)
                $('input[name="seri"]').val(data.data.no_seri_kupon)
                $('input[name="tanggal"]').val(data.data.tanggal)
                $('input[name="liter"]').val(data.data.jumlah_liter)
                $('input[name="jumlah"]').val(data.data.jumlah_nominal)
            });
        }
  </script>
@endsection