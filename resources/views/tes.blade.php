<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>HomePage</title>

    <!-- Optional: Tailwind still loaded, but no Tailwind classes are used -->
    <script src="https://cdn.tailwindcss.com"></script>

    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@100..900&display=swap" rel="stylesheet">
    <script src="https://unpkg.com/lucide@latest"></script>
    
    <link rel="stylesheet" href="/css/home.css">
</head>

<body class="body">

    <!-- NAVBAR -->
    <nav class="navbar">
        <div class="nav-container">
            <div class="nav-left">
                <img src="/asset/square_OneAct.png" alt="OneAct Logo" class="logo">
                <!-- <span class="logo">OneAct</span> -->
            </div>

            <div class="nav-menu">
                <a href="index.html" class="nav-link">Beranda</a>
                <a href="DonationPage.html" class="nav-link">Donasi</a>
                <a href="programrelawan.blade.php" class="nav-link">Relawan</a>
                <a href="community.html" class="nav-link">Komunitas</a>
                <a href="faq.html" class="nav-link">FAQs</a>
            </div>

            <div class="nav-right">
                <button class="icon-btn"><i data-lucide="bell"></i></button>
                <a href="login.html" class="auth-btn">Masuk</a>
                <span class="auth-separator">/</span> 
                <a href="signup.html" class="auth-btn">Daftar</a>
                <button class="icon-btn"><i data-lucide="user"></i></button>
                <!-- <button id="menu-btn" class="mobile-menu-btn"><i data-lucide="menu"></i></button> -->
            </div>
        </div>

        <!-- <div id="mobile-menu" class="mobile-menu">
            <a class="mobile-item">Beranda</a>
            <a class="mobile-item">Donasi</a>
            <a class="mobile-item">Relawan</a>
            <a class="mobile-item">Komunitas</a>
            <a class="mobile-item">Hubungi Kami</a>
            <a class="mobile-login">Masuk / Daftar</a>
        </div> -->
    </nav>

    <!-- HERO -->
    <header class="hero">
        <div class="hero-overlay">
            <img src="/asset/hero_img1.png" alt="">
        </div>

        <div class="hero-content">
            <h1 class="hero-title">Bersama Kita Membuat Perubahan</h1>
            <p class="hero-subtitle">
                Bergabung dengan komunitas relawan dan donatur untuk bersama-sama mewujudkan perubahan positif di dunia.
            </p>
        </div>
    </header>

    <!-- MAIN SECTION -->
    <main class="main">
        <div class="container">

            <h2 class="section-title">Bantuan yang Dibutuhkan</h2>
            <p class="section-desc">
                Temukan berbagai cara untuk membantu dan memberi harapan bagi mereka yang membutuhkan
            </p>

            <div class="tab-program">
                <button class="tab-outline active" data-tab="donasi">Program Donasi</button>
                <button class="tab-outline" data-tab="relawan">Kesempatan Relawan</button>
                <!-- <button class="tab-outline" data-tab="darurat">Kampanye Darurat</button> -->
            </div>

            <div class="cards-wrapper" data-category="donasi">
                <!-- CARDS GRID -->
                <div class="cards-grid">

                    <!-- CARD -->
                    
                    <!-- Duplicate cards (same HTML) -->
                    <div class="card">
                        <img class="card-img" src="/asset/program-makan-bergizi-gratis-kalangan-lansia-dinilai-harus-jadi-prioritas-zab.jpg">
        
                        <div class="card-body">
                            <div class="card-tags">
                                <span class="tag-red">Pangan</span>
                                <span class="tag-gray">
                                    <img src="/asset/time-left.png" alt="time-left">
                                    20 hari lagi
                                </span>
                            </div>
        
                            <h3 class="card-title">Bantuan Makanan untuk Lansia Terlantar</h3>
        
                            <a href="organization_profile.html" class="card-organizer">Rumah Cinta Indonesia</a>
                            <p class="card-desc">
                                Program pemberian makanan bergizi untuk 500 lansia terlantar di Jakarta, Bandung, dan Surabaya.
                            </p>
        
                            <div class="donate-progress">
                                <div class="progress-info">
                                    <span>Terkumpul: <strong>Rp 10.500.000</strong></span>
                                    <span class="progress-percent">50%</span>
                                </div>

                                <div class="progress-bar">
                                    <div class="progress-fill"></div>
                                </div>

                                <div class="progress-meta">
                                    <span>Target: Rp 21.000.000</span>
                                    <span>1230 donatur</span>
                                </div>
                            </div>
        
                            <div class="card-actions">
                                <button class="btn-daftar">Donasi</button>
                            </div>
                        </div>
                    </div>
                    <div class="card">
                        <img class="card-img" src="/asset/antarafoto-banjir-jakarta-071121-ak-4.jpg">
        
                        <div class="card-body">
                            <div class="card-tags">
                                <span class="tag-red">Bencana</span>
                                <span class="tag-gray">
                                    <img src="/asset/time-left.png" alt="time-left">
                                    7 hari lagi
                                </span>
                            </div>
        
                            <h3 class="card-title">Donasi Bantuan Korban Banjir Sumatra</h3>
        
                            <a href="organization_profile.html" class="card-organizer">Peduli Kasih</a>
                            <p class="card-desc">
                                Bantuan terhadap korban banjir di Sumatra, dana yang terkumpul akan dibelikan kebutuhan pokok
                            </p>
        
                            <div class="donate-progress">
                                <div class="progress-info">
                                    <span>Terkumpul: <strong>Rp 1.000.000.000</strong></span>
                                    <span class="progress-percent">20%</span>
                                </div>

                                <div class="progress-bar">
                                    <div class="progress-fill2"></div>
                                </div>

                                <div class="progress-meta">
                                    <span>Target: Rp 5.000.000.000</span>
                                    <span>10000 donatur</span>
                                </div>
                            </div>
        
                            <div class="card-actions">
                                <button class="btn-daftar">Donasi</button>
                            </div>
        
                            <!-- Detail Modal (Pop-up) -->
                            <div class="detail-modal-container" id="detail_modal_container">
                                <!-- Modal Content Wrapper -->
                                <!-- Detail Modal (Pop-up) -->
                                <button class="close">
                                    <!-- <p>x</p> -->
                                    <i data-lucide="x"></i>
                                </button>
                                <div id="detail-modal">
                                    
                                    <!-- Close Button -->
        
                                    <!-- Main Content -->
                                    <div id="modal-main-content">
                                        <!-- Image Section -->
                                        <div class="modal-image-section">
                                            <img src="/asset/program-makan-bergizi-gratis-kalangan-lansia-dinilai-harus-jadi-prioritas-zab.jpg" alt="bantuan makanan">
                                            <div class="modal-tags">
                                                <span class="modal-tag-primary">Pangan</span>
                                            </div>
                                        </div>
                                        
                                        <div class="donate-desc">
                                            <!-- Tags & Title -->
                                            <div class="modal-title-who">
                                                <div class="first-line">
                                                    <h1 class="modal-title">Bantuan Makanan untuk Lansia Terlantar</h1>
                                                    <div class="modal-periode">
                                                        <img src="/asset/time-left.png" alt="time left">
                                                        <p >20 hari lagi</p>
                                                    </div>
                                                </div>
        
                                                <span class="modal-organizer">Oleh </span>
                                                <a href="organization_profile.html" class="modal-organizer">Rumah Cinta Indonesia</a>
                                            </div>
        
                                            <!-- Details Sections -->
                                            <div id="modal-details">
                                                <!-- Tentang Program -->
                                                <section>
                                                    <h2><i data-lucide="bookmark"></i>Tentang Program</h2>
                                                    <p>
                                                        Program pemberian makanan bergizi untuk 500 lansia terlantar di Jakarta, Bandung, dan Surabaya.
                                                    </p>
                                                </section>
        
                                                <!-- Tanggung Jawab -->
                                                <section>
                                                    <h2><i data-lucide="check-square"></i>Tanggung Jawab</h2>
                                                    <ul>
                                                        <li>Mengajar membaca, menulis, dan berhitung dasar</li>
                                                        <li>Membuat materi pembelajaran yang menarik dan mudah dipahami</li>
                                                        <li>Memotivasi anak-anak untuk terus belajar</li>
                                                        <li>Melaporkan perkembangan pembelajaran anak</li>
                                                    </ul>
                                                </section>
        
                                                <!-- Persyaratan -->
                                                <section>
                                                    <h2><i data-lucide="list"></i>Persyaratan</h2>
                                                    <ul>
                                                        <li>Berusia minimal 18 tahun</li>
                                                        <li>Memiliki kesabaran dan kemampuan komunikasi yang baik</li>
                                                        <li>Dapat berkomitmen minimal 2 bulan</li>
                                                        <li>Memiliki pengalaman mengajar (lebih disukai tapi tidak wajib)</li>
                                                        <li>Bersedia mengikuti pelatihan singkat sebelum mengajar</li>
                                                    </ul>
                                                </section>
        
                                                <!-- Yang Akan Kamu Dapatkan -->
                                                <section>
                                                    <h2><i data-lucide="heart"></i>Yang Akan Kamu Dapatkan</h2>
                                                    <ul>
                                                        <li>Sertifikat volunteer dari Yayasan Peduli Anak Indonesia</li>
                                                        <li>Pengalaman mengajar dan mengembangkan soft skills</li>
                                                        <li>Koneksi dengan komunitas volunteer lainnya</li>
                                                        <li>Kepuasan batin membantu anak-anak yang membutuhkan</li>
                                                        <li>Dokumentasi kegiatan untuk portofolio</li>
                                                    </ul>
                                                </section>
                                            </div>
                                        </div>
                                    </div>
        
                                    <!-- Footer Button -->
                                    <div class="modal-footer">
                                        <button id="relawan-detail-daftar">Daftar Sekarang</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="card">
                        <img class="card-img" src="/asset/antarafoto-sekolah-rusak-serang-020523-af-1.jpg">
        
                        <div class="card-body">
                            <div class="card-tags">
                                <span class="tag-red">Pendidikan</span>
                                <span class="tag-gray">
                                    <img src="/asset/time-left.png" alt="time-left">
                                    30 hari lagi
                                </span>
                            </div>
        
                            <h3 class="card-title">Donasi Bantuan Dana Perbaikan Sekolah</h3>
        
                            <a href="organization_profile.html" class="card-organizer">Yayasan Peduli Anak Indonesia</a>
                            <p class="card-desc">
                                Membantu anak-anak sekolah SDN 101 Serang, agar kembali nyaman belajar di sekolah mereka.
                            </p>
        
                            <div class="donate-progress">
                                <div class="progress-info">
                                    <span>Terkumpul: <strong>Rp 100.000.000</strong></span>
                                    <span class="progress-percent">50%</span>
                                </div>

                                <div class="progress-bar">
                                    <div class="progress-fill"></div>
                                </div>

                                <div class="progress-meta">
                                    <span>Target: Rp 50.000.000</span>
                                    <span>5800 donatur</span>
                                </div>
                            </div>
        
                            <div class="card-actions">
                                <button class="btn-daftar">Donasi</button>
                            </div>
        
                            <!-- Detail Modal (Pop-up) -->
                            <div class="detail-modal-container" id="detail_modal_container">
                                <!-- Modal Content Wrapper -->
                                <!-- Detail Modal (Pop-up) -->
                                <button class="close">
                                    <!-- <p>x</p> -->
                                    <i data-lucide="x"></i>
                                </button>
                                <div id="detail-modal">
                                    
                                    <!-- Close Button -->
        
                                    <!-- Main Content -->
                                    <div id="modal-main-content">
                                        <!-- Image Section -->
                                        <div class="modal-image-section">
                                            <img src="/asset/program-makan-bergizi-gratis-kalangan-lansia-dinilai-harus-jadi-prioritas-zab.jpg" alt="bantuan makanan">
                                            <div class="modal-tags">
                                                <span class="modal-tag-primary">Pangan</span>
                                            </div>
                                        </div>
                                        
                                        <div class="donate-desc">
                                            <!-- Tags & Title -->
                                            <div class="modal-title-who">
                                                <div class="first-line">
                                                    <h1 class="modal-title">Bantuan Makanan untuk Lansia Terlantar</h1>
                                                    <div class="modal-periode">
                                                        <img src="/asset/time-left.png" alt="time left">
                                                        <p >20 hari lagi</p>
                                                    </div>
                                                </div>
        
                                                <span class="modal-organizer">Oleh </span>
                                                <a href="organization_profile.html" class="modal-organizer">Rumah Cinta Indonesia</a>
                                            </div>
        
                                            <!-- Details Sections -->
                                            <div id="modal-details">
                                                <!-- Tentang Program -->
                                                <section>
                                                    <h2><i data-lucide="bookmark"></i>Tentang Program</h2>
                                                    <p>
                                                        Program pemberian makanan bergizi untuk 500 lansia terlantar di Jakarta, Bandung, dan Surabaya.
                                                    </p>
                                                </section>
        
                                                <!-- Tanggung Jawab -->
                                                <section>
                                                    <h2><i data-lucide="check-square"></i>Tanggung Jawab</h2>
                                                    <ul>
                                                        <li>Mengajar membaca, menulis, dan berhitung dasar</li>
                                                        <li>Membuat materi pembelajaran yang menarik dan mudah dipahami</li>
                                                        <li>Memotivasi anak-anak untuk terus belajar</li>
                                                        <li>Melaporkan perkembangan pembelajaran anak</li>
                                                    </ul>
                                                </section>
        
                                                <!-- Persyaratan -->
                                                <section>
                                                    <h2><i data-lucide="list"></i>Persyaratan</h2>
                                                    <ul>
                                                        <li>Berusia minimal 18 tahun</li>
                                                        <li>Memiliki kesabaran dan kemampuan komunikasi yang baik</li>
                                                        <li>Dapat berkomitmen minimal 2 bulan</li>
                                                        <li>Memiliki pengalaman mengajar (lebih disukai tapi tidak wajib)</li>
                                                        <li>Bersedia mengikuti pelatihan singkat sebelum mengajar</li>
                                                    </ul>
                                                </section>
        
                                                <!-- Yang Akan Kamu Dapatkan -->
                                                <section>
                                                    <h2><i data-lucide="heart"></i>Yang Akan Kamu Dapatkan</h2>
                                                    <ul>
                                                        <li>Sertifikat volunteer dari Yayasan Peduli Anak Indonesia</li>
                                                        <li>Pengalaman mengajar dan mengembangkan soft skills</li>
                                                        <li>Koneksi dengan komunitas volunteer lainnya</li>
                                                        <li>Kepuasan batin membantu anak-anak yang membutuhkan</li>
                                                        <li>Dokumentasi kegiatan untuk portofolio</li>
                                                    </ul>
                                                </section>
                                            </div>
                                        </div>
                                    </div>
        
                                    <!-- Footer Button -->
                                    <div class="modal-footer">
                                        <button id="relawan-detail-daftar">Daftar Sekarang</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    
                </div>
                <div class="cta">
                    <a href="DonationPage.html" class="cta-btn">Lihat Semua Program</a>
                </div>
            </div>
            <div class="cards-wrapper" data-category="relawan">
                <div class="cards-grid">
                    <div class="card">
                        <img class="card-img" src="/asset/photo-1497486751825-1233686d5d80.jpeg">
        
                        <div class="card-body">
                            <div class="card-tags">
                                <span class="tag-red">Pendidikan</span>
                                <span class="tag-gray">
                                    <img src="/asset/time-left.png" alt="time-left">
                                    10 hari lagi
                                </span>
                            </div>
        
                            <h3 class="card-title">Relawan Pengajar untuk Anak Jalanan</h3>
        
                            <a href="organization_profile.html" class="card-organizer">Yayasan Peduli Anak Indonesia</a>
                            <p class="card-desc">
                                Mengajar baca tulis dan matematika dasar untuk anak jalanan di Jakarta Pusat setiap akhir pekan
                            </p>
        
                            <div class="card-info">
                                <div>
                                    <span>Lokasi:</span>
                                    <br> Jakarta Pusat
                                </div>
                                <div>
                                    <span>Komitmen Waktu:</span>
                                    <br> 1-2 Jam/minggu
                                </div>
                                <div class="info-full">
                                    <span>Keahlian:</span>
                                    <br> Sabar, Komunikatif</div>
                            </div>
        
                            <div class="card-actions">
                                <button class="btn-daftar">Daftar</button>
                                <button class="btn-detail">Detail</button>
                            </div>
        
                            <!-- Detail Modal (Pop-up) -->
                            <div class="detail-modal-container" id="detail_modal_container">
                                <!-- Modal Content Wrapper -->
                                <!-- Detail Modal (Pop-up) -->
                                <button class="close">
                                    <!-- <p>x</p> -->
                                    <i data-lucide="x"></i>
                                </button>
                                <div id="detail-modal">
                                    
                                    <!-- Close Button -->
        
                                    <!-- Main Content -->
                                    <div id="modal-main-content">
                                        <!-- Image Section -->
                                        <div class="modal-image-section">
                                            <img src="/asset/photo-1497486751825-1233686d5d80.jpeg" alt="pengajar anak jalanan">
                                            <div class="modal-tags">
                                                <span class="modal-tag-primary">Pendidikan</span>
                                            </div>
                                        </div>
                                        
                                        <div class="donate-desc">
                                            <!-- Tags & Title -->
                                            <div class="modal-title-who">
                                                <div class="first-line">
                                                    <h1 class="modal-title">Relawan Pengajar untuk Anak Jalanan</h1>
                                                    <div class="modal-periode">
                                                        <img src="/asset/time-left.png" alt="time left">
                                                        <p >10 hari lagi</p>
                                                    </div>
                                                    
                                                </div>
        
                                                <span class="modal-organizer">Oleh </span>
                                                <a href="#" class="modal-organizer">Yayasan Peduli Anak Indonesia</a>
                                            </div>
        
                                            <!-- Key Metrics -->
                                            <div class="modal-key-metrics">
                                                <div class="metric">
                                                    <div class="metric-title">
                                                        <i data-lucide="map-pin"></i>
                                                        <span>Lokasi</span>
                                                    </div>
                                                    <span class="metric-value">Jakarta Pusat</span>
                                                </div>
        
                                                <div class="metric">
                                                    <div class="metric-title">
                                                        <i data-lucide="calendar"></i>
                                                        <span>Periode</span>
                                                    </div>
                                                    <span class="metric-value">15 Jan 2025 - 15 Mar 2025</span>
                                                </div>
        
                                                <div class="metric">
                                                    <div class="metric-title">
                                                        <i data-lucide="clock"></i>
                                                        <span>Komitmen</span>
                                                    </div>
                                                    <span class="metric-value">1-2 Jam/minggu</span>
                                                </div>
                                                
                                                <div class="metric">
                                                    <div class="metric-title">
                                                        <i data-lucide="users"></i>
                                                        <span>Peserta</span>
                                                    </div>
                                                    <span class="metric-value">12/20</span>
                                                </div>
                                            </div>
        
                                            <!-- Details Sections -->
                                            <div id="modal-details">
                                                <!-- Tentang Program -->
                                                <section>
                                                    <h2><i data-lucide="bookmark"></i>Tentang Program</h2>
                                                    <p>
                                                        Program ini bertujuan untuk memberikan pendidikan dasar kepada anak-anak jalanan di Jakarta Pusat. Sebagai relawan pengajar, Anda akan membantu anak-anak belajar membaca, menulis, dan matematika dasar. Kegiatan dilakukan setiap akhir pekan di Taman Baca Pelangi, Jakarta Pusat. Program ini sangat penting untuk memberikan kesempatan pendidikan bagi anak-anak yang kurang beruntung.
                                                    </p>
                                                </section>
        
                                                <!-- Tanggung Jawab -->
                                                <section>
                                                    <h2><i data-lucide="check-square"></i>Tanggung Jawab</h2>
                                                    <ul>
                                                        <li>Mengajar membaca, menulis, dan berhitung dasar</li>
                                                        <li>Membuat materi pembelajaran yang menarik dan mudah dipahami</li>
                                                        <li>Memotivasi anak-anak untuk terus belajar</li>
                                                        <li>Melaporkan perkembangan pembelajaran anak</li>
                                                    </ul>
                                                </section>
        
                                                <!-- Persyaratan -->
                                                <section>
                                                    <h2><i data-lucide="list"></i>Persyaratan</h2>
                                                    <ul>
                                                        <li>Berusia minimal 18 tahun</li>
                                                        <li>Memiliki kesabaran dan kemampuan komunikasi yang baik</li>
                                                        <li>Dapat berkomitmen minimal 2 bulan</li>
                                                        <li>Memiliki pengalaman mengajar (lebih disukai tapi tidak wajib)</li>
                                                        <li>Bersedia mengikuti pelatihan singkat sebelum mengajar</li>
                                                    </ul>
                                                </section>
        
                                                <!-- Yang Akan Kamu Dapatkan -->
                                                <section>
                                                    <h2><i data-lucide="heart"></i>Yang Akan Kamu Dapatkan</h2>
                                                    <ul>
                                                        <li>Sertifikat volunteer dari Yayasan Peduli Anak Indonesia</li>
                                                        <li>Pengalaman mengajar dan mengembangkan soft skills</li>
                                                        <li>Koneksi dengan komunitas volunteer lainnya</li>
                                                        <li>Kepuasan batin membantu anak-anak yang membutuhkan</li>
                                                        <li>Dokumentasi kegiatan untuk portofolio</li>
                                                    </ul>
                                                </section>
                                            </div>
                                        </div>
                                    </div>
        
                                    <!-- Footer Button -->
                                    <div class="modal-footer">
                                        <button id="relawan-detail-daftar">Daftar Sekarang</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="card">
                        <img class="card-img" src="/asset/relawan-lmi-melakukan-giat-kesembilan-untuk-membantu-para-warga_221130131616-647 (1).jpg">
        
                        <div class="card-body">
                            <div class="card-tags">
                                <span class="tag-red">Kesehatan</span>
                                <span class="tag-gray">
                                    <img src="/asset/time-left.png" alt="time-left">
                                    15 hari lagi
                                </span>
                            </div>
        
                            <h3 class="card-title">Relawan Cek Kesehatan Masyarakat</h3>
        
                            <a href="organization_profile.html" class="card-organizer">Indonesia Sehat</a>
                            <p class="card-desc">
                                Melakukan pengecekan kesehatan masyarakat di Tangerang
                            </p>
        
                            <div class="card-info">
                                <div>
                                    <span>Lokasi:</span>
                                    <br> Tangerang
                                </div>
                                <div>
                                    <span>Komitmen Waktu:</span>
                                    <br> 3 jam
                                </div>
                                <div class="info-full">
                                    <span>Keahlian:</span>
                                    <br> penggunaan alat kesehatan, Komunikatif</div>
                            </div>
        
                            <div class="card-actions">
                                <button class="btn-daftar">Daftar</button>
                                <button class="btn-detail">Detail</button>
                            </div>
        
                            <!-- Detail Modal (Pop-up) -->
                            <div class="detail-modal-container" id="detail_modal_container">
                                <!-- Modal Content Wrapper -->
                                <!-- Detail Modal (Pop-up) -->
                                <button class="close">
                                    <!-- <p>x</p> -->
                                    <i data-lucide="x"></i>
                                </button>
                                <div id="detail-modal">
                                    
                                    <!-- Close Button -->
        
                                    <!-- Main Content -->
                                    <div id="modal-main-content">
                                        <!-- Image Section -->
                                        <div class="modal-image-section">
                                            <img src="/asset/relawan-lmi-melakukan-giat-kesembilan-untuk-membantu-para-warga_221130131616-647 (1).jpg" alt="pengajar anak jalanan">
                                            <div class="modal-tags">
                                                <span class="modal-tag-primary">Pendidikan</span>
                                            </div>
                                        </div>
                                        
                                        <div class="donate-desc">
                                            <!-- Tags & Title -->
                                            <div class="modal-title-who">
                                                <div class="first-line">
                                                    <h1 class="modal-title">Relawan Pengajar untuk Anak Jalanan</h1>
                                                    <div class="modal-periode">
                                                        <img src="/asset/time-left.png" alt="time left">
                                                        <p >10 hari lagi</p>
                                                    </div>
                                                    
                                                </div>
        
                                                <span class="modal-organizer">Oleh </span>
                                                <a href="#" class="modal-organizer">Yayasan Peduli Anak Indonesia</a>
                                            </div>
        
                                            <!-- Key Metrics -->
                                            <div class="modal-key-metrics">
                                                <div class="metric">
                                                    <div class="metric-title">
                                                        <i data-lucide="map-pin"></i>
                                                        <span>Lokasi</span>
                                                    </div>
                                                    <span class="metric-value">Jakarta Pusat</span>
                                                </div>
        
                                                <div class="metric">
                                                    <div class="metric-title">
                                                        <i data-lucide="calendar"></i>
                                                        <span>Periode</span>
                                                    </div>
                                                    <span class="metric-value">15 Jan 2025 - 15 Mar 2025</span>
                                                </div>
        
                                                <div class="metric">
                                                    <div class="metric-title">
                                                        <i data-lucide="clock"></i>
                                                        <span>Komitmen</span>
                                                    </div>
                                                    <span class="metric-value">1-2 Jam/minggu</span>
                                                </div>
                                                
                                                <div class="metric">
                                                    <div class="metric-title">
                                                        <i data-lucide="users"></i>
                                                        <span>Peserta</span>
                                                    </div>
                                                    <span class="metric-value">12/20</span>
                                                </div>
                                            </div>
        
                                            <!-- Details Sections -->
                                            <div id="modal-details">
                                                <!-- Tentang Program -->
                                                <section>
                                                    <h2><i data-lucide="bookmark"></i>Tentang Program</h2>
                                                    <p>
                                                        Program ini bertujuan untuk memberikan pendidikan dasar kepada anak-anak jalanan di Jakarta Pusat. Sebagai relawan pengajar, Anda akan membantu anak-anak belajar membaca, menulis, dan matematika dasar. Kegiatan dilakukan setiap akhir pekan di Taman Baca Pelangi, Jakarta Pusat. Program ini sangat penting untuk memberikan kesempatan pendidikan bagi anak-anak yang kurang beruntung.
                                                    </p>
                                                </section>
        
                                                <!-- Tanggung Jawab -->
                                                <section>
                                                    <h2><i data-lucide="check-square"></i>Tanggung Jawab</h2>
                                                    <ul>
                                                        <li>Mengajar membaca, menulis, dan berhitung dasar</li>
                                                        <li>Membuat materi pembelajaran yang menarik dan mudah dipahami</li>
                                                        <li>Memotivasi anak-anak untuk terus belajar</li>
                                                        <li>Melaporkan perkembangan pembelajaran anak</li>
                                                    </ul>
                                                </section>
        
                                                <!-- Persyaratan -->
                                                <section>
                                                    <h2><i data-lucide="list"></i>Persyaratan</h2>
                                                    <ul>
                                                        <li>Berusia minimal 18 tahun</li>
                                                        <li>Memiliki kesabaran dan kemampuan komunikasi yang baik</li>
                                                        <li>Dapat berkomitmen minimal 2 bulan</li>
                                                        <li>Memiliki pengalaman mengajar (lebih disukai tapi tidak wajib)</li>
                                                        <li>Bersedia mengikuti pelatihan singkat sebelum mengajar</li>
                                                    </ul>
                                                </section>
        
                                                <!-- Yang Akan Kamu Dapatkan -->
                                                <section>
                                                    <h2><i data-lucide="heart"></i>Yang Akan Kamu Dapatkan</h2>
                                                    <ul>
                                                        <li>Sertifikat volunteer dari Yayasan Peduli Anak Indonesia</li>
                                                        <li>Pengalaman mengajar dan mengembangkan soft skills</li>
                                                        <li>Koneksi dengan komunitas volunteer lainnya</li>
                                                        <li>Kepuasan batin membantu anak-anak yang membutuhkan</li>
                                                        <li>Dokumentasi kegiatan untuk portofolio</li>
                                                    </ul>
                                                </section>
                                            </div>
                                        </div>
                                    </div>
        
                                    <!-- Footer Button -->
                                    <div class="modal-footer">
                                        <button id="relawan-detail-daftar">Daftar Sekarang</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="card">
                        <img class="card-img" src="/asset/Screenshot 2025-12-16 005319.png">
        
                        <div class="card-body">
                            <div class="card-tags">
                                <span class="tag-red">humanity</span>
                                <span class="tag-gray">
                                    <img src="/asset/time-left.png" alt="time-left">
                                    5 hari lagi
                                </span>
                            </div>
        
                            <h3 class="card-title">Relawan Sahabat Senja: Teman yang dibutuhkan</h3>
        
                            <a href="organization_profile.html" class="card-organizer">Yayasan Peduli Anak Indonesia</a>
                            <p class="card-desc">
                                Menemani, menghibur, dan mengurangi rasa kesepian lansia di panti jompo
                            </p>
        
                            <div class="card-info">
                                <div>
                                    <span>Lokasi:</span>
                                    <br> Kalimantan Timur
                                </div>
                                <div>
                                    <span>Komitmen Waktu:</span>
                                    <br> 1-2 Jam/minggu
                                </div>
                                <div class="info-full">
                                    <span>Keahlian:</span>
                                    <br> Sabar</div>
                            </div>
        
                            <div class="card-actions">
                                <button class="btn-daftar">Daftar</button>
                                <button class="btn-detail">Detail</button>
                            </div>
        
                            <!-- Detail Modal (Pop-up) -->
                            <div class="detail-modal-container" id="detail_modal_container">
                                <!-- Modal Content Wrapper -->
                                <!-- Detail Modal (Pop-up) -->
                                <button class="close">
                                    <!-- <p>x</p> -->
                                    <i data-lucide="x"></i>
                                </button>
                                <div id="detail-modal">
                                    
                                    <!-- Close Button -->
        
                                    <!-- Main Content -->
                                    <div id="modal-main-content">
                                        <!-- Image Section -->
                                        <div class="modal-image-section">
                                            <img src="/asset/photo-1497486751825-1233686d5d80.jpeg" alt="pengajar anak jalanan">
                                            <div class="modal-tags">
                                                <span class="modal-tag-primary">Pendidikan</span>
                                            </div>
                                        </div>
                                        
                                        <div class="donate-desc">
                                            <!-- Tags & Title -->
                                            <div class="modal-title-who">
                                                <div class="first-line">
                                                    <h1 class="modal-title">Relawan Pengajar untuk Anak Jalanan</h1>
                                                    <div class="modal-periode">
                                                        <img src="/asset/time-left.png" alt="time left">
                                                        <p >10 hari lagi</p>
                                                    </div>
                                                    
                                                </div>
        
                                                <span class="modal-organizer">Oleh </span>
                                                <a href="#" class="modal-organizer">Yayasan Peduli Anak Indonesia</a>
                                            </div>
        
                                            <!-- Key Metrics -->
                                            <div class="modal-key-metrics">
                                                <div class="metric">
                                                    <div class="metric-title">
                                                        <i data-lucide="map-pin"></i>
                                                        <span>Lokasi</span>
                                                    </div>
                                                    <span class="metric-value">Jakarta Pusat</span>
                                                </div>
        
                                                <div class="metric">
                                                    <div class="metric-title">
                                                        <i data-lucide="calendar"></i>
                                                        <span>Periode</span>
                                                    </div>
                                                    <span class="metric-value">15 Jan 2025 - 15 Mar 2025</span>
                                                </div>
        
                                                <div class="metric">
                                                    <div class="metric-title">
                                                        <i data-lucide="clock"></i>
                                                        <span>Komitmen</span>
                                                    </div>
                                                    <span class="metric-value">1-2 Jam/minggu</span>
                                                </div>
                                                
                                                <div class="metric">
                                                    <div class="metric-title">
                                                        <i data-lucide="users"></i>
                                                        <span>Peserta</span>
                                                    </div>
                                                    <span class="metric-value">12/20</span>
                                                </div>
                                            </div>
        
                                            <!-- Details Sections -->
                                            <div id="modal-details">
                                                <!-- Tentang Program -->
                                                <section>
                                                    <h2><i data-lucide="bookmark"></i>Tentang Program</h2>
                                                    <p>
                                                        Program ini bertujuan untuk memberikan pendidikan dasar kepada anak-anak jalanan di Jakarta Pusat. Sebagai relawan pengajar, Anda akan membantu anak-anak belajar membaca, menulis, dan matematika dasar. Kegiatan dilakukan setiap akhir pekan di Taman Baca Pelangi, Jakarta Pusat. Program ini sangat penting untuk memberikan kesempatan pendidikan bagi anak-anak yang kurang beruntung.
                                                    </p>
                                                </section>
        
                                                <!-- Tanggung Jawab -->
                                                <section>
                                                    <h2><i data-lucide="check-square"></i>Tanggung Jawab</h2>
                                                    <ul>
                                                        <li>Mengajar membaca, menulis, dan berhitung dasar</li>
                                                        <li>Membuat materi pembelajaran yang menarik dan mudah dipahami</li>
                                                        <li>Memotivasi anak-anak untuk terus belajar</li>
                                                        <li>Melaporkan perkembangan pembelajaran anak</li>
                                                    </ul>
                                                </section>
        
                                                <!-- Persyaratan -->
                                                <section>
                                                    <h2><i data-lucide="list"></i>Persyaratan</h2>
                                                    <ul>
                                                        <li>Berusia minimal 18 tahun</li>
                                                        <li>Memiliki kesabaran dan kemampuan komunikasi yang baik</li>
                                                        <li>Dapat berkomitmen minimal 2 bulan</li>
                                                        <li>Memiliki pengalaman mengajar (lebih disukai tapi tidak wajib)</li>
                                                        <li>Bersedia mengikuti pelatihan singkat sebelum mengajar</li>
                                                    </ul>
                                                </section>
        
                                                <!-- Yang Akan Kamu Dapatkan -->
                                                <section>
                                                    <h2><i data-lucide="heart"></i>Yang Akan Kamu Dapatkan</h2>
                                                    <ul>
                                                        <li>Sertifikat volunteer dari Yayasan Peduli Anak Indonesia</li>
                                                        <li>Pengalaman mengajar dan mengembangkan soft skills</li>
                                                        <li>Koneksi dengan komunitas volunteer lainnya</li>
                                                        <li>Kepuasan batin membantu anak-anak yang membutuhkan</li>
                                                        <li>Dokumentasi kegiatan untuk portofolio</li>
                                                    </ul>
                                                </section>
                                            </div>
                                        </div>
                                    </div>
        
                                    <!-- Footer Button -->
                                    <div class="modal-footer">
                                        <button id="relawan-detail-daftar">Daftar Sekarang</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="cta">
                    <a href="programrelawan.blade.php" class="cta-btn">Lihat Semua Program</a>
                </div>
            </div>
            <!-- <div class="cards-wrapper" data-category="darurat">
                <div class="cards-grid">
                    <div class="card"> ... </div>
                    <div class="card"> ... </div>
                    <div class="card"> ... </div>
                </div>
            </div> -->

            <section class="org-content" id="kegiatan">
                <h2>Riwayat Kegiatan Selesai</h2>
                
                <div class="history-container">
                    
                    <div class="history-column">
                        <h3>Riwayat Program Donasi</h3>

                        <div class="program-card program-history" data-type="donasi">
                            <div class="program-content">
                                <div class="program-header">
                                    <span class="tag donasi">Donasi</span>
                                    <span class="status selesai">Selesai</span>
                                </div>

                                <h4>Program Literasi Weekend</h4>
                                <p class="desc">
                                    Mengajari membaca, menulis, dan berhitung untuk anak jalanan usia 6–12 tahun.
                                </p>
                                <p class="date">Periode: 1–15 Januari 2025</p>

                                <div class="history-meta-grid">
                                    <div class="meta-item-history">
                                        <span>Total Dana Terkumpul</span>
                                        <strong>Rp 15.000.000</strong>
                                    </div>
                                    <div class="meta-item-history">
                                        <span>Target Dana</span>
                                        <strong>Rp 15.000.000</strong>
                                    </div>
                                    <div class="meta-item-history">
                                        <span>Partisipan Donasi</span>
                                        <strong>245 orang</strong>
                                    </div>
                                </div>
                                
                                <a href="laporan_literasi.pdf" class="btn-download available" download>
                                    <i data-lucide="download"></i> Download Laporan
                                </a>
                            </div>
                        </div>

                        <div class="program-card program-history" data-type="donasi">
                            <div class="program-content">
                                <div class="program-header">
                                    <span class="tag donasi">Donasi</span>
                                    <span class="status selesai">Selesai</span>
                                </div>

                                <h4>Distribusi Buku & Alat Tulis</h4>
                                <p class="desc">
                                    Memberikan perlengkapan sekolah kepada 150 anak jalanan.
                                </p>
                                <p class="date">Periode: 20–25 Januari 2025</p>

                                <div class="history-meta-grid">
                                    <div class="meta-item-history">
                                        <span>Total Dana Terkumpul</span>
                                        <strong>Rp 18.000.000</strong>
                                    </div>
                                    <div class="meta-item-history">
                                        <span>Target Dana</span>
                                        <strong>Rp 25.000.000</strong>
                                    </div>
                                    <div class="meta-item-history">
                                        <span>Partisipan Donasi</span>
                                        <strong>87 orang</strong>
                                    </div>
                                </div>
                                
                                <a href="#" class="btn-download disabled">
                                    <i data-lucide="file-x"></i> Laporan Belum Tersedia
                                </a>
                            </div>
                        </div>
                        
                    </div>
                    
                    <div class="history-column">
                        <h3>Riwayat Program Relawan</h3>

                        <div class="program-card program-history" data-type="relawan">
                            <div class="program-content">
                                <div class="program-header">
                                    <span class="tag relawan">Relawan</span>
                                    <span class="status selesai">Selesai</span> </div>

                                <h4>Workshop Keterampilan Dasar</h4>
                                <p class="desc">
                                    Mengadakan pelatihan menjahit dan kerajinan untuk remaja jalanan.
                                </p>
                                <p class="date">Periode: 10–12 Maret 2025</p>

                                <div class="history-meta-grid">
                                    <div class="meta-item-history">
                                        <span>Partisipan Relawan</span>
                                        <strong>12 orang</strong>
                                    </div>
                                    <!-- <div class="meta-item-history">
                                        <span>Durasi Komitmen</span>
                                        <strong>15 jam</strong>
                                    </div> -->
                                </div>
                                
                                <!-- <a href="laporan_workshop.pdf" class="btn-download available" download>
                                    <i data-lucide="download"></i> Download Laporan
                                </a> -->
                            </div>
                        </div>

                        <div class="program-card program-history" data-type="relawan">
                            <div class="program-content">
                                <div class="program-header">
                                    <span class="tag relawan">Relawan</span>
                                    <span class="status dalam-pelaksanaan">Dalam Pelaksanaan</span> </div>

                                <h4>Kelas Mengajar Mingguan</h4>
                                <p class="desc">
                                    Program rutin mengajar subjek sekolah dasar setiap hari Minggu.
                                </p>
                                <p class="date">Periode: Maret – Mei 2025</p>

                                <div class="history-meta-grid">
                                    <div class="meta-item-history">
                                        <span>Relawan Aktif</span>
                                        <strong>20 orang</strong>
                                    </div>
                                    <!-- <div class="meta-item-history">
                                        <span>Sisa Waktu</span>
                                        <strong>3 minggu</strong>
                                    </div> -->
                                </div>
                                
                                <!-- <a href="#" class="btn-download disabled">
                                    <i data-lucide="file-x"></i> Laporan Belum Tersedia
                                </a> -->
                            </div>
                        </div>
                        
                    </div>
                    
                </div>
            </section>
        </div>
    </main>

    <footer class="footer">
        <div class="footer-container">
    
            <!-- Left Section -->
            <div class="footer-left">
                <h2 class="footer-title">OneAct</h2>
                <p class="footer-description">
                    Platform kolaborasi sosial yang menghubungkan individu, komunitas, dan organisasi untuk bersama-sama mengatasi permasalahan sosial berupa kemiskinan, pendidikan, kesehatan, dan lingkungan. Kami hadir sebagai wadah donasi dan volunteer yang transparan, terstruktur, dan terpercaya.
                </p>
    
                <div class="footer-social">
                    <a href="#" aria-label="Instagram" class="social-btn">
                        <img src="/asset/instagram.png" alt="Instagram" />
                    </a>
                    <a href="#" aria-label="Twitter" class="social-btn">
                        <img src="/asset/twitter.png" alt="Twitter" />
                    </a>
                    <a href="#" aria-label="Facebook" class="social-btn">
                        <img src="/asset/facebook.png" alt="Facebook" />
                    </a>
                    <a href="#" aria-label="Youtube" class="social-btn">
                        <img src="/asset/youtube.png" alt="Youtube" />
                    </a>
                    <a href="#" aria-label="LinkedIn" class="social-btn">
                        <img src="/asset/linkedin.png" alt="LinkedIn" />
                    </a>
                </div>
            </div>
    
            <!-- Quick Links -->
            <div class="footer-links">
                <h3 class="footer-heading">Quick Links</h3>
                <a href="#" class="footer-link">Privacy Policy</a>
                <a href="#" class="footer-link">Terms of Use</a>
                <a href="#" class="footer-link">Tim Kami</a>
                <a href="#" class="footer-link">FAQs/Kontak</a>
                <a href="#" class="footer-link">Karir</a>
                <a href="#" class="footer-link">Sponsorship</a>
            </div>
    
            <!-- Contact Info -->
            <div class="footer-contact">
                <h3 class="footer-heading">Hubungi Kami</h3>
    
                <div class="contact-item">
                    <img src="" class="contact-icon" />
                    <div>
                        <p class="contact-title">Kantor Pusat OneAct</p>
                        <p class="contact-text">Jalan Letnan Sutopo<br>Serpong - Banten</p>
                    </div>
                </div>
    
                <a href="tel:+6281656782" class="contact-item">
                    <div class="contact-icon-circle">
                        <img src="" />
                    </div>
                    <span>+62 81 656 7824</span>
                </a>
    
                <a href="mailto:oneact@oneact.or.id" class="contact-item">
                    <div class="contact-icon-circle">
                        <img src="" />
                    </div>
                    <span>oneact@oneact.or.id</span>
                </a>
            </div>
    
        </div>
    
        <div class="footer-bottom">
            <p>© 2025 OneAct. All rights reserved.</p>
        </div>
    </footer>
    
    <script src="/js/home.js"></script>
