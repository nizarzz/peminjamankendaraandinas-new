@extends('layouts.main')

@section('content')
<div class="dashboard">
    <!-- Password Edit Section -->
    <section class="profile-edit-section">
        <div class="container">
            <div class="section-header" data-aos="fade-down">
                <div class="header-badge">
                    <i class="bi bi-shield-lock"></i>
                    Ganti Password
                </div>
                <h1 class="title">Perbarui Kata Sandi</h1>
                <p class="subtitle">Jaga keamanan akun Anda dengan menggunakan kata sandi yang kuat dan unik</p>
            </div>

            <div class="profile-edit-grid">
                <!-- Main Password Form Card -->
                <div class="edit-form-card" data-aos="fade-up" data-aos-delay="100">
                    <div class="card-header">
                        <h3>
                            <i class="bi bi-key"></i>
                            Ubah Kata Sandi
                        </h3>
                        <p>Pastikan kata sandi baru Anda aman dan mudah diingat</p>
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

                    <!-- Password Form -->
                    <form method="POST" action="{{ route('profile.password.update') }}" class="profile-form">
                        @csrf
                        @method('PATCH')
                        
                        <!-- Current Password Field -->
                        <div class="form-group">
                            <label for="current_password" class="form-label">
                                <div class="label-icon">
                                    <i class="bi bi-lock"></i>
                                </div>
                                Kata Sandi Saat Ini
                            </label>
                            <div class="input-wrapper">
                                <div class="input-icon">
                                    <i class="bi bi-lock"></i>
                                </div>
                                <input type="password" 
                                       name="current_password" 
                                       id="current_password" 
                                       class="form-control @error('current_password') is-invalid @enderror" 
                                       required
                                       placeholder="Masukkan kata sandi saat ini">
                                <button type="button" class="password-toggle" data-target="current_password">
                                    <i class="bi bi-eye"></i>
                                </button>
                            </div>
                            @error('current_password')
                                <div class="form-error">
                                    <i class="bi bi-exclamation-circle"></i>
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>

                        <!-- New Password Field -->
                        <div class="form-group">
                            <label for="password" class="form-label">
                                <div class="label-icon">
                                    <i class="bi bi-shield-plus"></i>
                                </div>
                                Kata Sandi Baru
                            </label>
                            <div class="input-wrapper">
                                <div class="input-icon">
                                    <i class="bi bi-shield-plus"></i>
                                </div>
                                <input type="password" 
                                       name="password" 
                                       id="password" 
                                       class="form-control @error('password') is-invalid @enderror" 
                                       required
                                       placeholder="Masukkan kata sandi baru">
                                <button type="button" class="password-toggle" data-target="password">
                                    <i class="bi bi-eye"></i>
                                </button>
                            </div>
                            <div class="password-strength">
                                <div class="strength-bar">
                                    <div class="strength-fill"></div>
                                </div>
                                <span class="strength-text">Kekuatan kata sandi</span>
                            </div>
                            @error('password')
                                <div class="form-error">
                                    <i class="bi bi-exclamation-circle"></i>
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>

                        <!-- Confirm Password Field -->
                        <div class="form-group">
                            <label for="password_confirmation" class="form-label">
                                <div class="label-icon">
                                    <i class="bi bi-shield-check"></i>
                                </div>
                                Konfirmasi Kata Sandi
                            </label>
                            <div class="input-wrapper">
                                <div class="input-icon">
                                    <i class="bi bi-shield-check"></i>
                                </div>
                                <input type="password" 
                                       name="password_confirmation" 
                                       id="password_confirmation" 
                                       class="form-control @error('password_confirmation') is-invalid @enderror" 
                                       required
                                       placeholder="Konfirmasi kata sandi baru">
                                <button type="button" class="password-toggle" data-target="password_confirmation">
                                    <i class="bi bi-eye"></i>
                                </button>
                            </div>
                            <div class="password-match">
                                <i class="bi bi-check-circle"></i>
                                <span>Kata sandi cocok</span>
                            </div>
                            @error('password_confirmation')
                                <div class="form-error">
                                    <i class="bi bi-exclamation-circle"></i>
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>

                        <!-- Action Buttons -->
                        <div class="form-actions">
                            <a href="{{ route('profile.edit') }}" class="btn btn-outline">
                                <i class="bi bi-arrow-left"></i>
                                Kembali
                            </a>
                            <button type="submit" class="btn btn-primary">
                                <i class="bi bi-shield-check"></i>
                                Perbarui Password
                            </button>
                        </div>
                    </form>
                </div>

                <!-- Security Info Card -->
                <div class="profile-info-card" data-aos="fade-up" data-aos-delay="200">
                    <div class="card-header">
                        <h3>
                            <i class="bi bi-shield-exclamation"></i>
                            Keamanan Akun
                        </h3>
                        <p>Tips dan informasi untuk menjaga keamanan akun Anda</p>
                    </div>

                    <div class="profile-details">
                        <!-- Security Status -->
                        <div class="profile-current">
                            <div class="profile-avatar">
                                <div class="avatar security-avatar">
                                    <i class="bi bi-shield-check"></i>
                                </div>
                                <div class="avatar-status"></div>
                            </div>
                            <div class="profile-info">
                                <h4>{{ auth()->user()->name }}</h4>
                                <p>{{ auth()->user()->email }}</p>
                                <div class="status-badge">
                                    <i class="bi bi-shield-lock"></i>
                                    Akun Aman
                                </div>
                            </div>
                        </div>

                        <!-- Security Tips -->
                        <div class="security-tips">
                            <h5>
                                <i class="bi bi-lightbulb"></i>
                                Tips Keamanan
                            </h5>
                            <div class="tip-item">
                                <div class="tip-icon">
                                    <i class="bi bi-check-circle"></i>
                                </div>
                                <div class="tip-content">
                                    <span class="tip-title">Gunakan kata sandi yang kuat</span>
                                    <span class="tip-desc">Minimal 8 karakter dengan kombinasi huruf, angka, dan simbol</span>
                                </div>
                            </div>
                            <div class="tip-item">
                                <div class="tip-icon">
                                    <i class="bi bi-check-circle"></i>
                                </div>
                                <div class="tip-content">
                                    <span class="tip-title">Jangan gunakan kata sandi yang sama</span>
                                    <span class="tip-desc">Hindari menggunakan kata sandi yang sama di platform lain</span>
                                </div>
                            </div>
                            <div class="tip-item">
                                <div class="tip-icon">
                                    <i class="bi bi-check-circle"></i>
                                </div>
                                <div class="tip-content">
                                    <span class="tip-title">Perbarui secara berkala</span>
                                    <span class="tip-desc">Ganti kata sandi setiap 3-6 bulan untuk keamanan optimal</span>
                                </div>
                            </div>
                        </div>

                        <!-- Account Stats -->
                        <div class="account-stats">
                            <div class="stat-item">
                                <div class="stat-icon">
                                    <i class="bi bi-clock-history"></i>
                                </div>
                                <div class="stat-content">
                                    <span class="stat-label">Terakhir Login</span>
                                    <span class="stat-value">{{ now()->format('d M Y, H:i') }}</span>
                                </div>
                            </div>
                            <div class="stat-item">
                                <div class="stat-icon">
                                    <i class="bi bi-shield-check"></i>
                                </div>
                                <div class="stat-content">
                                    <span class="stat-label">Status Keamanan</span>
                                    <span class="stat-value">Sangat Aman</span>
                                </div>
                            </div>
                        </div>

                        <!-- Quick Actions -->
                        <div class="quick-actions">
                            <a href="{{ route('profile.edit') }}" class="action-item">
                                <div class="action-icon">
                                    <i class="bi bi-person-gear"></i>
                                </div>
                                <span>Edit Profil</span>
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
/* CSS Variables - Green Theme (Same as profile edit) */
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

