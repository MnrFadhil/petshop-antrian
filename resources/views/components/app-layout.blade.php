<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $title ?? 'Antrian Petshop' }}</title>
    <link rel="icon" type="image/svg+xml" href="/favicon.svg">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;500;600;700;800;900&display=swap" rel="stylesheet">
    <script src="https://cdn.tailwindcss.com"></script>
    <script>
        tailwind.config = {
            theme: {
                extend: {
                    colors: {
                        primary: '#FF6B9D',
                        secondary: '#9B8FD4',
                    },
                    fontFamily: {
                        sans: ['Nunito', 'sans-serif'],
                    }
                }
            }
        }
    </script>
    <style>
        *, *::before, *::after { box-sizing: border-box; }
        body { font-family: 'Nunito', sans-serif; background: #FFF5F9; }

        :root {
            --primary:       #FF6B9D;
            --primary-dark:  #E8456E;
            --primary-light: #FFD6E4;
            --primary-pale:  #FFF0F5;
        }

        /* Loading screen */
        #ps-loader {
            position: fixed; inset: 0; z-index: 9999;
            background: linear-gradient(135deg, #FFF0F5 0%, #F0EEFF 100%);
            display: flex; flex-direction: column;
            align-items: center; justify-content: center;
            transition: opacity 0.5s ease;
        }
        #ps-loader.hide { opacity: 0; pointer-events: none; }

        /* Paw animations */
        @keyframes loadBounce {
            0%, 100% { transform: translateY(0) scale(1); }
            50%       { transform: translateY(-26px) scale(0.92); }
        }
        @keyframes pawPop {
            0%   { opacity: 0; transform: scale(0) rotate(-30deg); }
            70%  { transform: scale(1.25) rotate(8deg); }
            100% { opacity: 1; transform: scale(1) rotate(0deg); }
        }
        @keyframes fadeUp {
            from { opacity: 0; transform: translateY(20px); }
            to   { opacity: 1; transform: translateY(0); }
        }
        @keyframes ringPulse {
            0%   { transform: scale(1);   opacity: 0.5; }
            100% { transform: scale(2.2); opacity: 0; }
        }
        @keyframes dotBlink {
            0%, 80%, 100% { opacity: 0.2; transform: scale(0.7); }
            40%            { opacity: 1;   transform: scale(1.3); }
        }
        @keyframes heroBounce {
            0%, 100% { transform: translateY(0); }
            50%       { transform: translateY(-14px); }
        }
        @keyframes successPop {
            0%   { transform: scale(0) rotate(-10deg); opacity: 0; }
            70%  { transform: scale(1.2) rotate(3deg); }
            100% { transform: scale(1) rotate(0deg); opacity: 1; }
        }

        .load-bounce { animation: loadBounce 1.2s ease-in-out infinite; }
        .load-ring   { animation: ringPulse 1.2s ease-out infinite; }
        .paw-trail-1 { animation: pawPop 0.5s cubic-bezier(0.34,1.56,0.64,1) forwards; opacity:0; animation-delay:0.2s; }
        .paw-trail-2 { animation: pawPop 0.5s cubic-bezier(0.34,1.56,0.64,1) forwards; opacity:0; animation-delay:0.5s; }
        .paw-trail-3 { animation: pawPop 0.5s cubic-bezier(0.34,1.56,0.64,1) forwards; opacity:0; animation-delay:0.8s; }
        .paw-trail-4 { animation: pawPop 0.5s cubic-bezier(0.34,1.56,0.64,1) forwards; opacity:0; animation-delay:1.1s; }
        .paw-trail-5 { animation: pawPop 0.5s cubic-bezier(0.34,1.56,0.64,1) forwards; opacity:0; animation-delay:1.4s; }
        .load-title  { animation: fadeUp 0.6s ease forwards; opacity:0; animation-delay:0.3s; }
        .load-sub    { animation: fadeUp 0.6s ease forwards; opacity:0; animation-delay:0.65s; }
        .load-dots   { animation: fadeUp 0.6s ease forwards; opacity:0; animation-delay:1.0s; }
        .dot1 { animation: dotBlink 1.4s 0.00s infinite; display:inline-block; }
        .dot2 { animation: dotBlink 1.4s 0.45s infinite; display:inline-block; }
        .dot3 { animation: dotBlink 1.4s 0.90s infinite; display:inline-block; }

        .hero-paw    { animation: heroBounce 2.5s ease-in-out infinite; }
        .success-pop { animation: successPop 0.5s cubic-bezier(0.34,1.56,0.64,1) forwards; }

        /* Nav pill active */
        .nav-link-active {
            background: linear-gradient(135deg, #FF6B9D, #9B8FD4);
            color: #fff !important;
            border-radius: 20px;
            padding: 8px 14px;
        }
        .nav-link {
            color: #7B5E78;
            padding: 8px 14px;
            border-radius: 20px;
            border: 1.5px solid transparent;
            transition: all 0.2s;
            font-weight: 700;
            font-size: 13px;
            white-space: nowrap;
        }
        .nav-link:hover { border-color: #FFD6E4; color: #FF6B9D; }

        /* Scrollbar */
        ::-webkit-scrollbar { width: 6px; }
        ::-webkit-scrollbar-track { background: #FFF0F5; }
        ::-webkit-scrollbar-thumb { background: #FFB3C9; border-radius: 3px; }

        /* Responsive navbar */
        @media (max-width: 580px) {
            .nav-brand-text { display: none !important; }
            .nav-label      { display: none !important; }
            .nav-link, .nav-link-active { padding: 8px 12px !important; font-size: 16px !important; }
        }
    </style>
    @livewireStyles
</head>
<body class="min-h-screen flex flex-col">

    {{-- Loading Screen --}}
    <div id="ps-loader">
        <div style="position:relative; width:120px; height:120px; margin-bottom:24px;">
            <div class="load-ring" style="position:absolute;inset:0;border-radius:50%;border:3px solid #FF6B9D;"></div>
            <div class="load-bounce" style="position:absolute;inset:0;display:flex;align-items:center;justify-content:center;">
                <svg width="72" height="72" viewBox="0 0 100 100">
                    <ellipse cx="50" cy="68" rx="24" ry="20" fill="#FF6B9D"/>
                    <ellipse cx="23" cy="47" rx="11" ry="9" fill="#FF6B9D"/>
                    <ellipse cx="41" cy="36" rx="11" ry="9" fill="#FF6B9D"/>
                    <ellipse cx="61" cy="36" rx="11" ry="9" fill="#FF6B9D"/>
                    <ellipse cx="79" cy="47" rx="11" ry="9" fill="#FF6B9D"/>
                </svg>
            </div>
        </div>
        {{-- 5 paw trail --}}
        <div style="display:flex;gap:8px;margin-bottom:20px;">
            <span class="paw-trail-1" style="font-size:22px;">🐾</span>
            <span class="paw-trail-2" style="font-size:22px;">🐾</span>
            <span class="paw-trail-3" style="font-size:22px;">🐾</span>
            <span class="paw-trail-4" style="font-size:22px;">🐾</span>
            <span class="paw-trail-5" style="font-size:22px;">🐾</span>
        </div>
        <p class="load-title" style="font-size:20px;font-weight:900;color:#2D1B33;margin:0 0 6px;">PetCare Queue</p>
        <p class="load-sub"   style="font-size:13px;font-weight:600;color:#7B5E78;margin:0 0 16px;">Memuat halaman...</p>
        <p class="load-dots"  style="font-size:22px;color:#FF6B9D;">
            <span class="dot1">●</span><span class="dot2">●</span><span class="dot3">●</span>
        </p>
    </div>

    {{-- Navbar --}}
    <nav style="background:#fff;border-bottom:2px solid #FFD6E4;position:sticky;top:0;z-index:100;box-shadow:0 2px 16px rgba(0,0,0,0.06);">
        <div style="max-width:920px;margin:0 auto;padding:11px 20px;display:flex;align-items:center;justify-content:space-between;">
            <a href="/" style="display:flex;align-items:center;gap:10px;text-decoration:none;">
                <div style="width:42px;height:42px;background:linear-gradient(135deg,#FF6B9D,#9B8FD4);border-radius:14px;display:flex;align-items:center;justify-content:center;box-shadow:0 4px 12px #FFD6E4;">
                    <svg width="26" height="26" viewBox="0 0 100 100">
                        <ellipse cx="50" cy="68" rx="24" ry="20" fill="#fff"/>
                        <ellipse cx="23" cy="47" rx="11" ry="9" fill="#fff"/>
                        <ellipse cx="41" cy="36" rx="11" ry="9" fill="#fff"/>
                        <ellipse cx="61" cy="36" rx="11" ry="9" fill="#fff"/>
                        <ellipse cx="79" cy="47" rx="11" ry="9" fill="#fff"/>
                    </svg>
                </div>
                <div class="nav-brand-text">
                    <div style="font-weight:900;font-size:17px;color:#2D1B33;line-height:1.2;">PetCare</div>
                    <div style="font-weight:700;font-size:9px;color:#7B5E78;letter-spacing:2px;">ANTRIAN ONLINE</div>
                </div>
            </a>
            <div style="display:flex;gap:6px;align-items:center;">
                <a href="/"      class="nav-link {{ request()->is('/') ? 'nav-link-active' : '' }}">🏠 <span class="nav-label">Beranda</span></a>
                <a href="/daftar" class="nav-link {{ request()->is('daftar') ? 'nav-link-active' : '' }}">📋 <span class="nav-label">Daftar</span></a>
                <a href="/cek"   class="nav-link {{ request()->is('cek') ? 'nav-link-active' : '' }}">🔍 <span class="nav-label">Cek Antrian</span></a>
            </div>
        </div>
    </nav>

    {{-- Content --}}
    <main class="flex-1">
        {{ $slot }}
    </main>

    {{-- Footer --}}
    <footer style="background:#fff;border-top:2px solid #FFD6E4;padding:18px 20px;text-align:center;font-size:13px;color:#B8A0B5;font-weight:600;">
        &copy; {{ date('Y') }} PetCare Queue System &bull; 🐾 Dengan cinta untuk hewan peliharaanmu
        <br>
        <a href="/admin" style="color:#B8A0B5;font-size:12px;font-weight:600;text-decoration:underline;background:none;border:none;cursor:pointer;">Admin</a>
    </footer>

    @livewireScripts

    <script>
        (function () {
            var loader = document.getElementById('ps-loader');
            if (!loader) return;
            setTimeout(function () {
                loader.classList.add('hide');
                setTimeout(function () {
                    loader.style.display = 'none';
                }, 500);
            }, 2500);
        })();
    </script>
</body>
</html>
