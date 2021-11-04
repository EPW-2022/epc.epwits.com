@extends('admin.layouts.main')

@section('container')
    
  <!--Header-->
  <div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
    <div class="breadcrumb-title pe-3">Daftar Ketua Tim</div>
    <div class="ps-3 ms-auto">
      <nav aria-label="breadcrumb">
        <ol class="breadcrumb mb-0 p-0">
          <li class="breadcrumb-item"><a href="/admin"><i class="bx bx-home-alt"></i> Dashboard</a>
          </li>
          <li class="breadcrumb-item active" aria-current="page">Daftar Ketua Tim</li>
        </ol>
      </nav>
    </div>
  </div>
  <!--end of Header-->

  <h6 class="mb-0 text-uppercase">Daftar Ketua Tim Peserta</h6>
  <hr>

  <div class="card">
    <div class="card-body">
      <div class="table-responsive">
        <table id="example2" class="table table-striped table-bordered py-3">
          <thead>
            <tr>
              <th>No</th>
              <th>No. Tim</th>
              <th>Nama Lengkap</th>
              <th>NISN</th>
              <th>Tempat, Tanggal Lahir</th>
              <th>No Telepon</th>
              <th>Alamat</th>
              <th>Aksi</th>
            </tr>
          </thead>
          <tbody>
            @foreach ($users as $user)
            <tr>
              <td class="text-center">{{ $loop->iteration }}</td>
              <td class="text-center">{{ $user->team->team_number }}</td>
              <td>{{ $user->leader->fullname }}</td>
              <td>{{ $user->leader->student_number }}</td>
              <td>{{ $user->leader->place_birth }}, {{ $user->leader->date_birth }}</td>
              <td>{{ $user->leader->phone }}</td>
              <td class="text-wrap">{{ $user->leader->address }}</td>
              <td class="text-nowrap">
                <div class="table-actions d-flex align-items-center gap-3 fs-6">
                  <a href="/admin/tim/{{ $user->team->team_number }}" class="text-primary" data-bs-toggle="tooltip" data-bs-placement="bottom" title="Detail Data"><i class="bi bi-eye-fill"></i> Detail</a>
                  {{-- <a href="" class="text-warning" data-bs-toggle="tooltip" data-bs-placement="bottom" title="Edit"><i class="bi bi-pencil-fill"></i></a>
                  <a href="" class="text-danger" data-bs-toggle="tooltip" data-bs-placement="bottom" title="Delete"><i class="bi bi-trash-fill"></i></a> --}}
                </div>
              </td>
            </tr>
            @endforeach
          </tbody>
          <tfoot>
            <tr>
              <th>No</th>
              <th>No. Tim</th>
              <th>Nama Lengkap</th>
              <th>NISN</th>
              <th>Tempat, Tanggal Lahir</th>
              <th>No Telepon</th>
              <th>Alamat</th>
              <th>Aksi</th>
            </tr>
          </tfoot>
        </table>
      </div>
    </div>
  </div>
  
@endsection