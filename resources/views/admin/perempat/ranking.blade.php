@extends('admin.layouts.main')

@section('container')

  @if (session()->has('message'))
    <div id="flash-data" data-flashdata="{{ session('message') }}"></div>
  @endif

  <!--Header-->
  <div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
    <div class="breadcrumb-title pe-3">Perempat Final</div>
    <div class="ps-3 ms-auto">
      <nav aria-label="breadcrumb">
        <ol class="breadcrumb mb-0 p-0">
          <li class="breadcrumb-item"><a href="/admin"><i class="bx bx-home-alt"></i> Dashboard</a>
          </li>
          <li class="breadcrumb-item active" aria-current="page">Ranking Peserta</li>
        </ol>
      </nav>
    </div>
  </div>
  <!--end of Header-->

  <h6 class="mb-0 text-uppercase">Daftar Ranking Peserta</h6>
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
              <th>Skor</th>
              <th>Aksi</th>
            </tr>
          </thead>
          <tbody>
            @foreach ($users as $user)
            <tr>
              <td class="text-center align-middle">{{ $loop->iteration }}</td>
              <td class="text-center align-middle">
                <a href="/admin/tim/{{ $user->team_number }}">
                  {{ $user->team_number }}
                </a>
              </td>
              <td class="align-middle">{{ $user->name }}</td>
              <td class="align-middle text-center">{{ $user->score ?? '-' }}</td>
              <td class="align-middle">
                <div class="table-actions d-flex align-items-center justify-content-center gap-3 fs-6">
                  <form action="/admin/perempat/changerole/{{ $user->team_number }}" method="post" class="d-inline">
                    @method('PUT')
                    @csrf
                    <button type="submit" class="p-0 btn">
                      @if ($user->user->roles == 'Quarter Finalist')
                        <span class="text-success">Loloskan!</span>
                      @else
                        <span class="text-danger">Batalkan!</span>
                      @endif
                    </button>
                  </form>
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
              <th>Skor</th>
              <th>Aksi</th>
            </tr>
          </tfoot>
        </table>
      </div>
    </div>
  </div>
  
@endsection