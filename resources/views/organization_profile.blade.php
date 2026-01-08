<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Organization-Profile</title>

    <script src="https://cdn.tailwindcss.com"></script>

    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@100..900&display=swap" rel="stylesheet">
    <script src="https://unpkg.com/lucide@latest"></script>

    <link rel="stylesheet" href="{{ asset('css/global.css') }}">
    <link rel="stylesheet" href="{{ asset('css/organization_profile.css') }}">
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
                <a href="/home" class="nav-link active">Beranda</a>
                <a href="/donation" class="nav-link">Donasi</a>
                <a href="/programrelawan" class="nav-link">Relawan</a>
                <a href="/community" class="nav-link">Komunitas</a>
                <a href="/faq" class="nav-link">FAQs</a>
            </div>

            <div class="nav-right">
                <button id="hamburgerBtn" class="icon-btn mobile-only">
                    <i data-lucide="menu"></i>
                </button>

                <button id="notifBtn" class="icon-btn hidden">
                    <i data-lucide="bell"></i>
                </button>

                <a id="loginBtn" href="/login" class="auth-btn">Masuk</a>
                <span id="authSep" class="auth-separator">/</span>
                <a id="registerBtn" href="/signup" class="auth-btn">Daftar</a>

                <div id="userMenu" class="user-menu hidden">
                    <button class="icon-btn" id="userBtn">
                        <i data-lucide="user"></i>
                    </button>
                    <div class="dropdown">
                        <p id="userEmail"></p>
                        <button id="logoutBtn">logout</button>
                    </div>
                </div>
            </div>

        </div>

        <div id="mobile-menu" class="mobile-menu">
            <a href="/home" class="mobile-item">Beranda</a>
            <a href="/donation" class="mobile-item">Donasi</a>
            <a href="/programrelawan" class="mobile-item">Relawan</a>
            <a href="/community" class="mobile-item">Komunitas</a>
            <a href="/faq" class="mobile-item">FAQs</a>
            <!-- <hr class="mobile-divider">
            <a id="mobileLogin" href="/login" class="auth-btn">Masuk</a>
            <a id="mobileRegister" href="/signup" class="auth-btn">Daftar</a> -->
        </div>
    </nav>

    <main class="org-main">
        <!-- HEADER -->
        <section class="org-header">
            <div class="org-header-left" id="orgProfileContainer">
                <!-- render js -->
            </div>

        </section>

        <!-- TABS -->
        <div class="org-tabs">
            <button class="tab active" data-tab="ringkasan">Profile</button>
            <button class="tab" data-tab="kegiatan">Program</button>
            <!-- <button class="tab" data-tab="transparansi">Laporan</button> -->
        </div>

        <!-- CONTENT -->
        <section class="org-content" data-category="ringkasan">

            <!-- STATISTIC -->
            <div class="card-box" id="statistikContainer">
                <!-- render js -->
            </div>

            <!-- VISI MISI -->
            <div class="card-box" id="visiMisiContainer">
                <!-- render js -->
            </div>

            <!-- DAMPAK SOSIAL -->
            <!-- <div class="card-box">
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
            </div> -->
        </section>

        <section class="org-content" data-category="kegiatan" id="programContainer">
            <!-- render js -->
        </section>
        
        <!-- <section class="org-content" data-category="transparansi" id="laporanContainer"> -->
            <!-- render js -->
        <!-- </section> -->
        
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
    
    <script src="{{ asset('js/global.js') }}"></script>
    <script src="{{ asset('js/organization_profile.js') }}"></script>

</body>
</html>