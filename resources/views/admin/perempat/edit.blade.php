@extends('admin.layouts.main')

@section('container')
  <!--Header-->
  <div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
    <div class="breadcrumb-title pe-3">Perempat Final</div>
    <div class="ps-3 ms-auto">
      <nav aria-label="breadcrumb">
        <ol class="breadcrumb mb-0 p-0">
          <li class="breadcrumb-item"><a href="/admin"><i class="bx bx-home-alt"></i> Dashboard</a></li>
          <li class="breadcrumb-item"><a href="/admin/perempat"><i class="bx bx-home-alt"></i> Daftar Soal Perempat Final</a></li>
          <li class="breadcrumb-item"><a href="/admin/perempat/{{ $tryout->number }}"><i class="bx bx-home-alt"></i> Soal No {{ $tryout->number }}</a></li>
          <li class="breadcrumb-item active" aria-current="page">Edit Soal</li>
        </ol>
      </nav>
    </div>
  </div>
  <!--end of Header-->

  <form action="/admin/perempat/{{ $tryout->number }}" method="POST" enctype="multipart/form-data">
    @csrf
    @method('PUT')
    <div class="row">
      <div class="col-xl-9 order-2 order-xl-1">
        
        {{-- Konfigurasi Soal --}}
        <h6 class="mb-0 text-uppercase">Konfigurasi Soal</h6>
        <hr>
        <div class="card">
          <div class="card-body">
            <div class="border p-3 rounded">
              <div class="row">
                <div class="col-md-6 mb-3">
                  <label class="form-label">Nomor Soal</label>
                  <input type="number" name="number" class="form-control" min="1" value="{{ old('number', $tryout->number) }}">
                  @error('number')
                    <p class="text-danger mb-1">{{ $message }}</p>
                  @enderror
                </div>
                <div class="col-md-6 mb-3">
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
              </div>
            </div>
          </div>
        </div>

        {{-- Soal Perempat Final --}}
        <h6 class="mb-0 text-uppercase">Soal Perempat Final</h6>
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
    </div>
  </form>
  
@endsection