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
                      <p class="mb-2" style="font-size: 50px; margin-top: 30px;">1</p>
                      </div>
                    </div>
                  </div>
                </div>
                <div class="col-md-4 mb-4 stretch-card transparent">
                  <div class="card card-dark-blue">
                    <div class="card-body">
                      <div class="d-flex justify-content-between align-items-center">
                      <p class="mb-4" style="font-size: 24px;">ACC</p>
                      <p class="mb-2" style="font-size: 50px; margin-top: 30px;">5</p>
                      </div>
                    </div>
                  </div>
                </div>
                <div class="col-md-4 mb-4 stretch-card transparent">
                  <div class="card card-light-danger">
                    <div class="card-body">
                      <div class="d-flex justify-content-between align-items-center">
                      <p class="mb-4" style="font-size: 24px;">Tolak</p>
                      <p class="mb-2" style="font-size: 50px; margin-top: 30px;">4</p>
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
                  <p class="card-title mb-0">Top Products</p>
                  <div class="table-responsive">
                    <table class="table table-striped table-borderless">
                      <thead>
                        <tr>
                          <th>Product</th>
                          <th>Price</th>
                          <th>Date</th>
                          <th>Status</th>
                        </tr>  
                      </thead>
                      <tbody>
                        <tr>
                          <td>Search Engine Marketing</td>
                          <td class="font-weight-bold">$362</td>
                          <td>21 Sep 2018</td>
                          <td class="font-weight-medium"><div class="badge badge-success">Completed</div></td>
                        </tr>
                        <tr>
                          <td>Search Engine Optimization</td>
                          <td class="font-weight-bold">$116</td>
                          <td>13 Jun 2018</td>
                          <td class="font-weight-medium"><div class="badge badge-success">Completed</div></td>
                        </tr>
                        <tr>
                          <td>Display Advertising</td>
                          <td class="font-weight-bold">$551</td>
                          <td>28 Sep 2018</td>
                          <td class="font-weight-medium"><div class="badge badge-warning">Pending</div></td>
                        </tr>
                        <tr>
                          <td>Pay Per Click Advertising</td>
                          <td class="font-weight-bold">$523</td>
                          <td>30 Jun 2018</td>
                          <td class="font-weight-medium"><div class="badge badge-warning">Pending</div></td>
                        </tr>
                        <tr>
                          <td>E-Mail Marketing</td>
                          <td class="font-weight-bold">$781</td>
                          <td>01 Nov 2018</td>
                          <td class="font-weight-medium"><div class="badge badge-danger">Cancelled</div></td>
                        </tr>
                        <tr>
                          <td>Referral Marketing</td>
                          <td class="font-weight-bold">$283</td>
                          <td>20 Mar 2018</td>
                          <td class="font-weight-medium"><div class="badge badge-warning">Pending</div></td>
                        </tr>
                        <tr>
                          <td>Social media marketing</td>
                          <td class="font-weight-bold">$897</td>
                          <td>26 Oct 2018</td>
                          <td class="font-weight-medium"><div class="badge badge-success">Completed</div></td>
                        </tr>
                      </tbody>
                    </table>
                  </div>
                </div>
              </div>
            </div>
        <div class="row">
          <div class="col-md-12 grid-margin stretch-card">
            <div class="card position-relative">
              <div class="card-body">
                <div id="detailedReports" class="carousel slide detailed-report-carousel position-static pt-2" data-ride="carousel">
                  <div class="carousel-inner">
                    <div class="carousel-item active">
                      <div class="row">
                        <div class="col-md-12 col-xl-3 d-flex flex-column justify-content-start">
                          <div class="ml-xl-4 mt-3">
                          <p class="card-title">Jenis Kendaraan Report</p>
                            <h1 class="text-primary">{{ $kendaraan }}</h1>
                            <p class="mb-2 mb-xl-0">Jumlah total kendaraan penggunaan BBM berdasarkan jenis kendaraan</p>
                          </div>  
                          </div>
                        <div class="col-md-12 col-xl-9">
                          <div class="row">
                            <div class="col-md-12 border-right">
                              <div class="table-responsive mb-4 mb-md-0 mt-4">
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
                                        <div class="progress-bar bg-warning" role="progressbar" style="width: {{ $roda4 }}%" aria-valuenow="30" aria-valuemin="0" aria-valuemax="100"></div>
                                      </div>
                                    </td>
                                    <td><h5 class="font-weight-bold mb-0">{{ $roda4 }}</h5></td>
                                  </tr>
                                  <tr>
                                    <td class="text-muted">Roda 2</td>
                                    <td class="w-100 px-0">
                                      <div class="progress progress-md mx-4">
                                        <div class="progress-bar bg-danger" role="progressbar" style="width: {{ $roda2 }}%" aria-valuenow="95" aria-valuemin="0" aria-valuemax="100"></div>
                                      </div>
                                    </td>
                                    <td><h5 class="font-weight-bold mb-0">{{ $roda2}}</h5></td>
                                  </tr>
                                  <tr>
                                    <td class="text-muted">Perlengkapan</td>
                                    <td class="w-100 px-0">
                                      <div class="progress progress-md mx-4">
                                        <div class="progress-bar bg-info" role="progressbar" style="width: {{ $perlengkapan }}%" aria-valuenow="60" aria-valuemin="0" aria-valuemax="100"></div>
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
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>

@endsection