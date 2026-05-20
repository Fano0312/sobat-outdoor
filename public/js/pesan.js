let currentStep = 1;
let stream = null;
let facingMode = 'environment';
let fotoSudahDiambil = false;

const hargaPaket = { A:180000, B:165000, C:80000, D:50000, E:115000 };
const namaPaket  = {
    A:'Paket Lengkap (A)', B:'Paket Standar (B)',
    C:'Paket Meja Kursi (C)', D:'Paket Kursi (D)', E:'Paket Tenda (E)'
};

function formatRupiah(n) {
    return 'Rp ' + n.toString().replace(/\B(?=(\d{3})+(?!\d))/g, '.');
}

function updateStepIndicator(step) {
    for (let i = 1; i <= 4; i++) {
        const ind = document.getElementById('step-ind-' + i);
        if (!ind) continue;
        ind.classList.remove('active', 'done');
        if (i < step) ind.classList.add('done');
        if (i === step) ind.classList.add('active');
    }
    document.querySelectorAll('.step-line').forEach((line, idx) => {
        idx < step - 1 ? line.classList.add('done') : line.classList.remove('done');
    });
}

function nextStep(step) {
    if (currentStep === 1 && !validasiStep1()) return;
    if (currentStep === 2 && !validasiStep2()) return;
    if (currentStep === 3 && !fotoSudahDiambil) {
        alert('⚠️ Harap foto KTP terlebih dahulu!'); return;
    }
    document.getElementById('step-' + currentStep).classList.add('hidden');
    document.getElementById('step-' + step).classList.remove('hidden');
    currentStep = step;
    updateStepIndicator(step);
    if (step === 4) isiKonfirmasi();
    if (step !== 3 && stream) stopKamera();
    window.scrollTo({ top: 0, behavior: 'smooth' });
}

function prevStep(step) {
    document.getElementById('step-' + currentStep).classList.add('hidden');
    document.getElementById('step-' + step).classList.remove('hidden');
    currentStep = step;
    updateStepIndicator(step);
    if (step !== 3 && stream) stopKamera();
    window.scrollTo({ top: 0, behavior: 'smooth' });
}

function validasiStep1() {
    const nama     = document.querySelector('input[name="nama"]').value.trim();
    const telepon  = document.querySelector('input[name="telepon"]').value.trim();
    const alamat   = document.querySelector('textarea[name="alamat"]').value.trim();
    const tglMulai = document.querySelector('input[name="tgl_mulai"]').value;
    const tglSls   = document.querySelector('input[name="tgl_selesai"]').value;
    const lokasi   = document.querySelector('input[name="lokasi"]').value.trim();
    if (!nama || !telepon || !alamat || !tglMulai || !tglSls || !lokasi) {
        alert('⚠️ Mohon lengkapi semua data diri!'); return false;
    }
    if (new Date(tglSls) < new Date(tglMulai)) {
        alert('⚠️ Tanggal selesai tidak boleh sebelum tanggal mulai!'); return false;
    }
    const selisih = (new Date(tglSls) - new Date(tglMulai)) / 86400000;
    const inputHari = document.getElementById('jumlahHari');
    if (inputHari && selisih >= 1) inputHari.value = selisih;
    return true;
}

function validasiStep2() {
    const paket = document.querySelector('input[name="paket"]:checked');
    const hari  = document.querySelector('input[name="jumlah_hari"]').value;
    if (!paket) { alert('⚠️ Pilih paket terlebih dahulu!'); return false; }
    if (!hari || hari < 1) { alert('⚠️ Jumlah hari minimal 1!'); return false; }
    return true;
}

document.addEventListener('DOMContentLoaded', function () {
    const paketRadios = document.querySelectorAll('input[name="paket"]');
    const hariInput   = document.getElementById('jumlahHari');
    const totalNum    = document.getElementById('totalNum');

    function hitungTotal() {
        const paketChecked = document.querySelector('input[name="paket"]:checked');
        const hari = parseInt(hariInput?.value) || 1;
        if (paketChecked && hargaPaket[paketChecked.value]) {
            totalNum.textContent = formatRupiah(hargaPaket[paketChecked.value] * hari);
        }
    }
    paketRadios.forEach(r => r.addEventListener('change', hitungTotal));
    if (hariInput) hariInput.addEventListener('input', hitungTotal);
});

