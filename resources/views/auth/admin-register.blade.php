@extends('layouts.admin-auth')

@section('title', 'Admin Register')

@section('content')
    @if($errors->any())
      <div class="bg-red-500/10 border-l-4 border-error text-error p-4 mb-5 rounded-md text-sm">
        <ul class="space-y-1">
          @foreach ($errors->all() as $error)
            <li class="flex gap-2 items-start">
              <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 mt-1" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                      d="M12 9v2m0 4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
              </svg>
              {{ $error }}
            </li>
          @endforeach
        </ul>
      </div>
    @endif

    <form method="POST" action="{{ route('admin.register') }}" class="space-y-5">
      @csrf

      <div class="relative">
        <span class="absolute inset-y-0 left-0 flex items-center pl-3 text-gray-400">
          <!-- Heroicon: User -->
          <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none"
               viewBox="0 0 24 24" stroke="currentColor">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                  d="M5.121 17.804A10.97 10.97 0 0112 15c2.5 0 4.847.832 6.879 2.235M15 11a3 3 0 11-6 0 3 3 0 016 0z" />
          </svg>
        </span>
        <input type="text" name="name" value="{{ old('name') }}" required autofocus
               class="w-full pl-10 pr-4 py-2 rounded-lg bg-gray-800 border border-gray-700 focus:border-accent focus:ring-2 focus:ring-accent focus:outline-none placeholder-gray-500 text-sm transition"
               placeholder="Full Name">
      </div>

      <div class="relative">
        <span class="absolute inset-y-0 left-0 flex items-center pl-3 text-gray-400">
          <!-- Heroicon: Envelope -->
          <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none"
               viewBox="0 0 24 24" stroke="currentColor">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                  d="M16 12l-4-4-4 4m0 0l4 4 4-4m-4-4v12" />
          </svg>
        </span>
        <input type="email" name="email" value="{{ old('email') }}" required
               class="w-full pl-10 pr-4 py-2 rounded-lg bg-gray-800 border border-gray-700 focus:border-accent focus:ring-2 focus:ring-accent focus:outline-none placeholder-gray-500 text-sm transition"
               placeholder="Email">
      </div>

      <div class="relative">
        <span class="absolute inset-y-0 left-0 flex items-center pl-3 text-gray-400">
          <!-- Heroicon: Lock Closed -->
          <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none"
               viewBox="0 0 24 24" stroke="currentColor">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                  d="M12 15v2m6 4H6a2 2 0 01-2-2V10a2 2 0 012-2h1V6a5 5 0 0110 0v2h1a2 2 0 012 2v9a2 2 0 01-2 2z" />
          </svg>
        </span>
        <input type="password" name="password" required
               class="w-full pl-10 pr-4 py-2 rounded-lg bg-gray-800 border border-gray-700 focus:border-accent focus:ring-2 focus:ring-accent focus:outline-none placeholder-gray-500 text-sm transition"
               placeholder="Password">
      </div>

      <div class="relative">
        <span class="absolute inset-y-0 left-0 flex items-center pl-3 text-gray-400">
          <!-- Heroicon: Lock Closed -->
          <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none"
               viewBox="0 0 24 24" stroke="currentColor">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                  d="M12 15v2m6 4H6a2 2 0 01-2-2V10a2 2 0 012-2h1V6a5 5 0 0110 0v2h1a2 2 0 012 2v9a2 2 0 01-2 2z" />
          </svg>
        </span>
        <input type="password" name="password_confirmation" required
               class="w-full pl-10 pr-4 py-2 rounded-lg bg-gray-800 border border-gray-700 focus:border-accent focus:ring-2 focus:ring-accent focus:outline-none placeholder-gray-500 text-sm transition"
               placeholder="Confirm Password">
      </div>

      <button type="submit"
              class="w-full bg-accent text-black font-semibold py-2.5 rounded-lg hover:bg-emerald-400 transition duration-200">
        Register
      </button>

      <p class="text-center text-sm text-gray-400 mt-4">
        Already have an account?
        <a href="{{ route('admin.login') }}" class="text-accent hover:underline">Login here</a>
      </p>
    </form>
@endsection
