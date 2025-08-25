@extends('layouts.main')

@section('content')
<div class="dashboard">
    <!-- Stats Section -->
    <section class="stats-section">
        <div class="container">
            <div class="section-header">
                <div class="header-badge">
                    <i class="bi bi-speedometer2"></i>
                    Dashboard Overview
                </div>
                <h1 class="title">Selamat Datang di Dashboard</h1>
                <p class="subtitle">Monitor dan kelola aktivitas peminjaman kendaraan Anda dengan mudah</p>
            </div>

            <div class="stats-grid">
                <div class="stat-card total">
                    <div class="stat-icon">
                        <i class="bi bi-clipboard-data"></i>
                    </div>
                    <div class="stat-content">
                        <div class="stat-number">{{ $totalRentals ?? 0 }}</div>
                        <div class="stat-label">Total Peminjaman</div>
                        <div class="stat-trend positive">
                            <i class="bi bi-arrow-up"></i>
                            <span>+12%</span>
                        </div>
                    </div>
                </div>
                
                <!-- Tambahkan statistik total kendaraan tersedia -->
                <div class="stat-card available">
                    <div class="stat-icon" style="background: var(--primary-light);">
                        <i class="bi bi-truck"></i>
                    </div>
                    <div class="stat-content">
                        <div class="stat-number">{{ $totalAvailableVehicles ?? 0 }}</div>
                        <div class="stat-label">Kendaraan Tersedia</div>
                        <div class="stat-trend positive">
                            <i class="bi bi-arrow-up"></i>
                            <span>+0%</span>
                        </div>
                    </div>
                </div>
                
                <div class="stat-card approved">
                    <div class="stat-icon">
                        <i class="bi bi-check-circle"></i>
                    </div>
                    <div class="stat-content">
                        <div class="stat-number">{{ $approvedRentals ?? 0 }}</div>
                        <div class="stat-label">Disetujui</div>
                        <div class="stat-trend positive">
                            <i class="bi bi-arrow-up"></i>
                            <span>+8%</span>
                        </div>
                    </div>
                </div>
                
                <div class="stat-card pending">
                    <div class="stat-icon">
                        <i class="bi bi-hourglass-split"></i>
                    </div>
                    <div class="stat-content">
                        <div class="stat-number">{{ $pendingRentals ?? 0 }}</div>
                        <div class="stat-label">Pending</div>
                        <div class="stat-trend neutral">
                            <i class="bi bi-dash"></i>
                            <span>0%</span>
                        </div>
                    </div>
                </div>
                
                <div class="stat-card ongoing">
                    <div class="stat-icon">
                        <i class="bi bi-clock-history"></i>
                    </div>
                    <div class="stat-content">
                        <div class="stat-number">{{ $ongoingRentals ?? 0 }}</div>
                        <div class="stat-label">Sedang Berlangsung</div>
                        <div class="stat-trend negative">
                            <i class="bi bi-arrow-down"></i>
                            <span>-3%</span>
                        </div>
                    </div>
                </div>
                
                <div class="stat-card rejected">
                    <div class="stat-icon">
                        <i class="bi bi-x-circle"></i>
                    </div>
                    <div class="stat-content">
                        <div class="stat-number">{{ $rejectedRentals ?? 0 }}</div>
                        <div class="stat-label">Ditolak</div>
                        <div class="stat-trend negative">
                            <i class="bi bi-arrow-down"></i>
                            <span>-5%</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Quick Actions & Profile Section -->
    <section class="quick-section">
        <div class="container">
            <div class="quick-grid">
                <!-- Profile Card -->
                <div class="profile-card">
                    <div class="profile-header">
                        <div class="profile-avatar">
                            <div class="avatar">
                                <i class="bi bi-person"></i>
                            </div>
                            <div class="avatar-status"></div>
                        </div>
                        <div class="profile-info">
                            <h3>{{ auth()->user()->name ?? 'Nama Pengguna' }}</h3>
                            <p>{{ auth()->user()->email ?? 'email@example.com' }}</p>
                            <div class="status-badge">
                                <i class="bi bi-shield-check"></i>
                                Terverifikasi
                            </div>
                        </div>
                    </div>
                    <div class="profile-actions">
                        <a href="{{ route('profile.edit') }}" class="btn btn-primary">
                            <i class="bi bi-pencil"></i>
                            Edit Profil
                        </a>
                        <a href="{{ route('profile.password.edit') }}" class="btn btn-outline">
                            <i class="bi bi-shield-lock"></i>
                            Ganti Password
                        </a>
                    </div>
                </div>

                <!-- Quick Actions Card -->
                <div class="actions-card">
                    <div class="card-header">
                        <h3>
                            <i class="bi bi-lightning-charge"></i>
                            Aksi Cepat
                        </h3>
                        <p>Akses fitur utama dengan sekali klik</p>
                    </div>
                    <div class="actions-grid">
                        <a href="{{ route('rentals.create') }}" class="action-item">
                            <div class="action-icon">
                                <i class="bi bi-car-front"></i>
                            </div>
                            <span>Pinjam Kendaraan</span>
                        </a>
                        <a href="{{ route('rentals.index') }}" class="action-item">
                            <div class="action-icon">
                                <i class="bi bi-list-check"></i>
                            </div>
                            <span>Lihat Peminjaman</span>
                        </a>
                        @if($rental)
                        <a href="{{ route('rentals.return.form', $rental->id) }}" class="action-item">
                            <div class="action-icon">
                                <i class="bi bi-arrow-return-left"></i>
                            </div>
                            <span>Pengembalian</span>
                        </a>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Hero Section -->
    <section class="hero-section">
        <div class="container">
            <div class="hero-content">
                <div class="hero-badge">
                    <i class="bi bi-stars"></i>
                    Sistem Peminjaman Kendaraan Dinas
                </div>

                <h1 class="hero-title">
                    Manajemen Kendaraan
                    <span class="accent">Modern & Efisien</span>
                </h1>

                <p class="hero-description">
                    Transformasi digital untuk pengelolaan armada kendaraan dinas dengan teknologi terkini. 
                    Kelola, pantau, dan optimalkan penggunaan kendaraan dengan mudah dan efisien.
                </p>

                <div class="hero-stats">
                    <div class="hero-stat">
                        <div class="stat-value">150+</div>
                        <div class="stat-text">Kendaraan Tersedia</div>
                    </div>
                    <div class="hero-stat">
                        <div class="stat-value">1200+</div>
                        <div class="stat-text">Total Peminjaman</div>
                    </div>
                    <div class="hero-stat">
                        <div class="stat-value">98%</div>
                        <div class="stat-text">Tingkat Kepuasan</div>
                    </div>
                </div>
            </div>

            <div class="hero-visual">
                <div class="visual-wrapper">
                    <img src="https://images.unsplash.com/photo-1492144534655-ae79c964c9d7?auto=format&fit=crop&w=800&q=80"
                         alt="Modern Fleet Management" loading="lazy">
                </div>
            </div>
        </div>
    </section>

    <!-- Process Section -->
    <section class="process-section">
        <div class="container">
            <div class="section-header">
                <div class="header-badge">
                    <i class="bi bi-gear"></i>
                    Cara Kerja
                </div>
                <h2>Proses Sederhana & Efisien</h2>
                <p>Hanya 3 langkah mudah untuk meminjam kendaraan dinas</p>
            </div>

            <div class="process-timeline">
                <div class="process-item">
                    <div class="process-number">01</div>
                    <div class="process-content">
                        <div class="process-icon">
                            <i class="bi bi-person-plus"></i>
                        </div>
                        <h3>Daftar & Login</h3>
                        <p>Buat akun atau login dengan kredensial yang sudah ada untuk mengakses sistem peminjaman kendaraan</p>
                    </div>
                </div>

                <div class="process-item">
                    <div class="process-number">02</div>
                    <div class="process-content">
                        <div class="process-icon">
                            <i class="bi bi-car-front"></i>
                        </div>
                        <h3>Pilih Kendaraan</h3>
                        <p>Pilih kendaraan yang tersedia sesuai kebutuhan dan jadwal perjalanan dinas Anda</p>
                    </div>
                </div>

                <div class="process-item">
                    <div class="process-number">03</div>
                    <div class="process-content">
                        <div class="process-icon">
                            <i class="bi bi-check-circle"></i>
                        </div>
                        <h3>Konfirmasi & Gunakan</h3>
                        <p>Dapatkan persetujuan dari admin dan mulai gunakan kendaraan sesuai jadwal yang telah ditentukan</p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Features Section -->
    <section class="features-section">
        <div class="container">
            <div class="section-header">
                <div class="header-badge">
                    <i class="bi bi-gem"></i>
                    Keunggulan Sistem
                </div>
                <h2>Solusi Terintegrasi & Canggih</h2>
                <p>Fitur-fitur unggulan yang memudahkan pengelolaan kendaraan dinas</p>
            </div>

            <div class="features-grid">
                <div class="feature-card">
                    <div class="feature-icon">
                        <i class="bi bi-lightning-charge"></i>
                    </div>
                    <h3>Proses Instan</h3>
                    <p>Peminjaman disetujui dalam hitungan menit dengan verifikasi otomatis.</p>
                </div>
                
                <div class="feature-card">
                    <div class="feature-icon">
                        <i class="bi bi-graph-up-arrow"></i>
                    </div>
                    <h3>Analitik Cerdas</h3>
                    <p>Laporan penggunaan kendaraan dan analisis efisiensi secara real-time.</p>
                </div>
                
                <div class="feature-card">
                    <div class="feature-icon">
                        <i class="bi bi-shield-lock"></i>
                    </div>
                    <h3>Keamanan Data</h3>
                    <p>Enkripsi tingkat tinggi dan backup otomatis untuk melindungi data sensitif.</p>
                </div>
                
                <div class="feature-card">
                    <div class="feature-icon">
                        <i class="bi bi-phone"></i>
                    </div>
                    <h3>Mobile Friendly</h3>
                    <p>Akses sistem secara optimal dari perangkat mobile dengan responsive design.</p>
                </div>

                <div class="feature-card">
                    <div class="feature-icon">
                        <i class="bi bi-headset"></i>
                    </div>
                    <h3>Support 24/7</h3>
                    <p>Tim support siap membantu Anda kapan saja untuk kelancaran operasional.</p>
                </div>
            </div>
        </div>
    </section>

    <!-- CTA Section -->
    <section class="cta-section">
        <div class="container">
            <div class="cta-content">
                <div class="cta-icon">
                    <i class="bi bi-rocket-takeoff"></i>
                </div>
                <h2>Siap Memulai Perjalanan Digital?</h2>
                <p>Bergabunglah dengan sistem manajemen kendaraan modern dan rasakan kemudahan pengelolaan armada</p>
                <div class="cta-actions">
                    <a href="{{ route('rentals.create') }}" class="btn btn-white">
                        <i class="bi bi-car-front"></i>
                        Mulai Pinjam Sekarang
                    </a>
                    <a href="{{ route('rentals.index') }}" class="btn btn-outline-white">
                        <i class="bi bi-list-check"></i>
                        Lihat Riwayat
                    </a>
                </div>
            </div>
        </div>
    </section>
