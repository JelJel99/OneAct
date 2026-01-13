<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>OneAct - Login</title>

        <link rel="stylesheet" href="{{ asset('css/login.css') }}">
    </head>

    <body>

        <div class="container">
            <div class="card fade">

                <div class="brand">
                    <img src="{{ asset('asset/round_logo.png') }}"
                        class="logo"
                        alt="OneAct Logo">
                    <h2>OneAct</h2>
                </div>

                <h3>Masuk</h3>

                <div class="form-section fade-in">
                    <p class="subtitle">Masuk untuk melanjutkan</p>

                    <input type="email" id="loginEmail" placeholder="Email">
                    <input type="password" id="loginPassword" placeholder="Password">

                    <button class="btn" onclick="submitLogin()">Lanjut</button>

                    <p class="switch-text">
                        Tidak memiliki akun?
                        <a href="{{ url('/signup') }}" class="link">Daftar</a>
                    </p>
                </div>

                <p id="errorMessage" class="error-message"></p>

            </div>
        </div>

        <script src="{{ asset('js/login.js') }}"></script>
    </body>
</html>