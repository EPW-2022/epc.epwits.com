const flashdata = $('#flash-data').data('flashdata');

$('#confirmcheck').change(function () {
  if ($(this).prop('checked')) {
    $('#registerSubmit').removeClass('disabled')
  } else {
    $('#registerSubmit').addClass('disabled')
  }
})

$('#resetpass').on('click', function (e) {
  e.preventDefault();
  var form = $(this).parents('form');
  Swal.fire({
    title: 'Reset Password?',
    text: "Perubahan password dapat berdampak pada peserta",
    icon: 'warning',
    showCancelButton: true,
    confirmButtonColor: '#3085d6',
    cancelButtonColor: '#d33',
    confirmButtonText: 'Reset Password!',
    cancelButtonText: 'Batalkan!'
  }).then((result) => {
    if (result.isConfirmed) {
      form.submit();
    }
  })
})

$('#verifyingData').on('click', function (e) {
  e.preventDefault();
  var form = $(this).parents('form');
  Swal.fire({
    title: 'Validasi Data?',
    text: "Data yang tervalidasi tidak dapat dibatalkan.",
    icon: 'warning',
    showCancelButton: true,
    confirmButtonColor: '#3085d6',
    cancelButtonColor: '#d33',
    confirmButtonText: 'Validasi!',
    cancelButtonText: 'Batalkan!'
  }).then((result) => {
    if (result.isConfirmed) {
      form.submit();
    }
  })
})

$('#deletingData').on('click', function (e) {
  e.preventDefault();
  var form = $(this).parents('form');
  Swal.fire({
    title: 'Hapus Data?',
    text: "Data yang dihapus tidak dapat dikembalikan.",
    icon: 'warning',
    showCancelButton: true,
    confirmButtonColor: '#3085d6',
    cancelButtonColor: '#d33',
    confirmButtonText: 'Hapus Data!',
    cancelButtonText: 'Batalkan!'
  }).then((result) => {
    if (result.isConfirmed) {
      form.submit();
    }
  })
})

$('#answerSubmission').on('click', function (e) {
  e.preventDefault();
  var form = $(this).parents('form');
  Swal.fire({
    title: 'Upload Jawaban?',
    text: "Jawaban yang terupload tidak dapat dihapus atau diubah lagi!",
    icon: 'warning',
    showCancelButton: true,
    confirmButtonColor: '#3085d6',
    cancelButtonColor: '#d33',
    confirmButtonText: 'Upload!',
    cancelButtonText: 'Batalkan!'
  }).then((result) => {
    if (result.isConfirmed) {
      form.submit();
    }
  })
})