async function bukaKamera() {
    try {
        stream = await navigator.mediaDevices.getUserMedia({
            video: { facingMode, width: { ideal: 1280 }, height: { ideal: 720 } }
        });
        const video = document.getElementById('videoKTP');
        video.srcObject = stream;
        video.style.display = 'block';
        document.getElementById('btnBukaKamera').classList.add('hidden');
        document.getElementById('btnFoto').classList.remove('hidden');
        document.getElementById('btnGantiKamera').classList.remove('hidden');
    } catch (err) {
        alert('❌ Tidak bisa mengakses kamera.\nPastikan browser diizinkan akses kamera & gunakan HTTPS.');
    }
}

function stopKamera() {
    if (stream) { stream.getTracks().forEach(t => t.stop()); stream = null; }
    const video = document.getElementById('videoKTP');
    if (video) { video.srcObject = null; video.style.display = 'none'; }
}

async function gantiFacing() {
    stopKamera();
    facingMode = facingMode === 'environment' ? 'user' : 'environment';
    await bukaKamera();
}

function ambilFoto() {
    const video  = document.getElementById('videoKTP');
    const canvas = document.getElementById('canvasKTP');
    const ctx    = canvas.getContext('2d');
    canvas.width = video.videoWidth;
    canvas.height = video.videoHeight;
    ctx.drawImage(video, 0, 0, canvas.width, canvas.height);
    const dataURL = canvas.toDataURL('image/jpeg', 0.85);
    document.getElementById('fotoKTPBase64').value = dataURL;
    document.getElementById('hasilFotoImg').src = dataURL;
    document.getElementById('kameraPanel').style.display = 'none';
    document.getElementById('hasilFotoPanel').style.display = 'block';
    document.getElementById('btnLanjutKonfirmasi').disabled = false;
    fotoSudahDiambil = true;
    stopKamera();
}

function ulanFoto() {
    document.getElementById('kameraPanel').style.display = 'block';
    document.getElementById('hasilFotoPanel').style.display = 'none';
    document.getElementById('fotoKTPBase64').value = '';
    document.getElementById('btnLanjutKonfirmasi').disabled = true;
    document.getElementById('btnBukaKamera').classList.remove('hidden');
    document.getElementById('btnFoto').classList.add('hidden');
    document.getElementById('btnGantiKamera').classList.add('hidden');
    fotoSudahDiambil = false;
    bukaKamera();
}

function isiKonfirmasi() {
    const nama    = document.querySelector('input[name="nama"]').value;
    const telepon = document.querySelector('input[name="telepon"]').value;
    const alamat  = document.querySelector('textarea[name="alamat"]').value;
    const tglM    = document.querySelector('input[name="tgl_mulai"]').value;
    const tglS    = document.querySelector('input[name="tgl_selesai"]').value;
    const lokasi  = document.querySelector('input[name="lokasi"]').value;
    const paket   = document.querySelector('input[name="paket"]:checked')?.value;
    const hari    = document.querySelector('input[name="jumlah_hari"]').value;
    const total   = hargaPaket[paket] * parseInt(hari);
    const foto    = document.getElementById('fotoKTPBase64').value;

    document.getElementById('konfirmasiBox').innerHTML = `
        <table>
            <tr><td>Nama</td><td>${nama}</td></tr>
            <tr><td>Telepon</td><td>${telepon}</td></tr>
            <tr><td>Alamat</td><td>${alamat}</td></tr>
            <tr><td>Tgl Mulai</td><td>${tglM}</td></tr>
            <tr><td>Tgl Selesai</td><td>${tglS}</td></tr>
            <tr><td>Lokasi</td><td>${lokasi}</td></tr>
            <tr><td>Paket</td><td>${namaPaket[paket]}</td></tr>
            <tr><td>Jumlah Hari</td><td>${hari} hari</td></tr>
            <tr><td>Harga/Hari</td><td>${formatRupiah(hargaPaket[paket])}</td></tr>
            <tr><td><strong>Total</strong></td><td><strong style="color:#e8a020;font-size:18px">${formatRupiah(total)}</strong></td></tr>
        </table>
        <div style="margin-top:16px">
            <p style="font-weight:700;color:#1a3a1a;margin-bottom:8px;font-size:13px">📷 Foto KTP:</p>
            <img src="${foto}" style="width:100%;border-radius:8px;border:2px solid #e8a020">
        </div>`;
}
