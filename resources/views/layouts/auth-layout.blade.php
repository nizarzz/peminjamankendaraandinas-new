<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>@yield('title', 'User Auth') - Vehicle Management System</title>
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
            accent: '#22c55e',
            'accent-hover': '#16a34a',
            error: '#ef4444',
            success: '#10b981',
            'text-primary': '#ffffff',
            'text-secondary': '#cbd5e1',
            'text-muted': '#94a3b8'
          },
          boxShadow: {
            'glow': '0 0 20px rgba(34, 197, 94, 0.15)',
            'glow-strong': '0 0 30px rgba(34, 197, 94, 0.3)',
            'card': '0 8px 32px rgba(0, 0, 0, 0.3)',
            'inner': 'inset 0 1px 0 rgba(255, 255, 255, 0.1)',
            'soft': '0 4px 16px rgba(0, 0, 0, 0.2)'
          },
          animation: {
            'fade-in': 'fadeIn 0.8s ease-out',
            'slide-up': 'slideUp 0.8s ease-out',
            'pulse-glow': 'pulseGlow 3s ease-in-out infinite',
            'shake': 'shake 0.6s ease-in-out',
            'float': 'float 4s ease-in-out infinite',
            'rotate-slow': 'rotate 25s linear infinite',
            'bounce-gentle': 'bounceGentle 2s ease-in-out infinite',
            'scale-in': 'scaleIn 0.5s ease-out'
          },
          keyframes: {
            fadeIn: {
              '0%': { opacity: '0', transform: 'translateY(10px)' },
              '100%': { opacity: '1', transform: 'translateY(0)' }
            },
            slideUp: {
              '0%': { transform: 'translateY(30px)', opacity: '0' },
              '100%': { transform: 'translateY(0)', opacity: '1' }
            },
            pulseGlow: {
              '0%, 100%': { boxShadow: '0 0 20px rgba(34, 197, 94, 0.15)' },
              '50%': { boxShadow: '0 0 35px rgba(34, 197, 94, 0.4)' }
            },
            shake: {
              '0%, 100%': { transform: 'translateX(0)' },
              '10%, 30%, 50%, 70%, 90%': { transform: 'translateX(-3px)' },
              '20%, 40%, 60%, 80%': { transform: 'translateX(3px)' }
            },
            float: {
              '0%, 100%': { transform: 'translateY(0px) rotate(0deg)' },
              '50%': { transform: 'translateY(-15px) rotate(5deg)' }
            },
            bounceGentle: {
              '0%, 100%': { transform: 'translateY(0)' },
              '50%': { transform: 'translateY(-5px)' }
            },
            scaleIn: {
              '0%': { transform: 'scale(0.9)', opacity: '0' },
              '100%': { transform: 'scale(1)', opacity: '1' }
            },
            rotate: {
              '0%': { transform: 'rotate(0deg)' },
              '100%': { transform: 'rotate(360deg)' }
            }
          }
        }
      }
    }
  </script>
  <style>
    .glass-effect {
      background: rgba(30, 41, 59, 0.95);
    }
    .input-focus:focus {
      transform: translateY(-2px);
      box-shadow: 0 8px 25px rgba(34, 197, 94, 0.15);
    }
    .btn-hover:hover {
      transform: translateY(-3px);
      box-shadow: 0 12px 30px rgba(34, 197, 94, 0.25);
    }
    .floating-particles {
      position: absolute;
      width: 100%;
      height: 100%;
      overflow: hidden;
      pointer-events: none;
    }
    .particle {
      position: absolute;
      background: rgba(34, 197, 94, 0.1);
      border-radius: 50%;
      animation: floatParticle 15s infinite linear;
    }
    @keyframes floatParticle {
      0% {
        transform: translateY(100vh) rotate(0deg);
        opacity: 0;
      }
      10% {
        opacity: 1;
      }
      90% {
        opacity: 1;
      }
      100% {
        transform: translateY(-100px) rotate(360deg);
        opacity: 0;
      }
    }
    .gradient-text {
      background: linear-gradient(135deg, #22c55e, #10b981, #059669);
      -webkit-background-clip: text;
      -webkit-text-fill-color: transparent;
      background-clip: text;
    }
    .form-container {
      position: relative;
      overflow: hidden;
    }
    .form-container::before {
      content: '';
      position: absolute;
      top: 0;
      left: 0;
      right: 0;
      height: 1px;
      background: linear-gradient(90deg, transparent, rgba(34, 197, 94, 0.5), transparent);
    }
    .input-group {
      position: relative;
      transition: all 0.3s ease;
    }
    .input-group:hover {
      transform: translateY(-1px);
    }
    .success-checkmark {
      display: none;
    }
    .loading-dots {
      display: inline-flex;
      gap: 2px;
    }
    .loading-dots span {
      width: 4px;
      height: 4px;
      background: currentColor;
      border-radius: 50%;
      animation: loadingDot 1.4s ease-in-out infinite both;
    }
    .loading-dots span:nth-child(1) { animation-delay: -0.32s; }
    .loading-dots span:nth-child(2) { animation-delay: -0.16s; }
    @keyframes loadingDot {
      0%, 80%, 100% {
        transform: scale(0);
        opacity: 0.5;
      }
      40% {
        transform: scale(1);
        opacity: 1;
      }
    }
    /* Sembunyikan scrollbar pada card, tetap bisa scroll */
    .scrollbar-none::-webkit-scrollbar { display: none; }
    .scrollbar-none { -ms-overflow-style: none; scrollbar-width: none; }
  </style>
</head>
<body class="bg-gradient-to-br from-dark via-surface to-dark text-text-primary font-inter min-h-screen flex flex-col justify-center items-center px-4 relative overflow-hidden">
  <!-- Background sederhana, tanpa animasi berat -->
  <div class="absolute inset-0 bg-gradient-to-br from-dark via-surface to-dark"></div>
  <!-- Main container -->
  <div class="relative z-10 w-[350px] max-w-full mx-auto">
    <div class="form-container glass-effect py-3 px-6 rounded-lg shadow-md border border-white/20 transition-all duration-200 hover:shadow-lg hover:-translate-y-1">
      <div class="h-[420px] overflow-y-auto scrollbar-none">
        @yield('content')
      </div>
    </div>
  </div>
  <footer class="w-full flex justify-center mt-8">
    <div class="bg-surface/70 rounded-lg shadow-card px-4 py-2 text-center text-[12px] font-semibold bg-clip-text text-transparent bg-gradient-to-r from-accent to-emerald-400 drop-shadow-[0_1px_6px_rgba(34,197,94,0.10)] select-none transition-all duration-300 ease-in-out transform hover:scale-105 hover:shadow-xl cursor-pointer">
      © 2025 Institut Widya Pratama
    </div>
  </footer>
  @stack('scripts')
</body>
</html> 