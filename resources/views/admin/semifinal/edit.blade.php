@extends('admin.layouts.main')

@section('container')
  <!--Header-->
  <div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
    <div class="breadcrumb-title pe-3">Semifinal</div>
    <div class="ps-3 ms-auto">
      <nav aria-label="breadcrumb">
        <ol class="breadcrumb mb-0 p-0">
          <li class="breadcrumb-item"><a href="/admin"><i class="bx bx-home-alt"></i> Dashboard</a></li>
          <li class="breadcrumb-item"><a href="/admin/semifinal"><i class="bx bx-home-alt"></i> Daftar Soal Semifinal</a></li>
          <li class="breadcrumb-item"><a href="/admin/semifinal/{{ $tryout->number }}"><i class="bx bx-home-alt"></i> Soal No {{ $tryout->number }}</a></li>
          <li class="breadcrumb-item active" aria-current="page">Edit Soal</li>
        </ol>
      </nav>
    </div>
  </div>
  <!--end of Header-->

  <form action="/admin/semifinal/{{ $tryout->number }}" method="POST" enctype="multipart/form-data">
    @csrf
    @method('PUT')
    <div class="row">
      <div class="col-xl-8 order-2 order-xl-1">
        {{-- Soal Semifinal --}}
        <h6 class="mb-0 text-uppercase">Soal Semifinal</h6>
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
            </div>
          </div>
          <div class="card-footer text-end">
            <button type="submit" class="btn btn-primary">Ubah Soal!</button>
          </div>
        </div>
      </div>

      <div class="col-xl-4 order-1 order-xl-2">
        {{-- Konfigurasi Soal --}}
        <h6 class="mb-0 text-uppercase">Konfigurasi Soal</h6>
        <hr>
        <div class="card">
          <div class="card-body">
            <div class="border p-3 rounded">
              <div class="mb-3 row">
                <label for="number" class="col-sm-6 fw-bold col-form-label py-0">Nomor Soal</label>
                <div class="col-sm-6">
                  <input type="text" readonly class="form-control-plaintext py-0" id="number" value="{{ $tryout->number }}">
                </div>
              </div>
              <div class="mb-3 row">
                <label for="laboratory" class="col-sm-6 fw-bold col-form-label py-0">Laboratorium</label>
                <div class="col-sm-6">
                  <input type="text" readonly class="form-control-plaintext py-0" id="laboratory" value="{{ $tryout->laboratory }}">
                </div>
              </div>
              <div class="mb-3 row">
                <label for="category" class="col-sm-6 fw-bold col-form-label py-0">Kategori</label>
                <div class="col-sm-6">
                  <input type="text" readonly class="form-control-plaintext py-0" id="category" value="{{ $tryout->category }}">
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </form>
  
@endsection