document.addEventListener("DOMContentLoaded", async () => {
  try {
    const pathParts = window.location.pathname.split('/');
    const organisasiId = pathParts[pathParts.length - 1];

    // 1️⃣ FETCH ORGANISASI
    const orgResponse = await fetch(`/api/organisasi/${organisasiId}`);
    if (!orgResponse.ok) throw new Error('Gagal fetch organisasi');
    const organisasi = await orgResponse.json();

    // 2️⃣ FETCH PROGRAM
    const programsResponse = await fetch(`/api/programs?organisasi_id=${organisasiId}&status=approved`);
    if (!programsResponse.ok) throw new Error('Gagal fetch programs');
    const programs = await programsResponse.json();

    // 3️⃣ FETCH LAPORAN (kalau ada)
    let laporan = [];
    try {
      const laporanResponse = await fetch(`/api/laporan?organisasi_id=${organisasiId}`);
      if (laporanResponse.ok) {
        laporan = await laporanResponse.json();
      }
    } catch (e) {
      console.warn('Laporan tidak tersedia');
    }

    initOrgTabs();

    // 4️⃣ RENDER
    renderProfile(organisasi);
    renderStatistik(organisasi);
    renderVisiMisi(organisasi);
    renderPrograms(programs);
    renderLaporan(laporan);

    if (window.lucide) lucide.createIcons();

  } catch (error) {
    console.error('Error fetching or rendering data:', error);
  }
});


// Render Profile Organisasi
function renderProfile(org) {
  const container = document.getElementById('orgProfileContainer');
  container.innerHTML = `
    <div class="org-avatar">
      <i data-lucide="heart"></i>
    </div>
    <div class="org-info">
      <h1>
        ${org.nama}
        <i data-lucide="badge-check" class="verified"></i>
      </h1>
      <p class="org-tagline">${org.tagline || ''}</p>
      <div class="org-meta">
        <span>${org.kategori || ''}</span>
        <span>• ${org.lokasi || ''}</span>
      </div>
    </div>
  `;

  lucide.createIcons();
}

function initOrgTabs() {
  const tabs = document.querySelectorAll('.org-tabs .tab');
  const contents = document.querySelectorAll('.org-content');

  function activate(tab) {
    const target = tab.dataset.tab;

    tabs.forEach(t => t.classList.remove('active'));
    contents.forEach(c => c.classList.remove('active'));

    tab.classList.add('active');
    document
      .querySelector(`.org-content[data-category="${target}"]`)
      .classList.add('active');
  }

  // click handler
  tabs.forEach(tab => {
    tab.addEventListener('click', () => activate(tab));
  });

  // 🔥 AKTIFKAN TAB DEFAULT TANPA KLIK
  const defaultTab = document.querySelector('.org-tabs .tab.active')
    || document.querySelector('.org-tabs .tab');

  if (defaultTab) activate(defaultTab);
}

// Render Statistik
function renderStatistik(org) {
  const container = document.getElementById('statistikContainer');
  container.innerHTML = `
    <h3>Statistik</h3>
    <div class="stats-grid">
      <div class="stat">
        <span class="stat-number">${org.jumlah_program_donasi}</span>
        <span class="stat-cat">Program Donasi</span>
      </div>
      <div class="stat">
        <span class="stat-number">${org.jumlah_program_relawan}</span>
        <span class="stat-cat">Program Relawan</span>
      </div>
      <div class="stat">
        <span class="stat-number">${org.relawan_aktif}</span>
        <span class="stat-cat">Relawan Aktif</span>
      </div>
      <div class="stat">
        <span class="stat-number">${org.program_aktif}</span>
        <span class="stat-cat">Program Aktif</span>
      </div>
    </div>
  `;
}

// Render Visi & Misi
function renderVisiMisi(org) {
  const container = document.getElementById('visiMisiContainer');
  container.innerHTML = `
    <h3>Visi & Misi</h3>
    <div class="visi-misi-wrapper">
      <div class="visi-left">
        <div class="visi">
          <h4>Visi</h4>
          <p>${org.visi}</p>
        </div>
      </div>
      <div class="misi-right">
        <div class="misi">
          <h4>Misi</h4>
          <p>${org.misi}</p>
        </div>
      </div>
    </div>
  `;
}

