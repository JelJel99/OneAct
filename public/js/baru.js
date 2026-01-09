document.addEventListener('DOMContentLoaded', async function () {
    try {
        // DASHBOARD
        const dashboardRes = await fetch('/api/org/dashboard', {
            credentials: 'same-origin' // ⬅️ WAJIB
        });
        
        if (!dashboardRes.ok) throw new Error('Dashboard API gagal');
        const dashboard = await dashboardRes.json();
        console.log('DASHBOARD:', dashboard);

        const organisasiId = dashboard.id;

        // APPROVED ONLY
        const programsRes = await fetch(`/api/org/programs?organisasi_id=${organisasiId}`, {
            credentials: 'same-origin' // ⬅️ WAJIB
        });

        if (!programsRes.ok) throw new Error('Program API gagal');
        const program = await programsRes.json();
        console.log('PROGRAM:', program);

        // ALL PROG
        const allRes = await fetch(`/api/org/programs/all?organisasi_id=${organisasiId}`, {
            credentials: 'same-origin'
        });
        if (!allRes.ok) throw new Error('All Program API gagal');
        const allPrograms = await allRes.json();
        console.log('ALL PROGRAMS:', allPrograms);

        // LAPORAN
        const laporanRes = await fetch(`/api/org/laporan?organisasi_id=${organisasiId}`, {
            credentials: 'same-origin'
        });

        if (!laporanRes.ok) throw new Error('Laporan API gagal');

        const laporans = await laporanRes.json();
        console.log('LAPORANS:', laporans);

        initCreateProgramDropdown();
        SubmitDonasiForm();
        submitVolunteerForm();

        // LANGSUNG KIRIM DATA FLAT
        renderWelcome(dashboard);
        renderStatistik(dashboard);
        renderProgramsTabs(program, allPrograms);
        initProgramTabs();
        
        renderLaporan(laporans);
        // unggahLaporanForm();
        // initMainContentDelegation();
        // initLoadMoreReports();
        // initProgramDetailModal();

    } catch (err) {
        console.error(err);
    }
    lucide.createIcons();
});


// --- FUNGSI UTILITY & LOGIC ---

function hideAllModals() {
    const modalDonasi = document.getElementById('modalDonasi');
    const modalVolunteer = document.getElementById('modalVolunteer');
    const modalUnggahLaporan = document.getElementById('modalUnggahLaporan'); // BARU
    const modalProgramDetail = document.getElementById('modalProgramDetail');

    if (modalDonasi) modalDonasi.style.display = 'none';
    if (modalVolunteer) modalVolunteer.style.display = 'none';
    if (modalProgramDetail) modalProgramDetail.style.display = 'none'; 
    if (modalUnggahLaporan) modalUnggahLaporan.style.display = 'none';
}

// Fungsi untuk membuka modal unggah laporan
function openReportModal(programId, programName) {
    const programIdToReportInput = document.getElementById('programIdToReport');
    const reportProgramTitleEl = document.getElementById('reportProgramTitle');
    const modalUnggahLaporan = document.getElementById('modalUnggahLaporan'); // BARU

    hideAllModals();
    if (modalUnggahLaporan) {
        reportProgramTitleEl.textContent = programName;
        programIdToReportInput.value = programId;
        modalUnggahLaporan.style.display = 'block';
    }
}

function renderWelcome(data) {
    const el = document.getElementById('welcomeHeader');
    if (!el) return;

    el.innerHTML = `
        <div class="welcome-text">
            <h1>Selamat Datang, ${data.nama}</h1>
            <p>Kelola program donasi dan volunteer Anda</p>
        </div>
    `;
}

function renderStatistik(data) {
    const c = document.getElementById('statistikContainer');
    if (!c) {
        console.error('statistikContainer TIDAK ADA DI DOM');
        return;
    }

    c.innerHTML = `
        <div class="stat-card stat-active">
            <i class="fas fa-check-circle"></i>
            <h3>Program Aktif</h3>
            <span class="value">${data.program_aktif}</span>
        </div>

        <div class="stat-card stat-volunteer">
            <i class="fas fa-users"></i>
            <h3>Total Volunteer</h3>
            <span class="value">${data.relawan_aktif}</span>
        </div>

        <div class="stat-card stat-donation">
            <i class="fas fa-heart"></i>
            <h3>Program Dalam Pengajuan</h3>
            <span class="value">${data.program_pending}</span>
        </div>
    `;
}

