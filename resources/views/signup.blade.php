<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>OneAct - Signup</title>
<link rel="stylesheet" href="{{ asset('css/signup.css') }}">
</head>
<body>

<div class="container">
    <div class="card fade">

        <div class="brand">
            <img src="{{ asset('asset/round_logo.png') }}" class="logo">
            <h2>OneAct</h2>
        </div>

        <h3>Daftar</h3>

        <!-- STEP 1 -->
        <div id="signupStep1" class="form-section fade-in">
            <p class="subtitle">Lengkapi data berikut</p>
            <input type="email" id="signupEmail" placeholder="Email">
            <input type="password" id="signupPassword" placeholder="Password">         
        <!-- STEP 2 --> 
            <input type="text" id="signupName" placeholder="Nama Lengkap">
            <input type="text" id="signupCity" placeholder="Kota">
            <input type="text" id="signupPhone" placeholder="No HP">
            <input type="number" id="signupYear" placeholder="Tahun Lahir">

            <button type="button" class="btn" onclick="finishSignup()">Daftar</button>
            <p class="switch-text">
                Sudah punya akun? <a href="{{ url('/login') }}" class="link">Masuk</a>
            </p>
        </div>

        <p id="errorMessage" class="error-message"></p>
    </div>
</div>

<!-- POPUP -->
<div id="popupSuccess" class="popup hidden">
    <div class="popup-box">
        <h3>Daftar Berhasil!</h3>
        <button type="button" id="okBtn" class="btn">OK</button>
    </div>
</div>

<script src="{{ asset('js/signup.js') }}"></script>
</body>
</html>