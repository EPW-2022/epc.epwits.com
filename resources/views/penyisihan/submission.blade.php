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
          <a href="/endQuiz/{{ session()->get('getSession') }}" class="endSession btn btn-warning">Akhiri Quiz</a>
        </div>
      </div>
    </nav>

    <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
      
      <div class="container-fluid question mt-4">
        <div class="table-responsive col-lg-11 mx-auto">
          <h1 class="h3">Review Jawaban</h1>
          <table class="table table-hover text-center">
            <thead>
              <tr>
                <th scope="col" class="px-4">No</th>
                <th scope="col" class="px-4">Jawaban</th>
                <th scope="col" class="px-4">Ditandai</th>
              </tr>
            </thead>
            <tbody>
              @foreach ($questions as $question)
              <tr>
                <th scope="row">{{ $loop->iteration }}</th>
                <td>{{ $answer[$loop->iteration] ?? '-' }}</td>
                <td>{{ $flagged[$loop->iteration] ? 'Ditandai' : 'Tidak ditandai' }}</td>
              </tr>
              @endforeach
            </tbody>
          </table>
          <div class="text-center mt-4">
            <a href="/endQuiz/{{ session()->get('getSession') }}" class="endSession btn btn-warning">Akhiri Quiz</a>
          </div>
        </div>
      </div>
    </main>
  </div>
</div>

@endsection