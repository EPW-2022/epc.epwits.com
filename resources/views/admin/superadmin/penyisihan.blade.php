@extends('admin.layouts.main')

@section('container')

  @if (session()->has('message'))
    <div id="flash-data" data-flashdata="{{ session('message') }}"></div>
  @endif
    
  <!--Header-->
  <div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
    <div class="breadcrumb-title pe-3">Data Attempt</div>
    <div class="ps-3 ms-auto">
      <nav aria-label="breadcrumb">
        <ol class="breadcrumb mb-0 p-0">
          <li class="breadcrumb-item"><a href="/admin"><i class="bx bx-home-alt"></i> Dashboard</a>
          </li>
          <li class="breadcrumb-item active" aria-current="page"><i class="bi bi-box-arrow-right"></i> Data Attempt</li>
          <li class="breadcrumb-item active" aria-current="page">Penyisihan</li>
        </ol>
      </nav>
    </div>
  </div>
  <!--end of Header-->

  <h6 class="mb-0 text-uppercase">Data Attempt Penyisihan</h6>
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
              <th>Token</th>
              <th>Session</th>
              <th>Attempt at</th>
              <th>Aksi</th>
            </tr>
          </thead>
          <tbody>
            @foreach ($attempts as $attempt)
            <tr>
              <td class="text-center align-middle">{{ $loop->iteration }}</td>
              <td class="text-center align-middle">{{ $attempt->team_number }}</td>
              <td class="align-middle">{{ $attempt->name }}</td>
              <td class="align-middle">{{ $attempt->token }}</td>
              <td class="align-middle">{{ $attempt->session }}</td>
              <td class="align-middle">{{ $attempt->attempt_at }}</td>
              <td>
                <div class="table-actions d-flex align-items-center gap-3 fs-6">
                  <form action="/superadmin/deleteQuiz/{{ $attempt->session }}" method="POST">
                    @csrf
                    @method('DELETE')
                    <button type="submit" id="deletingData" class="text-danger btn p-0" data-bs-toggle="tooltip" data-bs-placement="bottom" title="Hapus Data"><i class="bi bi-trash-fill"></i></button>
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
              <th>Token</th>
              <th>Session</th>
              <th>Attempt at</th>
              <th>Aksi</th>
            </tr>
          </tfoot>
        </table>
      </div>
    </div>
  </div>
  
@endsection