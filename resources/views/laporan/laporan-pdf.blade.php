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
        <table class="table table-responsive">
            <thead>
                <tr>
                    <th>No.</th>
                    <th>Jenis Kendaraan</th>
                    <th>Tanggal</th>
                    <th>Nopol</th>
                    <th>Jenis BBM</th>
                    <th>Jumlah Liter</th>
                    <th>Total</th>
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
                        <td>{{ $item['jenisKendaraan']->jenis_kendaraan}}</td>
                        <td>{{ valid_date_tanggal($item->tanggal) }}</td>
                        <td>{{ $item->no_pol }}</td>
                        <td>{{ $item->jenis_bbm }}</td>
                        <td>{{ $item->jumlah_liter }}</td>
                        <td style="float:right;">{{ $item->jumlah_nominal }}</td>
                    </tr>
                    @endforeach
                @endisset
                {{-- @foreach ($transaksi2 as $item)
                <tr>
                    <td>{{ $item->nopol }}</td>
                </tr>
                @endforeach --}}
            </tbody>
            <tfoot>
                <tr>
                    <th class="text-right" colspan="5">
                        Total Pengeluaran (Rp)
                    </th>
                    <th class="text-right">
                        {{ $jumlah }}
                    </th>
                </tr>
            </tfoot>
        </table>

        {{-- <table class="table table-responsive">
            <tbody>
                @php
                    $no = 1;
                @endphp
                @isset($transaksi)
                @php
                $counter = 0;
            @endphp

            @foreach ($transaksi as $itemm)
                @if ($counter % 3 == 0)
                    <tr>
                @endif

                <td><img src="{{ asset('buktiTransaksi/'.$itemm->bukti_pembayaran) }}" alt=""></td>

                @if ($counter % 3 == 2 || $loop->last)
                    </tr>
                @endif

                @php
                    $counter++;
                @endphp
            @endforeach
                @endisset
            </tbody>
        </table> --}}
    </div>
  </body>
</html>
