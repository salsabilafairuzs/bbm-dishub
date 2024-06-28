@extends('template.template')
@section('konten')
    <div class="content-wrapper">
      <div class="card shadow-lg">
        <div class="card-body">
          <div class="row">
            <h4 class="card-title" style="margin-left:20px">Filter Laporan</h4>
          </div>
          <br>
          <form method="post" class="form-horizontal" id="formKategori" action="{{ url('/laporan')}}">
            @csrf @method('POST')
            <div class="row">
                <div class="col-md-6">
                    <label>Filter by</label>
                    <select name="filter" class="custom-select" onchange="pilihFilter()">
                        <option value="all">All</option>
                        <option value="bulan">Bulan</option>
                    </select>
                </div>

                <div class="col-md-6">
                    <select name="bulan" class="custom-select" style="margin-top:28px;">
                            <option value="01">Januari</option>
                            <option value="02">Februari</option>
                            <option value="03">Maret</option>
                            <option value="04">April</option>
                            <option value="05">Mei</option>
                            <option value="06">Juni</option>
                            <option value="07">Juli</option>
                            <option value="08">Agustus</option>
                            <option value="09">September</option>
                            <option value="10">Oktober</option>
                            <option value="11">November</option>
                            <option value="12">Desember</option>
                    </select>
                </div>
            </div>
            <br>
            <div class="row">
                <div class="col-md-3">
                    <div class="box-footer">
                        <input type="submit" name="lanjut" class="btn btn-primary btn-sm" value="CARI">
                        {{-- <input type="submit" name="excel" class="btn btn-success btn-flat fa-file-excel-o" value=" &#xf1c3; EXCEL"> --}}
                        <input type="submit" name="pdf" class="btn btn-danger btn-sm fa-file-excel-o" value=" &#xf1c3; Cetak">
                    </div>
                </div>
                
            </div>
        </form>
        </div>
      </div>
      <br>
      <div class="card shadow-lg">
        <div class="card-body">
          <div class="row">
            <h4 class="card-title" style="margin-left:20px">Laporan</h4>
          </div>
          <br>
            <table class="table table-striped">
                <thead>
                    
                    <tr>
                        <th>No.</th>
                        <th>Jenis Kendaraan</th>
                        <th>Nomor Polisi</th>
                        <th>Nama</th>
                        <th>Tanggal</th>
                        <th>No Seri Kupon</th>
                        <th>Jumlah</th>
                    </tr>
                </thead>
                <tbody>
                    @php
                        $no = 1;
                    @endphp
                    @isset($transaksi)
                        @foreach ($transaksi as $item)
                        <tr>
                            <td>{{ $no++ }}</td>
                            <td>{{ $item->jenisKendaraan->jenis_kendaraan }}</td>
                            <td>{{ $item->no_pol }}</td>
                            <td>{{ $item->nama_pemohon }}</td>
                            <td>{{ $item->tanggal}}</td>
                            <td>{{ $item->no_seri_kupon }}</td>
                            <td>{{ $item->jumlah_liter }}</td>
                        </tr>
                        @endforeach
                    @endisset
                    {{-- @foreach ($transaksi2 as $item)
                    <tr>
                        <td>{{ $item->nopol }}</td>
                    </tr>
                    @endforeach --}}
                </tbody>
            </table>
        </div>
      </div>
    </div>
@endsection
@section('script')
   <script>
        $(document).ready(function() {
            $('select[name="supplier"]').prop('hidden', true);
            $('select[name="bulan"]').prop('hidden', true); 
        })
        function pilihFilter(){
           var filter = $('select[name="filter"]').val()
            
           if(filter == 'bulan'){
                $('select[name="bulan"]').prop('hidden', false);
                $('select[name="supplier"]').prop('hidden', true);
           }else if(filter == 'supplier'){
                $('select[name="bulan"]').prop('hidden', true);
                $('select[name="supplier"]').prop('hidden', false);
           }else{
                $('select[name="bulan"]').prop('hidden', true);
                $('select[name="supplier"]').prop('hidden', true);
           }
        
        }
    </script> 
@endsection

