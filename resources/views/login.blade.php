@extends('layouts.main')

@section('content')
    
  <section id="loginForm">
    <div class="container d-flex justify-content-center flex-column py-5">
      <div class="row align-items-center">
        <div class="col-md-6 px-5">
          <img src="/img/logo-epc.svg" class="login-logo d-block mx-auto" alt="">
          <img src="/img/epc-2022.png" class="login-epw-2022 d-block mx-auto" alt="">
        </div>
        <div class="col-md-6 px-4">
          <form action="" method="POST" class="login-form mx-auto mt-5 mt-md-0">
            <div class="mb-4">
              <label for="username" class="form-label">Username</label>
              <input class="form-control" type="text" id="username" name="username" placeholder="Username">
            </div>
            <div class="mb-4">
              <label for="password" class="form-label">Password</label>
              <input class="form-control" type="text" id="password" name="password" placeholder="Password">
            </div>
            <button type="submit" class="btn login-button w-100">Log In</button>
            <p class="login-register text-center mt-3">Belum mendaftar? <a href="/registrasi">Daftar sekarang!</a></p>
          </form>
        </div>
      </div>
    </div>
  </section>

@endsection