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
          <li class="breadcrumb-item"><a href="/admin/penyisihan"><i class="bx bx-home-alt"></i> Daftar Soal Penyisihan</a>
          </li>
          <li class="breadcrumb-item active" aria-current="page">Soal Penyisihan</li>
        </ol>
      </nav>
    </div>
  </div>
  <!--end of Header-->

  <div class="row">
    {{-- Soal Penyisihan --}}
    <div class="col-xl-9 order-2 order-xl-1">
      <h6 class="mb-0 text-uppercase">Soal Penyisihan</h6>
      <hr>
      <div class="card">
        <div class="card-body">
          <div class="border p-3 rounded">
            <div class="d-flex justify-content-between align-items-center">
              <div>
                <h6 class="mb-0 text-uppercase">
                  Soal Penyisihan No : {{ $question->number }}
                </h6>
                <span class="d-block text-small">Kategori : {{ $question->category }}</span>
              </div>
              <span>Skor : <strong>{{ $question->score }}</strong></span>
            </div>
            <hr/>
            <div class="d-flex">
              <div class="me-2">{{ $question->number }}.</div>
              <div>
                {!! $question->question !!}
              </div>
            </div>
            <hr/>
            <div class="d-flex">
              <div class="me-2">A.</div>
                {!! $question->answer_a !!}
            </div>
            <div class="d-flex">
              <div class="me-2">B.</div>
                {!! $question->answer_b !!}
            </div>
            <div class="d-flex">
              <div class="me-2">C.</div>
                {!! $question->answer_c !!}
            </div>
            <div class="d-flex">
              <div class="me-2">D.</div>
                {!! $question->answer_d !!}
            </div>
            <div class="d-flex">
              <div class="me-2">E.</div>
                {!! $question->answer_e !!}
            </div>
            <hr/>
            Jawaban Benar : <strong>{{ $question->true_answer }}</strong>
          </div>
        </div>
        <div class="card-footer text-end">
          <form action="/admin/penyisihan/{{ $question->number }}" method="POST">
            @csrf
            @method('DELETE')
            <a href="/admin/penyisihan/{{ $question->number }}/edit" class="btn btn-primary">Edit Soal</a>
            <button type="submit" class="btn btn-danger">Hapus Soal</button>
          </form>
        </div>
      </div>
    </div>
  </div>
  
@endsection