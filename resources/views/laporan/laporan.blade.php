@extends('template.template')
@section('konten')
    <div class="content-wrapper">
      <div class="card shadow-lg">
        <div class="card-body">
          <div class="row">
            <h1 class="card-title" style="margin-left:20px">Filter Laporan</h1>
          </div>
          <br>
          <form method="post" class="form-horizontal" id="formKategori" action="{{ url('/laporan')}}">
            @csrf @method('POST')
            <div class="row">
                <div class="col-md-6">
                    <label>Filter by</label>
                    <select name="filter" class="custom-select" onchange="pilihFilter()">
                        <option value="all" @isset($_POST['filter']) @if($_POST['filter'] == 'all') selected @endif @endisset>All</option>
                        <option value="periode" @isset($_POST['filter']) @if($_POST['filter'] == 'periode') selected @endif @endisset>Periode</option>
                        <option value="bulan" @isset($_POST['filter']) @if($_POST['filter'] == 'bulan') selected @endif @endisset>Bulan</option>
                        <option value="tahun" @isset($_POST['filter']) @if($_POST['filter'] == 'tahun') selected @endif @endisset>Tahun</option>
                    </select>
                </div>

                <div class="col-md-3" id="bulan">
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

                <div class="col-md-3" id="tahun">
                    <select name="tahun" class="custom-select" style="margin-top:28px;">
                            <option value="2020">2020</option>
                            <option value="2021">2021</option>
                            <option value="2022">2022</option>
                            <option value="2023">2023</option>
                            <option value="2024">2024</option>
                            <option value="2025">2025</option>
                            <option value="2026">2026</option>
                            <option value="2027">2027</option>
                            <option value="2028">2028</option>
                            <option value="2029">2029</option>
                            <option value="2030">2030</option>
                    </select>
                </div>
            </div>
            <br>
            <div class="row">
                <div class="col-md-6">
                    <div class="box-footer">
                        <input type="submit" name="lanjut" class="btn btn-primary btn-md" style=" margin-bottom:10px; padding:10px; border-radius:7px;" value="Cari">
                        {{-- <input type="submit" name="excel" class="btn btn-success btn-flat fa-file-excel-o" value=" &#xf1c3; EXCEL"> --}}
                        <input type="submit" name="pdf" class="btn btn-danger btn-md" style="margin-right:50px; margin-bottom:10px; padding:10px; border-radius:7px;" value=" &#xf1c3; Cetak">
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
                            <td>{{ $item->jumlah_nominal }}</td>
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
            $('#bulan').prop('hidden', true);
            $('#tahun').prop('hidden', true);
        })

        function pilihFilter(){
           var filter = $('select[name="filter"]').val()

           if(filter == 'bulan'){
                $('#bulan').prop('hidden', false);
                $('#tahun').prop('hidden', true);
           }else if(filter == "tahun"){
                $('#bulan').prop('hidden', true);
                $('#tahun').prop('hidden', false);
           }else if(filter == 'periode'){
                $('#bulan').prop('hidden', false);
                $('#tahun').prop('hidden', false);
           }else{
                $('#bulan').prop('hidden', true);
                $('#tahun').prop('hidden', true);
           }


        }
    </script>
@endsection
