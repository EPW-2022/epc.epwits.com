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
          <li class="breadcrumb-item active" aria-current="page">Semifinal Question Reset</li>
        </ol>
      </nav>
    </div>
  </div>
  <!--end of Header-->

  <h6 class="mb-0 text-uppercase">Semifinal Question Reset</h6>
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
              <th>Status</th>
              <th>Assigned</th>
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
              <td class="text-center align-middle">
                @if ($question->availabled)
                  <span class="text-danger"><em>On progress</em></span>
                @else
                  <span class="text-success"><em>Available</em></span>
                @endif
              </td>
              <td class="text-center align-middle">
                @if ($question->user_id != NULL)
                  <span class="text-warning">{{ $question->user->name }}</span>
                @else
                  <span class="text-success"><em>Not Assigned</em></span>
                @endif
              </td>
              <td class="align-middle">
                <div class="table-actions d-flex justify-content-center align-items-center gap-3 fs-6">
                  @if ($question->availabled)
                  <form action="/superadmin/semifinal/{{ $question->number }}" method="post">
                    @csrf
                    @method('PUT')
                    <button type="submit" class="btn btn-sm text-danger mx-2">Reset</button>
                  </form>
                  @endif
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
              <th>Status</th>
              <th>Assigned</th>
              <th>Aksi</th>
            </tr>
          </tfoot>
        </table>
      </div>
    </div>
  </div>
  
@endsection