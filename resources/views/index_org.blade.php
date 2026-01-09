<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard OneAct - Yayasan</title>
    <!-- <script src="https://cdn.tailwindcss.com"></script> -->

    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@100..900&display=swap" rel="stylesheet">
    <script src="https://unpkg.com/lucide@latest"></script>
    
    <!-- <link rel="stylesheet" href="{{ asset('css/global.css') }}"> -->
    <link rel="stylesheet" href="{{ asset('css/baru.css') }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
</head>
<body>

    <nav class="navbar">
        <div class="navbar-logo">OneAct</div>
        <div class="navbar-links">
        </div>
        <div class="navbar-actions">
            <div class="create-program-dropdown">
                <button class="btn-create-program" id="createProgramBtn">
                    + Buat Program
                </button>
                <div class="dropdown-content" id="createProgramDropdown">
                    <a href="#"><i class="fas fa-hand-holding-usd"></i> Buat Program Donasi</a>
                    <a href="#"><i class="fas fa-hands-helping"></i> Buat Program Volunteer</a>
                </div>
            </div>
            <a href="#" class="nav-icon"><i class="fas fa-bell"></i></a>
            <a href="#" class="nav-icon"><i class="fas fa-user-circle"></i> Admin</a>
        </div>
    </nav>

    <div class="container">
        <header class="welcome-header" id="welcomeHeader">
            <!-- render welcome header -->
        </header>

        <section class="statistic-summary">
            <h2>Ringkasan Statistik</h2>
            <div class="stats-grid" id="statistikContainer"></div>
        </section>

        <div class="dashboard-body">
            <div class="main-content">

            <section class="manage-program">
                <div class="program-tabs">
                    <button class="tab-btn active" data-tab="all">Semua Program <span class="count" id="countAll">0</span></button>
                    <!-- <button class="tab-btn" data-tab="active">Program Aktif <span class="count" id="countActive">0</span></button> -->
                    <button class="tab-btn" data-tab="report">Laporan <span class="count" id="countReport">0</span></button>
                </div>

                <!-- <div class="program-content" id="activePrograms"></div> -->
                <div class="program-content" id="allPrograms" style="display:none"></div>
                <div class="program-content" id="reportPrograms" style="display:none"></div>

            </section>

            <hr style="margin:40px 0">

            <section class="transparency-section">
                <h2>Laporan Transparansi</h2>
                <div class="transparency-report" id="laporanContainer"></div>
            </section>

            </div>
        </div>
    </div>


    <footer class="footer">
        <div class="footer-content">
            <div class="footer-col">
                <h3>OneAct</h3>
                <p>Platform kolaborasi sosial yang menghubungkan individu, komunitas, dan organisasi untuk bersama-sama mengatasi permasalahan sosial berupa kemiskinan, pendidikan, kesehatan, dan lingkungan. Kami hadir sebagai wadah donasi dan volunteer yang transparan, terstruktur, dan terpercaya.</p>
                <div class="social-links">
                    <a href="#"><i class="fab fa-instagram"></i></a>
                    <a href="#"><i class="fab fa-twitter"></i></a>
                    <a href="#"><i class="fab fa-facebook-f"></i></a>
                    <a href="#"><i class="fab fa-youtube"></i></a>
                    <a href="#"><i class="fab fa-linkedin-in"></i></a>
                </div>
            </div>
            <div class="footer-col">
                <h4>Quick Links</h4>
                <ul>
                    <li><a href="#">Privacy Policy</a></li>
                    <li><a href="#">Terms of Use</a></li>
                    <li><a href="#">Tim Kami</a></li>
                    <li><a href="#">FAQs/Kontak</a></li>
                    <li><a href="#">Karir</a></li>
                    <li><a href="#">Sponsorship</a></li>
                </ul>
            </div>
            <div class="footer-col">
                <h4>Hubungi Kami</h4>
                <div class="contact-item">
                    <i class="fas fa-map-marker-alt"></i> 
                    <div>
                        <strong>Kantor Pusat OneAct</strong>
                        <p>Jalan Letnan Sutopo<br> Serpong - Banten</p>
                    </div>
                </div>
                
                <a href="tel:+62816567824" class="contact-item contact-link">
                    <i class="fas fa-phone"></i> 
                    <div>
                        <strong>Hubungi Kami</strong>
                        <p>+62 81 656 7824</p>
                    </div>
                </a>

                <a href="mailto:oneact@oneact.or.id" class="contact-item contact-link">
                    <i class="fas fa-envelope"></i> 
                    <div>
                        <strong>Email Kami</strong>
                        <p>oneact@oneact.or.id</p>
                    </div>
                </a>
            </div>
        </div>
        <div class="footer-bottom">
            &copy; 2025 OneAct. All rights reserved. Made with ❤️ for a better world
        </div>
    </footer>

    <div id="modalDonasi" class="modal">
        <div class="modal-content">
            <span class="close-btn">&times;</span>
            <h2>Buat Program Donasi Baru</h2>
            <form id="formDonasi">
                <div class="form-group">
                    <label for="namaProgramDonasi">Nama Program</label>
                    <input type="text" id="namaProgramDonasi" required name="namaProgramDonasi">
                </div>
                <div class="form-group">
                    <label for="targetDonasi">Target Donasi (Rp)</label>
                    <input type="number" id="targetDonasi" required min="1000000" name="targetDonasi">
                </div>
                <div class="form-group">
                    <label for="deskripsiDonasi">Deskripsi Singkat</label>
                    <textarea id="deskripsiDonasi" rows="3" required name="deskripsiDonasi"></textarea>
                </div>
                
                <div class="form-group upload-photo-group">
                    <label for="fotoDonasi">Foto Utama Program (Wajib)</label>
                    <input type="file" id="fotoDonasi" accept=".png, .jpg, .jpeg" required name="fotoDonasi"> 
                    <p class="file-info">Format: PNG, JPG, JPEG. Maksimum: 10 MB.</p>
                </div>
                <div class="form-group">
                    <label for="deadlineDonasi">Batas Akhir Penggalangan Dana</label>
                    <input type="date" id="deadlineDonasi" required name="deadlineDonasi">
                </div>
                <div class="form-group">
                    <label for="kategoriDonasi">Kategori</label>
                    <select id="kategoriDonasi" required name="kategoriDonasi">
                        <option value="">Pilih Kategori</option>
                        <option value="Pendidikan">Pendidikan</option>
                        <option value="Kesehatan">Kesehatan</option>
                        <option value="Lingkungan">Lingkungan</option>
                        <option value="Bantuan Bencana">Bantuan Bencana</option>
                    </select>
                </div>
                
                <button type="submit" class="btn-primary">Ajukan Program Donasi</button>
            </form>
        </div>
    </div>

    <div id="modalVolunteer" class="modal">
        <div class="modal-content">
            <span class="close-btn">&times;</span>
            <h2>Buat Program Volunteer Baru</h2>
            <form id="formVolunteer">
                <div class="form-group">
                    <label for="namaProgramVolunteer">Nama Program</label>
                    <input type="text" id="namaProgramVolunteer" required name="namaProgramVolunteer">
                </div>
                <div class="form-group">
                    <label for="jumlahVolunteer">Kebutuhan Volunteer (Orang)</label>
                    <input type="number" id="jumlahVolunteer" required min="1" name="jumlahVolunteer">
                </div>
                <div class="form-group">
                    <label for="lokasiVolunteer">Lokasi Kegiatan</label>
                    <input type="text" id="lokasiVolunteer" required name="lokasiVolunteer">
                </div>
                <div class="form-group">
                    <label for="persyaratanUsia">Usia Minimum Pelamar</label>
                    <input type="number" id="persyaratanUsia" required min="16" name="persyaratanUsia">
                </div>
                
                <div class="form-group upload-photo-group">
                    <label for="fotoVolunteer">Foto Utama Program (Wajib)</label>
                    <input type="file" id="fotoVolunteer" accept=".png, .jpg, .jpeg" required name="fotoVolunteer"> 
                    <p class="file-info">Format: PNG, JPG, JPEG. Maksimum: 10 MB.</p>
                </div>
                <div class="form-group">
                    <label for="deskripsiVolunteer">Deskripsi Tugas & Persyaratan</label>
                    <textarea id="deskripsiVolunteer" rows="3" required name="deskripsiVolunteer"></textarea>
                </div>
                
                <button type="submit" class="btn-primary">Ajukan Program Volunteer</button>
            </form>
        </div>
    </div>
    
    <div id="modalProgramDetail" class="modal">
        <div class="modal-content">
            <span class="close-btn detail-close-btn">&times;</span>
            <h2 id="detailProgramTitle">Detail Program</h2>
            <div id="programDetailContent">
                </div>
            <div class="program-detail-actions">
                <button class="btn-primary" onclick="alert('Simulasi: Mengelola Program ini')">Kelola Program</button>
                <button class="btn-primary btn-cancel detail-close-btn">Tutup</button>
            </div>
        </div>
    </div>

    <div id="modalUnggahLaporan" class="modal">
        <div class="modal-content">
            <span class="close-btn">&times;</span>
            <h2>Unggah Laporan Program Selesai</h2>
            
            <input type="hidden" id="programIdToReport" name="programIdToReport" value="">

            <div class="form-group">
                <label for="reportProgramTitle">Program Yang Dilaporkan:</label>
                <p id="reportProgramTitle" style="font-weight: bold; color: var(--primary-color);">[Nama Program]</p>
            </div>

            <form id="formUnggahLaporan">
                <div class="form-group upload-photo-group">
                    <label for="fileLaporan">Pilih File Laporan (Format PDF, Max 50 MB)</label>
                    <input type="file" id="fileLaporan" accept="application/pdf" required name="fileLaporan"> 
                    <p class="file-info">Format: PDF. Maksimum: 50 MB.</p>
                </div>
                
                <div class="form-group">
                    <label for="judulLaporan">Judul Laporan</label>
                    <input type="text" id="judulLaporan" required placeholder="Contoh: Laporan Penggunaan Dana Pembangunan Sekolah - Final" name="judulLaporan">
                </div>
                
                <button type="submit" class="btn-primary">Unggah dan Publikasikan</button>
            </form>
        </div>
    </div>

    <script src="{{ asset('js/global.js') }}"></script>
    <script src="{{ asset('js/baru.js') }}"></script>
</body>
</html>