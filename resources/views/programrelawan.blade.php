<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Relawan | OneAct</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <script src="https://unpkg.com/lucide@latest"></script>
    <!-- Bootstrap (optional, tapi grid kamu pakai row/col) -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    
    <link rel="stylesheet" href="{{ asset('css/global.css') }}">
    <link rel="stylesheet" href="{{ asset('css/programrelawan.css') }}">
</head>

<body>
    <nav class="main-navbar">
        <div class="main-nav-container">
            <div class="main-nav-left">
                <img src="{{ asset('asset/square_OneAct.png') }}" alt="OneAct Logo" class="logo">
            </div>
    
            <div class="main-nav-menu">
                <a href="home" class="main-nav-link">Beranda</a>
                <a href="donasi" class="main-nav-link">Donasi</a>
                <a href="programrelawan" class="main-nav-link active">Relawan</a>
                <a href="komunitas" class="main-nav-link">Komunitas</a>
                <a href="faq" class="main-nav-link">FAQs</a>
            </div>
    
            <div class="main-nav-right">
                <button id="hamburgerBtn" class="icon-btn mobile-only">
                    <i data-lucide="menu"></i>
                </button>

                <!-- NOTIF -->
                <button id="notifBtn" class="main-icon-btn hidden">
                    <i data-lucide="bell"></i>
                </button>
    
                <!-- GUEST -->
                <a id="loginBtn" href="{{ url('/login') }}" class="main-auth-btn">Masuk</a>
                <span id="authSep" class="auth-separator">/</span>
                <a id="registerBtn" href="{{ url('/signup') }}" class="main-auth-btn">Daftar</a>
    
                <!-- AUTH USER -->
                <div id="userMenu" class="main-user-menu hidden">
                    <button class="main-icon-btn" id="userBtn">
                        <i data-lucide="user"></i>
                    </button>
                    <div class="user-dropdown">
                        <p id="userEmail"></p>
                        <button id="logoutBtn">Logout</button>
                    </div>
                </div>
            </div>
        </div>
    
        <!-- MOBILE MENU -->
        <div id="mobile-menu" class="mobile-menu">
            <a href="home" class="mobile-item">Beranda</a>
            <a href="DonationPage" class="mobile-item">Donasi</a>
            <a href="programrelawan" class="mobile-item">Relawan</a>
            <a href="community" class="mobile-item">Komunitas</a>
            <a href="faq" class="mobile-item">FAQs</a>
            <!-- <hr class="mobile-divider">
            <a id="mobileLogin" href="/login" class="auth-btn">Masuk</a>
            <a id="mobileRegister" href="/signup" class="auth-btn">Daftar</a> -->
        </div>
    </nav>

    <div class="relawan-page">
        <div class="container">
            <!-- Title -->
            <h1 class="relawan-title">Relawan</h1>

            <!-- Subtitle -->
            <p class="relawan-subtitle">
                Kebaikan selalu dimulai dari satu tindakan sederhana. Di OneAct, setiap relawan punya peran penting untuk membawa harapan bagi banyak orang
            </p>

            <!-- Cards Grid -->
            <div class="row g-4" id="relawan-list">
                <!-- data dari database akan di-render di sini -->
            </div>
        </div>
    </div>

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

    <!-- <script src="{{ asset('js/global.js') }}"></script> -->
    <script src="{{ asset('js/programrelawan.js') }}"></script>
</body>
</html>
