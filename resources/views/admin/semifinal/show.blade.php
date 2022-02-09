@extends('admin.layouts.main')

@section('container')
  <!--Header-->
  <div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
    <div class="breadcrumb-title pe-3">Semifinal</div>
    <div class="ps-3 ms-auto">
      <nav aria-label="breadcrumb">
        <ol class="breadcrumb mb-0 p-0">
          <li class="breadcrumb-item"><a href="/admin"><i class="bx bx-home-alt"></i> Dashboard</a>
          </li>
          <li class="breadcrumb-item"><a href="/admin/semifinal"><i class="bx bx-home-alt"></i> Daftar Soal Semifinal</a>
          </li>
          <li class="breadcrumb-item active" aria-current="page">Soal Semifinal</li>
        </ol>
      </nav>
    </div>
  </div>
  <!--end of Header-->

  <div class="row">
    {{-- Soal Semifinal --}}
    <div class="col-xl-9 order-2 order-xl-1">
      <h6 class="mb-0 text-uppercase">Soal Semifinal</h6>
      <hr>
      <div class="card">
        <div class="card-body">
          <div class="border p-3 rounded">
            <div class="d-flex justify-content-between align-items-center">
              <div>
                <h6 class="mb-0 text-uppercase">
                  Soal Semifinal No : {{ $question->number }}
                </h6>
                <span class="d-block text-small">Kategori : {{ $question->category }}</span>
              </div>
            </div>
            <hr/>
            <div class="d-flex">
              <div class="me-2">{{ $question->number }}.</div>
              <div>
                {!! $question->question !!}
              </div>
            </div>
          </div>
        </div>
        <div class="card-footer text-end">
          <a href="/admin/semifinal/{{ $question->number }}/edit" class="btn btn-primary">Edit Soal</a>
        </div>
      </div>
    </div>
  </div>
  
@endsection