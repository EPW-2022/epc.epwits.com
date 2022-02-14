@extends('layouts.main')

@section('content')

@if (session()->has('message'))
  <div id="flash-data" data-flashdata="{{ session('message') }}"></div>
@endif
    
<article id="dashboard" class="pt-5">
  <div class="container py-4">
    {{-- Announcement --}}
    <section id="platform">
      <h1 class="platform-title mx-auto">Status Soal</h1>
      <div class="platform-status mx-auto">
        <span class="my-2 status-available">Tersedia</span>
        <span class="my-2 status-notavailable">Sedang Dikerjakan</span>
      </div>
      <div class="platform-questions table-responsive mt-4">
        <table class="table">
          <thead>
            <tr>
              <th class="text-start">Kategori</th>
              <th class="text-center">Easy</th>
              <th class="text-center">Medium</th>
              <th class="text-center">Hard</th>
            </tr>
          </thead>
          <tbody>
            <tr>
              <td>Energi</td>
              <td>
                <div class="d-flex justify-content-center">
                  @foreach ($questions as $key => $question)
                  @if ($question->laboratory == 'Energi' && $question->category == 'Easy')
                  <button type="button" id="question{{ $question->number }}" class="d-block question-number {{ $question->availabled ? 'active' : '' }} mx-1" data-question="{{ $question->number }}">{{ $question->number }}</button>
                  @endif
                  @endforeach
                </div>
              </td>
              <td>
                <div class="d-flex justify-content-center">
                  @foreach ($questions as $key => $question)
                  @if ($question->laboratory == 'Energi' && $question->category == 'Medium')
                  <button type="button" id="question{{ $question->number }}" class="d-block question-number {{ $question->availabled ? 'active' : '' }} mx-1" data-question="{{ $question->number }}">{{ $question->number }}</button>
                  @endif
                  @endforeach
                </div>
              </td>
              <td>
                <div class="d-flex justify-content-center">
                  @foreach ($questions as $key => $question)
                  @if ($question->laboratory == 'Energi' && $question->category == 'Hard')
                  <button type="button" id="question{{ $question->number }}" class="d-block question-number {{ $question->availabled ? 'active' : '' }} mx-1" data-question="{{ $question->number }}">{{ $question->number }}</button>
                  @endif
                  @endforeach
                </div>
              </td>
            </tr>
            <tr>
              <td>Fotonika</td>
              <td>
                <div class="d-flex justify-content-center">
                  @foreach ($questions as $key => $question)
                  @if ($question->laboratory == 'Fotonika' && $question->category == 'Easy')
                  <button type="button" id="question{{ $question->number }}" class="d-block question-number {{ $question->availabled ? 'active' : '' }} mx-1" data-question="{{ $question->number }}">{{ $question->number }}</button>
                  @endif
                  @endforeach
                </div>
              </td>
              <td>
                <div class="d-flex justify-content-center">
                  @foreach ($questions as $key => $question)
                  @if ($question->laboratory == 'Fotonika' && $question->category == 'Medium')
                  <button type="button" id="question{{ $question->number }}" class="d-block question-number {{ $question->availabled ? 'active' : '' }} mx-1" data-question="{{ $question->number }}">{{ $question->number }}</button>
                  @endif
                  @endforeach
                </div>
              </td>
              <td>
                <div class="d-flex justify-content-center">
                  @foreach ($questions as $key => $question)
                  @if ($question->laboratory == 'Fotonika' && $question->category == 'Hard')
                  <button type="button" id="question{{ $question->number }}" class="d-block question-number {{ $question->availabled ? 'active' : '' }} mx-1" data-question="{{ $question->number }}">{{ $question->number }}</button>
                  @endif
                  @endforeach
                </div>
              </td>
            </tr>
            <tr>
              <td>Vibrastik</td>
              <td>
                <div class="d-flex justify-content-center">
                  @foreach ($questions as $key => $question)
                  @if ($question->laboratory == 'Vibrastik' && $question->category == 'Easy')
                  <button type="button" id="question{{ $question->number }}" class="d-block question-number {{ $question->availabled ? 'active' : '' }} mx-1" data-question="{{ $question->number }}">{{ $question->number }}</button>
                  @endif
                  @endforeach
                </div>
              </td>
              <td>
                <div class="d-flex justify-content-center">
                  @foreach ($questions as $key => $question)
                  @if ($question->laboratory == 'Vibrastik' && $question->category == 'Medium')
                  <button type="button" id="question{{ $question->number }}" class="d-block question-number {{ $question->availabled ? 'active' : '' }} mx-1" data-question="{{ $question->number }}">{{ $question->number }}</button>
                  @endif
                  @endforeach
                </div>
              </td>
              <td>
                <div class="d-flex justify-content-center">
                  @foreach ($questions as $key => $question)
                  @if ($question->laboratory == 'Vibrastik' && $question->category == 'Hard')
                  <button type="button" id="question{{ $question->number }}" class="d-block question-number {{ $question->availabled ? 'active' : '' }} mx-1" data-question="{{ $question->number }}">{{ $question->number }}</button>
                  @endif
                  @endforeach
                </div>
              </td>
            </tr>
            <tr>
              <td>Instrumentasi</td>
              <td>
                <div class="d-flex justify-content-center">
                  @foreach ($questions as $key => $question)
                  @if ($question->laboratory == 'Instrumentasi' && $question->category == 'Easy')
                  <button type="button" id="question{{ $question->number }}" class="d-block question-number {{ $question->availabled ? 'active' : '' }} mx-1" data-question="{{ $question->number }}">{{ $question->number }}</button>
                  @endif
                  @endforeach
                </div>
              </td>
              <td>
                <div class="d-flex justify-content-center">
                  @foreach ($questions as $key => $question)
                  @if ($question->laboratory == 'Instrumentasi' && $question->category == 'Medium')
                  <button type="button" id="question{{ $question->number }}" class="d-block question-number {{ $question->availabled ? 'active' : '' }} mx-1" data-question="{{ $question->number }}">{{ $question->number }}</button>
                  @endif
                  @endforeach
                </div>
              </td>
              <td>
                <div class="d-flex justify-content-center">
                  @foreach ($questions as $key => $question)
                  @if ($question->laboratory == 'Instrumentasi' && $question->category == 'Hard')
                  <button type="button" id="question{{ $question->number }}" class="d-block question-number {{ $question->availabled ? 'active' : '' }} mx-1" data-question="{{ $question->number }}">{{ $question->number }}</button>
                  @endif
                  @endforeach
                </div>
              </td>
            </tr>
            <tr>
              <td>Bahan</td>
              <td>
                <div class="d-flex justify-content-center">
                  @foreach ($questions as $key => $question)
                  @if ($question->laboratory == 'Bahan' && $question->category == 'Easy')
                  <button type="button" id="question{{ $question->number }}" class="d-block question-number {{ $question->availabled ? 'active' : '' }} mx-1" data-question="{{ $question->number }}">{{ $question->number }}</button>
                  @endif
                  @endforeach
                </div>
              </td>
              <td>
                <div class="d-flex justify-content-center">
                  @foreach ($questions as $key => $question)
                  @if ($question->laboratory == 'Bahan' && $question->category == 'Medium')
                  <button type="button" id="question{{ $question->number }}" class="d-block question-number {{ $question->availabled ? 'active' : '' }} mx-1" data-question="{{ $question->number }}">{{ $question->number }}</button>
                  @endif
                  @endforeach
                </div>
              </td>
              <td>
                <div class="d-flex justify-content-center">
                  @foreach ($questions as $key => $question)
                  @if ($question->laboratory == 'Bahan' && $question->category == 'Hard')
                  <button type="button" id="question{{ $question->number }}" class="d-block question-number {{ $question->availabled ? 'active' : '' }} mx-1" data-question="{{ $question->number }}">{{ $question->number }}</button>
                  @endif
                  @endforeach
                </div>
              </td>
            </tr>
          </tbody>
        </table>
      </div>
      <h1 class="platform-title mx-auto">Leaderboard</h1>
      <div class="leaderboard-container mx-auto mt-4">
        <div class="row">
          @foreach ($users as $user)
          <div class="col-sm-6 my-2">
            <div class="d-flex leaderboard-item {{ $loop->iteration <= 5 ? 'active' : '' }} justify-content-between align-items-center">
              <span class="d-block flex-grow-0 text-center mx-auto" style="width: 45px">{{ $loop->iteration }}</span>
              <span class="d-block flex-grow-1">{{ $user->name }}</span>
              <span class="d-block flex-grow-0 h-100 text-end" style="width: 75px">{{ $user->score }}</span>
            </div>
          </div>
          @endforeach
        </div>
      </div>
    </section>
    {{-- End of Announcement --}}
  </div>
