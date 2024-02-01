@extends('template.template')
@section('konten')
    <div class="content-wrapper">
      <div class="row">
        <div class="col-md-12 grid-margin">
          <div class="row">
            <div class="col-12 col-xl-8 mb-4 mb-xl-0">
              <h3 class="font-weight-bold">Welcome Admin!</h3>
              <!-- <h6 class="font-weight-normal mb-0">All systems are running smoothly! You have <span class="text-primary">3 unread alerts!</span></h6> -->
            </div>
          </div>
        </div>
      </div>

      <div class="row">
        <div class="col-md-12 grid-margin stretch-card">
          <div class="card position-relative">
            <div class="card-body shadow-lg">
              <div id="detailedReports" class="carousel slide detailed-report-carousel position-static pt-2" data-ride="carousel">
                <div class="carousel-inner">
                  <div class="carousel-item active">
                    <div class="row">
                      <div class="col-md-12 col-xl-3 d-flex flex-column justify-content-start">
                        <div class="ml-xl-4 mt-3">
                        <p class="card-title">Total Kendaraan</p>
                          <h1 class="text-primary">{{ $kendaraan }}</h1>
                          <p class="mb-1 mb-xl-0">Total Inventaris Kendaraan Dinas</p>
                        </div>  
                        </div>
                      <div class="col-md-12 col-xl-9">
                        <div class="row">
                          <div class="col-md-12">
                            <div class="table-responsive mb-3 mb-md-0 mt-3">
                              <table class="table table-borderless report-table">
                                <tr>
                                  <td class="text-muted">Bus & Elf</td>
                                  <td class="w-100 px-0">
                                    <div class="progress progress-md mx-4">
                                      <div class="progress-bar bg-primary" role="progressbar" style="width: {{ $bus }}%" aria-valuenow="70" aria-valuemin="0" aria-valuemax="100"></div>
                                    </div>
                                  </td>
                                  <td><h5 class="font-weight-bold mb-0">{{ $bus }}</h5></td>
                                </tr>
                                <tr>
                                  <td class="text-muted">Roda 4</td>
                                  <td class="w-100 px-0">
                                    <div class="progress progress-md mx-4">
                                      <div class="progress-bar bg-danger" role="progressbar" style="width: {{ $roda4 }}%" aria-valuenow="50" aria-valuemin="0" aria-valuemax="100"></div>
                                    </div>
                                  </td>
                                  <td><h5 class="font-weight-bold mb-0">{{ $roda4 }}</h5></td>
                                </tr>
                                <tr>
                                  <td class="text-muted">Roda 2</td>
                                  <td class="w-100 px-0">
                                    <div class="progress progress-md mx-4">
                                      <div class="progress-bar bg-info" role="progressbar" style="width: {{ $roda2 }}%" aria-valuenow="90" aria-valuemin="0" aria-valuemax="100"></div>
                                    </div>
                                  </td>
                                  <td><h5 class="font-weight-bold mb-0">{{ $roda2 }}</h5></td>
                                </tr>
                                <tr>
                                  <td class="text-muted">Perlengkapan</td>
                                  <td class="w-100 px-0">
                                    <div class="progress progress-md mx-4">
                                      <div class="progress-bar bg-primary" role="progressbar" style="width: {{ $perlengkapan }}%" aria-valuenow="40" aria-valuemin="0" aria-valuemax="100"></div>
                                    </div>
                                  </td>
                                  <td><h5 class="font-weight-bold mb-0">{{ $perlengkapan }}</h5></td>
                                </tr>
                              </table>
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
            </div>
@endsection