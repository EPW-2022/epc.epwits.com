<!--start sidebar -->
<aside class="sidebar-wrapper" data-simplebar="true">
  <div class="sidebar-header">
    <div>
      <img src="/img/logo-epc.svg" class="logo-icon" alt="logo icon">
    </div>
    <div>
      <h4 class="logo-text">EPC Admin</h4>
    </div>
    <div class="toggle-icon ms-auto"><i class="bi bi-chevron-double-left"></i>
    </div>
  </div>
  <!--navigation-->
  <ul class="metismenu" id="menu">
    <li class="{{ Request::is('admin') ? 'mm-active' : '' }}">
      <a href="/admin">
        <div class="parent-icon"><i class="bi bi-house-door"></i>
        </div>
        <div class="menu-title">Dashboard</div>
      </a>
    </li>
    <li class="{{ Request::is('admin/semifinal/platform') ? 'mm-active' : '' }}">
      <a href="/admin/semifinal/platform" target="_blank">
        <div class="parent-icon"><i class="bi bi-cast"></i>
        </div>
        <div class="menu-title">Semifinal Platform</div>
      </a>
    </li>

    @if(auth()->user()->roles === 'Superadmin')
      <li class="menu-label mt-0">Superadmin</li>
      <li class="{{ Request::is('superadmin/trashed') ? 'mm-active' : '' }}">
        <a href="/superadmin/trashed">
          <div class="parent-icon">
            <i class="bi bi-person-x-fill"></i>
          </div>
          <div class="menu-title">Data Tim Dihapus</div>
        </a>
      </li>
      <li class="{{ Request::is('superadmin/attempt/**') ? 'mm-active' : '' }}">
        <a href="#" class="has-arrow">
          <div class="parent-icon">
            <i class="bi bi-box-arrow-right"></i>
          </div>
          <div class="menu-title">Data Attempt</div>
        </a>
        <ul class="mm-collapse">
          <li class="{{ Request::is('superadmin/attempt/penyisihan') ? 'mm-active' : '' }}">
            <a href="/superadmin/attempt/penyisihan">
              <i class="bi bi-arrow-right-short"></i>
              Penyisihan
            </a>
          </li>
          <li class="{{ Request::is('superadmin/attempt/perempat') ? 'mm-active' : '' }}">
            <a href="/superadmin/attempt/perempat">
              <i class="bi bi-arrow-right-short"></i>
              Perempat Final
            </a>
          </li>
        </ul>
      </li>
      <li class="{{ Request::is('superadmin/semifinal') ? 'mm-active' : '' }}">
        <a href="/superadmin/semifinal">
          <div class="parent-icon">
            <i class="bi bi-cast"></i>
          </div>
          <div class="menu-title">Semifinal Reset</div>
        </a>
      </li>
    @endif
    
    {{-- Database Menu --}}
    <li class="menu-label mt-0">Database</li>
    <li class="{{ Request::is('admin/tim') ? 'mm-active' : '' }}">
      <a href="/admin/tim">
        <div class="parent-icon">
          <i class="bi bi-people-fill"></i>
        </div>
        <div class="menu-title">Akun Tim Peserta</div>
      </a>
    </li>
    <li class="{{ Request::is('admin/tim/verifikasi') ? 'mm-active' : '' }}">
      <a href="/admin/tim/verifikasi">
        <div class="parent-icon">
          <i class="bi bi-patch-check"></i>
        </div>
        <div class="menu-title">Perlu Verifikasi</div>
      </a>
    </li>
    <li class="{{ Request::is('admin/tim/ketua') ? 'mm-active' : '' }}">
      <a href="/admin/tim/ketua">
        <div class="parent-icon">
          <i class="bi bi-person-fill"></i>
        </div>
        <div class="menu-title">Data Ketua</div>
      </a>
    </li>
    <li class="{{ Request::is('admin/tim/anggota') ? 'mm-active' : '' }}">
      <a href="/admin/tim/anggota">
        <div class="parent-icon">
          <i class="bi bi-person-fill"></i>
        </div>
        <div class="menu-title">Data Anggota</div>
      </a>
    </li>

    {{-- Quiz Menu --}}
    <li class="menu-label mt-0">EVENT</li>
    <li class="{{ Request::is('admin/setup') ? 'mm-active' : '' }}">
      <a href="/admin/setup">
        <div class="parent-icon">
          <i class="bi bi-gear"></i>
        </div>
        <div class="menu-title">Pengaturan Quiz</div>
      </a>
    </li>
    {{-- Penyisihan Menu --}}
    <li class="{{ Request::is('admin/penyisihan**') ? 'mm-active' : '' }}">
      <a href="#" class="has-arrow">
        <div class="parent-icon"><i class="bi bi-grid"></i>
        </div>
        <div class="menu-title">Penyisihan</div>
      </a>
      <ul class="mm-collapse">
        <li class="{{ Request::is('admin/penyisihan') ? 'mm-active' : '' }}">
          <a href="/admin/penyisihan">
            <i class="bi bi-arrow-right-short"></i>
            Daftar Soal
          </a>
        </li>
        <li class="{{ Request::is('admin/penyisihan/create') ? 'mm-active' : '' }}">
          <a href="/admin/penyisihan/create">
            <i class="bi bi-arrow-right-short"></i>
            Tambah Soal
          </a>
        </li>
        <li class="{{ Request::is('admin/penyisihan/status') ? 'mm-active' : '' }}">
          <a href="/admin/penyisihan/status">
            <i class="bi bi-arrow-right-short"></i>
            Status Peserta
          </a>
        </li>
        <li class="{{ Request::is('admin/penyisihan/ranking') ? 'mm-active' : '' }}">
          <a href="/admin/penyisihan/ranking">
            <i class="bi bi-arrow-right-short"></i>
            Ranking Peserta
          </a>
        </li>
      </ul>
    </li>

    {{-- Perempat Final Menu --}}
    <li class="{{ Request::is('admin/perempat**') ? 'mm-active' : '' }}">
      <a href="#" class="has-arrow">
        <div class="parent-icon"><i class="bi bi-grid"></i>
        </div>
        <div class="menu-title">Perempat Final</div>
      </a>
      <ul class="mm-collapse">
        <li class="{{ Request::is('admin/perempat') ? 'mm-active' : '' }}">
          <a href="/admin/perempat">
            <i class="bi bi-arrow-right-short"></i>
            Daftar Soal
          </a>
        </li>
        <li class="{{ Request::is('admin/perempat/create') ? 'mm-active' : '' }}">
          <a href="/admin/perempat/create">
            <i class="bi bi-arrow-right-short"></i>
            Tambah Soal
          </a>
        </li>
        <li class="{{ Request::is('admin/perempat/status') ? 'mm-active' : '' }}">
          <a href="/admin/perempat/status">
            <i class="bi bi-arrow-right-short"></i>
            Status Peserta
          </a>
        </li>
        <li class="{{ Request::is('admin/perempat/jawaban') ? 'mm-active' : '' }}">
          <a href="/admin/perempat/jawaban">
            <i class="bi bi-arrow-right-short"></i>
            Jawaban Peserta
          </a>
        </li>
        <li class="{{ Request::is('admin/perempat/ranking') ? 'mm-active' : '' }}">
          <a href="/admin/perempat/ranking">
            <i class="bi bi-arrow-right-short"></i>
            Ranking Peserta
          </a>
        </li>
      </ul>
    </li>

    {{-- Semifinal Menu --}}
    <li class="{{ Request::is('admin/semifinal**') ? 'mm-active' : '' }}">
      <a href="#" class="has-arrow">
        <div class="parent-icon"><i class="bi bi-grid"></i>
        </div>
        <div class="menu-title">Semifinal</div>
      </a>
      <ul class="mm-collapse">
        <li class="{{ Request::is('admin/semifinal') ? 'mm-active' : '' }}">
          <a href="/admin/semifinal">
            <i class="bi bi-arrow-right-short"></i>
            Daftar Soal
          </a>
        </li>
        <li class="{{ Request::is('admin/semifinal/status') ? 'mm-active' : '' }}">
          <a href="/admin/semifinal/status">
            <i class="bi bi-arrow-right-short"></i>
            Kehadiran Peserta
          </a>
        </li>
        <li class="{{ Request::is('admin/semifinal/jawaban') ? 'mm-active' : '' }}">
          <a href="/admin/semifinal/jawaban">
            <i class="bi bi-arrow-right-short"></i>
            Jawaban Peserta
          </a>
        </li>
      </ul>
    </li>

  </ul>
  <!--end navigation-->
</aside>
<!--end sidebar -->