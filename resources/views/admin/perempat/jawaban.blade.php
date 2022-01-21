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
          <li class="breadcrumb-item active" aria-current="page">Jawaban Peserta</li>
        </ol>
      </nav>
    </div>
  </div>
  <!--end of Header-->

  <h6 class="mb-0 text-uppercase">Daftar Jawaban Peserta</h6>
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
              <th>Nomor</th>
              <th>File Jawaban</th>
              <th>Skor</th>
              <th>Status</th>
            </tr>
          </thead>
          <tbody>
            @foreach ($answers as $answer)
            <tr>
              <td class="text-center align-middle">{{ $loop->iteration }}</td>
              <td class="text-center align-middle">
                <a href="/admin/tim/{{ $answer->team_number }}">
                  {{ $answer->team_number }}
                </a>
              </td>
              <td class="align-middle">{{ $answer->name }}</td>
              <td class="align-middle text-center">{{ $answer->number }}</td>
              <td class="align-middle text-wrap">
                <a href="/files/perempat/{{ $answer->answer_file }}" target="_blank">
                  {{ $answer->answer_file }}
                </a>
              </td>
              <td class="align-middle text-nowrap">
                @if ($answer->user->quarter_attempt->attempt_at && empty($answer->user->quarter_attempt->finished_at))
                  <span class="text-center d-block">-</span>
                @elseif ($answer->user->quarter_attempt->attempt_at && $answer->user->quarter_attempt->finished_at)
                  <form action="/admin/perempat/submitScore/{{ $answer->id }}" method="post">
                    @csrf
                    <div class="input-group input-group-sm" style="min-width: 150px">
                      <input type="number" class="form-control" name="score" min="0" value="{{ $answer->score }}">
                      <button class="btn btn-success submitScore" type="submit" id="button-addon2"><i class="bi bi-check"></i></button>
                    </div>
                  </form>
                @endif 
              </td>
              <td class="align-middle">
                @if ($answer->user->quarter_attempt->attempt_at && empty($answer->user->quarter_attempt->finished_at))
                  <span class="text-warning">Sedang Mengerjakan</span>
                @elseif ($answer->user->quarter_attempt->attempt_at && $answer->user->quarter_attempt->finished_at)
                  <span class="text-success"><i class="bi bi-check-circle"></i> Sudah selesai</span>
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
              <th>Nomor</th>
              <th>File Jawaban</th>
              <th>Skor</th>
              <th>Status</th>
            </tr>
          </tfoot>
        </table>
      </div>
    </div>
  </div>
  
@endsection