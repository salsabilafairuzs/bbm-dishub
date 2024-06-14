<nav class="sidebar sidebar-offcanvas" id="sidebar">
    <ul class="nav">
      <li class="nav-item">
        <a class="nav-link" href="dashboard">
          <i class="icon-grid menu-icon"></i>
          <span class="menu-title">Dashboard</span>
        </a>
      </li>
      @role(['superadmin','admin'])
      <li class="nav-item">
        <a class="nav-link" data-toggle="collapse" href="#ui-basic" aria-expanded="false" aria-controls="ui-basic">
          <i class="icon-layout menu-icon"></i>
          <span class="menu-title">Data Master</span>
          <i class="menu-arrow"></i>
        </a>
        <div class="collapse" id="ui-basic">
          <ul class="nav flex-column sub-menu">
            <li class="nav-item"> <a class="nav-link" href="/jenis">Jenis Kendaraan</a></li>
            <li class="nav-item"> <a class="nav-link" href="/bbm">Jenis BBM</a></li>
            <li class="nav-item"> <a class="nav-link" href="/kendaraan">Kendaraan</a></li>
            {{-- <li class="nav-item"> <a class="nav-link" href="/transaksi">Transaksi</a></li> --}}
            {{-- <li class="nav-item"> <a class="nav-link" href="/bus">Bus & Elf</a></li>
            <li class="nav-item"> <a class="nav-link" href="/rodaempat">Roda 4</a></li>
            <li class="nav-item"> <a class="nav-link" href="/rodadua">Roda 2</a></li>
            <li class="nav-item"> <a class="nav-link" href="/perlengkapan">Perlengkapan</a></li>
          </ul> --}}
        </div>
      </li>
      @endrole

      {{-- @role(['bendahara'])
      <li class="nav-item">
        <a class="nav-link" href="/anggaran">
          <i class="fas fa-wallet" style="margin-right:18px;"></i>
          <span class="menu-title">Anggaran</span>
        </a>
      </li>
      @endrole --}}


      <li class="nav-item">
        <a class="nav-link" href="/transaksi">
          <i class="fas fa-money-check-alt" style="margin-right:14px;"></i>
          <span class="menu-title">Transaksi</span>
        </a>
      </li>

      <li class="nav-item">
        <a class="nav-link" href="/laporan">
          <i class="icon-paper menu-icon"></i>
          <span class="menu-title">Laporan</span>
        </a>
      </li>

      <li class="nav-item">
        <a class="nav-link" data-toggle="collapse" href="#history" aria-expanded="false" aria-controls="history">
          <i class="fas fa-history" style="margin-right:17px;"></i>
          <span class="menu-title">History</span>
          <i class="menu-arrow"></i>
        </a>
        <div class="collapse" id="history">
          <ul class="nav flex-column sub-menu">
            <li class="nav-item"> <a class="nav-link" href="/history-acc">ACC</a></li>
            <li class="nav-item"> <a class="nav-link" href="/history-revisi">Revisi</a></li>
            <li class="nav-item"> <a class="nav-link" href="/history-tolak">Tolak</a></li>
          </ul>
        </div>
      </li>

      <li class="nav-item">
        <a class="nav-link" data-toggle="collapse" href="#tables" aria-expanded="false" aria-controls="tables">
          <i class="icon-head menu-icon"></i>
          <span class="menu-title">User Setting</span>
          <i class="menu-arrow"></i>
        </a>
        <div class="collapse" id="tables">
          <ul class="nav flex-column sub-menu">
            <li class="nav-item"> <a class="nav-link" href="/change-password">Ubah Password</a>
            @role(['superadmin'])
                <li class="nav-item"> <a class="nav-link" href="/manajemen-user">User Management</a></li>
            @endrole
          </ul>
        </div>
      </li>

      {{-- <li class="nav-item">
        <a class="nav-link" href="pages/documentation/documentation.html">
          <i class="icon-head menu-icon"></i>
          <span class="menu-title">Ubah Password</span>
        </a>
      </li> --}}

    </ul>
  </nav>