// 5. Logic untuk Tab "Kelola Program"
function initProgramTabs() {
    const tabButtons = document.querySelectorAll('.program-tabs .tab-btn');
    const programContents = document.querySelectorAll('.program-content');

    tabButtons.forEach(btn => {
        btn.addEventListener('click', () => {
            // reset semua tab dan konten
            tabButtons.forEach(b => b.classList.remove('active'));
            programContents.forEach(c => c.style.display = 'none');

            // aktifkan tab yang diklik
            btn.classList.add('active');
            const target = document.getElementById(btn.dataset.tab + 'Programs');
            if (target) target.style.display = 'block';
        });
    });

    // aktifkan tab default (misal tab "allPrograms")
    const allTabBtn = document.querySelector('.program-tabs .tab-btn[data-tab="all"]');
    if (allTabBtn) allTabBtn.click();
}

function renderProgramsTabs(approvedPrograms, allPrograms) {
    // const activeContainer = document.getElementById('activePrograms');
    const allContainer = document.getElementById('allPrograms');
    const reportContainer = document.getElementById('reportPrograms'); // untuk laporan nanti

    // Kosongkan dulu kontainer
    // activeContainer.innerHTML = '';
    allContainer.innerHTML = '';
    reportContainer.innerHTML = '';

    // const aktifPrograms = approvedPrograms.filter(isProgramAktif);
    // console.log('Approved Programs:', approvedPrograms);

    // let countActive = 0;
    let countAll = 0;
    
    // Tab Program Aktif / Approved
    // aktifPrograms.forEach(p => {
    //     activeContainer.insertAdjacentHTML('beforeend', createProgramCard(p));
    //     countActive++;
    // });

    // Tab Semua Program
    allPrograms.forEach(p => {
        allContainer.insertAdjacentHTML('beforeend', createProgramCard(p));
        countAll++;
    });

    // document.getElementById('countActive').textContent = countActive;
    document.getElementById('countAll').textContent = countAll;
}

function createProgramCard(p) {
    const today = new Date();
    let statusText = '';
    let statusClass = '';

    let dbStatusText = '';
    let dbStatusClass = '';

    if (p.status === 'pending') {
        dbStatusText = 'Pending';
        dbStatusClass = 'tag-pending'; // definisikan style di CSS
    } else if (p.status === 'approved') {
        dbStatusText = 'Approved';
        dbStatusClass = 'tag-approved';
    } else if (p.status === 'reject') {
        dbStatusText = 'Rejected';
        dbStatusClass = 'tag-rejected';
    }

    if (p.type === 'relawan') {
        const startDate = p.start_date ? new Date(p.start_date) : today;
        const endDate = p.end_date ? new Date(p.end_date) : today;

        if (today < startDate) {
            statusText = 'Dalam Perekrutan';
            statusClass = 'tag-recruiting';
        } else if (today >= startDate && today <= endDate) {
            statusText = 'Dalam Pelaksanaan';
            statusClass = 'tag-active';
        } else if (today > endDate) {
            statusText = 'Selesai';
            statusClass = 'tag-finished';
        }
    } else if (p.type === 'donasi') {
        const endDate = p.tenggat ? new Date(p.tenggat) : today;

        if (today <= endDate) {
            statusText = 'Dalam Pelaksanaan';
            statusClass = 'tag-active';
        } else {
            statusText = 'Selesai';
            statusClass = 'tag-finished';
        }
    }

    // Tag jenis program: RELAWAN atau DONASI
    const typeLabel = p.type === 'relawan' ? 'Relawan' : 'Donasi';
    const typeClass = p.type === 'relawan' ? 'tag-relawan' : 'tag-donasi';

    return `
    <div class="program-card active-card">
        <div class="program-details">
            <span class="tag ${typeClass}">${typeLabel}</span>
            <span class="tag ${dbStatusClass}">${dbStatusText}</span>
            <span class="tag ${statusClass}">${statusText}</span>
            <h4>${p.judul}</h4>
            <div class="program-stats">
                ${p.type === 'relawan'
                    ? `<span>Berakhir: ${formatDate(p.end_date) || '-'}</span>`
                    : `<span>Terkumpul: Rp ${p.jumlah_terkumpul.toLocaleString()}</span>
                       <span>Berakhir: ${formatDate(p.tenggat) || '-'}</span>`
                }
            </div>
        </div>
    </div>
    `;
}

