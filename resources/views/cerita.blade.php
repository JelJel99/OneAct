<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bagikan Cerita - One Act</title>
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
            margin-bottom: 1rem;
        }

        .page-description {
            display: flex;
            align-items: flex-start;
            gap: 10px;
            color: #666;
            margin-bottom: 2rem;
            font-size: 0.95rem;
            line-height: 1.5;
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
            min-height: 150px;
        }

        /* Perbaiki layout Peran - label dan options dalam block terpisah */
        .peran-group {
            display: flex;
            flex-direction: column;
            gap: 1rem;
        }

        .peran-group label {
            display: block;
            font-weight: 600;
            color: #333;
            margin: 0;
        }

        .radio-group {
            display: flex;
            gap: 2rem;
            align-items: center;
        }

        .radio-option {
            display: flex;
            align-items: center;
            gap: 10px;
        }

        .radio-option input[type="radio"] {
            accent-color: #8b1a1a;
        }

        .radio-option label {
            margin: 0;
            cursor: pointer;
            font-weight: normal;
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

    <!-- Breadcrumb -->
    <div class="breadcrumb">
        <a onclick="window.location.href='/community/{{ $komunitas->id }}'">← Komunitas > {{ $komunitas->nama }} > <strong>Bagikan Cerita</strong></a>
    </div>

    <!-- Main Content -->
    <div class="main-content">
        <h1 class="page-title">Bagikan Cerita</h1>

        <form action="{{ route('cerita.store', $komunitas->id) }}" method="POST">
            @csrf
            <div class="form-group">
                <label for="name">Nama</label>
                <input type="text" id="name" name="name" placeholder="Tulis nama kamu disini..." required>
            </div>

            <div class="form-group">
                <label for="cerita">Isi Cerita</label>
                <textarea id="cerita" name="cerita" placeholder="Tulis cerita kamu disini..." required></textarea>
            </div>

            <div class="form-group">
                <div class="peran-group">
                    <label>Peran</label>
                    <div class="radio-group">
                        <div class="radio-option">
                            <input type="radio" id="relawan" name="peran" value="relawan" checked>
                            <label for="relawan">Relawan</label>
                        </div>
                        <div class="radio-option">
                            <input type="radio" id="donatur" name="peran" value="donatur">
                            <label for="donatur">Donatur</label>
                        </div>
                    </div>
                </div>
            </div>

            <button type="submit" class="submit-btn">Kirim Cerita</button>
        </form>
    </div>

    <script src="{{ asset('js/home.js') }}"></script>
</body>
</html>