// Render Programs (relawan & donasi)
function renderPrograms(programs) {
  const container = document.getElementById('programContainer');
  container.innerHTML = ''; // clear dulu

  programs.forEach(prog => {
    let statusClass = '';
    let statusText = '';

    if (prog.status === 'ongoing' || prog.status === 'approved') {
      statusClass = 'ongoing';
      statusText = 'Sedang Berjalan';
    } else if (prog.status === 'selesai' || prog.status === 'completed') {
      statusClass = 'selesai';
      statusText = 'Selesai';
    } else {
      statusClass = 'pending';
      statusText = 'Pending';
    }

    // Tentukan tag program berdasarkan type
    const tagType = prog.type === 'relawan' ? 'Relawan' : 'Donasi';
    const tagClass = prog.type === 'relawan' ? 'relawan' : 'donasi';

    // Jumlah partisipan atau relawan, contoh dari data
    const metaCount = prog.partisipan || prog.relawan_count || 0;

    // Program card HTML
    const programHTML = `
      <div class="program-card" data-status="${statusClass}" ${prog.laporan ? `data-report="${prog.laporan}"` : ''}>
        <img src="${prog.foto || '/asset/default_program.jpg'}" alt="${prog.judul}">
        <div class="program-content">
          <div class="program-header">
            <span class="tag ${tagClass}">${tagType}</span>
            <span class="status ${statusClass}">${statusText}</span>
          </div>
          <h3>${prog.judul}</h3>
          <p class="date">${prog.tenggat || ''}</p>
          <p class="desc">${prog.deskripsi || ''}</p>
          <p class="meta"><i data-lucide="users" class="meta-icon"></i>${metaCount}</p>
          ${prog.type === 'donasi' ? `
          <div class="fund">
            <div class="fund-text">
              <span>Dana terkumpul</span>
              <strong>Rp ${prog.jumlah_terkumpul?.toLocaleString() || '0'} / Rp ${prog.target?.toLocaleString() || '0'}</strong>
            </div>
            <div class="progress">
              <div class="progress-bar" style="width:${prog.target ? (prog.jumlah_terkumpul / prog.target * 100) : 0}%"></div>
            </div>
            ${prog.laporan ? `<button class="report-btn">Lihat Laporan</button>` : ''}
          </div>` : ''}
        </div>
      </div>
    `;

    container.insertAdjacentHTML('beforeend', programHTML);
  });
}

// Render Laporan Transparansi
function renderLaporan(laporans) {
  const container = document.getElementById('laporanContainer');
  container.innerHTML = ''; // clear dulu

  laporans.forEach(laporan => {
    const statusClass = laporan.dipublikasi ? 'published' : 'draft';
    const statusText = laporan.dipublikasi ? 'Dipublikasi' : 'Belum Dipublikasikan';

    const draftNote = laporan.dipublikasi ? '' : `<p class="draft-note">Laporan sedang dalam pembuatan</p>`;

    const downloadLink = laporan.dipublikasi ? `
      <a href="${laporan.file}" class="btn-download" download>
        <i data-lucide="download"></i> Download
      </a>` : '';

    const reportHTML = `
      <div class="report-card ${statusClass}">
        <div class="report-icon-wrapper">
          <i data-lucide="file-text" class="report-icon"></i>
        </div>
        <div class="report-info">
          <div class="report-tags">
            <span class="tag donasi">Program Donasi</span>
            <span class="status ${statusClass}">${statusText}</span>
          </div>
          <h3>${laporan.judul}</h3>
          <div class="report-meta-grid">
            <div class="meta-item">
              <span>Total Donasi</span>
              <strong>Rp ${laporan.total_donasi?.toLocaleString() || 0}</strong>
            </div>
            <div class="meta-item">
              <span>Dana Tersalurkan</span>
              <strong>Rp ${laporan.dana_tersalurkan?.toLocaleString() || 0}</strong>
            </div>
            <div class="meta-item">
              <span>Penerima Manfaat</span>
              <strong>${laporan.penerima_manfaat || 0} orang</strong>
            </div>
            <div class="meta-item">
              <span>${laporan.dipublikasi ? 'Dipublikasi' : 'Terakhir Diedit'}</span>
              <strong>${laporan.tanggal || ''}</strong>
            </div>
          </div>
          <div class="report-actions-meta">
            <div class="meta-stats">
              <i data-lucide="download" class="meta-stats-icon"></i> ${laporan.download_count || 0}
            </div>
            ${downloadLink}
          </div>
          ${draftNote}
        </div>
      </div>
    `;
    container.insertAdjacentHTML('beforeend', reportHTML);
  });
}