const flashdata = $('#flash-data').data('flashdata');

$('#confirmcheck').change(function () {
  if ($(this).prop('checked')) {
    $('#registerSubmit').removeClass('disabled')
  } else {
    $('#registerSubmit').addClass('disabled')
  }
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
}