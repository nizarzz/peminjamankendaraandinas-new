<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>@yield('title', 'Admin Portal | Sistem Peminjaman Kendaraan Dinas')</title>
  <script src="https://cdn.tailwindcss.com"></script>
  <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&display=swap" rel="stylesheet">
  <script>
    tailwind.config = {
      theme: {
        extend: {
          fontFamily: {
            inter: ['Inter', 'sans-serif']
          },
          colors: {
            dark: '#0f172a',
            surface: '#1e293b',
            'surface-light': '#334155',
            accent: '#3b82f6',
            'accent-light': '#60a5fa',
            'accent-dark': '#1d4ed8',
            error: '#ef4444',
            success: '#10b981'
          },
          boxShadow: {
            'glow': '0 0 40px rgba(59, 130, 246, 0.15)',
            'inner': 'inset 0 2px 4px 0 rgba(0, 0, 0, 0.3)',
            'card': '0 25px 50px -12px rgba(0, 0, 0, 0.8)'
          },
          animation: {
            'fade-in': 'fadeIn 0.6s ease-out',
            'slide-up': 'slideUp 0.6s ease-out',
            'pulse-slow': 'pulse 3s cubic-bezier(0.4, 0, 0.6, 1) infinite',
          },
          keyframes: {
            fadeIn: {
              '0%': { opacity: '0' },
              '100%': { opacity: '1' }
            },
            slideUp: {
              '0%': { transform: 'translateY(20px)', opacity: '0' },
              '100%': { transform: 'translateY(0)', opacity: '1' }
            }
          }
        }
      }
    }
  </script>
  <style>
    .gradient-bg {
      background: linear-gradient(135deg, #3b82f6 0%, #1e40af 100%);
    }
    .glass-effect {
      backdrop-filter: blur(20px);
      background: rgba(30, 41, 59, 0.8);
      border: 1px solid rgba(59, 130, 246, 0.2);
    }
    .input-glow:focus {
      box-shadow: 0 0 0 3px rgba(59, 130, 246, 0.1);
    }
    body {
      min-height: 100vh;
      min-height: 100dvh; /* For mobile browsers */
    }
  </style>
</head>
<body class="bg-dark text-white font-inter">
  <!-- Animated Background -->
  <div class="fixed inset-0 overflow-hidden">
    <div class="absolute -top-40 -right-40 w-80 h-80 bg-blue-500 opacity-10 rounded-full blur-3xl animate-pulse-slow"></div>
    <div class="absolute -bottom-40 -left-40 w-80 h-80 bg-blue-600 opacity-10 rounded-full blur-3xl animate-pulse-slow" style="animation-delay: 1s;"></div>
    <div class="absolute top-1/2 left-1/2 transform -translate-x-1/2 -translate-y-1/2 w-96 h-96 bg-blue-400 opacity-5 rounded-full blur-3xl animate-pulse-slow" style="animation-delay: 2s;"></div>
  </div>

  <!-- Grid Pattern Overlay -->
  <div class="fixed inset-0 opacity-5" style="background-image: radial-gradient(circle at 1px 1px, rgba(59, 130, 246, 0.3) 1px, transparent 0); background-size: 20px 20px;"></div>

  <div class="relative z-10 min-h-screen flex items-center justify-center p-4">
    <div class="w-full max-w-md animate-slide-up">
      <!-- Logo/Brand Section -->
      <div class="text-center mb-6 animate-fade-in">
        <div class="inline-flex items-center justify-center w-16 h-16 bg-gradient-to-br from-blue-500 to-blue-700 rounded-2xl mb-4 shadow-glow">
          <svg xmlns="http://www.w3.org/2000/svg" class="h-8 w-8 text-white" fill="none" viewBox="0 0 24 24" stroke="currentColor">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z" />
          </svg>
        </div>
        <h1 class="text-2xl md:text-3xl font-bold bg-gradient-to-r from-blue-400 to-blue-200 bg-clip-text text-transparent mb-2">
          Admin Portal
        </h1>
        <p class="text-gray-400 text-sm font-medium">Sistem Peminjaman Kendaraan Dinas</p>
      </div>

      <!-- Content Slot -->
      @yield('content')

      <!-- Footer -->
      <div class="text-center mt-6 text-xs text-gray-500">
        <p>&copy; 2025 Sistem Peminjaman Kendaraan Dinas. All rights reserved.</p>
      </div>
    </div>
  </div>

  @stack('scripts')
</body>
</html> 