@extends('layouts.main')

@section('content')
<div class="dashboard">
    <!-- Profile Edit Section -->
    <section class="profile-edit-section">
        <div class="container">
            <div class="section-header" data-aos="fade-down">
                <div class="header-badge">
                    <i class="bi bi-person-circle"></i>
                    Edit Profil
                </div>
                <h1 class="title">Perbarui Informasi Profil</h1>
                <p class="subtitle">Kelola dan perbarui informasi profil Anda dengan mudah dan aman</p>
            </div>

            <div class="profile-edit-grid">
                <!-- Main Edit Form Card -->
                <div class="edit-form-card" data-aos="fade-up" data-aos-delay="100">
                    <div class="card-header">
                        <h3>
                            <i class="bi bi-pencil-square"></i>
                            Informasi Profil
                        </h3>
                        <p>Pastikan informasi yang Anda masukkan akurat dan terkini</p>
                    </div>

                    <!-- Success Message -->
                    @if(session('status'))
                        <div class="alert alert-success" data-aos="fade-in">
                            <div class="alert-icon">
                                <i class="bi bi-check-circle-fill"></i>
                            </div>
                            <div class="alert-content">
                                <h6>Berhasil!</h6>
                                <span>{{ session('status') }}</span>
                            </div>
                        </div>
                    @endif

                    <!-- Error Messages -->
                    @if($errors->any())
                        <div class="alert alert-danger" data-aos="fade-in">
                            <div class="alert-icon">
                                <i class="bi bi-exclamation-triangle-fill"></i>
                            </div>
                            <div class="alert-content">
                                <h6>Terjadi Kesalahan!</h6>
                                <ul>
                                    @foreach($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        </div>
                    @endif

                    <!-- Profile Form -->
                    <form method="POST" action="{{ route('profile.update') }}" class="profile-form">
                        @csrf
                        @method('PATCH')
                        
                        <!-- Name Field -->
                        <div class="form-group">
                            <label for="name" class="form-label">
                                <div class="label-icon">
                                    <i class="bi bi-person"></i>
                                </div>
                                Nama Lengkap
                            </label>
                            <div class="input-wrapper">
                                <div class="input-icon">
                                    <i class="bi bi-person"></i>
                                </div>
                                <input type="text" 
                                       name="name" 
                                       id="name" 
                                       class="form-control @error('name') is-invalid @enderror" 
                                       value="{{ old('name', $user->name) }}" 
                                       required
                                       placeholder="Masukkan nama lengkap Anda">
                            </div>
                            @error('name')
                                <div class="form-error">
                                    <i class="bi bi-exclamation-circle"></i>
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>

                        <!-- NIP Field -->
                        <div class="form-group">
                            <label for="nip" class="form-label">
                                <div class="label-icon">
                                    <i class="bi bi-credit-card-2-front"></i>
                                </div>
                                NIP
                            </label>
                            <div class="input-wrapper">
                                <div class="input-icon">
                                    <i class="bi bi-credit-card-2-front"></i>
                                </div>
                                <input type="text" 
                                       name="nip" 
                                       id="nip" 
                                       class="form-control @error('nip') is-invalid @enderror" 
                                       value="{{ old('nip', $user->nip) }}" 
                                       placeholder="Masukkan NIP (jika ada)">
                            </div>
                            @error('nip')
                                <div class="form-error">
                                    <i class="bi bi-exclamation-circle"></i>
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>

                        <!-- Bidang Field -->
                        <div class="form-group">
                            <label for="bidang" class="form-label">
                                <div class="label-icon">
                                    <i class="bi bi-briefcase"></i>
                                </div>
                                Bidang
                            </label>
                            <div class="input-wrapper">
                                <div class="input-icon">
                                    <i class="bi bi-briefcase"></i>
                                </div>
                                <input type="text" 
                                       name="bidang" 
                                       id="bidang" 
                                       class="form-control @error('bidang') is-invalid @enderror" 
                                       value="{{ old('bidang', $user->bidang) }}" 
                                       placeholder="Masukkan bidang kerja (jika ada)">
                            </div>
                            @error('bidang')
                                <div class="form-error">
                                    <i class="bi bi-exclamation-circle"></i>
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>

                        <!-- Email Field -->
                        <div class="form-group">
                            <label for="email" class="form-label">
                                <div class="label-icon">
                                    <i class="bi bi-envelope"></i>
                                </div>
                                Alamat Email
                            </label>
                            <div class="input-wrapper">
                                <div class="input-icon">
                                    <i class="bi bi-envelope"></i>
                                </div>
                                <input type="email" 
                                       name="email" 
                                       id="email" 
                                       class="form-control @error('email') is-invalid @enderror" 
                                       value="{{ old('email', $user->email) }}" 
                                       required
                                       placeholder="Masukkan alamat email Anda">
                            </div>
                            @error('email')
                                <div class="form-error">
                                    <i class="bi bi-exclamation-circle"></i>
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>

                        <!-- Action Buttons -->
                        <div class="form-actions">
                            <a href="{{ route('user.home') }}" class="btn btn-outline">
                                <i class="bi bi-arrow-left"></i>
                                Kembali
                            </a>
                            <button type="submit" class="btn btn-primary">
                                <i class="bi bi-check-lg"></i>
                                Simpan Perubahan
                            </button>
                        </div>
                    </form>
                </div>

                <!-- Profile Info Card -->
                <div class="profile-info-card" data-aos="fade-up" data-aos-delay="200">
                    <div class="card-header">
                        <h3>
                            <i class="bi bi-info-circle"></i>
                            Informasi Akun
                        </h3>
                        <p>Detail akun dan status verifikasi Anda</p>
                    </div>

                    <div class="profile-details">
                        <!-- Current Profile -->
                        <div class="profile-current">
                            <div class="profile-avatar">
                                <div class="avatar">
                                    <i class="bi bi-person"></i>
                                </div>
                                <div class="avatar-status"></div>
                            </div>
                            <div class="profile-info">
                                <h4>{{ $user->name }}</h4>
                                <p>{{ $user->email }}</p>
                                @if($user->nip)
                                    <p><strong>NIP:</strong> {{ $user->nip }}</p>
                                @endif
                                @if($user->bidang)
                                    <p><strong>Bidang:</strong> {{ $user->bidang }}</p>
                                @endif
                                <div class="status-badge">
                                    <i class="bi bi-shield-check"></i>
                                    Terverifikasi
                                </div>
                            </div>
                        </div>

                        <!-- Account Stats -->
                        <div class="account-stats">
                            <div class="stat-item">
                                <div class="stat-icon">
                                    <i class="bi bi-calendar-plus"></i>
                                </div>
                                <div class="stat-content">
                                    <span class="stat-label">Bergabung Sejak</span>
                                    <span class="stat-value">{{ $user->created_at->format('d M Y') }}</span>
                                </div>
                            </div>
                            <div class="stat-item">
                                <div class="stat-icon">
                                    <i class="bi bi-clock-history"></i>
                                </div>
                                <div class="stat-content">
                                    <span class="stat-label">Terakhir Diperbarui</span>
                                    <span class="stat-value">{{ $user->updated_at->format('d M Y') }}</span>
                                </div>
                            </div>
                        </div>

                        <!-- Quick Actions -->
                        <div class="quick-actions">
                            <a href="{{ route('profile.password.edit') }}" class="action-item">
                                <div class="action-icon">
                                    <i class="bi bi-shield-lock"></i>
                                </div>
                                <span>Ganti Password</span>
                            </a>
                            <a href="{{ route('rentals.index') }}" class="action-item">
                                <div class="action-icon">
                                    <i class="bi bi-list-check"></i>
                                </div>
                                <span>Lihat Peminjaman</span>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>
@endsection

@push('styles')
<link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
<style>
/* CSS Variables - Green Theme (Same as home) */
:root {
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
    
    --secondary: #10b981;
    --accent: #059669;
    --success: #22c55e;
    --warning: #f59e0b;
    --danger: #ef4444;
    --info: #3b82f6;
        
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
    
    --shadow: 0 4px 6px -1px rgb(0 0 0 / 0.1);
    --shadow-md: 0 4px 6px -1px rgb(0 0 0 / 0.1), 0 2px 4px -1px rgb(0 0 0 / 0.06);
    --shadow-lg: 0 10px 15px -3px rgb(0 0 0 / 0.1), 0 4px 6px -2px rgb(0 0 0 / 0.05);
    --shadow-xl: 0 20px 25px -5px rgb(0 0 0 / 0.1), 0 10px 10px -5px rgb(0 0 0 / 0.04);
    --shadow-2xl: 0 25px 50px -12px rgb(0 0 0 / 0.25);
    
    --radius: 0.75rem;
    --radius-md: 0.875rem;
    --radius-lg: 1rem;
    --radius-xl: 1.5rem;
    --radius-2xl: 2rem;
        
    --gradient-primary: linear-gradient(135deg, var(--primary-500), var(--primary-600));
    --gradient-secondary: linear-gradient(135deg, var(--primary-400), var(--secondary));
    --gradient-accent: linear-gradient(135deg, var(--primary-500), var(--accent));
}

/* Base Styles */
.dashboard {
    background: var(--gray-50);
    min-height: 100vh;
}

.container {
    max-width: 1200px;
    margin: 0 auto;
    padding: 0 1rem;
}

/* Section Headers (Same as home) */
.section-header {
    text-align: center;
    margin-bottom: 3rem;
}

.header-badge {
    display: inline-flex;
    align-items: center;
    gap: 0.5rem;
    background: var(--gradient-primary);
    color: var(--white);
    padding: 0.5rem 1.25rem;
    border-radius: var(--radius-xl);
    font-size: 0.875rem;
    font-weight: 600;
    margin-bottom: 1rem;
    box-shadow: var(--shadow-md);
}

.section-header .title {
    font-size: clamp(1.75rem, 4vw, 2.75rem);
    font-weight: 800;
    color: var(--gray-900);
    margin-bottom: 0.75rem;
    line-height: 1.2;
}

.section-header .subtitle {
    font-size: 1.125rem;
    color: var(--gray-600);
    margin: 0;
    max-width: 600px;
    margin-left: auto;
    margin-right: auto;
    line-height: 1.6;
}

/* Buttons (Same as home) */
.btn {
    display: inline-flex;
    align-items: center;
    gap: 0.5rem;
    padding: 0.875rem 1.75rem;
    border-radius: var(--radius-lg);
    font-weight: 600;
    font-size: 0.875rem;
    text-decoration: none;
    border: none;
    cursor: pointer;
    transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
    position: relative;
    overflow: hidden;
}

.btn-primary {
    background: var(--gradient-primary);
    color: var(--white);
    box-shadow: var(--shadow-md);
}

.btn-primary:hover {
    transform: translateY(-2px);
    box-shadow: var(--shadow-lg);
}

.btn-outline {
    background: var(--white);
    color: var(--primary-600);
    border: 2px solid var(--primary-200);
}

.btn-outline:hover {
    background: var(--primary-50);
    border-color: var(--primary-500);
    color: var(--primary-700);
}

/* Profile Edit Section */
.profile-edit-section {
    padding: 4rem 0 3rem;
    background: linear-gradient(135deg, var(--primary-50) 0%, var(--white) 100%);
}

.profile-edit-grid {
    display: grid;
    grid-template-columns: 2fr 1fr;
    gap: 2rem;
    max-width: 1000px;
    margin: 0 auto;
}

/* Cards */
.edit-form-card,
.profile-info-card {
    background: var(--white);
    border-radius: var(--radius-xl);
    box-shadow: var(--shadow-md);
    padding: 2rem;
    border: 1px solid var(--gray-100);
    position: relative;
    overflow: hidden;
    transition: all 0.3s ease;
}

.edit-form-card::before,
.profile-info-card::before {
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

.edit-form-card:hover::before,
.profile-info-card:hover::before {
    transform: scaleX(1);
}

.edit-form-card:hover,
.profile-info-card:hover {
    transform: translateY(-4px);
    box-shadow: var(--shadow-lg);
}

/* Card Headers */
.card-header {
    margin-bottom: 2rem;
}

.card-header h3 {
    font-size: 1.25rem;
    font-weight: 700;
    color: var(--gray-900);
    margin: 0 0 0.5rem 0;
    display: flex;
    align-items: center;
    gap: 0.5rem;
}

.card-header p {
    color: var(--gray-600);
    margin: 0;
    font-size: 0.875rem;
}

/* Alerts */
.alert {
    display: flex;
    align-items: flex-start;
    gap: 1rem;
    padding: 1rem 1.25rem;
    border-radius: var(--radius-lg);
    margin-bottom: 1.5rem;
    border: 1px solid;
}

.alert-success {
    background: linear-gradient(135deg, var(--primary-50), var(--primary-100));
    border-color: var(--primary-200);
    color: var(--primary-800);
}

.alert-danger {
    background: linear-gradient(135deg, #fef2f2, #fee2e2);
    border-color: #fecaca;
    color: #991b1b;
}

.alert-icon {
    width: 2.5rem;
    height: 2.5rem;
    border-radius: 50%;
    display: flex;
    align-items: center;
    justify-content: center;
    font-size: 1.25rem;
    flex-shrink: 0;
}

.alert-success .alert-icon {
    background: var(--primary-200);
    color: var(--primary-700);
}

.alert-danger .alert-icon {
    background: #fecaca;
    color: #dc2626;
}

.alert-content h6 {
    font-weight: 700;
    margin: 0 0 0.25rem 0;
    font-size: 0.875rem;
}

.alert-content ul {
    margin: 0;
    padding-left: 1rem;
}

.alert-content ul li {
    font-size: 0.875rem;
}

/* Form Styles */
.profile-form {
    display: flex;
    flex-direction: column;
    gap: 1.5rem;
}

.form-group {
    display: flex;
    flex-direction: column;
    gap: 0.75rem;
}

.form-label {
    display: flex;
    align-items: center;
    gap: 0.5rem;
    font-weight: 600;
    color: var(--gray-900);
    font-size: 0.875rem;
}

.label-icon {
    width: 1.5rem;
    height: 1.5rem;
    background: var(--primary-100);
    color: var(--primary-600);
    border-radius: 50%;
    display: flex;
    align-items: center;
    justify-content: center;
    font-size: 0.75rem;
}

.input-wrapper {
    position: relative;
}

.input-icon {
    position: absolute;
    left: 1rem;
    top: 50%;
    transform: translateY(-50%);
    color: var(--gray-400);
    font-size: 1rem;
    z-index: 1;
}

.form-control {
    width: 100%;
    padding: 0.875rem 1rem 0.875rem 2.75rem;
    border: 2px solid var(--gray-200);
    border-radius: var(--radius-lg);
    font-size: 0.875rem;
    background: var(--white);
    transition: all 0.3s ease;
}

.form-control:focus {
    outline: none;
    border-color: var(--primary-500);
    box-shadow: 0 0 0 3px rgba(34, 197, 94, 0.1);
    transform: translateY(-1px);
}

.form-control.is-invalid {
    border-color: var(--danger);
}

.form-error {
    display: flex;
    align-items: center;
    gap: 0.5rem;
    color: var(--danger);
    font-size: 0.75rem;
    font-weight: 500;
}

.form-actions {
    display: flex;
    gap: 1rem;
    justify-content: flex-end;
    padding-top: 1rem;
    border-top: 1px solid var(--gray-200);
}

/* Profile Info Card */
.profile-details {
    display: flex;
    flex-direction: column;
    gap: 2rem;
}

.profile-current {
    display: flex;
    align-items: center;
    gap: 1rem;
    padding: 1.5rem;
    background: var(--gray-50);
    border-radius: var(--radius-lg);
    border: 1px solid var(--gray-100);
}

.profile-avatar {
    position: relative;
}

.avatar {
    width: 3.5rem;
    height: 3.5rem;
    background: var(--gradient-primary);
    border-radius: 50%;
    display: flex;
    align-items: center;
    justify-content: center;
    color: var(--white);
    font-size: 1.25rem;
    flex-shrink: 0;
}

.avatar-status {
    position: absolute;
    bottom: 0;
    right: 0;
    width: 0.875rem;
    height: 0.875rem;
    background: var(--success);
    border: 2px solid var(--white);
    border-radius: 50%;
}

.profile-info {
    text-align: left;
    display: flex;
    flex-direction: column;
    gap: 0.2rem;
}

.profile-info h4 {
    margin-bottom: 0.1rem;
    font-size: 1.1rem;
    font-weight: 700;
    word-break: break-word;
}

.profile-info p {
    margin-bottom: 0.1rem;
    font-size: 1rem;
    color: #4b5563;
    word-break: break-word;
}

.profile-info p strong {
    margin-right: 0.2rem;
}

.status-badge {
    display: inline-flex;
    align-items: center;
    gap: 0.25rem;
    background: var(--primary-100);
    color: var(--primary-700);
    padding: 0.25rem 0.75rem;
    border-radius: var(--radius);
    font-size: 0.75rem;
    font-weight: 600;
}

/* Account Stats */
.account-stats {
    display: flex;
    flex-direction: column;
    gap: 1rem;
}

.stat-item {
    display: flex;
    align-items: center;
    gap: 1rem;
    padding: 1rem;
    background: var(--gray-50);
    border-radius: var(--radius-lg);
    border: 1px solid var(--gray-100);
    transition: all 0.3s ease;
}

.stat-item:hover {
    background: var(--primary-50);
    border-color: var(--primary-200);
}

.stat-icon {
    width: 2.5rem;
    height: 2.5rem;
    background: var(--white);
    border-radius: var(--radius);
    display: flex;
    align-items: center;
    justify-content: center;
    color: var(--primary-600);
    font-size: 1rem;
    box-shadow: var(--shadow);
    flex-shrink: 0;
}

.stat-content {
    display: flex;
    flex-direction: column;
    gap: 0.25rem;
}

.stat-label {
    font-size: 0.75rem;
    color: var(--gray-500);
    font-weight: 500;
    text-transform: uppercase;
    letter-spacing: 0.025em;
}

.stat-value {
    font-size: 0.875rem;
    font-weight: 600;
    color: var(--gray-900);
}

/* Quick Actions */
.quick-actions {
    display: flex;
    flex-direction: column;
    gap: 0.75rem;
}

.action-item {
    display: flex;
    align-items: center;
    gap: 0.75rem;
    padding: 1rem;
    background: var(--gray-50);
    border-radius: var(--radius-lg);
    text-decoration: none;
    color: var(--gray-700);
    transition: all 0.3s ease;
    border: 1px solid var(--gray-100);
}

.action-item:hover {
    background: var(--primary-50);
    color: var(--primary-700);
    transform: translateY(-1px);
    box-shadow: var(--shadow-md);
}

.action-icon {
    width: 2rem;
    height: 2rem;
    background: var(--white);
    border-radius: var(--radius);
    display: flex;
    align-items: center;
    justify-content: center;
    font-size: 0.875rem;
    color: var(--primary-600);
    box-shadow: var(--shadow);
    flex-shrink: 0;
}

.action-item span {
    font-size: 0.875rem;
    font-weight: 600;
}

/* Responsive Design */
@media (max-width: 1024px) {
    .profile-edit-grid {
        grid-template-columns: 1fr;
        gap: 1.5rem;
    }
}

@media (max-width: 768px) {
    .container {
        padding: 0 0.75rem;
    }
    
    .profile-edit-section {
        padding: 2.5rem 0;
    }
    
    .edit-form-card,
    .profile-info-card {
        padding: 1.5rem;
    }
    
    .form-actions {
        flex-direction: column;
        align-items: stretch;
    }
    
    .form-actions .btn {
        justify-content: center;
    }
    
    .profile-current {
        flex-direction: column;
        text-align: center;
        gap: 1rem;
    }
    
    .profile-info {
        text-align: center;
        align-items: center;
    }
    
    .quick-actions {
        gap: 0.5rem;
    }
}

@media (max-width: 480px) {
    .container {
        padding: 0 0.5rem;
    }
    
    .profile-edit-grid {
        gap: 1rem;
    }
    
    .edit-form-card,
    .profile-info-card {
        padding: 1rem;
    }
    
    .card-header {
        margin-bottom: 1.5rem;
    }
    
    .profile-form {
        gap: 1rem;
    }
    
    .account-stats {
        gap: 0.75rem;
    }
    
    .stat-item {
        padding: 0.75rem;
    }
}
</style>
@endpush

@push('scripts')
<script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
<script>
document.addEventListener('DOMContentLoaded', function() {
    // Disable AOS on mobile for better performance
    if (window.innerWidth <= 768) {
        document.querySelectorAll('[data-aos]').forEach(el => {
            el.removeAttribute('data-aos');
            el.style.opacity = 1;
            el.style.transform = 'none';
        });
    } else {
        // Initialize AOS
        AOS.init({
            duration: 600,
            easing: 'ease-out-cubic',
            once: true,
            offset: 50
        });
    }

    // Enhanced form interactions
    const formControls = document.querySelectorAll('.form-control');
    formControls.forEach(control => {
        control.addEventListener('focus', function() {
            this.parentElement.style.transform = 'translateY(-2px)';
        });
        
        control.addEventListener('blur', function() {
            this.parentElement.style.transform = 'translateY(0)';
        });
    });

    // Button ripple effect (same as home)
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

    // Enhanced hover effects for cards
    document.querySelectorAll('.edit-form-card, .profile-info-card, .stat-item, .action-item').forEach(card => {
        card.addEventListener('mouseenter', function() {
            if (!this.classList.contains('edit-form-card') && !this.classList.contains('profile-info-card')) {
                this.style.transform = 'translateY(-2px) scale(1.01)';
            }
        });
        
        card.addEventListener('mouseleave', function() {
            if (!this.classList.contains('edit-form-card') && !this.classList.contains('profile-info-card')) {
                this.style.transform = 'translateY(0) scale(1)';
            }
        });
    });
});
</script>
@endpush