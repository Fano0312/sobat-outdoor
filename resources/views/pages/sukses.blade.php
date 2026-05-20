@extends('layouts.app')
@section('title', 'Pesanan Berhasil - Sobat Outdoor')

@section('content')
<section class="page-hero">
    <div class="page-hero-content">
        <div style="font-size:64px;margin-bottom:16px">🎉</div>
        <h1><span class="accent">Pesanan</span> Berhasil!</h1>
        <p>Terima kasih telah memesan di Sobat Outdoor</p>
    </div>
</section>

<section class="form-section">
    <div class="form-container" style="text-align:center">
        <div style="background:white;border-radius:16px;padding:40px;box-shadow:0 8px 30px rgba(0,0,0,0.1)">
            <div style="background:#d4edda;border-radius:12px;padding:20px;margin-bottom:24px">
                <div style="font-size:32px;margin-bottom:8px">✅</div>
                <div style="font-weight:800;font-size:18px;color:#1a5c2a;margin-bottom:6px">Pesanan Diterima!</div>
                <div style="color:#2a7a3a;font-size:14px">No. Pesanan: <strong>{{ session('no_pesanan') }}</strong></div>
            </div>
            <p style="color:#555;font-size:15px;line-height:1.7;margin-bottom:20px">
                Tim Sobat Outdoor akan menghubungi kamu via WhatsApp dalam <strong>1x24 jam</strong>.
            </p>
            @if(session('total'))
            <div style="background:#1a3a1a;border-radius:10px;padding:16px 20px;margin-bottom:28px;display:flex;justify-content:space-between;align-items:center">
                <span style="color:rgba(255,255,255,0.7);font-weight:700">Total Pembayaran:</span>
                <span style="font-family:'Bebas Neue',sans-serif;font-size:28px;color:#e8a020">
                    Rp {{ number_format(session('total'), 0, ',', '.') }}
                </span>
            </div>
            @endif
            <div style="display:flex;gap:12px;flex-wrap:wrap;justify-content:center">
                <a href="{{ url('/') }}" class="btn-outline">← Kembali ke Beranda</a>
                <a href="{{ url('/paket') }}" class="btn-primary">Lihat Paket Lainnya</a>
            </div>
        </div>
    </div>
</section>
@endsection
