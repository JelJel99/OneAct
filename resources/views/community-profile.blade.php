<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Community Info - {{ $komunitas->nama }}</title>
    <script src="https://unpkg.com/lucide@latest"></script>
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body.body {
            font-family: "Inter", sans-serif;
            color: #1f2937;
            background: #f9fafb;
        }

        /* NAVBAR */
        .navbar {
            background: #800000;
            position: fixed;
            width: 100%;
            z-index: 20;
            box-shadow: 0 2px 4px rgba(0,0,0,0.2);
        }

        .nav-container {
            margin: auto;
            padding: 0 4rem;
            height: 64px;
            display: flex;
            align-items: center;
            justify-content: space-between;
        }

        .nav-left img {
            max-width: 13%;
            height: auto;
            border-radius: 100rem;
        }

        .nav-menu {
            display: flex;
            gap: 1rem;
        }

        .nav-link {
            position: relative;
            color: white;
            font-size: 0.9rem;
            padding: 0.5rem 0.75rem;
            text-decoration: none;
        }

        .nav-link::after {
            content: "";
            position: absolute;
            left: 50%;
            bottom: 0;
            width: 0%;
            height: 1px;
            background-color: white;
            transition: 0.2s ease;
            transform: translateX(-50%);
        }

        .nav-link.active {
            background: #FFE3E3;
            color: #800000;
            border-radius: 10px;
        }

        .nav-link:hover::after {
            width: 50%;
        }

        .nav-right {
            display: flex;
            align-items: center;
            gap: 0.5rem;
        }

        .icon-btn {
            background: none;
            border: none;
            color: white;
            padding: 0.5rem;
            border-radius: 9999px;
            display: flex;
            align-items: center;
            justify-content: center;
            transition: 0.2s;
        }

        .icon-btn:hover {
            background: #660000;
        }

        .auth-separator {
            color: white;
            font-size: 0.9rem;
            margin: 0 -0.25rem;
        }

        .header {
            background: #8B1538;
            color: white;
            padding: 1.5rem 2rem;
            display: flex;
            align-items: center;
            gap: 1rem;
            margin-top: 64px;
        }

        .back-btn {
            background: none;
            border: none;
            color: white;
            font-size: 1.5rem;
            cursor: pointer;
        }

        .header h1 {
            font-size: 1.25rem;
            font-weight: 500;
        }

        .profile-section {
            background: white;
            padding: 3rem 2rem;
            text-align: center;
        }

        .profile-img {
            width: 200px;
            height: 200px;
            border-radius: 50%;
            margin: 0 auto 1.5rem;
            background-color: #f5e6d3;
            overflow: hidden;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 80px;
        }

        .profile-img img {
            width: 100%;
            height: 100%;
            object-fit: cover;
        }

        .community-name {
            font-size: 2rem;
            margin-bottom: 0.5rem;
        }

        .member-count {
            color: #666;
            font-size: 1.1rem;
        }

        .section {
            background: white;
            margin-top: 1rem;
            padding: 1.5rem 2rem;
        }

        .section-title {
            display: flex;
            align-items: center;
            gap: 0.5rem;
            font-size: 1rem;
            color: #666;
            margin-bottom: 1rem;
        }

        .member-list {
            display: flex;
            flex-direction: column;
            gap: 0.75rem;
        }

        .member-item {
            display: flex;
            align-items: center;
            gap: 1rem;
        }

        .member-avatar {
            width: 48px;
            height: 48px;
            border-radius: 50%;
            background: #ddd;
            overflow: hidden;
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .member-avatar img {
            width: 100%;
            height: 100%;
            object-fit: cover;
        }

        .member-info {
            flex: 1;
        }

        .member-name {
            font-weight: 500;
        }

        .view-all {
            text-align: center;
            color: #8b1a1a;
            cursor: pointer;
            margin-top: 1rem;
            font-weight: 600;
        }

        .view-all:hover {
            text-decoration: underline;
        }

        .leave-btn {
            background: none;
            border: none;
            color: #d32f2f;
            padding: 1.5rem 2rem;
            display: flex;
            align-items: center;
            gap: 0.5rem;
            width: 100%;
            cursor: pointer;
            font-size: 1rem;
            font-weight: 600;
            margin-top: 1rem;
        }

        .leave-btn:hover {
            background: #fff5f5;
        }
    </style>
</head>
<body class="body">
    <!-- NAVBAR -->
    <nav class="navbar">
        <div class="nav-container">
            <div class="nav-left">
                <img src="{{ asset('asset/square_OneAct.png') }}" alt="OneAct Logo" class="logo">
            </div>

            <div class="nav-menu">
                <a href="/" class="nav-link">Beranda</a>
                <a href="/donation" class="nav-link">Donasi</a>
                <a href="/relawan" class="nav-link">Relawan</a>
                <a href="/community" class="nav-link active">Komunitas</a>
                <a href="/faq" class="nav-link">FAQs</a>
            </div>

            <div class="nav-right">
                <button class="icon-btn"><i data-lucide="bell"></i></button>
                <span class="auth-separator">/</span>
                <button class="icon-btn"><i data-lucide="user"></i></button>
            </div>
        </div>
    </nav>

    <div class="header">
        <button class="back-btn" onclick="window.location.href='/community/{{ $komunitas->id }}'">←</button>
        <h1>Community Info</h1>
    </div>

    <div class="profile-section">
        <div class="profile-img">{{ $komunitas->kategori[0] ?? '🏠' }}</div>
        <h2 class="community-name">{{ $komunitas->nama }}</h2>
        <p class="member-count">0 Anggota</p>
    </div>

    <div class="section">
        <div class="section-title">
            <span>👥</span>
            <span>Anggota</span>
        </div>
        <div class="member-list">
            <p style="color: #999; text-align: center;">Belum ada anggota yang bergabung.</p>
        </div>
    </div>

    <script src="https://unpkg.com/lucide@latest"></script>
    <script>
        lucide.createIcons();
    </script>
</body>
</html>
