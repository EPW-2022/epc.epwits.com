@extends('admin.layouts.main')

@section('container')

  @if (session()->has('message'))
    <div id="flash-data" data-flashdata="{{ session('message') }}"></div>
  @endif

  <!--Header-->
  <div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
    <div class="breadcrumb-title pe-3">Semifinal</div>
    <div class="ps-3 ms-auto">
      <nav aria-label="breadcrumb">
        <ol class="breadcrumb mb-0 p-0">
          <li class="breadcrumb-item"><a href="/admin"><i class="bx bx-home-alt"></i> Dashboard</a>
          </li>
          <li class="breadcrumb-item active" aria-current="page">Semifinal Question Reset</li>
        </ol>
      </nav>
    </div>
  </div>
  <!--end of Header-->

  <h6 class="mb-0 text-uppercase">Semifinal Question Reset</h6>
  <hr>

  <div class="card">
    <div class="card-body">
      <div class="table-responsive my-3">
        <table class="table">
          <thead>
            <tr>
              <th class="text-center">Kategori</th>
              <th class="text-center">Easy</th>
              <th class="text-center">Medium</th>
              <th class="text-center">Hard</th>
            </tr>
          </thead>
          <tbody>
            <tr>
              <td class="align-middle">Energi</td>
              <td>
                <div class="d-flex justify-content-center my-2">
                  @foreach ($questions as $key => $question)
                  @if ($question->laboratory == 'Energi' && $question->category == 'Easy')
                  <button type="button" id="question{{ $question->number }}" style="width: 50px;" class="question-number d-block btn btn-success mx-1" data-question="{{ $question->number }}">{{ $question->number }}</button>
                  @endif
                  @endforeach
                </div>
              </td>
              <td>
                <div class="d-flex justify-content-center my-2">
                  @foreach ($questions as $key => $question)
                  @if ($question->laboratory == 'Energi' && $question->category == 'Medium')
                  <button type="button" id="question{{ $question->number }}" style="width: 50px;" class="question-number d-block btn btn-success mx-1" data-question="{{ $question->number }}">{{ $question->number }}</button>
                  @endif
                  @endforeach
                </div>
              </td>
              <td>
                <div class="d-flex justify-content-center my-2">
                  @foreach ($questions as $key => $question)
                  @if ($question->laboratory == 'Energi' && $question->category == 'Hard')
                  <button type="button" id="question{{ $question->number }}" style="width: 50px;" class="question-number d-block btn btn-success mx-1" data-question="{{ $question->number }}">{{ $question->number }}</button>
                  @endif
                  @endforeach
                </div>
              </td>
            </tr>
            <tr>
              <td class="align-middle">Fotonika</td>
              <td>
                <div class="d-flex justify-content-center my-2">
                  @foreach ($questions as $key => $question)
                  @if ($question->laboratory == 'Fotonika' && $question->category == 'Easy')
                  <button type="button" id="question{{ $question->number }}" style="width: 50px;" class="question-number d-block btn btn-success mx-1" data-question="{{ $question->number }}">{{ $question->number }}</button>
                  @endif
                  @endforeach
                </div>
              </td>
              <td>
                <div class="d-flex justify-content-center my-2">
                  @foreach ($questions as $key => $question)
                  @if ($question->laboratory == 'Fotonika' && $question->category == 'Medium')
                  <button type="button" id="question{{ $question->number }}" style="width: 50px;" class="question-number d-block btn btn-success mx-1" data-question="{{ $question->number }}">{{ $question->number }}</button>
                  @endif
                  @endforeach
                </div>
              </td>
              <td>
                <div class="d-flex justify-content-center my-2">
                  @foreach ($questions as $key => $question)
                  @if ($question->laboratory == 'Fotonika' && $question->category == 'Hard')
                  <button type="button" id="question{{ $question->number }}" style="width: 50px;" class="question-number d-block btn btn-success mx-1" data-question="{{ $question->number }}">{{ $question->number }}</button>
                  @endif
                  @endforeach
                </div>
              </td>
            </tr>
            <tr>
              <td class="align-middle">Vibrastik</td>
              <td>
                <div class="d-flex justify-content-center my-2">
                  @foreach ($questions as $key => $question)
                  @if ($question->laboratory == 'Vibrastik' && $question->category == 'Easy')
                  <button type="button" id="question{{ $question->number }}" style="width: 50px;" class="question-number d-block btn btn-success mx-1" data-question="{{ $question->number }}">{{ $question->number }}</button>
                  @endif
                  @endforeach
                </div>
              </td>
              <td>
                <div class="d-flex justify-content-center my-2">
                  @foreach ($questions as $key => $question)
                  @if ($question->laboratory == 'Vibrastik' && $question->category == 'Medium')
                  <button type="button" id="question{{ $question->number }}" style="width: 50px;" class="question-number d-block btn btn-success mx-1" data-question="{{ $question->number }}">{{ $question->number }}</button>
                  @endif
                  @endforeach
                </div>
              </td>
              <td>
                <div class="d-flex justify-content-center my-2">
                  @foreach ($questions as $key => $question)
                  @if ($question->laboratory == 'Vibrastik' && $question->category == 'Hard')
                  <button type="button" id="question{{ $question->number }}" style="width: 50px;" class="question-number d-block btn btn-success mx-1" data-question="{{ $question->number }}">{{ $question->number }}</button>
                  @endif
                  @endforeach
                </div>
              </td>
            </tr>
            <tr>
              <td class="align-middle">Instrumentasi</td>
              <td>
                <div class="d-flex justify-content-center my-2">
                  @foreach ($questions as $key => $question)
                  @if ($question->laboratory == 'Instrumentasi' && $question->category == 'Easy')
                  <button type="button" id="question{{ $question->number }}" style="width: 50px;" class="question-number d-block btn btn-success mx-1" data-question="{{ $question->number }}">{{ $question->number }}</button>
                  @endif
                  @endforeach
                </div>
              </td>
              <td>
                <div class="d-flex justify-content-center my-2">
                  @foreach ($questions as $key => $question)
                  @if ($question->laboratory == 'Instrumentasi' && $question->category == 'Medium')
                  <button type="button" id="question{{ $question->number }}" style="width: 50px;" class="question-number d-block btn btn-success mx-1" data-question="{{ $question->number }}">{{ $question->number }}</button>
                  @endif
                  @endforeach
                </div>
              </td>
              <td>
                <div class="d-flex justify-content-center my-2">
                  @foreach ($questions as $key => $question)
                  @if ($question->laboratory == 'Instrumentasi' && $question->category == 'Hard')
                  <button type="button" id="question{{ $question->number }}" style="width: 50px;" class="question-number d-block btn btn-success mx-1" data-question="{{ $question->number }}">{{ $question->number }}</button>
                  @endif
                  @endforeach
                </div>
              </td>
            </tr>
            <tr>
              <td class="align-middle">Bahan</td>
              <td>
                <div class="d-flex justify-content-center my-2">
                  @foreach ($questions as $key => $question)
                  @if ($question->laboratory == 'Bahan' && $question->category == 'Easy')
                  <button type="button" id="question{{ $question->number }}" style="width: 50px;" class="question-number d-block btn btn-success mx-1" data-question="{{ $question->number }}">{{ $question->number }}</button>
                  @endif
                  @endforeach
                </div>
              </td>
              <td>
                <div class="d-flex justify-content-center my-2">
                  @foreach ($questions as $key => $question)
                  @if ($question->laboratory == 'Bahan' && $question->category == 'Medium')
                  <button type="button" id="question{{ $question->number }}" style="width: 50px;" class="question-number d-block btn btn-success mx-1" data-question="{{ $question->number }}">{{ $question->number }}</button>
                  @endif
                  @endforeach
                </div>
              </td>
              <td>
                <div class="d-flex justify-content-center my-2">
                  @foreach ($questions as $key => $question)
                  @if ($question->laboratory == 'Bahan' && $question->category == 'Hard')
                  <button type="button" id="question{{ $question->number }}" style="width: 50px;" class="question-number d-block btn btn-success mx-1" data-question="{{ $question->number }}">{{ $question->number }}</button>
                  @endif
                  @endforeach
                </div>
              </td>
            </tr>
          </tbody>
        </table>
      </div>
    </div>
  </div>

  <!-- Modal -->