</body>
</html>










<body class="body">

    <!-- NAVBAR -->
    <nav class="navbar">
        <div class="nav-container">
            <div class="nav-left">
                <img src="/asset/square_OneAct.png" alt="OneAct Logo" class="logo">
                <!-- <span class="logo">OneAct</span> -->
            </div>

            <div class="nav-menu">
                <a href="index.html" class="nav-link">Beranda</a>
                <a href="DonationPage.html" class="nav-link">Donasi</a>
                <a href="programrelawan.blade.php" class="nav-link">Relawan</a>
                <a href="community.html" class="nav-link">Komunitas</a>
                <a href="faq.html" class="nav-link">FAQs</a>
            </div>

            <div class="nav-right">
                <button class="icon-btn"><i data-lucide="bell"></i></button>
                <a href="login.html" class="auth-btn">Masuk</a>
                <span class="auth-separator">/</span> 
                <a href="signup.html" class="auth-btn">Daftar</a>
                <button class="icon-btn"><i data-lucide="user"></i></button> 
            </div>
        </div> 
    </nav>

    <!-- HERO -->
    <header class="hero">
        <div class="hero-overlay">
            <img src="/asset/hero_img1.png" alt="">
        </div>

        <div class="hero-content">
            <h1 class="hero-title">Bersama Kita Membuat Perubahan</h1>
            <p class="hero-subtitle">
                Bergabung dengan komunitas relawan dan donatur untuk bersama-sama mewujudkan perubahan positif di dunia.
            </p>
        </div>
    </header>

    <!-- MAIN SECTION -->
    <main class="main">
        <div class="container">

            <h2 class="section-title">Bantuan yang Dibutuhkan</h2>
            <p class="section-desc">
                Temukan berbagai cara untuk membantu dan memberi harapan bagi mereka yang membutuhkan
            </p>

            <div class="tab-program">
                <button class="tab-outline active" data-tab="donasi">Program Donasi</button>
                <button class="tab-outline" data-tab="relawan">Kesempatan Relawan</button>
                <!-- <button class="tab-outline" data-tab="darurat">Kampanye Darurat</button> -->
            </div>

            <div class="cards-wrapper" data-category="donasi">
                <!-- CARDS GRID -->
                <div class="cards-grid">

                    <!-- CARD -->
                    
                    <!-- Duplicate cards (same HTML) -->
                    <div class="card">
                        <img class="card-img" src="/asset/program-makan-bergizi-gratis-kalangan-lansia-dinilai-harus-jadi-prioritas-zab.jpg">
        
                        <div class="card-body">
                            <div class="card-tags">
                                <span class="tag-red">Pangan</span>
                                <span class="tag-gray">
                                    <img src="/asset/time-left.png" alt="time-left">
                                    20 hari lagi
                                </span>
                            </div>
        
                            <h3 class="card-title">Bantuan Makanan untuk Lansia Terlantar</h3>
        
                            <a href="organization_profile.html" class="card-organizer">Rumah Cinta Indonesia</a>
                            <p class="card-desc">
                                Program pemberian makanan bergizi untuk 500 lansia terlantar di Jakarta, Bandung, dan Surabaya.
                            </p>
        
                            <div class="donate-progress">
                                <div class="progress-info">
                                    <span>Terkumpul: <strong>Rp 10.500.000</strong></span>
                                    <span class="progress-percent">50%</span>
                                </div>

                                <div class="progress-bar">
                                    <div class="progress-fill"></div>
                                </div>

                                <div class="progress-meta">
                                    <span>Target: Rp 21.000.000</span>
                                    <span>1230 donatur</span>
                                </div>
                            </div>
        
                            <div class="card-actions">
                                <button class="btn-daftar">Donasi</button>
                            </div>
                        </div>
                    </div>
                    <div class="card">
                        <img class="card-img" src="/asset/antarafoto-banjir-jakarta-071121-ak-4.jpg">
        
                        <div class="card-body">
                            <div class="card-tags">
                                <span class="tag-red">Bencana</span>
                                <span class="tag-gray">
                                    <img src="/asset/time-left.png" alt="time-left">
                                    7 hari lagi
                                </span>
                            </div>
        
                            <h3 class="card-title">Donasi Bantuan Korban Banjir Sumatra</h3>
        
                            <a href="organization_profile.html" class="card-organizer">Peduli Kasih</a>
                            <p class="card-desc">
                                Bantuan terhadap korban banjir di Sumatra, dana yang terkumpul akan dibelikan kebutuhan pokok
                            </p>
        
                            <div class="donate-progress">
                                <div class="progress-info">
                                    <span>Terkumpul: <strong>Rp 1.000.000.000</strong></span>
                                    <span class="progress-percent">20%</span>
                                </div>

                                <div class="progress-bar">
                                    <div class="progress-fill2"></div>
                                </div>

                                <div class="progress-meta">
                                    <span>Target: Rp 5.000.000.000</span>
                                    <span>10000 donatur</span>
                                </div>
                            </div>
        
                            <div class="card-actions">
                                <button class="btn-daftar">Donasi</button>
                            </div>
                        </div>
                    </div>
                    <div class="card">
                        <img class="card-img" src="/asset/antarafoto-sekolah-rusak-serang-020523-af-1.jpg">
        
                        <div class="card-body">
                            <div class="card-tags">
                                <span class="tag-red">Pendidikan</span>
                                <span class="tag-gray">
                                    <img src="/asset/time-left.png" alt="time-left">
                                    30 hari lagi
                                </span>
                            </div>
        
                            <h3 class="card-title">Donasi Bantuan Dana Perbaikan Sekolah</h3>
        
                            <a href="organization_profile.html" class="card-organizer">Yayasan Peduli Anak Indonesia</a>
                            <p class="card-desc">
                                Membantu anak-anak sekolah SDN 101 Serang, agar kembali nyaman belajar di sekolah mereka.
                            </p>
        
                            <div class="donate-progress">
                                <div class="progress-info">
                                    <span>Terkumpul: <strong>Rp 100.000.000</strong></span>
                                    <span class="progress-percent">50%</span>
                                </div>

                                <div class="progress-bar">
                                    <div class="progress-fill"></div>
                                </div>

                                <div class="progress-meta">
                                    <span>Target: Rp 50.000.000</span>
                                    <span>5800 donatur</span>
                                </div>
                            </div>
        
                            <div class="card-actions">
                                <button class="btn-daftar">Donasi</button>
                            </div>
                        </div>
                    </div>
                    
                </div>
                <div class="cta">
                    <a href="DonationPage.html" class="cta-btn">Lihat Semua Program</a>
                </div>
            </div>
            <div class="cards-wrapper" data-category="relawan">
                <div class="cards-grid">
                    <div class="card">
                        <img class="card-img" src="/asset/photo-1497486751825-1233686d5d80.jpeg">
        
                        <div class="card-body">
                            <div class="card-tags">
                                <span class="tag-red">Pendidikan</span>
                                <span class="tag-gray">
                                    <img src="/asset/time-left.png" alt="time-left">
                                    10 hari lagi
                                </span>
                            </div>
        
                            <h3 class="card-title">Relawan Pengajar untuk Anak Jalanan</h3>
        
                            <a href="organization_profile.html" class="card-organizer">Yayasan Peduli Anak Indonesia</a>
                            <p class="card-desc">
                                Mengajar baca tulis dan matematika dasar untuk anak jalanan di Jakarta Pusat setiap akhir pekan
                            </p>
        
                            <div class="card-info">
                                <div>
                                    <span>Lokasi:</span>
                                    <br> Jakarta Pusat
                                </div>
                                <div>
                                    <span>Komitmen Waktu:</span>
                                    <br> 1-2 Jam/minggu
                                </div>
                                <div class="info-full">
                                    <span>Keahlian:</span>
                                    <br> Sabar, Komunikatif</div>
                            </div>
        
                            <div class="card-actions">
                                <button class="btn-daftar">Daftar</button>
                                <button class="btn-detail">Detail</button>
                            </div>
        
                            <!-- Detail Modal (Pop-up) -->
                            <div class="detail-modal-container" id="detail_modal_container">
                                <!-- Modal Content Wrapper -->
                                <!-- Detail Modal (Pop-up) -->
                                <button class="close">
                                    <!-- <p>x</p> -->
                                    <i data-lucide="x"></i>
                                </button>
                                <div id="detail-modal">
                                    
                                    <!-- Close Button -->
        
                                    <!-- Main Content -->
                                    <div id="modal-main-content">
                                        <!-- Image Section -->
                                        <div class="modal-image-section">
                                            <img src="/asset/photo-1497486751825-1233686d5d80.jpeg" alt="pengajar anak jalanan">
                                            <div class="modal-tags">
                                                <span class="modal-tag-primary">Pendidikan</span>
                                            </div>
                                        </div>
                                        
                                        <div class="donate-desc">
                                            <!-- Tags & Title -->
                                            <div class="modal-title-who">
                                                <div class="first-line">
                                                    <h1 class="modal-title">Relawan Pengajar untuk Anak Jalanan</h1>
                                                    <div class="modal-periode">
                                                        <img src="/asset/time-left.png" alt="time left">
                                                        <p >10 hari lagi</p>
                                                    </div>
                                                    
                                                </div>
        
                                                <span class="modal-organizer">Oleh </span>
                                                <a href="#" class="modal-organizer">Yayasan Peduli Anak Indonesia</a>
                                            </div>
        
                                            <!-- Key Metrics -->
                                            <div class="modal-key-metrics">
                                                <div class="metric">
                                                    <div class="metric-title">
                                                        <i data-lucide="map-pin"></i>
                                                        <span>Lokasi</span>
                                                    </div>
                                                    <span class="metric-value">Jakarta Pusat</span>
                                                </div>
        
                                                <div class="metric">
                                                    <div class="metric-title">
                                                        <i data-lucide="calendar"></i>
                                                        <span>Periode</span>
                                                    </div>
                                                    <span class="metric-value">15 Jan 2025 - 15 Mar 2025</span>
                                                </div>
        
                                                <div class="metric">
                                                    <div class="metric-title">
                                                        <i data-lucide="clock"></i>
                                                        <span>Komitmen</span>
                                                    </div>
                                                    <span class="metric-value">1-2 Jam/minggu</span>
                                                </div>
                                                
                                                <div class="metric">
                                                    <div class="metric-title">
                                                        <i data-lucide="users"></i>
                                                        <span>Peserta</span>
                                                    </div>
                                                    <span class="metric-value">12/20</span>
                                                </div>
                                            </div>
        
                                            <!-- Details Sections -->
                                            <div id="modal-details">
                                                <!-- Tentang Program -->
                                                <section>
                                                    <h2><i data-lucide="bookmark"></i>Tentang Program</h2>
                                                    <p>
                                                        Program ini bertujuan untuk memberikan pendidikan dasar kepada anak-anak jalanan di Jakarta Pusat. Sebagai relawan pengajar, Anda akan membantu anak-anak belajar membaca, menulis, dan matematika dasar. Kegiatan dilakukan setiap akhir pekan di Taman Baca Pelangi, Jakarta Pusat. Program ini sangat penting untuk memberikan kesempatan pendidikan bagi anak-anak yang kurang beruntung.
                                                    </p>
                                                </section>
        
                                                <!-- Tanggung Jawab -->
                                                <section>
                                                    <h2><i data-lucide="check-square"></i>Tanggung Jawab</h2>
                                                    <ul>
                                                        <li>Mengajar membaca, menulis, dan berhitung dasar</li>
                                                        <li>Membuat materi pembelajaran yang menarik dan mudah dipahami</li>
                                                        <li>Memotivasi anak-anak untuk terus belajar</li>
                                                        <li>Melaporkan perkembangan pembelajaran anak</li>
                                                    </ul>
                                                </section>
        
                                                <!-- Persyaratan -->
                                                <section>
                                                    <h2><i data-lucide="list"></i>Persyaratan</h2>
                                                    <ul>
                                                        <li>Berusia minimal 18 tahun</li>
                                                        <li>Memiliki kesabaran dan kemampuan komunikasi yang baik</li>
                                                        <li>Dapat berkomitmen minimal 2 bulan</li>
                                                        <li>Memiliki pengalaman mengajar (lebih disukai tapi tidak wajib)</li>
                                                        <li>Bersedia mengikuti pelatihan singkat sebelum mengajar</li>
                                                    </ul>
                                                </section>
        
                                                <!-- Yang Akan Kamu Dapatkan -->
                                                <section>
                                                    <h2><i data-lucide="heart"></i>Yang Akan Kamu Dapatkan</h2>
                                                    <ul>
                                                        <li>Sertifikat volunteer dari Yayasan Peduli Anak Indonesia</li>
                                                        <li>Pengalaman mengajar dan mengembangkan soft skills</li>
                                                        <li>Koneksi dengan komunitas volunteer lainnya</li>
                                                        <li>Kepuasan batin membantu anak-anak yang membutuhkan</li>
                                                        <li>Dokumentasi kegiatan untuk portofolio</li>
                                                    </ul>
                                                </section>
                                            </div>
                                        </div>
                                    </div>
        
                                    <!-- Footer Button -->
                                    <div class="modal-footer">
                                        <button id="relawan-detail-daftar">Daftar Sekarang</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="card">
                        <img class="card-img" src="/asset/relawan-lmi-melakukan-giat-kesembilan-untuk-membantu-para-warga_221130131616-647 (1).jpg">
        
                        <div class="card-body">
                            <div class="card-tags">
                                <span class="tag-red">Kesehatan</span>
                                <span class="tag-gray">
                                    <img src="/asset/time-left.png" alt="time-left">
                                    15 hari lagi
                                </span>
                            </div>
        
                            <h3 class="card-title">Relawan Cek Kesehatan Masyarakat</h3>
        
                            <a href="organization_profile.html" class="card-organizer">Indonesia Sehat</a>
                            <p class="card-desc">
                                Melakukan pengecekan kesehatan masyarakat di Tangerang
                            </p>
        
                            <div class="card-info">
                                <div>
                                    <span>Lokasi:</span>
                                    <br> Tangerang
                                </div>
                                <div>
                                    <span>Komitmen Waktu:</span>
                                    <br> 3 jam
                                </div>
                                <div class="info-full">
                                    <span>Keahlian:</span>
                                    <br> penggunaan alat kesehatan, Komunikatif</div>
                            </div>
        
                            <div class="card-actions">
                                <button class="btn-daftar">Daftar</button>
                                <button class="btn-detail">Detail</button>
                            </div>
        
                            <!-- Detail Modal (Pop-up) -->
                            <div class="detail-modal-container" id="detail_modal_container">
                                <!-- Modal Content Wrapper -->
                                <!-- Detail Modal (Pop-up) -->
                                <button class="close">
                                    <!-- <p>x</p> -->
                                    <i data-lucide="x"></i>
                                </button>
                                <div id="detail-modal">
                                    
                                    <!-- Close Button -->
        
                                    <!-- Main Content -->
                                    <div id="modal-main-content">
                                        <!-- Image Section -->
                                        <div class="modal-image-section">
                                            <img src="/asset/relawan-lmi-melakukan-giat-kesembilan-untuk-membantu-para-warga_221130131616-647 (1).jpg" alt="pengajar anak jalanan">
                                            <div class="modal-tags">
                                                <span class="modal-tag-primary">Pendidikan</span>
                                            </div>
                                        </div>
                                        
                                        <div class="donate-desc">
                                            <!-- Tags & Title -->
                                            <div class="modal-title-who">
                                                <div class="first-line">
                                                    <h1 class="modal-title">Relawan Pengajar untuk Anak Jalanan</h1>
                                                    <div class="modal-periode">
                                                        <img src="/asset/time-left.png" alt="time left">
                                                        <p >10 hari lagi</p>
                                                    </div>
                                                    
                                                </div>
        
                                                <span class="modal-organizer">Oleh </span>
                                                <a href="#" class="modal-organizer">Yayasan Peduli Anak Indonesia</a>
                                            </div>
        
                                            <!-- Key Metrics -->
                                            <div class="modal-key-metrics">
                                                <div class="metric">
                                                    <div class="metric-title">
                                                        <i data-lucide="map-pin"></i>
                                                        <span>Lokasi</span>
                                                    </div>
                                                    <span class="metric-value">Jakarta Pusat</span>
                                                </div>
        
                                                <div class="metric">
                                                    <div class="metric-title">
                                                        <i data-lucide="calendar"></i>
                                                        <span>Periode</span>
                                                    </div>
                                                    <span class="metric-value">15 Jan 2025 - 15 Mar 2025</span>
                                                </div>
        
                                                <div class="metric">
                                                    <div class="metric-title">
                                                        <i data-lucide="clock"></i>
                                                        <span>Komitmen</span>
                                                    </div>
                                                    <span class="metric-value">1-2 Jam/minggu</span>
                                                </div>
                                                
                                                <div class="metric">
                                                    <div class="metric-title">
                                                        <i data-lucide="users"></i>
                                                        <span>Peserta</span>
                                                    </div>
                                                    <span class="metric-value">12/20</span>
                                                </div>
                                            </div>
        
                                            <!-- Details Sections -->
                                            <div id="modal-details">
                                                <!-- Tentang Program -->
                                                <section>
                                                    <h2><i data-lucide="bookmark"></i>Tentang Program</h2>
                                                    <p>
                                                        Program ini bertujuan untuk memberikan pendidikan dasar kepada anak-anak jalanan di Jakarta Pusat. Sebagai relawan pengajar, Anda akan membantu anak-anak belajar membaca, menulis, dan matematika dasar. Kegiatan dilakukan setiap akhir pekan di Taman Baca Pelangi, Jakarta Pusat. Program ini sangat penting untuk memberikan kesempatan pendidikan bagi anak-anak yang kurang beruntung.
                                                    </p>
                                                </section>
        
                                                <!-- Tanggung Jawab -->
                                                <section>
                                                    <h2><i data-lucide="check-square"></i>Tanggung Jawab</h2>
                                                    <ul>
                                                        <li>Mengajar membaca, menulis, dan berhitung dasar</li>
                                                        <li>Membuat materi pembelajaran yang menarik dan mudah dipahami</li>
                                                        <li>Memotivasi anak-anak untuk terus belajar</li>
                                                        <li>Melaporkan perkembangan pembelajaran anak</li>
                                                    </ul>
                                                </section>
        
                                                <!-- Persyaratan -->
                                                <section>
                                                    <h2><i data-lucide="list"></i>Persyaratan</h2>
                                                    <ul>
                                                        <li>Berusia minimal 18 tahun</li>
                                                        <li>Memiliki kesabaran dan kemampuan komunikasi yang baik</li>
                                                        <li>Dapat berkomitmen minimal 2 bulan</li>
                                                        <li>Memiliki pengalaman mengajar (lebih disukai tapi tidak wajib)</li>
                                                        <li>Bersedia mengikuti pelatihan singkat sebelum mengajar</li>
                                                    </ul>
                                                </section>
        
                                                <!-- Yang Akan Kamu Dapatkan -->
                                                <section>
                                                    <h2><i data-lucide="heart"></i>Yang Akan Kamu Dapatkan</h2>
                                                    <ul>
                                                        <li>Sertifikat volunteer dari Yayasan Peduli Anak Indonesia</li>
                                                        <li>Pengalaman mengajar dan mengembangkan soft skills</li>
                                                        <li>Koneksi dengan komunitas volunteer lainnya</li>
                                                        <li>Kepuasan batin membantu anak-anak yang membutuhkan</li>
                                                        <li>Dokumentasi kegiatan untuk portofolio</li>
                                                    </ul>
                                                </section>
                                            </div>
                                        </div>
                                    </div>
        
                                    <!-- Footer Button -->
                                    <div class="modal-footer">
                                        <button id="relawan-detail-daftar">Daftar Sekarang</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="card">
                        <img class="card-img" src="/asset/Screenshot 2025-12-16 005319.png">
        
                        <div class="card-body">
                            <div class="card-tags">
                                <span class="tag-red">humanity</span>
                                <span class="tag-gray">
                                    <img src="/asset/time-left.png" alt="time-left">
                                    5 hari lagi
                                </span>
                            </div>
        
                            <h3 class="card-title">Relawan Sahabat Senja: Teman yang dibutuhkan</h3>
        
                            <a href="organization_profile.html" class="card-organizer">Yayasan Peduli Anak Indonesia</a>
                            <p class="card-desc">
                                Menemani, menghibur, dan mengurangi rasa kesepian lansia di panti jompo
                            </p>
        
                            <div class="card-info">
                                <div>
                                    <span>Lokasi:</span>
                                    <br> Kalimantan Timur
                                </div>
                                <div>
                                    <span>Komitmen Waktu:</span>
                                    <br> 1-2 Jam/minggu
                                </div>
                                <div class="info-full">
                                    <span>Keahlian:</span>
                                    <br> Sabar</div>
                            </div>
        
                            <div class="card-actions">
                                <button class="btn-daftar">Daftar</button>
                                <button class="btn-detail">Detail</button>
                            </div>
        
                            <!-- Detail Modal (Pop-up) -->
                            <div class="detail-modal-container" id="detail_modal_container">
                                <!-- Modal Content Wrapper -->
                                <!-- Detail Modal (Pop-up) -->
                                <button class="close">
                                    <!-- <p>x</p> -->
                                    <i data-lucide="x"></i>
                                </button>
                                <div id="detail-modal">
                                    
                                    <!-- Close Button -->
        
                                    <!-- Main Content -->
                                    <div id="modal-main-content">
                                        <!-- Image Section -->
                                        <div class="modal-image-section">
                                            <img src="/asset/photo-1497486751825-1233686d5d80.jpeg" alt="pengajar anak jalanan">
                                            <div class="modal-tags">
                                                <span class="modal-tag-primary">Pendidikan</span>
                                            </div>
                                        </div>
                                        
                                        <div class="donate-desc">
                                            <!-- Tags & Title -->
                                            <div class="modal-title-who">
                                                <div class="first-line">
                                                    <h1 class="modal-title">Relawan Pengajar untuk Anak Jalanan</h1>
                                                    <div class="modal-periode">
                                                        <img src="/asset/time-left.png" alt="time left">
                                                        <p >10 hari lagi</p>
                                                    </div>
                                                    
                                                </div>
        
                                                <span class="modal-organizer">Oleh </span>
                                                <a href="#" class="modal-organizer">Yayasan Peduli Anak Indonesia</a>
                                            </div>
        
                                            <!-- Key Metrics -->
                                            <div class="modal-key-metrics">
                                                <div class="metric">
                                                    <div class="metric-title">
                                                        <i data-lucide="map-pin"></i>
                                                        <span>Lokasi</span>
                                                    </div>
                                                    <span class="metric-value">Jakarta Pusat</span>
                                                </div>
        
                                                <div class="metric">
                                                    <div class="metric-title">
                                                        <i data-lucide="calendar"></i>
                                                        <span>Periode</span>
                                                    </div>
                                                    <span class="metric-value">15 Jan 2025 - 15 Mar 2025</span>
                                                </div>
        
                                                <div class="metric">
                                                    <div class="metric-title">
                                                        <i data-lucide="clock"></i>
                                                        <span>Komitmen</span>
                                                    </div>
                                                    <span class="metric-value">1-2 Jam/minggu</span>
                                                </div>
                                                
                                                <div class="metric">
                                                    <div class="metric-title">
                                                        <i data-lucide="users"></i>
                                                        <span>Peserta</span>
                                                    </div>
                                                    <span class="metric-value">12/20</span>
                                                </div>
                                            </div>
        
                                            <!-- Details Sections -->
                                            <div id="modal-details">
                                                <!-- Tentang Program -->
                                                <section>
                                                    <h2><i data-lucide="bookmark"></i>Tentang Program</h2>
                                                    <p>
                                                        Program ini bertujuan untuk memberikan pendidikan dasar kepada anak-anak jalanan di Jakarta Pusat. Sebagai relawan pengajar, Anda akan membantu anak-anak belajar membaca, menulis, dan matematika dasar. Kegiatan dilakukan setiap akhir pekan di Taman Baca Pelangi, Jakarta Pusat. Program ini sangat penting untuk memberikan kesempatan pendidikan bagi anak-anak yang kurang beruntung.
                                                    </p>
                                                </section>
        
                                                <!-- Tanggung Jawab -->
                                                <section>
                                                    <h2><i data-lucide="check-square"></i>Tanggung Jawab</h2>
                                                    <ul>
                                                        <li>Mengajar membaca, menulis, dan berhitung dasar</li>
                                                        <li>Membuat materi pembelajaran yang menarik dan mudah dipahami</li>
                                                        <li>Memotivasi anak-anak untuk terus belajar</li>
                                                        <li>Melaporkan perkembangan pembelajaran anak</li>
                                                    </ul>
                                                </section>
        
                                                <!-- Persyaratan -->
                                                <section>
                                                    <h2><i data-lucide="list"></i>Persyaratan</h2>
                                                    <ul>
                                                        <li>Berusia minimal 18 tahun</li>
                                                        <li>Memiliki kesabaran dan kemampuan komunikasi yang baik</li>
                                                        <li>Dapat berkomitmen minimal 2 bulan</li>
                                                        <li>Memiliki pengalaman mengajar (lebih disukai tapi tidak wajib)</li>
                                                        <li>Bersedia mengikuti pelatihan singkat sebelum mengajar</li>
                                                    </ul>
                                                </section>
        
                                                <!-- Yang Akan Kamu Dapatkan -->
                                                <section>
                                                    <h2><i data-lucide="heart"></i>Yang Akan Kamu Dapatkan</h2>
                                                    <ul>
                                                        <li>Sertifikat volunteer dari Yayasan Peduli Anak Indonesia</li>
                                                        <li>Pengalaman mengajar dan mengembangkan soft skills</li>
                                                        <li>Koneksi dengan komunitas volunteer lainnya</li>
                                                        <li>Kepuasan batin membantu anak-anak yang membutuhkan</li>
                                                        <li>Dokumentasi kegiatan untuk portofolio</li>
                                                    </ul>
                                                </section>
                                            </div>
                                        </div>
                                    </div>
        
                                    <!-- Footer Button -->
                                    <div class="modal-footer">
                                        <button id="relawan-detail-daftar">Daftar Sekarang</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="cta">
                    <a href="programrelawan.blade.php" class="cta-btn">Lihat Semua Program</a>
                </div>
            </div>

            <section class="org-content" id="kegiatan">
                <h2>Riwayat Kegiatan Selesai</h2>
                
                <div class="history-container">
                    
                    <div class="history-column">
                        <h3>Riwayat Program Donasi</h3>

                        <div class="program-card program-history" data-type="donasi">
                            <div class="program-content">
                                <div class="program-header">
                                    <span class="tag donasi">Donasi</span>
                                    <span class="status selesai">Selesai</span>
                                </div>

                                <h4>Program Literasi Weekend</h4>
                                <p class="desc">
                                    Mengajari membaca, menulis, dan berhitung untuk anak jalanan usia 6–12 tahun.
                                </p>
                                <p class="date">Periode: 1–15 Januari 2025</p>

                                <div class="history-meta-grid">
                                    <div class="meta-item-history">
                                        <span>Total Dana Terkumpul</span>
                                        <strong>Rp 15.000.000</strong>
                                    </div>
                                    <div class="meta-item-history">
                                        <span>Target Dana</span>
                                        <strong>Rp 15.000.000</strong>
                                    </div>
                                    <div class="meta-item-history">
                                        <span>Partisipan Donasi</span>
                                        <strong>245 orang</strong>
                                    </div>
                                </div>
                                
                                <a href="laporan_literasi.pdf" class="btn-download available" download>
                                    <i data-lucide="download"></i> Download Laporan
                                </a>
                            </div>
                        </div>

                        <div class="program-card program-history" data-type="donasi">
                            <div class="program-content">
                                <div class="program-header">
                                    <span class="tag donasi">Donasi</span>
                                    <span class="status selesai">Selesai</span>
                                </div>

                                <h4>Distribusi Buku & Alat Tulis</h4>
                                <p class="desc">
                                    Memberikan perlengkapan sekolah kepada 150 anak jalanan.
                                </p>
                                <p class="date">Periode: 20–25 Januari 2025</p>

                                <div class="history-meta-grid">
                                    <div class="meta-item-history">
                                        <span>Total Dana Terkumpul</span>
                                        <strong>Rp 18.000.000</strong>
                                    </div>
                                    <div class="meta-item-history">
                                        <span>Target Dana</span>
                                        <strong>Rp 25.000.000</strong>
                                    </div>
                                    <div class="meta-item-history">
                                        <span>Partisipan Donasi</span>
                                        <strong>87 orang</strong>
                                    </div>
                                </div>
                                
                                <a href="#" class="btn-download disabled">
                                    <i data-lucide="file-x"></i> Laporan Belum Tersedia
                                </a>
                            </div>
                        </div>
                        
                    </div>
                    
                    <div class="history-column">
                        <h3>Riwayat Program Relawan</h3>

                        <div class="program-card program-history" data-type="relawan">
                            <div class="program-content">
                                <div class="program-header">
                                    <span class="tag relawan">Relawan</span>
                                    <span class="status selesai">Selesai</span> </div>

                                <h4>Workshop Keterampilan Dasar</h4>
                                <p class="desc">
                                    Mengadakan pelatihan menjahit dan kerajinan untuk remaja jalanan.
                                </p>
                                <p class="date">Periode: 10–12 Maret 2025</p>

                                <div class="history-meta-grid">
                                    <div class="meta-item-history">
                                        <span>Partisipan Relawan</span>
                                        <strong>12 orang</strong>
                                    </div>
                                    <!-- <div class="meta-item-history">
                                        <span>Durasi Komitmen</span>
                                        <strong>15 jam</strong>
                                    </div> -->
                                </div>
                                
                                <!-- <a href="laporan_workshop.pdf" class="btn-download available" download>
                                    <i data-lucide="download"></i> Download Laporan
                                </a> -->
                            </div>
                        </div>

                        <div class="program-card program-history" data-type="relawan">
                            <div class="program-content">
                                <div class="program-header">
                                    <span class="tag relawan">Relawan</span>
                                    <span class="status dalam-pelaksanaan">Dalam Pelaksanaan</span> </div>

                                <h4>Kelas Mengajar Mingguan</h4>
                                <p class="desc">
                                    Program rutin mengajar subjek sekolah dasar setiap hari Minggu.
                                </p>
                                <p class="date">Periode: Maret – Mei 2025</p>

                                <div class="history-meta-grid">
                                    <div class="meta-item-history">
                                        <span>Relawan Aktif</span>
                                        <strong>20 orang</strong>
                                    </div>
                                    <!-- <div class="meta-item-history">
                                        <span>Sisa Waktu</span>
                                        <strong>3 minggu</strong>
                                    </div> -->
                                </div>
                                
                                <!-- <a href="#" class="btn-download disabled">
                                    <i data-lucide="file-x"></i> Laporan Belum Tersedia
                                </a> -->
                            </div>
                        </div>
                        
                    </div>
                    
                </div>
            </section>
        </div>
    </main>

    <footer class="footer">
        <div class="footer-container">
    
            <!-- Left Section -->
            <div class="footer-left">
                <h2 class="footer-title">OneAct</h2>
                <p class="footer-description">
                    Platform kolaborasi sosial yang menghubungkan individu, komunitas, dan organisasi untuk bersama-sama mengatasi permasalahan sosial berupa kemiskinan, pendidikan, kesehatan, dan lingkungan. Kami hadir sebagai wadah donasi dan volunteer yang transparan, terstruktur, dan terpercaya.
                </p>
    
                <div class="footer-social">
                    <a href="#" aria-label="Instagram" class="social-btn">
                        <img src="/asset/instagram.png" alt="Instagram" />
                    </a>
                    <a href="#" aria-label="Twitter" class="social-btn">
                        <img src="/asset/twitter.png" alt="Twitter" />
                    </a>
                    <a href="#" aria-label="Facebook" class="social-btn">
                        <img src="/asset/facebook.png" alt="Facebook" />
                    </a>
                    <a href="#" aria-label="Youtube" class="social-btn">
                        <img src="/asset/youtube.png" alt="Youtube" />
                    </a>
                    <a href="#" aria-label="LinkedIn" class="social-btn">
                        <img src="/asset/linkedin.png" alt="LinkedIn" />
                    </a>
                </div>
            </div>
    
            <!-- Quick Links -->
            <div class="footer-links">
                <h3 class="footer-heading">Quick Links</h3>
                <a href="#" class="footer-link">Privacy Policy</a>
                <a href="#" class="footer-link">Terms of Use</a>
                <a href="#" class="footer-link">Tim Kami</a>
                <a href="#" class="footer-link">FAQs/Kontak</a>
                <a href="#" class="footer-link">Karir</a>
                <a href="#" class="footer-link">Sponsorship</a>
            </div>
    
            <!-- Contact Info -->
            <div class="footer-contact">
                <h3 class="footer-heading">Hubungi Kami</h3>
    
                <div class="contact-item">
                    <img src="" class="contact-icon" />
                    <div>
                        <p class="contact-title">Kantor Pusat OneAct</p>
                        <p class="contact-text">Jalan Letnan Sutopo<br>Serpong - Banten</p>
                    </div>
                </div>
    
                <a href="tel:+6281656782" class="contact-item">
                    <div class="contact-icon-circle">
                        <img src="" />
                    </div>
                    <span>+62 81 656 7824</span>
                </a>
    
                <a href="mailto:oneact@oneact.or.id" class="contact-item">
                    <div class="contact-icon-circle">
                        <img src="" />
                    </div>
                    <span>oneact@oneact.or.id</span>
                </a>
            </div>
    
        </div>
    
        <div class="footer-bottom">
            <p>© 2025 OneAct. All rights reserved.</p>
        </div>
    </footer>
    
    <script src="/js/home.js"></script>
</body>
</html>