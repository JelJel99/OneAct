@include('components.navbar')

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bagikan Cerita - {{ $komunitas->nama }}</title>
    @vite(['resources/css/share-story.css', 'resources/js/share-story.js'])
    <script src="https://unpkg.com/lucide@latest"></script>
</head>
<body class="body">
    <div class="breadcrumb">
        <a href="/community">← Komunitas</a> > 
        <a href="/community/{{ $komunitas->id }}">{{ $komunitas->nama }}</a> > 
        <strong>Bagikan Cerita</strong>
    </div>

    <div class="main-content">
        <h1 class="page-title">Bagikan Cerita</h1>
        <div class="page-description">
            <span class="info-icon">ℹ️</span>
            <p>Ceritamu akan kami tinjau dulu sebelum tampil di komunitas dan hasilnya bisa kamu lihat di notifikasi akunmu.</p>
        </div>

        <form action="{{ route('cerita.store', $komunitas->id) }}" method="POST" id="shareStoryForm">
            @csrf
            <div class="form-group">
                <label for="name">Nama</label>
                <input type="text" id="name" name="nama" placeholder="Tulis nama kamu disini..." required>
            </div>

            <div class="form-group">
                <label for="story">Isi Cerita</label>
                <textarea id="story" name="cerita" placeholder="Tulis cerita kamu disini..." required></textarea>
            </div>

            <div class="form-group">
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

            <button type="submit" class="submit-btn">Kirim Cerita</button>
        </form>
    </div>

    <script src="https://unpkg.com/lucide@latest"></script>
</body>
</html>
