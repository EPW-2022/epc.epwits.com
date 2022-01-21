@extends('penyisihan.layouts.main')

@section('content')

@if (session()->has('message'))
    <div id="flash-data" data-flashdata="{{ session('message') }}"></div>
  @endif

<div class="container-fluid">
  <div class="row">
    <nav id="sidebarMenu" class="col-md-3 col-lg-2 d-md-block sidebar collapse">
      <div class="position-sticky pt-3">
        <h1 class="text-center h4 mt-4">Quiz Navigation</h1>
        <div class="d-flex justify-content-center my-2" id="getTimer" data-timer="{{ $timer->date }} {{ $timer->time }}">
          <span id="hour" class="h5 mx-1">00</span>
          <span class="h5 mx-1">:</span>
          <span id="min" class="h5 mx-1">00</span>
          <span class="h5 mx-1">:</span>
          <span id="sec" class="h5 mx-1">00</span>
        </div>
        <ul class="nav px-2 justify-content-center">
          @foreach ($questions as $question)
            @if ($answer[$question->number] == TRUE)
            <li class="nav-item">
              <a class="nav-link text-center btn {{ Request::segment(3) == $question->number ? 'btn-warning active' : 'btn-success' }} mx-1 my-2 px-0 quiz-number {{ $flagged[$question->number] == TRUE ? 'flagged' : '' }}" aria-current="page" href="/quarter/{{ session()->get('getSession') }}/{{ $question->number }}">
                <span data-feather="home"></span>
                {{ $question->number }}
              </a>
            </li>
            @elseif ($answer[$question->number] == FALSE || $answer[$question->number] == NULL)
            <li class="nav-item">
              <a class="nav-link text-center btn {{ Request::segment(3) == $question->number ? 'btn-warning active' : 'btn-outline-success' }} mx-1 my-2 px-0 quiz-number {{ $flagged[$question->number] == TRUE ? 'flagged' : '' }}" aria-current="page" href="/quarter/{{ session()->get('getSession') }}/{{ $question->number }}">
                <span data-feather="home"></span>
                {{ $question->number }}
              </a>
            </li>
            @endif
          @endforeach
        </ul>

        <div class="text-center mt-4">
          @if ($flagged[$quiz->number] == TRUE)
          <form action="/removeflagged/{{ $quiz->number }}" class="flagged-form d-inline" method="POST">
            @csrf
            <button type="submit" class="remove-flagged-button d-inline-block btn btn-outline-success"><i class="bi bi-flag-fill"></i> Hapus tanda</button>
          </form>
          @else
          <form action="/addflagged/{{ $quiz->number }}" class="flagged-form d-inline" method="POST">
            @csrf
            <button type="submit" class="add-flagged-button d-inline-block btn btn-outline-success"><i class="bi bi-flag-fill"></i> Tandai soal</button>
          </form>
          @endif
          <a href="/quarter/{{ session()->get('getSession') }}/submission" class="btn btn-warning">Selesai</a>
        </div>
      </div>
    </nav>

    <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
      
      <div class="container-fluid question mt-4">
        <div class="d-flex">
          <span class="d-inline-block me-2">{{ $quiz->number }}.</span>
          <div>
            {!! $quiz->question !!}
          </div>
        </div>
        @if ($answered)
        <div class="d-flex align-items-center">
          <a href="/files/perempat/{{ $answered->answer_file }}" class="btn text-success p-0 d-inline-block me-3">Lihat Jawaban</a>
          <form action="/deleteAnswer/{{ $answered->answer_file }}/{{ $quiz->number }}" method="post">
            @method('DELETE')
            @csrf
            <button type="submit" class="btn p-0 text-danger" onclick="return confirm('Jawaban ingin dihapus?')">Hapus Jawaban</button>
          </form>
        </div>
        @endif
        <form action="/uploadAnswer/{{ $quiz->number }}" class="answer-form mt-3" method="POST" enctype="multipart/form-data">
          @csrf
          <div class="input-group">
            <input class="form-control @error('answer') is-invalid @enderror" type="file" name="answer" id="answer" accept=".pdf,.jpg,.jpeg,.png">
            <button class="btn btn-success" type="submit" id="inputGroupFileAddon04">Upload</button>
          </div>
          @error('answer')
          <div class="text-danger">
            {{ $message }}
          </div>
          @enderror
        </form>
      </div>
      <div class="mt-3">
        @if ($quiz->number - 1 > 0)
          <a href="/quarter/{{ session()->get('getSession') }}/{{ $quiz->number - 1 }}" class="btn btn-warning mx-2">Sebelumnya</a>
        @endif
        @if ($quiz->number + 1 <= $question->number)
          <a href="/quarter/{{ session()->get('getSession') }}/{{ $quiz->number + 1  }}" class="btn btn-success mx-2">Lanjut</a>
        @endif
        <a href="/quarter/{{ session()->get('getSession') }}/submission" class="btn btn-danger mx-2">Selesai</a>
      </div>

    </main>
  </div>
</div>

@endsection