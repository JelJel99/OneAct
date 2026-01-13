<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $komunitas->nama }} - Detail Komunitas</title>
    <script src="https://unpkg.com/lucide@latest"></script>
    <script src="https://cdn.jsdelivr.net/npm/lucide@0.253.0/dist/lucide.min.js"></script>
    <link rel="stylesheet" href="{{ asset('css/global.css') }}">
    <link rel="stylesheet" href="{{ asset('css/community-detail.css') }}">
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
                <a href="/programrelawan" class="nav-link">Relawan</a>
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

        <main class="main">
        <!-- Breadcrumb -->
        <div class="breadcrumb">
            <a onclick="window.location.href='/community'">← Komunitas</a>
            <span> > </span>
            <strong>{{ $komunitas->nama }}</strong>
        </div>

        <!-- Main Content -->
        <div class="container">
            <!-- Left Column -->
            <div class="left-column">
                <div class="community-header">
                    <div class="community-title-section">
                        <div class="community-avatar">{{ $komunitas->kategori[0] ?? '🏠' }}</div>
                        <div class="community-title-info">
                            <h1>{{ $komunitas->nama }}</h1>
                        </div>
                    </div>
                    <p class="community-description">{{ $komunitas->deskripsi }}</p>
                </div>

                <!-- Cerita Kita section -->
                <div class="info-card">
                    <h3>Cerita Kita</h3>
                    @if($stories && count($stories) > 0)
                        @foreach($stories as $story)
                            <div class="story-item">
                                <div class="story-header">
                                    <span class="story-name">{{ $story->nama }}</span>
                                    <span class="story-role">{{ ucfirst($story->peran) }}</span>
                                </div>
                                <p class="story-content">{{ Str::limit($story->cerita, 150) }}</p>
                            </div>
                        @endforeach
                    @else
                        <div class="empty-section">
                            Belum ada cerita
                        </div>
                    @endif
                </div>
            </div>

            <!-- Right Column Sidebar -->
            <div class="right-column">
                <!-- Aksi Cepat section - removed follow button -->
                <div class="info-card">
                    <h3>Aksi Cepat</h3>
                    <div class="action-buttons">
                        <a href="{{ route('cerita.create', $komunitas->id) }}" class="btn">Bagikan Cerita</a>
                        <a href="{{ route('event.create', $komunitas->id) }}" class="btn">Usulan Event</a>
                    </div>
                </div>

                <!-- Acara Mendatang section -->
                <div class="info-card">
                    <h3>Acara Mendatang</h3>

                    @if($upcomingEvent)
                        <div class="event-item">
                            <div class="event-header">
                                <div class="event-date">
                                    {{ \Carbon\Carbon::parse($upcomingEvent->tenggat)->format('d M') }}
                                </div>

                                {{-- TAG --}}
                                <span class="event-tag {{ $upcomingEvent->type }}">
                                    {{ $upcomingEvent->type_label }}
                                </span>
                            </div>

                            <div class="event-title">
                                {{ $upcomingEvent->judul }}
                            </div>

                            {{-- LOKASI KHUSUS RELAWAN --}}
                            @if($upcomingEvent->type === 'relawan' && $upcomingEvent->programRelawan->first())
                                <div class="event-location">
                                    <span>📍</span>
                                    <span>{{ $upcomingEvent->programRelawan->first()->lokasi }}</span>
                                </div>
                            @endif
                        </div>
                    @else
                        <div class="empty-section">
                            Belum ada acara mendatang
                        </div>
                    @endif
                </div>
            </div>
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
    <script type="module" src="{{ asset('js/community-detail.js') }}"></script>
    <script src="https://unpkg.com/lucide@latest"></script>
    <script>
        lucide.createIcons();
    </script>
</body>
</html>
