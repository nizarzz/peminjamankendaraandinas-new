@extends('layouts.auth-layout')

@section('title', 'Lupa Sandi User')

@section('content')
  <div class="text-center mb-2">
    <div class="mx-auto mb-1 w-12 h-12 flex items-center justify-center rounded-xl bg-gradient-to-br from-accent to-emerald-400">
      <svg width="20" height="20" viewBox="0 0 24 24" fill="white">
        <path d="M16 12l-4-4-4 4m0 0l4 4 4-4m-4-4v12" />
      </svg>
    </div>
    <h1 class="text-lg font-bold gradient-text mb-0.5">Lupa Sandi</h1>
    <p class="text-sm text-text-muted">Masukkan email Anda untuk reset sandi</p>
  </div>
  @if (session('status'))
    <div class="bg-green-500/10 border border-green-500 text-green-400 p-2 mb-2 rounded text-xs break-words">
      {{ session('status') }}
    </div>
  @endif
  @if($errors->any())
    <div class="bg-error/10 border border-error/30 text-error p-2 mb-2 rounded text-xs break-words">
      <ul class="ml-4 list-disc">
        @foreach ($errors->all() as $error)
          <li>{{ $error }}</li>
        @endforeach
      </ul>
    </div>
  @endif
  <form method="POST" action="{{ route('user.password.email') }}" class="space-y-2 w-full">
    @csrf
    <div>
      <label for="email" class="block text-sm font-semibold mb-0.5">Email</label>
      <input type="email" id="email" name="email" value="{{ old('email') }}" required autofocus autocomplete="email" class="w-full py-2 px-3 rounded bg-surface-light/60 border border-white/20 focus:border-accent focus:ring-2 focus:ring-accent/30 focus:outline-none placeholder-text-muted text-sm transition-all duration-300 input-focus backdrop-blur-sm" placeholder="Email">
    </div>
    <button type="submit" class="w-full py-2 rounded bg-accent text-white text-base font-semibold">Kirim Link Reset</button>
    <div class="text-center pt-2 border-t border-white/20 mt-2">
      <a href="{{ route('user.login') }}" class="text-sm text-accent hover:underline">Kembali ke login</a>
    </div>
  </form>
@endsection 