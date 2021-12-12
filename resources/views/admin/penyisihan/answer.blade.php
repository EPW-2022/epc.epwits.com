@extends('admin.layouts.main')

@section('container')
  <!--Header-->
  <div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
    <div class="breadcrumb-title pe-3">Penyisihan</div>
    <div class="ps-3 ms-auto">
      <nav aria-label="breadcrumb">
        <ol class="breadcrumb mb-0 p-0">
          <li class="breadcrumb-item"><a href="/admin"><i class="bx bx-home-alt"></i> Dashboard</a>
          </li>
          <li class="breadcrumb-item"><a href="/admin/penyisihan/ranking"><i class="bx bx-home-alt"></i> Ranking Peserta</a>
          </li>
          <li class="breadcrumb-item active" aria-current="page">Jawaban Peserta {{ $team->team_number }}</li>
        </ol>
      </nav>
    </div>
  </div>
  <!--end of Header-->

  <h6 class="mb-0 text-uppercase">Jawaban Peserta {{ $team->team_number }}</h6>
  <hr>

  <div class="row">
    {{-- Jawaban Peserta --}}
    <div class="col-12 col-lg-9">
      <div class="card shadow-sm border-0">
        <div class="card-body">
          <h5 class="mb-2">Data Jawaban {{ $team->team_number }} : {{ $team->name }}</h5>
          <div class="mb-0 d-flex justify-content-between flex-md-row flex-column">
            <div class="pb-2">
              Selesai pada : <span class="fw-bold">{{ $team->user->quiz_answer->submitted_at }}</span>
            </div>
            <div class="text-success text-end"><i class="bi bi-patch-check"></i> Telah diselesaikan</div>
          </div>
          <hr>
          <table id="example2" class="table table-striped table-bordered py-3">
            <thead>
              <tr>
                <th>No</th>
                <th>Soal</th>
                <th>Skor</th>
                <th>Benar</th>
                <th>Jawaban</th>
                <th>Hasil</th>
              </tr>
            </thead>
            <tbody>
              @php
                  $answer = explode(';', $answers->answer_array);
              @endphp
              @foreach ($tryouts as $tryout)
              <tr>
                <td class="text-center align-middle">{{ $tryout->number }}</td>
                <td class="align-middle">
                  <a href="/admin/penyisihan/{{ $tryout->number }}">
                    {!! $tryout->question !!}
                  </a>
                </td>
                <td class="text-center align-middle">{{ $tryout->score }}</td>
                <td class="align-middle text-center">{{ $tryout->true_answer }}</td>
                <td class="align-middle text-center">{{ $answer[$loop->index] }}</td>
                <td class="align-middle text-center">
                  @if ($answer[$loop->index] == $tryout->true_answer)
                  <span class="text-success"><i class="bi bi-patch-check"></i> Benar</span>
                  @else
                  <span class="text-danger"><i class="bi bi-x-circle"></i> Salah</span>
                  @endif
                </td>
              </tr>
              @endforeach
            </tbody>
            <tfoot>
              <tr>
                <th>No</th>
                <th>Soal</th>
                <th>Skor</th>
                <th>Benar</th>
                <th>Jawaban</th>
                <th>Hasil</th>
              </tr>
            </tfoot>
          </table>
        </div>
      </div>
    </div>
    
    <div class="col-12 col-lg-3">
      <div class="card shadow-sm border-0 overflow-hidden">
        <div class="card-body">
          <h6 class="mb-0 text-uppercase">Hasil Quiz</h6>
          <hr>
          <div class="text-center mt-4">
            <h4 class="mb-1">{{ $team->name }}</h4>
            <p class="mb-0 text-secondary"><span class="fw-bold">{{ $team->team_number }}</span></p>
            <p class="mb-0 text-secondary">{{ $team->school }}</p>
            <div class="mt-4"></div>
          </div>
          <div class="row my-2">
            <div class="col-6 pe-0 d-flex justify-content-between">
              <span class="fw-bold">Start Attempt</span>
              <span>:</span>
            </div>
            <div class="col-6 ps-2">
              <span>{{ $team->user->quiz_attempt->attempt_at }}</span>
            </div>
          </div>
          <div class="row my-2">
            <div class="col-6 pe-0 d-flex justify-content-between">
              <span class="fw-bold">Finish Attempt</span>
              <span>:</span>
            </div>
            <div class="col-6 ps-2">
              <span>{{ $team->user->quiz_answer->submitted_at }}</span>
            </div>
          </div>
          <div class="row my-2">
            <div class="col-6 pe-0 d-flex justify-content-between">
              <span class="fw-bold">Status</span>
              <span>:</span>
            </div>
            <div class="col-6 ps-2">
              <span class="text-success"><i class="bi bi-patch-check"></i> Telah diselesaikan</span>
            </div>
          </div>
          <div class="row my-2">
            <div class="col-6 pe-0 d-flex justify-content-between">
              <span class="fw-bold">Benar</span>
              <span>:</span>
            </div>
            <div class="col-6 ps-2">
              <span>{{ $team->user->quiz_answer->true }}</span>
            </div>
          </div>
          <div class="row my-2">
            <div class="col-6 pe-0 d-flex justify-content-between">
              <span class="fw-bold">Salah</span>
              <span>:</span>
            </div>
            <div class="col-6 ps-2">
              <span>{{ $team->user->quiz_answer->false }}</span>
            </div>
          </div>
          <div class="row my-2">
            <div class="col-6 pe-0 d-flex justify-content-between">
              <span class="fw-bold">Total Skor</span>
              <span>:</span>
            </div>
            <div class="col-6 ps-2">
              <span>{{ $team->user->quiz_answer->score }}</span>
            </div>
          </div>

        </div>
      </div>
    </div>
  </div>
  
@endsection