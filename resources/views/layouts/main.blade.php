<!DOCTYPE html>
<html lang="id" data-bs-theme="light">
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <meta name="description" content="Sistem Peminjaman Kendaraan Dinas BPJS Ketenagakerjaan">
    <link rel="icon" type="image/x-icon" href="{{ asset('assets/favicon.ico') }}" />

    <!-- Bootstrap Icons -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    
    <!-- Flatpickr CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/flatpickr/dist/flatpickr.min.css">
    
    <!-- Animate CSS -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css"/>

    <!-- Google Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@300;400;500;600;700;800&display=swap" rel="stylesheet" />

    <!-- Tempus Dominus CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@eonasdan/tempus-dominus@6.7.10/dist/css/tempus-dominus.min.css" />

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom Styles -->
    <link href="{{ asset('assets/css/styles.css') }}" rel="stylesheet" />
    
    <style>
        /* CSS Variables - Modern Green Theme (Consistent with profile pages) */
        :root {
            /* Primary Green Colors */
            --primary: #22c55e;
            --primary-dark: #16a34a;
            --primary-light: #4ade80;
            --primary-50: #f0fdf4;
            --primary-100: #dcfce7;
            --primary-200: #bbf7d0;
            --primary-500: #22c55e;
            --primary-600: #16a34a;
            --primary-700: #15803d;
            --primary-800: #166534;
            --primary-900: #14532d;
            
            /* BPJS Legacy Colors (for compatibility) */
            --bpjs-green: #22c55e;
            --bpjs-green-light: #f0fdf4;
            --bpjs-green-dark: #16a34a;
            
            /* Additional Colors */
            --secondary: #10b981;
            --accent: #059669;
            --success: #22c55e;
            --warning: #f59e0b;
            --danger: #ef4444;
            --info: #3b82f6;
                
            /* Gray Scale */
            --gray-50: #f9fafb;
            --gray-100: #f3f4f6;
            --gray-200: #e5e7eb;
            --gray-300: #d1d5db;
            --gray-400: #9ca3af;
            --gray-500: #6b7280;
            --gray-600: #4b5563;
            --gray-700: #374151;
            --gray-800: #1f2937;
            --gray-900: #111827;
            --white: #ffffff;
            
            /* Shadows */
            --shadow: 0 4px 6px -1px rgb(0 0 0 / 0.1);
            --shadow-md: 0 4px 6px -1px rgb(0 0 0 / 0.1), 0 2px 4px -1px rgb(0 0 0 / 0.06);
            --shadow-lg: 0 10px 15px -3px rgb(0 0 0 / 0.1), 0 4px 6px -2px rgb(0 0 0 / 0.05);
            --shadow-xl: 0 20px 25px -5px rgb(0 0 0 / 0.1), 0 10px 10px -5px rgb(0 0 0 / 0.04);
            --shadow-2xl: 0 25px 50px -12px rgb(0 0 0 / 0.25);
            
            /* Border Radius */
            --radius: 0.75rem;
            --radius-md: 0.875rem;
            --radius-lg: 1rem;
            --radius-xl: 1.5rem;
            --radius-2xl: 2rem;
                
            /* Gradients */
            --gradient-primary: linear-gradient(135deg, var(--primary-500), var(--primary-600));
            --gradient-secondary: linear-gradient(135deg, var(--primary-400), var(--secondary));
            --gradient-accent: linear-gradient(135deg, var(--primary-500), var(--accent));
            --gradient-green: linear-gradient(135deg, var(--primary-500), var(--primary-600));
            
            /* Layout Heights */
            --navbar-height: 80px;
            --footer-height: 120px;
        }

        /* Base Styles */
        * {
            box-sizing: border-box;
        }

        html {
            overflow-y: scroll;
            scroll-behavior: smooth;
            height: 100%;
        }

        body {
            font-family: 'Plus Jakarta Sans', sans-serif;
            background: var(--gray-50);
            color: var(--gray-900);
            line-height: 1.6;
            -webkit-font-smoothing: antialiased;
            -moz-osx-font-smoothing: grayscale;
            min-height: 100vh;
            display: flex;
            flex-direction: column;
        }

        /* Navbar Styles */
        .navbar {
            background: rgba(255, 255, 255, 0.95) !important;
            backdrop-filter: blur(20px);
            border-bottom: 1px solid var(--gray-200);
            box-shadow: var(--shadow-lg);
            padding: 1rem 0;
            transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
            position: sticky;
            top: 0;
            z-index: 1030;
            height: var(--navbar-height);
            display: flex;
            align-items: center;
        }

        .navbar.scrolled {
            padding: 0.5rem 0;
            box-shadow: var(--shadow-xl);
        }

        .navbar-brand {
            display: flex;
            align-items: center;
            font-weight: 800;
            font-size: 1.25rem;
            color: var(--primary-600) !important;
            text-decoration: none;
            transition: all 0.3s ease;
        }

        .navbar-brand:hover {
            color: var(--primary-700) !important;
            transform: translateY(-1px);
        }

        .navbar-brand img {
            height: 40px;
            margin-right: 12px;
            transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
            filter: drop-shadow(0 2px 4px rgba(0, 0, 0, 0.1));
        }

        .navbar-brand:hover img {
            transform: scale(1.05) rotate(2deg);
        }

        .navbar-toggler {
            border: none;
            padding: 0.5rem;
            border-radius: var(--radius);
            transition: all 0.3s ease;
        }

        .navbar-toggler:focus {
            box-shadow: 0 0 0 3px rgba(34, 197, 94, 0.1);
        }

        .navbar-toggler:hover {
            background: var(--primary-50);
        }

        .navbar-nav {
            gap: 0.5rem;
        }

        .nav-link {
            padding: 0.75rem 1.25rem !important;
            border-radius: var(--radius-lg);
            font-weight: 600;
            font-size: 0.875rem;
            color: var(--gray-700) !important;
            transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
            position: relative;
            overflow: hidden;
        }

        .nav-link::before {
            content: '';
            position: absolute;
            top: 0;
            left: -100%;
            width: 100%;
            height: 100%;
            background: linear-gradient(90deg, transparent, rgba(34, 197, 94, 0.1), transparent);
            transition: left 0.5s;
        }

        .nav-link:hover::before {
            left: 100%;
        }

        .nav-link:hover {
            background: var(--primary-50) !important;
            color: var(--primary-700) !important;
            transform: translateY(-2px);
            box-shadow: var(--shadow-md);
        }

        .nav-link.active {
            background: var(--gradient-primary) !important;
            color: var(--white) !important;
            box-shadow: var(--shadow-md);
        }

        .logout-btn {
            display: flex;
            align-items: center;
            gap: 0.5rem;
            color: var(--danger) !important;
            font-weight: 600;
        }

        .logout-btn:hover {
            background: var(--danger) !important;
            color: var(--white) !important;
            transform: translateY(-2px);
            box-shadow: 0 4px 12px rgba(239, 68, 68, 0.3);
        }

        /* Dropdown Styles */
        .dropdown-menu {
            border: none;
            box-shadow: var(--shadow-xl);
            border-radius: var(--radius-xl);
            padding: 0.5rem;
            margin-top: 0.5rem;
        }

        .dropdown-item {
            border-radius: var(--radius-lg);
            padding: 0.75rem 1rem;
            transition: all 0.3s ease;
            font-weight: 500;
        }

        .dropdown-item:hover {
            background: var(--primary-50);
            color: var(--primary-700);
            transform: translateX(4px);
        }

        .dropdown-divider {
            margin: 0.5rem 0;
            border-color: var(--gray-200);
        }

        /* Main Content - Fixed Layout */
        main {
            flex: 1 0 auto;
            padding: 2rem 0;
            padding-bottom: calc(var(--footer-height) + 2rem);
            min-height: calc(100vh - var(--navbar-height));
            position: relative;
        }

        main .container {
            animation: fadeInUp 0.6s cubic-bezier(0.4, 0, 0.2, 1);
            width: 100%;
            max-width: 1200px;
            margin: 0 auto;
            padding-left: 1rem;
            padding-right: 1rem;
        }

        @keyframes fadeInUp {
            from {
                opacity: 0;
                transform: translateY(30px);
            }
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        /* Alert Styles */
        .alert {
            border: none;
            border-radius: var(--radius-lg);
            box-shadow: var(--shadow-md);
            padding: 1rem 1.25rem;
            margin-bottom: 1.5rem;
            animation: slideInDown 0.5s cubic-bezier(0.4, 0, 0.2, 1);
            position: relative;
            overflow: hidden;
        }

        .alert::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            height: 4px;
            background: currentColor;
            opacity: 0.3;
        }

        .alert-success {
            background: linear-gradient(135deg, var(--primary-50), var(--primary-100));
            color: var(--primary-800);
            border-left: 4px solid var(--primary-500);
        }

        .alert-danger {
            background: linear-gradient(135deg, #fef2f2, #fee2e2);
            color: #991b1b;
            border-left: 4px solid var(--danger);
        }

        .alert-warning {
            background: linear-gradient(135deg, #fffbeb, #fef3c7);
            color: #92400e;
            border-left: 4px solid var(--warning);
        }

        .alert-info {
            background: linear-gradient(135deg, #eff6ff, #dbeafe);
            color: #1e40af;
            border-left: 4px solid var(--info);
        }

        @keyframes slideInDown {
            from {
                opacity: 0;
                transform: translateY(-20px);
            }
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        /* Card Styles */
        .card {
            border: none;
            border-radius: var(--radius-xl);
            box-shadow: var(--shadow-md);
            transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
            background: var(--white);
            overflow: hidden;
            position: relative;
            margin-bottom: 1.5rem;
        }

        .card::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            height: 4px;
            background: var(--gradient-primary);
            transform: scaleX(0);
            transition: transform 0.3s ease;
        }

        .card:hover::before {
            transform: scaleX(1);
        }

        .card:hover {
            box-shadow: var(--shadow-xl);
        }

        .card-header {
            background: var(--gradient-primary);
            color: var(--white);
            border-radius: var(--radius-xl) var(--radius-xl) 0 0 !important;
            padding: 1.5rem;
            border: none;
            font-weight: 700;
            font-size: 1.125rem;
        }

        .card-body {
            padding: 1.5rem;
        }

        .card-footer {
            background: var(--gray-50);
            border-top: 1px solid var(--gray-200);
            padding: 1rem 1.5rem;
        }

        /* Form Styles */
        .form-control,
        .form-select {
            border: 2px solid var(--gray-200);
            border-radius: var(--radius-lg);
            padding: 0.875rem 1rem;
            font-size: 0.875rem;
            transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
            background: var(--white);
        }

        .form-control:focus,
        .form-select:focus {
            border-color: var(--primary-500);
            box-shadow: 0 0 0 3px rgba(34, 197, 94, 0.1);
            transform: translateY(-1px);
            outline: none;
        }

        .form-control:hover,
        .form-select:hover {
            border-color: var(--primary-300);
        }

        .form-label {
            font-weight: 600;
            color: var(--gray-900);
            margin-bottom: 0.5rem;
            font-size: 0.875rem;
        }

        /* Button Styles */
        .btn {
            border-radius: var(--radius-lg);
            font-weight: 600;
            font-size: 0.875rem;
            padding: 0.875rem 1.75rem;
            transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
            position: relative;
            overflow: hidden;
            border: none;
        }

        .btn::before {
            content: '';
            position: absolute;
            top: 0;
            left: -100%;
            width: 100%;
            height: 100%;
            background: linear-gradient(90deg, transparent, rgba(255,255,255,0.2), transparent);
            transition: left 0.5s;
        }

        .btn:hover::before {
            left: 100%;
        }

        .btn-primary,
        .btn-bpjs {
            background: var(--gradient-primary);
            color: var(--white);
            box-shadow: var(--shadow-md);
        }

        .btn-primary:hover,
        .btn-bpjs:hover {
            background: var(--gradient-primary);
            transform: translateY(-2px);
            box-shadow: var(--shadow-lg);
            color: var(--white);
        }

        .btn-outline-primary {
            background: transparent;
            color: var(--primary-600);
            border: 2px solid var(--primary-200);
        }

        .btn-outline-primary:hover {
            background: var(--primary-50);
            border-color: var(--primary-500);
            color: var(--primary-700);
            transform: translateY(-2px);
        }

        .btn-success {
            background: linear-gradient(135deg, var(--success), #16a34a);
            color: var(--white);
        }

        .btn-danger {
            background: linear-gradient(135deg, var(--danger), #dc2626);
            color: var(--white);
        }

        .btn-warning {
            background: linear-gradient(135deg, var(--warning), #d97706);
            color: var(--white);
        }

        .btn-info {
            background: linear-gradient(135deg, var(--info), #2563eb);
            color: var(--white);
        }

        /* Table Styles */
        .table {
            border-radius: var(--radius-xl);
            overflow: hidden;
            box-shadow: var(--shadow-md);
            background: var(--white);
            margin-bottom: 2rem;
        }

        .table thead th {
            background: var(--gradient-primary);
            color: var(--white);
            border: none;
            font-weight: 700;
            font-size: 0.875rem;
            padding: 1rem;
            text-transform: uppercase;
            letter-spacing: 0.025em;
        }

        .table tbody tr {
            transition: all 0.2s ease;
            border-bottom: 1px solid var(--gray-100);
        }

        .table tbody tr:hover {
            background: var(--primary-50);
        }

        .table tbody td {
            padding: 1rem;
            vertical-align: middle;
            border: none;
        }

        /* Badge Styles */
        .badge {
            font-weight: 600;
            font-size: 0.75rem;
            padding: 0.5rem 0.75rem;
            border-radius: var(--radius);
        }

        /* Utility Classes */
        .text-bpjs {
            color: var(--primary-600) !important;
        }

        .bg-bpjs-light {
            background-color: var(--primary-50) !important;
        }

        .border-bpjs {
            border-color: var(--primary-200) !important;
        }

        /* Footer Styles - Fixed Position */
        footer {
            background: linear-gradient(135deg, var(--white) 0%, var(--gray-50) 100%);
            border-top: 1px solid var(--gray-200);
            padding: 2rem 0;
            margin-top: auto;
            flex-shrink: 0;
            position: relative;
            z-index: 10;
            min-height: var(--footer-height);
            display: flex;
            align-items: center;
        }

        footer .container {
            max-width: 1200px;
            margin: 0 auto;
            padding-left: 1rem;
            padding-right: 1rem;
            width: 100%;
        }

        footer a {
            color: var(--primary-600);
            text-decoration: none;
            font-weight: 500;
            transition: all 0.3s ease;
            display: inline-flex;
            align-items: center;
            gap: 0.25rem;
        }

        footer a:hover {
            color: var(--primary-700);
            transform: translateY(-1px);
        }

        /* Loading States */
        .loading {
            opacity: 0.6;
            pointer-events: none;
            position: relative;
        }

        .loading::after {
            content: '';
            position: absolute;
            top: 50%;
            left: 50%;
            width: 20px;
            height: 20px;
            margin: -10px 0 0 -10px;
            border: 2px solid var(--primary-200);
            border-top: 2px solid var(--primary-600);
            border-radius: 50%;
            animation: spin 1s linear infinite;
        }

        @keyframes spin {
            0% { transform: rotate(0deg); }
            100% { transform: rotate(360deg); }
        }

        /* Content Wrapper for better spacing */
        .content-wrapper {
            min-height: calc(100vh - var(--navbar-height) - var(--footer-height));
            padding-bottom: 2rem;
        }

        /* Responsive Design */
        @media (max-width: 768px) {
            :root {
                --navbar-height: 70px;
                --footer-height: 140px;
            }
            
            .navbar {
                padding: 0.75rem 0;
                height: var(--navbar-height);
            }
            
            .navbar-brand img {
                height: 32px;
            }
            
            .nav-link {
                padding: 0.5rem 1rem !important;
                margin: 0.25rem 0;
            }
            
            main {
                padding: 1rem 0;
                padding-bottom: calc(var(--footer-height) + 1rem);
            }
            
            main .container {
                padding-left: 0.75rem;
                padding-right: 0.75rem;
            }
            
            .card {
                margin-bottom: 1rem;
            }
            
            .card-body {
                padding: 1rem;
            }
            
            .btn {
                padding: 0.75rem 1.5rem;
                font-size: 0.875rem;
            }
            
            .table {
                font-size: 0.875rem;
            }
            
            .table thead th,
            .table tbody td {
                padding: 0.75rem 0.5rem;
            }
            
            footer {
                padding: 1.5rem 0;
                min-height: var(--footer-height);
            }
        }

        @media (max-width: 480px) {
            :root {
                --navbar-height: 60px;
                --footer-height: 160px;
            }
            
            .navbar {
                height: var(--navbar-height);
            }
            
            .navbar-brand {
                font-size: 1rem;
            }
            
            .navbar-brand img {
                height: 28px;
                margin-right: 8px;
            }
            
            main {
                padding: 0.75rem 0;
                padding-bottom: calc(var(--footer-height) + 1rem);
            }
            
            main .container {
                padding-left: 0.5rem;
                padding-right: 0.5rem;
            }
            
            .card-body {
                padding: 1rem;
            }
            
            .btn {
                padding: 0.625rem 1.25rem;
                font-size: 0.8125rem;
            }
            
            footer {
                padding: 1.5rem 0;
                text-align: center;
                min-height: var(--footer-height);
            }
            
            footer .d-flex {
                flex-direction: column;
                gap: 1rem;
            }
        }

        /* Dark mode support (future enhancement) */
        @media (prefers-color-scheme: dark) {
            [data-bs-theme="auto"] {
                --gray-50: #1f2937;
                --gray-100: #374151;
                --white: #1f2937;
            }
        }

        /* Print styles */
        @media print {
            .navbar,
            footer,
            .btn,
            .alert {
                display: none !important;
            }
            
            .card {
                box-shadow: none !important;
                border: 1px solid #ddd !important;
            }
            
            main {
                padding: 0 !important;
                min-height: auto !important;
            }
        }

        /* Accessibility improvements */
        @media (prefers-reduced-motion: reduce) {
            *,
            *::before,
            *::after {
                animation-duration: 0.01ms !important;
                animation-iteration-count: 1 !important;
                transition-duration: 0.01ms !important;
            }
        }

        /* Focus styles for better accessibility */
        .btn:focus,
        .form-control:focus,
        .form-select:focus,
        .nav-link:focus {
            outline: 2px solid var(--primary-500);
            outline-offset: 2px;
        }

        /* Custom scrollbar */
        ::-webkit-scrollbar {
            width: 8px;
        }

        ::-webkit-scrollbar-track {
            background: var(--gray-100);
            border-radius: 4px;
        }

        ::-webkit-scrollbar-thumb {
            background: var(--gradient-primary);
            border-radius: 4px;
        }

        ::-webkit-scrollbar-thumb:hover {
            background: var(--primary-700);
        }

        /* Ensure content doesn't get hidden behind footer */
        .main-content {
            margin-bottom: 2rem;
        }

        /* Fix for very long content */
        .page-content {
            padding-bottom: 3rem;
        }
    </style>
    @stack('styles')
</head>

<body class="d-flex flex-column min-vh-100">

<!-- Navbar -->
<nav class="navbar navbar-expand-lg navbar-light sticky-top">
    <div class="container px-4 px-lg-5">
        <a class="navbar-brand" href="{{ url('/') }}">
            <img src="{{ asset('assets/img/bpjs.png') }}" alt="BPJS Ketenagakerjaan Logo">
        </a>
        
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
            aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav ms-auto">
                @auth
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle d-flex align-items-center" href="#" role="button" 
                           data-bs-toggle="dropdown" aria-expanded="false">
                            <div class="avatar-sm me-2">
                                <div class="bg-primary text-white rounded-circle d-flex align-items-center justify-content-center" 
                                     style="width: 32px; height: 32px;">
                                    <i class="bi bi-person"></i>
                                </div>
                            </div>
                            <span class="d-none d-md-inline">{{ auth()->user()->name }}</span>
                        </a>
                        <ul class="dropdown-menu dropdown-menu-end shadow-lg border-0">
                            <li>
                                <a class="dropdown-item d-flex align-items-center" href="{{ route('user.home') }}">
                                    <i class="bi bi-speedometer2 me-2"></i>
                                    Dashboard
                                </a>
                            </li>
                            <li>
                                <a class="dropdown-item d-flex align-items-center" href="{{ route('profile.edit') }}">
                                    <i class="bi bi-person-gear me-2"></i>
                                    Edit Profil
                                </a>
                            </li>
                            <li>
                                <a class="dropdown-item d-flex align-items-center" href="{{ route('profile.password.edit') }}">
                                    <i class="bi bi-shield-lock me-2"></i>
                                    Ganti Password
                                </a>
                            </li>
                            <li><hr class="dropdown-divider"></li>
                            <li>
                                <a class="dropdown-item logout-btn" href="#" 
                                   onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                                    <i class="bi bi-box-arrow-right me-2"></i>
                                    Logout
                                </a>
                            </li>
                        </ul>
                    </li>
                @else
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('login') }}">
                            <i class="bi bi-box-arrow-in-right me-1"></i>
                            Login
                        </a>
                    </li>
                @endauth
            </ul>
        </div>
    </div>
</nav>

@auth
<form id="logout-form" action="{{ route('user.logout') }}" method="POST" style="display: none;">
    @csrf
</form>
@endauth

<!-- Main Content -->
<main class="flex-grow-1">
    <div class="content-wrapper">
        <div class="container px-4 px-lg-5">
            {{-- Flash Messages --}}
            @if(session('success'))
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    <div class="d-flex align-items-center">
                        <div class="me-3">
                            <div class="bg-success bg-opacity-20 text-success rounded-circle d-flex align-items-center justify-content-center" 
                                 style="width: 40px; height: 40px;">
                                <i class="bi bi-check-circle-fill"></i>
                            </div>
                        </div>
                        <div class="flex-grow-1">
                            <h6 class="mb-1 fw-bold">Berhasil!</h6>
                            <span>{{ session('success') }}</span>
                        </div>
                    </div>
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            @endif

            @if(session('error'))
                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                    <div class="d-flex align-items-center">
                        <div class="me-3">
                            <div class="bg-danger bg-opacity-20 text-danger rounded-circle d-flex align-items-center justify-content-center" 
                                 style="width: 40px; height: 40px;">
                                <i class="bi bi-exclamation-triangle-fill"></i>
                            </div>
                        </div>
                        <div class="flex-grow-1">
                            <h6 class="mb-1 fw-bold">Terjadi Kesalahan!</h6>
                            <span>{{ session('error') }}</span>
                        </div>
                    </div>
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            @endif

            @if(session('warning'))
                <div class="alert alert-warning alert-dismissible fade show" role="alert">
                    <div class="d-flex align-items-center">
                        <div class="me-3">
                            <div class="bg-warning bg-opacity-20 text-warning rounded-circle d-flex align-items-center justify-content-center" 
                                 style="width: 40px; height: 40px;">
                                <i class="bi bi-exclamation-triangle-fill"></i>
                            </div>
                        </div>
                        <div class="flex-grow-1">
                            <h6 class="mb-1 fw-bold">Peringatan!</h6>
                            <span>{{ session('warning') }}</span>
                        </div>
                    </div>
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            @endif

            @if(session('info'))
                <div class="alert alert-info alert-dismissible fade show" role="alert">
                    <div class="d-flex align-items-center">
                        <div class="me-3">
                            <div class="bg-info bg-opacity-20 text-info rounded-circle d-flex align-items-center justify-content-center" 
                                 style="width: 40px; height: 40px;">
                                <i class="bi bi-info-circle-fill"></i>
                            </div>
                        </div>
                        <div class="flex-grow-1">
                            <h6 class="mb-1 fw-bold">Informasi!</h6>
                            <span>{{ session('info') }}</span>
                        </div>
                    </div>
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            @endif

            <div class="main-content">
                @yield('content')
            </div>
        </div>
    </div>
</main>

<!-- Footer -->
<footer class="footer-green-card">
    <div class="footer-card mx-auto">
        <div class="footer-row mb-1">
            <i class="bi bi-house-door me-2"></i>
            <span class="fw-bold">Sistem Peminjaman Kendaraan Dinas</span>
        </div>
        <div class="footer-row mb-1">
            <i class="bi bi-mortarboard me-2"></i>
            <span>Institut Widya Pratama</span>
        </div>
        <div class="footer-row small">
            &copy; {{ date('Y') }}
        </div>
    </div>
</footer>

<style>
.footer-green-card {
    background: transparent;
    padding: 0.5rem 0 0.3rem 0;
    min-height: unset;
    margin-top: 0;
    width: 100%;
    display: flex;
    align-items: flex-end;
    justify-content: center;
}
.footer-card {
    background: linear-gradient(90deg, var(--primary-700), var(--primary-800));
    border-radius: 24px;
    box-shadow: 0 4px 32px 0 rgba(34,197,94,0.10);
    padding: 0.7rem 1.2rem 0.5rem 1.2rem;
    max-width: 1200px;
    width: 100%;
    color: #fff;
    display: flex;
    flex-direction: column;
    align-items: center;
    justify-content: center;
}
.footer-row {
    display: flex;
    align-items: center;
    justify-content: center;
    gap: 0.4rem;
    font-size: 0.98rem;
    margin-bottom: 0.2rem;
}
.footer-card .footer-row:last-child {
    margin-bottom: 0;
}
.footer-card .bi {
    font-size: 1.05rem;
    color: #fff;
    vertical-align: middle;
}
.footer-card .fw-bold {
    font-weight: 700 !important;
    font-size: 1.05rem;
}
/* Perkecil jarak bawah konten utama agar footer lebih dekat */
main {
    padding-bottom: 1.2rem !important;
}
.content-wrapper {
    padding-bottom: 0.5rem !important;
    min-height: unset !important;
}
.main-content {
    margin-bottom: 0.2rem !important;
}
@media (max-width: 900px) {
    .footer-card {
        max-width: 98vw;
        padding: 0.5rem 0.5rem 0.4rem 0.5rem;
        border-radius: 16px;
    }
}
@media (max-width: 600px) {
    .footer-card {
        padding: 0.4rem 0.3rem 0.3rem 0.3rem;
        border-radius: 14px;
    }
    .footer-row {
        font-size: 0.92rem;
        margin-bottom: 0.15rem;
    }
    .footer-card .bi {
        font-size: 0.95rem;
    }
}
</style>

<!-- Scripts -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
<script src="{{ asset('assets/js/scripts.js') }}"></script>
<script src="https://cdn.jsdelivr.net/npm/flatpickr"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/3.12.2/gsap.min.js"></script>

<!-- Tempus Dominus JS -->
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@eonasdan/tempus-dominus@6.7.10/dist/js/tempus-dominus.min.js"></script>

<script>
document.addEventListener('DOMContentLoaded', function () {
    // Initialize tooltips
    const tooltipTriggerList = [].slice.call(document.querySelectorAll('[data-bs-toggle="tooltip"]'));
    tooltipTriggerList.map(function (tooltipTriggerEl) {
        return new bootstrap.Tooltip(tooltipTriggerEl);
    });

    // Initialize popovers
    const popoverTriggerList = [].slice.call(document.querySelectorAll('[data-bs-toggle="popover"]'));
    popoverTriggerList.map(function (popoverTriggerEl) {
        return new bootstrap.Popover(popoverTriggerEl);
    });

    // Smooth scroll for anchor links
    document.querySelectorAll('a[href^="#"]').forEach(anchor => {
        anchor.addEventListener('click', function (e) {
            e.preventDefault();
            const target = document.querySelector(this.getAttribute('href'));
            if (target) {
                target.scrollIntoView({ 
                    behavior: 'smooth',
                    block: 'start'
                });
            }
        });
    });

    // Navbar scroll effect
    let lastScrollTop = 0;
    const navbar = document.querySelector('.navbar');
    
    window.addEventListener('scroll', function() {
        const scrollTop = window.pageYOffset || document.documentElement.scrollTop;
        
        if (scrollTop > 100) {
            navbar.classList.add('scrolled');
        } else {
            navbar.classList.remove('scrolled');
        }
        
        lastScrollTop = scrollTop;
    });

    // Auto-hide alerts after 5 seconds
    document.querySelectorAll('.alert:not(.alert-permanent)').forEach(alert => {
        setTimeout(() => {
            const bsAlert = new bootstrap.Alert(alert);
            bsAlert.close();
        }, 5000);
    });

    // Button ripple effect
    document.querySelectorAll('.btn').forEach(button => {
        button.addEventListener('click', function(e) {
            const ripple = document.createElement('span');
            const rect = this.getBoundingClientRect();
            const size = Math.max(rect.width, rect.height);
            const x = e.clientX - rect.left - size / 2;
            const y = e.clientY - rect.top - size / 2;
            
            ripple.style.cssText = `
                position: absolute;
                width: ${size}px;
                height: ${size}px;
                left: ${x}px;
                top: ${y}px;
                background: rgba(255, 255, 255, 0.3);
                border-radius: 50%;
                transform: scale(0);
                animation: ripple 0.6s linear;
                pointer-events: none;
                z-index: 0;
            `;
            
            this.style.position = 'relative';
            this.style.overflow = 'hidden';
            this.appendChild(ripple);
            
            setTimeout(() => ripple.remove(), 600);
        });
    });

    // Add ripple animation
    const style = document.createElement('style');
    style.textContent = `
        @keyframes ripple {
            to {
                transform: scale(4);
                opacity: 0;
            }
        }
    `;
    document.head.appendChild(style);

    // Form validation enhancement
    document.querySelectorAll('.needs-validation').forEach(form => {
        form.addEventListener('submit', function(event) {
            if (!form.checkValidity()) {
                event.preventDefault();
                event.stopPropagation();
            }
            form.classList.add('was-validated');
        });
    });

    // Loading state for forms
    document.querySelectorAll('form').forEach(form => {
        form.addEventListener('submit', function() {
            const submitBtn = form.querySelector('button[type="submit"]');
            if (submitBtn) {
                submitBtn.classList.add('loading');
                submitBtn.disabled = true;
            }
        });
    });

    // Enhanced table interactions
    // (Optimasi: efek hover pada tabel cukup dengan CSS, tidak perlu JS)

    // Keyboard navigation for dropdowns
    document.querySelectorAll('.dropdown-menu').forEach(menu => {
        menu.addEventListener('keydown', function(e) {
            if (e.key === 'ArrowDown' || e.key === 'ArrowUp') {
                e.preventDefault();
                const items = menu.querySelectorAll('.dropdown-item:not(.disabled)');
                const currentIndex = Array.from(items).indexOf(document.activeElement);
                let nextIndex;
                
                if (e.key === 'ArrowDown') {
                    nextIndex = currentIndex < items.length - 1 ? currentIndex + 1 : 0;
                } else {
                    nextIndex = currentIndex > 0 ? currentIndex - 1 : items.length - 1;
                }
                
                items[nextIndex].focus();
            }
        });
    });

    // Ensure footer doesn't overlap content
    function adjustMainPadding() {
        const footer = document.querySelector('footer');
        const main = document.querySelector('main');
        
        if (footer && main) {
            const footerHeight = footer.offsetHeight;
            main.style.paddingBottom = `${footerHeight + 32}px`;
        }
    }

    // Adjust on load and resize
    adjustMainPadding();
    window.addEventListener('resize', adjustMainPadding);
});

// Global error handler
window.addEventListener('error', function(e) {
    console.error('JavaScript Error:', e.error);
});

// Performance monitoring
if ('performance' in window) {
    window.addEventListener('load', function() {
        setTimeout(function() {
            const perfData = performance.getEntriesByType('navigation')[0];
            if (perfData && perfData.loadEventEnd - perfData.loadEventStart > 3000) {
                console.warn('Page load time is slow:', perfData.loadEventEnd - perfData.loadEventStart + 'ms');
            }
        }, 0);
    });
}
</script>

@stack('scripts')
</body>
</html>