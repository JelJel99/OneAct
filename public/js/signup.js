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
    const csrfTokenMeta = document.querySelector('meta[name="csrf-token"]');
    if (!csrfTokenMeta) {
        showError('CSRF token tidak ditemukan.');
        return;
    }
    
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
            'X-CSRF-TOKEN': document
                    .querySelector('meta[name="csrf-token"]').content,
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
            const popup = document.getElementById("popupSuccess");
            popup.classList.remove("hidden");

            const okBtn = document.getElementById("okBtn");
            if (okBtn) {
                okBtn.onclick = () => {
                    window.location.href = "/home";
                };
            }
        }
    })
    .catch(err => {
        document.getElementById("errorMessage").innerText = err.message;
    });
}