@extends('admin.layouts.main')

@section('container')
    
  <!--Header-->
  <div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
    <div class="breadcrumb-title pe-3">Data Tim : <span class="fw-bold">{{ $team->team_number }}</span></div>
    <div class="ps-3 ms-auto">
      <nav aria-label="breadcrumb">
        <ol class="breadcrumb mb-0 p-0">
          <li class="breadcrumb-item"><a href="/admin"><i class="bx bx-home-alt"></i> Dashboard</a>
          </li>
          <li class="breadcrumb-item"><a href="/superadmin/trashed">Data Dihapus</a>
          </li>
          <li class="breadcrumb-item active" aria-current="page">{{ $team->team_number }}</li>
        </ol>
      </nav>
    </div>
  </div>
  <!--end of Header-->

  <div class="row">
    <div class="col-12 col-lg-8">
      <div class="card shadow-sm border-0">
        <div class="card-body">
          <h5 class="mb-2">Data Tim {{ $team->team_number }} : {{ $team->name }}</h5>
          <div class="mb-0 d-flex justify-content-between flex-md-row flex-column">
            <div class="pb-2">
              Dihapus pada : <span class="fw-bold">{{ $team->user->deleted_at }}</span>
            </div>
            @if ($team->user->verified_at)
              <div class="text-success text-end"><i class="bi bi-patch-check"></i> Telah diverifikasi</div>
            @else
              <div class="text-danger text-end">Belum diverifikasi</div>
            @endif
          </div>
          <hr>

          <div class="row">
            {{-- Informasi Tim --}}
            <div class="col-xl-6">
              <div class="card border">
                <div class="card-header">
                  <h6 class="mb-0">Informasi Tim</h6>
                </div>
                <div class="card-body">
                  <div class="row mb-2">
                    <div class="col-md-6 d-flex justify-content-between">
                      <span>Nomor Tim</span>
                      <span class="d-none d-md-block">:</span>
                    </div>
                    <div class="col-md-6 fw-bold">
                      {{ $team->team_number }}
                    </div>
                  </div>
                  <div class="row mb-2">
                    <div class="col-md-6 d-flex justify-content-between">
                      <span>Nama Tim</span>
                      <span class="d-none d-md-block">:</span>
                    </div>
                    <div class="col-md-6 fw-bold">
                      {{ $team->name }}
                    </div>
                  </div>
                  <div class="row mb-2">
                    <div class="col-md-6 d-flex justify-content-between">
                      <span>Asal Sekolah</span>
                      <span class="d-none d-md-block">:</span>
                    </div>
                    <div class="col-md-6 fw-bold">
                      {{ $team->school }}
                    </div>
                  </div>
                  <div class="row mb-2">
                    <div class="col-md-6 d-flex justify-content-between">
                      <span>Kota</span>
                      <span class="d-none d-md-block">:</span>
                    </div>
                    <div class="col-md-6 fw-bold">
                      {{ $team->city }}
                    </div>
                  </div>
                  <div class="row mb-2">
                    <div class="col-md-6 d-flex justify-content-between">
                      <span>Pembayaran</span>
                      <span class="d-none d-md-block">:</span>
                    </div>
                    <div class="col-md-6 fw-bold">
                      <span class="fw-normal">a.n.</span> {{ $team->user->file->payment_name }}
                      <a href="/trash/payment/{{ $team->user->file->payment_slip }}" target="_blank" class="d-block">Lihat Bukti Bayar!</a>
                    </div>
                  </div>
                </div>
              </div>
            </div>

            {{-- Informasi Tim --}}
            <div class="col-xl-6">
              <div class="card border">
                <div class="card-header">
                  <h6 class="mb-0">Informasi Akun</h6>
                </div>
                <div class="card-body">
                  <div class="row mb-2">
                    <div class="col-md-6 d-flex justify-content-between">
                      <span>Username</span>
                      <span class="d-none d-md-block">:</span>
                    </div>
                    <div class="col-md-6 fw-bold">
                      {{ $team->user->username }}
                    </div>
                  </div>
                  <div class="row mb-2">
                    <div class="col-md-6 d-flex justify-content-between">
                      <span>Email</span>
                      <span class="d-none d-md-block">:</span>
                    </div>
                    <div class="col-md-6 fw-bold">
                      {{ $team->user->email }}
                    </div>
                  </div>
                  <div class="row mb-2">
                    <div class="col-md-6 d-flex justify-content-between">
                      <span>Password</span>
                      <span class="d-none d-md-block">:</span>
                    </div>
                    <div class="col-md-6 fw-bold">
                      <form action="/admin/tim/resetpass/{{ $team->user->id }}" method="POST">
                        @csrf
                        <button type="submit" id="resetpass" class="btn-sm border-0 bg-transparent p-0 m-0 text-danger">Reset Password!</button>
                      </form>
                    </div>
                  </div>
                  <div class="row mb-2">
                    <div class="col-md-6 d-flex justify-content-between">
                      <span>Terdaftar</span>
                      <span class="d-none d-md-block">:</span>
                    </div>
                    <div class="col-md-6 fw-bold">
                      {{ $team->user->created_at }}
                    </div>
                  </div>
                  <div class="row mb-2">
                    <div class="col-md-6 d-flex justify-content-between">
                      <span>Terverifikasi</span>
                      <span class="d-none d-md-block">:</span>
                    </div>
                    <div class="col-md-6 fw-bold">
                      {{ $team->user->verified_at ?? 'Belum diverifikasi' }}
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
          
          {{-- Informasi Ketua --}}
          <div class="card border">
            <div class="card-header">
              <h6 class="mb-0">Data Ketua</h6>
            </div>
            <div class="card-body">
              <div class="row mb-2">
                <div class="col-md-4 col-sm-5 d-flex justify-content-between">
                  <span>Nama Ketua</span>
                  <span class="d-none d-sm-block">:</span>
                </div>
                <div class="col-md-8 col-sm-7 fw-bold">
                  {{ $team->user->leader->fullname }}
                </div>
              </div>
              <div class="row mb-2">
                <div class="col-md-4 col-sm-5 d-flex justify-content-between">
                  <span>NISN</span>
                  <span class="d-none d-sm-block">:</span>
                </div>
                <div class="col-md-8 col-sm-7 fw-bold">
                  {{ $team->user->leader->student_number }}
                </div>
              </div>
              <div class="row mb-2">
                <div class="col-md-4 col-sm-5 d-flex justify-content-between">
                  <span>Tempat, Tanggal Lahir</span>
                  <span class="d-none d-sm-block">:</span>
                </div>
                <div class="col-md-8 col-sm-7 fw-bold">
                  {{ $team->user->leader->place_birth }}, {{ $team->user->leader->date_birth }}
                </div>
              </div>
              <div class="row mb-2">
                <div class="col-md-4 col-sm-5 d-flex justify-content-between">
                  <span>No. HP</span>
                  <span class="d-none d-sm-block">:</span>
                </div>
                <div class="col-md-8 col-sm-7 fw-bold">
                  {{ $team->user->leader->phone }}
                </div>
              </div>
              <div class="row mb-2">
                <div class="col-md-4 col-sm-5 d-flex justify-content-between">
                  <span>Email</span>
                  <span class="d-none d-sm-block">:</span>
                </div>
                <div class="col-md-8 col-sm-7 fw-bold">
                  {{ $team->user->leader->email }}
                </div>
              </div>
              <div class="row mb-2">
                <div class="col-md-4 col-sm-5 d-flex justify-content-between">
                  <span>Alamat Rumah</span>
                  <span class="d-none d-sm-block">:</span>
                </div>
                <div class="col-md-8 col-sm-7 fw-bold">
                  {{ $team->user->leader->address }}
                </div>
              </div>
            </div>
          </div>

          @if ($team->user->member->fullname)
            {{-- Informasi Anggota --}}
            <div class="card border">
              <div class="card-header">
                <h6 class="mb-0">Data Anggota</h6>
              </div>
              <div class="card-body">
                <div class="row mb-2">
                  <div class="col-md-4 col-sm-5 d-flex justify-content-between">
                    <span>Nama Anggota</span>
                    <span class="d-none d-sm-block">:</span>
                  </div>
                  <div class="col-md-8 col-sm-7 fw-bold">
                    {{ $team->user->member->fullname }}
                  </div>
                </div>
                <div class="row mb-2">
                  <div class="col-md-4 col-sm-5 d-flex justify-content-between">
                    <span>NISN</span>
                    <span class="d-none d-sm-block">:</span>
                  </div>
                  <div class="col-md-8 col-sm-7 fw-bold">
                    {{ $team->user->member->student_number }}
                  </div>
                </div>
                <div class="row mb-2">
                  <div class="col-md-4 col-sm-5 d-flex justify-content-between">
                    <span>Tempat, Tanggal Lahir</span>
                    <span class="d-none d-sm-block">:</span>
                  </div>
                  <div class="col-md-8 col-sm-7 fw-bold">
                    {{ $team->user->member->place_birth }}, {{ $team->user->member->date_birth }}
                  </div>
                </div>
              </div>
            </div>
          @endif

          <div class="text-end">
            <form action="/superadmin/destroy/{{ $team->user->id }}" method="POST" class="d-inline">
              @csrf
              <button type="submit" id="deletingData" class="btn btn-outline-danger">Hapus Permanen</button>
            </form>
            <form action="/superadmin/restore/{{ $team->user->id }}" method="POST" class="d-inline">
              @csrf
              <button type="submit" id="restoringData" class="btn btn-success">Kembalikan Data!</button>
            </form>
          </div>
        </div>
      </div>
    </div>
    <div class="col-12 col-lg-4">
      @php
          $photos = explode(';', $team->user->file->person_photo);
          $scans = explode(';', $team->user->file->person_scan);
      @endphp
      @foreach ($photos as $photo)
        @if ($loop->index === 0)
          <div class="card shadow-sm border-0 overflow-hidden">
            <div class="card-body">
              <div class="profile-avatar text-center">
                <a href="/trash/photos/{{ $photo }}" target="_blank" data-bs-toggle="tooltip" data-bs-placement="bottom" title="Klik untuk lihat foto">
                  <img src="/trash/photos/{{ $photo }}" class="shadow" height="120" alt="">
                </a>
              </div>
              <div class="text-center mt-4">
                <h4 class="mb-1">{{ $team->user->leader->fullname }}</h4>
                <p class="mb-0 text-secondary">Ketua <span class="fw-bolder">{{ $team->name }}</span></p>
                <p class="mb-0 text-secondary">{{ $team->school }}</p>
                <div class="mt-4"></div>
                <a href="/trash/scan/{{ $scans[$loop->index] }}" target="_blank" class="mb-0 text-secondary d-block">Lihat Kartu Pelajar</a>
                @if ($team->user->file->leader_twibbon)
                  <a href="{{ $team->user->file->leader_twibbon }}" target="_blank" class="mb-0 text-secondary d-block">Lihat Twibbon</a>
                @endif
              </div>
            </div>
          </div>
        @else
          <div class="card shadow-sm border-0 overflow-hidden">
            <div class="card-body">
              <div class="profile-avatar text-center">
                <a href="/trash/photos/{{ $photo }}" target="_blank" data-bs-toggle="tooltip" data-bs-placement="bottom" title="Klik untuk lihat foto">
                  <img src="/trash/photos/{{ $photo }}" class="shadow" height="120" alt="">
                </a>
              </div>
              <div class="text-center mt-4">
                <h4 class="mb-1">{{ $team->user->member->fullname }}</h4>
                <p class="mb-0 text-secondary">Anggota <span class="fw-bolder">{{ $team->name }}</span></p>
                <p class="mb-0 text-secondary">{{ $team->school }}</p>
                <div class="mt-4"></div>
                <a href="/trash/scan/{{ $scans[$loop->index] }}" target="_blank" class="mb-0 text-secondary d-block">Lihat Kartu Pelajar</a>
                @if ($team->user->file->member_twibbon)
                  <a href="{{ $team->user->file->member_twibbon }}" target="_blank" class="mb-0 text-secondary d-block">Lihat Twibbon</a>
                @endif
              </div>
            </div>
          </div>
        @endif
      @endforeach
    </div>
  </div><!--end row-->
  
@endsection