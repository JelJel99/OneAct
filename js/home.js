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