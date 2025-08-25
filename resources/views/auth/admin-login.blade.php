@extends('layouts.admin-auth')

@section('title', 'Login Admin')

@section('content')
@if($errors->any())
  <div class="bg-red-500/10 border border-red-500/20 text-red-400 p-4 mb-6 rounded-2xl text-sm backdrop-blur-sm animate-fade-in">
    <div class="flex items-start gap-3">
      <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mt-0.5 flex-shrink-0" fill="none" viewBox="0 0 24 24" stroke="currentColor">
        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 9v2m0 4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
      </svg>
      <div>
        @foreach ($errors->all() as $error)
          <p>{{ $error }}</p>
        @endforeach
      </div>
    </div>
  </div>
@endif

<form method="POST" action="{{ url('/admin/login') }}" class="space-y-5">
  @csrf

  <!-- Email Field -->
  <div class="space-y-2">
    <label for="email" class="block text-sm font-medium text-gray-300">Email Address</label>
    <div class="relative group">
      <div class="absolute inset-y-0 left-0 flex items-center pl-4 text-gray-400 group-focus-within:text-blue-400 transition-colors">
        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
          <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 12a4 4 0 10-8 0 4 4 0 008 0zm0 0v1.5a2.5 2.5 0 005 0V12a9 9 0 10-9 9m4.5-1.206a8.959 8.959 0 01-4.5 1.207" />
        </svg>
      </div>
      <input id="email" name="email" type="email" required autofocus
             value="{{ old('email') }}"
             class="w-full pl-12 pr-4 py-3 rounded-2xl bg-surface-light border border-slate-600 focus:border-blue-500 focus:ring-2 focus:ring-blue-500/20 focus:outline-none placeholder-gray-500 text-white transition-all duration-200 input-glow"
             placeholder="admin@example.com">
    </div>
  </div>

  <!-- Password Field -->
  <div class="space-y-2">
    <label for="password" class="block text-sm font-medium text-gray-300">Password</label>
    <div class="relative group">
      <div class="absolute inset-y-0 left-0 flex items-center pl-4 text-gray-400 group-focus-within:text-blue-400 transition-colors">
        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
          <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 15v2m-6 4h12a1 1 0 001-1v-6a1 1 0 00-1-1H6a1 1 0 00-1 1v6a1 1 0 001 1zm10-10V7a4 4 0 00-8 0v4h8z" />
        </svg>
      </div>
      <input id="password" name="password" type="password" required
             class="w-full pl-12 pr-4 py-3 rounded-2xl bg-surface-light border border-slate-600 focus:border-blue-500 focus:ring-2 focus:ring-blue-500/20 focus:outline-none placeholder-gray-500 text-white transition-all duration-200 input-glow"
             placeholder="••••••••••">
    </div>
  </div>

  <!-- Remember Me & Forgot Password -->
  <div class="flex items-center justify-between text-sm">
    <label class="flex items-center space-x-2 cursor-pointer group">
      <input type="checkbox" name="remember" class="w-4 h-4 rounded border-slate-600 bg-surface-light text-blue-500 focus:ring-blue-500 focus:ring-2 focus:ring-offset-0">
      <span class="text-gray-400 group-hover:text-gray-300 transition-colors">Remember me</span>
    </label>
    <a href="{{ route('admin.password.request') }}" class="text-blue-400 hover:text-blue-300 transition-colors font-medium">
      Forgot password?
    </a>
  </div>

  <!-- Login Button -->
  <button type="submit"
          class="w-full bg-gradient-to-r from-blue-600 to-blue-700 hover:from-blue-500 hover:to-blue-600 text-white font-semibold py-3 rounded-2xl transition-all duration-200 transform hover:scale-[1.02] hover:shadow-glow focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-offset-2 focus:ring-offset-dark">
    <div class="flex items-center justify-center gap-2">
      <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 16l-4-4m0 0l4-4m-4 4h14m-5 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013 3v1" />
      </svg>
      Sign In to Dashboard
    </div>
  </button>

  <!-- Divider -->
  <div class="relative my-5">
    <div class="absolute inset-0 flex items-center">
      <div class="w-full border-t border-slate-600"></div>
    </div>
    <div class="relative flex justify-center text-sm">
      <span class="px-4 bg-surface text-gray-400">or</span>
    </div>
  </div>

  <!-- Create Account Link -->
  <div class="text-center">
    <p class="text-gray-400 text-sm">
      Don't have an account?
      <a href="{{ route('admin.register') }}" class="text-blue-400 hover:text-blue-300 font-medium transition-colors ml-1">
        Create one here
      </a>
    </p>
  </div>
</form>

<!-- Loading Animation Script -->
<script>
  // Add loading state to form submission
  document.querySelector('form').addEventListener('submit', function(e) {
    const button = this.querySelector('button[type="submit"]');
    const originalContent = button.innerHTML;
    
    button.innerHTML = `
      <div class="flex items-center justify-center gap-2">
        <svg class="animate-spin h-5 w-5" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24">
          <circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4"></circle>
          <path class="opacity-75" fill="currentColor" d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4zm2 5.291A7.962 7.962 0 014 12H0c0 3.042 1.135 5.824 3 7.938l3-2.647z"></path>
        </svg>
        Signing in...
      </div>
    `;
    button.disabled = true;
    
    // Reset button if form validation fails
    setTimeout(() => {
      button.innerHTML = originalContent;
      button.disabled = false;
    }, 3000);
  });

  // Add smooth focus transitions
  document.querySelectorAll('input').forEach(input => {
    input.addEventListener('focus', function() {
      this.parentElement.classList.add('scale-[1.02]');
    });
    
    input.addEventListener('blur', function() {
      this.parentElement.classList.remove('scale-[1.02]');
    });
  });
</script>
@endsection