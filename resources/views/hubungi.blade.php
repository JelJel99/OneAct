<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Hubungi Kami - OneAct</title>
    <script src="https://unpkg.com/lucide@latest"></script>
    
    <link rel="stylesheet" href="{{ asset('css/global.css') }}">
    <link rel="stylesheet" href="{{ asset('css/hubungi.css') }}">

    <script src="https://unpkg.com/lucide@latest"></script>
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
            <a href="home" class="mobile-item">Beranda</a>
            <a href="donation" class="mobile-item">Donasi</a>
            <a href="programrelawan" class="mobile-item">Relawan</a>
            <a href="community" class="mobile-item">Komunitas</a>
            <a href="faq" class="mobile-item">FAQs</a>
            <!-- <hr class="mobile-divider">
            <a id="mobileLogin" href="/login" class="auth-btn">Masuk</a>
            <a id="mobileRegister" href="/signup" class="auth-btn">Daftar</a> -->
        </div>
    </nav>

    <main class="main-content">
        <section id="contact-form-section" class="contact-form-section">
            <div class="form-container">
                <h2 class="contact-title-form">Hubungi Kami</h2>
                <p>Terima kasih atas ketertarikan Anda terhadap OneAct!</p>
                <p>Silakan beri tahu kami bagaimana kami dapat membantu Anda.</p>
                <p>Kami akan membalas pesan Anda dalam <b>1–2 hari kerja</b>.</p>

                <p class="note">Catatan:</p>
                <p class="note">Mengirim beberapa permintaan sekaligus dapat memperlambat respon.</p>

                <form id="contact-form">
                    <div class="form-group">
                        <label for="user-type">Anda pengguna atau perwakilan organisasi?</label>
                        <div class="custom-select">
                            <select id="user-type" name="user-type">
                                <option value="" disabled selected>Isi...</option>
                                <option value="pengguna">Pengguna / Pendonor / Relawan</option>
                                <option value="perwakilan">Perwakilan Organisasi Nonprofit</option>
                            </select>
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="how-can-we-help">Bagaimana kami dapat membantu?</label>
                        <textarea id="how-can-we-help" name="how-can-we-help" rows="3" placeholder="Isi..."></textarea>
                    </div>

                    <div class="form-group name-email-group">
                        <div class="input-field">
                            <label for="name">Nama</label>
                            <input type="text" id="name" name="name" placeholder="Isi...">
                        </div>
                        <div class="input-field">
                            <label for="email">Email</label>
                            <input type="email" id="email" name="email" placeholder="Isi...">
                        </div>
                    </div>

                    <button type="submit" class="kirim-button" id="kirim-btn">Kirim</button>
                </form>
            </div>
        </section>
    </main>

    <script>
        lucide.createIcons();
    </script>

    <!-- POPUP -->
    <div class="popup-overlay" id="popup-confirm">
        <div class="popup-box">
            <h3 id="popup-message">Are you sure?</h3>

            <div class="popup-buttons">
                <button class="btn-no" id="popup-no">No</button>
                <button class="btn-yes" id="popup-yes">Yes</button>
            </div>
        </div>
    </div>

<script src="{{ asset('js/global.js') }}"></script>
<script src="{{ asset('js/hubungi.js') }}"></script>
</body>
</html>