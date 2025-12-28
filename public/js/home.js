document.addEventListener("DOMContentLoaded", () => {
    initTabs();
    loadHomePrograms();
});

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
    const res = await fetch("/api/home/programs");
    const programs = await res.json();
    console.log(programs);

    // Pisahkan data donasi dan relawan
    const donasi = [];
    const relawan = [];

    programs.forEach(p => {
        if (p.type === "donasi" && p.donasi) {
            donasi.push({
                id: p.id,
                judul: p.judul,
                kategori: p.donasi.kategori || "Umum",  // perbaikan di sini
                tenggat: p.tenggat,
                foto: p.donasi.foto,
                target: p.donasi.target,
                terkumpul: p.donasi.jumlahsaatini,
                donatur: 0,
                deskripsi: p.donasi.deskripsi,
                organisasi: p.organisasi.nama,
            });
        }
        if (p.type === "relawan" && p.relawan) {
            relawan.push({
                id: p.id,
                judul: p.judul,
                kategori: p.relawan.kategori || "Umum",
                tenggat: p.tenggat,
                foto: p.relawan.foto,
                lokasi: p.relawan.lokasi,
                komitmen: p.relawan.komitmen,
                keahlian: p.relawan.keahlian,
                deskripsi: p.relawan.deskripsi,
                organisasi: p.organisasi.nama,
            });
        }
    });

    renderDonasi(donasi);
    renderRelawan(relawan);
}

function renderDonasi(programs) {
    const grid = document.getElementById("donasiGrid");
    grid.innerHTML = "";

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
                <a href="organization_profile.html" class="card-organizer">${p.organisasi}</a>
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
                    <button class="btn-daftar">Donasi</button>
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
                <a href="organization_profile.html" class="card-organizer">${p.organisasi}</a>
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
                    <button class="btn-daftar">Daftar</button>
                    <button class="btn-detail" data-id="${p.id}">Detail</button>
                </div>
            </div>
        </div>
        `;
    });

    bindDetailButtons();
}

function bindDetailButtons() {
    document.querySelectorAll(".btn-detail").forEach(btn => {
        btn.onclick = async () => {
            const id = btn.dataset.id;
            const res = await fetch(`/api/relawan/${id}`);
            const data = await res.json();

            const modal = document.getElementById("detailModal");
            modal.innerHTML = `
                <div class="modal">
                <button class="close">×</button>
                <h1>${data.judul}</h1>
                <p>${data.deskripsi}</p>
                </div>
            `;

            modal.classList.add("show");
            modal.querySelector(".close").onclick = () =>
                modal.classList.remove("show");
        };
    });
}

function bindDetailButtons() {
    document.querySelectorAll(".btn-detail").forEach(btn => {
        btn.onclick = async () => {
            const id = btn.dataset.id;
            const res = await fetch(`/api/relawan/${id}`);
            const data = await res.json();

            const modal = document.getElementById("detailModal");
            modal.innerHTML = `
                <div class="modal">
                    <button class="close">×</button>
                    <h1>${data.judul}</h1>
                    <p>${data.deskripsi}</p>
                </div>
            `;

            modal.classList.add("show");
            modal.querySelector(".close").onclick = () =>
                modal.classList.remove("show");
        };
    });
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