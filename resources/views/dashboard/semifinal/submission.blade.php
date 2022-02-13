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
      {{-- <a href="/profile" class="profile-card text-center mx-auto mt-3">Edit Akun</a> --}}
    </section>
    {{-- End of Profile --}}

    {{-- Score --}}
    <section id="score" class="mx-auto">
      <div class="row mt-3 justify-content-center">
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
              <span class="d-block score-value">{{ $score }}</span>
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
              @foreach ($ranks as $rank)
                @if ($rank->user_id == auth()->user()->id)
                  <span class="d-block score-value">{{ $loop->iteration }}</span>
                @endif
              @endforeach
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
      <div class="announcement-desc w-100">
        @if ($question && $question->open_submission == 1)
        <form action="/answerSubmit" method="post" enctype="multipart/form-data">
          @csrf
          <div class="row justify-content-center mt-4">
            <div class="col-md-6">
              <div class="mb-3">
                <label for="number" class="form-label">Nomer Soal</label>
                <input type="number" class="form-control @error('number') is-invalid @enderror" id="number" name="number" min="1" max="75" value="{{ $question->number }}">
                @error('number')
                <div class="invalid-feedback">
                  {{ $message }}
                </div>
                @enderror
              </div>
              <div class="mb-3">
                <label for="answer" class="form-label">Jawaban</label>
                <input class="form-control @error('answer') is-invalid @enderror" type="file" id="answer" name="answer" accept=".pdf,.jpg,.jpeg,.png">
                @error('answer')
                <div class="invalid-feedback">
                  {{ $message }}
                </div>
                @enderror
              </div>
            </div>
          </div>
          <button type="submit" class="announcement-button mx-auto mt-3" id="answerSubmission">Submit</button>
        </form>
        @else
          <p class="text-center my-3">
            Pilihan soal sudah ditampilkan oleh panitia.<br>
            Yuk pilih soal dulu sebelum mengumpulkan jawabanmu!
          </p>
        @endif
      </div>
      {{-- End of Semifinal --}}

    </section>
    {{-- End of Announcement --}}
  </div>
</article>

@endsection
