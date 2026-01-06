<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>FAQs/Kontak - OneAct</title>
    <script src="https://unpkg.com/lucide@latest"></script> 
    <link rel="stylesheet" href="{{ asset('css/global.css') }}">
    <link rel="stylesheet" href="{{ asset('css/faq.css') }}">
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
            <a href="DonationPage" class="mobile-item">Donasi</a>
            <a href="programrelawan" class="mobile-item">Relawan</a>
            <a href="community" class="mobile-item">Komunitas</a>
            <a href="faq" class="mobile-item">FAQs</a>
            <!-- <hr class="mobile-divider">
            <a id="mobileLogin" href="/login" class="auth-btn">Masuk</a>
            <a id="mobileRegister" href="/signup" class="auth-btn">Daftar</a> -->
        </div>
    </nav>


    <main id="faq-content">

        <section class="faq-container">
            <h2 class="faq-heading">Frequently Asked Questions</h2>
            <p class="faq-subtitle">Berikut pertanyaan yang sering ditanyakan oleh relawan dan pendonor tentang website kami</p>

            <div class="faq-group" id="donasi-faq">
                <h3>Donasi</h3>

                <div class="faq-item">
                    <button class="faq-question">
                        <span>Bagaimana cara saya berdonasi?</span>
                        <span class="toggle-icon">+</span>
                    </button>
                    <div class="faq-answer">
                        <ol>
                            <li>Klik tombol <b>Donasi</b>.</li>
                            <li>Pilih <b>nominal donasi</b> - anda dapat memilih jumlah yang tersedia (Rp10.000, Rp20.000, Rp50.000, atau Rp100.000), atau masukkan nominal lain secara manual.</li>
                            <li>Tentukan <b>frekuensi donasi</b> - pilih apakah ingin berdonasi sekali atau setiap bulan.</li>
                            <li>Pilih <b>metode pembayaran</b> - tersedia beberapa opsi seperti:
                                <ul>
                                    <li>E-Wallet: OVO, GoPay, DANA, LinkAja</li>
                                    <li>Transfer Bank: BRI, BNI, BCA, Mandiri</li>
                                    <li>Kartu: Visa, Mastercard</li>
                                </ul>
                            </li>
                            <li>Klik <b>Donasi Sekarang</b> dan selesaikan pembayaran sesuai metode yang kamu pilih.</li>
                            <li>Setelah donasi berhasil, kamu akan menerima konfirmasi melalui email sebagai bukti dan ucapan terima kasih atas kontribusimu.</li>
                        </ol>
                    </div>
                </div>

                <div class="faq-item">
                    <button class="faq-question">
                        <span>Apakah donasi saya bisa dikurangkan dari pajak?</span>
                        <span class="toggle-icon">+</span>
                    </button>
                    <div class="faq-answer">
                        <p>Informasi mengenai pengurangan pajak tergantung pada peraturan pajak yang berlaku di wilayah Anda dan status organisasi kami. Silakan hubungi tim kami untuk detail lebih lanjut.</p>
                    </div>
                </div>

                <div class="faq-item">
                    <button class="faq-question">
                        <span>Bisakah saya menyumbang barang, bukan uang?</span>
                        <span class="toggle-icon">+</span>
                    </button>
                    <div class="faq-answer">
                        <p>Ya, kami menerima sumbangan barang. Namun, jenis barang yang diterima dapat berbeda-beda tergantung kebutuhan program saat ini. Silakan hubungi kami melalui formulir kontak untuk mengkoordinasikan donasi barang Anda.</p>
                    </div>
                </div>

                <div class="faq-item">
                    <button class="faq-question">
                        <span>Bagaimana cara mendapatkan bukti donasi?</span>
                        <span class="toggle-icon">+</span>
                    </button>
                    <div class="faq-answer">
                        <p>Bukti donasi biasanya dikirimkan secara otomatis ke alamat email yang Anda berikan setelah donasi berhasil. Jika Anda tidak menerimanya, silakan periksa folder spam atau hubungi tim kami.</p>
                    </div>
                </div>

            </div>
            <div class="faq-group" id="relawan-faq">
                <h3>Relawan</h3>

                <div class="faq-item">
                    <button class="faq-question">
                        <span>Bagaimana cara menjadi relawan?</span>
                        <span class="toggle-icon">+</span>
                    </button>
                    <div class="faq-answer">
                        <p>Anda dapat mendaftar menjadi relawan melalui halaman <b>Relawan</b> di menu navigasi kami. Di sana, Anda akan menemukan formulir pendaftaran dan informasi tentang persyaratan dan program relawan yang tersedia.</p>
                    </div>
                </div>

                <div class="faq-item">
                    <button class="faq-question">
                        <span>Apakah ada batasan usia?</span>
                        <span class="toggle-icon">+</span>
                    </button>
                    <div class="faq-answer">
                        <p>Ya, umumnya terdapat batasan usia minimum untuk menjadi relawan. Batasan spesifik mungkin berbeda untuk setiap program. Detail lengkapnya tersedia di halaman pendaftaran relawan.</p>
                    </div>
                </div>

                <div class="faq-item">
                    <button class="faq-question">
                        <span>Apakah saya bisa menjadi relawan secara online?</span>
                        <span class="toggle-icon">+</span>
                    </button>
                    <div class="faq-answer">
                        <p>Ya, kami memiliki beberapa program relawan virtual yang memungkinkan Anda berkontribusi secara online dari lokasi mana pun. Silakan lihat opsi relawan online pada halaman 'Relawan'.</p>
                    </div>
                </div>

            </div>
            </section>
        
        <section class="contact-banner">
            <div class="text-content">
                <h3 class="contact-title">Hubungi Kami</h3>
                <p>Hubungi tim kami untuk mendapatkan jawaban atas pertanyaanmu, menjalin kerja sama, atau membantu mendukung program kami.</p>
                <a href="{{ url('/hubungi') }}" class="hubungi-button">Hubungi</a>
            </div>
            <div class="image-content">
                <img src="{{ asset('asset/image.png') }}" alt="Orang bekerja di komputer">
            </div>
        </section>

    </main>

    <script>
        lucide.createIcons();
    </script>
    <script src="{{ asset('js/global.js') }}"></script>
    <script src="{{ asset('js/faq.js') }}"></script>
</body>
</html>