function formatDate(dateString) {
    const date = new Date(dateString);
    return new Intl.DateTimeFormat('id-ID', { day: 'numeric', month: 'long', year: 'numeric' }).format(date);
}

function isProgramAktif(p) {
    const today = new Date();
    // Reset waktu ke 00:00:00 agar perbandingan hanya tanggal
    today.setHours(0,0,0,0);

    if (p.status !== 'approved') {
        return false;
    }

    if (p.type === 'relawan') {
        if (!p.end_date) return false;
        const endDate = new Date(p.end_date);
        endDate.setHours(0,0,0,0);
        return today <= endDate;  // <= supaya yang berakhir hari ini tetap aktif
    }

    if (p.type === 'donasi') {
        if (!p.tenggat) return false;
        const tenggat = new Date(p.tenggat);
        tenggat.setHours(0,0,0,0);
        return today <= tenggat;
    }

    return false;
}

function renderLaporan(laporans) {
    console.log('renderLaporan dipanggil:', laporans);

    const c = document.getElementById('laporanContainer');
    c.innerHTML = '';

    laporans.forEach(l => {
        c.insertAdjacentHTML('beforeend', `
        <div class="report-item">
            <div class="report-icon-placeholder">📄</div>
            <div class="report-info">
                <span class="tag tag-donation">Donasi</span>
                <span class="tag tag-published">Dipublikasi</span>
                <h4>${l.judul}</h4>
                <div class="report-actions-bottom">
                    <a href="/asset/pdf/${l.file}" target="_blank" class="btn-view">Lihat</a>
                </div>
            </div>
        </div>
        `);
    });
}


// Fungsi untuk membuat elemen laporan dari data
// function createReportItem(report) {
//     // ... (Fungsi ini tetap sama, hanya untuk menambahkan laporan tambahan)
//     if (document.getElementById(`report-item-${report.id}`)) {
//         return null;
//     }

//     const reportItem = document.createElement('div');
//     reportItem.className = 'report-item';
//     reportItem.id = `report-item-${report.id}`;
    
//     const tagType = report.type.toLowerCase();
    
//     let detailsHtml = '';
//     if (report.type === 'Donasi') {
//          detailsHtml = `
//              <span>Total Donasi: <strong>${report.total}</strong></span>
//              <span>Dana Tersalurkan: <strong>${report.salur}</strong></span>
//              <span>Penerima Manfaat: <strong>${report.penerima}</strong></span>
//            `;
//     } else {
//         detailsHtml = `
//             <span>Program Tipe: <strong>Volunteer</strong></span>
//             <span>Peserta: <strong>${report.penerima}</strong></span>
//             <span>Status: <strong>${report.status}</strong></span>
//         `;
//     }
    
//     reportItem.innerHTML = `
//         <div class="report-icon-placeholder"><i class="fas fa-file-pdf"></i></div>
//         <div class="report-info">
//             <span class="tag tag-${tagType}">Program ${report.type}</span>
//             <span class="tag tag-published">${report.status}</span>
//             <p class="program-title-label">${report.program}</p>
//             <h4 class="report-title">${report.judul}</h4>
//             <div class="report-details">
//                 ${detailsHtml}
//                 <span>Dipublikasi: <strong>${report.tanggal}</strong></span>
//             </div>
//             <div class="report-actions-bottom">
//                 <button class="btn-view" data-report-id="${report.id}">Lihat</button>
//                 <button class="btn-download" data-report-id="${report.id}">Download</button>
//             </div>
//         </div>
//     `;
//     return reportItem;
// }

// function displayAllReports() {
//     // ... (Fungsi ini tetap sama)
    // const loadMoreBtn = document.getElementById('loadMoreReports');
//     const listContainer = document.querySelector('.transparency-report');
    
//     allReportsData.forEach((report, index) => {
//         if (index >= initialReportsCount) {
//             const newReportItem = createReportItem(report);
//             if (newReportItem) {
//                 listContainer.insertBefore(newReportItem, loadMoreBtn);
//             }
//         }
//     });

//     if (loadMoreBtn) loadMoreBtn.style.display = 'none';
// }

