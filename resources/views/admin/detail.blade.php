<!DOCTYPE html>
<html lang="id">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Detail Pesanan - Admin Sobat Outdoor</title>
<link href="https://fonts.googleapis.com/css2?family=Bebas+Neue&family=Nunito:wght@400;600;700;800&display=swap" rel="stylesheet">
<style>
*{margin:0;padding:0;box-sizing:border-box}
body{font-family:'Nunito',sans-serif;background:#f5f5f0;min-height:100vh}
.admin-navbar{background:#1a3a1a;padding:0 24px;height:62px;display:flex;align-items:center;justify-content:space-between;border-bottom:2px solid #e8a020;position:sticky;top:0;z-index:100}
.admin-brand{font-family:'Bebas Neue',sans-serif;font-size:20px;color:#fff;letter-spacing:2px}
.admin-brand span{color:#e8a020}
.admin-nav-right{display:flex;align-items:center;gap:16px}
.admin-nav-right a{color:rgba(255,255,255,0.7);font-size:13px;font-weight:600;text-decoration:none}
.admin-nav-right a:hover{color:#e8a020}
.btn-logout{background:rgba(229,57,53,0.2);color:#ff6b6b!important;padding:7px 14px;border-radius:7px;border:1px solid rgba(229,57,53,0.3)}
.content{max-width:900px;margin:0 auto;padding:28px 20px}
.back-btn{display:inline-flex;align-items:center;gap:8px;color:#1a3a1a;font-weight:700;font-size:14px;margin-bottom:22px;text-decoration:none;transition:color 0.2s}
.back-btn:hover{color:#e8a020}
.detail-grid{display:grid;grid-template-columns:1fr 1fr;gap:20px}
.card{background:#fff;border-radius:12px;padding:24px;box-shadow:0 2px 12px rgba(0,0,0,0.06)}
.card-title{font-family:'Bebas Neue',sans-serif;font-size:20px;color:#1a3a1a;letter-spacing:1px;margin-bottom:18px;padding-bottom:12px;border-bottom:2px solid #f5f5f0}
.info-row{display:flex;justify-content:space-between;padding:9px 0;border-bottom:1px solid #f5f5f0;font-size:14px}
.info-row:last-child{border-bottom:none}
.info-label{color:#888;font-weight:600}
.info-value{color:#1a3a1a;font-weight:700;text-align:right}
.total-row .info-value{color:#e8a020;font-family:'Bebas Neue',sans-serif;font-size:22px;letter-spacing:1px}
.badge{display:inline-block;padding:5px 12px;border-radius:20px;font-size:12px;font-weight:800;text-transform:uppercase}
.badge-pending{background:#fef3c7;color:#d97706}
.badge-dikonfirmasi{background:#dbeafe;color:#2563eb}
.badge-selesai{background:#d1fae5;color:#059669}
.badge-batal{background:#fee2e2;color:#dc2626}
.ktp-card{grid-column:1/-1}
.ktp-img{width:100%;max-width:500px;border-radius:10px;border:2px solid #e8a020;display:block;margin:0 auto}
.status-card{grid-column:1/-1}
.status-form{display:flex;gap:12px;flex-wrap:wrap;align-items:center;margin-top:14px}
.status-form select{padding:11px 16px;border:2px solid #e0e0e0;border-radius:8px;font-family:'Nunito',sans-serif;font-size:14px;font-weight:700;min-width:200px}
.btn-update{background:#1a3a1a;color:#fff;border:none;padding:11px 24px;border-radius:8px;font-family:'Nunito',sans-serif;font-weight:800;cursor:pointer;font-size:14px;transition:all 0.2s}
.btn-update:hover{background:#e8a020;color:#1a3a1a}
.btn-wa{display:inline-flex;align-items:center;gap:8px;background:#25D366;color:#fff;padding:11px 20px;border-radius:8px;font-weight:800;font-size:14px;text-decoration:none;transition:all 0.2s}
.btn-wa:hover{background:#20bc5a}
.alert-success{background:#d1fae5;border:1px solid #a7f3d0;color:#065f46;padding:12px 16px;border-radius:8px;margin-bottom:20px;font-weight:600}
@media(max-width:768px){.detail-grid{grid-template-columns:1fr}.ktp-card,.status-card{grid-column:1}.content{padding:20px 14px}}
</style>
</head>
<body>

<nav class="admin-navbar">
    <div class="admin-brand">SOBAT<span>OUTDOOR</span> <span style="font-size:13px;color:rgba(255,255,255,0.4);font-family:'Nunito',sans-serif;font-weight:600">Admin</span></div>
    <div class="admin-nav-right">
        <a href="{{ route('admin.dashboard') }}">← Dashboard</a>
        <a href="{{ route('admin.logout') }}" class="btn-logout">🚪 Logout</a>
    </div>
</nav>

<div class="content">
    <a href="{{ route('admin.dashboard') }}" class="back-btn">← Kembali ke Dashboard</a>

    @if(session('success'))
    <div class="alert-success">✅ {{ session('success') }}</div>
    @endif

    <div class="detail-grid">

        <div class="card">
            <div class="card-title">👤 Data Pemesan</div>
            <div class="info-row"><span class="info-label">No. Pesanan</span><span class="info-value" style="font-family:monospace;font-size:12px">{{ $pesanan->no_pesanan }}</span></div>
            <div class="info-row"><span class="info-label">Nama</span><span class="info-value">{{ $pesanan->nama }}</span></div>
            <div class="info-row"><span class="info-label">Telepon</span><span class="info-value">{{ $pesanan->telepon }}</span></div>
            <div class="info-row"><span class="info-label">Alamat</span><span class="info-value" style="max-width:200px">{{ $pesanan->alamat }}</span></div>
            <div class="info-row"><span class="info-label">Lokasi Camping</span><span class="info-value">{{ $pesanan->lokasi }}</span></div>
        </div>

        <div class="card">
            <div class="card-title">⛺ Detail Sewa</div>
            <div class="info-row"><span class="info-label">Paket</span><span class="info-value" style="color:#e8a020">Paket {{ $pesanan->paket }}</span></div>
            <div class="info-row"><span class="info-label">Tgl Mulai</span><span class="info-value">{{ $pesanan->tgl_mulai }}</span></div>
            <div class="info-row"><span class="info-label">Tgl Selesai</span><span class="info-value">{{ $pesanan->tgl_selesai }}</span></div>
            <div class="info-row"><span class="info-label">Jumlah Hari</span><span class="info-value">{{ $pesanan->jumlah_hari }} hari</span></div>
            <div class="info-row"><span class="info-label">Harga/Hari</span><span class="info-value">Rp {{ number_format($pesanan->harga_satuan,0,',','.') }}</span></div>
            <div class="info-row total-row"><span class="info-label">Total Bayar</span><span class="info-value">Rp {{ number_format($pesanan->total,0,',','.') }}</span></div>
            @if($pesanan->catatan)
            <div class="info-row"><span class="info-label">Catatan</span><span class="info-value">{{ $pesanan->catatan }}</span></div>
            @endif
        </div>

        <div class="card ktp-card">
            <div class="card-title">🪪 Foto KTP</div>
            @if($pesanan->foto_ktp)
            <img src="{{ asset('storage/'.$pesanan->foto_ktp) }}" alt="Foto KTP {{ $pesanan->nama }}" class="ktp-img">
            @else
            <p style="color:#aaa;text-align:center;padding:20px">Foto KTP tidak tersedia</p>
            @endif
        </div>

        <div class="card status-card">
            <div class="card-title">🔄 Update Status & Aksi</div>
            <div class="info-row"><span class="info-label">Status Sekarang</span>
                <span>
                    @if($pesanan->status == 'pending')
                        <span class="badge badge-pending">Pending</span>
                    @elseif($pesanan->status == 'dikonfirmasi')
                        <span class="badge badge-dikonfirmasi">Dikonfirmasi</span>
                    @elseif($pesanan->status == 'selesai')
                        <span class="badge badge-selesai">Selesai</span>
                    @else
                        <span class="badge badge-batal">Batal</span>
                    @endif
                </span>
            </div>
            <form method="POST" action="{{ route('admin.status', $pesanan->id) }}" class="status-form">
                @csrf
                <select name="status">
                    <option value="pending" {{ $pesanan->status=='pending'?'selected':'' }}>Pending</option>
                    <option value="dikonfirmasi" {{ $pesanan->status=='dikonfirmasi'?'selected':'' }}>Dikonfirmasi</option>
                    <option value="selesai" {{ $pesanan->status=='selesai'?'selected':'' }}>Selesai</option>
                    <option value="batal" {{ $pesanan->status=='batal'?'selected':'' }}>Batal</option>
                </select>
                <button type="submit" class="btn-update">💾 Update Status</button>
                <a href="https://wa.me/62{{ ltrim($pesanan->telepon, '0') }}?text=Halo%20{{ urlencode($pesanan->nama) }}%2C%20pesanan%20Sobat%20Outdoor%20kamu%20dengan%20No.%20{{ $pesanan->no_pesanan }}%20sudah%20dikonfirmasi!%20Total%20pembayaran%20Rp%20{{ number_format($pesanan->total,0,'.','.') }}.%20Terima%20kasih!" class="btn-wa" target="_blank">💬 WA Pelanggan</a>
            </form>
        </div>

    </div>
</div>
</body>
</html>
