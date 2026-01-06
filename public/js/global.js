document.addEventListener("DOMContentLoaded", async () => {
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

function formatDate(dateString) {
  const date = new Date(dateString);
  return new Intl.DateTimeFormat('id-ID', { day: 'numeric', month: 'long', year: 'numeric' }).format(date);
}