const ALLOWED_PHOTO_MIMES = ['image/png', 'image/jpeg'];
const MAX_PHOTO_SIZE_BYTES = 10 * 1024 * 1024; // 10MB contoh
const ALLOWED_REPORT_MIMES = ['application/pdf'];
const MAX_REPORT_SIZE_BYTES = 50 * 1024 * 1024;

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

        // LAPORAN
        const laporanRes = await fetch(`/api/org/laporan?organisasi_id=${organisasiId}`, {
            credentials: 'same-origin'
        });

        if (!laporanRes.ok) throw new Error('Laporan API gagal');

        const laporans = await laporanRes.json();
        console.log('LAPORANS:', laporans);

        // const laporanPenRes = await fetch('/api/org/laporan/pending', 
        //     { credentials: 'same-origin' }
        // );
        // const laporansPending = await laporanPenRes.json();

        document.addEventListener('click', function (e) {
            const btn = e.target.closest('.btn-upload-report');
            if (!btn) return;

            const programId = btn.dataset.programId;
            console.log('UPLOAD PROGRAM ID:', programId);
            const programName = btn.dataset.programTitle;

            openReportModal(programId, programName);
        });

        document.addEventListener('click', function (e) {
            const modal = document.getElementById('modalUnggahLaporan');
            const modalContent = modal?.querySelector('.modal-content');

            // klik tombol X
            if (e.target.classList.contains('close-btn')) {
                modal.style.display = 'none';
            }

            // klik area luar modal
            if (e.target === modal) {
                modal.style.display = 'none';
            }
        });



        initCreateProgramDropdown();
        SubmitDonasiForm();
        submitVolunteerForm();

        // LANGSUNG KIRIM DATA FLAT
        renderWelcome(dashboard);
        renderStatistik(dashboard);
        renderProgramsTabs(program, allPrograms);
        initProgramTabs();
        
        renderLaporan(laporans);
        unggahLaporanForm();
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
    const allContainer = document.getElementById('allPrograms');
    const reportContainer = document.getElementById('reportPrograms');

    allContainer.innerHTML = '';
    reportContainer.innerHTML = '';

    let countAll = 0;
    let countReport = 0;

    const today = new Date();
    today.setHours(0,0,0,0);

    allPrograms.forEach(p => {
        allContainer.insertAdjacentHTML('beforeend', createProgramCard(p));
        countAll++;

        // ✅ DONASI + SELESAI + BELUM ADA LAPORAN_FILE
        if (
            p.type === 'donasi' &&
            p.status === 'approved' &&
            !p.laporan &&
            p.tenggat &&
            new Date(p.tenggat) < today
        ) {
            reportContainer.insertAdjacentHTML(
                'beforeend',
                createDonasiReportCard(p)
            );
            countReport++;
        }
    });

    if (countReport === 0) {
        reportContainer.innerHTML = `
            <div class="empty-state">
                <p>Tidak ada program donasi yang memerlukan unggahan laporan.</p>
                <small>Seluruh laporan telah diunggah.</small>
            </div>
        `;
    }

    document.getElementById('countAll').textContent = countAll;
    document.getElementById('countReport').textContent = countReport;

    allContainer.style.display = 'block';
    reportContainer.style.display = 'none';
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

    // HANYA hitung status dinamis kalau status bukan pending dan bukan reject
    if (p.status !== 'pending' && p.status !== 'reject') {
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
    }

    // Tag jenis program: RELAWAN atau DONASI
    const typeLabel = p.type === 'relawan' ? 'Relawan' : 'Donasi';
    const typeClass = p.type === 'relawan' ? 'tag-relawan' : 'tag-donasi';

    // Jika statusText kosong, jangan render span-nya
    const statusTagHTML = statusText
        ? `<span class="tag ${statusClass}">${statusText}</span>`
        : '';

    return `
    <div class="program-card active-card">
        <div class="program-details">
            <span class="tag ${typeClass}">${typeLabel}</span>
            <span class="tag ${dbStatusClass}">${dbStatusText}</span>
            ${statusTagHTML}
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

function renderDonasiReportTab(programs) {
    const container = document.getElementById('reportPrograms');
    container.innerHTML = '';

    const donasiNeedReport = programs.filter(isDonasiReportNeeded);

    if (donasiNeedReport.length === 0) {
        container.innerHTML = `
            <div class="empty-state">
                <p>Tidak ada program donasi yang memerlukan unggahan laporan.</p>
                <small>Seluruh laporan donasi telah diunggah.</small>
            </div>
        `;
        document.getElementById('countReport').textContent = 0;
        return;
    }

    donasiNeedReport.forEach(p => {
        container.insertAdjacentHTML('beforeend', createDonasiReportCard(p));
    });

    document.getElementById('countReport').textContent = donasiNeedReport.length;
}

function createDonasiReportCard(p) {
    return `
    <div class="program-card active-card report-needed-card">
        <div class="program-details">
            <span class="tag tag-report-needed">
                <i class="fas fa-exclamation-triangle"></i>
                Laporan Belum Diunggah
            </span>

            <h4>${p.judul}</h4>

            <div class="program-stats">
                <span>
                    <i class="fas fa-check-double"></i>
                    Status: Selesai
                </span>

                <span>
                    <i class="fas fa-donate"></i>
                    Total Donasi:
                    Rp ${(p.jumlah_terkumpul ?? 0).toLocaleString('id-ID')}
                </span>

                <span>
                    <i class="fas fa-calendar-alt"></i>
                    Program Selesai: ${formatDate(p.tenggat)}
                </span>
            </div>

            <div class="program-actions">
                <button
                    class="btn-primary btn-upload-report"
                    data-program-id="${p.id}"
                    data-program-title="${p.judul}">
                    Unggah Laporan
                </button>
            </div>
        </div>
    </div>
    `;
}

function isDonasiReportNeeded(p) {
    const today = new Date();
    today.setHours(0,0,0,0);

    return (
        p.type === 'donasi' &&
        p.status === 'approved' &&
        !p.laporan &&
        p.tenggat &&
        new Date(p.tenggat) < today
    );
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
    const c = document.getElementById('laporanContainer');
    c.innerHTML = '';

    if (!laporans.length) {
        c.innerHTML = '<p>Belum ada laporan.</p>';
        return;
    }

    laporans.forEach(l => {
        c.insertAdjacentHTML('beforeend', `
        <div class="report-item">
            <div class="report-info">
                <span class="tag tag-donation">Donasi</span>
                <span class="tag tag-published">Dipublikasi</span>
                <h4>${l.judul}</h4>
                <small class="report-date">
                    Diunggah: ${l.tanggal ?? '-'}
                </small>
                <div class="report-actions-bottom">
                    <a href="${l.file}" target="_blank" class="btn-view">Lihat Laporan</a>
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
    const form = document.getElementById('formUnggahLaporan');
    const fileInput = document.getElementById('fileLaporan');
    const donationIdInput = document.getElementById('programIdToReport');

    if (!form || !fileInput || !donationIdInput) return;

    form.addEventListener('submit', async (e) => {
        e.preventDefault();

        if (!validateFile(
            fileInput,
            MAX_REPORT_SIZE_BYTES,
            ALLOWED_REPORT_MIMES
        )) return;

        const programId = donationIdInput.value;
        const formData = new FormData(form);

        const token = document
            .querySelector('meta[name="csrf-token"]')
            .getAttribute('content');

        try {
            const response = await fetch(
                `/api/org/laporan/upload/${programId}`, // ✅ TEMPLATE STRING
                {
                    method: 'POST',
                    headers: {
                        'X-CSRF-TOKEN': token
                    },
                    body: formData,
                    credentials: 'same-origin'
                }
            );

            if (!response.ok) {
                const text = await response.text();
                console.error(text);
                throw new Error('Gagal upload laporan');
            }

            const result = await response.json();
            alert(result.message);

            hideAllModals();
            form.reset();

        } catch (err) {
            alert(err.message);
        }
    });
}


// 2. Submit Form Donasi (Validasi Foto 10 MB)
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