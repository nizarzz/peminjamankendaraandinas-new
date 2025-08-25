@extends('layouts.admin-auth')

@section('title', 'Lupa Sandi Admin')

@section('content')
<div class="glass-effect p-8 rounded-2xl shadow-card border border-blue-500/20">
  <div class="text-center mb-6">
    <h2 class="text-2xl font-semibold">Lupa Sandi Admin</h2>
    <p class="text-sm text-gray-400">Masukkan email admin untuk reset sandi</p>
  </div>

  @if (session('status'))
    <div class="bg-green-500/10 border-l-4 border-green-500 text-green-400 p-4 mb-5 rounded-md text-sm">
      {{ session('status') }}
    </div>
  @endif
  @if($errors->any())
    <div class="bg-red-500/10 border-l-4 border-error text-error p-4 mb-5 rounded-md text-sm">
      <ul class="space-y-1">
        @foreach ($errors->all() as $error)
          <li>{{ $error }}</li>
        @endforeach
      </ul>
    </div>
  @endif

  <form method="POST" action="{{ route('admin.password.email') }}" class="space-y-5">
    @csrf
    <div class="relative">
      <span class="absolute inset-y-0 left-0 flex items-center pl-3 text-gray-400">
        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
          <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 12l-4-4-4 4m0 0l4 4 4-4m-4-4v12" />
        </svg>
      </span>
      <input type="email" name="email" value="{{ old('email') }}" required autofocus
             class="w-full pl-10 pr-4 py-2 rounded-lg bg-gray-800 border border-gray-700 focus:border-accent focus:ring-2 focus:ring-accent focus:outline-none placeholder-gray-500 text-sm transition"
             placeholder="Email admin">
    </div>
    <button type="submit"
            class="w-full bg-accent text-black font-semibold py-2.5 rounded-lg hover:bg-green-500 transition duration-200">
      Kirim Link Reset
    </button>
    <p class="text-center text-sm text-gray-400 mt-4">
      <a href="{{ route('admin.login') }}" class="text-accent hover:underline">Kembali ke login admin</a>
    </p>
  </form>
</div>
@endsection 