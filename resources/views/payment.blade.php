<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Payment</title>

    <script src="https://unpkg.com/lucide@latest"></script>
    <link rel="stylesheet" href="{{ asset('css/global.css') }}">
    <link rel="stylesheet" href="{{ asset('css/Payment.css') }}">
</head>
<body>

<!-- BACKGROUND -->
<div id="bg" class="page-bg"></div>

<div class="payment-container">
    <div class="payment-box">

        <!-- JUDUL DARI JS -->
        <h2 class="title" id="donationTitle">Judul Donasi</h2>

        <form id="donationForm" method="POST" action="/donation/{{ $donation->id }}/pay" enctype="multipart/form-data">
            <!-- CSRF dari meta -->
            <input type="hidden" name="_token" value="{{ csrf_token() }}">

            <!-- DONATION ID -->
            <!-- <input type="hidden" name="donation_id" id="donationId"> -->

            <!-- NOMINAL -->
            <label class="label">Pilih Nominal</label>
            <div class="nominal-list">
                <button type="button" class="nominal-btn" data-value="50000">50.000</button>
                <button type="button" class="nominal-btn" data-value="100000">100.000</button>
                <button type="button" class="nominal-btn" data-value="250000">250.000</button>
                <button type="button" class="nominal-btn" data-value="500000">500.000</button>
            </div>

            <div class="input-rp">
                <span class="rp-label">Rp</span>
                <input type="text"
                    id="amount_display"
                    class="custom-nominal with-rp"
                    placeholder="Input Nominal Lain"
                    inputmode="numeric">
            </div>

            <input type="hidden" name="amount" id="amount">


            <!-- METODE -->
            <label class="label">Metode Pembayaran</label>
            <div class="pay-method">
                <button type="button" class="pay-btn" data-type="ewallet" data-target="ewallet">E-Wallet</button>
                <button type="button" class="pay-btn" data-type="bank" data-target="bank">Transfer Bank</button>
            </div>

            <input type="hidden" name="payment_type" id="payment_type">
            <input type="hidden" name="payment_method" id="payment_method">

            <!-- E-WALLET -->
            <div id="ewallet" class="pay-info hidden">
                <select class="dropdown-pay" id="ewalletSelect">
                    <option value="">Pilih E-Wallet</option>
                    <option value="OVO">OVO</option>
                    <option value="DANA">DANA</option>
                    <option value="GoPay">GoPay</option>
                    <option value="LinkAja">LinkAja</option>
                </select>

                <div class="va-box hidden" id="ewalletVaBox">
                    <span id="ewallet-va-number"></span>
                    <button type="button" onclick="copyEwalletVA()">Copy</button>
                </div>
            </div>

            <!-- BANK -->
            <div id="bank" class="pay-info hidden">
                <div class="bank-list">
                    <button type="button" class="bank-btn" data-bank="bca">BCA</button>
                    <button type="button" class="bank-btn" data-bank="bri">BRI</button>
                    <button type="button" class="bank-btn" data-bank="mandiri">Mandiri</button>
                </div>

                <div class="va-box hidden">
                    <span id="va-number"></span>
                    <button type="button" onclick="copyVA()">Copy</button>
                </div>
            </div>

            <!-- UPLOAD -->
            <label class="label">Upload Bukti Donasi</label>
            <input
                type="file"
                name="proof"
                id="proofInput"
                accept="image/*"
            >

            <button type="button" class="confirm-btn">Konfirmasi Donasi</button>
        </form>

    </div>
</div>

<!-- SUCCESS MODAL -->
<div id="successModal" class="modal hidden">
    <div class="modal-content">
        <h2>Donasi Berhasil!</h2>

        <div class="donation-summary">
            <p><strong>Program:</strong> <span id="summary-title"></span></p>
            <p><strong>Nominal:</strong> Rp <span id="summary-amount"></span></p>
            <p><strong>Metode:</strong> <span id="summary-method"></span></p>
            <p><strong>Detail:</strong> <span id="summary-detail"></span></p>
            <p><strong>Bukti:</strong> <span id="summary-proof"></span></p>
        </div>

        <div class="modal-actions">
            <button type="button" class="btn-secondary" onclick="goHome()">
                Kembali ke Donasi
            </button>
        </div>
    </div>
</div>

<script src="{{ asset('js/global.js') }}"></script>
<script src="{{ asset('js/Payment.js') }}"></script>

</body>
</html>