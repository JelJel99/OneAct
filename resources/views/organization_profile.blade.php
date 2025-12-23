<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Organization-Profile</title>

    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@100..900&display=swap" rel="stylesheet">
    <script src="https://unpkg.com/lucide@latest"></script>

    <link rel="stylesheet" href="/css/organization_profile.css">
</head>

<body data-active-nav="donasi">

    <!-- NAVBAR -->
    <nav class="navbar">
        <div class="nav-container">
            <div class="nav-left">
                <img src="/asset/square_OneAct.png" alt="OneAct Logo" class="logo">
                <!-- <span class="logo">OneAct</span> -->
            </div>

            <div class="nav-menu">
                <a href="index.html" class="nav-link">Beranda</a>
                <a href="donasi.html" class="nav-link">Donasi</a>
                <a href="relawan.html" class="nav-link">Relawan</a>
                <a href="komunitas.html" class="nav-link">Komunitas</a>
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

    <main class="org-main">
        <!-- HEADER -->
        <section class="org-header">
            <div class="org-header-left">
                <div class="org-avatar">
                    <i data-lucide="heart"></i>
                </div>

                <div class="org-info">
                    <h1>
                        Rumah Cinta Indonesia
                        <i data-lucide="badge-check" class="verified"></i>
                    </h1>
                    <p class="org-tagline">
                        Setiap orang membutuhkan berhak mendapatkan bantuan yang layak.
                    </p>

                    <div class="org-meta">
                        <span>Bantuan Sosial</span>
                        <span>• Jakarta Pusat</span>
                    </div>
                </div>
            </div>

        </section>

        <!-- TABS -->
        <div class="org-tabs">
            <button class="tab active" data-tab="ringkasan">Profile</button>
            <button class="tab" data-tab="kegiatan">Program</button>
            <button class="tab" data-tab="transparansi">Laporan</button>
        </div>

        <!-- CONTENT -->
        <section class="org-content" data-category="ringkasan">

            <!-- STATISTIC -->
            <div class="card-box">
                <h3>Statistik</h3>
                <div class="stats-grid">
                    <div class="stat">
                        <span class="stat-number">245</span>
                        <span class="stat-cat">Program Donasi</span>
                    </div>
                    <div class="stat">
                        <span class="stat-number">8</span>
                        <span class="stat-cat">Program Relawan</span>
                    </div>
                    <div class="stat">
                        <span class="stat-number">87</span>
                        <span class="stat-cat">Relawan Aktif</span>
                    </div>
                    <div class="stat">
                        <span class="stat-number">5</span>
                        <span class="stat-cat">Program Aktif</span>
                    </div>
                </div>
            </div>

            <!-- VISI MISI -->
            <div class="card-box">
                <h3>Visi & Misi</h3>

                <div class="visi-misi-wrapper">
                    <div class="visi-left">
                        <div class="visi">
                            <h4>Visi</h4>
                            <p>
                                Menciptakan masa depan yang lebih cerah bagi anak-anak jalanan
                                melalui pendidikan berkualitas
                            </p>
                        </div>
                    </div>
                    
                    <div class="misi-right">
                        <div class="misi">
                            <h4>Misi</h4>
                            <p>
                                Memberikan akses pendidikan dasar dan pendampingan kepada anak
                                jalanan di Jakarta untuk meningkatkan kualitas hidup mereka
                            </p>
                        </div>
                    </div>
                </div>
            </div>

            <!-- DAMPAK SOSIAL -->
            <div class="card-box">
                <h3>Dampak Sosial</h3>
                <div class="impact-wrapper">

                    <div class="impact-grid">
                        <div class="impact-item">
                            <strong>150+ Anak</strong>
                            <span>Telah menerima pendidikan dasar</span>
                        </div>
                        <div class="impact-item">
                            <strong>85%</strong>
                            <span>Peningkatan kemampuan literasi</span>
                        </div>
                        <div class="impact-item">
                            <strong>12 Anak</strong>
                            <span>Kembali ke sekolah formal</span>
                        </div>
                        <div class="impact-item">
                            <strong>500+ Jam</strong>
                            <span>Total waktu pengajaran</span>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <section class="org-content" data-category="kegiatan">
            <div class="program-card" data-status="ongoing" data-report="laporan-literasi.pdf">
                <img src="/asset/img_2nwfWGQ.jpeg" alt="Program Literasi">

                <div class="program-content">
                    <div class="program-header">
                        <span class="tag relawan">Relawan</span>
                        <span class="status ongoing">Sedang Berjalan</span>
                    </div>

                    <h3>Program Literasi Weekend</h3>
                    <p class="date">1–15 Januari 2025</p>
                    <p class="desc">
                        Mengajari membaca, menulis, dan berhitung untuk anak jalanan usia 6–12 tahun
                    </p>

                    <p class="meta"><i data-lucide="users" class="meta-icon"></i>10</p>

                    <!-- <div class="fund">
                        <div class="fund-text">
                            <span>Dana terkumpul</span>
                            <strong>Rp 15.000.000 / Rp 15.000.000</strong>
                        </div>
                        <div class="progress">
                            <div class="progress-bar" style="width:100%"></div>
                        </div>
                    </div> -->

                </div>
            </div>
            
            <!-- PROGRAM ITEM -->
            <div class="program-card" data-status="selesai">
                <img src="/asset/img_2nwfWGQ.jpeg" alt="Distribusi Buku">
                
                <div class="program-content">
                    <div class="program-header">
                        <span class="tag donasi">Donasi</span>
                        <span class="status selesai">Selesai</span>
                    </div>
                    
                    <h3>Distribusi Buku & Alat Tulis</h3>
                    <p class="date">20–25 Januari 2025</p>
                    <p class="desc">
                        Memberikan perlengkapan sekolah kepada 150 anak jalanan
                    </p>
                    
                    <p class="meta"><i data-lucide="users" class="meta-icon"></i> 87 partisipan</p>
                    
                    <div class="fund">
                        <div class="fund-text">
                            <span>Dana terkumpul</span>
                            <strong>Rp 18.000.000 / Rp 25.000.000</strong>
                        </div>
                        <div class="progress">
                            <div class="progress-bar" style="width:72%"></div>
                        </div>
                        <button class="report-btn">Lihat Laporan</button>
                    </div>
                </div>
            </div>
        </section>
        
        <section class="org-content" data-category="transparansi">
            <div class="report-list">
                
                <div class="report-card">
                    <div class="report-icon-wrapper">
                        <i data-lucide="file-text" class="report-icon"></i>
                    </div>
                    
                    <div class="report-info">
                        <div class="report-tags">
                            <span class="tag donasi">Program Donasi</span>
                            <span class="status published">Dipublikasi</span>
                        </div>
                        
                        <h3>Bantu Pendidikan Anak Tidak Mampu - Periode November 2024</h3>
                        
                        <div class="report-meta-grid">
                            <div class="meta-item">
                                <span>Total Donasi</span>
                                <strong>Rp 15.5M</strong>
                            </div>
                            <div class="meta-item">
                                <span>Dana Tersalurkan</span>
                                <strong>Rp 12.3M</strong>
                            </div>
                            <div class="meta-item">
                                <span>Penerima Manfaat</span>
                                <strong>150 orang</strong>
                            </div>
                            <div class="meta-item">
                                <span>Dipublikasi</span>
                                <strong>1 Des 2024</strong>
                            </div>
                        </div>
                        
                        <div class="report-actions-meta">
                            <div class="meta-stats">
                                <!-- <i data-lucide="eye" class="meta-stats-icon"></i> 234 -->
                                <i data-lucide="download" class="meta-stats-icon"></i> 45
                            </div>
                            
                            <a href="laporan_november_2024.pdf" class="btn-download" download>
                                <i data-lucide="download"></i> Download
                            </a>
                        </div>
                    </div>
                </div>

                <div class="report-card">
                    <div class="report-icon-wrapper">
                        <i data-lucide="file-text" class="report-icon"></i>
                    </div>
                    
                    <div class="report-info">
                        <div class="report-tags">
                            <span class="tag donasi">Program Donasi</span>
                            <span class="status published">Dipublikasi</span>
                        </div>
                        
                        <h3>Beasiswa Anak Yatim 2024 - Laporan Triwulan 4</h3>
                        
                        <div class="report-meta-grid">
                            <div class="meta-item">
                                <span>Total Donasi</span>
                                <strong>Rp 25M</strong>
                            </div>
                            <div class="meta-item">
                                <span>Dana Tersalurkan</span>
                                <strong>Rp 23.8M</strong>
                            </div>
                            <div class="meta-item">
                                <span>Penerima Manfaat</span>
                                <strong>200 orang</strong>
                            </div>
                            <div class="meta-item">
                                <span>Dipublikasi</span>
                                <strong>28 Nov 2024</strong>
                            </div>
                        </div>
                        
                        <div class="report-actions-meta">
                            <div class="meta-stats">
                                <!-- <i data-lucide="eye" class="meta-stats-icon"></i> 456 -->
                                <i data-lucide="download" class="meta-stats-icon"></i> 89
                            </div>
                            
                            <a href="laporan_triwulan4_2024.pdf" class="btn-download" download>
                                <i data-lucide="download"></i> Download
                            </a>
                        </div>
                    </div>
                </div>
                
                <div class="report-card draft">
                    <div class="report-icon-wrapper">
                        <i data-lucide="file-text" class="report-icon"></i>
                    </div>
                    
                    <div class="report-info">
                        <div class="report-tags">
                            <span class="tag donasi">Program Donasi</span>
                            <span class="status draft">Belum Dipublikasikan</span>
                        </div>
                        
                        <h3>Donasi Buku untuk Perpustakaan Desa - Laporan Penggunaan Dana - Draft</h3>
                        
                        <div class="report-meta-grid">
                            <div class="meta-item">
                                <span>Total Donasi</span>
                                <strong>Rp 8.2M</strong>
                            </div>
                            <div class="meta-item">
                                <span>Dana Tersalurkan</span>
                                <strong>Rp 7.9M</strong>
                            </div>
                            <div class="meta-item">
                                <span>Penerima Manfaat</span>
                                <strong>45 orang</strong>
                            </div>
                            <div class="meta-item">
                                <span>Terakhir Diedit</span>
                                <strong>2 hari lalu</strong>
                            </div>
                        </div>
                        
                        <p class="draft-note">Laporan sedang dalam pembuatan</p>
                        
                        <div class="report-actions-meta">
                            </div>
                    </div>
                </div>

            </div>
        </section>
        
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
    
    <!-- <script src="navbar.js"></script> -->
    <script src="/js/organization_profile.js"></script>

</body>
</html>