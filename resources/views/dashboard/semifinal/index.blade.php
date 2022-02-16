@extends('layouts.main')

@section('content')

@if (session()->has('message'))
  <div id="flash-data" data-flashdata="{{ session('message') }}"></div>
@endif
  
@error('token')
  <div id="flash-data" data-flashdata="No Token"></div>
@enderror
    
<article id="dashboard">
  <div class="container">
    {{-- Profile --}}
    <section id="profile" class="text-center">
      <img src="/img/avatar.svg" alt="" class="profile-avatar">
      <h1 class="profile-name">{{ auth()->user()->name }}</h1>
      <h2 class="profile-school">{{ auth()->user()->team->school }}</h2>
      <h2 class="profile-team">Tim {{ auth()->user()->team->team_number }}</h2>
      <a href="/profile" class="profile-card text-center mx-auto mt-3">Edit Akun</a>
    </section>
    {{-- End of Profile --}}

    {{-- Score --}}
    <section id="score" class="mx-auto">
      <div class="row mt-5 justify-content-center">
        <div class="mb-3 col-lg-4 col-md-6">
          <div class="score-box d-flex align-items-center">
            <div class="score-icon d-flex justify-content-center align-items-center">
              <img src="/img/calendar.svg" alt="">
            </div>
            <div class="score-content">
              <span class="d-block score-name">Semifinal</span>
              <span class="d-block score-value">19 Februari 2021</span>
            </div>
          </div>
        </div>
        <div class="mb-3 col-lg-4 col-md-6">
          <div class="score-box d-flex align-items-center">
            <div class="score-icon d-flex justify-content-center align-items-center">
              <img src="/img/medal.svg" alt="">
            </div>
            <div class="score-content">
              <span class="d-block score-name">Skor</span>
              <span class="d-block score-value">{{ $result ? 'Processing...' : '-' }}</span>
            </div>
          </div>
        </div>
        <div class="mb-3 col-lg-4 col-md-6">
          <div class="score-box d-flex align-items-center">
            <div class="score-icon d-flex justify-content-center align-items-center">
              <img src="/img/ranking.svg" alt="">
            </div>
            <div class="score-content">
              <span class="d-block score-name">Ranking</span>
              <span class="d-block score-value">{{ $result ? 'Processing...' : '-' }}</span>
            </div>
          </div>
        </div>
      </div>
    </section>
    {{-- End of Score --}}

    {{-- Announcement --}}
    <section id="announcement" class="d-flex flex-column align-items-center justify-content-center">

      {{-- COMING SOON --}}
      {{-- <h3 class="announcement-coming">Coming Soon</h3>
      <h2 class="announcement-title">[Tutorial Penyisihan]</h2> --}}
      {{-- END OF COMING SOON --}}

      {{-- Semifinal --}}
      <h2 class="announcement-title"><span class="d-none d-sm-inline">-</span> Semifinal EPC 2022 <span class="d-none d-sm-inline">-</span></h2>
      <div class="announcement-desc px-4 px-md-5">
        <ol class="announcement-list my-3">
          <li>Peserta diwajibkan memiliki koneksi internet yang stabil untuk kelancaran pengerjaan.</li>
          <li>Peserta disarankan menggunakan laptop.</li>
          <li>Peserta akan disajikan sejumlah 15 soal essay.</li>
          <li>Waktu pengerjaannya adalah 180 menit.</li>
          <li>Untuk upload jawaban, jawaban di-scan kemudian diwajibkan mengganti nama file menjadi (Nomor Soal_Nama Tim). Ukuran file tidak lebih dari 1 MB.</li>
          <li>Kertas yang digunakan adalah kertas HVS berwarna putih.</li>
          <li>
            Pada lembar jawaban tulis di kanan atas kertas:
            <ul>
              <li>Nomor Soal</li>
              <li>Nama Tim</li>
              <li>Nama Sekolah</li>
              <li>TTD Ketua Tim</li>
            </ul>
          </li>
        </ol>
        <div class="d-flex justify-content-center my-2">
          <div class="d-flex justify-content-between" style="width: 50px">
            <p>Start</p>
            <p>:</p>
          </div>
          <p class="ms-2">09.00</p>
        </div>
        <div class="d-flex justify-content-center my-2">
          <div class="d-flex justify-content-between" style="width: 50px">
            <p>End</p>
            <p>:</p>
          </div>
          <p class="ms-2">11.00</p>
        </div>
        @if ($result)
          <button disabled class="announcement-button mx-auto mt-3">Attended</button>
        @else
          <button type="button" data-bs-toggle="modal" data-bs-target="#attemptQuiz" class="announcement-button mx-auto mt-3">Attend</button>
        @endif
      </div>
      {{-- End of Semifinal --}}

    </section>
    {{-- End of Announcement --}}
  </div>
</article>

<!-- Modal -->
<div class="modal fade" id="attemptQuiz" tabindex="-1" aria-labelledby="attemptQuizLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="attemptQuizLabel">Attend Semifinal</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <form action="/semifinalAttend/{{ auth()->user()->team->team_number }}" method="POST">
        @csrf
        <div class="modal-body">
          <p class="mb-3">Masukkan Kode Token untuk menghadiri Semifinal!</p>
          <div class="form-floating mb-3">
            <input type="text" class="form-control" id="token" name="token" value="{{ old('token') }}" placeholder="name@example.com">
            <label for="token">Token Semifinal</label>
          </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
          <button type="submit" class="btn btn-danger">Attend Now</button>
        </div>
      </form>
    </div>
  </div>
</div>

@endsection
