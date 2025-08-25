@extends('layouts.auth-layout')

@section('title', 'User Login')

@section('content')
  <div class="text-center mb-4">
    <div class="mx-auto mb-2 w-16 h-16 flex items-center justify-center rounded-xl bg-gradient-to-br from-accent to-emerald-400">
      <!-- SVG lebih besar -->
      <svg width="24" height="24" viewBox="0 0 24 24" fill="white">
        <path d="M18.92 6.01C18.72 5.42 18.16 5 17.5 5h-11c-.66 0-1.22.42-1.42 1.01L3 12v8c0 .55.45 1 1 1h1c.55 0 1-.45 1-1v-1h12v1c0 .55.45 1 1 1h1c.55 0 1-.45 1-1v-8l-2.08-5.99zM6.5 16c-.83 0-1.5-.67-1.5-1.5S5.67 13 6.5 13s1.5.67 1.5 1.5S7.33 16 6.5 16zm11 0c-.83 0-1.5-.67-1.5-1.5s.67-1.5 1.5-1.5 1.5.67 1.5 1.5-.67 1.5-1.5 1.5zM5 11l1.5-4.5h11L19 11H5z"/>
      </svg>
    </div>
    <h1 class="text-lg font-bold gradient-text mb-1">Selamat Datang</h1>
    <p class="text-sm text-text-muted">Sistem Peminjaman Kendaraan Dinas BPJS Ketenagakerjaan</p>
  </div>
  @if($errors->any())
    <div class="bg-error/10 border border-error/30 text-error p-2 mb-2 rounded text-xs">
      <ul class="ml-4 list-disc">
        @foreach ($errors->all() as $error)
          <li>{{ $error }}</li>
        @endforeach
      </ul>
    </div>
  @endif
  <form method="POST" action="{{ url('/user/login') }}" class="space-y-3" id="loginForm">
    @csrf
    <div>
      <label for="email" class="block text-sm font-semibold mb-1">Email</label>
      <input type="email" id="email" name="email" value="{{ old('email') }}" required autofocus autocomplete="email" class="w-full py-2 px-3 rounded bg-surface-light/60 border border-white/20 focus:border-accent focus:ring-2 focus:ring-accent/30 focus:outline-none placeholder-text-muted text-sm transition-all duration-300 input-focus backdrop-blur-sm" placeholder="Enter your email address">
    </div>
    <div>
      <label for="password" class="block text-sm font-semibold mb-1">Password</label>
      <input type="password" id="passwordInput" name="password" required autocomplete="current-password" class="w-full py-2 px-3 rounded bg-surface-light/60 border border-white/20 focus:border-accent focus:ring-2 focus:ring-accent/30 focus:outline-none placeholder-text-muted text-sm transition-all duration-300 input-focus backdrop-blur-sm" placeholder="Enter your password">
    </div>
    <div class="flex justify-end">
      <a href="{{ route('user.password.request') }}" class="text-xs text-accent hover:underline">Forgot password?</a>
    </div>
    <button type="submit" class="w-full py-2 rounded bg-accent text-white text-base font-semibold">Sign In</button>
  </form>
  <div class="text-center pt-3 border-t border-white/20 mt-3">
    <p class="text-sm text-text-muted mb-1">Belum punya akun?</p>
    <a href="{{ route('user.register') }}" class="text-sm text-accent hover:underline">Buat Akun</a>
  </div>
@endsection
