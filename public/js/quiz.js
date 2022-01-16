var getTimer = document.getElementById('getTimer').dataset.timer;
console.log(getTimer)
var countDownDate = new Date(getTimer).getTime();
var endSession = $(".endSession").attr('href');

var x = setInterval(function () {
  var now = new Date().getTime();

  var distance = countDownDate - now;

  var hour = Math.floor((distance % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
  var min = Math.floor((distance % (1000 * 60 * 60)) / (1000 * 60));
  var sec = Math.floor((distance % (1000 * 60)) / 1000);

  function digit(n) {
    return n < 10 ? "0" + n : "" + n;
  }

  document.getElementById("hour").innerHTML = digit(hour);
  document.getElementById("min").innerHTML = digit(min);
  document.getElementById("sec").innerHTML = digit(sec);

  if (distance < 0) {
    clearInterval(x);
    document.getElementById("hour").innerHTML = "00";
    document.getElementById("min").innerHTML = "00";
    document.getElementById("sec").innerHTML = "00";
    window.location.href = endSession;
  }
}, 1);

$("input[name=answer]").on("change", function (e) {
  const data = $(this).val();
  const action = $(".answer-form").attr('action');
  const token = $('input[name=_token]').val();
  $.ajax({
    type: "POST",
    url: action,
    data: {
      answer: data,
      _token: token
    }
  });
  e.preventDefault();
});

$("#removeAnswer").on("click", function (e) {
  const data = $(this).val();
  const action = $(".remove-form").attr('action');
  const token = $('input[name=_token]').val();
  $.ajax({
    type: "POST",
    url: action,
    data: {
      answer: data,
      _token: token
    },
    success: function (e) {
      console.log(e);
      $("input[value=" + e + "]").removeAttr('checked');
    }
  });
  e.preventDefault();
});

$('.add-flagged-button').on('click', function (e) {
  const target = $('.flagged-form').attr('action');
  const token = $('input[name=_token]').val();
  $.ajax({
    type: "POST",
    url: target,
    data: {
      _token: token
    },
    success: function (message) {
      $('.add-flagged-button').html(message);
      $('.nav-link.active').addClass('flagged');
    }
  });
  e.preventDefault();
})

$('.remove-flagged-button').on('click', function (e) {
  const target = $('.flagged-form').attr('action');
  const token = $('input[name=_token]').val();
  $.ajax({
    type: "POST",
    url: target,
    data: {
      _token: token
    },
    success: function (message) {
      $('.remove-flagged-button').html(message.message);
      $('.nav-link.active').removeClass('flagged');
    }
  });
  e.preventDefault();
})

$('.endSession').on('click', function (e) {
  e.preventDefault();
  Swal.fire({
    title: 'Akhiri Quiz?',
    text: "Kamu ingin mengakhiri quiz pada sesi ini. Lanjutkan?",
    icon: 'warning',
    showCancelButton: true,
    confirmButtonColor: '#3085d6',
    cancelButtonColor: '#d33',
    confirmButtonText: 'Lanjutkan!',
    cancelButtonText: 'Batalkan!'
  }).then((result) => {
    if (result.isConfirmed) {
      window.location.href = endSession;
    }
  })
})