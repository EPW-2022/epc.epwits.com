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
              @if ($ranks == NULL)
                <span class="d-block score-value">-</span>
              @else
              @foreach ($ranks as $rank)
                @if ($rank->user_id == auth()->user()->id)
                  <span class="d-block score-value">{{ $loop->iteration }}</span>
                @endif
              @endforeach
              @endif
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
          <li class="my-2">Pada babak semifinal peserta akan disajikan soal dari lima bidang minat Teknik Fisika ITS, masing masing akan terbagi menjadi tiga tingkatan, yaitu 5 soal easy, 5 soal medium, dan 5 soal advance.</li>
          <li class="my-2">Waktu total pengerjaan soal pada babak semifinal adalah 120 menit.</li>
          <li class="my-2">
            Sistem penilaian pada babak semifinal yaitu sebagai berikut.
            <ul>
              <li class="my-2">Tipe soal Easy, jika menjawab dengan benar akan mendapatkan +100, dan jika jawaban salah tidak mendapat poin (+0).</li>
              <li class="my-2">Tipe soal Medium, jika menjawab dengan benar akan mendapatkan +200, dan jika jawaban salah tidak mendapat poin (+0).</li>
              <li class="my-2">Tipe soal Advance, jika menjawab dengan benar akan mendapat +300, dan jika jawaban salah tidak mendapatkan poin (+0).</li>
            </ul>
          </li>
          <li class="my-2">Peserta memilih soal dengan bantuan pendamping breakout room.</li>
          <li class="my-2">Soal akan muncul di layar pendamping.</li>
          <li class="my-2">Peserta dipersilakan mengerjakan dan mengumpulkan pada kolom yang tersedia (refresh jika belum muncul).</li>
          <li class="my-2">Jika sudah mengumpulkan, segera menginformasikan pada pendamping.</li>
          <li class="my-2">Apabila terdapat kendala dapat menghubungi pendamping breakout room.</li>
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
          <button disabled class="announcement-button mx-auto mt-3">Attempted</button>
        @else
          <button type="button" data-bs-toggle="modal" data-bs-target="#attemptQuiz" class="announcement-button mx-auto mt-3">Attempt</button>
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
