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

    async function showProgramDetail(id, type) {
        try {
            const res = await fetch(`/api/admin/programs/${id}/detail`);
            if (!res.ok) throw new Error('Failed to fetch detail');
            const detail = await res.json();

            const modalBody = document.getElementById('modal-body');

            // Buat isi modal berdasarkan tipe program
            let html = `
            <p><strong>ID:</strong> ${detail.id}</p>
            <p><strong>Judul:</strong> ${detail.judul}</p>
            <p><strong>Tipe:</strong> ${detail.type}</p>
            <p><strong>Status:</strong> ${detail.status}</p>
            <p><strong>Organisasi:</strong> ${detail.organisasi_nama ?? '-'}</p>
            `;

            if (type === 'relawan') {
                html += `
                <hr>
                <h4>Detail Relawan</h4>
                <p><strong>Kategori:</strong> ${detail.kategori ?? '-'}</p>
                <p><strong>Tenggat:</strong> ${detail.tenggat ?? '-'}</p>
                <p><strong>Deskripsi:</strong> ${detail.deskripsi ?? '-'}</p>
                <p><strong>Lokasi:</strong> ${detail.lokasi ?? '-'}</p>
                <p><strong>Komitmen:</strong> ${detail.komitmen ?? '-'}</p>
                <p><strong>Keahlian:</strong> ${detail.keahlian ?? '-'}</p>
                <p><strong>Foto:</strong> ${detail.foto ? `<img src="${detail.foto}" alt="Foto" style="max-width:100%">` : '-'}</p>
                `;
            } else if (type === 'donasi') {
                html += `
                <hr>
                <h4>Detail Donasi</h4>
                <p><strong>Deskripsi:</strong> ${detail.deskripsi ?? '-'}</p>
                <p><strong>Target:</strong> Rp ${detail.target?.toLocaleString() ?? '0'}</p>
                <p><strong>Jumlah Saat Ini:</strong> Rp ${detail.jumlahsaatini?.toLocaleString() ?? '0'}</p>
                <p><strong>Foto:</strong> ${detail.foto ? `<img src="${detail.foto}" alt="Foto" style="max-width:100%">` : '-'}</p>
                `;
            }

            modalBody.innerHTML = html;

            // Tampilkan modal
            document.getElementById('program-detail-modal').classList.remove('hidden');

        } catch (error) {
            alert('Gagal mengambil detail program.');
            console.error(error);
        }
    }

    function closeModal() {
        document.getElementById('program-detail-modal').classList.add('hidden');
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
});
