@extends('layouts.main')

@section('content')
    
  <section id="registerForm">
    <div class="container register py-5">
      <img src="/img/epc-2022.png" class="register-epw-2022 d-block mx-auto mb-5" alt="">
      {{-- Akun Tim --}}
      
      @if (session()->has('success'))
      <div class="register-alert alert">
        <p>{{ session('success') }}</p>
      </div>
      @endif
      
      <form action="/daftar" method="POST" enctype="multipart/form-data">
        @csrf
        <h1 class="register-section mb-2">
          <span class="register-section-label d-inline-block">1. Akun Tim</span>
        </h1>
        <div class="row">
          <div class="col-sm-6">
            <div class="mb-3">
              <label for="name" class="form-label">Nama Tim<span class="text-danger">*</span></label>
              <input class="form-control @error('name') is-invalid @enderror" type="text" id="name" name="name" placeholder="name" autofocus tabindex="1" value="{{ old('name') }}">
              @error('name')
                <div class="invalid-feedback ps-1 pt-1">
                  {{ $message }}
                </div>
              @enderror
            </div>
            <div class="mb-3">
              <label for="username" class="form-label">Username Tim<span class="text-danger">*</span></label>
              <input class="form-control @error('username') is-invalid @enderror" type="text" id="username" name="username" placeholder="username" tabindex="2" value="{{ old('username') }}">
              @error('username')
                <div class="invalid-feedback ps-1 pt-1">
                  {{ $message }}
                </div>
              @enderror
            </div>
          </div>
          <div class="col-sm-6">
            <div class="mb-3">
              <label for="password" class="form-label">Password<span class="text-danger">*</span></label>
              <input class="form-control @error('password') is-invalid @enderror" type="password" id="password" name="password" placeholder="password" tabindex="3">
              @error('password')
                <div class="invalid-feedback ps-1 pt-1">
                  {{ $message }}
                </div>
              @enderror
            </div>
            <div class="mb-3">
              <label for="confirm" class="form-label">Konfirmasi Password<span class="text-danger">*</span></label>
              <input class="form-control @error('confirm') is-invalid @enderror" type="password" id="confirm" name="confirm" placeholder="confirm" tabindex="4">
              @error('confirm')
                <div class="invalid-feedback ps-1 pt-1">
                  {{ $message }}
                </div>
              @enderror
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
              <label for="school" class="form-label">Asal Sekolah<span class="text-danger">*</span></label>
              <input class="form-control @error('school') is-invalid @enderror" type="text" id="school" name="school" placeholder="school" tabindex="5" value="{{ old('school') }}">
              @error('school')
                <div class="invalid-feedback ps-1 pt-1">
                  {{ $message }}
                </div>
              @enderror
            </div>
          </div>
          <div class="col-sm-6">
            <div class="mb-3">
              <label for="city" class="form-label">Kota<span class="text-danger">*</span></label>
              <input class="form-control @error('city') is-invalid @enderror" type="text" id="city" name="city" placeholder="city" tabindex="6" value="{{ old('city') }}">
              @error('city')
                <div class="invalid-feedback ps-1 pt-1">
                  {{ $message }}
                </div>
              @enderror
            </div>
          </div>
        </div>

        {{-- Ketua --}}
        <h1 class="register-role mb-2 mt-4">Ketua</h1>
        <div class="row">
          <div class="col-sm-6">
            <div class="mb-3">
              <label for="leader_name" class="form-label">Nama Ketua<span class="text-danger">*</span></label>
              <input class="form-control @error('leader_name') is-invalid @enderror" type="text" id="leader_name" name="leader_name" placeholder="leader_name" tabindex="7" value="{{ old('leader_name') }}">
              @error('leader_name')
                <div class="invalid-feedback ps-1 pt-1">
                  {{ $message }}
                </div>
              @enderror
            </div>
          </div>
          <div class="col-sm-6">
            <div class="mb-3">
              <label for="leader_number" class="form-label">NISN<span class="text-danger">*</span></label>
              <input class="form-control @error('leader_number') is-invalid @enderror" type="text" id="leader_number" name="leader_number" placeholder="leader_number" tabindex="8" value="{{ old('leader_number') }}">
              @error('leader_number')
                <div class="invalid-feedback ps-1 pt-1">
                  {{ $message }}
                </div>
              @enderror
            </div>
          </div>
          <div class="col-sm-6">
            <div class="mb-3">
              <label for="leader_place" class="form-label">Tempat Lahir<span class="text-danger">*</span></label>
              <input class="form-control @error('leader_place') is-invalid @enderror" type="text" id="leader_place" name="leader_place" placeholder="leader_place" tabindex="9" value="{{ old('leader_place') }}">
              @error('leader_place')
                <div class="invalid-feedback ps-1 pt-1">
                  {{ $message }}
                </div>
              @enderror
            </div>
          </div>
          <div class="col-sm-6">
            <div class="mb-3">
              <label for="leader_date" class="form-label">Tanggal Lahir<span class="text-danger">*</span></label>
              <input class="form-control @error('leader_date') is-invalid @enderror" type="date" id="leader_date" name="leader_date" placeholder="leader_date" tabindex="10" value="{{ old('leader_date') }}">
              @error('leader_date')
                <div class="invalid-feedback ps-1 pt-1">
                  {{ $message }}
                </div>
              @enderror
            </div>
          </div>
          <div class="col-sm-6">
            <div class="mb-3">
              <label for="leader_phone" class="form-label">No Handphone<span class="text-danger">*</span></label>
              <div class="input-group mb-3">
                <span class="input-group-text" id="basic-addon1">+62</span>
                <input class="form-control @error('leader_phone') is-invalid @enderror" type="text" id="leader_phone" name="leader_phone" placeholder="leader_phone" tabindex="11" value="{{ old('leader_phone') }}">
                @error('leader_phone')
                  <div class="invalid-feedback ps-1 pt-1">
                    {{ $message }}
                  </div>
                @enderror
              </div>
            </div>
            <div class="mb-3">
              <label for="email" class="form-label">Email<span class="text-danger">*</span></label>
              <input class="form-control @error('email') is-invalid @enderror" type="email" id="email" name="email" placeholder="email" tabindex="12" value="{{ old('email') }}">
              @error('email')
                <div class="invalid-feedback ps-1 pt-1">
                  {{ $message }}
                </div>
              @enderror
            </div>
          </div>
          <div class="col-sm-6">
            <div class="mb-3">
              <label for="leader_address" class="form-label">Alamat Rumah<span class="text-danger">*</span></label>
              <textarea class="form-control @error('leader_address') is-invalid @enderror" id="leader_address" name="leader_address" rows="4" style="min-height: 115px" tabindex="13">{{ old('leader_address') }}</textarea>
              @error('leader_address')
                <div class="invalid-feedback ps-1 pt-1">
                  {{ $message }}
                </div>
              @enderror
            </div>
          </div>
        </div>

        {{-- Anggota --}}
        <h1 class="register-role mb-2 mt-4">Anggota</h1>
        <div class="row">
          <div class="col-sm-6">
            <div class="mb-3">
              <label for="member_name" class="form-label">Nama Anggota</label>
              <input class="form-control @error('member_name') is-invalid @enderror" type="text" id="member_name" name="member_name" placeholder="member_name" tabindex="14" value="{{ old('member_name') }}">
              @error('member_name')
                <div class="invalid-feedback ps-1 pt-1">
                  {{ $message }}
                </div>
              @enderror
            </div>
          </div>
          <div class="col-sm-6">
            <div class="mb-3">
              <label for="member_number" class="form-label">NISN</label>
              <input class="form-control @error('member_number') is-invalid @enderror" type="text" id="member_number" name="member_number" placeholder="member_number" tabindex="15" value="{{ old('member_number') }}">
              @error('member_number')
                <div class="invalid-feedback ps-1 pt-1">
                  {{ $message }}
                </div>
              @enderror
            </div>
          </div>
          <div class="col-sm-6">
            <div class="mb-3">
              <label for="member_place" class="form-label">Tempat Lahir</label>
              <input class="form-control @error('member_place') is-invalid @enderror" type="text" id="member_place" name="member_place" placeholder="member_place" tabindex="16" value="{{ old('member_place') }}">
              @error('member_place')
                <div class="invalid-feedback ps-1 pt-1">
                  {{ $message }}
                </div>
              @enderror
            </div>
          </div>
          <div class="col-sm-6">
            <div class="mb-3">
              <label for="member_date" class="form-label">Tanggal Lahir</label>
              <input class="form-control @error('member_date') is-invalid @enderror" type="date" id="member_date" name="member_date" placeholder="member_date" tabindex="17" value="{{ old('member_date') }}">
              @error('member_date')
                <div class="invalid-feedback ps-1 pt-1">
                  {{ $message }}
                </div>
              @enderror
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
              <label class="form-label">Upload Pas Foto<span class="text-danger">*</span></label>
              <input class="form-control mb-2 @error('person_photo') is-invalid @enderror" type="file" name="person_photo[]" multiple accept=".jpg,.jpeg,.JPG,.png" tabindex="18">
              <label class="form-label text-danger">Format: .jpg/.png max. size 1MB<span class="text-danger">*</span></label>
              @error('person_photo')
                <div class="invalid-feedback ps-1 pt-1">
                  {{ $message }}
                </div>
              @enderror
            </div>
          </div>
          <div class="col-sm-6">
            <div class="mb-3">
              <label class="form-label">Upload Scan Kartu Pelajar<span class="text-danger">*</span></label>
              <input class="form-control mb-2 @error('person_scan') is-invalid @enderror" type="file" name="person_scan[]" multiple accept=".jpg,.jpeg,.JPG,.png" tabindex="19">
              <label class="form-label text-danger">Format: .jpg/.png max. size 1MB<span class="text-danger">*</span></label>
              @error('person_scan')
                <div class="invalid-feedback ps-1 pt-1">
                  {{ $message }}
                </div>
              @enderror
            </div>
          </div>
        </div>
        
        {{-- Pembayaran --}}
        <h1 class="register-section mb-2 mt-4">
          <span class="register-section-label d-inline-block">4. Pembayaran</span>
        </h1>
        <div class="register-payment py-4 px-2 mb-3">
        </div>
        <div class="row">
          <div class="col-sm-6">
            <div class="mb-3">
              <label for="payment_name" class="form-label">Nama Pemilik Rekening<span class="text-danger">*</span></label>
              <input class="form-control @error('payment_name') is-invalid @enderror" type="text" id="payment_name" name="payment_name" placeholder="payment_name" tabindex="20" value="{{ old('payment_name') }}">
              @error('payment_name')
                <div class="invalid-feedback ps-1 pt-1">
                  {{ $message }}
                </div>
              @enderror
            </div>
          </div>
          <div class="col-sm-6">
            <div class="mb-3">
              <label for="payment_slip" class="form-label">Upload Bukti Pembayaran<span class="text-danger">*</span></label>
              <input class="form-control mb-2 @error('payment_slip') is-invalid @enderror" type="file" name="payment_slip" id="payment_slip" accept=".jpg,.jpeg,.JPG,.png" tabindex="21">
              <label class="form-label text-danger">Format: .jpg/.png max. size 1MB<span class="text-danger">*</span></label>
              @error('payment_slip')
                <div class="invalid-feedback ps-1 pt-1">
                  {{ $message }}
                </div>
              @enderror
            </div>
          </div>
        </div>
          
        <div class="form-check mt-4">
          <input class="form-check-input" type="checkbox" value="checked" id="confirmcheck" tabindex="22">
          <label class="form-check-label" for="confirmcheck">
            Saya menyatakan bahwa data/informasi/berkas yang saya sampaikan pada formulir ini adalah benar.
            <span class="text-danger">*</span>
          </label>
        </div>
        <p class="text-danger fw-bold mt-3"><span>*) </span>Wajib diisi!</p>
        <button type="submit" class="btn register-button d-block mt-4 mx-auto" tabindex="23">Daftar!</button>
      </form>
    </div>
  </section>

@endsection