if (flashdata) {
  // Login Gagal
  if (flashdata == 'Login Failed') {
    Swal.fire({
      icon: 'error',
      title: 'Akses Ditolak!',
      text: 'Username / password salah! Silakan ulangi kembali.',
      confirmButtonColor: '#c6384d',
    })
  }
  // Registrasi Berhasil
  if (flashdata == 'Registration Success') {
    Swal.fire({
      icon: 'success',
      title: 'Registrasi Berhasil!',
      text: 'Selamat! Kamu telah berhasil melakukan registrasi.',
      confirmButtonColor: '#424a63',
    })
  }
  // Logout Berhasil
  if (flashdata == 'Logout Success') {
    Swal.fire({
      icon: 'success',
      title: 'Logout Berhasil!',
      text: 'Kamu telah berhasil keluar. Terima kasih!',
      confirmButtonColor: '#424a63',
    })
  }
  // Login Gagal
  if (flashdata == 'Unconfirmed') {
    Swal.fire({
      icon: 'error',
      title: 'Registrasi Gagal!',
      text: 'Silakan cek kembali kelengkapan data kamu!',
      confirmButtonColor: '#c6384d',
    })
  }
  // Login Gagal
  if (flashdata == 'Registration Failed') {
    Swal.fire({
      icon: 'error',
      title: 'Registrasi Gagal!',
      text: 'Silakan unggah kembali kelengkapan berkas kamu!',
      confirmButtonColor: '#c6384d',
    })
  }
  // Verifikasi Berhasil
  if (flashdata == 'Verified') {
    Swal.fire({
      icon: 'success',
      title: 'Akun Terverifikasi!',
      text: 'Data peserta telah terverifikasi dengan benar.',
      confirmButtonColor: '#424a63',
    })
  }
  // Password Reset
  if (flashdata == 'Password Reset') {
    Swal.fire({
      icon: 'success',
      title: 'Password telah di reset!',
      text: 'Jangan lupa untuk konfirmasi kepada peserta!',
      confirmButtonColor: '#424a63',
    })
  }
  // Delete Success
  if (flashdata == 'Delete Success') {
    Swal.fire({
      icon: 'success',
      title: 'Data berhasil dihapus!',
      text: 'Jangan lupa untuk konfirmasi kepada peserta!',
      confirmButtonColor: '#424a63',
    })
  }
  // Restore Success
  if (flashdata == 'Restore Success') {
    Swal.fire({
      icon: 'success',
      title: 'Data berhasil dikembalikan!',
      text: 'Jangan lupa untuk konfirmasi kepada peserta!',
      confirmButtonColor: '#424a63',
    })
  }
  // Question Created
  if (flashdata == 'Question Created') {
    Swal.fire({
      icon: 'success',
      title: 'Soal berhasil dibuat!',
      text: 'Silakan cek kembali soal yang telah dibuat.',
      confirmButtonColor: '#424a63',
    })
  }
  // Question Updated
  if (flashdata == 'Question Updated') {
    Swal.fire({
      icon: 'success',
      title: 'Soal berhasil diubah!',
      text: 'Silakan cek kembali soal yang telah diubah.',
      confirmButtonColor: '#424a63',
    })
  }
  // Question Deleted
  if (flashdata == 'Question Deleted') {
    Swal.fire({
      icon: 'success',
      title: 'Soal berhasil dihapus!',
      text: 'Soal sudah berhasil dihapus dan tidak dapat dikembalikan lagi.',
      confirmButtonColor: '#424a63',
    })
  }
  // Token Generated
  if (flashdata == 'Token Generated') {
    Swal.fire({
      icon: 'success',
      title: 'Token berhasil dibuat!',
      text: 'Segera berikan token tersebut kepada peserta!',
      confirmButtonColor: '#424a63',
    })
  }
  // Token Deleted
  if (flashdata == 'Token Deleted') {
    Swal.fire({
      icon: 'success',
      title: 'Token berhasil dihapus!',
      text: 'Token sudah dihapus dan tidak dapat dikembalikan.',
      confirmButtonColor: '#424a63',
    })
  }
  // Profile Updated
  if (flashdata == 'Profile Updated') {
    Swal.fire({
      icon: 'success',
      title: 'Profile berhasil diubah',
      text: 'Data profil tim kalian sudah berubah!',
      confirmButtonColor: '#424a63',
    })
  }
  // No Token
  if (flashdata == 'No Token') {
    Swal.fire({
      icon: 'error',
      title: 'Token Kosong!',
      text: 'Masukkan token yang telah diberikan!',
      confirmButtonColor: '#424a63',
    })
  }
  // Wrong Token
  if (flashdata == 'Wrong Token') {
    Swal.fire({
      icon: 'error',
      title: 'Token tidak valid!',
      text: 'Cek kembali token yang telah kamu masukkan!',
      confirmButtonColor: '#424a63',
    })
  }
  // Wrong Expired
  if (flashdata == 'Wrong Expired') {
    Swal.fire({
      icon: 'error',
      title: 'Token telah kadaluarsa!',
      text: 'Silakan hubungi panitia untuk mendapatkan token baru!',
      confirmButtonColor: '#424a63',
    })
  }
  // Quiz attempt
  if (flashdata == 'Quiz attempt') {
    Swal.fire({
      icon: 'error',
      title: 'Akun tidak terdeteksi!',
      text: 'Silakan hubungi panitia kembali agar dapat mengikuti Quiz!',
      confirmButtonColor: '#424a63',
    })
  }
  // Timer Set
  if (flashdata == 'Timer Set') {
    Swal.fire({
      icon: 'success',
      title: 'Timer sudah diatur!',
      text: 'Terima kasih telah mengatur timer pengerjaan!',
      confirmButtonColor: '#424a63',
    })
  }
  // Quiz Finished
  if (flashdata == 'Quiz Finished') {
    Swal.fire({
      icon: 'success',
      title: 'Quiz Selesai!',
      text: 'Kamu telah selesai menyelesaikan quiz. Tunggu info lebih lanjut!',
      confirmButtonColor: '#424a63',
    })
  }
  // Already Attempt
  if (flashdata == 'Already Attempt') {
    Swal.fire({
      icon: 'error',
      title: 'Anda sudah melakukan kuis!',
      text: 'Anda sudah melakukan attempt quiz. Hubungi panitia jika terdapat error',
      confirmButtonColor: '#424a63',
    })
  }
  // Delete Session
  if (flashdata == 'Delete Session') {
    Swal.fire({
      icon: 'success',
      title: 'Session Dihapus!',
      text: 'Data session tim telah dihapus dan direset!',
      confirmButtonColor: '#424a63',
    })
  }
  // Answer Uploaded
  if (flashdata == 'Answer Uploaded') {
    Swal.fire({
      icon: 'success',
      title: 'Jawaban Diupload!',
      text: 'Jawaban kamu berhasil di upload. Lanjut ke soal selanjutnya!',
      confirmButtonColor: '#424a63',
    })
  }
  // Answer Deleted
  if (flashdata == 'Answer Deleted') {
    Swal.fire({
      icon: 'success',
      title: 'Jawaban Dihapus!',
      text: 'Jawaban kamu berhasil di hapus. Jangan lupa dikerjakan lagi!',
      confirmButtonColor: '#424a63',
    })
  }
  // Reset Question
  if (flashdata == 'Reset Question') {
    Swal.fire({
      icon: 'success',
      title: 'Soal Direset!',
      text: 'Hubungi panitia kembali!',
      confirmButtonColor: '#424a63',
    })
  }
  // Semifinal Attended
  if (flashdata == 'Semifinal Attended') {
    Swal.fire({
      icon: 'success',
      title: 'Hadir Semifinal!',
      text: 'Kamu sudah berhasil menghadiri semifinal. Selamat mengerjakan!',
      confirmButtonColor: '#424a63',
    })
  }
  // Already answered
  if (flashdata == 'Already answered') {
    Swal.fire({
      icon: 'error',
      title: 'Sudah terjawab!',
      text: 'Kamu sudah berhasil menjawab dan tidak dapat diubah lagi!',
      confirmButtonColor: '#424a63',
    })
  }
  // Wrong Question
  if (flashdata == 'Wrong Question') {
    Swal.fire({
      icon: 'error',
      title: 'Salah memilih soal!',
      text: 'Cek lagi pilihan soalmu dan ulangi upload jawaban!',
      confirmButtonColor: '#424a63',
    })
  }
  // Delete Semifinal Answer
  if (flashdata == 'Delete Semifinal Answer') {
    Swal.fire({
      icon: 'success',
      title: 'Jawaban Dihapus!',
      text: 'Jawaban peserta sudah berhasil dihapus dan tidak dapat dikembalikan lagi!',
      confirmButtonColor: '#424a63',
    })
  }
}

