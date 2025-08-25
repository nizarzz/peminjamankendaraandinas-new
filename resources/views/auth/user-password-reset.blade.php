@extends('layouts.auth-layout')

@section('title', 'Reset Sandi User')

@section('content')
  <div class="text-center mb-2">
    <div class="mx-auto mb-1 w-12 h-12 flex items-center justify-center rounded-xl bg-gradient-to-br from-accent to-emerald-400">
      <svg width="20" height="20" viewBox="0 0 24 24" fill="white">
        <path d="M12 15v2m6 4H6a2 2 0 01-2-2V10a2 2 0 012-2h1V6a5 5 0 0110 0v2h1a2 2 0 012 2v9a2 2 0 01-2 2z" />
      </svg>
    </div>
    <h1 class="text-lg font-bold gradient-text mb-0.5">Reset Sandi</h1>
    <p class="text-sm text-text-muted">Masukkan sandi baru Anda</p>
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
  <form method="POST" action="{{ route('user.password.update') }}" class="space-y-2 w-full">
    @csrf
    <input type="hidden" name="token" value="{{ $token }}">
    <input type="hidden" name="email" value="{{ $email }}">
    <div>
      <label for="password" class="block text-sm font-semibold mb-0.5">Password Baru</label>
      <input type="password" id="password" name="password" required autocomplete="new-password" class="w-full py-2 px-3 rounded bg-surface-light/60 border border-white/20 focus:border-accent focus:ring-2 focus:ring-accent/30 focus:outline-none placeholder-text-muted text-sm transition-all duration-300 input-focus backdrop-blur-sm" placeholder="Password baru">
    </div>
    <div>
      <label for="password_confirmation" class="block text-sm font-semibold mb-0.5">Konfirmasi Password Baru</label>
      <input type="password" id="password_confirmation" name="password_confirmation" required autocomplete="new-password" class="w-full py-2 px-3 rounded bg-surface-light/60 border border-white/20 focus:border-accent focus:ring-2 focus:ring-accent/30 focus:outline-none placeholder-text-muted text-sm transition-all duration-300 input-focus backdrop-blur-sm" placeholder="Konfirmasi password baru">
    </div>
    <button type="submit" class="w-full py-2 rounded bg-accent text-white text-base font-semibold">Reset Password</button>
    <div class="text-center pt-2 border-t border-white/20 mt-2">
      <a href="{{ route('user.login') }}" class="text-sm text-accent hover:underline">Kembali ke login</a>
    </div>
  </form>
@endsection 