/* Base Styles (Same as profile edit) */
.dashboard {
    background: var(--gray-50);
    min-height: 100vh;
}

.container {
    max-width: 1200px;
    margin: 0 auto;
    padding: 0 1rem;
}

/* Section Headers (Same as profile edit) */
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

/* Buttons (Same as profile edit) */
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

/* Profile Edit Section (Same as profile edit) */
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

/* Cards (Same as profile edit) */
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

/* Card Headers (Same as profile edit) */
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

/* Alerts (Same as profile edit) */
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

/* Form Styles (Enhanced for password) */
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
    padding: 0.875rem 3.5rem 0.875rem 2.75rem;
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

/* Password Toggle */
.password-toggle {
    position: absolute;
    right: 1rem;
    top: 50%;
    transform: translateY(-50%);
    background: none;
    border: none;
    color: var(--gray-400);
    cursor: pointer;
    font-size: 1rem;
    z-index: 2;
    transition: color 0.3s ease;
}

.password-toggle:hover {
    color: var(--primary-600);
}

/* Password Strength */
.password-strength {
    display: flex;
    align-items: center;
    gap: 0.75rem;
    margin-top: 0.5rem;
}

.strength-bar {
    flex: 1;
    height: 4px;
    background: var(--gray-200);
    border-radius: 2px;
    overflow: hidden;
}

.strength-fill {
    height: 100%;
    width: 0%;
    background: var(--danger);
    transition: all 0.3s ease;
    border-radius: 2px;
}

.strength-text {
    font-size: 0.75rem;
    color: var(--gray-500);
    font-weight: 500;
    min-width: 120px;
}

/* Password Match */
.password-match {
    display: none;
    align-items: center;
    gap: 0.5rem;
    color: var(--success);
    font-size: 0.75rem;
    font-weight: 500;
    margin-top: 0.5rem;
}

.password-match.show {
    display: flex;
}

