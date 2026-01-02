document.addEventListener("DOMContentLoaded", () => {
    const csrf = document.querySelector('meta[name="csrf-token"]').content;

    /* ===== USERS ===== */
    async function loadUsers() {
        const res = await fetch('/api/admin/users', {
            credentials: 'include'
        });
        const users = await res.json();

        const tbody = document.getElementById("user-table-body");
        tbody.innerHTML = "";

        users.forEach(u => {
            const status = (u.status || '').toLowerCase();

            tbody.innerHTML += `
                <tr>
                    <td>${u.id}</td>
                    <td>${u.name}</td>
                    <td>${u.email}</td>
                    <td>${u.role}</td>
                    <td>
                        ${status === 'active'
                            ? '<span style="color:green">Active</span>'
                            : '<span style="color:red">Inactive</span>'
                        }
                    </td>
                    <td>
                        ${u.role === 'admin'
                            ? '-'
                            : status === 'active'
                                ? `<button onclick="suspendUser(${u.id})">Suspend</button>`
                                : `<button onclick="unsuspendUser(${u.id})">Unsuspend</button>`
                        }
                    </td>
                </tr>
            `;
        });
    }

    window.suspendUser = async (id) => {
        await fetch(`/api/admin/users/${id}/suspend`, {
            method: "POST",
            headers: {
                "X-CSRF-TOKEN": csrf,
                "Accept": "application/json",
                "Content-Type": "application/json"
            },
            credentials: 'include'   // <- di sini harusnya
        });
        loadUsers();
    };

    window.unsuspendUser = async (id) => {
        await fetch(`/api/admin/users/${id}/unsuspend`, {
            method: "POST",
            headers: {
                "X-CSRF-TOKEN": csrf,
                "Accept": "application/json",
                "Content-Type": "application/json"
            },
            credentials: 'include'  // <- juga di sini
        });
        loadUsers();
    };

    /* ===== PROGRAMS ===== */
    async function loadPrograms() {
        const res = await fetch('/api/admin/programs');
        const programs = await res.json();

        console.log(programs); // DEBUG

        const tbody = document.getElementById("program-table-body");
        tbody.innerHTML = "";

        programs.forEach(p => {
            const status = p.status.toLowerCase();

            tbody.innerHTML += `
                <tr>
                    <td>${p.id}</td>
                    <td>${p.name}</td>
                    <td>${p.type}</td>
                    <td>${p.organisasi_nama ?? '-'}</td>
                    <td>${p.status}</td>
                    <td>
                        ${status === 'pending'
                            ? `
                                <button onclick="approveProgram(${p.id})">Approve</button>
                                <button onclick="rejectProgram(${p.id})">Reject</button>
                            `
                            : '-'
                        }
                    </td>
                    <td>
                        <button onclick="showProgramDetail(${p.id}, '${p.type}')">Detail</button>
                    </td>
                </tr>
            `;
        });

        document.getElementById("pending-approval").innerText =
            programs.filter(p => (p.status || '').toLowerCase() === 'pending').length;
    }

    window.showProgramDetail = async function(id, type) {
        
        try {
            const res = await fetch(`/api/admin/programs/${id}/detail`);
            if (!res.ok) throw new Error('Failed to fetch detail');
            const detail = await res.json();
            
            console.log(detail);
            const modalBody = document.getElementById('modal-body');
            const modalTitle = document.getElementById('modal-title');

            modalTitle.innerText =
                type === 'donasi' ? 'Detail Program Donasi' : 'Detail Program Relawan';

            let html = '';

            if (type === 'donasi') {
                html = `
                <div class="donate-desc">
                    <!-- Tags & Title -->
                    <div class="modal-title-who">
                        <div class="first-line">
                            <h1 class="modal-title">${detail.judul}</h1>
                        </div>

                        <p class="modal-organizer">
                            Oleh <a href="#" class="modal-organizer">${detail.organisasi_nama ?? '-'}</a>
                        </p>
                    </div>

                    <!-- Key Metrics -->
                    <div class="modal-key-metrics">

                        <div class="metric">
                            <div class="metric-title">
                                <i data-lucide="map-pin"></i>
                                <span>Lokasi</span>
                            </div>
                            <span class="metric-value">${detail.lokasi ?? '-'}</span>
                        </div>

                        <div class="metric">
                            <div class="metric-title">
                                <i data-lucide="calendar"></i>
                                <span>Tenggat</span>
                            </div>
                            <span class="metric-value">${detail.tenggat ? new Date(detail.tenggat).toLocaleDateString('id-ID', {day: 'numeric', month: 'short', year: 'numeric'}) : '-'}</span>
                        </div>

                        <div class="metric">
                            <div class="metric-title">
                                <i data-lucide="users"></i>
                                <span>Target</span>
                            </div>
                            <span class="metric-value">Rp ${detail.target ? Number(detail.target).toLocaleString('id-ID') : '-'}</span>
                        </div>

                        <p>${detail.deskripsi ?? '-'}</p>

                    </div>
                </div>
                `;
            }
            else if (type === 'relawan') {
            html = `
            <div class="donate-desc">
                <div class="modal-title-who">
                    <div class="first-line">
                        <h1 class="modal-title">${detail.judul}</h1>
                    </div>

                    <p class="modal-organizer">
                        Oleh <a href="#" class="modal-organizer">${detail.organisasi_nama ?? '-'}</a>
                    </p>
                </div>

                <div class="modal-key-metrics">
                    <div class="metric">
                        <div class="metric-title">
                            <i data-lucide="map-pin"></i>
                            <span>Lokasi</span>
                        </div>
                        <span class="metric-value">${detail.lokasi ?? '-'}</span>
                    </div>

                    <div class="metric">
                        <div class="metric-title">
                            <i data-lucide="calendar"></i>
                            <span>Periode</span>
                        </div>
                        <span class="metric-value">
                            ${detail.start_date
                                ? new Date(detail.start_date).toLocaleDateString('id-ID', {
                                    day: 'numeric',
                                    month: 'short',
                                    year: 'numeric'
                                })
                                : '-'}
                            -
                            ${detail.end_date
                                ? new Date(detail.end_date).toLocaleDateString('id-ID', {
                                    day: 'numeric',
                                    month: 'short',
                                    year: 'numeric'
                                })
                                : '-'}
                        </span>
                    </div>

                    <div class="metric">
                        <div class="metric-title">
                            <i data-lucide="clock"></i>
                            <span>Komitmen</span>
                        </div>
                        <span class="metric-value">${detail.komitmen ?? '-'}</span>
                    </div>

                    <div class="metric">
                        <div class="metric-title">
                            <i data-lucide="users"></i>
                            <span>Kuota</span>
                        </div>
                        <span class="metric-value">
                            ${detail.kuota ?? '-'}
                        </span>
                    </div>
                </div>

                <div id="modal-details">
                    <section>
                        <h2><i data-lucide="bookmark"></i> Tentang Program</h2>
                        <p>${detail.deskripsi ?? '-'}</p>
                    </section>

                    <section>
                        <h2><i data-lucide="check-square"></i> Tanggung Jawab</h2>
                        <ul>
                            ${(detail.tanggung_jawab ?? [])
                                .map(item => `<li>${item}</li>`)
                                .join('')}
                        </ul>
                    </section>

                    <section>
                        <h2><i data-lucide="list"></i> Persyaratan</h2>
                        <ul>
                            ${(detail.persyaratan ?? [])
                                .map(item => `<li>${item}</li>`)
                                .join('')}
                        </ul>
                    </section>

                    <section>
                        <h2><i data-lucide="heart"></i> Yang Akan Kamu Dapatkan</h2>
                        <ul>
                            ${(detail.benefit ?? [])
                                .map(item => `<li>${item}</li>`)
                                .join('')}
                        </ul>
                    </section>
                </div>
            </div>
            `;
        }

            modalBody.innerHTML = html;

            document.getElementById('program-detail-modal')
                .classList.remove('hidden');

            // re-render icon lucide
            if (window.lucide) lucide.createIcons();

        } catch (err) {
            console.error(err);
            alert('Gagal mengambil detail program');
        }
    }


    window.closeModal = function (e) {
        if (e) e.stopPropagation();
        document.getElementById('program-detail-modal').classList.add('hidden');
    };

    const modal = document.getElementById('program-detail-modal');

    if (modal) {
        const modalContent = modal.querySelector('.modal-content');

        modal.addEventListener('click', () => {
            modal.classList.add('hidden');
        });

        modalContent.addEventListener('click', (e) => {
            e.stopPropagation();
        });
    }



    window.approveProgram = async (id) => {
        const res = await fetch(`/api/admin/programs/${id}/approve`, { 
            method: "POST", 
            headers: {
                "X-CSRF-TOKEN": csrf,
                "Accept": "application/json"
            }
        });
        const data = await res.json();
        console.log('Approve response:', data);
        loadPrograms();
    };

    window.rejectProgram = async (id) => {
        const res = await fetch(`/api/admin/programs/${id}/reject`, { 
            method: "POST",
            headers: {
                "X-CSRF-TOKEN": csrf,
                "Accept": "application/json"
            }
        });
        const data = await res.json();
        console.log('Reject response:', data);
        loadPrograms();
    };


    /* ===== NAVIGATION ===== */
    document.querySelectorAll(".nav-item").forEach(item => {
        item.addEventListener("click", e => {
            e.preventDefault();

            document.querySelectorAll(".nav-item").forEach(i => i.classList.remove("active"));
            item.classList.add("active");

            document.querySelectorAll(".dashboard-section").forEach(s => s.classList.add("hidden"));
            document.getElementById(item.getAttribute("href").substring(1)).classList.remove("hidden");

            if (item.getAttribute("href") === "#users") loadUsers();
            if (item.getAttribute("href") === "#programs") loadPrograms();
        });
    });

    //loadPrograms(); // default tab

    // ===LOGOUT===
    async function logoutfn() {
        console.log("LOGOUT DIPANGGIL");
        const logoutBtn = document.getElementById("logoutBtn");
        if (!logoutBtn) return;

        logoutBtn.addEventListener("click", async () => {
            try {
                fetch('/logout', {
                    method: 'POST',
                    credentials: 'same-origin', // 🔥 WAJIB
                    headers: {
                        'X-CSRF-TOKEN': document
                            .querySelector('meta[name="csrf-token"]')
                            .content,
                        'Accept': 'application/json'
                    }
                });

                console.log('Logout berhasil2');
                // 🔥 PAKSA PINDAH HALAMAN
                window.location.href = '/login';

            } catch (err) {
                console.error('Logout gagal', err);
            }
        });
    }
    logoutfn();

    async function authFetch(url, options = {}) {
        const res = await fetch(url, {
            credentials: 'include'
            // ...options
        });

        if (res.status === 401 || res.status === 419) {
            // session mati / CSRF invalid
            window.location.href = '/login';
            throw new Error('Session expired');
        }

        return res;
    }

    async function loadStats() {
        try {
            const res = await fetch('/api/admin/stats', {
                credentials: 'include'
            });

            if (!res.ok) throw new Error('Gagal ambil stats');

            const data = await res.json();

            document.getElementById('total-donasi').innerText =
                'Rp ' + Number(data.total_donasi).toLocaleString('id-ID');

            document.getElementById('program-aktif').innerText =
                data.program_aktif;

            document.getElementById('volunteer-aktif').innerText =
                data.pengguna_aktif;

            document.getElementById('pending-approval').innerText =
                data.pending_approval;

        } catch (err) {
            console.error('Load stats error:', err);
        }
    }
    loadStats();

});
