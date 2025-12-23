document.addEventListener("DOMContentLoaded", () => {
    // ===== NAV ACTIVE =====
    const links = document.querySelectorAll(".nav-link");
    const currentPage = window.location.pathname.split("/").pop();

    links.forEach(link => {
        const href = link.getAttribute("href");

        // exact match
        if (href === currentPage) {
            link.classList.add("active");
        }

        // parent override (organization profile, etc)
        if (
            document.body.dataset.activeNav &&
            link.dataset.page === document.body.dataset.activeNav
        ) {
            link.classList.add("active");
        }
    });

    // ===== MOBILE MENU =====
    const menuBtn = document.getElementById("menu-btn");
    const mobileMenu = document.getElementById("mobile-menu");

    if (menuBtn && mobileMenu) {
        menuBtn.addEventListener("click", () => {
            const isOpen = mobileMenu.classList.toggle("open");

            menuBtn.innerHTML = isOpen
                ? '<i data-lucide="x"></i>'
                : '<i data-lucide="menu"></i>';

            lucide.createIcons();
        });
    }

    // init icons ONCE
    lucide.createIcons();
});
