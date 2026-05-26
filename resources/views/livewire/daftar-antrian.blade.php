<div>
    @if($submitted)
        {{-- ===== SUCCESS STATE ===== --}}
        <div style="background:#fff;border:2px solid #FFD6E4;border-radius:28px;padding:48px 36px;text-align:center;box-shadow:0 8px 40px rgba(0,0,0,0.08);">
            <div class="success-pop" style="font-size:64px;margin-bottom:16px;display:inline-block;">🎉</div>
            <h2 style="font-weight:900;font-size:24px;color:#2D1B33;margin:0 0 8px;">Pendaftaran Berhasil!</h2>
            <p style="font-size:14px;color:#7B5E78;margin-bottom:28px;line-height:1.6;">Kami akan kirim notifikasi email saat giliranmu hampir tiba.</p>

            <div style="background:linear-gradient(135deg,#FFF0F5,#F0EEFF);border:2.5px solid #FFD6E4;border-radius:22px;padding:24px 32px;margin-bottom:28px;">
                <div style="font-size:11px;color:#B8A0B5;font-weight:800;letter-spacing:2px;text-transform:uppercase;margin-bottom:6px;">Nomor Antrianmu</div>
                <div style="font-size:54px;font-weight:900;color:#FF6B9D;line-height:1.1;">{{ $queue_number }}</div>
                <div style="font-size:12px;color:#B8A0B5;margin-top:6px;">Detail dikirim ke email kamu 📧</div>
            </div>

            @if($is_empty_queue)
                <div style="background:#E8FAF6;border:2px solid #B5EAD7;border-radius:14px;padding:14px 16px;margin-bottom:20px;font-size:13px;color:#166534;font-weight:700;">
                    🚀 Antrian sedang kosong! Kamu bisa langsung datang ke toko sekarang.
                </div>
            @endif

            <div style="display:flex;gap:10px;justify-content:center;flex-wrap:wrap;">
                <a href="/cek" style="background:linear-gradient(135deg,#FF6B9D,#9B8FD4);color:#fff;border-radius:20px;padding:11px 22px;font-size:14px;font-weight:700;text-decoration:none;display:inline-block;">Cek Posisi Antrian →</a>
                <a href="/" style="background:transparent;border:2px solid #FFD6E4;color:#7B5E78;border-radius:20px;padding:9px 22px;font-size:14px;font-weight:700;text-decoration:none;display:inline-block;">Kembali ke Beranda</a>
            </div>
        </div>

    @else
        {{-- ===== FORM STATE ===== --}}
        <div style="background:#fff;border:2px solid #FFD6E4;border-radius:24px;padding:28px;box-shadow:0 4px 24px rgba(0,0,0,0.06);">
            <form wire:submit.prevent="submit">

                {{-- Nama Pemilik --}}
                <div style="margin-bottom:16px;">
                    <label style="display:block;font-size:13px;font-weight:800;color:#2D1B33;margin-bottom:6px;">
                        Nama Pemilik <span style="color:#FF6B9D;">*</span>
                    </label>
                    <input type="text" wire:model="owner_name" placeholder="Contoh: Siti Aminah"
                        style="width:100%;padding:12px 16px;border:2px solid {{ $errors->has('owner_name') ? '#FF6B9D' : '#FFD6E4' }};border-radius:14px;font-size:14px;color:#2D1B33;font-family:'Nunito',sans-serif;outline:none;transition:all 0.2s;background:#fff;">
                    @error('owner_name')
                        <p style="color:#FF6B9D;font-size:11px;margin-top:4px;font-weight:700;">{{ $message }}</p>
                    @enderror
                </div>

                {{-- Email --}}
                <div style="margin-bottom:16px;">
                    <label style="display:block;font-size:13px;font-weight:800;color:#2D1B33;margin-bottom:6px;">
                        Email <span style="color:#FF6B9D;">*</span>
                    </label>
                    <input type="email" wire:model="email" placeholder="email@kamu.com"
                        style="width:100%;padding:12px 16px;border:2px solid {{ $errors->has('email') ? '#FF6B9D' : '#FFD6E4' }};border-radius:14px;font-size:14px;color:#2D1B33;font-family:'Nunito',sans-serif;outline:none;transition:all 0.2s;background:#fff;">
                    @error('email')
                        <p style="color:#FF6B9D;font-size:11px;margin-top:4px;font-weight:700;">{{ $message }}</p>
                    @enderror
                </div>

                {{-- Jenis Hewan --}}
                <div style="margin-bottom:16px;">
                    <label style="display:block;font-size:13px;font-weight:800;color:#2D1B33;margin-bottom:6px;">
                        Jenis Hewan <span style="color:#FF6B9D;">*</span>
                    </label>
                    <input type="text" wire:model="pet_type" placeholder="Contoh: Kucing, Anjing, Kelinci..."
                        style="width:100%;padding:12px 16px;border:2px solid {{ $errors->has('pet_type') ? '#FF6B9D' : '#FFD6E4' }};border-radius:14px;font-size:14px;color:#2D1B33;font-family:'Nunito',sans-serif;outline:none;transition:all 0.2s;background:#fff;">
                    @error('pet_type')
                        <p style="color:#FF6B9D;font-size:11px;margin-top:4px;font-weight:700;">{{ $message }}</p>
                    @enderror
                </div>

                {{-- Pilih Layanan --}}
                <div style="margin-bottom:16px;">
                    <label style="display:block;font-size:13px;font-weight:800;color:#2D1B33;margin-bottom:10px;">
                        Pilih Layanan <span style="color:#FF6B9D;">*</span>
                    </label>
                    <div style="display:grid;grid-template-columns:1fr 1fr;gap:10px;">
                        <label style="cursor:pointer;">
                            <input type="radio" wire:model.live="service" value="grooming" class="sr-only">
                            <div style="background:{{ $service === 'grooming' ? '#FFF0F5' : '#fff' }};border:2.5px solid {{ $service === 'grooming' ? '#FF6B9D' : '#FFD6E4' }};border-radius:16px;padding:16px 12px;text-align:center;cursor:pointer;transition:all 0.2s;">
                                <div style="font-size:28px;margin-bottom:6px;">✂️</div>
                                <div style="font-size:12px;font-weight:800;color:{{ $service === 'grooming' ? '#FF6B9D' : '#2D1B33' }};">Grooming</div>
                            </div>
                        </label>
                        <label style="cursor:pointer;">
                            <input type="radio" wire:model.live="service" value="vet" class="sr-only">
                            <div style="background:{{ $service === 'vet' ? '#FFF0F5' : '#fff' }};border:2.5px solid {{ $service === 'vet' ? '#FF6B9D' : '#FFD6E4' }};border-radius:16px;padding:16px 12px;text-align:center;cursor:pointer;transition:all 0.2s;">
                                <div style="font-size:28px;margin-bottom:6px;">🩺</div>
                                <div style="font-size:12px;font-weight:800;color:{{ $service === 'vet' ? '#FF6B9D' : '#2D1B33' }};">Pemeriksaan Dokter</div>
                            </div>
                        </label>
                    </div>
                    @error('service')
                        <p style="color:#FF6B9D;font-size:11px;margin-top:6px;font-weight:700;">{{ $message }}</p>
                    @enderror
                </div>

                {{-- Catatan --}}
                <div style="margin-bottom:24px;">
                    <label style="display:block;font-size:13px;font-weight:800;color:#2D1B33;margin-bottom:6px;">
                        Catatan / Keluhan <span style="font-size:11px;color:#B8A0B5;font-weight:600;">(opsional)</span>
                    </label>
                    <textarea wire:model="notes" rows="3" placeholder="Ceritakan kondisi atau keluhan hewan kamu..."
                        style="width:100%;padding:12px 16px;border:2px solid #FFD6E4;border-radius:14px;font-size:14px;color:#2D1B33;font-family:'Nunito',sans-serif;outline:none;transition:all 0.2s;background:#fff;resize:none;line-height:1.5;"></textarea>
                </div>

                {{-- Submit --}}
                <button type="submit"
                    wire:loading.attr="disabled"
                    style="width:100%;background:linear-gradient(135deg,#FF6B9D,#9B8FD4);color:#fff;border:none;border-radius:16px;padding:14px;font-size:15px;font-weight:700;font-family:'Nunito',sans-serif;cursor:pointer;display:flex;align-items:center;justify-content:center;gap:6px;transition:all 0.2s;">
                    <span wire:loading.remove wire:target="submit">🐾 Daftar Antrian</span>
                    <span wire:loading wire:target="submit">
                        <span class="dot1" style="font-size:18px;color:#fff;">●</span>
                        <span class="dot2" style="font-size:18px;color:#fff;">●</span>
                        <span class="dot3" style="font-size:18px;color:#fff;">●</span>
                    </span>
                </button>
            </form>
        </div>
    @endif
</div>
