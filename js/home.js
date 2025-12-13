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

document.addEventListener("DOMContentLoaded", function() {
    const tabs = document.querySelectorAll(".tab-outline");

    tabs.forEach(tab => {
        tab.addEventListener("click", function() {
            // Remove active class from all
            tabs.forEach(t => t.classList.remove("active"));

            // Add active to the clicked one
            this.classList.add("active");
        });
    });
});

// CHANGING TAB AND CARD
const tabs = document.querySelectorAll('.tab-outline');
const grids = document.querySelectorAll('.cards-grid');

tabs.forEach(tab => {
    tab.addEventListener('click', () => {
        const category = tab.dataset.tab;

        // active tab UI
        tabs.forEach(t => t.classList.remove('active'));
        tab.classList.add('active');

        // show/hide grids
        grids.forEach(grid => {
            grid.style.display =
                grid.dataset.category === category ? 'grid' : 'none';
        });
    });
});

// DETAIL BUTTON
const open = document.getElementById('btn-detail')
const modal_container = document.getElementById('detail_modal_container')
const close = document.getElementById('close')
const modal = document.getElementById('detail-modal');

open.addEventListener('click', () => {
    modal_container.classList.add('show');
});

close.addEventListener('click', () => {
    modal_container.classList.remove('show');
});

modal_container.addEventListener('click', (e) => {
    if (!modal.contains(e.target)) {
        modal_container.classList.remove('show');
    }
});

// Initialize Lucide icons on page load
// Note: This relies on the lucide CDN link being included in index.html
lucide.createIcons();

// Mobile menu toggle logic
const menuBtn = document.getElementById('menu-btn');
const mobileMenu = document.getElementById('mobile-menu');

/**
 * Toggles the visibility of the mobile menu and changes the hamburger/close icon.
 */
menuBtn.addEventListener('click', () => {
    // Check current display state
    if (mobileMenu.style.display === 'block') {
        mobileMenu.style.display = 'none';
        // Change icon to menu
        menuBtn.innerHTML = '<i data-lucide="menu" class="w-6 h-6"></i>'; 
    } else {
        mobileMenu.style.display = 'block';
        // Change icon to close (x)
        menuBtn.innerHTML = '<i data-lucide="x" class="w-6 h-6"></i>'; 
    }
    // Re-render icons after changing innerHTML content
    lucide.createIcons();
});
