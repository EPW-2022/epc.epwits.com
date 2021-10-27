@extends('layouts.main')

@section('content')
    
  <section id="registerForm">
    <div class="container register py-5">
      <img src="/img/epc-2022.png" class="register-epw-2022 d-block mx-auto" alt="">
      {{-- Akun Tim --}}
      <form action="" method="POST">
        <h1 class="register-section mb-2 mt-5">
          <span class="register-section-label d-inline-block">1. Akun Tim</span>
        </h1>
        <div class="row">
          <div class="col-sm-6">
            <div class="mb-3">
              <label for="team" class="form-label">Nama Tim</label>
              <input class="form-control" type="text" id="team" name="team" placeholder="team">
            </div>
            <div class="mb-3">
              <label for="username" class="form-label">Username Tim</label>
              <input class="form-control" type="text" id="username" name="username" placeholder="username">
            </div>
          </div>
          <div class="col-sm-6">
            <div class="mb-3">
              <label for="password" class="form-label">Password</label>
              <input class="form-control" type="text" id="password" name="password" placeholder="password">
            </div>
            <div class="mb-3">
              <label for="confirm" class="form-label">Confirm Password</label>
              <input class="form-control" type="text" id="confirm" name="confirm" placeholder="confirm">
            </div>
          </div>
        </div>

        {{-- Biodata Tim --}}
        <h1 class="register-section mb-2 mt-4">
          <span class="register-section-label d-inline-block">2. Biodata Tim</span>
        </h1>
        <div class="row">
          <div class="col-sm-6">
            <div class="mb-3">
              <label for="school" class="form-label">Asal Sekolah</label>
              <input class="form-control" type="text" id="school" name="school" placeholder="school">
            </div>
          </div>
          <div class="col-sm-6">
            <div class="mb-3">
              <label for="city" class="form-label">Kota</label>
              <input class="form-control" type="text" id="city" name="city" placeholder="city">
            </div>
          </div>
        </div>

        {{-- Ketua --}}
        <h1 class="register-role mb-2 mt-4">Ketua</h1>
        <div class="row">
          <div class="col-sm-6">
            <div class="mb-3">
              <label for="leader_name" class="form-label">Nama Ketua</label>
              <input class="form-control" type="text" id="leader_name" name="leader_name" placeholder="leader_name">
            </div>
          </div>
          <div class="col-sm-6">
            <div class="mb-3">
              <label for="leader_number" class="form-label">NISN</label>
              <input class="form-control" type="text" id="leader_number" name="leader_number" placeholder="leader_number">
            </div>
          </div>
          <div class="col-sm-6">
            <div class="mb-3">
              <label for="leader_place" class="form-label">Tempat Lahir</label>
              <input class="form-control" type="text" id="leader_place" name="leader_place" placeholder="leader_place">
            </div>
          </div>
          <div class="col-sm-6">
            <div class="mb-3">
              <label for="leader_date" class="form-label">Tanggal Lahir</label>
              <input class="form-control" type="date" id="leader_date" name="leader_date" placeholder="leader_date">
            </div>
          </div>
          <div class="col-sm-6">
            <div class="mb-3">
              <label for="leader_address" class="form-label">Alamat Rumah</label>
              <input class="form-control" type="text" id="leader_address" name="leader_address" placeholder="leader_address">
            </div>
          </div>
          <div class="col-sm-6">
            <div class="mb-3">
              <label for="leader_phone" class="form-label">No Handphone</label>
              <input class="form-control" type="text" id="leader_phone" name="leader_phone" placeholder="leader_phone">
            </div>
          </div>
        </div>

        {{-- Anggota 1 --}}
        <h1 class="register-role mb-2 mt-4">Anggota 1</h1>
        <div class="row">
          <div class="col-sm-6">
            <div class="mb-3">
              <label for="member1_name" class="form-label">Nama Anggota</label>
              <input class="form-control" type="text" id="member1_name" name="member1_name" placeholder="member1_name">
            </div>
          </div>
          <div class="col-sm-6">
            <div class="mb-3">
              <label for="member1_number" class="form-label">NISN</label>
              <input class="form-control" type="text" id="member1_number" name="member1_number" placeholder="member1_number">
            </div>
          </div>
          <div class="col-sm-6">
            <div class="mb-3">
              <label for="member1_place" class="form-label">Tempat Lahir</label>
              <input class="form-control" type="text" id="member1_place" name="member1_place" placeholder="member1_place">
            </div>
          </div>
          <div class="col-sm-6">
            <div class="mb-3">
              <label for="member1_date" class="form-label">Tanggal Lahir</label>
              <input class="form-control" type="date" id="member1_date" name="member1_date" placeholder="member1_date">
            </div>
          </div>
        </div>

        {{-- Anggota 2 --}}
        <h1 class="register-role mb-2 mt-4">Anggota 2</h1>
        <div class="row">
          <div class="col-sm-6">
            <div class="mb-3">
              <label for="member2_name" class="form-label">Nama Anggota</label>
              <input class="form-control" type="text" id="member2_name" name="member2_name" placeholder="member2_name">
            </div>
          </div>
          <div class="col-sm-6">
            <div class="mb-3">
              <label for="member2_number" class="form-label">NISN</label>
              <input class="form-control" type="text" id="member2_number" name="member2_number" placeholder="member2_number">
            </div>
          </div>
          <div class="col-sm-6">
            <div class="mb-3">
              <label for="member2_place" class="form-label">Tempat Lahir</label>
              <input class="form-control" type="text" id="member2_place" name="member2_place" placeholder="member2_place">
            </div>
          </div>
          <div class="col-sm-6">
            <div class="mb-3">
              <label for="member2_date" class="form-label">Tanggal Lahir</label>
              <input class="form-control" type="date" id="member2_date" name="member2_date" placeholder="member2_date">
            </div>
          </div>
        </div>
        
        {{-- Dokumen Pendukung --}}
        <h1 class="register-section mb-2 mt-4">
          <span class="register-section-label d-inline-block">3. Dokumen Pendukung</span>
        </h1>
        <div class="row">
          <div class="col-sm-6">
            <div class="mb-3">
              <label class="form-label">Upload Pas Foto</label>
              <input class="form-control mb-2" type="file" name="leader_photo">
              <input class="form-control mb-2" type="file" name="member1_photo">
              <input class="form-control mb-2" type="file" name="member2_photo">
              <label class="form-label text-danger">Format: .jpg/.png max. size 1MB</label>
            </div>
          </div>
          <div class="col-sm-6">
            <div class="mb-3">
              <label class="form-label">Upload Scan Kartu Pelajar</label>
              <input class="form-control mb-2" type="file" name="leader_scan">
              <input class="form-control mb-2" type="file" name="member1_scan">
              <input class="form-control mb-2" type="file" name="member2_scan">
              <label class="form-label text-danger">Format: .jpg/.png max. size 1MB</label>
            </div>
          </div>
        </div>
        
        {{-- Pembayaran --}}
        <h1 class="register-section mb-2 mt-4">
          <span class="register-section-label d-inline-block">4. Pembayaran</span>
        </h1>

        <div class="form-check mt-4">
          <input class="form-check-input" type="checkbox" value="checked" id="confirmcheck">
          <label class="form-check-label" for="confirmcheck">
            Saya menyatakan bahwa data/informasi/berkas yang saya sampaikan pada formulir ini adalah benar.
          </label>
        </div>
        <button type="submit" class="btn register-button d-block mt-4 mx-auto">Daftar!</button>
      </form>
    </div>
  </section>

@endsection