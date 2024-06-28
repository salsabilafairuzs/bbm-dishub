<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Data Transaksi</title>
    <link href="{{ public_path('backend/css/pdf.css') }}" rel="stylesheet">
    <style media="screen">
        /* @page {
            margin-top: 1cm;
            margin-left: 2cm;
            margin-right: 2cm;
        } */

        .table-borderless>tbody>tr>td,
        .table-borderless>tbody>tr>th,
        .table-borderless>tfoot>tr>td,
        .table-borderless>tfoot>tr>th,
        .table-borderless>thead>tr>td,
        .table-borderless>thead>tr>th {
            border: none;
        }
    </style>
  </head>
  <body>
    <table class="tabel" style="width: 100%; margin-left: 10px;">
        <tr>
            <td class="text-center" style="width:30%; font-weight: bold;">
                <img src="{{ asset('backend/images/dishub.png') }}" style="width: 50px; margin-top: 20px; float: left;">
            </td>
            <td style="width:30%;">
                
            </td>
        </tr>
    </table>
    {{-- <br> --}}
    <hr>
    <div class="row">
        <div class="col-sm-12 text-left">
            {{-- <p>satu</p> --}}
            <h5 class="text-center">Dishub kota Madiun</h5>
            <p class="text-center">Jl. Hayam Wuruk No.62, Manguharjo,  <br> Kec. Manguharjo, Kota Madiun, Jawa Timur</p>

            <hr>
        </div>
        <div class="col-sm-12 text-center">
            <h4>Laporan Riwayat Transaksi</h4>
        </div>
        <br><br>
        <table class="table table-responsive" border="1 solid">
            <thead>
                <tr>
                    <th>No.</th>
                    <th rowspan="2" class="text-center">Tanggal</th>
                    <th rowspan="2" class="text-center">Nomor Polisi</th>
                    <th colspan="2"></th>
                    <th rowspan="2" class="text-center">Total</th>
                    {{-- <th>Nama</th>
                    <th>No Seri Kupon</th>
                    <th>Jumlah</th> --}}
                </tr>
                <tr>
                    <th></th>
                    <th>Pertamax</th>
                    <th>Dexlite</th>
                    {{-- <th>Dexlite</th> --}}
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
                        <td style="text-align:center">{{ $item->tanggal}}</td>
                        <td style="text-align:center">{{ $item->no_pol }}</td>
                        {{-- <td>{{ $item->jenisKendaraan->jenis_kendaraan }}</td> --}}
                        {{-- <td>{{ $item->nama_pemohon }}</td> --}}
                    </tr>
                    @endforeach
                @endisset
            </tbody>
            {{-- <tfoot>
                <tr>
                    <th class="text-right" colspan="5">
                        Total Profit (Rp)
                    </th>
                    <th class="text-right">
                        {{ formatAngka($pendapatan) }}
                    </th>
                </tr>
            </tfoot> --}}
        </table>
    </div>
  </body>
</html>
