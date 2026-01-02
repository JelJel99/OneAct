<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>HomePage</title>

    <!-- Optional: Tailwind still loaded, but no Tailwind classes are used -->
    <script src="https://cdn.tailwindcss.com"></script>

    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@100..900&display=swap" rel="stylesheet">
    <script src="https://unpkg.com/lucide@latest"></script>
    
    <link rel="stylesheet" href="{{ asset('css/home.css') }}">
    <link rel="stylesheet" href="{{ asset('css/global.css') }}">
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
                <a href="home" class="nav-link active">Beranda</a>
                <a href="DonationPage" class="nav-link">Donasi</a>
                <a href="programrelawan" class="nav-link">Relawan</a>
                <a href="community" class="nav-link">Komunitas</a>
                <a href="faq" class="nav-link">FAQs</a>
            </div>

            <div class="nav-right">
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
            <a class="mobile-item">Beranda</a>
            <a class="mobile-item">Donasi</a>
            <a class="mobile-item">Relawan</a>
            <a class="mobile-item">Komunitas</a>
            <a class="mobile-item">Hubungi Kami</a>
            <a class="mobile-login">Masuk / Daftar</a>
        </div>
    </nav>

    <!-- HERO -->
    <header class="hero">
        <img src="/asset/hero_img1.png" alt="" class="hero-bg">

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

            <div class="cards-wrapper active" data-category="donasi">
                <div class="cards-grid" id="donasiGrid">
                    <!-- program donasi akan dirender di sini -->
                </div>
            </div>

            <div class="cards-wrapper" data-category="relawan">
                <div class="cards-grid" id="relawanGrid">
                    <!-- program relawan akan dirender di sini -->
                    <div class="detail-modal-container" id="detailModal"></div>
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
                    <div class="history-column" id="history-donasi">
                        <h3>Riwayat Program Donasi</h3>
                        <div class="program-card-scroll" id="donasiHistoryGrid">
                            <!-- Data donasi akan di-inject JS -->
                        </div>
                    </div>

                    <div class="history-column" id="history-relawan">
                        <h3>Riwayat Program Relawan</h3>
                        <div class="program-card-scroll" id="relawanHistoryGrid">
                            <!-- Data relawan akan di-inject JS -->
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
    
    <script src="{{ asset('js/home.js') }}"></script>
</body>
</html>