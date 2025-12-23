document.addEventListener('DOMContentLoaded', () => {

    const faqContainer = document.querySelector('.faq-container');

    // --- 1. Event Delegation (Hanya 1 listener untuk semua pertanyaan) ---
    if (faqContainer) {
        faqContainer.addEventListener('click', (event) => {
            const question = event.target.closest('.faq-question');
            if (!question) return;

            const answer = question.nextElementSibling;
            const icon = question.querySelector('.toggle-icon');
            const isActive = answer.classList.contains('active');

            // Tutup semua FAQ lain yang sedang terbuka
            document.querySelectorAll('.faq-answer.active').forEach(openAnswer => {
                if (openAnswer !== answer) {
                    openAnswer.classList.remove('active');
                    openAnswer.previousElementSibling.classList.remove('active');
                    const otherIcon = openAnswer.previousElementSibling.querySelector('.toggle-icon');
                    if (otherIcon) otherIcon.textContent = '+';
                }
            });

            // Toggle FAQ yang diklik
            answer.classList.toggle('active');
            question.classList.toggle('active');
            icon.textContent = answer.classList.contains('active') ? '–' : '+';
        });
    }

    // --- 2. Fungsi untuk Render FAQ dari API ---
    function renderFaqs(faqs) {
        // Grouping berdasarkan kategori
        const groupedFaqs = faqs.reduce((acc, faq) => {
            const category = faq.category || 'Umum';
            if (!acc[category]) acc[category] = [];
            acc[category].push(faq);
            return acc;
        }, {});

        // Bersihkan konten lama di dalam grup (hanya sisakan <h3>)
        document.querySelectorAll('.faq-group').forEach(group => {
            let child = group.lastElementChild;
            while (child && child.tagName !== 'H3') { 
                const prev = child.previousElementSibling;
                child.remove();
                child = prev;
            }
        });

        // Masukkan data baru
        for (const category in groupedFaqs) {
            const idToSearch = category.toLowerCase().replace(/\s/g, '-') + '-faq';
            let groupDiv = document.getElementById(idToSearch);
            
            if (!groupDiv) {
                groupDiv = document.createElement('div');
                groupDiv.className = 'faq-group';
                groupDiv.id = idToSearch;
                groupDiv.innerHTML = `<h3>${category}</h3>`;
                const contactBanner = document.querySelector('.contact-banner');
                faqContainer.insertBefore(groupDiv, contactBanner);
            }

            groupedFaqs[category].forEach(faq => {
                const item = document.createElement('div');
                item.className = 'faq-item';
                item.innerHTML = `
                    <button class="faq-question">
                        <span>${faq.question}</span>
                        <span class="toggle-icon">+</span>
                    </button>
                    <div class="faq-answer">
                        <p>${faq.answer}</p>
                    </div>
                `;
                groupDiv.appendChild(item);
            });
        }

        // PENTING: Jalankan ulang Lucide agar ikon muncul di elemen baru
        if (typeof lucide !== 'undefined') {
            lucide.createIcons();
        }
    }

    // --- 3. Load Data ---
    fetch('/api/faq')
        .then(response => response.json())
        .then(data => {
            if (data.success && data.data) {
                renderFaqs(data.data);
            }
        })
        .catch(err => console.error('Error load FAQ:', err));
});