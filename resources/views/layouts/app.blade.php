<!DOCTYPE html>
<html lang="id" class="scroll-smooth">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Sistem Peminjaman Kendaraan Dinas Admin - @yield('title', 'Dashboard')</title>

  <script src="https://cdn.tailwindcss.com"></script>
  
  <script>
    tailwind.config = {
      darkMode: 'class',
      theme: {
        extend: {
          colors: {
            primary: {
              50: '#f0f9ff', 100: '#e0f2fe', 200: '#bae6fd',
              300: '#7dd3fc', 400: '#38bdf8', 500: '#0ea5e9',
              600: '#0284c7', 700: '#0369a1', 800: '#075985',
              900: '#0c4a6e',
            },
            dark: { 800: '#1e293b', 900: '#0f172a' }
          },
          fontFamily: {
            sans: ['Inter', 'system-ui', 'sans-serif'],
          },
          spacing: {
            'sidebar': 'var(--sidebar-width)',
          }
        }
      }
    }
  </script>

  <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;600;700&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.css">

  <style>
    :root {
      --sidebar-width: 250px;
      --transition-duration: 0.3s;
      --transition-timing: cubic-bezier(0.4, 0, 0.2, 1);
    }
    
    body {
      font-family: 'Inter', system-ui, sans-serif;
      background: linear-gradient(135deg, #e0e7ff 0%, #f0fdfa 100%);
      min-height: 100vh;
      scrollbar-width: thin;
      scrollbar-color: rgba(56, 189, 248, 0.3) transparent;
    }
    
    /* Enhanced scrollbar with better browser support */
    body::-webkit-scrollbar { 
      width: 8px; 
    }
    body::-webkit-scrollbar-track { 
      background: transparent; 
    }
    body::-webkit-scrollbar-thumb {
      background-color: rgba(56, 189, 248, 0.3);
      border-radius: 10px;
      border: 3px solid transparent;
      background-clip: content-box;
      transition: background-color 0.2s ease;
    }
    body::-webkit-scrollbar-thumb:hover {
      background-color: rgba(56, 189, 248, 0.5);
    }

    .glass-effect {
      background: rgba(30, 41, 59, 0.92);
      backdrop-filter: blur(10px) saturate(140%); /* lebih ringan */
      -webkit-backdrop-filter: blur(10px) saturate(140%);
      border-radius: 20px;
      border: 1.5px solid rgba(56, 189, 248, 0.13); /* lebih ringan */
      box-shadow: 0 6px 20px rgba(56, 189, 248, 0.08), 0 1.5px 8px rgba(0, 0, 0, 0.08); /* lebih ringan */
    }
    
    .sidebar-link {
      border-left: 4px solid transparent;
      transition: all var(--transition-duration) var(--transition-timing);
      will-change: transform, background-color, border-color;
    }
    
    .sidebar-link:hover {
      background: linear-gradient(90deg, #bae6fd 0%, #7dd3fc 100%);
      color: #0ea5e9 !important;
      border-left-color: #38bdf8;
      transform: scale(1.02);
    }
    
    .sidebar-link-active {
      background: linear-gradient(90deg, #38bdf8 0%, #0ea5e9 100%);
      color: #fff !important;
      box-shadow: 0 4px 16px rgba(56, 189, 248, 0.13);
      border-left-color: #38bdf8;
      transform: scale(1.03);
    }
    
    /* Enhanced responsive sidebar with better performance */
    @media (max-width: 767px) {
      #sidebarWrapper {
        transform: translateX(-100%);
        transition: transform var(--transition-duration) var(--transition-timing);
        will-change: transform;
      }
      #sidebarWrapper.is-open {
        transform: translateX(0);
      }
    }

    /* Reduced motion for accessibility */
    @media (prefers-reduced-motion: reduce) {
      *, *::before, *::after {
        animation-duration: 0.01ms !important;
        animation-iteration-count: 1 !important;
        transition-duration: 0.01ms !important;
      }
      
      .sidebar-link {
        transition: none;
      }
      
      #sidebarWrapper {
        transition: none;
      }
    }

    /* Focus styles for better accessibility */
    .focus-visible:focus-visible {
      outline: 2px solid #38bdf8;
      outline-offset: 2px;
    }

    /* Loading state */
    .loading {
      pointer-events: none;
      opacity: 0.7;
    }

    /* Ensure icons are properly positioned */
    .toggle-icon {
      transition: all 0.2s ease;
    }
  </style>
</head>

