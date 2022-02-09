@extends('admin.layouts.main')

@section('container')

  @if (session()->has('message'))
    <div id="flash-data" data-flashdata="{{ session('message') }}"></div>
  @endif

  <!--Header-->
  <div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
    <div class="breadcrumb-title pe-3">Semifinal</div>
    <div class="ps-3 ms-auto">
      <nav aria-label="breadcrumb">
        <ol class="breadcrumb mb-0 p-0">
          <li class="breadcrumb-item"><a href="/admin"><i class="bx bx-home-alt"></i> Dashboard</a>
          </li>
          <li class="breadcrumb-item active" aria-current="page">Daftar Soal Semifinal</li>
        </ol>
      </nav>
    </div>
  </div>
  <!--end of Header-->

  <h6 class="mb-0 text-uppercase">Daftar Soal Semifinal</h6>
  <hr>

  <div class="card">
    <div class="card-body">
      <div class="table-responsive">
        <table id="example2" class="table table-striped table-bordered py-3">
          <thead>
            <tr>
              <th>No</th>
              <th>Kategori</th>
              <th>Laboratorium</th>
              <th>Soal</th>
              <th>Aksi</th>
            </tr>
          </thead>
          <tbody>
            @foreach ($questions as $question)
            <tr>
              <td class="text-center align-middle">{{ $question->number }}</td>
              <td class="text-center align-middle">{{ $question->category }}</td>
              <td class="text-center align-middle">{{ $question->laboratory }}</td>
              <td class="align-middle text-wrap">{!! $question->question ?: '<em class="text-center d-block">Belum ada soal</em>' !!}</td>
              <td class="align-middle">
                <div class="table-actions d-flex justify-content-center align-items-center gap-3 fs-6">
                  <a href="/admin/semifinal/{{ $question->number }}" class="text-primary mx-2" data-bs-toggle="tooltip" data-bs-placement="bottom" title="Detail Soal"><i class="bi bi-eye-fill"></i></a>
                  <a href="/admin/semifinal/{{ $question->number }}/edit" class="text-warning mx-2" data-bs-toggle="tooltip" data-bs-placement="bottom" title="Edit Soal"><i class="bi bi-pencil-fill"></i></a>
                </div>
              </td>
            </tr>
            @endforeach
          </tbody>
          <tfoot>
            <tr>
              <th>No</th>
              <th>Kategori</th>
              <th>Laboratorium</th>
              <th>Soal</th>
              <th>Aksi</th>
            </tr>
          </tfoot>
        </table>
      </div>
    </div>
  </div>
  
@endsection