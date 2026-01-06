document.addEventListener("DOMContentLoaded", async() => {
    const user = await getAuthUser();
    console.log("AUTH USER:", user);

    if (user) {
        updateNavbarAuth(user);
        initUserDropdown();
    } else {
        updateNavbarGuest();
    }

    initMobileMenu();
    logoutfn();
    lucide.createIcons();
    
    renderProgramRelawanDetail();

    document.getElementById("daftarBtn").addEventListener("click", () => {
        daftarRelawan();
    });
});

function initMobileMenu() {
    const hamburgerBtn = document.getElementById("hamburgerBtn");
    const mobileMenu = document.getElementById("mobile-menu");

    if (!hamburgerBtn || !mobileMenu) return;

    hamburgerBtn.addEventListener("click", () => {
        const isOpen = mobileMenu.classList.toggle("show");

        // GANTI ICON DENGAN INNERHTML (AMAN)
        hamburgerBtn.innerHTML = `
            <i data-lucide="${isOpen ? "x" : "menu"}"></i>
        `;

        // Render ulang icon HANYA SEKALI DI SINI
        lucide.createIcons();
    });
}

async function getAuthUser() {
    try {
        const res = await fetch('/auth/user', {
            credentials: 'same-origin',
            headers: { 'Accept': 'application/json' }
        });
        if (!res.ok) return null;
        return await res.json();
    } catch {
        return null;
    }
}

function updateNavbarAuth(user) {
    // Sembunyikan auth guest
    document.getElementById("loginBtn")?.classList.add("hidden");
    document.getElementById("registerBtn")?.classList.add("hidden");
    document.getElementById("authSep")?.classList.add("hidden");

    // Tampilkan bell
    const notifBtn = document.getElementById("notifBtn");
    notifBtn?.classList.remove("hidden");

    // Tampilkan user menu
    const userMenu = document.getElementById("userMenu");
    userMenu?.classList.remove("hidden");

    // Set email di dropdown
    const userEmail = document.getElementById("userEmail");
    if (userEmail) {
        userEmail.innerText = user.email;
    }
}

function updateNavbarGuest() {
    // Tampilkan auth guest
    document.getElementById("loginBtn")?.classList.remove("hidden");
    document.getElementById("registerBtn")?.classList.remove("hidden");
    document.getElementById("authSep")?.classList.remove("hidden");

    // Sembunyikan bell & user
    document.getElementById("notifBtn")?.classList.add("hidden");
    document.getElementById("userMenu")?.classList.add("hidden");
}

function initUserDropdown() {
    const userBtn = document.getElementById("userBtn");
    const userMenu = document.getElementById("userMenu");
    const dropdown = userMenu?.querySelector(".user-dropdown");

    userBtn?.addEventListener("click", e => {
        e.stopPropagation();
        dropdown?.classList.toggle("show");
    });

    document.addEventListener("click", e => {
        if (!userMenu?.contains(e.target)) {
            dropdown?.classList.remove("show");
        }
    });
}

function logoutfn() {
    const logoutBtn = document.getElementById("logoutBtn");
    if (!logoutBtn) return;

    logoutBtn.addEventListener("click", async () => {
        await fetch('/logout', {
            method: 'POST',
            credentials: 'include',
            headers: {
                'X-CSRF-TOKEN': document
                    .querySelector('meta[name="csrf-token"]').content
            }
        });
        window.location.href = '/login';
    });
}

function renderProgramRelawanDetail() {
    
    const pathParts = window.location.pathname.split("/");
    // const programId = pathParts[pathParts.length - 1]; 
    const programId = window.location.pathname.split('/').pop();

    fetch(`/api/detail-relawan/${programId}`)
    .then(res => {
        if (!res.ok) throw new Error("Program tidak ditemukan");
        return res.json();
    })
    .then(data => {
        window.programRelawanId = data.id;
        console.log("ProgramRelawanId saat daftar:", window.programRelawanId);
            // Title
            document.getElementById("programTitle").innerText = `Program Relawan: ${data.kategori}`;
            document.getElementById("programTitle2").innerText = data.program.judul;

            // Image
            document.getElementById("programImage").src = data.foto;
            document.getElementById("programImage").alt = `Foto Program ${data.kategori}`;

            // Info
            document.getElementById("programKategori").innerText = data.kategori;
            document.getElementById("programLokasi").innerText = data.lokasi;
            document.getElementById("programKomitmen").innerText = data.komitmen;
            document.getElementById("programKeahlian").innerText = data.keahlian;

            document.getElementById("programDeskripsi").innerText = data.deskripsi;

            // Helper function untuk merender list
            const renderList = (targetId, dataString) => {
                const listContainer = document.getElementById(targetId);
                if (!listContainer) return; // cek dulu kalau elemen ada
                listContainer.innerHTML = ""; // Bersihkan sebelumnya
                if (dataString) {
                    dataString.split('|').forEach(item => {
                        const li = document.createElement("li");
                        li.innerText = item.trim();
                        listContainer.appendChild(li);
                    });
                }
            };

            renderList("listTanggungJawab", data.tanggung_jawab);
            renderList("listPersyaratan", data.persyaratan);
            renderList("listBenefit", data.benefit);

            document.getElementById("infoDurasi").innerText = `${formatDate(data.start_date)} - ${formatDate(data.end_date)}`;
            document.getElementById("infoKuota").innerText = data.kuota;

            cekStatusRelawan();
        })
        .catch(err => {
            alert(err.message);
            console.error(err);
        });
}

function daftarRelawan() {
    fetch('/relawan/daftar', {
        method: 'POST',
        headers: {
            'Content-Type': 'application/json',
            'X-CSRF-TOKEN': document
                .querySelector('meta[name="csrf-token"]').content
        },
        body: JSON.stringify({
            programrelawan_id: window.programRelawanId
        })
    })
    .then(async res => {
        const data = await res.json();

        // ⬇️ JIKA SUDAH TERDAFTAR (409)
        if (res.status === 409) {
            tampilkanAlertSudahTerdaftar();
            return;
        }

        // ⬇️ JIKA BERHASIL DAFTAR BARU
        if (res.ok) {
            tampilkanAlertSudahTerdaftar();
            return;
        }

        // ⬇️ ERROR LAIN
        throw new Error(data.message || "Terjadi kesalahan");
    })
    .catch(err => {
        alert("Gagal mendaftar relawan: " + err.message);
    });
}

function cekStatusRelawan() {
    fetch(`/relawan/cek-status/${window.programRelawanId}`)
    .then(res => res.json())
    .then(data => {
        if (data.terdaftar) {
            tampilkanAlertSudahTerdaftar();
        }
    })
    .catch(err => {
        console.error("Gagal cek status relawan", err);
    });
}

function tampilkanAlertSudahTerdaftar() { 
    const alertBox = document.getElementById("relawanAlert");
    alertBox.classList.remove("hidden");

    const btn = document.getElementById("daftarBtn");
    // Disable tombol dulu
    btn.disabled = true;

    // Sembunyikan tombol dengan CSS (bisa juga btn.style.display = "none";)
    btn.style.display = "none";

    // Jika mau, bisa tampilkan teks pengganti alert di tempat tombol:
    // const info = document.createElement('p');
    // info.innerText = "✔ Sudah Terdaftar";
    // btn.parentNode.appendChild(info);
}

function formatDate(dateString) {
  const date = new Date(dateString);
  return new Intl.DateTimeFormat('id-ID', { day: 'numeric', month: 'long', year: 'numeric' }).format(date);
}