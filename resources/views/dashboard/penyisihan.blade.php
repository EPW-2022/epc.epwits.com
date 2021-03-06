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
              <span class="d-block score-name">Penyisihan</span>
              <span class="d-block score-value">22 Januari 2021</span>
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

      {{-- Penyisihan --}}
      <h2 class="announcement-title"><span class="d-none d-sm-inline">-</span> Penyisihan EPC 2022 <span class="d-none d-sm-inline">-</span></h2>
      <div class="announcement-desc px-4 px-md-5">
        <ol class="announcement-list my-3">
          <li class="mb-2">Peserta diwajibkan memiliki koneksi internet yang stabil untuk kelancaran pengerjaan.</li>
          <li class="mb-2">Peserta disarankan menggunakan laptop.</li>
          <li class="mb-2">Skor yang didapat:<br>Benar   : +2 hingga +4 (tergantung tingkat kesulitan)<br>Salah    : 0<br>Kosong : 0</li>
          <li class="mb-2">Peserta akan disajikan sejumlah 75 soal pilihan ganda (65 soal Fisika SMA dan 10 soal bidang minat di Teknik Fisika)</li>
          <li class="mb-2">Waktu pengerjaannya adalah 150 menit.</li>
          <li class="mb-2">Peserta dihimbau agar mencatat jawaban secara manual untuk menghindari error system.</li>
        </ol>
        <div class="d-flex justify-content-center my-2">
          <div class="d-flex justify-content-between" style="width: 50px">
            <p>Start</p>
            <p>:</p>
          </div>
          <p class="ms-2">08.30</p>
        </div>
        <div class="d-flex justify-content-center my-2">
          <div class="d-flex justify-content-between" style="width: 50px">
            <p>End</p>
            <p>:</p>
          </div>
          <p class="ms-2">11.00</p>
        </div>
        @if ($result)
          <button disabled class="announcement-button mx-auto mt-3">Attempted</button>
        @else
          <button type="button" data-bs-toggle="modal" data-bs-target="#attemptQuiz" class="announcement-button mx-auto mt-3">Attempt</button>
        @endif
      </div>
      {{-- End of Penyisihan --}}

    </section>
    {{-- End of Announcement --}}
  </div>
</article>

<!-- Modal -->
<div class="modal fade" id="attemptQuiz" tabindex="-1" aria-labelledby="attemptQuizLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="attemptQuizLabel">Attempt Quiz</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <form action="/getSession/{{ auth()->user()->team->team_number }}" method="POST">
        @csrf
        <div class="modal-body">
          <p class="mb-3">Masukkan Kode Token untuk mengikuti Quiz!</p>
          <div class="form-floating mb-3">
            <input type="text" class="form-control" id="token" name="token" value="{{ old('token') }}" placeholder="name@example.com">
            <label for="token">Token Quiz</label>
          </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
          <button type="submit" class="btn btn-danger">Attempt Now</button>
        </div>
      </form>
    </div>
  </div>
</div>

@endsection