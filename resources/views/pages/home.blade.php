@extends('layouts.app')
@section('title', 'Sobat Outdoor - Rental Tenda & Perlengkapan Camping')

@section('content')

<section class="hero">
    <div class="hero-bg">
        <div class="hero-overlay"></div>
        <div class="hero-shapes">
            <div class="shape shape-1"></div>
            <div class="shape shape-2"></div>
        </div>
    </div>
    <div class="hero-content">
        <div class="hero-badge">⛺ Rental Perlengkapan Camping #1</div>
        <h1 class="hero-title">PETUALANGAN<br><span class="hero-accent">DIMULAI</span><br>DARI SINI</h1>
        <p class="hero-desc">Sewa tenda & perlengkapan camping lengkap. Siap antar jemput, peralatan bersih & terawat. Free Tripod setiap paket!</p>
        <div class="hero-btns">
            <a href="{{ url('/pesan') }}" class="btn-primary">Pesan Sekarang</a>
            <a href="{{ url('/paket') }}" class="btn-outline">Lihat Paket</a>
        </div>
        <div class="hero-stats">
            <div class="stat"><span class="stat-num">500+</span><span class="stat-label">Pelanggan</span></div>
            <div class="stat-divider"></div>
            <div class="stat"><span class="stat-num">5</span><span class="stat-label">Paket Sewa</span></div>
            <div class="stat-divider"></div>
            <div class="stat"><span class="stat-num">100%</span><span class="stat-label">Terpercaya</span></div>
        </div>
    </div>
    <div class="hero-scroll">
        <div class="scroll-line"></div>
        <span>Scroll</span>
    </div>
</section>

<section class="features">
    <div class="section-container">
        <div class="section-label">Mengapa Kami?</div>
        <h2 class="section-title">Keunggulan <span class="accent">Sobat Outdoor</span></h2>
        <div class="features-grid">
            <div class="feature-card">
                <div class="feature-icon">🚗</div>
                <h3>Antar & Jemput</h3>
                <p>Layanan antar jemput ke lokasi camping kamu tanpa biaya tambahan</p>
            </div>
            <div class="feature-card">
                <div class="feature-icon">📸</div>
                <h3>Free Tripod</h3>
                <p>Setiap paket sudah termasuk tripod gratis untuk foto kenangan</p>
            </div>
            <div class="feature-card">
                <div class="feature-icon">✨</div>
                <h3>Selalu Bersih</h3>
                <p>Semua peralatan dibersihkan dan dicek sebelum disewakan</p>
            </div>
            <div class="feature-card">
                <div class="feature-icon">🔒</div>
                <h3>Aman & Terpercaya</h3>
                <p>Pemesanan online dengan verifikasi KTP untuk keamanan bersama</p>
            </div>
        </div>
    </div>
</section>

<section class="paket-preview">
    <div class="section-container">
        <div class="section-label">Pilihan Paket</div>
        <h2 class="section-title">Paket <span class="accent">Terjangkau</span></h2>
        <div class="paket-grid">
            <div class="paket-card popular">
                <div class="popular-badge">Terpopuler</div>
                <div class="paket-name">Paket Lengkap</div>
                <div class="paket-code">Paket A</div>
                <div class="paket-price">Rp 180.000<span>/hari</span></div>
                <ul class="paket-list">
                    <li>✓ 4 Kursi Lipat</li>
                    <li>✓ 2 Meja</li>
                    <li>✓ 1 Tenda</li>
                    <li>✓ 1 Karpet</li>
                    <li>✓ 1 Kompor Gas</li>
                    <li class="new">★ 1 Lampu</li>
                    <li class="bonus">🎁 Free Tripod</li>
                </ul>
                <a href="{{ url('/pesan') }}" class="btn-paket">Pesan Paket Ini</a>
            </div>
            <div class="paket-card">
                <div class="paket-name">Paket Standar</div>
                <div class="paket-code">Paket B</div>
                <div class="paket-price">Rp 165.000<span>/hari</span></div>
                <ul class="paket-list">
                    <li>✓ 2 Kursi Lipat</li>
                    <li>✓ 1 Meja</li>
                    <li>✓ 1 Tenda</li>
                    <li>✓ 1 Karpet</li>
                    <li>✓ 1 Kompor Gas</li>
                    <li class="new">★ 1 Lampu</li>
                    <li class="bonus">🎁 Free Tripod</li>
                </ul>
                <a href="{{ url('/pesan') }}" class="btn-paket">Pesan Paket Ini</a>
            </div>
            <div class="paket-card">
                <div class="paket-name">Paket Tenda</div>
                <div class="paket-code">Paket E</div>
                <div class="paket-price">Rp 115.000<span>/hari</span></div>
                <ul class="paket-list">
                    <li>✓ 1 Tenda</li>
                    <li>✓ 1 Karpet</li>
                    <li>✓ 1 Kompor Gas</li>
                    <li class="new">★ 1 Lampu</li>
                    <li class="bonus">🎁 Free Tripod</li>
                </ul>
                <a href="{{ url('/pesan') }}" class="btn-paket">Pesan Paket Ini</a>
            </div>
        </div>
        <div class="paket-more">
            <a href="{{ url('/paket') }}" class="btn-outline">Lihat Semua Paket →</a>
        </div>
    </div>
</section>

<section class="cta">
    <div class="cta-content">
        <h2>Siap Berkemah? 🏕️</h2>
        <p>Pesan sekarang, mudah dan aman dengan verifikasi KTP online</p>
        <a href="{{ url('/pesan') }}" class="btn-primary">Pesan Sekarang</a>
    </div>
</section>

@endsection
