@extends('admin.layouts.main')

@section('container')

  @if (session()->has('message'))
    <div id="flash-data" data-flashdata="{{ session('message') }}"></div>
  @endif
    
  <!--Header-->
  <div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
    <div class="breadcrumb-title pe-3">Akun Tim Peserta</div>
    <div class="ps-3 ms-auto">
      <nav aria-label="breadcrumb">
        <ol class="breadcrumb mb-0 p-0">
          <li class="breadcrumb-item"><a href="/admin"><i class="bx bx-home-alt"></i> Dashboard</a>
          </li>
          <li class="breadcrumb-item active" aria-current="page">Akun Tim Peserta</li>
        </ol>
      </nav>
    </div>
  </div>
  <!--end of Header-->

  <h6 class="mb-0 text-uppercase">Data Akun Tim Peserta</h6>
  <hr>

  <div class="card">
    <div class="card-body">
      <div class="table-responsive">
        <table id="example2" class="table table-striped table-bordered py-3">
          <thead>
            <tr>
              <th>No</th>
              <th>No. Tim</th>
              <th>Nama Tim</th>
              <th>Username</th>
              <th>Email</th>
              <th>Status</th>
              <th>Aksi</th>
            </tr>
          </thead>
          <tbody>
            @foreach ($users as $user)
            <tr>
              <td class="text-center">{{ $loop->iteration }}</td>
              <td class="text-center">{{ $user->team->team_number }}</td>
              <td>{{ $user->name }}</td>
              <td>{{ $user->username }}</td>
              <td>{{ $user->email }}</td>
              <td>
                @if ($user->verified_at)
                  <span class="text-success"><i class="bi bi-patch-check"></i> Telah diverifikasi</span>
                @else
                  <span class="text-danger">Belum diverifikasi</span>
                @endif  
              </td>
              <td>
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
              <th>Nama Tim</th>
              <th>Username</th>
              <th>Email</th>
              <th>Status</th>
              <th>Aksi</th>
            </tr>
          </tfoot>
        </table>
      </div>
    </div>
  </div>
  
@endsection