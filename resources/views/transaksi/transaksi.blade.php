@extends('template.template')
@section('konten')
    <div class="content-wrapper">
        <div class="card shadow-lg">
            <div class="card-body">
                <div class="row">
                <h4 class="card-title" style="margin-left:20px">Data Transaksi Kendaraan</h4>
                    <div class="col-md-12">
                    @role(['admin','superadmin'])
                        <a href="{{url('/transaksi/create')}}" class="btn btn-primary btn-md" style="margin-right:40px; margin-top:5px; margin-bottom:10px; padding:10px; border-radius:7px;"><i class="fas fa-plus" style="margin-right:10px;"></i>Tambah</a>
                    @endrole
                      {{-- <a class="btn btn-primary btn-md" onclick="modalTambah()" style="margin-right:40px; margin-top:5px; margin-bottom:10px;">Tambah</a> --}}
                    <table class="table table-striped table-bordered">
                        <thead>
                            <tr class="text-center">
                                <th>No</th>
                                <th>Jenis Kendaraan</th>
                                <th>Nomor Polisi</th>
                                <th>Nama</th>
                                <th>Tanggal</th>
                                <th>Jumlah</th>
                                <th>Foto</th>
                                <th>Status</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                        @foreach ($transaksi as $item)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $item->jenisKendaraan->jenis_kendaraan }}</td>
                            <td>{{ $item->no_pol }}</td>
                            <td>{{ $item->nama_pemohon }}</td>
                            <td>{{ valid_date_tanggal($item->tanggal) }}</td>
                            <td>{{ $item->jumlah_nominal }}</td>
                            <td><img src="{{ asset('buktiTransaksi/' . $item->bukti_pembayaran) }}" style="border-radius: 6px;" width="90px" height="78%"></td>
                            <td class="text-center">
                                    @if ($item->status == 'proses')
                                        <span class="badge badge-sm badge-primary">Diproses</span>
                                    @elseif($item->status == 'acc')
                                        <span class="badge badge-sm badge-success">ACC</span>
                                    @elseif($item->status == 'revisi')
                                        <span class="badge badge-sm badge-warning">Revisi</span>
                                    @else
                                        <span class="badge badge-sm badge-danger">Ditolak</span>
                                    @endif
                            </td>
                            <td class="text-center">
                                <a class="btn btn-warning btn-sm" style="border-radius:4px;" onclick="detailForm({{ $item->id }})"><i class="fas fa-info"></i></a>
                                @if ($item->status == 'revisi')
                                    @role(['admin','superadmin'])
                                    <a class="btn btn-success btn-sm" style="border-radius:4px;" href="{{ url('transaksi/'.$item->id.'/edit')}}"><i class="fas fa-pencil-alt"></i></a>
                                    @endrole
                                @endif
                                {{-- <a class="btn btn-danger btn-sm" style="border-radius:4px;" onclick="return confirm('Apakah anda yakin ingin menghapusnya?')?true:false" href="{{ url('transaksi-hapus/'.$item->id)}}"><i class="fas fa-trash-alt"></i></a> --}}
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
    {{-- <button type="button" class="btn btn-success text-white" onclick="acc()">ACC</button> --}}

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
              <form action="{{ route('ubah-status') }}" method="POST" id="formku">
                @csrf
                <input type="text" readonly class="form-control" hidden name="id">
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
                    <label for="">Jumlah Nominal</label>
                    <input type="text" readonly class="form-control" name="jumlah">
                  </div>

                  <div class="col-md-6 mb-3">
                    <label for="">Alasan</label>
                    @if (Auth::user()->roles()->first()->name == 'bendahara')
                        <input type="text"  class="form-control" name="alasan" id="alasan" value="-">
                        @if ($errors->has('alasan'))
                            @section('scriptt')
                              <script>
                                detailForm({{ old('id') }})

                                Swal.fire({
                                  icon: "error",
                                  title: "Alasan tidak boleh kosong!!",
                                });
                              </script>
                            @endsection
                            {{-- <div class="alert alert-danger">{{ $errors->first('alasan') }}</div> --}}
                        @endif
                    @else
                        <input type="text" readonly required class="form-control" name="alasan" disabled>
                    @endif
                  </div>
                </div>

                <div class="row">
                    <div class="col-md-6 mb-3">
                      <img id="gambarBukti" width="60%" alt="">
                    </div>
                  </div>

              </div>

              <div class="modal-footer">
                <button type="button" class="btn btn-secondary text-white" data-dismiss="modal">Close</button>
                    @role(['bendahara'])
                        <input type="submit" name="acc" value="Acc" class="btn btn-success text-white" style="width: 80px; height: 38px; padding: 6px 12px;" readonly>
                        <input type="submit" name="revisi" value="Revisi" class="btn btn-warning" style="width: 80px; height: 38px; padding: 6px 12px;" readonly>
                        <input type="submit" name="tolak" value="Tolak" class="btn btn-danger" style="width: 80px; height: 38px; padding: 6px 12px;" readonly>
                    @endrole
              </div>
            </div>
        </form>

          </div>
        </div>
      </div>
    {{-- ini script modal end--}}
