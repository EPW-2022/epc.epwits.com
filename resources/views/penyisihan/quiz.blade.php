@extends('penyisihan.layouts.main')

@section('content')

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
            @if ($answer[$question->number] != NULL)
            <li class="nav-item">
              <a class="nav-link text-center btn {{ Request::segment(3) == $question->number ? 'btn-warning active' : 'btn-success' }} mx-1 my-2 px-0 quiz-number {{ $flagged[$question->number] == TRUE ? 'flagged' : '' }}" aria-current="page" href="/quiz/{{ session()->get('getSession') }}/{{ $question->number }}">
                <span data-feather="home"></span>
                {{ $question->number }}
              </a>
            </li>
            @else
            <li class="nav-item">
              <a class="nav-link text-center btn {{ Request::segment(3) == $question->number ? 'btn-warning active' : 'btn-outline-success' }} mx-1 my-2 px-0 quiz-number {{ $flagged[$question->number] == TRUE ? 'flagged' : '' }}" aria-current="page" href="/quiz/{{ session()->get('getSession') }}/{{ $question->number }}">
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
          <a href="/quiz/{{ session()->get('getSession') }}/submission" class="btn btn-warning">Selesai</a>
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
        <form action="/saveAnswer/{{ $quiz->number }}" class="answer-form" method="POST">
          @csrf
          <div class="form-check">
            <input class="form-check-input" type="radio" name="answer" value="A" id="answer_a" {{ $answer[$quiz->number] == 'A' ? 'checked' : '' }}>
            <label class="form-check-label d-flex" for="answer_a">
              <span class="d-block me-3 question-choice">A.</span>
              <div>
                {!! $quiz->answer_a !!}
              </div>
            </label>
          </div>
          <div class="form-check">
            <input class="form-check-input" type="radio" name="answer" value="B" id="answer_b" {{ $answer[$quiz->number] == 'B' ? 'checked' : '' }}>
            <label class="form-check-label d-flex" for="answer_b">
              <span class="d-block me-3 question-choice">B.</span>
              <div>
                {!! $quiz->answer_b !!}
              </div>
            </label>
          </div>
          <div class="form-check">
            <input class="form-check-input" type="radio" name="answer" value="C" id="answer_c" {{ $answer[$quiz->number] == 'C' ? 'checked' : '' }}>
            <label class="form-check-label d-flex" for="answer_c">
              <span class="d-block me-3 question-choice">C.</span>
              <div>
                {!! $quiz->answer_c !!}
              </div>
            </label>
          </div>
          <div class="form-check">
            <input class="form-check-input" type="radio" name="answer" value="D" id="answer_d" {{ $answer[$quiz->number] == 'D' ? 'checked' : '' }}>
            <label class="form-check-label d-flex" for="answer_d">
              <span class="d-block me-3 question-choice">D.</span>
              <div>
                {!! $quiz->answer_d !!}
              </div>
            </label>
          </div>
          <div class="form-check">
            <input class="form-check-input" type="radio" name="answer" value="E" id="answer_e" {{ $answer[$quiz->number] == 'E' ? 'checked' : '' }}>
            <label class="form-check-label d-flex" for="answer_e">
              <span class="d-block me-3 question-choice">E.</span>
              <div>
                {!! $quiz->answer_e !!}
              </div>
            </label>
          </div>
        </form>
        @if ($answer[$quiz->number])
          <form action="/removeAnswer/{{ $quiz->number }}" class="remove-form" method="POST">
            @csrf
            <button type="submit" id="removeAnswer" class="btn btn-sm btn-warning mt-4">Hapus jawaban</button>
          </form>
        @endif
      </div>
      <div class="mt-3 mb-5">
        @if ($quiz->number - 1 > 0)
          <a href="/quiz/{{ session()->get('getSession') }}/{{ $quiz->number - 1 }}" class="btn btn-warning mx-2">Sebelumnya</a>
        @endif
        @if ($quiz->number + 1 <= $question->number)
          <a href="/quiz/{{ session()->get('getSession') }}/{{ $quiz->number + 1  }}" class="btn btn-success mx-2">Lanjut</a>
        @endif
        <a href="/quiz/{{ session()->get('getSession') }}/submission" class="btn btn-danger mx-2">Selesai</a>
      </div>

    </main>
  </div>
</div>

@endsection