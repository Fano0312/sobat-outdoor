@extends('layouts.app')
@section('title', 'Paket Sewa - Sobat Outdoor')

@section('content')

<section class="page-hero">
    <div class="page-hero-content">
        <div class="section-label">Pilihan Lengkap</div>
        <h1>Daftar <span class="accent">Paket Sewa</span></h1>
        <p>Semua paket sudah termasuk FREE Tripod & layanan antar jemput</p>
    </div>
</section>

<section class="paket-full">
    <div class="section-container">
        <div class="paket-full-grid">

            <div class="paket-full-card popular">
                <div class="popular-badge">Terpopuler</div>
                <div class="paket-header">
                    <div>
                        <div class="paket-code-big">A</div>
                        <div class="paket-name-big">Paket Lengkap</div>
                    </div>
                    <div class="paket-price-big">Rp 180.000<span>/hari</span></div>
                </div>
                <div class="paket-isi">
                    <div class="isi-row"><span class="isi-qty">4x</span> Kursi Lipat</div>
                    <div class="isi-row"><span class="isi-qty">2x</span> Meja</div>
                    <div class="isi-row"><span class="isi-qty">1x</span> Tenda</div>
                    <div class="isi-row"><span class="isi-qty">1x</span> Karpet</div>
                    <div class="isi-row"><span class="isi-qty">1x</span> Kompor Gas</div>
                    <div class="isi-row new-isi"><span class="isi-qty">1x</span> Lampu ★ Baru</div>
                    <div class="isi-row bonus-isi"><span class="isi-qty">🎁</span> Free Tripod</div>
                </div>
                <a href="{{ url('/pesan?paket=A') }}" class="btn-primary w-full">Pesan Paket A</a>
            </div>

            <div class="paket-full-card">
                <div class="paket-header">
                    <div>
                        <div class="paket-code-big">B</div>
                        <div class="paket-name-big">Paket Standar</div>
                    </div>
                    <div class="paket-price-big">Rp 165.000<span>/hari</span></div>
                </div>
                <div class="paket-isi">
                    <div class="isi-row"><span class="isi-qty">2x</span> Kursi Lipat</div>
                    <div class="isi-row"><span class="isi-qty">1x</span> Meja</div>
                    <div class="isi-row"><span class="isi-qty">1x</span> Tenda</div>
                    <div class="isi-row"><span class="isi-qty">1x</span> Karpet</div>
                    <div class="isi-row"><span class="isi-qty">1x</span> Kompor Gas</div>
                    <div class="isi-row new-isi"><span class="isi-qty">1x</span> Lampu ★ Baru</div>
                    <div class="isi-row bonus-isi"><span class="isi-qty">🎁</span> Free Tripod</div>
                </div>
                <a href="{{ url('/pesan?paket=B') }}" class="btn-primary w-full">Pesan Paket B</a>
            </div>

            <div class="paket-full-card">
                <div class="paket-header">
                    <div>
                        <div class="paket-code-big">C</div>
                        <div class="paket-name-big">Paket Meja Kursi</div>
                    </div>
                    <div class="paket-price-big">Rp 80.000<span>/hari</span></div>
                </div>
                <div class="paket-isi">
                    <div class="isi-row"><span class="isi-qty">2x</span> Kursi Lipat</div>
                    <div class="isi-row"><span class="isi-qty">1x</span> Meja</div>
                    <div class="isi-row"><span class="isi-qty">1x</span> Kompor Gas</div>
                    <div class="isi-row bonus-isi"><span class="isi-qty">🎁</span> Free Tripod</div>
                </div>
                <a href="{{ url('/pesan?paket=C') }}" class="btn-primary w-full">Pesan Paket C</a>
            </div>

            <div class="paket-full-card">
                <div class="paket-header">
                    <div>
                        <div class="paket-code-big">D</div>
                        <div class="paket-name-big">Paket Kursi</div>
                    </div>
                    <div class="paket-price-big">Rp 50.000<span>/hari</span></div>
                </div>
                <div class="paket-isi">
                    <div class="isi-row"><span class="isi-qty">2x</span> Kursi Lipat</div>
                    <div class="isi-row"><span class="isi-qty">1x</span> Kompor Gas</div>
                    <div class="isi-row bonus-isi"><span class="isi-qty">🎁</span> Free Tripod</div>
                </div>
                <a href="{{ url('/pesan?paket=D') }}" class="btn-primary w-full">Pesan Paket D</a>
            </div>

            <div class="paket-full-card">
                <div class="paket-header">
                    <div>
                        <div class="paket-code-big">E</div>
                        <div class="paket-name-big">Paket Tenda</div>
                    </div>
                    <div class="paket-price-big">Rp 115.000<span>/hari</span></div>
                </div>
                <div class="paket-isi">
                    <div class="isi-row"><span class="isi-qty">1x</span> Tenda</div>
                    <div class="isi-row"><span class="isi-qty">1x</span> Karpet</div>
                    <div class="isi-row"><span class="isi-qty">1x</span> Kompor Gas</div>
                    <div class="isi-row new-isi"><span class="isi-qty">1x</span> Lampu ★ Baru</div>
                    <div class="isi-row bonus-isi"><span class="isi-qty">🎁</span> Free Tripod</div>
                </div>
                <a href="{{ url('/pesan?paket=E') }}" class="btn-primary w-full">Pesan Paket E</a>
            </div>

        </div>
    </div>
</section>

@endsection
