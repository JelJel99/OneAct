document.addEventListener("DOMContentLoaded", () => {
    loadRelawanPrograms();
});

async function loadRelawanPrograms() {
    try {
        const res = await fetch('/api/programrelawan', {
            headers: { 'Accept': 'application/json' }
        });

        const programs = await res.json();
        console.log("API DATA:", programs);

        const grid = document.getElementById('relawan-list');
        grid.innerHTML = '';

        if (!programs.length) {
            grid.innerHTML = '<p>Tidak ada program relawan.</p>';
            return;
        }

        programs.forEach(p => {
            grid.innerHTML += `
            <div class="col-lg-4 col-md-6">
                <div class="relawan-card">
                    <div class="relawan-card-image">
                        <img src="/${p.relawan?.foto ?? 'asset/default.jpg'}" alt="${p.judul}">
                        <div class="relawan-card-overlay"></div>
                        <div class="relawan-card-content">
                            <h3 class="relawan-card-title">${p.judul}</h3>
                            <p class="relawan-card-description">
                                ${p.relawan?.deskripsi ?? 'Deskripsi belum tersedia'}
                            </p>
                            <a href="/programrelawan/${p.id}" class="relawan-card-button">
                                Lihat Program
                            </a>
                        </div>
                    </div>
                </div>
            </div>`;
        });

    } catch (err) {
        console.error("ERROR LOAD RELAWAN:", err);
    }
}