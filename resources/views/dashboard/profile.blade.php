@extends('layouts.main')

@section('content')
    
<article id="dashboard">
  <div class="container">
    {{-- Profile --}}
    <section id="profile" class="text-center">
      <img src="/img/avatar.svg" alt="" class="profile-avatar">
      <h1 class="profile-name">{{ auth()->user()->name }}</h1>
      <h2 class="profile-school">{{ auth()->user()->team->school }}</h2>
      <h2 class="profile-team">{{ auth()->user()->team->team_number }}</h2>
      <a href="/" class="profile-card text-center mx-auto mt-3">Kembali ke Dashboard</a>
    </section>
    {{-- End of Profile --}}

    {{-- Profile --}}
    <section id="editProfile" class="mx-auto">
      <div class="col-lg-8 mx-auto">
        <form action="/profile/{{ auth()->user()->username }}" method="POST" class="profile mt-4">
          @csrf
          @method('PUT')
          <div class="row">
            <div class="col-sm-6">
              <div class="mb-3">
                <label for="username" class="form-label">Username Tim*</label>
                <input type="text" class="form-control @error('username') is-invalid @enderror" id="username" name="username" placeholder="Username">
                @error('username')
                  <div class="invalid-feedback ps-1 pt-1">
                    {{ $message }}
                  </div>
                @enderror
              </div>
            </div>
            <div class="col-sm-6">
              <div class="mb-3">
                <label for="oldpass" class="form-label">Password Lama*</label>
                <input type="password" class="form-control @error('oldpass') is-invalid @enderror" id="oldpass" name="oldpass" placeholder="Password Lama">
                @error('oldpass')
                  <div class="invalid-feedback ps-1 pt-1">
                    {{ $message }}
                  </div>
                @enderror
              </div>
            </div>
            <div class="col-sm-6">
              <div class="mb-3">
                <label for="password" class="form-label">Password Baru*</label>
                <input type="password" class="form-control @error('password') is-invalid @enderror" id="password" name="password" placeholder="Password Baru">
                @error('password')
                  <div class="invalid-feedback ps-1 pt-1">
                    {{ $message }}
                  </div>
                @enderror
              </div>
            </div>
            <div class="col-sm-6">
              <div class="mb-3">
                <label for="confirm" class="form-label">Konfirmasi Password*</label>
                <input type="password" class="form-control @error('confirm') is-invalid @enderror" id="confirm" name="confirm" placeholder="Ulangi Password">
                @error('confirm')
                  <div class="invalid-feedback ps-1 pt-1">
                    {{ $message }}
                  </div>
                @enderror
              </div>
            </div>
          </div>
          <div class="text-end mt-3">
            <button type="submit" class="profile-button btn">Ubah Profile</button>
          </div>
        </form>
      </div>
    </section>
    {{-- End of Profile --}}

  </div>
</article>

@endsection