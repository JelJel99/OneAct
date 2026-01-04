document.addEventListener("DOMContentLoaded", async () => {
    const user = await getAuthUser();
    console.log("AUTH USER:", user);

    if (user) {
        updateNavbarAuth(user);
        initUserDropdown();
    } else {
        updateNavbarGuest();
    }

    logoutfn();
    lucide.createIcons();

    loadRelawanPrograms();
});

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
    document.getElementById("loginBtn")?.classList.add("hidden");
    document.getElementById("registerBtn")?.classList.add("hidden");
    document.getElementById("authSep")?.classList.add("hidden");

    document.getElementById("notifBtn")?.classList.remove("hidden");
    document.getElementById("userMenu")?.classList.remove("hidden");
    document.getElementById("userEmail").innerText = user.email;
}

function updateNavbarGuest() {
    document.getElementById("notifBtn")?.classList.add("hidden");
    document.getElementById("userMenu")?.classList.add("hidden");

    document.getElementById("loginBtn")?.classList.remove("hidden");
    document.getElementById("registerBtn")?.classList.remove("hidden");
    document.getElementById("authSep")?.classList.remove("hidden");
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