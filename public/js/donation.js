document.addEventListener("DOMContentLoaded", async () => {
    renderDonasi()

    const user = await getAuthUser();
    if (user) window.authUser = user;
    
    document.addEventListener("click", function (e) {
        const btn = e.target.closest(".donasi-btn");
        if (!btn) return;

        const donationId = btn.dataset.id;
        if (!donationId) return;

        if (!window.authUser) {
            console.error("Anda harus login dulu untuk melakukan donasi!");
            alert("Harap login terlebih dahulu untuk melakukan donasi."); // optional
            return;
        }

        window.location.href = `/donation/${donationId}`;
    });

});

async function renderDonasi() {
    const response = await fetch('/api/donation'); // endpoint API yang return JSON data
    if (!response.ok) throw new Error('Network response was not ok');
    const donations = await response.json();

    const container = document.getElementById('donasiGrid');
    container.innerHTML = '';

    donations.forEach(p => {
        const percent = p.target > 0
            ? Math.min(100, Math.round((p.terkumpul / p.target) * 100))
            : 0;
        const daysLeft = diffDays(p.tenggat);

        container.innerHTML += `
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
                    <button class="donasi-btn" data-id="${p.id}">Donasi</button>
                </div>
            </div>
        </div>
        `;
    });
}

function diffDays(date) {
    return Math.max(
        0,
        Math.ceil((new Date(date) - new Date()) / (1000 * 60 * 60 * 24))
    );
}

// function formatRupiah(num) {
//     return num.toLocaleString("id-ID");
// }
function formatRupiah(num) {
    if (num == null || isNaN(num)) return "0";
    return Number(num).toLocaleString("id-ID");
}