<div class="modal fade" id="questionModal" tabindex="-1" aria-labelledby="questionModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-xl modal-dialog-centered modal-dialog-scrollable">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="questionModalLabel">Processing..</h5>
      </div>
      <div class="modal-body">
        <div class="question-body">
          Processing..
        </div>
        <p>Assigned for : <span id="questionAssigned"></span></p>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-primary" id="resetButton" data-number="" data-user="">Reset</button>
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button>
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
          url: window.location.origin + '/superadmin/requestQuestion/' + number,
          dataType: 'JSON',
          success: function (data) {
            if (data.question.availabled == 1 && data.question.user_id){
              $('#resetButton').css('display', 'block').attr('data-number', data.question.number)
              $('#questionAssigned').html(data.user_name)
            } else {
              $('#resetButton').css('display', 'none').attr('data-number', '')
              $('#questionAssigned').html("Not assigned")
            }
            $('#questionModalLabel').html(data.question.laboratory + ' ' + data.question.category + ' No. ' + data.question.number);
            $('.question-body').html(data.question.question);
            var questionModal = new bootstrap.Modal(document.getElementById('questionModal'));
            questionModal.show()
          },
          error: function (data) {
            console.log(data)
          }
        });
        // }
      });
    });

    $(function () {
      $('#resetButton').on('click', function() {
        var number= $(this).attr('data-number')
        $.ajax({
          type: "GET",
          url: window.location.origin + '/superadmin/semifinal/' + number,
          success: function (data) {
            $(this).css('display', 'none').attr('data-number', '')
            Swal.fire({
              icon: 'success',
              title: 'Soal Direset!',
              text: 'Hubungi panitia kembali!',
              confirmButtonColor: '#424a63',
            })
          }
        })
      })
    })

    var updatePlatform = function () {
      $.ajax({
        url: window.location.origin + '/admin/semifinal/dataPlatform',
        type: 'GET',
        dataType: 'json',
        success: function (data) {
          data.forEach(data => {
            if (data.availabled == 0) {
              if ($('#question' + data.number).hasClass('btn-danger') || $('#question' + data.number).hasClass('btn-warning')) {
                $('#question' + data.number).removeClass('btn-danger')
                $('#question' + data.number).addClass('btn-success')
              }
            }
            if (data.availabled == 1) {
              if (data.user_id) {
                $('#question' + data.number).removeClass('btn-success')
                $('#question' + data.number).addClass('btn-danger')
              } else {
                $('#question' + data.number).removeClass('btn-success')
                $('#question' + data.number).addClass('btn-warning')
              }
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