$(function () {
  // Datepicker
  $('#datePickerToken').bootstrapMaterialDatePicker({
    time: false
  });
  $('#timePickerToken').bootstrapMaterialDatePicker({
    date: false,
    format: 'HH:mm'
  });
  $('#datePickerTimer').bootstrapMaterialDatePicker({
    time: false
  });
  $('#timePickerTimer').bootstrapMaterialDatePicker({
    date: false,
    format: 'HH:mm'
  });
  // Summernote
  $('#soalPenyisihan').summernote({
    toolbar: [
      // [groupName, [list of button]]
      ['style', ['bold', 'italic', 'underline', 'clear']],
      ['font', ['strikethrough', 'superscript', 'subscript']],
      ['fontsize', ['fontsize']],
      ['color', ['color']],
      ['para', ['ul', 'ol', 'paragraph']],
      ['height', ['height']],
      ['insert', ['link', 'picture', 'video']],
    ],
    popatmouse: true,
    height: 200,
  });
  $('#pilAPenyisihan').summernote({
    toolbar: [
      // [groupName, [list of button]]
      ['style', ['bold', 'italic', 'underline', 'clear']],
      ['font', ['strikethrough', 'superscript', 'subscript']],
      ['fontsize', ['fontsize']],
      ['color', ['color']],
      ['para', ['ul', 'ol', 'paragraph']],
      ['height', ['height']],
      ['insert', ['link', 'picture', 'video']],
    ],
    popatmouse: true,
  });
  $('#pilBPenyisihan').summernote({
    toolbar: [
      // [groupName, [list of button]]
      ['style', ['bold', 'italic', 'underline', 'clear']],
      ['font', ['strikethrough', 'superscript', 'subscript']],
      ['fontsize', ['fontsize']],
      ['color', ['color']],
      ['para', ['ul', 'ol', 'paragraph']],
      ['height', ['height']],
      ['insert', ['link', 'picture', 'video']],
    ],
    popatmouse: true,
  });
  $('#pilCPenyisihan').summernote({
    toolbar: [
      // [groupName, [list of button]]
      ['style', ['bold', 'italic', 'underline', 'clear']],
      ['font', ['strikethrough', 'superscript', 'subscript']],
      ['fontsize', ['fontsize']],
      ['color', ['color']],
      ['para', ['ul', 'ol', 'paragraph']],
      ['height', ['height']],
      ['insert', ['link', 'picture', 'video']],
    ],
    popatmouse: true,
  });
  $('#pilDPenyisihan').summernote({
    toolbar: [
      // [groupName, [list of button]]
      ['style', ['bold', 'italic', 'underline', 'clear']],
      ['font', ['strikethrough', 'superscript', 'subscript']],
      ['fontsize', ['fontsize']],
      ['color', ['color']],
      ['para', ['ul', 'ol', 'paragraph']],
      ['height', ['height']],
      ['insert', ['link', 'picture', 'video']],
    ],
    popatmouse: true,
  });
  $('#pilEPenyisihan').summernote({
    toolbar: [
      // [groupName, [list of button]]
      ['style', ['bold', 'italic', 'underline', 'clear']],
      ['font', ['strikethrough', 'superscript', 'subscript']],
      ['fontsize', ['fontsize']],
      ['color', ['color']],
      ['para', ['ul', 'ol', 'paragraph']],
      ['height', ['height']],
      ['insert', ['link', 'picture', 'video']],
    ],
    popatmouse: true,
  });
});

$(function () {
  $('.submitScore').on('click', function (e) {
    let action = $(this).parents('form[method=post]').attr('action');
    let token = $('input[name=_token]').val();
    let score = $(this).prev().val();
    e.preventDefault();
    $.ajax({
      type: "POST",
      url: action,
      data: {
        score: score,
        _token: token
      },
      success: function (e) {
        $(this).prev().val(e.score);
        Swal.fire({
          icon: 'success',
          title: 'Skor diubah!',
          text: 'Jawaban berhasil diberi nilai dan skor berubah!',
          confirmButtonColor: '#424a63',
        })
      }
    });
  });
});

