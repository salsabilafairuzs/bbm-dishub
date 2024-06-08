@extends('template.template')
@section('konten')
      <div class="content-wrapper">
        <div class="row">
            <div class="col-md-12 grid-margin transparent" style="margin-bottom:10px;a">
              <div class="row">
                <div class="col-md-4 mb-4 stretch-card transparent">
                  <div class="card card-light-blue">
                    <div class="card-body">
                      <div class="d-flex justify-content-between align-items-center">
                      <p class="mb-4" style="font-size: 24px;">Revisi</p>
                      <p class="mb-2" style="font-size: 50px; margin-top: 30px;">{{ $revisi }}</p>
                      </div>
                    </div>
                  </div>
                </div>
                <div class="col-md-4 mb-4 stretch-card transparent">
                  <div class="card card-dark-blue">
                    <div class="card-body">
                      <div class="d-flex justify-content-between align-items-center">
                      <p class="mb-4" style="font-size: 24px;">ACC</p>
                      <p class="mb-2" style="font-size: 50px; margin-top: 30px;">{{ $acc }}</p>
                      </div>
                    </div>
                  </div>
                </div>
                <div class="col-md-4 mb-4 stretch-card transparent">
                  <div class="card card-light-danger">
                    <div class="card-body">
                      <div class="d-flex justify-content-between align-items-center">
                      <p class="mb-4" style="font-size: 24px;">Tolak</p>
                      <p class="mb-2" style="font-size: 50px; margin-top: 30px;">{{ $tolak }}</p>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class="row">
            <div class="col-md-12 grid-margin stretch-card">
              <div class="card">
                <div class="card-body">
                  <p class="card-title mb-15">History Transaksi</p>
                  <div class="table-responsive">
                    <table class="table table-striped table-borderless">
                      <thead>
                        <tr>
                          <th>No polisi</th>
                          <th>Jenis BBM</th>
                          <th>Tanggal</th>
                          <th>Status</th>
                        </tr>
                      </thead>
                      <tbody>
                        @isset($transaksi)
                            @foreach ($transaksi as $item)
                                <tr>
                                    <td>{{ $item->no_pol }}</td>
                                    <td class="font-weight-bold">{{ $item->jenis_bbm }}</td>
                                    <td>{{ $item->tanggal }}</td>
                                    @if ($item->status == 'acc')
                                        <td class="font-weight-medium"><div class="badge badge-success">Acc</div></td>
                                    @elseif($item->status == 'revisi')
                                        <td class="font-weight-medium"><div class="badge badge-warning">Revisi</div></td>
                                    @elseif($item->status == 'ditolak')
                                        <td class="font-weight-medium"><div class="badge badge-warning">Tolak</div></td>
                                    @else
                                        <td class="font-weight-medium"><div class="badge badge-primary">Proses</div></td>
                                    @endif
                                </tr>
                            @endforeach
                        @endisset

                      </tbody>
                    </table>
                  </div>
                </div>
              </div>
            </div>

      </div>
    </div>
@endsection
@section('script')
 <script>
     var dataku = {
    labels: ["2013", "2014", "2014", "2015", "2016", "2017"],
    datasets: [{
      label: '# of Votes',
      data: [10, 19, 3, 5, 2, 3],
      backgroundColor: [
        'rgba(255, 99, 132, 0.2)',
        'rgba(54, 162, 235, 0.2)',
        'rgba(255, 206, 86, 0.2)',
        'rgba(75, 192, 192, 0.2)',
        'rgba(153, 102, 255, 0.2)',
        'rgba(255, 159, 64, 0.2)'
      ],
      borderColor: [
        'rgba(255,99,132,1)',
        'rgba(54, 162, 235, 1)',
        'rgba(255, 206, 86, 1)',
        'rgba(75, 192, 192, 1)',
        'rgba(153, 102, 255, 1)',
        'rgba(255, 159, 64, 1)'
      ],
      borderWidth: 1,
      fill: false
    }]
  };

     var barChartCanvas = $("#barChart").get(0).getContext("2d");
    // This will get the first returned node in the jQuery collection.
    var barChart = new Chart(barChartCanvass, {
      type: 'bar',
      data: datakuk,
      options: optionss
    });
</script>
@endsection
