@extends('admin.layouts.main')

@section('container')

  @if (session()->has('message'))
    <div id="flash-data" data-flashdata="{{ session('message') }}"></div>
  @endif

  <!--Header-->
  <div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
    <div class="breadcrumb-title pe-3">Penyisihan</div>
    <div class="ps-3 ms-auto">
      <nav aria-label="breadcrumb">
        <ol class="breadcrumb mb-0 p-0">
          <li class="breadcrumb-item"><a href="/admin"><i class="bx bx-home-alt"></i> Dashboard</a>
          </li>
          <li class="breadcrumb-item active" aria-current="page">Pengaturan Token</li>
        </ol>
      </nav>
    </div>
  </div>
  <!--end of Header-->
  <div class="row">
    <div class="col-lg-9">
      {{-- Pengaturan Token --}}
      <h6 class="mb-0 text-uppercase">Pengaturan Token Penyisihan</h6>
      <hr/>
      <div class="card">
        <div class="card-body">
          <div class="p-4 border rounded">
            <form action="/admin/penyisihan/token" method="POST">
              @csrf
              <div class="row">
                <div class="col-md-4">
                  <label for="datePicker" class="form-label">Tanggal Aktif</label>
                  <input type="text" id="datePicker" name="date" value="{{ $token ? $token->date : '' }}" class="form-control @error('date') is-invalid @enderror" />
                  @error('date')
                    <p class="text-danger mb-1">{{ $message }}</p>
                  @enderror
                </div>
                <div class="col-md-4">
                  <label for="timePicker" class="form-label">Jam Aktif</label>
                  <input type="text" id="timePicker" name="time" value="{{ $token ? $token->time : '' }}" class="form-control @error('time') is-invalid @enderror" />
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
      <h6 class="mb-0 text-uppercase">Daftar Token Penyisihan</h6>
      <hr/>
      <div class="card">
        <div class="card-body">
          <div class="p-4 border rounded">
            <div class="table-responsive">
              <table id="example2" class="table table-striped table-bordered py-3">
                <thead>
                  <tr>
                    <th>No</th>
                    <th>Kadaluarsa</th>
                    <th>Akses</th>
                    <th>Token</th>
                    <th>Aksi</th>
                  </tr>
                </thead>
                <tbody>
                  @foreach ($tokens as $token)
                  <tr>
                    <td class="text-center align-middle">{{ $loop->iteration }}</td>
                    <td class="text-center align-middle">{{ $token->date }} {{ $token->time }}</td>
                    <td class="text-center align-middle">{{ $token->access ?? '0' }}</td>
                    <td class="text-center align-middle">{{ $token->token }}</td>
                    <td class="align-middle w-auto">
                      <div class="table-actions d-flex align-items-center gap-3 fs-6">
                        <form action="/admin/penyisihan/token/delete_token/{{ $token->id }}" method="POST">
                          @csrf
                          @method('DELETE')
                          <button type="submit" id="deletingData" class="text-danger mx-2 btn p-0" data-bs-toggle="tooltip" data-bs-placement="bottom" title="Hapus Soal"><i class="bi bi-trash-fill"></i></button>
                        </form>
                      </div>
                    </td>
                  </tr>
                  @endforeach
                </tbody>
                <tfoot>
                  <tr>
                    <th>No</th>
                    <th>Kadaluarsa</th>
                    <th>Akses</th>
                    <th>Token</th>
                    <th>Aksi</th>
                  </tr>
                </tfoot>
              </table>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>

  
@endsection