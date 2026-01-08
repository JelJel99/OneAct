document.addEventListener("DOMContentLoaded", async () => {
    const loginBtn = document.getElementById('loginBtn');
    const registerBtn = document.getElementById('registerBtn');
    const userMenu = document.getElementById('userMenu');

    const user = await getAuthUser();
    console.log("AUTH USER:", user);

    initTabs();
    loadHomePrograms();

    if (user) {
        loadUserHistory(user.id);
        updateNavbarAuth(user);

        // --- TAMBAHAN LOGIKA DROPDOWN ---
        const userBtn = document.getElementById("userBtn");
        const userMenu = document.getElementById("userMenu");
        const dropdown = userMenu?.querySelector(".dropdown");

        userBtn?.addEventListener("click", e => {
            e.stopPropagation();
            dropdown?.classList.toggle("show");
        });

        document.addEventListener("click", e => {
            if (!userMenu?.contains(e.target)) {
                dropdown?.classList.remove("show");
            }
        });
    } else {
        updateNavbarGuest();
    }

    document.addEventListener("click", e => {
        const btn = e.target.closest(".btn-daftar-relawan");
        if (!btn) return;

        const programRelawanId = btn.dataset.id;

        if (!programRelawanId) {
            console.error("programRelawanId kosong");
            return;
        }

        daftarRelawan(programRelawanId);
    });

    document.addEventListener("click", function (e) {
        const btn = e.target.closest(".btn-daftar");
        if (!btn) return;

        const donationId = btn.dataset.id;
        if (!donationId) return;

        window.location.href = `/donation/${donationId}`;
    });

    initMobileMenu();
    logoutfn();
    lucide.createIcons();
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

function logoutfn() {
    console.log("LOGOUT FN DIPANGGIL");
    const logoutBtn = document.getElementById("logoutBtn");
    if (!logoutBtn) return;
    
    logoutBtn.addEventListener("click", async () => {
        await fetch('/logout', {
            method: 'POST',
            credentials: 'include',
            headers: {
                'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').content
            }
        });

        // window.location.reload();
        window.location.href = '/login';
    });

}

async function getAuthUser() {
    try {
        const res = await fetch('/auth/user', {
            credentials: 'same-origin',
            headers: {
                'Accept': 'application/json'
            }
        });

        if (!res.ok) return null;
        return await res.json();
    } catch (err) {
        console.error(err);
        return null;
    }
}

function initTabs() {
    const tabs = document.querySelectorAll(".tab-outline");
    const wrappers = document.querySelectorAll(".cards-wrapper");

    tabs.forEach(tab => {
        tab.addEventListener("click", () => {
            tabs.forEach(t => t.classList.remove("active"));
            tab.classList.add("active");

            wrappers.forEach(w =>
            w.classList.toggle("active", w.dataset.category === tab.dataset.tab)
            );
        });
    }); 
}

async function loadHomePrograms() {
    const res = await fetch("/api/home/programs", {
        headers: {
            'Accept': 'application/json'
        }
    });
    const programs = await res.json();
    console.log(programs);

    // Pisahkan data donasi dan relawan
    const donasi = [];
    const relawan = [];

    programs.forEach(p => {
        if (p.type === "donasi" && p.donasi) {
            donasi.push({
                donasi_id: p.donasi.id, // ✅ ambil id sebenarnya dari donasi
                program_id: p.id,
                judul: p.judul,
                kategori: p.donasi.kategori || "Umum",  // perbaikan di sini
                tenggat: p.tenggat,
                foto: p.donasi.foto,
                target: p.donasi.target,
                terkumpul: p.donasi.jumlahsaatini,
                donatur: p.donasi.donatur,
                deskripsi: p.donasi.deskripsi,
                organisasi: p.organisasi,
                organisasi_id: p.organisasi_id,
            });
        }
        if (p.type === "relawan" && p.relawan) {
            relawan.push({
                program_id: p.id,           // program
                program_relawan_id: p.relawan.id, // ✅ INI YANG DIPAKAI DAFTAR
                judul: p.judul,
                kategori: p.relawan.kategori || "Umum",
                tenggat: p.tenggat,
                foto: p.relawan.foto,
                lokasi: p.relawan.lokasi,
                komitmen: p.relawan.komitmen,
                keahlian: p.relawan.keahlian,
                deskripsi: p.relawan.deskripsi,
                organisasi: p.organisasi,
                organisasi_id: p.organisasi_id,
            });
        }
        console.log('donasi:', p.donasi);
        console.log('donatur:', p.donasi?.donatur);
    });


    renderDonasi(donasi.slice(0, 3));
    renderRelawan(relawan.slice(0, 3));
}

function renderDonasi(programs) {
    const grid = document.getElementById("donasiGrid");
    if(!grid) return;
    // grid.innerHTML = "";

    programs.forEach(p => {
        const percent = Math.min(100, Math.round((p.terkumpul / p.target) * 100));
        const daysLeft = diffDays(p.tenggat);

        grid.innerHTML += `
        <div class="card">
            <img class="card-img" src="${p.foto}">
            <div class="card-body">
                <div class="card-tags">
                    <span class="tag-red">${p.kategori}</span>
                    <span class="tag-gray">
                        <img src="/asset/time-left.png" alt="time-left">
                        ${daysLeft} hari lagi
                    </span>
                </div>

                <h3 class="card-title">${p.judul}</h3>
                <a href="/organisasi/${p.organisasi_id}" class="card-organizer">${p.organisasi}</a>
                <p class="card-desc">${p.deskripsi}</p>

                <div class="donate-progress">
                    <div class="progress-info">
                        <span>Terkumpul: <strong>Rp ${formatRupiah(p.terkumpul)}</strong></span>
                        <span class="progress-percent">${percent}%</span>
                    </div>

                    <div class="progress-bar">
                        <div class="progress-fill" style="width:${percent}%"></div>
                    </div>

                    <div class="progress-meta">
                        <span>Target: Rp ${formatRupiah(p.target)}</span>
                        <span>${p.donatur} donatur</span>
                    </div>
                </div>

                <div class="card-actions">
                    <button class="btn-daftar" data-id="${p.donasi_id}">Donasi</button>
                </div>
            </div>
        </div>
        `;
    });
}

function renderRelawan(programs) {
    const grid = document.getElementById("relawanGrid");
    grid.innerHTML = "";

    programs.forEach(p => {
        const daysLeft = diffDays(p.tenggat);

        grid.innerHTML += `
        <div class="card">
            <img class="card-img" src="${p.foto}">
            <div class="card-body">
                <div class="card-tags">
                    <span class="tag-red">${p.kategori}</span>
                    <span class="tag-gray">
                        <img src="/asset/time-left.png" alt="time-left">
                        ${daysLeft} hari lagi
                    </span>
                </div>

                <h3 class="card-title">${p.judul}</h3>
                <a href="/organisasi/${p.organisasi_id}" class="card-organizer">${p.organisasi}</a>
                <p class="card-desc">${p.deskripsi}</p>

                <div class="card-info">
                    <div>
                        <span>Lokasi:</span><br> ${p.lokasi}
                    </div>
                    <div>
                        <span>Komitmen Waktu:</span><br> ${p.komitmen}
                    </div>
                    <div class="info-full">
                        <span>Keahlian:</span><br> ${p.keahlian}
                    </div>
                </div>

                <div class="card-actions">
                    <button
                        class="btn-daftar-relawan"
                        data-id="${p.program_relawan_id}">
                        Daftar
                    </button>
                    <button
                        class="btn-detail"
                        data-id="${p.program_id}">
                        Detail
                    </button>
                </div>
            </div>
        </div>
        `;
    });

    programs.forEach(p => {
        cekStatusRelawan(p.program_id);
    });

    bindDetailButtons();
}

function bindDetailButtons() {
    document.querySelectorAll(".btn-detail").forEach(btn => {
        btn.onclick = async () => {
            const id = btn.dataset.id;
            console.log("REL AWAN ID:", id);
            
            const res = await fetch(`/api/detail-relawan/${id}`);
            if (!res.ok) {
                console.error("Gagal load detail relawan");
                return;
            }
            
            const data = await res.json();
            console.log("program ID:", data.program_id);
            console.log("DETAIL RELAWAN:", data);

            const modal = document.getElementById("detailModal");
            if (!modal) return;

            const daysLeft = diffDays(data.program.tenggat);

            console.log("ORGANISASI:", data.organisasi);

            modal.innerHTML = `
            <button class="close">
                <i data-lucide="x"></i>
            </button>

            <div id="detail-modal">
                <div id="modal-main-content">

                    <div class="modal-image-section">
                        <img src="${data.foto}" alt="${data.judul}">
                        <div class="modal-tags">
                            <span class="modal-tag-primary">${data.kategori}</span>
                        </div>
                    </div>

                    <div class="donate-desc">
                        <div class="modal-title-who">
                            <div class="first-line">
                                <h1 class="modal-title">${data.program.judul}</h1>
                                <div class="modal-periode">
                                    <img src="/asset/time-left.png">
                                    <p>${daysLeft} hari lagi</p>
                                </div>
                            </div>

                            <span>Oleh </span>
                            <a href="organization_profile.html" class="modal-organizer">
                                ${data.program.organisasi.nama ?? "undefined"}
                            </a>
                        </div>

                        <div class="modal-key-metrics">
                            <div class="metric">
                                <div class="metric-title">
                                    <i data-lucide="map-pin"></i>
                                    <span>Lokasi</span>
                                </div>
                                <span class="metric-value">${data.lokasi}</span>
                            </div>

                            <div class="metric">
                                <div class="metric-title">
                                    <i data-lucide="calendar"></i>
                                    <span>Periode</span>
                                </div>
                                <span class="metric-value">${formatDate(data.start_date)} - ${formatDate(data.end_date)}</span>
                            </div>

                            <div class="metric">
                                <div class="metric-title">
                                    <i data-lucide="clock"></i>
                                    <span>Komitmen</span>
                                </div>
                                <span class="metric-value">${data.komitmen}</span>
                            </div>
                            
                            <div class="metric">
                                <div class="metric-title">
                                    <i data-lucide="users"></i>
                                    <span>Peserta</span>
                                </div>
                                <span class="metric-value">12/${data.kuota}</span>
                            </div>
                        </div>

                        <div id="modal-details">

                            <section>
                                <h2><i data-lucide="bookmark"></i> Tentang Program</h2>
                                <p>${data.deskripsi}</p>
                            </section>

                            <section>
                                <h2><i data-lucide="check-square"></i> Tanggung Jawab</h2>
                                <ul>${toList(data.tanggung_jawab)}</ul>
                            </section>

                            <section>
                                <h2><i data-lucide="list"></i> Persyaratan</h2>
                                <ul>${toList(data.persyaratan)}</ul>
                            </section>

                            <section>
                                <h2><i data-lucide="heart"></i> Yang Akan Kamu Dapatkan</h2>
                                <ul>${toList(data.benefit)}</ul>
                            </section>

                        </div>
                    </div>
                </div>

                <div class="modal-footer">
                    <button
                        class="btn-daftar-relawan"
                        data-id="${data.id}">
                        Daftar Sekarang
                    </button>
                </div>
            </div>
            `;
            // const container = modal.querySelector(".detail-modal-container");
            modal.classList.add("show");

            cekStatusRelawan(data.program_id);
            // console.log("Cek status relawan untuk program ID:", cekStatusRelawan(data.id));
            // close
            modal.querySelector(".close").onclick = () => {
                modal.classList.remove("show");
                modal.innerHTML = "";
            };

            
            lucide.createIcons();
        };
    });

    // programs.forEach(p => {
    // });
}

async function daftarRelawan(programRelawanId) {
    try {
        const res = await fetch('/relawan/daftar', {
            method: 'POST',
            credentials: 'include',
            headers: {
                'Content-Type': 'application/json',
                'X-CSRF-TOKEN': document
                    .querySelector('meta[name="csrf-token"]').content
            },
            body: JSON.stringify({
                programrelawan_id: programRelawanId
            })
        });

        const data = await res.json();

        if (res.status === 401) {
            window.location.href = "/login";
            return;
        }

        if (!res.ok) {
            alert(data.message || "Gagal daftar relawan");
            return;
        }

        // ✅ hanya jika benar-benar sukses
        kunciTombolDaftar(programRelawanId);

    } catch (err) {
        console.error(err);
        alert("Terjadi kesalahan jaringan");
    }
}

function kunciTombolDaftar(programRelawanId) {
    document
        .querySelectorAll(`.btn-daftar-relawan[data-id="${programRelawanId}"]`)
        .forEach(btn => {
            btn.textContent = "Sudah Terdaftar";
            btn.disabled = true;
            btn.classList.add("btn-disabled");
        });
}

async function cekStatusRelawan(programId) {
    const res = await fetch(`/relawan/cek-status/${programId}`, {
        credentials: "include"
    });

    if (!res.ok) return;

    const data = await res.json();

    if (data.terdaftar) {
        kunciTombolDaftar(data.programrelawan_id);
    }
}

function toList(str) {
  if (!str) return "";
  return str
    .split("|")
    .map(item => `<li>${item.trim()}</li>`)
    .join("");
}

function diffDays(date) {
    return Math.max(
        0,
        Math.ceil((new Date(date) - new Date()) / (1000 * 60 * 60 * 24))
    );
}

function formatRupiah(num) {
    return num.toLocaleString("id-ID");
}

async function loadUserHistory() {
    const res = await fetch("/api/user/history", {
        headers: {
            "X-Requested-With": "XMLHttpRequest"
        },
        credentials: "include"
    });
    const data = await res.json();

    console.log("User history donasi:", data.donasi);
    console.log("User history relawan:", data.relawan);

    renderHistoryDonasi(data.donasi);
    renderHistoryRelawan(data.relawan);
}

function renderHistoryDonasi(list) {
    const container = document.getElementById("donasiHistoryGrid");
    container.innerHTML = "";

    if (!list.length) {
        container.innerHTML = `<p class="empty">Belum ada riwayat donasi.</p>`;
        return;
    }

    list.forEach(d => {
        const donasi = d.donasi;
        const program = donasi.program;

        container.innerHTML += `
        <div class="program-card program-history">
            <div class="program-content">
                <div class="program-header">
                    <span class="tag donasi">Donasi</span>
                    <span class="status ${donasi.status.replace(' ', '-')}">
                        ${capitalize(donasi.status)}
                    </span>
                </div>

                <h4>${program.judul}</h4>
                <p class="desc">${donasi.deskripsi}</p>
                <p class="date">Tenggat: ${formatDate(program.tenggat)}</p>

                <div class="history-meta-grid">
                    <div class="meta-item-history">
                        <span>Dana Terkumpul</span>
                        <strong>Rp ${formatRupiah(donasi.jumlahsaatini)}</strong>
                    </div>
                    <div class="meta-item-history">
                        <span>Target</span>
                        <strong>Rp ${formatRupiah(donasi.target)}</strong>
                    </div>
                    <div class="meta-item-history">
                        <span>Donasi Anda</span>
                        <strong>Rp ${formatRupiah(d.jumlah)}</strong>
                    </div>
                </div>

                ${
                    donasi.laporan
                        ? `<a href="/storage/${donasi.laporan}" class="btn-download available" download>
                            Download Laporan
                          </a>`
                        : `<a class="btn-download disabled">
                            Laporan Belum Tersedia
                          </a>`
                }
            </div>
        </div>
        `;
    });
}

function renderHistoryRelawan(list) {
    const container = document.getElementById("relawanHistoryGrid");
    container.innerHTML = "";

    if (!list.length) {
        container.innerHTML = `<p class="empty">Belum ada riwayat relawan.</p>`;
        return;
    }

    list.forEach(r => {
        const pr = r.program_relawan;
        const program = pr.program;

        container.innerHTML += `
        <div class="program-card program-history">
            <div class="program-content">
                <div class="program-header">
                    <span class="tag relawan">Relawan</span>
                    <span class="status ${r.status.toLowerCase()}">
                        ${r.status}
                    </span>
                </div>

                <h4>${program.judul}</h4>
                <p class="desc">${pr.deskripsi}</p>
                <p class="date">Periode: ${formatDate(pr.start_date)} - ${formatDate(pr.end_date)}</p>

                <div class="history-meta-grid">
                    <div class="meta-item-history">
                        <span>Lokasi</span>
                        <strong>${pr.lokasi}</strong>
                    </div>
                    <div class="meta-item-history">
                        <span>Komitmen</span>
                        <strong>${pr.komitmen}</strong>
                    </div>
                </div>
            </div>
        </div>
        `;
        cekStatusRelawan(program.program_id);
    });
}

function formatDate(dateString) {
  const date = new Date(dateString);
  return new Intl.DateTimeFormat('id-ID', { day: 'numeric', month: 'long', year: 'numeric' }).format(date);
}

function capitalize(text) {
    return text.charAt(0).toUpperCase() + text.slice(1);
}