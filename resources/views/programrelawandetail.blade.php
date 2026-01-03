<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Detail Program Relawan</title>

    <!-- Bootstrap + Icons (contoh CDN) -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css" rel="stylesheet">
</head>
<body>

<!-- ================= PAGE HEADER ================= -->
<div class="container-fluid page-header py-5 mb-5 bg-dark text-white">
    <div class="container text-center py-5">
        <h1 class="display-4 mb-4">
            Judul Program Relawan
        </h1>

        <nav aria-label="breadcrumb">
            <ol class="breadcrumb justify-content-center mb-0">
                <li class="breadcrumb-item">
                    <a class="text-white" href="/">Home</a>
                </li>
                <li class="breadcrumb-item">
                    <a class="text-white" href="/programrelawan">Program Relawan</a>
                </li>
                <li class="breadcrumb-item text-primary active">
                    Judul Program Relawan
                </li>
            </ol>
        </nav>
    </div>
</div>

<!-- ================= DETAIL PROGRAM RELAWAN ================= -->
<div class="container-xxl py-5">
    <div class="container">
        <div class="row g-5 align-items-start">

            <!-- FOTO / THUMBNAIL -->
            <div class="col-lg-5 col-md-12">
                <div class="ratio ratio-4x3">
                    <!-- GANTI src SESUAI DATA -->
                    <img
                        src="assets/relawan/contoh.jpg"
                        class="img-fluid rounded shadow object-fit-cover"
                        alt="Judul Program Relawan"
                    >

                    <!-- JIKA TIDAK ADA IMAGE -->
                    <!--
                    <div class="d-flex align-items-center justify-content-center bg-secondary bg-opacity-25 rounded shadow text-white fw-semibold">
                        <div class="text-center">
                            <i class="bi bi-image fs-1 mb-2"></i><br>
                            NO IMAGE
                        </div>
                    </div>
                    -->
                </div>
            </div>

            <!-- INFO PROGRAM -->
            <div class="col-lg-7 col-md-12">
                <h2 class="fw-bold mb-3">Judul Program Relawan</h2>

                <p class="mb-2 text-muted">
                    <i class="bi bi-tags me-2"></i>
                    Kategori: <b>Pendidikan</b>
                </p>

                <p class="mb-2">
                    <i class="bi bi-geo-alt me-2"></i>
                    Lokasi: <b>Jakarta</b>
                </p>

                <p class="mb-2">
                    <i class="bi bi-calendar-event me-2"></i>
                    Tenggat: <b>20 Mar 2026</b>
                </p>

                <p class="mb-2">
                    <i class="bi bi-clock-history me-2"></i>
                    Komitmen Waktu: <b>3 bulan</b>
                </p>

                <p class="mb-2">
                    <i class="bi bi-tools me-2"></i>
                    Keahlian Dibutuhkan: <b>Public Speaking, Teaching</b>
                </p>

                <hr>

                <p class="text-muted">
                    Ini adalah deskripsi program relawan.  
                    Tuliskan penjelasan lengkap mengenai kegiatan, tujuan,
                    dan peran relawan di sini.
                </p>

                <!-- JIKA USER BELUM DAFTAR -->
                <form action="/relawandaftar/1" method="POST" class="mt-3">
                    <button type="submit" class="btn btn-danger btn-lg">
                        <i class="bi bi-person-plus me-2"></i>
                        Daftar Sebagai Relawan
                    </button>
                </form>

                <!-- JIKA SUDAH DAFTAR -->
                <!--
                <div class="alert alert-success mt-4">
                    <i class="bi bi-check-circle me-2"></i>
                    Anda sudah terdaftar sebagai relawan pada program ini.
                </div>
                -->

            </div>

        </div>
    </div>
</div>

</body>
</html>