/* Security Avatar */
.security-avatar {
    background: linear-gradient(135deg, var(--info), #2563eb) !important;
}

/* Security Tips */
.security-tips {
    padding: 1.5rem;
    background: var(--gray-50);
    border-radius: var(--radius-lg);
    border: 1px solid var(--gray-100);
}

.security-tips h5 {
    font-size: 1rem;
    font-weight: 700;
    color: var(--gray-900);
    margin: 0 0 1rem 0;
    display: flex;
    align-items: center;
    gap: 0.5rem;
}

.tip-item {
    display: flex;
    align-items: flex-start;
    gap: 0.75rem;
    margin-bottom: 1rem;
}

.tip-item:last-child {
    margin-bottom: 0;
}

.tip-icon {
    width: 1.5rem;
    height: 1.5rem;
    background: var(--primary-100);
    color: var(--primary-600);
    border-radius: 50%;
    display: flex;
    align-items: center;
    justify-content: center;
    font-size: 0.75rem;
    flex-shrink: 0;
    margin-top: 0.125rem;
}

.tip-content {
    display: flex;
    flex-direction: column;
    gap: 0.25rem;
}

.tip-title {
    font-size: 0.875rem;
    font-weight: 600;
    color: var(--gray-900);
}

.tip-desc {
    font-size: 0.75rem;
    color: var(--gray-600);
    line-height: 1.4;
}

/* Profile Info Card (Same as profile edit) */
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

.profile-info h4 {
    font-size: 1.125rem;
    font-weight: 700;
    color: var(--gray-900);
    margin: 0 0 0.25rem 0;
}

.profile-info p {
    color: var(--gray-600);
    margin: 0 0 0.5rem 0;
    font-size: 0.875rem;
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

/* Account Stats (Same as profile edit) */
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

/* Quick Actions (Same as profile edit) */
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

/* Responsive Design (Same as profile edit) */
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
    
    .quick-actions {
        gap: 0.5rem;
    }
    
    .security-tips {
        padding: 1rem;
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
    
    .form-control {
        padding: 0.75rem 3rem 0.75rem 2.5rem;
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

    // Password toggle functionality
    document.querySelectorAll('.password-toggle').forEach(toggle => {
        toggle.addEventListener('click', function() {
            const targetId = this.getAttribute('data-target');
            const input = document.getElementById(targetId);
            const icon = this.querySelector('i');
            
            if (input.type === 'password') {
                input.type = 'text';
                icon.className = 'bi bi-eye-slash';
            } else {
                input.type = 'password';
                icon.className = 'bi bi-eye';
            }
        });
    });

    // Password strength checker
    const passwordInput = document.getElementById('password');
    const strengthBar = document.querySelector('.strength-fill');
    const strengthText = document.querySelector('.strength-text');
    
    if (passwordInput && strengthBar && strengthText) {
        passwordInput.addEventListener('input', function() {
            const password = this.value;
            const strength = calculatePasswordStrength(password);
            
            strengthBar.style.width = strength.percentage + '%';
            strengthBar.style.background = strength.color;
            strengthText.textContent = strength.text;
        });
    }
    
    function calculatePasswordStrength(password) {
        let score = 0;
        let feedback = 'Sangat Lemah';
        let color = '#ef4444';
        
        if (password.length >= 8) score += 25;
        if (password.match(/[a-z]/)) score += 25;
        if (password.match(/[A-Z]/)) score += 25;
        if (password.match(/[0-9]/)) score += 15;
        if (password.match(/[^a-zA-Z0-9]/)) score += 10;
        
        if (score >= 90) {
            feedback = 'Sangat Kuat';
            color = '#22c55e';
        } else if (score >= 70) {
            feedback = 'Kuat';
            color = '#16a34a';
        } else if (score >= 50) {
            feedback = 'Sedang';
            color = '#f59e0b';
        } else if (score >= 25) {
            feedback = 'Lemah';
            color = '#f97316';
        }
        
        return {
            percentage: Math.min(score, 100),
            text: feedback,
            color: color
        };
    }

    // Password confirmation checker
    const confirmInput = document.getElementById('password_confirmation');
    const passwordMatch = document.querySelector('.password-match');
    
    if (confirmInput && passwordMatch) {
        function checkPasswordMatch() {
            const password = passwordInput.value;
            const confirm = confirmInput.value;
            
            if (confirm.length > 0) {
                if (password === confirm) {
                    passwordMatch.classList.add('show');
                    passwordMatch.style.color = 'var(--success)';
                    passwordMatch.querySelector('span').textContent = 'Kata sandi cocok';
                } else {
                    passwordMatch.classList.add('show');
                    passwordMatch.style.color = 'var(--danger)';
                    passwordMatch.querySelector('span').textContent = 'Kata sandi tidak cocok';
                }
            } else {
                passwordMatch.classList.remove('show');
            }
        }
        
        passwordInput.addEventListener('input', checkPasswordMatch);
        confirmInput.addEventListener('input', checkPasswordMatch);
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

    // Button ripple effect (same as profile edit)
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
    document.querySelectorAll('.edit-form-card, .profile-info-card, .stat-item, .action-item, .tip-item').forEach(card => {
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