</div>
@endsection

@push('styles')
<style>
/* Optimized CSS Variables */
:root {
    --primary: #22c55e;
    --primary-dark: #16a34a;
    --primary-light: #4ade80;
    --primary-50: #f0fdf4;
    --primary-100: #dcfce7;
    --primary-600: #16a34a;
    --primary-700: #15803d;
    
    --secondary: #10b981;
    --success: #22c55e;
    --warning: #f59e0b;
    --danger: #ef4444;
    --info: #3b82f6;
    
    --gray-50: #f9fafb;
    --gray-100: #f3f4f6;
    --gray-200: #e5e7eb;
    --gray-600: #4b5563;
    --gray-700: #374151;
    --gray-900: #111827;
    --white: #ffffff;
    
    --shadow: 0 1px 3px 0 rgb(0 0 0 / 0.1);
    --shadow-md: 0 4px 6px -1px rgb(0 0 0 / 0.1);
    --shadow-lg: 0 10px 15px -3px rgb(0 0 0 / 0.1);
    
    --radius: 0.75rem;
    --radius-lg: 1rem;
    --radius-xl: 1.5rem;
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

/* Section Headers */
.section-header {
    text-align: center;
    margin-bottom: 2.5rem;
}

.header-badge {
    display: inline-flex;
    align-items: center;
    gap: 0.5rem;
    background: linear-gradient(135deg, var(--primary), var(--primary-dark));
    color: var(--white);
    padding: 0.5rem 1.25rem;
    border-radius: var(--radius-xl);
    font-size: 0.875rem;
    font-weight: 600;
    margin-bottom: 1rem;
    box-shadow: var(--shadow-md);
}

.section-header .title {
    font-size: clamp(1.75rem, 4vw, 2.5rem);
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

.section-header h2 {
    font-size: clamp(1.5rem, 3vw, 2rem);
    font-weight: 700;
    color: var(--gray-900);
    margin-bottom: 0.75rem;
    line-height: 1.3;
}

/* Buttons */
.btn {
    display: inline-flex;
    align-items: center;
    gap: 0.5rem;
    padding: 0.75rem 1.5rem;
    border-radius: var(--radius-lg);
    font-weight: 600;
    font-size: 0.875rem;
    text-decoration: none;
    border: none;
    cursor: pointer;
    transition: all 0.2s ease;
}

.btn-primary {
    background: linear-gradient(135deg, var(--primary), var(--primary-dark));
    color: var(--white);
    box-shadow: var(--shadow-md);
}

.btn-primary:hover {
    transform: translateY(-1px);
    box-shadow: var(--shadow-lg);
}

.btn-outline {
    background: var(--white);
    color: var(--primary-600);
    border: 2px solid var(--primary-100);
}

.btn-outline:hover {
    background: var(--primary-50);
    border-color: var(--primary);
}

.btn-white {
    background: var(--white);
    color: var(--primary-600);
    box-shadow: var(--shadow-md);
}

.btn-white:hover {
    transform: translateY(-1px);
    box-shadow: var(--shadow-lg);
}

.btn-outline-white {
    background: transparent;
    color: var(--white);
    border: 2px solid var(--white);
}

.btn-outline-white:hover {
    background: var(--white);
    color: var(--primary-600);
}

/* Stats Section */
.stats-section {
    padding: 3rem 0;
    background: linear-gradient(135deg, var(--primary-50) 0%, var(--white) 100%);
}

.stats-grid {
    display: grid;
    grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
    gap: 1.5rem;
}

.stat-card {
    background: var(--white);
    border-radius: var(--radius-xl);
    box-shadow: var(--shadow-md);
    padding: 1.5rem;
    display: flex;
    align-items: flex-start;
    gap: 1rem;
    transition: transform 0.2s ease;
    border: 1px solid var(--gray-100);
}

.stat-card:hover {
    transform: translateY(-2px);
}

.stat-icon {
    width: 3rem;
    height: 3rem;
    border-radius: var(--radius-lg);
    display: flex;
    align-items: center;
    justify-content: center;
    font-size: 1.25rem;
    color: var(--white);
    flex-shrink: 0;
}

.stat-card.total .stat-icon { background: var(--primary); }
.stat-card.approved .stat-icon { background: var(--success); }
.stat-card.pending .stat-icon { background: var(--warning); }
.stat-card.ongoing .stat-icon { background: var(--info); }
.stat-card.rejected .stat-icon { background: var(--danger); }
.stat-card.available .stat-icon { background: var(--primary-light); }

.stat-content {
    flex: 1;
}

.stat-number {
    font-size: 2rem;
    font-weight: 800;
    color: var(--gray-900);
    line-height: 1;
    margin-bottom: 0.25rem;
}

.stat-label {
    font-size: 0.875rem;
    color: var(--gray-600);
    font-weight: 500;
    margin-bottom: 0.5rem;
}

.stat-trend {
    display: flex;
    align-items: center;
    gap: 0.25rem;
    font-size: 0.75rem;
    font-weight: 600;
}

.stat-trend.positive { color: var(--success); }
.stat-trend.negative { color: var(--danger); }
.stat-trend.neutral { color: var(--gray-600); }

/* Quick Section */
.quick-section {
    padding: 2rem 0;
}

.quick-grid {
    display: grid;
    grid-template-columns: 1fr 1fr;
    gap: 2rem;
}

.profile-card,
.actions-card {
    background: var(--white);
    border-radius: var(--radius-xl);
    box-shadow: var(--shadow-md);
    padding: 1.5rem;
    border: 1px solid var(--gray-100);
}

.profile-header {
    display: flex;
    align-items: center;
    gap: 1rem;
    margin-bottom: 1.5rem;
}

.profile-avatar {
    position: relative;
}

.avatar {
    width: 3.5rem;
    height: 3.5rem;
    background: linear-gradient(135deg, var(--primary), var(--primary-dark));
    border-radius: 50%;
    display: flex;
    align-items: center;
    justify-content: center;
    color: var(--white);
    font-size: 1.25rem;
}

.avatar-status {
    position: absolute;
    bottom: 0;
    right: 0;
    width: 0.75rem;
    height: 0.75rem;
    background: var(--success);
    border: 2px solid var(--white);
    border-radius: 50%;
}

.profile-info h3 {
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

.profile-actions {
    display: flex;
    gap: 0.75rem;
    flex-wrap: wrap;
}

.card-header {
    margin-bottom: 1.5rem;
}

.card-header h3 {
    font-size: 1.125rem;
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

.actions-grid {
    display: grid;
    grid-template-columns: repeat(2, 1fr);
    gap: 1rem;
}

.action-item {
    display: flex;
    flex-direction: column;
    align-items: center;
    gap: 0.75rem;
    padding: 1.25rem 1rem;
    background: var(--gray-50);
    border-radius: var(--radius-lg);
    text-decoration: none;
    color: var(--gray-700);
    transition: all 0.2s ease;
    border: 1px solid var(--gray-100);
}

.action-item:hover {
    background: var(--primary-50);
    color: var(--primary-700);
    transform: translateY(-1px);
}

.action-icon {
    width: 2.5rem;
    height: 2.5rem;
    background: var(--white);
    border-radius: var(--radius);
    display: flex;
    align-items: center;
    justify-content: center;
    font-size: 1.125rem;
    color: var(--primary-600);
    box-shadow: var(--shadow);
}

.action-item span {
    font-size: 0.875rem;
    font-weight: 600;
    text-align: center;
}

/* Hero Section */
.hero-section {
    padding: 3rem 0;
    background: var(--white);
}

.hero-content {
    text-align: center;
    max-width: 800px;
    margin: 0 auto 2rem;
}

.hero-badge {
    display: inline-flex;
    align-items: center;
    gap: 0.5rem;
    background: linear-gradient(135deg, var(--primary), var(--primary-dark));
    color: var(--white);
    padding: 0.75rem 1.5rem;
    border-radius: var(--radius-xl);
    font-size: 0.875rem;
    font-weight: 600;
    margin-bottom: 1.5rem;
    box-shadow: var(--shadow-md);
}

.hero-title {
    font-size: clamp(2rem, 5vw, 3.5rem);
    font-weight: 800;
    line-height: 1.1;
    margin-bottom: 1.5rem;
    color: var(--gray-900);
}

.hero-title .accent {
    display: block;
    background: linear-gradient(135deg, var(--primary), var(--secondary));
    -webkit-background-clip: text;
    -webkit-text-fill-color: transparent;
    background-clip: text;
}

.hero-description {
    font-size: 1.125rem;
    color: var(--gray-600);
    line-height: 1.6;
    margin-bottom: 2rem;
    max-width: 600px;
    margin-left: auto;
    margin-right: auto;
}

.hero-stats {
    display: flex;
    justify-content: center;
    gap: 2rem;
    margin-bottom: 2rem;
    flex-wrap: wrap;
}

.hero-stat {
    text-align: center;
    padding: 1.25rem;
    background: var(--white);
    border-radius: var(--radius-xl);
    box-shadow: var(--shadow-md);
    min-width: 120px;
    border: 1px solid var(--gray-100);
}

.stat-value {
    font-size: 2rem;
    font-weight: 800;
    color: var(--primary-600);
    margin-bottom: 0.25rem;
    line-height: 1;
}

.stat-text {
    font-size: 0.875rem;
    color: var(--gray-600);
    font-weight: 600;
}

.hero-visual {
    max-width: 800px;
    margin: 0 auto;
}

.visual-wrapper {
    border-radius: var(--radius-xl);
    overflow: hidden;
    box-shadow: var(--shadow-lg);
    transition: transform 0.3s ease;
}

.visual-wrapper:hover {
    transform: translateY(-4px);
}

.visual-wrapper img {
    width: 100%;
    height: auto;
    display: block;
}

/* Process Section */
.process-section {
    padding: 3rem 0;
    background: var(--white);
}

.process-timeline {
    display: grid;
    grid-template-columns: repeat(auto-fit, minmax(300px, 1fr));
    gap: 2rem;
    max-width: 1000px;
    margin: 0 auto;
}

.process-item {
    text-align: center;
    padding: 2rem 1.5rem;
    background: var(--white);
    border-radius: var(--radius-xl);
    box-shadow: var(--shadow-md);
    position: relative;
    transition: transform 0.2s ease;
    border: 1px solid var(--gray-100);
}

.process-item:hover {
    transform: translateY(-3px);
}

.process-number {
    position: absolute;
    top: -1rem;
    left: 50%;
    transform: translateX(-50%);
    width: 2rem;
    height: 2rem;
    background: linear-gradient(135deg, var(--primary), var(--primary-dark));
    color: var(--white);
    border-radius: 50%;
    display: flex;
    align-items: center;
    justify-content: center;
    font-weight: 800;
    font-size: 0.875rem;
    box-shadow: var(--shadow-md);
}

.process-content {
    padding-top: 0.5rem;
}

.process-icon {
    width: 3.5rem;
    height: 3.5rem;
    background: var(--primary-100);
    border-radius: var(--radius-lg);
    display: flex;
    align-items: center;
    justify-content: center;
    margin: 0 auto 1rem;
    color: var(--primary-600);
    font-size: 1.25rem;
}

.process-item h3 {
    font-size: 1.125rem;
    font-weight: 700;
    margin-bottom: 0.75rem;
    color: var(--gray-900);
}

.process-item p {
    color: var(--gray-600);
    line-height: 1.6;
}

/* Features Section */
.features-section {
    padding: 3rem 0;
    background: var(--gray-50);
}

.features-grid {
    display: grid;
    grid-template-columns: repeat(auto-fit, minmax(280px, 1fr));
    gap: 1.5rem;
}

.feature-card {
    background: var(--white);
    border-radius: var(--radius-xl);
    padding: 1.5rem;
    box-shadow: var(--shadow-md);
    transition: transform 0.2s ease;
    border: 1px solid var(--gray-100);
}

.feature-card:hover {
    transform: translateY(-3px);
}

.feature-icon {
    width: 3rem;
    height: 3rem;
    background: var(--primary-100);
    border-radius: var(--radius-lg);
    display: flex;
    align-items: center;
    justify-content: center;
    margin-bottom: 1rem;
    color: var(--primary-600);
    font-size: 1.25rem;
}

.feature-card h3 {
    font-size: 1.125rem;
    font-weight: 700;
    margin-bottom: 0.75rem;
    color: var(--gray-900);
}

.feature-card p {
    color: var(--gray-600);
    line-height: 1.6;
}

/* CTA Section */
.cta-section {
    padding: 3rem 0;
    background: linear-gradient(135deg, var(--primary), var(--primary-dark));
    color: var(--white);
    text-align: center;
    border-radius: var(--radius-xl);
    margin: 2rem 1rem;
}

.cta-content {
    max-width: 600px;
    margin: 0 auto;
}

.cta-icon {
    font-size: 2.5rem;
    margin-bottom: 1rem;
}

.cta-content h2 {
    font-size: clamp(1.5rem, 3vw, 2rem);
    margin-bottom: 1rem;
    font-weight: 700;
}

.cta-content p {
    font-size: 1.125rem;
    margin-bottom: 2rem;
    opacity: 0.9;
    line-height: 1.6;
}

.cta-actions {
    display: flex;
    justify-content: center;
    gap: 1rem;
    flex-wrap: wrap;
}

/* Responsive Design */
@media (max-width: 1024px) {
    .quick-grid {
        grid-template-columns: 1fr;
        gap: 1.5rem;
    }
}

@media (max-width: 768px) {
    .container {
        padding: 0 0.75rem;
    }
    
    .stats-section,
    .quick-section,
    .hero-section,
    .process-section,
    .features-section,
    .cta-section {
        padding: 2rem 0;
    }
    
    .stats-grid {
        grid-template-columns: 1fr;
        gap: 1rem;
    }
    
    .profile-header {
        flex-direction: column;
        text-align: center;
        gap: 1rem;
    }

    .profile-actions {
        justify-content: center;
        width: 100%;
    }

    .profile-actions .btn {
        flex: 1;
        justify-content: center;
    }

    .actions-grid {
        grid-template-columns: 1fr;
        gap: 0.75rem;
    }

    .hero-stats {
        flex-direction: column;
        gap: 1rem;
        align-items: center;
    }
    
    .process-timeline {
        grid-template-columns: 1fr;
        gap: 1.5rem;
    }
    
    .features-grid {
        grid-template-columns: 1fr;
        gap: 1rem;
    }
    
    .cta-actions {
        flex-direction: column;
        align-items: stretch;
        gap: 0.75rem;
    }

    .cta-actions .btn {
        justify-content: center;
    }
    
    .cta-section {
        margin: 1rem 0.5rem;
        border-radius: var(--radius-lg);
    }
}

@media (max-width: 480px) {
    .container {
        padding: 0 0.5rem;
    }
    
    .stat-card,
    .profile-card,
    .actions-card {
        padding: 1.25rem;
    }
    
    .hero-content {
        margin-bottom: 1.5rem;
    }
    
    .process-item {
        padding: 1.5rem 1rem;
    }
    
    .feature-card {
        padding: 1.25rem;
    }
}
</style>
@endpush

@push('scripts')
<script>
document.addEventListener('DOMContentLoaded', function() {
    // Simple hover effects for cards
    const cards = document.querySelectorAll('.stat-card, .feature-card, .process-item, .action-item');
    
    cards.forEach(card => {
        card.addEventListener('mouseenter', function() {
            this.style.transform = 'translateY(-4px)';
        });
        
        card.addEventListener('mouseleave', function() {
            this.style.transform = 'translateY(0)';
        });
    });

    // Simple button click effect
    const buttons = document.querySelectorAll('.btn');
    
    buttons.forEach(button => {
        button.addEventListener('click', function(e) {
            // Simple scale effect
            this.style.transform = 'scale(0.98)';
            setTimeout(() => {
                this.style.transform = 'scale(1)';
            }, 150);
        });
    });

    // Smooth scroll for internal links
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
});
</script>
@endpush