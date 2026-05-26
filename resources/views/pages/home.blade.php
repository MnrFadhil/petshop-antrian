<x-app-layout>
    <x-slot name="title">Antrian Online Petshop 🐾</x-slot>

    {{-- Hero --}}
    <div style="background:linear-gradient(135deg,#FF6B9D 0%,#B490DA 55%,#7BBFF5 100%);padding:64px 20px 96px;text-align:center;border-radius:0 0 60% 60% / 0 0 56px 56px;position:relative;overflow:hidden;">
        {{-- Dekoratif paw --}}
        <div style="position:absolute;top:14px;left:24px;pointer-events:none;opacity:0.14;transform:rotate(-22deg);">
            <svg width="72" height="72" viewBox="0 0 100 100"><ellipse cx="50" cy="68" rx="24" ry="20" fill="#fff"/><ellipse cx="23" cy="47" rx="11" ry="9" fill="#fff"/><ellipse cx="41" cy="36" rx="11" ry="9" fill="#fff"/><ellipse cx="61" cy="36" rx="11" ry="9" fill="#fff"/><ellipse cx="79" cy="47" rx="11" ry="9" fill="#fff"/></svg>
        </div>
        <div style="position:absolute;bottom:30px;right:55px;pointer-events:none;opacity:0.10;transform:rotate(30deg);">
            <svg width="50" height="50" viewBox="0 0 100 100"><ellipse cx="50" cy="68" rx="24" ry="20" fill="#fff"/><ellipse cx="23" cy="47" rx="11" ry="9" fill="#fff"/><ellipse cx="41" cy="36" rx="11" ry="9" fill="#fff"/><ellipse cx="61" cy="36" rx="11" ry="9" fill="#fff"/><ellipse cx="79" cy="47" rx="11" ry="9" fill="#fff"/></svg>
        </div>
        <div style="position:absolute;top:58px;right:115px;pointer-events:none;opacity:0.11;transform:rotate(16deg);">
            <svg width="34" height="34" viewBox="0 0 100 100"><ellipse cx="50" cy="68" rx="24" ry="20" fill="#fff"/><ellipse cx="23" cy="47" rx="11" ry="9" fill="#fff"/><ellipse cx="41" cy="36" rx="11" ry="9" fill="#fff"/><ellipse cx="61" cy="36" rx="11" ry="9" fill="#fff"/><ellipse cx="79" cy="47" rx="11" ry="9" fill="#fff"/></svg>
        </div>
        <div style="position:absolute;bottom:60px;left:80px;pointer-events:none;opacity:0.08;transform:rotate(-12deg);">
            <svg width="28" height="28" viewBox="0 0 100 100"><ellipse cx="50" cy="68" rx="24" ry="20" fill="#fff"/><ellipse cx="23" cy="47" rx="11" ry="9" fill="#fff"/><ellipse cx="41" cy="36" rx="11" ry="9" fill="#fff"/><ellipse cx="61" cy="36" rx="11" ry="9" fill="#fff"/><ellipse cx="79" cy="47" rx="11" ry="9" fill="#fff"/></svg>
        </div>

        <div style="position:relative;z-index:1;">
            <div class="hero-paw" style="width:92px;height:92px;margin:0 auto 20px;background:rgba(255,255,255,0.25);border-radius:50%;display:flex;align-items:center;justify-content:center;backdrop-filter:blur(6px);box-shadow:0 8px 32px rgba(0,0,0,0.1);">
                <svg width="56" height="56" viewBox="0 0 100 100">
                    <ellipse cx="50" cy="68" rx="24" ry="20" fill="#fff"/>
                    <ellipse cx="23" cy="47" rx="11" ry="9" fill="#fff"/>
                    <ellipse cx="41" cy="36" rx="11" ry="9" fill="#fff"/>
                    <ellipse cx="61" cy="36" rx="11" ry="9" fill="#fff"/>
                    <ellipse cx="79" cy="47" rx="11" ry="9" fill="#fff"/>
                </svg>
            </div>
            <h1 style="color:#fff;font-weight:900;font-size:clamp(22px,5vw,34px);margin:0 0 12px;text-shadow:0 2px 14px rgba(0,0,0,0.15);">Antrian Online Petshop 🐾</h1>
            <p style="color:rgba(255,255,255,0.92);font-size:15px;font-weight:600;max-width:420px;margin:0 auto;">Daftar dari rumah, kami kabari saat giliranmu tiba!</p>
        </div>
    </div>

    {{-- Cards --}}
    <div style="max-width:840px;margin:-36px auto 0;padding:0 20px;position:relative;z-index:2;">
        <div style="display:grid;grid-template-columns:repeat(auto-fit,minmax(260px,1fr));gap:16px;">

            {{-- Daftar Antrian --}}
            <a href="/daftar" style="background:#fff;border:2.5px solid #FFD6E4;border-radius:24px;padding:32px 24px;text-align:center;cursor:pointer;text-decoration:none;display:block;box-shadow:0 4px 20px rgba(0,0,0,0.06);transition:all 0.25s ease;">
                <div style="width:72px;height:72px;margin:0 auto 18px;background:linear-gradient(135deg,#FFF0F5,#FFD6E4);border-radius:50%;display:flex;align-items:center;justify-content:center;font-size:32px;">📋</div>
                <h2 style="font-size:19px;font-weight:800;color:#2D1B33;margin:0 0 8px;">Daftar Antrian</h2>
                <p style="font-size:13px;color:#7B5E78;margin:0 0 22px;line-height:1.6;">Isi form pendaftaran dan dapatkan nomor antrian via email. Gratis & tanpa login!</p>
                <span style="background:linear-gradient(135deg,#FF6B9D,#9B8FD4);color:#fff;border-radius:20px;padding:10px 24px;font-size:13px;font-weight:700;display:inline-block;">Daftar Sekarang →</span>
            </a>

            {{-- Cek Antrian --}}
            <a href="/cek" style="background:#fff;border:2.5px solid #B5EAD7;border-radius:24px;padding:32px 24px;text-align:center;cursor:pointer;text-decoration:none;display:block;box-shadow:0 4px 20px rgba(0,0,0,0.06);transition:all 0.25s ease;">
                <div style="width:72px;height:72px;margin:0 auto 18px;background:linear-gradient(135deg,#E8FAF6,#B5EAD7);border-radius:50%;display:flex;align-items:center;justify-content:center;font-size:32px;">🔍</div>
                <h2 style="font-size:19px;font-weight:800;color:#2D1B33;margin:0 0 8px;">Cek Antrian</h2>
                <p style="font-size:13px;color:#7B5E78;margin:0 0 22px;line-height:1.6;">Sudah punya nomor antrian? Cek posisimu sekarang kapan saja dan dari mana saja.</p>
                <span style="background:linear-gradient(135deg,#2EC4A7,#9B8FD4);color:#fff;border-radius:20px;padding:10px 24px;font-size:13px;font-weight:700;display:inline-block;">Cek Posisi →</span>
            </a>
        </div>

        {{-- Layanan --}}
        <div style="margin-top:28px;">
            <h2 style="text-align:center;font-size:17px;font-weight:800;color:#2D1B33;margin-bottom:14px;">Layanan Tersedia ✨</h2>
            <div style="display:grid;grid-template-columns:repeat(auto-fit,minmax(230px,1fr));gap:12px;">
                <div style="background:#FFF0F5;border:2px solid #FFD6E4;border-radius:20px;padding:18px 20px;display:flex;align-items:flex-start;gap:14px;">
                    <span style="font-size:28px;flex-shrink:0;">✂️</span>
                    <div>
                        <div style="font-weight:800;font-size:15px;color:#2D1B33;margin-bottom:4px;">Grooming</div>
                        <div style="font-size:13px;color:#7B5E78;line-height:1.5;">Mandi, potong rambut, perawatan kuku, dan kebersihan hewan peliharaanmu.</div>
                    </div>
                </div>
                <div style="background:#E8FAF6;border:2px solid #B5EAD7;border-radius:20px;padding:18px 20px;display:flex;align-items:flex-start;gap:14px;">
                    <span style="font-size:28px;flex-shrink:0;">🩺</span>
                    <div>
                        <div style="font-weight:800;font-size:15px;color:#2D1B33;margin-bottom:4px;">Pemeriksaan Dokter</div>
                        <div style="font-size:13px;color:#7B5E78;line-height:1.5;">Konsultasi dan pemeriksaan kesehatan oleh dokter hewan berpengalaman.</div>
                    </div>
                </div>
            </div>
        </div>

        {{-- Cara kerja --}}
        <div style="margin:20px 0 36px;background:#FFF8E0;border:2px solid #FFD166;border-radius:20px;padding:18px 22px;font-size:14px;color:#7A5C00;font-weight:600;">
            🌟 <strong>Cara Kerja:</strong> Daftar → Terima email nomor antrian → Tunggu notifikasi → Datang ke lokasi saat dipanggil. Mudah banget!
        </div>
    </div>
</x-app-layout>
