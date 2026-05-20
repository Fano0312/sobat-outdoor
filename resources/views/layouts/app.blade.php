<!DOCTYPE html>
<html lang="id">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<meta name="csrf-token" content="{{ csrf_token() }}">
<title>@yield('title', 'Sobat Outdoor')</title>
<link href="https://fonts.googleapis.com/css2?family=Bebas+Neue&family=Nunito:wght@400;600;700;800&display=swap" rel="stylesheet">
<style>
:root{--hijau:#1a3a1a;--orange:#e8a020;--orange-light:#f5c050;--putih:#ffffff;--abu:#f5f5f0;--teks:#1a1a1a;--teks-soft:#555;--font-display:'Bebas Neue',sans-serif;--font-body:'Nunito',sans-serif;--radius:12px;--shadow:0 8px 30px rgba(0,0,0,0.12)}
*{margin:0;padding:0;box-sizing:border-box}
html{scroll-behavior:smooth}
body{font-family:var(--font-body);color:var(--teks);background:var(--abu);overflow-x:hidden}
a{text-decoration:none;color:inherit}
.navbar{position:fixed;top:0;left:0;right:0;z-index:1000;background:rgba(26,58,26,0.97);backdrop-filter:blur(10px);border-bottom:2px solid var(--orange)}
.nav-container{max-width:1200px;margin:0 auto;padding:0 20px;height:65px;display:flex;align-items:center;justify-content:space-between}
.nav-logo{display:flex;align-items:center;gap:10px;font-family:var(--font-display);font-size:20px;color:var(--putih);letter-spacing:1px}
.logo-icon{width:36px;height:36px}
.logo-icon svg{width:100%;height:100%}
.nav-logo .accent{color:var(--orange)}
.nav-links{display:flex;align-items:center;gap:28px}
.nav-links a{color:rgba(255,255,255,0.85);font-weight:600;font-size:14px;transition:color 0.2s}
.nav-links a:hover{color:var(--orange)}
.btn-nav{background:var(--orange)!important;color:var(--hijau)!important;padding:9px 18px;border-radius:8px;font-weight:800!important}
.hamburger{display:none;flex-direction:column;gap:5px;background:none;border:none;cursor:pointer;padding:5px}
.hamburger span{width:24px;height:2px;background:var(--putih);border-radius:2px;display:block}
.mobile-menu{display:none;flex-direction:column;background:var(--hijau);padding:16px 20px;gap:14px;border-top:1px solid rgba(255,255,255,0.1)}
.mobile-menu a{color:rgba(255,255,255,0.85);font-weight:600;padding:8px 0;border-bottom:1px solid rgba(255,255,255,0.08)}
.mobile-menu.open{display:flex}
.btn-primary{display:inline-block;background:var(--orange);color:var(--hijau);font-family:var(--font-body);font-weight:800;padding:13px 28px;border-radius:10px;border:none;cursor:pointer;font-size:15px;transition:all 0.2s}
.btn-primary:hover{background:var(--orange-light);transform:translateY(-2px);box-shadow:0 6px 20px rgba(232,160,32,0.4)}
.btn-outline{display:inline-block;background:transparent;color:var(--orange);font-weight:700;padding:12px 26px;border-radius:10px;border:2px solid var(--orange);cursor:pointer;font-size:15px;transition:all 0.2s;font-family:var(--font-body)}
.btn-outline:hover{background:rgba(232,160,32,0.1)}
.w-full{width:100%;text-align:center}
.hidden{display:none!important}
.hero{min-height:100vh;display:flex;align-items:center;position:relative;background:var(--hijau);overflow:hidden;padding:100px 24px 60px}
.hero-overlay{position:absolute;inset:0;background:linear-gradient(135deg,rgba(26,58,26,0.97) 0%,rgba(30,77,30,0.85) 100%)}
.hero-shapes{position:absolute;inset:0;overflow:hidden}
.shape{position:absolute;border-radius:50%;opacity:0.05}
.shape-1{width:500px;height:500px;background:var(--orange);right:-150px;top:-150px;animation:float 8s ease-in-out infinite}
.shape-2{width:350px;height:350px;background:var(--orange-light);left:-80px;bottom:-80px;animation:float 10s ease-in-out infinite reverse}
@keyframes float{0%,100%{transform:translateY(0)}50%{transform:translateY(-25px)}}
.hero-content{position:relative;z-index:2;max-width:700px;margin:0 auto;animation:fadeUp 0.8s ease both}
@keyframes fadeUp{from{opacity:0;transform:translateY(40px)}to{opacity:1;transform:translateY(0)}}
.hero-badge{display:inline-block;background:rgba(232,160,32,0.2);border:1px solid rgba(232,160,32,0.4);color:var(--orange-light);padding:8px 16px;border-radius:30px;font-size:13px;font-weight:700;margin-bottom:20px}
.hero-title{font-family:var(--font-display);font-size:clamp(52px,12vw,100px);color:var(--putih);line-height:0.95;margin-bottom:18px;letter-spacing:2px}
.hero-accent{color:var(--orange)}
.hero-desc{color:rgba(255,255,255,0.75);font-size:16px;line-height:1.7;max-width:500px;margin-bottom:28px}
.hero-btns{display:flex;gap:14px;flex-wrap:wrap;margin-bottom:44px}
.hero-stats{display:flex;align-items:center;gap:20px;flex-wrap:wrap}
.stat{display:flex;flex-direction:column}
.stat-num{font-family:var(--font-display);font-size:34px;color:var(--orange);line-height:1}
.stat-label{color:rgba(255,255,255,0.6);font-size:11px;font-weight:600;text-transform:uppercase;letter-spacing:1px}
.stat-divider{width:1px;height:38px;background:rgba(255,255,255,0.2)}
.hero-scroll{position:absolute;bottom:28px;left:50%;transform:translateX(-50%);display:flex;flex-direction:column;align-items:center;gap:8px;color:rgba(255,255,255,0.4);font-size:10px;font-weight:700;letter-spacing:2px;text-transform:uppercase}
.scroll-line{width:1px;height:44px;background:linear-gradient(to bottom,var(--orange),transparent);animation:scrollAnim 2s ease-in-out infinite}
@keyframes scrollAnim{0%,100%{opacity:1}50%{opacity:0.3}}
.section-container{max-width:1200px;margin:0 auto;padding:70px 24px}
.section-label{font-size:11px;font-weight:800;text-transform:uppercase;letter-spacing:3px;color:var(--orange);margin-bottom:10px}
.section-title{font-family:var(--font-display);font-size:clamp(30px,5vw,50px);color:var(--hijau);margin-bottom:44px;letter-spacing:1px}
.section-title .accent{color:var(--orange)}
.features{background:var(--putih)}
.features-grid{display:grid;grid-template-columns:repeat(auto-fit,minmax(220px,1fr));gap:22px}
.feature-card{background:var(--abu);border-radius:var(--radius);padding:28px 22px;border:2px solid transparent;transition:all 0.3s}
.feature-card:hover{border-color:var(--orange);transform:translateY(-4px);box-shadow:var(--shadow)}
.feature-icon{font-size:38px;margin-bottom:14px}
.feature-card h3{font-size:17px;font-weight:800;margin-bottom:8px;color:var(--hijau)}
.feature-card p{color:var(--teks-soft);line-height:1.6;font-size:14px}
.paket-preview{background:var(--hijau)}
.paket-preview .section-label{color:var(--orange-light)}
.paket-preview .section-title{color:var(--putih)}
.paket-grid{display:grid;grid-template-columns:repeat(auto-fit,minmax(260px,1fr));gap:22px;margin-bottom:36px}
.paket-card{background:rgba(255,255,255,0.06);border:1px solid rgba(255,255,255,0.1);border-radius:var(--radius);padding:26px;position:relative;transition:all 0.3s}
.paket-card:hover{background:rgba(255,255,255,0.1);transform:translateY(-4px);border-color:rgba(232,160,32,0.4)}
.paket-card.popular{border-color:var(--orange);background:rgba(232,160,32,0.08)}
.popular-badge{position:absolute;top:-11px;left:18px;background:var(--orange);color:var(--hijau);font-size:11px;font-weight:800;padding:3px 12px;border-radius:20px;text-transform:uppercase;letter-spacing:1px}
.paket-name{color:rgba(255,255,255,0.7);font-size:12px;font-weight:700;text-transform:uppercase;letter-spacing:1px;margin-bottom:3px}
.paket-code{color:rgba(255,255,255,0.4);font-size:11px;margin-bottom:14px}
.paket-price{font-family:var(--font-display);font-size:34px;color:var(--orange);letter-spacing:1px;margin-bottom:18px;line-height:1}
.paket-price span{font-size:13px;color:rgba(255,255,255,0.5);font-family:var(--font-body)}
.paket-list{list-style:none;margin-bottom:22px}
.paket-list li{color:rgba(255,255,255,0.7);font-size:13px;padding:5px 0;border-bottom:1px solid rgba(255,255,255,0.06)}
.paket-list li.new{color:var(--orange-light);font-weight:700}
.paket-list li.bonus{color:#6dcc6d;font-weight:700}
.btn-paket{display:block;text-align:center;background:rgba(232,160,32,0.15);color:var(--orange);border:1px solid rgba(232,160,32,0.4);padding:11px;border-radius:8px;font-weight:700;font-size:14px;transition:all 0.2s}
.btn-paket:hover{background:var(--orange);color:var(--hijau)}
.paket-more{text-align:center}
.cta{background:linear-gradient(135deg,var(--orange) 0%,#d4850a 100%);padding:70px 24px;text-align:center}
.cta-content h2{font-family:var(--font-display);font-size:46px;color:var(--hijau);margin-bottom:10px}
.cta-content p{color:rgba(26,58,26,0.8);font-size:16px;margin-bottom:24px;font-weight:600}
.cta .btn-primary{background:var(--hijau);color:var(--putih)}
.page-hero{background:var(--hijau);padding:120px 24px 55px;text-align:center;border-bottom:3px solid var(--orange)}
.page-hero-content h1{font-family:var(--font-display);font-size:clamp(38px,7vw,70px);color:var(--putih);letter-spacing:2px}
.page-hero-content p{color:rgba(255,255,255,0.65);font-size:15px;margin-top:10px}
.paket-full{background:var(--abu)}
.paket-full-grid{display:grid;grid-template-columns:repeat(auto-fit,minmax(280px,1fr));gap:22px}
.paket-full-card{background:var(--putih);border-radius:var(--radius);padding:26px;border:2px solid #eee;position:relative;transition:all 0.3s}
.paket-full-card:hover{border-color:var(--orange);box-shadow:var(--shadow);transform:translateY(-3px)}
.paket-full-card.popular{border-color:var(--orange)}
.paket-header{display:flex;justify-content:space-between;align-items:flex-start;margin-bottom:18px;padding-bottom:14px;border-bottom:2px solid var(--abu)}
.paket-code-big{width:46px;height:46px;background:var(--hijau);color:var(--orange);border-radius:10px;display:flex;align-items:center;justify-content:center;font-family:var(--font-display);font-size:26px;margin-bottom:5px}
.paket-name-big{font-weight:800;font-size:15px;color:var(--hijau)}
.paket-price-big{font-family:var(--font-display);font-size:26px;color:var(--orange);text-align:right}
.paket-price-big span{font-size:12px;font-family:var(--font-body);color:var(--teks-soft);display:block}
.paket-isi{margin-bottom:22px}
.isi-row{display:flex;align-items:center;gap:10px;padding:6px 0;font-size:13px;color:var(--teks-soft);border-bottom:1px solid #f0f0f0}
.isi-qty{font-weight:800;color:var(--hijau);min-width:26px}
.new-isi{color:#c47d00!important;font-weight:700}
.bonus-isi{color:#2a8a2a!important;font-weight:700}
.galeri-section{background:var(--putih)}
.galeri-grid{display:grid;grid-template-columns:repeat(3,1fr);gap:14px}
.galeri-item{border-radius:var(--radius);overflow:hidden;position:relative;aspect-ratio:1;background:var(--abu)}
.galeri-item img{width:100%;height:100%;object-fit:cover;transition:transform 0.4s}
.galeri-item:hover img{transform:scale(1.08)}
.galeri-placeholder{width:100%;height:100%;display:flex;flex-direction:column;align-items:center;justify-content:center;gap:8px;background:linear-gradient(135deg,#e8f0e8,#d4e8d4)}
.galeri-placeholder span{font-size:36px}
.galeri-placeholder p{font-size:11px;font-weight:700;color:var(--hijau)}
.galeri-note{margin-top:18px;color:var(--teks-soft);font-size:13px}
.galeri-note code{background:var(--abu);padding:2px 8px;border-radius:4px;font-size:12px}
.form-section{background:var(--abu);padding:55px 20px}
.form-container{max-width:720px;margin:0 auto}
.alert-success{background:#d4edda;border:1px solid #a8d5b5;color:#1a5c2a;padding:14px 18px;border-radius:var(--radius);margin-bottom:22px;font-weight:600}
.alert-error{background:#fde8e8;border:1px solid #f5a5a5;color:#7a1a1a;padding:14px 18px;border-radius:var(--radius);margin-bottom:22px;font-weight:600}
.steps{display:flex;align-items:center;margin-bottom:36px;background:var(--putih);border-radius:var(--radius);padding:18px 16px;box-shadow:var(--shadow)}
.step{display:flex;flex-direction:column;align-items:center;gap:5px;flex:0}
.step-num{width:36px;height:36px;border-radius:50%;background:#e0e0e0;color:#999;display:flex;align-items:center;justify-content:center;font-weight:800;font-size:14px;transition:all 0.3s}
.step.active .step-num{background:var(--orange);color:var(--hijau)}
.step.done .step-num{background:var(--hijau);color:var(--putih)}
.step-label{font-size:10px;font-weight:700;color:#999;white-space:nowrap}
.step.active .step-label,.step.done .step-label{color:var(--hijau)}
.step-line{flex:1;height:2px;background:#e0e0e0;margin:0 8px;transition:background 0.3s}
.step-line.done{background:var(--hijau)}
.form-step{background:var(--putih);border-radius:var(--radius);padding:28px;box-shadow:var(--shadow);animation:fadeUp 0.4s ease both}
.form-step.hidden{display:none}
.step-title{font-size:19px;font-weight:800;color:var(--hijau);margin-bottom:22px}
.form-grid{display:grid;grid-template-columns:1fr 1fr;gap:18px;margin-bottom:22px}
.form-group{display:flex;flex-direction:column;gap:5px}
.form-group.full{grid-column:1/-1}
.form-group label{font-size:13px;font-weight:700;color:var(--hijau)}
.form-group input,.form-group textarea,.form-group select{padding:11px 13px;border:2px solid #e0e0e0;border-radius:8px;font-family:var(--font-body);font-size:14px;transition:border 0.2s;background:var(--putih)}
.form-group input:focus,.form-group textarea:focus{outline:none;border-color:var(--orange)}
.err{color:#e53e3e;font-size:12px}
.paket-options{display:flex;flex-direction:column;gap:10px}
.paket-option{cursor:pointer}
.paket-option input{display:none}
.paket-opt-card{border:2px solid #e0e0e0;border-radius:10px;padding:14px 18px;transition:all 0.2s}
.paket-option input:checked+.paket-opt-card{border-color:var(--orange);background:rgba(232,160,32,0.06)}
.paket-opt-header{display:flex;justify-content:space-between;margin-bottom:3px}
.paket-opt-code{font-weight:800;color:var(--hijau);font-size:13px}
.paket-opt-price{font-weight:800;color:var(--orange);font-size:14px}
.paket-opt-name{font-weight:700;font-size:13px;color:var(--teks);margin-bottom:3px}
.paket-opt-isi{font-size:11px;color:var(--teks-soft)}
.total-preview{display:flex;justify-content:space-between;align-items:center;background:var(--hijau);border-radius:10px;padding:14px 18px;margin-top:18px;color:rgba(255,255,255,0.7);font-weight:700;font-size:14px}
.total-num{font-family:var(--font-display);font-size:28px;color:var(--orange);letter-spacing:1px}
.kamera-box{background:#0a1a0a;border-radius:var(--radius);overflow:hidden;margin:18px 0;border:2px solid rgba(232,160,32,0.3)}
#videoKTP{width:100%;max-height:300px;object-fit:cover;display:block;background:#0a1a0a}
#hasilFotoImg{width:100%;max-height:300px;object-fit:cover;display:block}
.kamera-btns{display:flex;gap:10px;padding:14px;flex-wrap:wrap}
.hasil-label{background:rgba(109,204,109,0.2);color:#6dcc6d;text-align:center;padding:10px;font-weight:800;font-size:14px}
#hasilFotoPanel .btn-outline{margin:12px}
.ktp-desc{color:var(--teks-soft);font-size:14px;line-height:1.6;margin-bottom:14px}
.ktp-tips{background:rgba(232,160,32,0.08);border:1px solid rgba(232,160,32,0.2);border-radius:8px;padding:14px 18px;margin:14px 0;font-size:13px;color:var(--teks-soft)}
.ktp-tips strong{color:var(--hijau);display:block;margin-bottom:6px;font-size:13px}
.ktp-tips ul{padding-left:18px}
.ktp-tips li{margin-bottom:3px}
.konfirmasi-box{background:var(--abu);border-radius:10px;padding:18px;margin-bottom:18px}
.konfirmasi-box table{width:100%;border-collapse:collapse;font-size:14px}
.konfirmasi-box td{padding:7px 10px;border-bottom:1px solid #e0e0e0}
.konfirmasi-box td:first-child{font-weight:700;color:var(--hijau);width:40%}
.agreement{margin:18px 0;font-size:14px;color:var(--teks-soft)}
.agreement label{display:flex;align-items:center;gap:10px;cursor:pointer}
.agreement input{width:18px;height:18px;accent-color:var(--orange)}
.btn-row{display:flex;gap:12px;margin-top:22px;flex-wrap:wrap}
.btn-submit{flex:1;font-size:16px}
.wa-float{position:fixed;bottom:24px;right:24px;z-index:999;background:#25D366;color:#fff;width:58px;height:58px;border-radius:50%;display:flex;align-items:center;justify-content:center;font-size:28px;box-shadow:0 4px 20px rgba(37,211,102,0.5);transition:all 0.3s}
.wa-float:hover{transform:scale(1.1);background:#20bc5a}
.footer{background:#0d1f0d;border-top:3px solid var(--orange)}
.footer-container{max-width:1200px;margin:0 auto;padding:38px 24px 22px}
.footer-brand{display:flex;align-items:center;gap:14px;margin-bottom:22px}
.footer-name{font-family:var(--font-display);font-size:20px;color:var(--putih);letter-spacing:2px}
.footer-sub{color:rgba(255,255,255,0.5);font-size:12px}
.footer-info{margin-bottom:22px}
.footer-info p{color:rgba(255,255,255,0.6);font-size:13px;padding:3px 0}
.footer-wa{margin-top:14px}
.footer-wa a{display:inline-flex;align-items:center;gap:8px;background:#25D366;color:#fff;padding:10px 18px;border-radius:8px;font-weight:700;font-size:13px;transition:all 0.2s}
.footer-wa a:hover{background:#20bc5a}
.footer-copy{color:rgba(255,255,255,0.3);font-size:12px;text-align:center;border-top:1px solid rgba(255,255,255,0.08);padding-top:18px}
@media(max-width:768px){.nav-links{display:none}.hamburger{display:flex}.hero-btns{flex-direction:column}.form-grid{grid-template-columns:1fr}.form-group.full{grid-column:1}.galeri-grid{grid-template-columns:repeat(2,1fr)}.steps{gap:4px;padding:14px 10px}.step-label{font-size:9px}.step-num{width:30px;height:30px;font-size:12px}.btn-row{flex-direction:column}}
@media(max-width:480px){.galeri-grid{grid-template-columns:1fr 1fr}.hero-stats{gap:14px}.paket-full-grid{grid-template-columns:1fr}}
</style>
</head>
<body>
<nav class="navbar" id="navbar">
<div class="nav-container">
<a href="{{ url('/') }}" class="nav-logo">
<div class="logo-icon"><svg viewBox="0 0 40 40" fill="none"><polygon points="20,3 37,34 3,34" fill="none" stroke="#e8a020" stroke-width="2.5"/><line x1="20" y1="3" x2="20" y2="34" stroke="#e8a020" stroke-width="1.5" stroke-dasharray="3,3"/></svg></div>
<span>SOBAT<span class="accent">OUTDOOR</span></span>
</a>
<div class="nav-links">
<a href="{{ url('/') }}">Home</a>
<a href="{{ url('/paket') }}">Paket</a>
<a href="{{ url('/galeri') }}">Galeri</a>
<a href="{{ url('/pesan') }}" class="btn-nav">Pesan Sekarang</a>
</div>
<button class="hamburger" id="hamburger"><span></span><span></span><span></span></button>
</div>
<div class="mobile-menu" id="mobileMenu">
<a href="{{ url('/') }}">Home</a>
<a href="{{ url('/paket') }}">Paket</a>
<a href="{{ url('/galeri') }}">Galeri</a>
<a href="{{ url('/pesan') }}">Pesan Sekarang</a>
</div>
</nav>

@yield('content')

<a href="https://wa.me/6285124125653" class="wa-float" title="Chat WhatsApp">💬</a>

<footer class="footer">
<div class="footer-container">
<div class="footer-brand">
<div class="logo-icon"><svg viewBox="0 0 40 40" fill="none"><polygon points="20,3 37,34 3,34" fill="none" stroke="#e8a020" stroke-width="2.5"/><line x1="20" y1="3" x2="20" y2="34" stroke="#e8a020" stroke-width="1.5" stroke-dasharray="3,3"/></svg></div>
<div><div class="footer-name">SOBAT OUTDOOR</div><div class="footer-sub">Rental Tenda & Perlengkapan</div></div>
</div>
<div class="footer-info">
<p>📍 Siap Antar & Jemput</p>
<p>📞 0851-2412-5653</p>
<p>✅ Peralatan Lengkap & Bersih</p>
</div>
<div class="footer-wa">
<a href="https://wa.me/6285124125653">💬 Chat WhatsApp Kami</a>
</div>
<div class="footer-copy">© 2026 Sobat Outdoor. All rights reserved.</div>
</div>
</footer>
<script src="{{ asset('js/app.js') }}"></script>
@stack('scripts')
</body>
</html>
