document.addEventListener("DOMContentLoaded", () => {

    // Popup Elements
    const popup = document.getElementById("popup-confirm");
    const popupMessage = document.getElementById("popup-message");
    const yesBtn = document.getElementById("popup-yes");
    const noBtn = document.getElementById("popup-no");

    // Kirim button event
    const kirimBtn = document.getElementById("kirim-btn");
    kirimBtn.addEventListener("click", (e) => {
        e.preventDefault();
        popup.style.display = "flex"; // show popup
    });

    // No button closes popup
    noBtn.addEventListener("click", () => {
        popup.style.display = "none";
    });

    // Yes button → send message + show "Message sent!"
    yesBtn.addEventListener("click", () => {
        // 1. Ambil data dari form
        const form = document.getElementById('contact-form');
        const name = document.getElementById("name").value.trim();
        const email = document.getElementById("email").value.trim();
        const message = document.getElementById("how-can-we-help").value.trim();

        if (!email || !message) {
            popupMessage.innerText = "Email dan pesan wajib diisi.";
            yesBtn.style.display = "none";
            noBtn.textContent = "Tutup";
            popup.style.display = "flex";
            return;
        }

        // 2. Kirim data ke API Laravel
        fetch('/api/contact', {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json',
                'Accept': 'application/json',
                // Opsional: Sertakan token jika user login
                'Authorization': `Bearer ${localStorage.getItem('authToken')}` 
            },
            body: JSON.stringify({ name, email, message }),
        })
        .then(response => response.json())
        .then(result => {
            if (result.success) {
                // Berhasil
                popupMessage.innerHTML = result.message || "Pesan berhasil terkirim!";
            } else {
                // Gagal (Validasi, dll.)
                popupMessage.innerHTML = "Gagal mengirim: " + (result.message || "Terjadi kesalahan.");
            }
            
            yesBtn.style.display = "none";
            noBtn.textContent = "Tutup"; // Ganti tombol No menjadi Tutup
            
            // Logika refresh tetap dipertahankan
            noBtn.addEventListener("click", () => {
                popup.style.display = "none";
                window.location.reload();
            }, { once: true }); // Pastikan event listener tidak diduplikasi
        })
        .catch(error => {
            console.error('Network Error:', error);
            popupMessage.innerHTML = "Error koneksi server. Coba lagi.";
            yesBtn.style.display = "none";
            noBtn.textContent = "Tutup";
        });
    });
});