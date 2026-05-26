<x-app-layout>
    <x-slot name="title">Daftar Antrian 🐾</x-slot>
    <div style="background:#FFF5F9;min-height:calc(100vh - 140px);padding:32px 20px;">
        <div style="max-width:480px;margin:0 auto;">
            <div style="text-align:center;margin-bottom:24px;">
                <div style="width:60px;height:60px;margin:0 auto 12px;background:linear-gradient(135deg,#FF6B9D,#9B8FD4);border-radius:18px;display:flex;align-items:center;justify-content:center;">
                    <svg width="36" height="36" viewBox="0 0 100 100">
                        <ellipse cx="50" cy="68" rx="24" ry="20" fill="#fff"/>
                        <ellipse cx="23" cy="47" rx="11" ry="9" fill="#fff"/>
                        <ellipse cx="41" cy="36" rx="11" ry="9" fill="#fff"/>
                        <ellipse cx="61" cy="36" rx="11" ry="9" fill="#fff"/>
                        <ellipse cx="79" cy="47" rx="11" ry="9" fill="#fff"/>
                    </svg>
                </div>
                <h1 style="font-weight:900;font-size:22px;color:#2D1B33;margin:0 0 4px;">Daftar Antrian</h1>
                <p style="font-size:13px;color:#7B5E78;">Isi form di bawah ini untuk mendaftar 🐾</p>
            </div>
            <livewire:daftar-antrian />
        </div>
    </div>
</x-app-layout>
