<nav class="sidebar sidebar-offcanvas" id="sidebar">
    <ul class="nav">
      <li class="nav-item">
        <a class="nav-link" href="dashboard">
          <i class="icon-grid menu-icon"></i>
          <span class="menu-title">Dashboard</span>
        </a>
      </li>
      <li class="nav-item">
        <a class="nav-link" data-toggle="collapse" href="#ui-basic" aria-expanded="false" aria-controls="ui-basic">
          <i class="icon-layout menu-icon"></i>
          <span class="menu-title">Data Master</span>
          <i class="menu-arrow"></i>
        </a>
        <div class="collapse" id="ui-basic">
          <ul class="nav flex-column sub-menu">
            <li class="nav-item"> <a class="nav-link" href="/jenis">Jenis Kendaraan</a></li>
            <li class="nav-item"> <a class="nav-link" href="/kendaraan">Kendaraan</a></li>
            {{-- <li class="nav-item"> <a class="nav-link" href="/transaksi">Transaksi</a></li> --}}
            {{-- <li class="nav-item"> <a class="nav-link" href="/bus">Bus & Elf</a></li>
            <li class="nav-item"> <a class="nav-link" href="/rodaempat">Roda 4</a></li>
            <li class="nav-item"> <a class="nav-link" href="/rodadua">Roda 2</a></li>
            <li class="nav-item"> <a class="nav-link" href="/perlengkapan">Perlengkapan</a></li>
          </ul> --}}
        </div>
      </li>
      <li class="nav-item">
        <a class="nav-link" data-toggle="collapse" href="#form-elements" aria-expanded="false" aria-controls="form-elements">
          <i class="icon-columns menu-icon"></i>
          <span class="menu-title">Transaksi</span>
          <i class="menu-arrow"></i>
        </a>
        <div class="collapse" id="form-elements">
          <ul class="nav flex-column sub-menu">
            <li class="nav-item"> <a class="nav-link" href="/transaksi">Transaksi</a></li>
            {{-- <li class="nav-item"><a class="nav-link" href="/transaksi1">Bus & Elf</a></li>
            <li class="nav-item"><a class="nav-link" href="/transaksi2">Roda 4</a></li>
            <li class="nav-item"><a class="nav-link" href="/transaksi3">Roda 2</a></li>
            <li class="nav-item"><a class="nav-link" href="/transaksi4">Perlengkapan</a></li> --}}
          </ul>
        </div>
      </li>
      
      <li class="nav-item">
        <a class="nav-link" href="/laporan">
          <i class="icon-paper menu-icon"></i>
          <span class="menu-title">Laporan</span>
        </a>
      </li>

      {{-- <li class="nav-item">
        <a class="nav-link" href="pages/documentation/documentation.html">
          <i class="icon-head menu-icon"></i>
          <span class="menu-title">Reset Password</span>
        </a>
      </li> --}}

    </ul>
  </nav>