// function handleViewReport(reportId) {
//     // ... (Fungsi ini tetap sama)
//     const report = allReportsData.find(r => r.id === reportId);
//     if (report) {
//         alert(`--- DETAIL LAPORAN ${report.id} ---\n\nProgram: ${report.program}\nJudul: ${report.judul}\n\n[SIMULASI TAMPILAN PDF]\n\nSebuah dokumen PDF setebal 10 halaman yang berisi detail penuh penggunaan dana/aktivitas, kuitansi, dan foto implementasi program akan dimuat di sini.`);
//     }
// }

// function handleDownloadReport(reportId) {
//     // ... (Fungsi ini tetap sama)
//     const report = allReportsData.find(r => r.id === reportId);
//     if (report) {
//         console.log(`Simulasi download: ${report.judul}.pdf`);
//         alert(`Laporan "${report.judul}" (PDF) berhasil didownload.`);
//     }
// }


// --- EVENT LISTENERS ---
// 1. Dropdown & Modal Buat Program Logic
function initCreateProgramDropdown() {
    const createProgramDropdown = document.getElementById('createProgramDropdown');
    const createProgramBtn = document.getElementById('createProgramBtn');
    const closeBtns = document.querySelectorAll('.modal .close-btn');
    
    const modalDonasi = document.getElementById('modalDonasi');
    const modalVolunteer = document.getElementById('modalVolunteer');
    const modalUnggahLaporan = document.getElementById('modalUnggahLaporan'); // BARU
    
    if (!createProgramBtn || !createProgramDropdown) return;

    createProgramBtn.addEventListener('click', e => {
        e.stopPropagation();
        createProgramDropdown.classList.toggle('show');
    });

    document.addEventListener('mousedown', e => {
        if (
            !createProgramBtn.contains(e.target) &&
            !createProgramDropdown.contains(e.target)
        ) {
            createProgramDropdown.classList.remove('show');
        }
    });

    createProgramDropdown.querySelectorAll('a').forEach(item => {

        item.addEventListener('click', e => {
            e.preventDefault();
            createProgramDropdown.classList.remove('show');

            hideAllModals();

            const text = item.textContent;
            if (text.includes('Donasi') && modalDonasi) {
                modalDonasi.style.display = 'block';
            }

            if (text.includes('Volunteer') && modalVolunteer) {
                modalVolunteer.style.display = 'block';
            }

        });
    });

    closeBtns.forEach(btn => btn.addEventListener('click', hideAllModals));

    window.addEventListener('click', e => {
        if ([modalDonasi, modalVolunteer, modalUnggahLaporan].includes(e.target)) {
            hideAllModals();
        }
    });
}

// 2. Submit Form Donasi (Validasi Foto 10 MB)
const MAX_PHOTO_SIZE_BYTES = 10 * 1024 * 1024; // 10MB contoh
const ALLOWED_PHOTO_MIMES = ['image/jpeg', 'image/png', 'image/jpg'];

function validateFile(fileInput, maxSize, allowedMimes) {
    if (!fileInput.files.length) {
        alert("Mohon pilih file.");
        return false;
    }

    const file = fileInput.files[0];
    const maxSizeMB = maxSize / 1024 / 1024;
    
    if (file.size > maxSize) {
        alert(`Ukuran file melebihi batas maksimum ${maxSizeMB} MB. Ukuran file Anda: ${(file.size / 1024 / 1024).toFixed(2)} MB`);
        return false;
    }

    if (!allowedMimes.includes(file.type)) {
        // Tampilkan tipe file yang diperbolehkan
        const allowedExtensions = allowedMimes.map(m => m.split('/')[1].toUpperCase()).join(', ');
        alert(`Format file tidak didukung. Mohon gunakan ${allowedExtensions}.`);
        return false;
    }

    return true;
}

function SubmitDonasiForm() {
    const fotoDonasiInput = document.getElementById('fotoDonasi');
    const formDonasi = document.getElementById('formDonasi');

    if (!formDonasi || !fotoDonasiInput) return;

    formDonasi.addEventListener('submit', async e => {
        e.preventDefault();

        if (!validateFile(fotoDonasiInput, MAX_PHOTO_SIZE_BYTES, ALLOWED_PHOTO_MIMES)) return;

        const formData = new FormData(formDonasi);

        // Ambil CSRF token dari meta tag
        const token = document.querySelector('meta[name="csrf-token"]').getAttribute('content');

        try {
            const response = await fetch('/org/submit-donasi', {
                method: 'POST',
                headers: {
                    'X-CSRF-TOKEN': token
                },
                body: formData,
                credentials: 'same-origin'
            });

            // if (!response.ok) throw new Error('Gagal submit data donasi');

            if (!response.ok) {
                const text = await response.text();
                console.error('Response not ok:', response.status, text);
                throw new Error('Gagal submit data donasi: ' + response.status);
            }

            const result = await response.json();
            alert(result.message || 'Program Donasi diajukan!');
            hideAllModals();
            formDonasi.reset();

        } catch (error) {
            alert(error.message);
        }
    });
}


