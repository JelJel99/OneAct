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

async function submitLogin() {
    console.log("SUBMIT LOGIN DIPANGGIL");
    const email = document.getElementById('loginEmail').value;
    const password = document.getElementById('loginPassword').value;

    try {
        const res = await fetch('/login', {
            method: 'POST',
            credentials: 'include', // 🔥 ganti ini
            headers: {
                'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').content,
                'Accept': 'application/json',
                'Content-Type': 'application/json'
            },
            body: JSON.stringify({ email, password })
        });

        const data = await res.json();

        if (!res.ok) {
            alert(data.message || 'Login gagal');
            return;
        }

        // 🔥 SATU-SATUNYA REDIRECT
        window.location.href = data.redirect_to;

    } catch (err) {
        console.error(err);
        alert('Terjadi kesalahan');
    }
}