@endsection
@section('script')
  <script>
     function accc(){
        event.preventDefault();
        $('#formku').submit();
    }

    function revisii(){
        event.preventDefault();
        var alasan = $('#alasan').val();
        if(alasan == ''){
            alert('Inputkan alasannya');
        } else{
            $('#formku').submit();
        }
    }

    function tolakk(){
        event.preventDefault();
        var alasan = $('#alasan').val();
        if(alasan == ''){
            alert('Inputkan alasannya');
        } else{
            $('#formku').submit();
        }
    }


    function modalTambah(){
      $('#modalTambah').modal('show')
      $('.modal-title').text('Tambah Data Transaksi')
      $('#password').attr('hidden', false);
    }

    function acc() {
        Swal.fire({
        title: 'Masukkan Alasan',
        input: 'text',
        input: "text",
        inputAttributes: {
            autocapitalize: "off"
        },
        showCancelButton: true,
        confirmButtonText: 'Submit',
        showLoaderOnConfirm: true,
        preConfirm: (alasan) => {
            const data = {
            alasan: alasan,
            // otherInput: $('input[name="otherInput"]').val()
            };

            return fetch('https://example.com/submit', {
            method: 'POST',
            body: JSON.stringify(data),
            headers: {
                'Content-Type': 'application/json'
            }
            })
            .then(response => {
            if (!response.ok) {
                throw new Error(response.statusText);
            }
            return response.json();
            })
            .catch(error => {
            Swal.showValidationMessage(`Request failed: ${error}`);
            });
        },
        allowOutsideClick: () => !Swal.isLoading()
        })
        .then((result) => {
        if (result.isConfirmed) {
            Swal.fire({
            title: 'Submitted',
            text: 'Data has been submitted successfully',
            icon: 'success'
            });
        }
        });
    }

    function detailForm(id) {
            $('#modal').modal('show')
            $('.modal-title').text('Detail Transaksi')
            $.ajax({
                url: '/detail-transaksi/'+id+'/show',
                type: 'GET',
                dataType: 'json',
            })
            .done(function(data) {
                $('input[name="id"]').val(data.data.id)
                $('input[name="nopol"]').val(data.data.no_pol)
                $('input[name="jenis"]').val(data.data.jenis_bbm)
                $('input[name="pemohon"]').val(data.data.nama_pemohon)
                $('input[name="seri"]').val(data.data.no_seri_kupon)
                $('input[name="tanggal"]').val(data.data.tanggal)
                $('input[name="liter"]').val(data.data.jumlah_liter)
                $('input[name="jumlah"]').val(data.data.jumlah_nominal)
                $('input[name="alasan"]').val(data.data.alasan)
                var status = data.data.status;
                if (status !== 'proses') {
                    $('input[name="acc"]').attr('hidden', true);
                    $('input[name="revisi"]').attr('hidden', true);
                    $('input[name="tolak"]').attr('hidden', true);
                    $('input[name="alasan"]').attr('disabled',true)
                }

                if (status == 'revisi') {
                    $('input[name="acc"]').attr('hidden', false);
                    $('input[name="revisi"]').attr('hidden', false);
                    $('input[name="tolak"]').attr('hidden', false);
                    $('input[name="alasan"]').attr('disabled',false)
                }
                $('#gambarBukti').attr('src', '/buktiTransaksi/'+data.data.bukti_pembayaran);
            });
    }
  </script>
@endsection
