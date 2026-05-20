@extends('layouts.app')
@section('title', 'Galeri - Sobat Outdoor')

@section('content')

<section class="page-hero">
    <div class="page-hero-content">
        <div class="section-label">Dokumentasi</div>
        <h1>Galeri <span class="accent">Foto</span></h1>
        <p>Kenangan indah para pelanggan setia Sobat Outdoor</p>
    </div>
</section>

<section class="galeri-section">
    <div class="section-container">
        <div class="galeri-grid">
            @forelse($galeri ?? [] as $foto)
                <div class="galeri-item">
                    <img src="{{ asset('storage/' . $foto->path) }}" alt="{{ $foto->keterangan }}">
                    <div class="galeri-overlay"><p>{{ $foto->keterangan }}</p></div>
                </div>
            @empty
                @for($i = 1; $i <= 9; $i++)
                <div class="galeri-item placeholder">
                    <div class="galeri-placeholder">
                        <span>⛺</span>
                        <p>Foto Camping {{ $i }}</p>
                    </div>
                </div>
                @endfor
            @endforelse
        </div>
        <p class="galeri-note">* Upload foto galeri melalui folder <code>storage/app/public/galeri</code></p>
    </div>
</section>

@endsection
