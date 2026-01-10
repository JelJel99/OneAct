@include('components.navbar')

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Usulan Event - {{ $komunitas->nama }}</title>
    @vite(['resources/css/event-proposal.css', 'resources/js/event-proposal.js'])
    <script src="https://unpkg.com/lucide@latest"></script>
</head>
<body class="body">
    <div class="breadcrumb">
        <a href="/community">← Komunitas</a> > 
        <a href="/community/{{ $komunitas->id }}">{{ $komunitas->nama }}</a> > 
        <strong>Usulan Event</strong>
    </div>

    <div class="main-content">
        <h1 class="page-title">Usulan Event Baru</h1>
        <p class="page-subtitle">Ayo bantu komunitas dengan ide kegiatan baru!</p>

        <form action="{{ route('event.store', $komunitas->id) }}" method="POST" id="eventProposalForm">
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

    <script src="https://unpkg.com/lucide@latest"></script>
</body>
</html>
