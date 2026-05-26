<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Login – PetCare</title>
    <link rel="icon" type="image/svg+xml" href="/favicon.svg">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700;800;900&display=swap" rel="stylesheet">
    <style>
        *, *::before, *::after { box-sizing: border-box; margin: 0; padding: 0; }
        body {
            font-family: 'Nunito', sans-serif;
            min-height: 100vh;
            background: linear-gradient(135deg, #FFF0F5 0%, #F0EEFF 100%);
            display: flex;
            align-items: center;
            justify-content: center;
            padding: 20px;
        }
        .card {
            background: #fff;
            border-radius: 28px;
            border: 2px solid #FFD6E4;
            padding: 40px 36px;
            width: 100%;
            max-width: 380px;
            box-shadow: 0 12px 48px rgba(0,0,0,0.10);
            text-align: center;
        }
        .logo {
            width: 72px; height: 72px;
            margin: 0 auto 16px;
            background: linear-gradient(135deg, #FF6B9D, #9B8FD4);
            border-radius: 22px;
            display: flex; align-items: center; justify-content: center;
            box-shadow: 0 8px 24px rgba(0,0,0,0.12);
        }
        h1 { font-weight: 900; font-size: 22px; color: #2D1B33; margin-bottom: 4px; }
        .subtitle { font-size: 13px; color: #7B5E78; margin-bottom: 28px; }
        .error-box {
            background: #FFF0F5;
            border: 1.5px solid #FF6B9D;
            border-radius: 12px;
            padding: 10px 14px;
            margin-bottom: 16px;
            font-size: 13px;
            font-weight: 700;
            color: #E8456E;
        }
        .field { margin-bottom: 14px; text-align: left; }
        .field label {
            display: block;
            font-size: 12px;
            font-weight: 800;
            color: #7B5E78;
            letter-spacing: 0.5px;
            text-transform: uppercase;
            margin-bottom: 6px;
        }
        .field input {
            width: 100%;
            padding: 12px 16px;
            border: 2px solid #FFD6E4;
            border-radius: 14px;
            font-size: 14px;
            color: #2D1B33;
            font-family: 'Nunito', sans-serif;
            outline: none;
            transition: border-color 0.2s;
        }
        .field input:focus { border-color: #FF6B9D; }
        .btn-submit {
            width: 100%;
            background: linear-gradient(135deg, #FF6B9D, #9B8FD4);
            color: #fff;
            border: none;
            border-radius: 14px;
            padding: 13px;
            font-size: 15px;
            font-weight: 700;
            font-family: 'Nunito', sans-serif;
            cursor: pointer;
            margin-top: 10px;
            transition: opacity 0.2s;
        }
        .btn-submit:hover { opacity: 0.9; }
        .hint {
            margin-top: 20px;
            padding: 12px;
            background: #FFF0F5;
            border-radius: 12px;
            font-size: 12px;
            color: #7B5E78;
        }
        .hint strong { color: #FF6B9D; }
        .back-link {
            display: inline-block;
            margin-top: 16px;
            font-size: 12px;
            color: #B8A0B5;
            font-weight: 700;
            text-decoration: none;
        }
        .back-link:hover { color: #FF6B9D; }
    </style>
</head>
<body>
    <div class="card">
        <div class="logo">
            <svg width="44" height="44" viewBox="0 0 100 100">
                <ellipse cx="50" cy="68" rx="24" ry="20" fill="#fff"/>
                <ellipse cx="23" cy="47" rx="11" ry="9" fill="#fff"/>
                <ellipse cx="41" cy="36" rx="11" ry="9" fill="#fff"/>
                <ellipse cx="61" cy="36" rx="11" ry="9" fill="#fff"/>
                <ellipse cx="79" cy="47" rx="11" ry="9" fill="#fff"/>
            </svg>
        </div>
        <h1>PetCare Admin</h1>
        <p class="subtitle">Masuk untuk mengelola antrian</p>

        @if(session('login_error'))
            <div class="error-box">⚠️ {{ session('login_error') }}</div>
        @endif

        <form method="POST" action="/admin/login">
            @csrf
            <div class="field">
                <label>Username</label>
                <input type="text" name="username" value="{{ old('username', 'admin') }}" autocomplete="username">
            </div>
            <div class="field" style="margin-bottom:24px;">
                <label>Password</label>
                <input type="password" name="password" placeholder="Masukkan password..." autocomplete="current-password">
            </div>
            <button type="submit" class="btn-submit">🔑 Masuk ke Dashboard</button>
        </form>

        <a href="/" class="back-link">← Kembali ke Beranda</a>
    </div>
</body>
</html>
