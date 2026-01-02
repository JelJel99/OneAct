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