<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Hubungi Kami - OneAct</title>
    <link rel="stylesheet" href="{{ asset('css/hubungi.css') }}">

    <script src="https://unpkg.com/lucide@latest"></script>
</head>

<body class="body">
    <nav class="navbar">
        <div class="nav-container">
            <div class="nav-left">
                <img src="{{ asset('asset/round_logo.png') }}" alt="OneAct Logo" class="logo">
            </div>

            <div class="nav-menu">
                <a href="{{ url('/') }}" class="nav-link">Beranda</a>
                <a href="{{ url('/donasi') }}" class="nav-link">Donasi</a>
                <a href="{{ url('/relawan') }}" class="nav-link">Relawan</a>
                <a href="{{ url('/komunitas') }}" class="nav-link">Komunitas</a>
                <a href="{{ route('faq') }}" class="nav-link active">FAQs</a> 
            </div>

            <div class="nav-right">
                <button class="icon-btn"><i data-lucide="bell"></i></button>
                <a href="{{ url('/login') }}" class="auth-btn">Masuk</a>
                <span class="auth-separator">/</span> 
                <a href="{{ url('/signup') }}" class="auth-btn">Daftar</a>
                <button class="icon-btn"><i data-lucide="user"></i></button>
            </div>
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

<script src="{{ asset('js/hubungi.js') }}"></script>
</body>
</html>