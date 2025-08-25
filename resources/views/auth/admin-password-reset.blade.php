@extends('layouts.admin-auth')

@section('title', 'Reset Password Admin')

@section('content')
<div class="glass-effect p-8 rounded-2xl shadow-card border border-blue-500/20">
  <div class="text-center mb-6">
    <h2 class="text-2xl font-semibold">Reset Password Admin</h2>
    <p class="text-sm text-gray-400">Masukkan password baru Anda</p>
  </div>
  @if(session('status'))
    <div class="bg-blue-500/10 border-l-4 border-blue-500 text-blue-400 p-4 mb-5 rounded-md text-sm">
      {{ session('status') }}
    </div>
  @endif
  @if($errors->any())
    <div class="bg-red-500/10 border-l-4 border-red-500 text-red-400 p-4 mb-5 rounded-md text-sm">
      <ul class="space-y-1">
        @foreach ($errors->all() as $error)
          <li>{{ $error }}</li>
        @endforeach
      </ul>
    </div>
  @endif
  <form method="POST" action="{{ route('admin.password.reset.update') }}" class="space-y-5">
    @csrf
    <input type="hidden" name="token" value="{{ $token }}">
    <input type="hidden" name="email" value="{{ $email }}">
    <div>
      <label for="password" class="block text-sm font-semibold mb-1">Password Baru</label>
      <input type="password" id="password" name="password" required autocomplete="new-password"
             class="w-full px-3 py-2 rounded bg-gray-700 border border-gray-600 focus:border-blue-500 focus:ring-2 focus:ring-blue-500/30 focus:outline-none placeholder-gray-400 text-sm transition"
             placeholder="Password baru">
    </div>
    <div>
      <label for="password_confirmation" class="block text-sm font-semibold mb-1">Konfirmasi Password Baru</label>
      <input type="password" id="password_confirmation" name="password_confirmation" required autocomplete="new-password"
             class="w-full px-3 py-2 rounded bg-gray-700 border border-gray-600 focus:border-blue-500 focus:ring-2 focus:ring-blue-500/30 focus:outline-none placeholder-gray-400 text-sm transition"
             placeholder="Konfirmasi password baru">
    </div>
    <button type="submit"
            class="w-full bg-blue-500 text-white font-semibold py-2.5 rounded-lg hover:bg-blue-400 transition duration-200">
      Reset Password
    </button>
    <p class="text-center text-sm text-gray-400 mt-4">
      <a href="{{ route('admin.login') }}" class="text-blue-400 hover:underline">Kembali ke login admin</a>
    </p>
  </form>
</div>
@endsection 