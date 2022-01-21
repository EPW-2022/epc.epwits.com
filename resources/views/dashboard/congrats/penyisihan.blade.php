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
              <span class="d-block score-name">Perempat Final</span>
              <span class="d-block score-value">5 Februari 2021</span>
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
              <span class="d-block score-value">{{ $result->score }}</span>
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
              <span class="d-block score-value">{{ $result->id }}</span>
            </div>
          </div>
        </div>
      </div>
    </section>
    {{-- End of Score --}}

    {{-- Congratulation (Penyisihan) --}}
    <section id="congrats" class="d-flex flex-column align-items-center justify-content-center">
      <div class="container-fluid congratulation px-4">
        <div class="text-center mt-4">
          <img src="/img/penyisihan-selamat.png" alt="" class="congrats-image">  
          <h2 class="congrats-text mt-3 mb-5">
            Anda dinyatakan <strong>LULUS</strong> babak Penyisihan EPC EPW 2022.<br>
            Silahkan melanjutkan ke tahap Perempat Final.
          </h2>
        </div>
      </div>      
    </section>
    {{-- End of Congratulation (Penyisihan) --}}
  </div>
</article>

@endsection