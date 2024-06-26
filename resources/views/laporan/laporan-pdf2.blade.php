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
                <img src="{{ asset('backend/images/pemda.png') }}" style="width: 70px; margin-top: 20px; float: left;">
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
            <h3 class="text-center">Perusahaan Umum Daerah Aneka Usaha</h3>
            <p class="text-center">Jl Jend A Yani No.11 Madiun, 63121, Telepon (0351) 452550 <br>Email : pdau.madiun@gmail.com </p>

            <hr>
        </div>
        <div class="col-sm-12 text-center">
            <h5>Rekap Tagihan BBM Dinas Perhubungan Kota Madiun</h5>
        </div>
        <br>
        <table class="table table-responsive">
            <thead>
                <tr>
                    <th>No.</th>
                    <th>Tanggal</th>
                    <th>Nomor Polisi</th>
                    <th>Jenis BBM</th>
                    <th>Jumlah liter</th>
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
                        <td>{{valid_date_tanggal($item->tanggal)}}</td>
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
                        Pengeluaran Pertamax
                    </th>
                    <th class="text-right">
                        {{ $pertamax }} Liter
                    </th>
                </tr>
                <tr>
                    <th class="text-right" colspan="5">
                        Pengeluaran Dexlite
                    </th>
                    <th class="text-right">
                        {{ $dexlite }} Liter
                    </th>
                </tr>
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

        {{-- tabel bukti struk pembayaran --}}
        <hr>
        <table class="table table-responsive">
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

                <td><img src="{{ asset('buktiTransaksi/'.$itemm->bukti_pembayaran) }}" width="50%" alt=""></td>

                @if ($counter % 3 == 2 || $loop->last)
                    </tr>
                @endif

                @php
                    $counter++;
                @endphp
            @endforeach
                @endisset
            </tbody>
        </table>
        <br>
        <br>
        <br>
        <br>
        <table class="table table-responsive">
            <tfoot>
                <tr>
                    <th class="text-right" colspan="">
                        Madiun, {{ date('d-m-Y') }}
                    </th>
                    <th></th>
                </tr>
              <br>
              <br>
              <br>
              <br>
                <tr>
                    <th class="text-right" colspan="">
                        Sri Wahyuni, SE
                    </th>
                </tr>
            </tfoot>
        </table>
    </div>
  </body>
</html>
