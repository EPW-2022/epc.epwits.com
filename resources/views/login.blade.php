@extends('layouts.main')

@section('content')
    
  @if (session()->has('message'))
    <div id="flash-data" data-flashdata="{{ session('message') }}"></div>
  @endif

  <section id="loginForm">
    <div class="container d-flex justify-content-center flex-column py-5">
      <div class="row align-items-center">
        <div class="col-md-6 px-5">
          <img src="/img/logo-epc.svg" class="login-logo d-block mx-auto" alt="">
          <img src="/img/epc-2022.png" class="login-epw-2022 d-block mx-auto" alt="">
        </div>
        <div class="col-md-6 px-4">
          <form action="/login" method="POST" class="login-form mx-auto mt-5 mt-md-0">
            @csrf
            <div class="mb-4">
              <label for="username" class="form-label">Username</label>
              <input class="form-control" type="text" id="username" name="username" placeholder="Username" autofocus tabindex="1" autocomplete="on">
            </div>
            <div class="mb-4">
              <label for="password" class="form-label">Password</label>
              <input class="form-control" type="password" id="password" name="password" placeholder="Password" tabindex="2">
            </div>
            <button type="submit" class="btn login-button w-100" tabindex="3">Log In</button>
            <p class="login-register text-center mt-3" tabindex="4">Belum mendaftar? <a href="/daftar">Daftar sekarang!</a></p>
            <p class="login-register text-center mt-3" tabindex="4">Lupa password? <a href="https://api.whatsapp.com/send/?phone=6282247544818&text=Reset+Password_Asal+Sekolah_Nama+Tim_Nama+Ketua&app_absent=0" target="_blank">Klik disini!</a></p>
          </form>
        </div>
      </div>
    </div>
  </section>

@endsection