<!DOCTYPE html>
<html lang="id">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Admin Login - Sobat Outdoor</title>
<link href="https://fonts.googleapis.com/css2?family=Bebas+Neue&family=Nunito:wght@400;600;700;800&display=swap" rel="stylesheet">
<style>
*{margin:0;padding:0;box-sizing:border-box}
body{font-family:'Nunito',sans-serif;background:#0d1f0d;min-height:100vh;display:flex;align-items:center;justify-content:center;padding:20px}
.login-box{background:#1a3a1a;border-radius:16px;padding:40px 36px;width:100%;max-width:420px;border:2px solid rgba(232,160,32,0.3);box-shadow:0 20px 60px rgba(0,0,0,0.5)}
.login-logo{text-align:center;margin-bottom:32px}
.login-logo svg{width:52px;height:52px;margin-bottom:10px}
.login-logo h1{font-family:'Bebas Neue',sans-serif;font-size:28px;color:#fff;letter-spacing:2px}
.login-logo h1 span{color:#e8a020}
.login-logo p{color:rgba(255,255,255,0.5);font-size:13px;margin-top:4px}
.form-group{margin-bottom:20px}
.form-group label{display:block;color:rgba(255,255,255,0.7);font-size:13px;font-weight:700;margin-bottom:8px;text-transform:uppercase;letter-spacing:0.5px}
.form-group input{width:100%;padding:13px 16px;background:rgba(255,255,255,0.07);border:2px solid rgba(255,255,255,0.1);border-radius:10px;color:#fff;font-family:'Nunito',sans-serif;font-size:15px;transition:border 0.2s}
.form-group input:focus{outline:none;border-color:#e8a020;background:rgba(255,255,255,0.1)}
.form-group input::placeholder{color:rgba(255,255,255,0.3)}
.btn-login{width:100%;background:#e8a020;color:#1a3a1a;border:none;padding:14px;border-radius:10px;font-family:'Nunito',sans-serif;font-weight:800;font-size:16px;cursor:pointer;transition:all 0.2s;margin-top:8px}
.btn-login:hover{background:#f5c050;transform:translateY(-2px)}
.alert-error{background:rgba(229,57,53,0.15);border:1px solid rgba(229,57,53,0.4);color:#ff6b6b;padding:12px 16px;border-radius:8px;font-size:14px;margin-bottom:20px;text-align:center}
.back-link{text-align:center;margin-top:20px}
.back-link a{color:rgba(255,255,255,0.4);font-size:13px;text-decoration:none;transition:color 0.2s}
.back-link a:hover{color:#e8a020}
</style>
</head>
<body>
<div class="login-box">
    <div class="login-logo">
        <svg viewBox="0 0 40 40" fill="none">
            <polygon points="20,3 37,34 3,34" fill="none" stroke="#e8a020" stroke-width="2.5"/>
            <line x1="20" y1="3" x2="20" y2="34" stroke="#e8a020" stroke-width="1.5" stroke-dasharray="3,3"/>
        </svg>
        <h1>SOBAT<span>OUTDOOR</span></h1>
        <p>Panel Admin</p>
    </div>

    @if(session('error'))
    <div class="alert-error">❌ {{ session('error') }}</div>
    @endif

    <form method="POST" action="{{ route('admin.masuk') }}">
        @csrf
        <div class="form-group">
            <label>Username</label>
            <input type="text" name="username" placeholder="Masukkan username" required>
        </div>
        <div class="form-group">
            <label>Password</label>
            <input type="password" name="password" placeholder="Masukkan password" required>
        </div>
        <button type="submit" class="btn-login">🔐 Masuk Admin</button>
    </form>

    <div class="back-link">
        <a href="{{ url('/') }}">← Kembali ke Website</a>
    </div>
</div>
</body>
</html>
