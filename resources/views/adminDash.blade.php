<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>Admin Dashboard - OneAct</title>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;600;700&display=swap" rel="stylesheet">
    <script src="https://unpkg.com/lucide@latest"></script>
    <link rel="stylesheet" href="{{ asset('css/admin.css') }}">
</head>
<body>

    <div class="dashboard-container">
        
        <aside class="sidebar">
            <div class="logo">OneAct Admin</div>
            <nav class="nav-menu">
                <a href="#overview" class="nav-item active">
                    <i data-lucide="layout-dashboard"></i> Dashboard
                </a>
                <a href="#users" class="nav-item">
                    <i data-lucide="users"></i> Manajemen User
                </a>
                <a href="#programs" class="nav-item">
                    <i data-lucide="gift"></i> Manajemen Program
                </a>
                <!-- <a href="#settings" class="nav-item">
                    <i data-lucide="settings"></i> Pengaturan
                </a> -->
            </nav>
            <button class="logout-btn" id="logoutBtn">
                <i data-lucide="log-out"></i> Logout
            </button>
        </aside>

        <main class="main-content">
            <header class="main-header">
                <h1>Dashboard Statistik</h1>
                <div class="user-profile">
                    <i data-lucide="user-circle"></i> Admin User
                </div>
            </header>

            <section id="overview" class="dashboard-section">
                
                <div class="stats-grid">
                    
                    <div class="stat-card donation-card">
                        <p class="stat-label">Total Donasi</p>
                        <div class="stat-value" id="total-donasi">-</div>
                        <span class="stat-period">Hari Ini</span>
                    </div>

                    <div class="stat-card program-card">
                        <p class="stat-label">Program Aktif</p>
                        <div class="stat-value" id="program-aktif">-</div>
                    </div>

                    <div class="stat-card volunteer-card">
                        <p class="stat-label">Volunteer Aktif</p>
                        <div class="stat-value" id="volunteer-aktif">-</div>
                    </div>

                    <a href="#approval-list" class="stat-card alert-card">
                        <p class="stat-label">Pending Approval (⚠️ Penting)</p>
                        <div class="stat-value alert-value" id="pending-approval">-</div>
                    </a>

                </div>

                <!-- <div class="quick-management">
                    <h2>Aksi Cepat User</h2>
                    <div class="action-grid">
                        <button class="action-btn" onclick="showUserList()">
                            <i data-lucide="users-2"></i> Lihat Daftar User
                        </button>
                        <button class="action-btn" onclick="showUserRoles()">
                            <i data-lucide="shield"></i> Lihat Role (User / Admin)
                        </button>
                        <button class="action-btn action-danger" onclick="suspendUser()">
                            <i data-lucide="user-x"></i> Suspend User Bermasalah
                        </button>
                        <button class="action-btn action-secondary" onclick="resetStatus()">
                            <i data-lucide="rotate-ccw"></i> Reset Status (Opsional)
                        </button>
                    </div>
                </div> -->

            </section>

            <section id="users" class="dashboard-section hidden">
                <h2>Manajemen User</h2>
                <table class="user-table">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Nama</th>
                            <th>Email</th>
                            <th>Role</th>
                            <th>Status</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody id="user-table-body">
                        <!-- diisi JS -->
                    </tbody>
                </table>
            </section>
            <section id="programs" class="dashboard-section hidden">
                <h2>Manajemen Program</h2>

                <table class="user-table">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Nama Program</th>
                            <th>Tipe</th>
                            <th>Organisasi</th>
                            <th>Status</th>
                            <th>Aksi</th>
                            <th>Detail</th>
                        </tr>
                    </thead>
                    <tbody id="program-table-body">
                        <!-- diisi JS -->
                    </tbody>
                </table>
            </section>
        </main>
        
        <!-- Modal Overlay -->
        <div id="program-detail-modal" class="modal hidden">
            <div class="modal-content">
                <span class="close-button" onclick="closeModal(event)">&times;</span>

                <h3 id="modal-title">Detail Program</h3>

                <div id="modal-body"></div>
            </div>
        </div>

    </div>

    <script src="{{ asset('js/admin.js') }}"></script>
    <script>
        lucide.createIcons(); // Menginisialisasi ikon Lucide
    </script>
</body>
</html>