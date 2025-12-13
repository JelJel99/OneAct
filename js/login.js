function clearError() {
    document.getElementById("errorMessage").innerText = "";
}

function validateForm(email, password) {
    const error = document.getElementById("errorMessage");

    if (!email || !password) {
        error.innerText = "Email dan password wajib diisi.";
        return false;
    }

    const emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
    if (!emailRegex.test(email)) {
        error.innerText = "Format email tidak valid.";
        return false;
    }

    if (password.length < 6) {
        error.innerText = "Password minimal 6 karakter.";
        return false;
    }

    error.innerText = "";
    return true;
}

function submitLogin() {
    const email = document.getElementById("loginEmail").value.trim();
    const password = document.getElementById("loginPassword").value.trim();

    if (!validateForm(email, password)) return;

    window.location.href = "home.html";
}