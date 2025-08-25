@extends('layouts.auth-layout')

@section('title', 'User Register')

@section('content')
  <div class="text-center mb-2">
    <div class="mx-auto mb-1 w-12 h-12 flex items-center justify-center rounded-xl bg-gradient-to-br from-accent to-emerald-400">
      <!-- SVG user icon -->
      <svg width="24" height="24" viewBox="0 0 24 24" fill="white">
        <path d="M5.121 17.804A9 9 0 0112 15a9 9 0 016.879 2.804M15 11a3 3 0 11-6 0 3 3 0 016 0z" />
      </svg>
    </div>
    <h1 class="text-lg font-bold gradient-text mb-0.5">Buat Akun Baru</h1>
    <p class="text-sm text-text-muted">Sistem Peminjaman Kendaraan Dinas BPJS Ketenagakerjaan</p>
  </div>
  @if($errors->any())
    <div class="bg-error/10 border border-error/30 text-error p-2 mb-2 rounded text-xs break-words">
      <ul class="ml-4 list-disc">
        @foreach ($errors->all() as $error)
          <li>{{ $error }}</li>
        @endforeach
      </ul>
    </div>
  @endif
  <form method="POST" action="{{ url('/user/register') }}" class="space-y-2 w-full" autocomplete="off">
    @csrf
    <div>
      <label for="name" class="block text-sm font-semibold mb-0.5">Nama</label>
      <input type="text" id="name" name="name" value="{{ old('name') }}" required autofocus autocomplete="name" class="w-full py-2 px-3 rounded bg-surface-light/60 border border-white/20 focus:border-accent focus:ring-2 focus:ring-accent/30 focus:outline-none placeholder-text-muted text-sm transition-all duration-300 input-focus backdrop-blur-sm" placeholder="Nama Lengkap">
    </div>
    <div>
      <label for="email" class="block text-sm font-semibold mb-0.5">Email</label>
      <input type="email" id="email" name="email" value="{{ old('email') }}" required autocomplete="email" class="w-full py-2 px-3 rounded bg-surface-light/60 border border-white/20 focus:border-accent focus:ring-2 focus:ring-accent/30 focus:outline-none placeholder-text-muted text-sm transition-all duration-300 input-focus backdrop-blur-sm" placeholder="Email">
    </div>
    <div>
      <label for="password" class="block text-sm font-semibold mb-0.5">Password</label>
      <input type="password" id="password" name="password" required autocomplete="new-password" class="w-full py-2 px-3 rounded bg-surface-light/60 border border-white/20 focus:border-accent focus:ring-2 focus:ring-accent/30 focus:outline-none placeholder-text-muted text-sm transition-all duration-300 input-focus backdrop-blur-sm" placeholder="Password">
    </div>
    <div>
      <label for="password_confirmation" class="block text-sm font-semibold mb-0.5">Konfirmasi Password</label>
      <input type="password" id="password_confirmation" name="password_confirmation" required autocomplete="new-password" class="w-full py-2 px-3 rounded bg-surface-light/60 border border-white/20 focus:border-accent focus:ring-2 focus:ring-accent/30 focus:outline-none placeholder-text-muted text-sm transition-all duration-300 input-focus backdrop-blur-sm" placeholder="Konfirmasi Password">
    </div>
    <button type="submit" class="w-full py-2 rounded bg-accent text-white text-base font-semibold">Register</button>
  </form>
  <div class="text-center pt-2 border-t border-white/20 mt-2">
    <p class="text-sm text-text-muted mb-0.5">Sudah punya akun?</p>
    <a href="{{ route('user.login') }}" class="text-sm text-accent hover:underline">Login di sini</a>
  </div>
@endsection