</article>

<!-- Modal -->
<div class="modal fade" id="questionModal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="questionModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-xl modal-dialog-centered modal-dialog-scrollable">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="questionModalLabel">Processing..</h5>
      </div>
      <div class="modal-body">
        <div class="question-body">
          Processing..
        </div>
        <div class="row">
          <div class="col-lg-6">
            <div id="assignForm">
              <div class="input-group my-3">
                <label class="input-group-text" for="questionAssign">Assign for</label>
                <select class="form-select" id="questionAssign">
                  <option selected disabled>--Choose Team--</option>
                  @foreach ($users as $user)
                  <option value="{{ $user->user_id }}">{{ $user->name }}</option>
                  @endforeach
                </select>
                <button class="btn btn-secondary" type="button" id="assignButton" data-number="">Assign</button>
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="modal-footer">
        {{-- <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button> --}}
        <button type="button" class="btn btn-primary" id="submitButton" data-number="" data-user="">Selesai</button>
      </div>
    </div>
  </div>
</div>

@endsection

@section('platform')
  <script>
    $(function () {
      $('.question-number').on('click', function (e) {
        $(this).addClass('active');
        var number = $(this).attr('data-question');
        var actionForm = $('.modal-form').attr('action')
        $.ajax({
          type: "GET",
          url: window.location.origin + '/admin/semifinal/requestQuestion/' + number,
          dataType: 'JSON',
          success: function (data) {
            if (data == 'Question not available') {
              Swal.fire({
                icon: 'error',
                title: 'Soal sedang dikerjakan!',
                text: 'Silakan pilih soal lainnya!',
                confirmButtonColor: '#424a63',
                allowOutsideClick: false
              })
            } else {
              $('#questionModalLabel').html(data.laboratory + ' ' + data.category + ' No. ' + data.number);
              $('.question-body').html(data.question);
              $('#assignButton').attr('data-number', data.number);
              $('#submitButton').attr('data-number', data.number);
              var questionModal = new bootstrap.Modal(document.getElementById('questionModal'));
              questionModal.show()
            }
          }
        });
        // }
      });
    });

    $(function() {
      $('#assignButton').on('click', function() {
        var value = $('#questionAssign').val();
        var _token = $('meta[name=csrf-token]').attr('content');
        var number = $(this).attr('data-number');
        $.ajax({
          url: window.location.origin + '/admin/semifinal/questionAssign/' + number,
          type: 'POST',
          dataType: 'json',
          data: {
            _token: _token,
            user: value,
            number: number
          },
          success: function (data) {
            $('#submitButton').attr('data-user', data.id);
            $('#assignForm').css('display', 'none');
            Swal.fire({
              icon: 'success',
              title: 'Soal telah diberikan!',
              text: 'Jangan lupa dikerjain yaa! Semangat, ' + data.name + '!',
              confirmButtonColor: '#424a63',
            })
          }, 
          error: function (data) {
            console.log(data)
          }
        });
      })
    })

    $(function() {
      $('#submitButton').on('click', function () {
        var number = $(this).attr('data-number');
        var user = $(this).attr('data-user');
        $.ajax({
          url: window.location.origin + '/admin/semifinal/questionFinished/' + number,
          type: 'GET',
          data: {
            user_id: user
          },
          dataType: 'json',
          success: function (data) {
            Swal.fire({
              icon: 'success',
              title: 'Soal selesai dikerjakan!',
              text: 'Ayo lanjut mengerjakan soal yang lainnya!',
              confirmButtonColor: '#424a63',
            }).then((result) => {
              if (result.isConfirmed) {
                window.location.reload();
              }
            })
          }, 
          error: function (data) {
            console.log(data)
          }
        });
      });
    });

    var updatePlatform = function () {
      $.ajax({
        url: window.location.origin + '/admin/semifinal/dataPlatform',
        type: 'GET',
        dataType: 'json',
        success: function (data) {
          data.forEach(data => {
            if (data.availabled == 0 && $('#question' + data.number).hasClass('active')) {
              $('#question' + data.number).removeClass('active')
            }
            if (data.availabled == 1) {
              $('#question' + data.number).addClass('active')
            }
          });
        }
      })
    }

    updatePlatform();
    setInterval(() => {
      updatePlatform();
    }, 500);
  </script>
@endsection