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
    <li class="menu-label mt-0">Database</li>
    <li class="{{ Request::is('admin/tim**') ? 'mm-active' : '' }}">
      <a href="javascript:;" class="has-arrow">
        <div class="parent-icon"><i class="bi bi-grid"></i>
        </div>
        <div class="menu-title">Peserta</div>
      </a>
      <ul class="mm-collapse">
        <li class="{{ Request::is('admin/tim') ? 'mm-active' : '' }}"> <a href="/admin/tim"><i class="bi bi-arrow-right-short"></i>Akun Tim</a>
        </li>
        <li class="{{ Request::is('admin/tim/verifikasi') ? 'mm-active' : '' }}"> <a href="/admin/tim/verifikasi"><i class="bi bi-arrow-right-short"></i>Perlu Verifikasi</a>
        </li>
        <li class="{{ Request::is('admin/tim/ketua') ? 'mm-active' : '' }}"> <a href="/admin/tim/ketua"><i class="bi bi-arrow-right-short"></i>Data Ketua</a>
        </li>
        <li class="{{ Request::is('admin/tim/anggota') ? 'mm-active' : '' }}"> <a href="/admin/tim/anggota"><i class="bi bi-arrow-right-short"></i>Data Anggota</a>
        </li>
      </ul>
    </li>
  </ul>
  <!--end navigation-->
</aside>
<!--end sidebar -->