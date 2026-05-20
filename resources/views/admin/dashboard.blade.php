<!DOCTYPE html>
<html lang="id">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Dashboard Admin - Sobat Outdoor</title>
<link href="https://fonts.googleapis.com/css2?family=Bebas+Neue&family=Nunito:wght@400;600;700;800&display=swap" rel="stylesheet">
<style>
*{margin:0;padding:0;box-sizing:border-box}
body{font-family:'Nunito',sans-serif;background:#f5f5f0;min-height:100vh}
.admin-navbar{background:#1a3a1a;padding:0 24px;height:62px;display:flex;align-items:center;justify-content:space-between;border-bottom:2px solid #e8a020;position:sticky;top:0;z-index:100}
.admin-brand{font-family:'Bebas Neue',sans-serif;font-size:20px;color:#fff;letter-spacing:2px}
.admin-brand span{color:#e8a020}
.admin-nav-right{display:flex;align-items:center;gap:16px}
.admin-nav-right a{color:rgba(255,255,255,0.7);font-size:13px;font-weight:600;text-decoration:none;transition:color 0.2s}
.admin-nav-right a:hover{color:#e8a020}
.btn-logout{background:rgba(229,57,53,0.2);color:#ff6b6b!important;padding:7px 14px;border-radius:7px;border:1px solid rgba(229,57,53,0.3)}
.admin-content{max-width:1200px;margin:0 auto;padding:28px 20px}
.page-header{margin-bottom:28px}
.page-header h1{font-family:'Bebas Neue',sans-serif;font-size:32px;color:#1a3a1a;letter-spacing:1px}
.page-header p{color:#555;font-size:14px;margin-top:4px}
.stats-grid{display:grid;grid-template-columns:repeat(auto-fit,minmax(200px,1fr));gap:18px;margin-bottom:28px}
.stat-card{background:#fff;border-radius:12px;padding:22px;border-left:4px solid #e8a020;box-shadow:0 2px 12px rgba(0,0,0,0.06)}
.stat-card.pending{border-color:#f59e0b}
.stat-card.konfirmasi{border-color:#3b82f6}
.stat-card.selesai{border-color:#10b981}
.stat-card-num{font-family:'Bebas Neue',sans-serif;font-size:42px;color:#1a3a1a;line-height:1}
.stat-card-label{font-size:13px;color:#555;font-weight:700;text-transform:uppercase;letter-spacing:0.5px;margin-top:4px}
.filter-bar{background:#fff;border-radius:12px;padding:18px 20px;margin-bottom:20px;display:flex;gap:12px;flex-wrap:wrap;align-items:center;box-shadow:0 2px 12px rgba(0,0,0,0.06)}
.filter-bar form{display:flex;gap:10px;flex-wrap:wrap;width:100%}
.filter-bar input{flex:1;min-width:200px;padding:10px 14px;border:2px solid #e0e0e0;border-radius:8px;font-family:'Nunito',sans-serif;font-size:14px}
.filter-bar input:focus{outline:none;border-color:#e8a020}
.filter-bar select{padding:10px 14px;border:2px solid #e0e0e0;border-radius:8px;font-family:'Nunito',sans-serif;font-size:14px;background:#fff}
.btn-filter{background:#1a3a1a;color:#fff;border:none;padding:10px 20px;border-radius:8px;font-family:'Nunito',sans-serif;font-weight:700;cursor:pointer;font-size:14px}
.btn-reset{background:#f5f5f0;color:#555;border:2px solid #e0e0e0;padding:10px 16px;border-radius:8px;font-family:'Nunito',sans-serif;font-weight:700;cursor:pointer;font-size:14px;text-decoration:none;display:inline-block}
.table-card{background:#fff;border-radius:12px;overflow:hidden;box-shadow:0 2px 12px rgba(0,0,0,0.06)}
.table-header{padding:18px 20px;border-bottom:2px solid #f5f5f0;display:flex;justify-content:space-between;align-items:center}
.table-header h3{font-size:16px;font-weight:800;color:#1a3a1a}
.table-wrap{overflow-x:auto}
table{width:100%;border-collapse:collapse;font-size:13px}
thead tr{background:#f5f5f0}
thead th{padding:12px 16px;text-align:left;font-weight:800;color:#1a3a1a;text-transform:uppercase;letter-spacing:0.5px;font-size:11px;white-space:nowrap}
tbody tr{border-bottom:1px solid #f0f0f0;transition:background 0.2s}
tbody tr:hover{background:#fafaf8}
tbody td{padding:13px 16px;color:#333;vertical-align:middle}
.badge{display:inline-block;padding:4px 10px;border-radius:20px;font-size:11px;font-weight:800;text-transform:uppercase;letter-spacing:0.5px}
.badge-pending{background:#fef3c7;color:#d97706}
.badge-dikonfirmasi{background:#dbeafe;color:#2563eb}
.badge-selesai{background:#d1fae5;color:#059669}
.badge-batal{background:#fee2e2;color:#dc2626}
.btn-detail{background:#1a3a1a;color:#fff;padding:6px 14px;border-radius:7px;font-size:12px;font-weight:700;text-decoration:none;transition:all 0.2s;display:inline-block}
.btn-detail:hover{background:#e8a020;color:#1a3a1a}
.no-pesanan{font-family:monospace;font-size:12px;color:#666;background:#f5f5f0;padding:3px 8px;border-radius:5px}
.pagination{padding:18px 20px;display:flex;justify-content:center}
.pagination a,.pagination span{display:inline-block;padding:8px 14px;margin:0 3px;border-radius:8px;font-size:13px;font-weight:700;border:2px solid #e0e0e0;color:#555;text-decoration:none;transition:all 0.2s}
.pagination a:hover{border-color:#e8a020;color:#e8a020}
.pagination .active span{background:#e8a020;border-color:#e8a020;color:#1a3a1a}
.alert-success{background:#d1fae5;border:1px solid #a7f3d0;color:#065f46;padding:12px 16px;border-radius:8px;margin-bottom:20px;font-weight:600}
@media(max-width:768px){.admin-navbar{padding:0 14px}.admin-content{padding:20px 14px}.stats-grid{grid-template-columns:repeat(2,1fr)}.filter-bar form{flex-direction:column}.filter-bar input{min-width:100%}}
@media(max-width:480px){.stats-grid{grid-template-columns:1fr}}
</style>
</head>
<body>

<nav class="admin-navbar">
    <div class="admin-brand">SOBAT<span>OUTDOOR</span> <span style="font-size:13px;color:rgba(255,255,255,0.4);font-family:'Nunito',sans-serif;font-weight:600">Admin</span></div>
    <div class="admin-nav-right">
        <a href="{{ url('/') }}" target="_blank">🌐 Lihat Website</a>
        <a href="{{ route('admin.logout') }}" class="btn-logout">🚪 Logout</a>
    </div>
</nav>

<div class="admin-content">

    <div class="page-header">
        <h1>📊 Dashboard Admin</h1>
        <p>Kelola semua pesanan masuk Sobat Outdoor</p>
    </div>

    @if(session('success'))
    <div class="alert-success">✅ {{ session('success') }}</div>
    @endif

    <div class="stats-grid">
        <div class="stat-card">
            <div class="stat-card-num">{{ $total }}</div>
            <div class="stat-card-label">Total Pesanan</div>
        </div>
        <div class="stat-card pending">
            <div class="stat-card-num">{{ $pending }}</div>
            <div class="stat-card-label">Menunggu</div>
        </div>
        <div class="stat-card konfirmasi">
            <div class="stat-card-num">{{ $konfirmasi }}</div>
            <div class="stat-card-label">Dikonfirmasi</div>
        </div>
        <div class="stat-card selesai">
            <div class="stat-card-num">{{ $selesai }}</div>
            <div class="stat-card-label">Selesai</div>
        </div>
    </div>

    <div class="filter-bar">
        <form method="GET" action="{{ route('admin.dashboard') }}">
            <input type="text" name="cari" placeholder="🔍 Cari nama, telepon, no pesanan..." value="{{ $cari }}">
            <select name="status">
                <option value="semua" {{ $status=='semua'?'selected':'' }}>Semua Status</option>
                <option value="pending" {{ $status=='pending'?'selected':'' }}>Pending</option>
                <option value="dikonfirmasi" {{ $status=='dikonfirmasi'?'selected':'' }}>Dikonfirmasi</option>
                <option value="selesai" {{ $status=='selesai'?'selected':'' }}>Selesai</option>
                <option value="batal" {{ $status=='batal'?'selected':'' }}>Batal</option>
            </select>
            <button type="submit" class="btn-filter">Filter</button>
            <a href="{{ route('admin.dashboard') }}" class="btn-reset">Reset</a>
        </form>
    </div>

    <div class="table-card">
        <div class="table-header">
            <h3>📋 Daftar Pesanan</h3>
            <span style="font-size:13px;color:#888">{{ $pesanan->total() }} pesanan ditemukan</span>
        </div>
        <div class="table-wrap">
            <table>
                <thead>
                    <tr>
                        <th>No. Pesanan</th>
                        <th>Nama</th>
                        <th>Telepon</th>
                        <th>Paket</th>
                        <th>Tgl Sewa</th>
                        <th>Hari</th>
                        <th>Total</th>
                        <th>Status</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($pesanan as $p)
                    <tr>
                        <td><span class="no-pesanan">{{ $p->no_pesanan }}</span></td>
                        <td><strong>{{ $p->nama }}</strong></td>
                        <td>{{ $p->telepon }}</td>
                        <td><strong style="color:#e8a020">Paket {{ $p->paket }}</strong></td>
                        <td>{{ $p->tgl_mulai }}</td>
                        <td>{{ $p->jumlah_hari }} hari</td>
                        <td><strong>Rp {{ number_format($p->total,0,',','.') }}</strong></td>
                        <td>
                            @if($p->status == 'pending')
                                <span class="badge badge-pending">Pending</span>
                            @elseif($p->status == 'dikonfirmasi')
                                <span class="badge badge-dikonfirmasi">Dikonfirmasi</span>
                            @elseif($p->status == 'selesai')
                                <span class="badge badge-selesai">Selesai</span>
                            @else
                                <span class="badge badge-batal">Batal</span>
                            @endif
                        </td>
                        <td><a href="{{ route('admin.detail', $p->id) }}" class="btn-detail">Detail</a></td>
                    </tr>
                    @empty
                    <tr><td colspan="9" style="text-align:center;padding:40px;color:#aaa">Belum ada pesanan</td></tr>
                    @endforelse
                </tbody>
            </table>
        </div>
        <div class="pagination">
            {{ $pesanan->appends(request()->query())->links() }}
        </div>
    </div>

</div>
</body>
</html>
