<header class="w-full bg-white/90 shadow-sm sticky top-0 z-40 border-b border-gray-100">
  <div class="max-w-7xl mx-auto flex items-center justify-between px-4 py-3">
    <div class="flex items-center gap-3">
      <img src="{{ asset('assets/img/bpjs.png') }}" alt="Logo" class="w-10 h-10 rounded-xl shadow-md" />
      <span class="font-bold text-lg text-blue-700 tracking-tight">Sistem Peminjaman Kendaraan Dinas</span>
    </div>
    <div class="flex items-center gap-4">
      @if(Auth::guard('admin')->check())
        <div class="relative group">
          <button class="flex items-center gap-2 px-3 py-1 bg-blue-50 hover:bg-blue-100 text-blue-700 rounded-lg font-medium transition">
            <i class="bi bi-person-circle text-xl"></i>
            <span class="hidden sm:inline">{{ Auth::guard('admin')->user()->name }}</span>
            <svg class="w-4 h-4 ml-1" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7" /></svg>
          </button>
          <div class="absolute right-0 mt-2 w-40 bg-white border border-gray-100 rounded-lg shadow-lg py-2 opacity-0 group-hover:opacity-100 pointer-events-none group-hover:pointer-events-auto transition-opacity duration-200 z-50">
            <a href="{{ route('admin.profile') }}" class="block px-4 py-2 text-gray-700 hover:bg-blue-50">Profil</a>
            <form action="{{ route('admin.logout') }}" method="POST" class="block">
              @csrf
              <button type="submit" class="w-full text-left px-4 py-2 text-red-600 hover:bg-red-50">Logout</button>
            </form>
          </div>
        </div>
      @endif
    </div>
  </div>
</header>
