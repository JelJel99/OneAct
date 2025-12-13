function showError(msg) {
    document.getElementById("errorMessage").innerText = msg;
}

function clearError() {
    document.getElementById("errorMessage").innerText = "";
}

function goToStep2() {
    const email = document.getElementById("signupEmail").value.trim();
    const password = document.getElementById("signupPassword").value.trim();

    if (!email || !password)
        return showError("Email dan password wajib diisi.");

    if (!/^[^\s@]+@[^\s@]+\.[^\s@]+$/.test(email))
        return showError("Format email tidak valid.");

    if (password.length < 6)
        return showError("Password minimal 6 karakter.");

    clearError();

    // transition to step 2
    document.getElementById("signupStep1").classList.add("hidden");
    document.getElementById("signupStep2").classList.remove("hidden");
}

function finishSignup() {
    const fields = [
        "signupUsername",
        "signupCity",
        "signupPhone",
        "signupYear"
    ];

    for (let id of fields) {
        if (!document.getElementById(id).value.trim()) {
            return showError("Semua data wajib diisi.");
        }
    }

    clearError();
    document.getElementById("popupSuccess").classList.remove("hidden");
}

function redirectHome() {
    window.location.href = "home.html";
}