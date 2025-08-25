<div id="overlay" 
         class="fixed inset-0 bg-black/30 backdrop-blur-sm z-40 hidden opacity-0 transition-opacity duration-300 md:hidden" 
         aria-hidden="true">
    </div>
        
    <!-- Sidebar Wrapper -->
    <div id="sidebarWrapper"
         class="fixed top-0 left-0 bottom-0 z-50 flex flex-col rounded-t-3xl rounded-b-3xl md:rounded-r-3xl overflow-hidden sidebar-transition shadow-2xl w-[92vw] max-w-[340px] md:w-[280px] md:max-w-[280px] md:block transition-all duration-500 ease-out transform -translate-x-full md:translate-x-0"
         role="navigation"
         aria-label="Sidebar navigation">
      
        <aside id="sidebar" class="h-full flex flex-col bg-white relative overflow-hidden border-r border-gray-100">
            
            <!-- Background Pattern -->
            <div class="absolute inset-0 opacity-5 pointer-events-none">
                <div class="absolute top-0 left-0 w-full h-full bg-gradient-to-br from-blue-500/10 via-transparent to-indigo-500/10"></div>
                <div class="absolute top-1/4 left-1/4 w-32 h-32 bg-blue-500/5 rounded-full blur-xl animate-pulse"></div>
                <div class="absolute bottom-1/4 right-1/4 w-24 h-24 bg-indigo-500/5 rounded-full blur-xl animate-pulse animation-delay-1000"></div>
            </div>
        
            <!-- Enhanced User Info Header with Fixed Logo -->
            <header class="relative flex items-center gap-3 px-4 py-5 border-b border-blue-200 bg-gradient-to-r from-blue-200 via-blue-100 to-indigo-100 shadow-lg sticky top-0 z-20">
                <!-- Close button for mobile -->
                <button type="button" 
                        id="closeSidebarBtn"
                        class="absolute top-3 right-3 md:hidden p-2 rounded-full bg-white/90 hover:bg-white text-blue-600 shadow-lg transition-all duration-200 hover:scale-105 z-20" 
                        aria-label="Tutup Sidebar">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12" />
                    </svg>
                </button>
                
                <div class="logo-container flex-shrink-0">
                    <div class="relative flex items-center justify-center w-20 h-20 md:w-24 md:h-24 bg-white rounded-full shadow-lg border-4 border-blue-100 logo-glow">
                        <!-- Logo with improved loading -->
                        <img src="{{ asset('assets/img/bpjs.png') }}" 
                             alt="BPJS Ketenagakerjaan" 
                             class="logo-image"
                             loading="eager"
                             decoding="sync"
                             fetchpriority="high" />
                        <!-- Status Indicator -->
                        <div class="absolute -bottom-1 -right-1 w-4 h-4 bg-green-400 rounded-full border-2 border-white shadow-lg flex items-center justify-center">
                            <div class="w-1.5 h-1.5 bg-white rounded-full animate-pulse"></div>
                        </div>
                    </div>
                </div>
                
                <div class="flex-1 min-w-0 pr-8 md:pr-0">
                    <h2 class="font-bold text-base md:text-lg text-gray-800 leading-tight tracking-tight truncate">
                        {{ Auth::guard('admin')->check() && Auth::guard('admin')->user() ? Auth::guard('admin')->user()->name : 'Admin' }}
                    </h2>
                    <p class="text-xs md:text-sm text-gray-600 font-medium">Administrator</p>
                    <div class="flex items-center gap-2 mt-1">
                        <div class="w-1.5 h-1.5 bg-green-400 rounded-full animate-pulse"></div>
                        <span class="text-xs text-green-600 font-medium">Online</span>
                    </div>
                </div>
            </header>
        
            <!-- Navigation Menu -->
            <nav class="flex-1 pt-6 pb-6 px-4 space-y-2 overflow-y-auto custom-scrollbar" role="menubar">
                
                <!-- Dashboard -->
                <a href="{{ route('admin.dashboard') }}"
                   class="nav-link group relative flex items-center gap-4 px-4 py-4 rounded-2xl font-semibold text-base transition-all duration-300 hover:scale-[1.02] {{ request()->routeIs('admin.dashboard') ? 'bg-gradient-to-r from-blue-500 to-indigo-600 text-white' : 'text-gray-700 hover:bg-gray-50 hover:text-gray-900' }}"
                   role="menuitem"
                   aria-current="{{ request()->routeIs('admin.dashboard') ? 'page' : 'false' }}">
                    <div class="nav-icon flex-shrink-0 w-11 h-11 rounded-xl flex items-center justify-center {{ request()->routeIs('admin.dashboard') ? 'bg-white/20 shadow-inner' : 'bg-blue-50 group-hover:bg-blue-100' }} transition-all duration-300">
                        <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6 {{ request()->routeIs('admin.dashboard') ? 'text-white' : 'text-blue-600' }}" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="1.7" aria-hidden="true">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M3 12l9-9 9 9M4 10v10a1 1 0 001 1h3m10-11v11a1 1 0 001 1h3m-10 0h4" />
                        </svg>
                    </div>
                    <span class="truncate">Dashboard</span>
                </a>
        
                <!-- Persetujuan -->
                <a href="{{ route('admin.approvals.index') }}"
                   class="nav-link group relative flex items-center gap-4 px-4 py-4 rounded-2xl font-semibold text-base transition-all duration-300 hover:scale-[1.02] {{ request()->routeIs('admin.approvals.index') ? 'bg-gradient-to-r from-blue-500 to-indigo-600 text-white' : 'text-gray-700 hover:bg-gray-50 hover:text-gray-900' }}"
                   role="menuitem"
                   aria-current="{{ request()->routeIs('admin.approvals.index') ? 'page' : 'false' }}">
                    <div class="nav-icon flex-shrink-0 w-11 h-11 rounded-xl flex items-center justify-center {{ request()->routeIs('admin.approvals.index') ? 'bg-white/20 shadow-inner' : 'bg-emerald-50 group-hover:bg-emerald-100' }} transition-all duration-300">
                        <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6 {{ request()->routeIs('admin.approvals.index') ? 'text-white' : 'text-emerald-600' }}" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="1.7" aria-hidden="true">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M17 9l-5 5-2-2m9-2a9 9 0 11-18 0 9 9 0 0118 0z" />
                        </svg>
                    </div>
                    <span class="truncate">Persetujuan</span>
                </a>
        
                <!-- Data Kendaraan -->
                <a href="{{ route('vehicles.index') }}"
                   class="nav-link group relative flex items-center gap-4 px-4 py-4 rounded-2xl font-semibold text-base transition-all duration-300 hover:scale-[1.02] {{ request()->routeIs('vehicles.index') || request()->routeIs('vehicles.create') ? 'bg-gradient-to-r from-blue-500 to-indigo-600 text-white' : 'text-gray-700 hover:bg-gray-50 hover:text-gray-900' }}"
                   role="menuitem"
                   aria-current="{{ request()->routeIs('vehicles.index') || request()->routeIs('vehicles.create') ? 'page' : 'false' }}">
                    <div class="nav-icon flex-shrink-0 w-11 h-11 rounded-xl flex items-center justify-center {{ request()->routeIs('vehicles.index') || request()->routeIs('vehicles.create') ? 'bg-white/20 shadow-inner' : 'bg-amber-50 group-hover:bg-amber-100' }} transition-all duration-300">
                        <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6 {{ request()->routeIs('vehicles.index') || request()->routeIs('vehicles.create') ? 'text-white' : 'text-amber-600' }}" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="1.7" aria-hidden="true">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M4 17v-3a2 2 0 012-2h12a2 2 0 012 2v3M4 17h16M7 17a2 2 0 104 0 2 2 0 00-4 0zm6 0a2 2 0 104 0 2 2 0 00-4 0zM5 10l1.5-4.5A2 2 0 018.5 4h7a2 2 0 011.95 1.5L19 10" />
                        </svg>
                    </div>
                    <span class="truncate">Data Kendaraan</span>
                </a>
        
                <!-- Data Pengembalian -->
                <a href="{{ route('admin.return.index') }}"
                   class="nav-link group relative flex items-center gap-4 px-4 py-4 rounded-2xl font-semibold text-base transition-all duration-300 hover:scale-[1.02] {{ request()->routeIs('admin.return.index') ? 'bg-gradient-to-r from-blue-500 to-indigo-600 text-white' : 'text-gray-700 hover:bg-gray-50 hover:text-gray-900' }}"
                   role="menuitem"
                   aria-current="{{ request()->routeIs('admin.return.index') ? 'page' : 'false' }}">
                    <div class="nav-icon flex-shrink-0 w-11 h-11 rounded-xl flex items-center justify-center {{ request()->routeIs('admin.return.index') ? 'bg-white/20 shadow-inner' : 'bg-purple-50 group-hover:bg-purple-100' }} transition-all duration-300">
                        <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6 {{ request()->routeIs('admin.return.index') ? 'text-white' : 'text-purple-600' }}" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="1.7" aria-hidden="true">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M19 14v7H5v-7M12 3v11m0 0l-4-4m4 4l4-4" />
                        </svg>
                    </div>
                    <span class="truncate">Data Pengembalian</span>
                </a>
        
                <!-- Data Peminjaman -->
                <a href="{{ route('admin.daftarpeminjaman.index') }}"
                   class="nav-link group relative flex items-center gap-4 px-4 py-4 rounded-2xl font-semibold text-base transition-all duration-300 hover:scale-[1.02] {{ request()->routeIs('admin.daftarpeminjaman.index') ? 'bg-gradient-to-r from-blue-500 to-indigo-600 text-white' : 'text-gray-700 hover:bg-gray-50 hover:text-gray-900' }}"
                   role="menuitem"
                   aria-current="{{ request()->routeIs('admin.daftarpeminjaman.index') ? 'page' : 'false' }}">
                    <div class="nav-icon flex-shrink-0 w-11 h-11 rounded-xl flex items-center justify-center {{ request()->routeIs('admin.daftarpeminjaman.index') ? 'bg-white/20 shadow-inner' : 'bg-cyan-50 group-hover:bg-cyan-100' }} transition-all duration-300">
                        <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6 {{ request()->routeIs('admin.daftarpeminjaman.index') ? 'text-white' : 'text-cyan-600' }}" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="1.7" aria-hidden="true">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M9 5h6M9 3h6a2 2 0 012 2v14a2 2 0 01-2 2H9a2 2 0 01-2-2V5a2 2 0 012-2zm0 4h6m-6 4h6m-6 4h6" />
                        </svg>
                    </div>
                    <span class="truncate">Data Peminjaman</span>
                </a>
        
                <!-- Kelola User Pegawai -->
                <a href="{{ route('admin.user.index') }}"
                   class="nav-link group relative flex items-center gap-4 px-4 py-4 rounded-2xl font-semibold text-base transition-all duration-300 hover:scale-[1.02] {{ request()->routeIs('admin.user.index') ? 'bg-gradient-to-r from-blue-500 to-indigo-600 text-white' : 'text-gray-700 hover:bg-gray-50 hover:text-gray-900' }}"
                   role="menuitem"
                   aria-current="{{ request()->routeIs('admin.user.index') ? 'page' : 'false' }}">
                    <div class="nav-icon flex-shrink-0 w-11 h-11 rounded-xl flex items-center justify-center {{ request()->routeIs('admin.user.index') ? 'bg-white/20 shadow-inner' : 'bg-pink-50 group-hover:bg-pink-100' }} transition-all duration-300">
                        <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6 {{ request()->routeIs('admin.user.index') ? 'text-white' : 'text-pink-600' }}" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="1.7" aria-hidden="true">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M17 20h5v-2a4 4 0 00-3-3.87M9 20H4v-2a4 4 0 013-3.87m9-5a4 4 0 11-8 0 4 4 0 018 0zm6 8v2a2 2 0 01-2 2H5a2 2 0 01-2-2v-2a6 6 0 016-6h2a6 6 0 016 6z" />
                        </svg>
                    </div>
                    <span class="truncate">Kelola User Pegawai</span>
                </a>
        
                <!-- Audit Trail -->
                <a href="{{ route('admin.audit.index') }}"
                   class="nav-link group relative flex items-center gap-4 px-4 py-4 rounded-2xl font-semibold text-base transition-all duration-300 hover:scale-[1.02] {{ request()->routeIs('admin.audit.index') ? 'bg-gradient-to-r from-blue-500 to-indigo-600 text-white' : 'text-gray-700 hover:bg-gray-50 hover:text-gray-900' }}"
                   role="menuitem"
                   aria-current="{{ request()->routeIs('admin.audit.index') ? 'page' : 'false' }}">
                    <div class="nav-icon flex-shrink-0 w-11 h-11 rounded-xl flex items-center justify-center {{ request()->routeIs('admin.audit.index') ? 'bg-white/20 shadow-inner' : 'bg-gray-100 group-hover:bg-gray-200' }} transition-all duration-300">
                        <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6 {{ request()->routeIs('admin.audit.index') ? 'text-white' : 'text-gray-600' }}" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="1.7" aria-hidden="true">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z" />
                        </svg>
                    </div>
                    <span class="truncate">Audit Trail</span>
                </a>
    
                <!-- Log Aktivitas -->
                <a href="{{ route('admin.logaktivitas') }}"
                   class="nav-link group relative flex items-center gap-4 px-4 py-4 rounded-2xl font-semibold text-base transition-all duration-300 hover:scale-[1.02] {{ request()->routeIs('admin.logaktivitas') ? 'bg-gradient-to-r from-blue-500 to-indigo-600 text-white' : 'text-gray-700 hover:bg-gray-50 hover:text-gray-900' }}"
                   role="menuitem"
                   aria-current="{{ request()->routeIs('admin.logaktivitas') ? 'page' : 'false' }}">
                    <div class="nav-icon flex-shrink-0 w-11 h-11 rounded-xl flex items-center justify-center {{ request()->routeIs('admin.logaktivitas') ? 'bg-white/20 shadow-inner' : 'bg-gray-100 group-hover:bg-gray-200' }} transition-all duration-300">
                    <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6 {{ request()->routeIs('admin.logaktivitas') ? 'text-white' : 'text-gray-600' }}" fill="none" viewBox="0 0 24 24" stroke="currentColor">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z" />
          </svg>
                    </div>
                    <span class="truncate">Log Aktivitas</span>
                </a>
        
                <!-- Divider -->
                <div class="my-6 border-t border-gray-200" role="separator"></div>
        
                <!-- Profile Settings -->
                <a href="{{ route('admin.profile') }}"
                   class="nav-link group relative flex items-center gap-4 px-4 py-4 rounded-2xl font-semibold text-base transition-all duration-300 hover:scale-[1.02] {{ request()->routeIs('admin.profile') ? 'bg-gradient-to-r from-blue-500 to-indigo-600 text-white' : 'text-gray-700 hover:bg-gray-50 hover:text-gray-900' }}"
                   role="menuitem"
                   aria-current="{{ request()->routeIs('admin.profile') ? 'page' : 'false' }}">
                    <div class="nav-icon flex-shrink-0 w-11 h-11 rounded-xl flex items-center justify-center {{ request()->routeIs('admin.profile') ? 'bg-white/20 shadow-inner' : 'bg-blue-50 group-hover:bg-blue-100' }} transition-all duration-300">
                        <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6 {{ request()->routeIs('admin.profile') ? 'text-white' : 'text-blue-600' }}" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="1.7" aria-hidden="true">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M12 12c2.21 0 4-1.79 4-4s-1.79-4-4-4-4 1.79-4 4 1.79 4 4 4zm0 2c-2.67 0-8 1.34-8 4v2h16v-2c0-2.66-5.33-4-8-4z" />
                        </svg>
                    </div>
                    <span class="truncate">Pengaturan Akun</span>
                </a>
        
                <!-- Logout -->
                <button type="button" 
                        onclick="handleLogout()"
                        class="nav-link group relative flex items-center gap-4 px-4 py-4 rounded-2xl font-semibold text-base transition-all duration-300 hover:scale-[1.02] text-red-600 hover:bg-red-50 hover:text-red-700 w-full text-left"
                        role="menuitem">
                    <div class="nav-icon flex-shrink-0 w-11 h-11 rounded-xl bg-red-50 group-hover:bg-red-100 flex items-center justify-center transition-all duration-300">
                        <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6 text-red-600" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="1.7" aria-hidden="true">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a2 2 0 01-2 2H7a2 2 0 01-2-2V7a2 2 0 012-2h4a2 2 0 012 2v1" />
                        </svg>
                    </div>
                    <span class="truncate">Logout</span>
                </button>
        
                <form id="logout-form" action="{{ route('admin.logout') }}" method="POST" class="hidden">
                    @csrf
                </form>
        
                <!-- Version Info -->
                <footer class="mt-8 px-4 py-3 bg-gray-50 rounded-2xl border border-gray-100">
                    <div class="flex items-center justify-between text-xs text-gray-500 font-medium">
                        <span class="flex items-center gap-2">
                            <div class="w-2 h-2 bg-green-400 rounded-full animate-pulse"></div>
                            Version 2.1.0
                        </span>
                        <span>© {{ date('Y') }}</span>
                    </div>
                </footer>
        
            </nav>
        </aside>
    </div>
    
    <style>
        /* Enhanced Sidebar Styling */
        .sidebar-transition {
            transition: transform 0.5s cubic-bezier(0.4, 0, 0.2, 1);
        }
        
        /* Animation Delays */
        .animation-delay-1000 {
            animation-delay: 1s;
        }
        
        /* Fixed Header Styling */
        header {
            backdrop-filter: blur(10px);
            border-bottom: 1px solid rgba(229, 231, 235, 0.8);
        }
        
        /* Logo Container Enhanced - No Hover Transform to Prevent Flicker */
        .logo-container {
            position: relative;
            flex-shrink: 0;
            /* Removed transition and hover transform to prevent flicker */
        }
        
        /* Fixed Logo Image Styling - Completely Stable */
        .logo-image {
            width: 56px;
            height: 56px;
            min-width: 56px;
            min-height: 56px;
            max-width: 56px;
            max-height: 56px;
            object-fit: contain;
            object-position: center;
            flex-shrink: 0;
            display: block;
            /* Removed all opacity and transition effects that cause flicker */
            opacity: 1;
            /* Stable filter without transitions */
            filter: drop-shadow(0 2px 4px rgba(0, 0, 0, 0.1));
            /* Prevent any layout shifts */
            image-rendering: -webkit-optimize-contrast;
            image-rendering: crisp-edges;
            /* Force hardware acceleration for stable rendering */
            transform: translateZ(0);
            will-change: auto;
            /* Prevent any repaints */
            backface-visibility: hidden;
            -webkit-backface-visibility: hidden;
        }
        
        /* Desktop logo size - Stable */
        @media (min-width: 768px) {
            .logo-image {
                width: 60px;
                height: 60px;
                min-width: 60px;
                min-height: 60px;
                max-width: 60px;
                max-height: 60px;
            }
        }
        
        /* Removed hover effects on logo to prevent flicker */
        .logo-container .logo-image {
            /* No hover effects to prevent flicker */
        }
        
        /* Custom Scrollbar */
        .custom-scrollbar::-webkit-scrollbar {
            width: 0px;
            background: transparent;
        }
        .custom-scrollbar::-webkit-scrollbar-track {
            background: transparent;
        }
        .custom-scrollbar::-webkit-scrollbar-thumb {
            background: transparent;
        }
        /* Untuk Firefox */
        .custom-scrollbar {
            scrollbar-width: none; /* Firefox */
            -ms-overflow-style: none; /* IE and Edge */
        }
        .custom-scrollbar::-webkit-scrollbar {
            display: none;
        }
        
        /* Enhanced Focus States */
        .nav-link:focus {
            outline: 2px solid rgba(59, 130, 246, 0.5);
            outline-offset: 2px;
        }
        
        /* Ripple Effect */
        @keyframes ripple {
            to {
                transform: scale(2);
                opacity: 0;
            }
        }
        
        .ripple {
            position: absolute;
            border-radius: 50%;
            background: rgba(59, 130, 246, 0.2);
            transform: scale(0);
            animation: ripple 0.6s ease-out;
            pointer-events: none;
            z-index: 0;
        }
        
        /* Header Shadow on Scroll */
        .header-shadow {
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.1);
            border-bottom-color: rgba(229, 231, 235, 0.6);
        }
        
        /* Mobile Responsive */
        @media (max-width: 768px) {
            .sidebar-open {
                transform: translateX(0) !important;
            }
            
            .sidebar-closed {
                transform: translateX(-100%) !important;
            }
            
            /* Mobile header adjustments */
            header {
                padding: 12px 16px;
            }
            
            /* Ensure proper spacing for close button */
            header .flex-1 {
                padding-right: 48px;
            }
        }
        
        /* Smooth transitions */
        .transition-all {
            transition-property: all;
            transition-timing-function: cubic-bezier(0.4, 0, 0.2, 1);
            transition-duration: 300ms;
        }
        
        /* Enhanced Status Indicator */
        .status-indicator {
            animation: pulse 2s cubic-bezier(0.4, 0, 0.6, 1) infinite;
        }
        
        /* Logo Glow Effect - Stable */
        .logo-glow {
            box-shadow: 0 0 20px rgba(59, 130, 246, 0.2);
            /* Prevent any box-shadow transitions */
        }
        
        /* Prevent logo shrinking */
        .flex-shrink-0 {
            flex-shrink: 0 !important;
        }
        
        /* Ensure sidebar can be properly closed */
        #sidebarWrapper.sidebar-closed {
            transform: translateX(-100%) !important;
        }
        
        #sidebarWrapper.sidebar-open {
            transform: translateX(0) !important;
        }
        
        /* Better mobile overlay */
        @media (max-width: 768px) {
            #overlay.show {
                display: block !important;
                opacity: 1 !important;
            }
            
            #overlay.hide {
                opacity: 0 !important;
            }
        }
        
        /* Prevent text selection on mobile interactions */
        .nav-link, .logo-container, button {
            -webkit-user-select: none;
            -moz-user-select: none;
            -ms-user-select: none;
            user-select: none;
            -webkit-tap-highlight-color: transparent;
        }
        
        /* Additional stability fixes for logo */
        .logo-container > div {
            /* Prevent any container shifts */
            position: relative;
            overflow: hidden;
        }
        
        /* Force stable rendering */
        .logo-image {
            /* Additional stability properties */
            -webkit-transform: translateZ(0);
            -moz-transform: translateZ(0);
            -ms-transform: translateZ(0);
            -o-transform: translateZ(0);
            transform: translateZ(0);
            
            /* Prevent subpixel rendering issues */
            -webkit-font-smoothing: antialiased;
            -moz-osx-font-smoothing: grayscale;
            
            /* Stable positioning */
            position: relative;
            top: 0;
            left: 0;
        }
    </style>
    
    <script>
        let sidebarOpen = false;
    
        function toggleSidebar() {
            const sidebar = document.getElementById('sidebarWrapper');
            const overlay = document.getElementById('overlay');
    
            sidebarOpen = !sidebarOpen;
    
            if (sidebarOpen) {
                sidebar.classList.remove('-translate-x-full');
                sidebar.classList.add('translate-x-0');
                overlay.classList.remove('hidden', 'opacity-0');
                overlay.classList.add('opacity-100');
                document.body.style.overflow = 'hidden';
            } else {
                sidebar.classList.remove('translate-x-0');
                sidebar.classList.add('-translate-x-full');
                overlay.classList.remove('opacity-100');
                overlay.classList.add('opacity-0');
    
                overlay.addEventListener('transitionend', () => {
                    if (!sidebarOpen) {
                        overlay.classList.add('hidden');
                    }
                }, { once: true });
    
                document.body.style.overflow = '';
            }
        }
    
        function handleLogout() {
            if (confirm("Yakin ingin logout?")) {
                document.getElementById("logout-form").submit();
            }
        }
    
        document.addEventListener('DOMContentLoaded', function() {
            const closeSidebarBtn = document.getElementById('closeSidebarBtn');
            if (closeSidebarBtn) {
                closeSidebarBtn.addEventListener('click', function(e) {
                    e.preventDefault();
                    e.stopPropagation();
                    toggleSidebar();
                });
            }
            
            // Preload logo to prevent any loading flicker
            const logoImg = document.querySelector('.logo-image');
            if (logoImg && !logoImg.complete) {
                logoImg.addEventListener('load', function() {
                    // Logo loaded, ensure it's visible
                    this.style.opacity = '1';
                });
            }
        });
    
        document.addEventListener('keydown', e => {
            if (e.key === 'Escape' && sidebarOpen && window.innerWidth <= 768) {
                toggleSidebar();
            }
        });
    
        window.addEventListener('resize', () => {
            if (window.innerWidth > 768 && sidebarOpen) {
                toggleSidebar();
            }
        });
    </script>