@extends('admin.layouts.main')

@section('container')

  @if (session()->has('message'))
    <div id="flash-data" data-flashdata="{{ session('message') }}"></div>
  @endif

  <!--Header-->
  <div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
    <div class="breadcrumb-title pe-3">Pengaturan Quiz</div>
    <div class="ps-3 ms-auto">
      <nav aria-label="breadcrumb">
        <ol class="breadcrumb mb-0 p-0">
          <li class="breadcrumb-item"><a href="/admin"><i class="bx bx-home-alt"></i> Dashboard</a>
          </li>
          <li class="breadcrumb-item active" aria-current="page">Pengaturan Quiz</li>
        </ol>
      </nav>
    </div>
  </div>
  <!--end of Header-->
  <div class="row">
    <div class="col-lg-9">
      {{-- Pengaturan Token --}}
      <h6 class="mb-0 text-uppercase">Pengaturan Token Quiz</h6>
      <hr/>
      <div class="card">
        <div class="card-body">
          <div class="p-4 border rounded">
            <form action="/admin/setup/token/{{ $token->id }}" method="POST">
              @csrf
              @method('PUT')
              <div class="row">
                <div class="col-md-4">
                  <label for="datePicker" class="form-label">Tanggal Aktif</label>
                  <input type="text" id="datePickerToken" name="date" value="{{ $token ? $token->date : '' }}" class="form-control @error('date') is-invalid @enderror" />
                  @error('date')
                    <p class="text-danger mb-1">{{ $message }}</p>
                  @enderror
                </div>
                <div class="col-md-4">
                  <label for="timePicker" class="form-label">Jam Aktif</label>
                  <input type="text" id="timePickerToken" name="time" value="{{ $token ? $token->time : '' }}" class="form-control @error('time') is-invalid @enderror" />
                  @error('time')
                    <p class="text-danger mb-1">{{ $message }}</p>
                  @enderror
                </div>
                <div class="col-md-4">
                  <label for="token" class="form-label">Token Aktif</label>
                  <input class="form-control" id="token" name="token" value="{{ $token ? $token->token : '' }}" type="text" placeholder="Belum ada token aktif" readonly="" value="">
                </div>
              </div>
              <div class="text-end">
                <button type="submit" class="btn btn-primary mt-3">Buat Token!</button>
              </div>
            </form>
          </div>
        </div>
      </div>
      {{-- Daftar Token --}}
      <h6 class="mb-0 text-uppercase">Pengaturan Timer Quiz</h6>
      <hr/>
      <div class="card">
        <div class="card-body">
          <div class="p-4 border rounded">
            <form action="/admin/setup/timer/{{ $timer->id }}" method="POST">
              @csrf
              @method('PUT')
              <div class="row">
                <div class="col-md-4">
                  <label for="timePickerTimer" class="form-label">Tanggal Pengerjaan</label>
                  <input type="text" id="datePickerTimer" name="date" value="{{ $timer ? $timer->date : '' }}" class="form-control @error('date') is-invalid @enderror" />
                  @error('date')
                  <p class="text-danger mb-1">{{ $message }}</p>
                  @enderror
                </div>
                <div class="col-md-4">
                  <label for="timePickerTimer" class="form-label">Lama Pengerjaan</label>
                  <div class="input-group mb-3">
                    <input type="number" name="time" min="0" value="{{ $timer ? $timer->time : '' }}" class="form-control @error('time') is-invalid @enderror" />
                    <span class="input-group-text" id="basic-addon2">menit</span>
                  </div>
                  @error('time')
                    <p class="text-danger mb-1">{{ $message }}</p>
                  @enderror
                </div>
              </div>
              <div class="text-end">
                <button type="submit" class="btn btn-primary mt-3">Atur Timer!</button>
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>

  
@endsection