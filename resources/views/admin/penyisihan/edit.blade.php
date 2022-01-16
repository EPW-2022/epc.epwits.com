@extends('admin.layouts.main')

@section('container')
  <!--Header-->
  <div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
    <div class="breadcrumb-title pe-3">Penyisihan</div>
    <div class="ps-3 ms-auto">
      <nav aria-label="breadcrumb">
        <ol class="breadcrumb mb-0 p-0">
          <li class="breadcrumb-item"><a href="/admin"><i class="bx bx-home-alt"></i> Dashboard</a></li>
          <li class="breadcrumb-item"><a href="/admin/penyisihan"><i class="bx bx-home-alt"></i> Daftar Soal Penyisihan</a></li>
          <li class="breadcrumb-item"><a href="/admin/penyisihan/{{ $tryout->number }}"><i class="bx bx-home-alt"></i> Soal No {{ $tryout->number }}</a></li>
          <li class="breadcrumb-item active" aria-current="page">Edit Soal Soal</li>
        </ol>
      </nav>
    </div>
  </div>
  <!--end of Header-->

  <form action="/admin/penyisihan/{{ $tryout->number }}" method="POST" enctype="multipart/form-data">
      @csrf
      @method('PUT')
    <div class="row">
      {{-- Soal Penyisihan --}}
      <div class="col-xl-9 order-2 order-xl-1">
        <h6 class="mb-0 text-uppercase">Edit Soal Penyisihan No {{ $tryout->number }}</h6>
        <hr>
        <div class="card">
          <div class="card-body">
            <div class="border p-3 rounded">
              <h6 class="mb-0 text-uppercase">Soal Pertanyaan</h6>
              <hr/>
              @error('question')
                <p class="text-danger mb-1">{{ $message }}</p>
              @enderror
              <textarea id="soalPenyisihan" name="question">{{ old('question', $tryout->question) }}</textarea>

              {{-- Pilihan A --}}
              <h6 class="mb-0 text-uppercase">Pilihan A</h6>
              <hr/>
              @error('answer_a')
                <p class="text-danger mb-1">{{ $message }}</p>
              @enderror
              <textarea id="pilAPenyisihan" name="answer_a">{{ old('answer_a', $tryout->answer_a) }}</textarea>

              {{-- Pilihan B --}}
              <h6 class="mb-0 text-uppercase">Pilihan B</h6>
              <hr/>
              @error('answer_b')
                <p class="text-danger mb-1">{{ $message }}</p>
              @enderror
              <textarea id="pilBPenyisihan" name="answer_b">{{ old('answer_b', $tryout->answer_b) }}</textarea>

              {{-- Pilihan C --}}
              <h6 class="mb-0 text-uppercase">Pilihan C</h6>
              <hr/>
              @error('answer_c')
                <p class="text-danger mb-1">{{ $message }}</p>
              @enderror
              <textarea id="pilCPenyisihan" name="answer_c">{{ old('answer_c', $tryout->answer_c) }}</textarea>

              {{-- Pilihan D --}}
              <h6 class="mb-0 text-uppercase">Pilihan D</h6>
              <hr/>
              @error('answer_d')
                <p class="text-danger mb-1">{{ $message }}</p>
              @enderror
              <textarea id="pilDPenyisihan" name="answer_d">{{ old('answer_d', $tryout->answer_d) }}</textarea>

              {{-- Pilihan E --}}
              <h6 class="mb-0 text-uppercase">Pilihan E</h6>
              <hr/>
              @error('answer_e')
                <p class="text-danger mb-1">{{ $message }}</p>
              @enderror
              <textarea id="pilEPenyisihan" name="answer_e">{{ old('answer_e', $tryout->answer_e) }}</textarea>
            </div>
          </div>
        </div>
      </div>
      {{-- Konfigurasi Soal --}}
      <div class="col-xl-3 order-1 order-xl-2">
        <h6 class="mb-0 text-uppercase">Konfigurasi Soal</h6>
        <hr>
        <div class="card">
          <div class="card-body">
            <div class="border p-3 rounded">
              <div class="row">
                <div class="col-xl-12 col-md-6 mb-3">
                  <label class="form-label">Nomor Soal</label>
                  <input type="number" name="number" class="form-control" min="1" value="{{ old('number', $tryout->number) }}">
                  @error('number')
                    <p class="text-danger mb-1">{{ $message }}</p>
                  @enderror
                </div>
                <div class="col-xl-12 col-md-6 mb-3">
                  <label class="form-label">Skor Soal</label>
                  <input type="number" name="score" class="form-control" min="1" value="{{ old('score', $tryout->score) }}">
                  @error('score')
                    <p class="text-danger mb-1">{{ $message }}</p>
                  @enderror
                </div>
                <div class="col-xl-12 col-md-6 mb-3">
                  <label class="form-label">Kategori</label>
                  <select class="form-select" name="category">
                    <option value="Easy" {{ $tryout->category == 'Easy' ? 'selected' : '' }}>Easy</option>
                    <option value="Medium" {{ $tryout->category == 'Medium' ? 'selected' : '' }}>Medium</option>
                    <option value="Advanced" {{ $tryout->category == 'Advanced' ? 'selected' : '' }}>Advanced</option>
                  </select>
                  @error('category')
                    <p class="text-danger mb-1">{{ $message }}</p>
                  @enderror
                </div>
                <div class="col-xl-12 col-md-6 mb-3">
                  <label class="form-label">Jawaban Benar</label>
                  <select class="form-select" name="true_answer">
                    <option value="A" {{ $tryout->true_answer == 'A' ? 'selected' : '' }}>A</option>
                    <option value="B" {{ $tryout->true_answer == 'B' ? 'selected' : '' }}>B</option>
                    <option value="C" {{ $tryout->true_answer == 'C' ? 'selected' : '' }}>C</option>
                    <option value="D" {{ $tryout->true_answer == 'D' ? 'selected' : '' }}>D</option>
                    <option value="E" {{ $tryout->true_answer == 'E' ? 'selected' : '' }}>E</option>
                  </select>
                  @error('true_answer')
                    <p class="text-danger mb-1">{{ $message }}</p>
                  @enderror
                </div>
              </div>
            </div>
          </div>
          <div class="card-footer text-end">
            <button type="submit" class="btn btn-primary">Buat Soal!</button>
          </div>
        </div>
      </div>
    </div>
  </form>
  
@endsection