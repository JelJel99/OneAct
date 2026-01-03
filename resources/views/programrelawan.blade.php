<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Relawan | OneAct</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <script src="https://unpkg.com/lucide@latest"></script>
    <!-- Bootstrap (optional, tapi grid kamu pakai row/col) -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('css/global.css') }}">
    <link rel="stylesheet" href="{{ asset('css/programrelawan.css') }}">
</head>

<body>
    <nav class="navbar">
        <div class="nav-container">
            <div class="nav-left">
                <img src="{{ asset('asset/square_OneAct.png') }}" alt="OneAct Logo" class="logo">
            </div>
    
            <div class="nav-menu">
                <a href="home" class="nav-link">Beranda</a>
                <a href="donasi" class="nav-link">Donasi</a>
                <a href="relawan" class="nav-link active">Relawan</a>
                <a href="komunitas" class="nav-link">Komunitas</a>
                <a href="faq" class="nav-link">FAQs</a>
            </div>
    
            <div class="nav-right">
                <!-- NOTIF -->
                <button id="notifBtn" class="icon-btn hidden">
                    <i data-lucide="bell"></i>
                </button>
    
                <!-- GUEST -->
                <a id="loginBtn" href="{{ url('/login') }}" class="auth-btn">Masuk</a>
                <span id="authSep" class="auth-separator">/</span>
                <a id="registerBtn" href="{{ url('/signup') }}" class="auth-btn">Daftar</a>
    
                <!-- AUTH USER -->
                <div id="userMenu" class="user-menu hidden">
                    <button class="icon-btn" id="userBtn">
                        <i data-lucide="user"></i>
                    </button>
                    <div class="dropdown">
                        <p id="userEmail"></p>
                        <button id="logoutBtn">Logout</button>
                    </div>
                </div>
            </div>
        </div>
    
        <!-- MOBILE MENU -->
        <div id="mobile-menu" class="mobile-menu hidden">
            <a href="home" class="mobile-item">Beranda</a>
            <a href="donasi" class="mobile-item">Donasi</a>
            <a href="programrelawan" class="mobile-item">Relawan</a>
            <a href="komunitas" class="mobile-item">Komunitas</a>
            <a href="faq" class="mobile-item">FAQs</a>
            <a href="login" class="mobile-login">Masuk / Daftar</a>
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

    <script src="{{ asset('js/global.js') }}"></script>
    <script src="{{ asset('js/programrelawan.js') }}"></script>
</body>
</html>
