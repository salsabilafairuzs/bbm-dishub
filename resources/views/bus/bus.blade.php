@extends('template.template')
@section('konten')
    <div class="content-wrapper">
      <div class="row">
        <div class="col-md-12 grid-margin">
          <div class="row">
            <div class="col-12 col-xl-8 mb-4 mb-xl-0">
              <h3 class="font-weight-bold">Welcome Admin!</h3>
            </div>
            <div class="col-12 col-xl-4">
             <div class="justify-content-end d-flex">
              <div class="dropdown flex-md-grow-1 flex-xl-grow-0">
                <button class="btn btn-sm btn-light bg-white dropdown-toggle" type="button" id="dropdownMenuDate2" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">
                 <i class="mdi mdi-calendar"></i> Today ( {{ now()->format('d-m-Y') }} )
                </button>
                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="dropdownMenuDate2">
                  <a class="dropdown-item" href="#">January - March</a>
                  <a class="dropdown-item" href="#">March - June</a>
                  <a class="dropdown-item" href="#">June - August</a>
                  <a class="dropdown-item" href="#">August - November</a>
                </div>
              </div>
             </div>
            </div>
          </div>
        </div>
      </div>
      <div class="card shadow-lg">
        <div class="card-body">
            <div class="row">
                <button class="btn btn-primary btn-sm" style="margin-left:40px; margin-top:20px;">Tambah</button>
                <div class="col-md-12 mt-5">
                <table class="table table-striped table-bordered">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>No Pol</th>
                            <th>Max Pengisian</th>
                            <th>Jenis BB</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>1</td>
                            <td>AD 097909 HM</td>
                            <td>1 Kali</td>
                            <td>Dexlite</td>
                        </tr>
        
                        <tr>
                            <td>2</td>
                            <td>AE 097909 SH</td>
                            <td>1 Kali</td>
                            <td>Dexlite</td>
                        </tr>
                    </tbody>
                </table>
                </div>
              </div>
        </div>
      </div>
      
     
    </div>
@endsection