@extends('layouts.app')
@section('title', 'Form Pemesanan - Sobat Outdoor')

@section('content')

<section class="page-hero">
    <div class="page-hero-content">
        <div class="section-label">Booking Online</div>
        <h1>Form <span class="accent">Pemesanan</span></h1>
        <p>Isi data dengan lengkap & foto KTP kamu untuk verifikasi</p>
    </div>
</section>

<section class="form-section">
    <div class="form-container">

        @if(session('success'))
            <div class="alert-success">✅ {{ session('success') }}</div>
        @endif

        @if($errors->any())
            <div class="alert-error">❌ Mohon lengkapi semua data yang diperlukan.</div>
        @endif

        <div class="steps">
            <div class="step active" id="step-ind-1"><div class="step-num">1</div><div class="step-label">Data Diri</div></div>
            <div class="step-line"></div>
            <div class="step" id="step-ind-2"><div class="step-num">2</div><div class="step-label">Pilih Paket</div></div>
            <div class="step-line"></div>
            <div class="step" id="step-ind-3"><div class="step-num">3</div><div class="step-label">Foto KTP</div></div>
            <div class="step-line"></div>
            <div class="step" id="step-ind-4"><div class="step-num">4</div><div class="step-label">Konfirmasi</div></div>
        </div>

        <form action="{{ url('/pesan') }}" method="POST" enctype="multipart/form-data" id="formPesan">
            @csrf

            <!-- STEP 1 -->
            <div class="form-step" id="step-1">
                <h3 class="step-title">📋 Data Diri Pemesan</h3>
                <div class="form-grid">
                    <div class="form-group">
                        <label>Nama Lengkap *</label>
                        <input type="text" name="nama" placeholder="Sesuai KTP" value="{{ old('nama') }}" required>
                    </div>
                    <div class="form-group">
                        <label>No. Telepon / WhatsApp *</label>
                        <input type="text" name="telepon" placeholder="08xxxxxxxxxx" value="{{ old('telepon') }}" required>
                    </div>
                    <div class="form-group full">
                        <label>Alamat *</label>
                        <textarea name="alamat" placeholder="Alamat lengkap" rows="3" required>{{ old('alamat') }}</textarea>
                    </div>
                    <div class="form-group">
                        <label>Tanggal Mulai Sewa *</label>
                        <input type="date" name="tgl_mulai" value="{{ old('tgl_mulai') }}" required>
                    </div>
                    <div class="form-group">
                        <label>Tanggal Selesai Sewa *</label>
                        <input type="date" name="tgl_selesai" value="{{ old('tgl_selesai') }}" required>
                    </div>
                    <div class="form-group full">
                        <label>Lokasi Camping *</label>
                        <input type="text" name="lokasi" placeholder="Contoh: Gunung Bromo, Malang" value="{{ old('lokasi') }}" required>
                    </div>
                </div>
                <button type="button" class="btn-primary" onclick="nextStep(2)">Lanjut →</button>
            </div>

            <!-- STEP 2 -->
            <div class="form-step hidden" id="step-2">
                <h3 class="step-title">⛺ Pilih Paket Sewa</h3>
                <div class="paket-options">
                    @php
                    $pakets = [
                        'A' => ['name' => 'Paket Lengkap', 'harga' => 180000, 'isi' => '4 Kursi, 2 Meja, 1 Tenda, 1 Karpet, 1 Kompor, 1 Lampu'],
                        'B' => ['name' => 'Paket Standar', 'harga' => 165000, 'isi' => '2 Kursi, 1 Meja, 1 Tenda, 1 Karpet, 1 Kompor, 1 Lampu'],
                        'C' => ['name' => 'Paket Meja Kursi', 'harga' => 80000, 'isi' => '2 Kursi, 1 Meja, 1 Kompor Gas'],
                        'D' => ['name' => 'Paket Kursi', 'harga' => 50000, 'isi' => '2 Kursi Lipat, 1 Kompor Gas'],
                        'E' => ['name' => 'Paket Tenda', 'harga' => 115000, 'isi' => '1 Tenda, 1 Karpet, 1 Kompor, 1 Lampu'],
                    ];
                    @endphp
                    @foreach($pakets as $kode => $paket)
                    <label class="paket-option">
                        <input type="radio" name="paket" value="{{ $kode }}" {{ request('paket') == $kode ? 'checked' : '' }} required>
                        <div class="paket-opt-card">
                            <div class="paket-opt-header">
                                <span class="paket-opt-code">Paket {{ $kode }}</span>
                                <span class="paket-opt-price">Rp {{ number_format($paket['harga'], 0, ',', '.') }}/hari</span>
                            </div>
                            <div class="paket-opt-name">{{ $paket['name'] }}</div>
                            <div class="paket-opt-isi">{{ $paket['isi'] }} + Free Tripod</div>
                        </div>
                    </label>
                    @endforeach
                </div>
                <div class="form-group" style="margin-top:20px">
                    <label>Jumlah Hari *</label>
                    <input type="number" name="jumlah_hari" min="1" max="30" value="{{ old('jumlah_hari', 1) }}" id="jumlahHari" required>
                </div>
                <div class="total-preview" id="totalPreview">
                    <span>Estimasi Total:</span>
                    <span class="total-num" id="totalNum">Rp 0</span>
                </div>
                <div class="btn-row">
                    <button type="button" class="btn-outline" onclick="prevStep(1)">← Kembali</button>
                    <button type="button" class="btn-primary" onclick="nextStep(3)">Lanjut →</button>
                </div>
            </div>

            <!-- STEP 3 -->
            <div class="form-step hidden" id="step-3">
                <h3 class="step-title">📷 Verifikasi KTP</h3>
                <p class="ktp-desc">Untuk keamanan transaksi, harap foto KTP kamu menggunakan kamera.</p>
                <div class="kamera-box">
                    <div id="kameraPanel">
                        <video id="videoKTP" autoplay playsinline></video>
                        <canvas id="canvasKTP" style="display:none"></canvas>
                        <div class="kamera-btns">
                            <button type="button" class="btn-primary" id="btnBukaKamera" onclick="bukaKamera()">📷 Buka Kamera</button>
                            <button type="button" class="btn-primary hidden" id="btnFoto" onclick="ambilFoto()">📸 Foto Sekarang</button>
                            <button type="button" class="btn-outline hidden" id="btnGantiKamera" onclick="gantiFacing()">🔄 Ganti Kamera</button>
                        </div>
                    </div>
                    <div id="hasilFotoPanel" style="display:none">
                        <div class="hasil-label">✅ Foto KTP Berhasil</div>
                        <img id="hasilFotoImg" src="" alt="Foto KTP">
                        <button type="button" class="btn-outline" onclick="ulanFoto()">🔄 Ulangi Foto</button>
                    </div>
                    <input type="hidden" name="foto_ktp_base64" id="fotoKTPBase64">
                </div>
                <div class="ktp-tips">
                    <strong>Tips foto KTP yang baik:</strong>
                    <ul>
                        <li>Letakkan KTP di permukaan datar</li>
                        <li>Pastikan pencahayaan cukup</li>
                        <li>Semua tulisan harus terbaca jelas</li>
                        <li>Hindari pantulan cahaya / silau</li>
                    </ul>
                </div>
                <div class="btn-row">
                    <button type="button" class="btn-outline" onclick="prevStep(2)">← Kembali</button>
                    <button type="button" class="btn-primary" id="btnLanjutKonfirmasi" onclick="nextStep(4)" disabled>Lanjut →</button>
                </div>
            </div>

            <!-- STEP 4 -->
            <div class="form-step hidden" id="step-4">
                <h3 class="step-title">✅ Konfirmasi Pesanan</h3>
                <div class="konfirmasi-box" id="konfirmasiBox"></div>
                <div class="form-group">
                    <label>Catatan Tambahan (opsional)</label>
                    <textarea name="catatan" placeholder="Contoh: tolong antar jam 8 pagi..." rows="3">{{ old('catatan') }}</textarea>
                </div>
                <div class="agreement">
                    <label>
                        <input type="checkbox" id="setuju" required>
                        Saya menyetujui syarat & ketentuan penyewaan Sobat Outdoor
                    </label>
                </div>
                <div class="btn-row">
                    <button type="button" class="btn-outline" onclick="prevStep(3)">← Kembali</button>
                    <button type="submit" class="btn-primary btn-submit">🚀 Kirim Pesanan</button>
                </div>
            </div>

        </form>
    </div>
</section>

@endsection
@push('scripts')
<script src="{{ asset('js/pesan.js') }}"></script>
@endpush
