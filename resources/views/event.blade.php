<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Usulan Event - One Act</title>
    <script src="https://unpkg.com/lucide@latest"></script>
    <link rel="stylesheet" href="{{ asset('css/global.css') }}">

    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: "Inter", sans-serif;
            color: #1f2937;
            background: #f9fafb;
        }

        /* Breadcrumb */
        .breadcrumb {
            padding: 20px 40px;
            background: white;
            border-bottom: 1px solid #e0e0e0;
        }

        .breadcrumb a {
            color: #333;
            text-decoration: none;
            cursor: pointer;
        }

        .breadcrumb a:hover {
            color: #8b1a1a;
        }

        /* Main Content */
        .main-content {
            max-width: 1200px;
            margin: 40px auto;
            padding: 0 40px;
        }

        .page-title {
            font-size: 2.5rem;
            color: #333;
            margin-bottom: 0.5rem;
        }

        .page-subtitle {
            color: #666;
            margin-bottom: 2rem;
            font-size: 1rem;
        }

        .form-group {
            margin-bottom: 1.5rem;
        }

        .form-group label {
            display: block;
            margin-bottom: 0.5rem;
            font-weight: 600;
            color: #333;
        }

        .form-group input,
        .form-group textarea {
            width: 100%;
            padding: 12px 16px;
            border: 1px solid #ddd;
            border-radius: 8px;
            font-size: 1rem;
            font-family: inherit;
            transition: border-color 0.3s;
        }

        .form-group input:focus,
        .form-group textarea:focus {
            outline: none;
            border-color: #8b1a1a;
        }

        .form-group textarea {
            resize: vertical;
            min-height: 120px;
        }

        .submit-btn {
            background-color: #8b1a1a;
            color: white;
            padding: 14px 40px;
            border: none;
            border-radius: 8px;
            font-size: 1rem;
            font-weight: 600;
            cursor: pointer;
            transition: all 0.3s;
            margin-top: 1rem;
        }

        .submit-btn:hover {
            background-color: #6a1313;
            transform: translateY(-2px);
            box-shadow: 0 4px 12px rgba(139, 26, 26, 0.3);
        }
    </style>
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
                <a href="/rogramrelawan" class="nav-link">Relawan</a>
                <a href="/community" class="nav-link active">Komunitas</a>
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

    <!-- Breadcrumb -->
    <div class="breadcrumb">
        <a onclick="window.location.href='/community/{{ $komunitas->id }}'">← Komunitas > {{ $komunitas->nama }} > <strong>Usulan Event</strong></a>
    </div>

    <!-- Main Content -->
    <div class="main-content">
        <h1 class="page-title">Usulan Event Baru</h1>
        <p class="page-subtitle">Ayo bantu komunitas dengan ide kegiatan baru!</p>

        <form action="{{ route('event.store', $komunitas->id) }}" method="POST">
            @csrf
            <div class="form-group">
                <label for="eventName">Nama Event</label>
                <input type="text" id="eventName" name="nama_event" placeholder="Contoh: Jalan Sehat Bersama Anabul" required>
            </div>

            <div class="form-group">
                <label for="eventDescription">Deskripsi Event</label>
                <textarea id="eventDescription" name="deskripsi" placeholder="Jelaskan ide acara kamu..." required></textarea>
            </div>

            <div class="form-group">
                <label for="eventDate">Tanggal yang diusulkan</label>
                <input type="date" id="eventDate" name="tanggal" required>
            </div>

            <div class="form-group">
                <label for="eventLocation">Lokasi / Tempat</label>
                <input type="text" id="eventLocation" name="lokasi" placeholder="Contoh: Taman Kota" required>
            </div>

            <div class="form-group">
                <label for="volunteerNeeds">Kebutuhan Relawan (Opsional)</label>
                <textarea id="volunteerNeeds" name="kebutuhan_relawan" placeholder="Butuh relawan untuk..."></textarea>
            </div>

            <button type="submit" class="submit-btn">Kirim Usulan Event</button>
        </form>
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
                        <i data-lucide="phone"></i>
                    </div>
                    <span>+62 81 656 7824</span>
                </a>
    
                <a href="mailto:oneact@oneact.or.id" class="contact-item">
                    <div class="contact-icon-circle">
                        <i data-lucide="mail"></i>
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
    <script src="https://unpkg.com/lucide@latest"></script>
    <script>
        lucide.createIcons();
        // Set min date to today
        const today = new Date().toISOString().split('T')[0];
        document.getElementById('eventDate').setAttribute('min', today);
    </script>
</body>
</html>
