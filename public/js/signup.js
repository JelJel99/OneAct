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
    const data = {
        email: document.getElementById("signupEmail").value.trim(),
        password: document.getElementById("signupPassword").value.trim(),
        name: document.getElementById("signupName").value.trim(),
        kabupatenkotadomisili: document.getElementById("signupCity").value.trim(),
        nohp: document.getElementById("signupPhone").value.trim(),
        tanggallahir: document.getElementById("signupYear").value.trim()
    };

    fetch('/signup', {
        method: 'POST',
        headers: {
            'Content-Type': 'application/json',
            'Accept': 'application/json'
        },
        body: JSON.stringify(data)
    })
    .then(async response => {
        const result = await response.json();
        if (!response.ok) {
            throw new Error(result.message || 'Register gagal');
        }
        return result;
    })
    .then(result => {
        if (result.success) {
            document.getElementById("popupSuccess").classList.remove("hidden");
            window.location.href = "/home";

            // OPTIONAL: redirect otomatis setelah 1.5 detik
            setTimeout(() => {
                redirectHome();
            }, 1500);
        }
    })
    .catch(err => {
        document.getElementById("errorMessage").innerText = err.message;
    });
}