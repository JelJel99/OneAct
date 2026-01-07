document.addEventListener("DOMContentLoaded", async () => {
    const donationId = window.location.pathname.split("/").pop();

    const res = await fetch(`/api/donation/${donationId}`);
    const donation = await res.json();

    document.getElementById("donationTitle").innerText = donation.judul;
    document.getElementById("donationId").value = donation.id;

    const form = document.getElementById("donationForm");
    form.action = `/donation/${donation.id}/pay`;

    // CSRF
    // document.getElementById("csrf").value =
    //     document.querySelector('meta[name="csrf-token"]')?.content || "";
});

// ================= NOMINAL =================
const nominalBtns = document.querySelectorAll(".nominal-btn");
const customNominal = document.getElementById("amount");

nominalBtns.forEach(btn => {
    btn.addEventListener("click", () => {
        nominalBtns.forEach(b => b.classList.remove("active"));
        btn.classList.add("active");

        const value = btn.dataset.value;

        realInput.value = value;
        displayInput.value = formatRupiah(value);
    });
});


customNominal.addEventListener("input", () => {
    nominalBtns.forEach(b => b.classList.remove("active"));
});

// ================ FORMAT RUPIAH =================
const displayInput = document.getElementById("amount_display");
const realInput = document.getElementById("amount");

displayInput.addEventListener("input", (e) => {
    const input = e.target;

    // posisi cursor sebelum formatting
    const caretPos = input.selectionStart;

    // hitung jumlah digit sebelum cursor
    const beforeCursor = input.value.slice(0, caretPos).replace(/\D/g, "").length;

    // ambil angka murni
    let raw = input.value.replace(/\D/g, "");

    if (!raw) {
        input.value = "";
        realInput.value = "";
        return;
    }

    // simpan ke hidden input (untuk backend)
    realInput.value = raw;

    // format ribuan
    const formatted = raw.replace(/\B(?=(\d{3})+(?!\d))/g, ".");

    input.value = formatted;

    // hitung posisi cursor baru
    let newCaretPos = 0;
    let digitCount = 0;

    for (let i = 0; i < formatted.length; i++) {
        if (/\d/.test(formatted[i])) digitCount++;
        if (digitCount === beforeCursor) {
            newCaretPos = i + 1;
            break;
        }
    }

    input.setSelectionRange(newCaretPos, newCaretPos);
});


// ================= METODE =================
const paymentTypeInput = document.getElementById("payment_type");
const paymentMethodInput = document.getElementById("payment_method");

document.querySelectorAll(".pay-btn").forEach(btn => {
    btn.addEventListener("click", () => {
        document.querySelectorAll(".pay-btn").forEach(b => b.classList.remove("active"));
        btn.classList.add("active");

        document.querySelectorAll(".pay-info").forEach(p => p.classList.add("hidden"));
        document.getElementById(btn.dataset.target).classList.remove("hidden");

        paymentTypeInput.value = btn.dataset.type; // ewallet / bank
        paymentMethodInput.value = ""; // ✅ reset provider
    });
});

// ================= BANK =================
document.querySelectorAll(".bank-btn").forEach(btn => {
    btn.addEventListener("click", () => {
        document.querySelectorAll(".bank-btn").forEach(b => b.classList.remove("active"));
        btn.classList.add("active");

        const prefix = btn.dataset.bank === "bca" ? "014"
                     : btn.dataset.bank === "bri" ? "002"
                     : "008";

        const va = prefix + Math.floor(1000000000 + Math.random() * 9000000000);
        document.getElementById("va-number").innerText = va;

        // paymentDetailInput.value = `${btn.innerText} - VA ${va}`;
        document.querySelector("#bank .va-box").classList.remove("hidden");

        paymentMethodInput.value = btn.innerText; // BCA / BRI / Mandiri
    });
});

// ================= E-WALLET =================
const dropdown = document.querySelector(".dropdown-pay");
if (dropdown) {
    dropdown.addEventListener("change", () => {
        paymentMethodInput.value = dropdown.value;
    });
}
const ewalletSelect = document.getElementById("ewalletSelect");
const ewalletVaBox = document.getElementById("ewalletVaBox");
const ewalletVaNumber = document.getElementById("ewallet-va-number");

ewalletSelect.addEventListener("change", () => {
    const wallet = ewalletSelect.value;

    if (!wallet) {
        ewalletVaBox.classList.add("hidden");
        return;
    }

    // Prefix VA palsu per e-wallet (simulasi)
    const prefix =
        wallet === "OVO" ? "9901" :
        wallet === "DANA" ? "9902" :
        wallet === "GoPay" ? "9903" :
        "9904";

    const va = prefix + Math.floor(1000000000 + Math.random() * 9000000000);

    ewalletVaNumber.innerText = va;
    // paymentDetailInput.value = `${wallet} - VA ${va}`;

    ewalletVaBox.classList.remove("hidden");

    paymentMethodInput.value = wallet;
});


// ================= SUBMIT =================
// bagian bawah
const donationForm = document.getElementById("donationForm");
const confirmBtn = document.querySelector(".confirm-btn");
const proofInput = document.getElementById("proofInput");

confirmBtn.addEventListener("click", async() => {
    if (!realInput.value || Number(realInput.value) < 1000) {
        alert("Nominal minimal Rp 1.000");
        return;
    }

    if (!paymentTypeInput.value || !paymentMethodInput.value) {
        alert("Lengkapi metode pembayaran");
        return;
    }

    // VALIDASI BUKTI PEMBAYARAN
    if (!proofInput.files || proofInput.files.length === 0) {
        alert("Upload bukti pembayaran terlebih dahulu");
        proofInput.focus();
        return;
    }

    // OPTIONAL: validasi tipe file
    const file = proofInput.files[0];
    if (!file.type.startsWith("image/")) {
        alert("Bukti pembayaran harus berupa gambar");
        proofInput.value = "";
        return;
    }

    // isi ringkasan
    document.getElementById("summary-title").innerText =
        document.getElementById("donationTitle").innerText;

    document.getElementById("summary-amount").innerText =
        Number(realInput.value).toLocaleString("id-ID");

    document.getElementById("summary-method").innerText =
        paymentTypeInput.value;

    document.getElementById("summary-detail").innerText =
        paymentMethodInput.value;

    // tampilkan modal
    document.getElementById("successModal").classList.remove("hidden");

    const formData = new FormData(donationForm);

    const res = await fetch(donationForm.action, {
        method: "POST",
        body: formData,
        headers: {
            "X-CSRF-TOKEN": document.querySelector('meta[name="csrf-token"]').content
        }
    });

    const data = await res.json();

    if (data.success) {
        // tampilkan modal SUKSES
    } else {
        alert("Gagal menyimpan donasi");
    }
});

function goHome() {
    window.location.href = "/donation";
}