// 3. Submit Form Volunteer (Validasi Foto 10 MB)
function submitVolunteerForm() {
    const formVolunteer = document.getElementById('formVolunteer');
    const fotoVolunteerInput = document.getElementById('fotoVolunteer');

    if (!formVolunteer || !fotoVolunteerInput) return;

    formVolunteer.addEventListener('submit', async e => {
        e.preventDefault();

        // 🔒 Validasi foto
        if (!validateFile(
            fotoVolunteerInput,
            MAX_PHOTO_SIZE_BYTES,
            ALLOWED_PHOTO_MIMES
        )) return;

        const formData = new FormData(formVolunteer);

        // 🔐 Ambil CSRF token
        const token = document
            .querySelector('meta[name="csrf-token"]')
            ?.getAttribute('content');

        try {
            const response = await fetch('/org/submit-volunteer', {
                method: 'POST',
                headers: {
                    'X-CSRF-TOKEN': token
                },
                body: formData,
                credentials: 'same-origin'
            });

            if (!response.ok) {
                const text = await response.text();
                console.error('Response not ok:', response.status, text);
                throw new Error('Gagal submit data volunteer: ' + response.status);
            }

            const result = await response.json();
            alert(result.message || 'Program Volunteer berhasil diajukan!');
            hideAllModals();
            formVolunteer.reset();

        } catch (error) {
            alert(error.message);
        }
    });
}

// 4. Submit Form Unggah Laporan (Validasi PDF 50 MB)
function unggahLaporanForm() {
    const formUnggahLaporan = document.getElementById('formUnggahLaporan');
    const fileLaporanInput = document.getElementById('fileLaporan');

    if (!formUnggahLaporan || !fileLaporanInput) return;

    formUnggahLaporan.addEventListener('submit', e => {
        e.preventDefault();

        if (!validateFile(fileLaporanInput, MAX_REPORT_SIZE_BYTES, ALLOWED_REPORT_MIMES)) return;

        console.log(new FormData(formUnggahLaporan));
        hideAllModals();
        formUnggahLaporan.reset();
    });
}

// 6. Event Delegation (Detail Program Aktif & Unggah Laporan)
function initMainContentDelegation() {
    const mainContentContainer = document.querySelector('.main-content'); 
    
    if (!mainContentContainer) return;

    mainContentContainer.addEventListener('click', e => {
        const t = e.target;

        if (t.classList.contains('btn-view-program-detail')) {
            displayProgramDetail(t.dataset.programId);
        }

        if (t.textContent.trim() === 'Unggah Laporan') {
            const card = t.closest('.program-card');
            openReportModal(
                card.dataset.programId,
                card.querySelector('h4').textContent
            );
        }

        if (t.classList.contains('btn-view')) {
            handleViewReport(+t.dataset.reportId);
        }

        if (t.classList.contains('btn-download')) {
            handleDownloadReport(+t.dataset.reportId);
        }
    });
}

// 7. Logic Tombol "Muat Lebih Banyak" Laporan
function initLoadMoreReports() {
    const loadMoreBtn = document.getElementById('loadMoreReports');

    if (!loadMoreBtn) return;

    loadMoreBtn.textContent = "Tampilkan Semua Laporan";

    loadMoreBtn.addEventListener('click', displayAllReports);
}

// 8. Logic untuk menutup Modal Detail Program
function initProgramDetailModal() {
    const detailCloseBtns = document.querySelectorAll('.detail-close-btn');
    const modalProgramDetail = document.getElementById('modalProgramDetail');

    if (!modalProgramDetail) return;

    const closeModal = () => {
        modalProgramDetail.style.display = 'none';
    };

    detailCloseBtns.forEach(btn => {
        btn.addEventListener('click', closeModal);
    });

    window.addEventListener('click', e => {
        if (e.target === modalProgramDetail) {
            closeModal();
        }
    });
}