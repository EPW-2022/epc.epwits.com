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
}