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
          <li class="breadcrumb-item active" aria-current="page">Status Peserta</li>
        </ol>
      </nav>
    </div>
  </div>
  <!--end of Header-->

  <h6 class="mb-0 text-uppercase">Daftar Status Peserta</h6>
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
              <th>Start Attempt</th>
              <th>Status</th>
            </tr>
          </thead>
          <tbody>
            @foreach ($users as $user)
            <tr>
              <td class="text-center align-middle">{{ $loop->iteration }}</td>
              <td class="text-center align-middle">
                <a href="/admin/tim/{{ $user->team->team_number }}">
                  {{ $user->team->team_number }}
                </a>
              </td>
              <td class="align-middle">{{ $user->name }}</td>
              <td class="align-middle">{{ $user->semifinal_attend->attempt_at ?? '-' }}</td>
              <td class="align-middle">
                @if (empty($user->semifinal_attend->attempt_at))
                  <span class="text-danger"><i class="bi bi-x-circle"></i> Belum mengerjakan</span>
                @elseif ($user->semifinal_attend->attempt_at)
                  <span class="text-warning">Sedang Mengerjakan</span>
                @endif  
              </td>
            </tr>
            @endforeach
          </tbody>
          <tfoot>
            <tr>
              <th>No</th>
              <th>No. Tim</th>
              <th>Nama Tim</th>
              <th>Start Attempt</th>
              <th>Status</th>
            </tr>
          </tfoot>
        </table>
      </div>
    </div>
  </div>
  
@endsection