<body class="flex flex-col min-h-screen bg-gradient-to-br from-blue-50 to-teal-50 text-gray-800 antialiased font-sans">
  
  @include('layouts.partials.sidebar')
  
  <div id="overlay" class="fixed inset-0 bg-black/40 z-30 hidden md:hidden transition-opacity duration-300"></div>

  <div id="mainContent" class="flex flex-col flex-grow min-h-screen transition-all duration-300 md:ml-sidebar px-4 lg:px-8 py-4">
    <button id="sidebarToggleBtn" 
            class="md:hidden fixed top-4 left-4 z-50 bg-white/80 hover:bg-white text-blue-600 rounded-full p-2 shadow-md transition-all focus-visible" 
            aria-label="Toggle Menu" 
            aria-controls="sidebarWrapper" 
            aria-expanded="false" 
            type="button">
        <svg id="menu-icon" xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 toggle-icon" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2" aria-hidden="true">
          <path stroke-linecap="round" stroke-linejoin="round" d="M4 6h16M4 12h16M4 18h16" />
        </svg>
        <svg id="close-icon" xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 toggle-icon hidden" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2" aria-hidden="true">
          <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12" />
        </svg>
    </button>

    <main class="flex-grow md:mt-4 md:mr-4 md:rounded-xl shadow-sm bg-white/90 transition-all duration-300 pb-12 w-full p-4">
      <div class="hidden md:flex justify-between items-center mb-6">
        <h1 class="text-2xl font-bold text-gray-800">@yield('title', '')</h1>
      </div>
      <div class="mt-12 md:mt-0 max-w-7xl mx-auto w-full">
        @yield('content')
      </div>
    </main>
    @include('layouts.partials.footer')
  </div>

  <script>
    document.addEventListener('DOMContentLoaded', function() {
      'use strict';
      
      // Simple and reliable sidebar management
      const sidebar = document.getElementById('sidebarWrapper');
      const overlay = document.getElementById('overlay');
      const mainContent = document.getElementById('mainContent');
      const toggleBtn = document.getElementById('sidebarToggleBtn');
      const menuIcon = document.getElementById('menu-icon');
      const closeIcon = document.getElementById('close-icon');
      const closeSidebarBtn = document.getElementById('closeSidebarBtn');

      // Check if all required elements exist
      if (!toggleBtn) {
        console.warn('Toggle button not found');
        return;
      }

      // Toggle sidebar function
      function toggleSidebar() {
        if (!sidebar) {
          console.warn('Sidebar not found');
          return;
        }

        const isOpen = sidebar.classList.contains('is-open');
        
        if (isOpen) {
          // Close sidebar
          sidebar.classList.remove('is-open');
          sidebar.classList.add('-translate-x-full');
          sidebar.classList.remove('translate-x-0');
          
          if (overlay) {
            overlay.classList.add('hidden');
          }
          
          if (mainContent) {
            mainContent.classList.remove('opacity-70'); // efek ringan
          }
          
          document.body.classList.remove('overflow-hidden');
          
          // Switch icons
          if (menuIcon && closeIcon) {
            menuIcon.classList.remove('hidden');
            closeIcon.classList.add('hidden');
          }
          
          toggleBtn.setAttribute('aria-expanded', 'false');
          toggleBtn.setAttribute('aria-label', 'Open Menu');
          
        } else {
          // Open sidebar
          sidebar.classList.add('is-open');
          sidebar.classList.remove('-translate-x-full');
          sidebar.classList.add('translate-x-0');
          
          if (overlay) {
            overlay.classList.remove('hidden');
          }
          
          if (mainContent) {
            mainContent.classList.add('opacity-70'); // efek ringan
          }
          
          document.body.classList.add('overflow-hidden');
          
          // Switch icons
          if (menuIcon && closeIcon) {
            menuIcon.classList.add('hidden');
            closeIcon.classList.remove('hidden');
          }
          
          toggleBtn.setAttribute('aria-expanded', 'true');
          toggleBtn.setAttribute('aria-label', 'Close Menu');
        }
      }

      // Close sidebar function
      function closeSidebar() {
        if (sidebar && sidebar.classList.contains('is-open')) {
          toggleSidebar();
        }
      }

      // Event listeners
      toggleBtn.addEventListener('click', function(e) {
        e.preventDefault();
        e.stopPropagation();
        toggleSidebar();
      });

      // Overlay click to close
      if (overlay) {
        overlay.addEventListener('click', function(e) {
          if (e.target === overlay) {
            closeSidebar();
          }
        });
      }

      // Tombol close di sidebar partial
      if (closeSidebarBtn) {
        closeSidebarBtn.addEventListener('click', function(e) {
          e.preventDefault();
          e.stopPropagation();
          closeSidebar();
        });
      }

      // Keyboard navigation
      document.addEventListener('keydown', function(e) {
        if (e.key === 'Escape') {
          closeSidebar();
        }
      });

      // Close sidebar on window resize to desktop
      let resizeTimeout;
      window.addEventListener('resize', function() {
        clearTimeout(resizeTimeout);
        resizeTimeout = setTimeout(function() {
          if (window.innerWidth >= 768) {
            closeSidebar();
          }
        }, 150);
      });

      // Prevent event bubbling on sidebar content
      if (sidebar) {
        sidebar.addEventListener('click', function(e) {
          e.stopPropagation();
        });
      }

      // console.log('Sidebar initialized successfully'); // Hapus di production
    });
  </script>
  <!--
    Catatan: Untuk produksi, sebaiknya build Tailwind CSS sendiri (bukan CDN) agar file CSS lebih kecil dan performa lebih baik.
  -->
</body>
</html>