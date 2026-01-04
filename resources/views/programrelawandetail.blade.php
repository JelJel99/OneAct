<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Detail Program Relawan</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- Bootstrap + Icons -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css" rel="stylesheet">

    <script src="https://unpkg.com/lucide@latest"></script>

    <link rel="stylesheet" href="{{ asset('css/global.css') }}">
    <link rel="stylesheet" href="{{ asset('css/programrelawandetail.css') }}">
</head>
<body>
    <!-- NAVBAR -->
    <nav class="navbar">
        <div class="nav-container">
            <div class="nav-left">
                <img src="/asset/square_OneAct.png" alt="OneAct Logo" class="logo">
                <!-- <span class="logo">OneAct</span> -->
            </div>

            <div class="nav-menu">
                <a href="/home" class="nav-link">Beranda</a>
                <a href="/donation" class="nav-link">Donasi</a>
                <a href="/programrelawan" class="nav-link active">Relawan</a>
                <a href="/community" class="nav-link">Komunitas</a>
                <a href="/faq" class="nav-link">FAQs</a>
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

    <!-- ================= PAGE HEADER ================= -->
    <div class="container-fluid page-header py-5 mb-5 bg-dark text-white">
        <div class="container text-center py-5">
            <h1 id="programTitle" class="display-4 mb-4">Loading...</h1>
        </div>
    </div>

    <!-- ================= DETAIL ================= -->
    <div class="container-xxl py-5">
        <div class="container">
            <div class="row g-5">

                <!-- FOTO -->
                <div class="col-lg-5">
                    <img id="programImage"
                        class="img-fluid rounded shadow"
                        alt="Program Relawan">
                </div>

                <!-- INFO -->
                <div class="col-lg-7">
                    <h2 id="programTitle2" class="fw-bold mb-3">Loading...</h2>

                    <p><b>Kategori:</b> <span id="programKategori">-</span></p>
                    <p><b>Lokasi:</b> <span id="programLokasi">-</span></p>
                    <p><b>Komitmen:</b> <span id="programKomitmen">-</span></p>
                    <p><b>Keahlian:</b> <span id="programKeahlian">-</span></p>
                    <div class="meta-info">
                        <p><strong>Durasi:</strong> <span id="infoDurasi"></span></p>
                        <p><strong>Kuota:</strong> <span id="infoKuota"></span> Orang</p>
                    </div>

                    <hr>

                    <div class="description-section">

                        <p id="programDeskripsi" class="text-muted"></p>

                        <div class="detail-block">
                            <h5>Tanggung Jawab:</h5>
                            <ul id="listTanggungJawab"></ul>
                        </div>

                        <div class="detail-block">
                            <h5>Persyaratan:</h5>
                            <ul id="listPersyaratan"></ul>
                        </div>

                        <div class="detail-block">
                            <h5>Benefit:</h5>
                            <ul id="listBenefit"></ul>
                        </div>

                    </div>

                    <div id="relawanAlert" class="relawan-alert hidden">
                        <i class="bi bi-check-circle me-2"></i>
                        <span class="text">
                            Anda sudah terdaftar sebagai relawan pada program ini.
                        </span>
                    </div>

                    <button id="daftarBtn" class="btn btn-danger btn-lg mt-3">
                        Daftar Sebagai Relawan
                    </button>
                </div>

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

    <script src="{{ asset('js/global.js') }}"></script>
    <script src="{{ asset('js/programrelawandetail.js') }}"></script>
</body>
</html>