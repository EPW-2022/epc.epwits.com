@extends('admin.layouts.main')

@section('container')
  <!--Header-->
  <div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
    <div class="breadcrumb-title pe-3">Hello, {{ auth()->user()->name }}</div>
    <div class="ps-3 ms-auto">
      <nav aria-label="breadcrumb">
        <ol class="breadcrumb mb-0 p-0">
          {{-- <li class="breadcrumb-item"><a href="javascript:;"><i class="bx bx-home-alt"></i></a>
          </li> --}}
          <li class="breadcrumb-item active" aria-current="page">Dashboard</li>
        </ol>
      </nav>
    </div>
  </div>
  <!--end of Header-->

  <h6 class="mb-0 text-uppercase">Statistik</h6>
  <hr>

  <div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 row-cols-xl-4 row-cols-xxl-4">
    <div class="col">
      <div class="card radius-10 border-0 border-start border-tiffany border-3">
        <div class="card-body">
          <div class="d-flex align-items-center">
            <div class="">
              <p class="mb-1">Jumlah Tim Pendaftar</p>
              <h4 class="mb-0 text-tiffany">{{ $teams }}</h4>
            </div>
            <div class="ms-auto widget-icon bg-tiffany text-white">
              <i class="bi bi-people-fill"></i>
            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="col">
      <div class="card radius-10 border-0 border-start border-warning border-3">
        <div class="card-body">
          <div class="d-flex align-items-center">
            <div class="">
              <p class="mb-1">Belum Diverifikasi</p>
              <h4 class="mb-0 text-warning">{{ $unverify }}</h4>
            </div>
            <div class="ms-auto widget-icon bg-warning text-white">
              <i class="bi bi-patch-check"></i>
            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="col">
      <div class="card radius-10 border-0 border-start border-danger border-3">
        <div class="card-body">
          <div class="d-flex align-items-center">
            <div class="">
              <p class="mb-1">Data ditolak</p>
              <h4 class="mb-0 text-danger">{{ $rejected }}</h4>
            </div>
            <div class="ms-auto widget-icon bg-danger text-white">
              <i class="bi bi-trash"></i>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  
@endsection