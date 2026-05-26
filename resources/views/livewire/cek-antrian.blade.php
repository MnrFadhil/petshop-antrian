<div>
    {{-- Search box --}}
    <div style="background:#fff;border:2px solid #FFD6E4;border-radius:20px;padding:20px;box-shadow:0 4px 20px rgba(0,0,0,0.06);margin-bottom:16px;">
        <form wire:submit.prevent="cek" style="display:flex;gap:10px;">
            <input type="text" wire:model="queue_number" placeholder="Contoh: A001"
                style="flex:1;padding:12px 16px;border:2px solid #FFD6E4;border-radius:14px;font-size:18px;font-weight:900;font-family:'Nunito',monospace;letter-spacing:3px;color:#FF6B9D;text-transform:uppercase;outline:none;background:#fff;">
            <button type="submit" wire:loading.attr="disabled"
                style="background:linear-gradient(135deg,#2EC4A7,#9B8FD4);color:#fff;border:none;border-radius:14px;padding:12px 20px;font-size:14px;font-weight:700;font-family:'Nunito',sans-serif;cursor:pointer;white-space:nowrap;flex-shrink:0;">
                <span wire:loading.remove wire:target="cek">Cek →</span>
                <span wire:loading wire:target="cek">Mencari...</span>
            </button>
        </form>
        @error('queue_number')
            <p style="color:#FF6B9D;font-size:11px;margin-top:6px;font-weight:700;">{{ $message }}</p>
        @enderror
    </div>

    @if($searched)
        <div>
            @if($error)
                {{-- Not found --}}
                <div style="background:#FFF0F5;border:2px solid #FFD6E4;border-radius:20px;padding:32px;text-align:center;">
                    <div style="font-size:48px;margin-bottom:12px;">😿</div>
                    <p style="font-weight:800;font-size:16px;color:#E8456E;margin-bottom:6px;">Nomor antrian tidak ditemukan</p>
                    <p style="font-size:13px;color:#7B5E78;">Pastikan nomor yang dimasukkan sudah benar.</p>
                </div>

            @elseif($queue)
                {{-- Result card --}}
                <div style="background:#fff;border:2px solid #FFD6E4;border-radius:20px;padding:24px;box-shadow:0 4px 20px rgba(0,0,0,0.06);">
                    {{-- Header --}}
                    <div style="display:flex;align-items:center;justify-content:space-between;margin-bottom:18px;">
                        <div>
                            <div style="font-size:11px;font-weight:800;color:#B8A0B5;letter-spacing:1.5px;text-transform:uppercase;">Nomor Antrian</div>
                            <div style="font-size:40px;font-weight:900;color:#FF6B9D;line-height:1.1;">{{ $queue->queue_number }}</div>
                        </div>
                        {{-- Status badge --}}
                        @if($queue->status === 'waiting')
                            <span style="background:#FFF8E0;color:#7A5C00;font-size:11px;font-weight:800;padding:4px 12px;border-radius:20px;white-space:nowrap;">⏳ Menunggu</span>
                        @elseif($queue->status === 'serving')
                            <span style="background:#DCFCE7;color:#166534;font-size:11px;font-weight:800;padding:4px 12px;border-radius:20px;white-space:nowrap;">🟢 Sedang Dilayani</span>
                        @elseif($queue->status === 'done')
                            <span style="background:#E0E7FF;color:#3730A3;font-size:11px;font-weight:800;padding:4px 12px;border-radius:20px;white-space:nowrap;">✅ Selesai</span>
                        @elseif($queue->status === 'skipped')
                            <span style="background:#FFE4E6;color:#9F1239;font-size:11px;font-weight:800;padding:4px 12px;border-radius:20px;white-space:nowrap;">❌ Di-skip</span>
                        @endif
                    </div>

                    {{-- Info grid --}}
                    <div style="display:grid;grid-template-columns:1fr 1fr;gap:10px;margin-bottom:14px;">
                        <div style="background:#FFF0F5;border-radius:12px;padding:10px 14px;">
                            <div style="font-size:10px;font-weight:800;color:#B8A0B5;text-transform:uppercase;letter-spacing:1px;margin-bottom:2px;">Nama Pemilik</div>
                            <div style="font-size:13px;font-weight:700;color:#2D1B33;">{{ $queue->owner_name }}</div>
                        </div>
                        <div style="background:#FFF0F5;border-radius:12px;padding:10px 14px;">
                            <div style="font-size:10px;font-weight:800;color:#B8A0B5;text-transform:uppercase;letter-spacing:1px;margin-bottom:2px;">Jenis Hewan</div>
                            <div style="font-size:13px;font-weight:700;color:#2D1B33;">{{ $queue->pet_type }}</div>
                        </div>
                        <div style="background:#FFF0F5;border-radius:12px;padding:10px 14px;">
                            <div style="font-size:10px;font-weight:800;color:#B8A0B5;text-transform:uppercase;letter-spacing:1px;margin-bottom:2px;">Layanan</div>
                            <div style="font-size:13px;font-weight:700;color:#2D1B33;">{{ $queue->service_label }}</div>
                        </div>
                        <div style="background:#FFF0F5;border-radius:12px;padding:10px 14px;">
                            <div style="font-size:10px;font-weight:800;color:#B8A0B5;text-transform:uppercase;letter-spacing:1px;margin-bottom:2px;">Daftar Pukul</div>
                            <div style="font-size:13px;font-weight:700;color:#2D1B33;">{{ $queue->created_at->format('H:i') }}</div>
                        </div>
                    </div>

                    {{-- Status message --}}
                    @if($queue->status === 'waiting')
                        <div style="background:#FFF8E0;border-radius:14px;padding:14px 16px;display:flex;align-items:flex-start;gap:10px;margin-bottom:12px;">
                            <span style="font-size:20px;">⏳</span>
                            <p style="font-size:13px;font-weight:700;color:#2D1B33;line-height:1.5;margin:0;">Sabar ya, giliranmu akan segera tiba!</p>
                        </div>
                        {{-- Position --}}
                        <div style="background:#F0EEFF;border:2px solid #D4CEFF;border-radius:14px;padding:14px 18px;display:flex;justify-content:space-between;align-items:center;">
                            <div>
                                <div style="font-size:11px;font-weight:800;color:#B8A0B5;text-transform:uppercase;letter-spacing:1px;">Posisi Antrian</div>
                                <div style="font-size:30px;font-weight:900;color:#9B8FD4;">#{{ $this->position }}</div>
                            </div>
                            @if($this->servingNow)
                                <div style="text-align:right;">
                                    <div style="font-size:11px;font-weight:800;color:#B8A0B5;text-transform:uppercase;letter-spacing:1px;">Sedang Dilayani</div>
                                    <div style="font-size:18px;font-weight:800;color:#2EC4A7;">{{ $this->servingNow->queue_number }}</div>
                                </div>
                            @endif
                        </div>
                        @if($this->position <= 2)
                            <div style="margin-top:10px;background:#FFF0F5;border:2px solid #FFD6E4;border-radius:12px;padding:12px 16px;font-size:13px;color:#E8456E;font-weight:700;">
                                ⚡ Giliranmu hampir tiba! Segera menuju lokasi.
                            </div>
                        @endif

                    @elseif($queue->status === 'serving')
                        <div style="background:#E8FAF6;border-radius:14px;padding:14px 16px;display:flex;align-items:flex-start;gap:10px;">
                            <span style="font-size:20px;">🎉</span>
                            <p style="font-size:13px;font-weight:700;color:#166534;line-height:1.5;margin:0;">Giliranmu sekarang! Silakan masuk ke ruangan.</p>
                        </div>

                    @elseif($queue->status === 'done')
                        <div style="background:#E0E7FF;border-radius:14px;padding:14px 16px;display:flex;align-items:flex-start;gap:10px;">
                            <span style="font-size:20px;">✅</span>
                            <p style="font-size:13px;font-weight:700;color:#3730A3;line-height:1.5;margin:0;">Layanan sudah selesai. Terima kasih sudah datang!</p>
                        </div>

                    @elseif($queue->status === 'skipped')
                        <div style="background:#FFE4E6;border-radius:14px;padding:14px 16px;display:flex;align-items:flex-start;gap:10px;">
                            <span style="font-size:20px;">😔</span>
                            <p style="font-size:13px;font-weight:700;color:#9F1239;line-height:1.5;margin:0;">Antrianmu di-skip. Silakan <a href="/daftar" style="color:#FF6B9D;">daftar ulang</a> jika perlu.</p>
                        </div>
                    @endif

                    @if($queue->notes)
                        <div style="margin-top:12px;background:#FFF8E0;border-radius:12px;padding:10px 14px;">
                            <span style="font-size:11px;font-weight:800;color:#7A5C00;text-transform:uppercase;">Catatan: </span>
                            <span style="font-size:13px;color:#7A5C00;font-weight:600;">{{ $queue->notes }}</span>
                        </div>
                    @endif
                </div>
            @endif
        </div>
    @endif
</div>
