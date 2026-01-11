document.addEventListener("DOMContentLoaded", () => {
    const tabs = document.querySelectorAll(".tab-outline");
    const grids = document.querySelectorAll(".cards-grid");

    document
        .querySelector('.cards-grid[data-category="donasi"]')
        ?.classList.add("active");

    tabs.forEach(tab => {
        tab.addEventListener("click", () => {
            const target = tab.dataset.tab;

            tabs.forEach(t => t.classList.remove("active"));
            tab.classList.add("active");

            grids.forEach(grid => {
                grid.classList.toggle(
                    "active",
                    grid.dataset.category === target
                );
            });
        });
    });
});

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

document.addEventListener("DOMContentLoaded", function() {
    const tabs = document.querySelectorAll(".tab-outline");

    tabs.forEach(tab => {
        tab.addEventListener("click", () => {
            // remove active from all
            tabs.forEach(btn => btn.classList.remove("active"));

            // add active to clicked tab
            tab.classList.add("active");
        });
    });
});

// document.addEventListener("DOMContentLoaded", function() {
//     const tabs = document.querySelectorAll(".tab-outline");

//     tabs.forEach(tab => {
//         tab.addEventListener("click", function() {
//             // Remove active class from all
//             tabs.forEach(t => t.classList.remove("active"));

//             // Add active to the clicked one
//             this.classList.add("active");
//         });
//     });
// });

// CHANGING TAB AND CARD
const tabs = document.querySelectorAll(".tab-outline");
const wrappers = document.querySelectorAll(".cards-wrapper");

// initial state
document
  .querySelector('.cards-wrapper[data-category="donasi"]')
  ?.classList.add("active");

tabs.forEach(tab => {
  tab.addEventListener("click", () => {
    const target = tab.dataset.tab;

    // tab UI
    tabs.forEach(t => t.classList.remove("active"));
    tab.classList.add("active");

    // wrapper visibility
    wrappers.forEach(wrapper => {
      wrapper.classList.toggle(
        "active",
        wrapper.dataset.category === target
      );
    });
  });
});

// DETAIL BUTTON
const detailButtons = document.querySelectorAll(".btn-detail");

detailButtons.forEach(btn => {
    btn.addEventListener("click", () => {
        const card = btn.closest(".card");
        const modalContainer = card.querySelector(".detail-modal-container");

        modalContainer.classList.add("show");

        // close button
        const closeBtn = modalContainer.querySelector(".close");
        closeBtn.onclick = () => {
            modalContainer.classList.remove("show");
        };

        // click outside modal
        modalContainer.onclick = (e) => {
            const modal = modalContainer.querySelector(".detail-modal");
            if (!modal.contains(e.target)) {
                modalContainer.classList.remove("show");
            }
        };
    });
});
