<x-app-layout>
    <x-slot name="title">Cek Antrian 🔍</x-slot>
    <div style="background:#FFF5F9;min-height:calc(100vh - 140px);padding:32px 20px;">
        <div style="max-width:480px;margin:0 auto;">
            <div style="text-align:center;margin-bottom:24px;">
                <div style="width:60px;height:60px;margin:0 auto 12px;background:linear-gradient(135deg,#2EC4A7,#9B8FD4);border-radius:18px;display:flex;align-items:center;justify-content:center;font-size:30px;">🔍</div>
                <h1 style="font-weight:900;font-size:22px;color:#2D1B33;margin:0 0 4px;">Cek Antrian</h1>
                <p style="font-size:13px;color:#7B5E78;">Masukkan nomor antrian yang kamu terima via email</p>
            </div>
            <livewire:cek-antrian />
        </div>
    </div>
</x-app-layout>
