<div style="min-height:100vh;background:linear-gradient(180deg,#FFF0F5 0%,#FFF5F9 220px);font-family:'Nunito',sans-serif;">

    {{-- ===== ADMIN NAVBAR ===== --}}
    <div style="background:#fff;border-bottom:2px solid #FFD6E4;padding:12px 24px;display:flex;align-items:center;justify-content:space-between;position:sticky;top:0;z-index:100;box-shadow:0 2px 12px rgba(0,0,0,0.06);">
        <div style="display:flex;align-items:center;gap:10px;">
            <div style="width:38px;height:38px;background:linear-gradient(135deg,#FF6B9D,#9B8FD4);border-radius:12px;display:flex;align-items:center;justify-content:center;">
                <svg width="22" height="22" viewBox="0 0 100 100">
                    <ellipse cx="50" cy="68" rx="24" ry="20" fill="#fff"/>
                    <ellipse cx="23" cy="47" rx="11" ry="9" fill="#fff"/>
                    <ellipse cx="41" cy="36" rx="11" ry="9" fill="#fff"/>
                    <ellipse cx="61" cy="36" rx="11" ry="9" fill="#fff"/>
                    <ellipse cx="79" cy="47" rx="11" ry="9" fill="#fff"/>
                </svg>
            </div>
            <div>
                <div style="font-weight:900;font-size:15px;color:#2D1B33;">PetCare Admin</div>
                <div style="font-size:11px;font-weight:700;color:#7B5E78;">Dashboard Antrian</div>
            </div>
        </div>
        <div style="display:flex;gap:8px;">
            <a href="/" style="background:transparent;border:1.5px solid #FFD6E4;color:#7B5E78;border-radius:20px;padding:6px 14px;font-size:12px;font-weight:700;text-decoration:none;display:inline-flex;align-items:center;">
                Lihat Halaman
            </a>
            <button wire:click="logout"
                style="background:#FFF0F5;border:1.5px solid #FF6B9D;color:#FF6B9D;border-radius:20px;padding:6px 14px;font-size:12px;font-weight:700;cursor:pointer;font-family:'Nunito',sans-serif;">
                Logout
            </button>
        </div>
    </div>

    <div style="max-width:920px;margin:24px auto;padding:0 20px;">

        {{-- ===== STATS ===== --}}
        <div style="display:grid;grid-template-columns:repeat(3,1fr);gap:12px;margin-bottom:20px;">
            <div style="background:#FFF8E0;border:2px solid rgba(245,158,11,0.3);border-radius:18px;padding:16px;text-align:center;">
                <div style="font-size:24px;margin-bottom:4px;">⏳</div>
                <div style="font-size:30px;font-weight:900;color:#F59E0B;">{{ $waitingList->count() }}</div>
                <div style="font-size:11px;font-weight:700;color:#7B5E78;margin-top:2px;">Menunggu</div>
            </div>
            <div style="background:#ECFDF5;border:2px solid rgba(16,185,129,0.3);border-radius:18px;padding:16px;text-align:center;">
                <div style="font-size:24px;margin-bottom:4px;">🏥</div>
                <div style="font-size:30px;font-weight:900;color:#10B981;">{{ $serving ? 1 : 0 }}</div>
                <div style="font-size:11px;font-weight:700;color:#7B5E78;margin-top:2px;">Dilayani</div>
            </div>
            <div style="background:#F5F3FF;border:2px solid rgba(139,92,246,0.3);border-radius:18px;padding:16px;text-align:center;">
                <div style="font-size:24px;margin-bottom:4px;">✅</div>
                <div style="font-size:30px;font-weight:900;color:#8B5CF6;">{{ $this->todayDoneCount }}</div>
                <div style="font-size:11px;font-weight:700;color:#7B5E78;margin-top:2px;">Selesai Hari Ini</div>
            </div>
        </div>

        {{-- ===== TABS ===== --}}
        <div style="display:flex;gap:8px;margin-bottom:20px;">
            <button wire:click="$set('tab','live')"
                style="flex:1;padding:10px 14px;font-family:'Nunito',sans-serif;font-weight:800;font-size:14px;cursor:pointer;transition:all 0.2s;border-radius:14px;{{ $tab === 'live' ? 'background:linear-gradient(135deg,#FF6B9D,#9B8FD4);color:#fff;border:none;' : 'background:#fff;color:#7B5E78;border:2px solid #FFD6E4;' }}">
                🟢 Antrian Live
            </button>
            <button wire:click="$set('tab','history')"
                style="flex:1;padding:10px 14px;font-family:'Nunito',sans-serif;font-weight:800;font-size:14px;cursor:pointer;transition:all 0.2s;border-radius:14px;{{ $tab === 'history' ? 'background:linear-gradient(135deg,#FF6B9D,#9B8FD4);color:#fff;border:none;' : 'background:#fff;color:#7B5E78;border:2px solid #FFD6E4;' }}">
                📋 Riwayat Pelanggan
            </button>
        </div>

        {{-- ===== TAB: LIVE ===== --}}
        @if($tab === 'live')
            <div style="display:grid;grid-template-columns:repeat(auto-fit,minmax(300px,1fr));gap:16px;">

                {{-- Sedang Dilayani --}}
                <div>
                    <div style="font-size:11px;font-weight:800;color:#7B5E78;letter-spacing:1.5px;text-transform:uppercase;margin-bottom:10px;">Sedang Dilayani</div>

                    @if($serving)
                        <div style="background:linear-gradient(135deg,#E8FAF6,#F0EEFF);border:2.5px solid #B5EAD7;border-radius:22px;padding:22px;">
                            <div style="display:flex;justify-content:space-between;align-items:flex-start;margin-bottom:14px;">
                                <div>
                                    <div style="font-size:36px;font-weight:900;color:#10B981;line-height:1;">{{ $serving->queue_number }}</div>
                                    <div style="font-size:17px;font-weight:800;color:#2D1B33;margin-top:4px;">{{ $serving->owner_name }}</div>
                                </div>
                                <span style="background:#FFF0F5;color:#FF6B9D;font-size:11px;font-weight:800;padding:4px 12px;border-radius:20px;">
                                    {{ $serving->service === 'grooming' ? '✂️ Grooming' : '🩺 Dokter' }}
                                </span>
                            </div>
                            <div style="font-size:13px;color:#7B5E78;margin-bottom:16px;line-height:1.8;">
                                <div>🐾 {{ $serving->pet_type }}</div>
                                @if($serving->notes)
                                    <div>📝 {{ $serving->notes }}</div>
                                @endif
                                <div style="font-size:11px;color:#B8A0B5;">📧 {{ $serving->email }}</div>
                            </div>

                            @if(!$confirmSelesai && !$confirmSkip)
                                <div style="display:flex;gap:10px;">
                                    <button wire:click="$set('confirmSelesai',true)"
                                        style="flex:1;background:linear-gradient(135deg,#10B981,#8B5CF6);color:#fff;border:none;border-radius:14px;padding:11px;font-size:13px;font-weight:700;font-family:'Nunito',sans-serif;cursor:pointer;">
                                        ✅ Selesai
                                    </button>
                                    <button wire:click="$set('confirmSkip',true)"
                                        style="flex:1;background:#FFF0F5;border:1.5px solid #FF6B9D;color:#FF6B9D;border-radius:14px;padding:11px;font-size:13px;font-weight:700;font-family:'Nunito',sans-serif;cursor:pointer;">
                                        ⏭️ Skip
                                    </button>
                                </div>
                            @endif

                            @if($confirmSelesai)
                                <div style="background:#fff;border:2px solid #B5EAD7;border-radius:14px;padding:14px;text-align:center;">
                                    <p style="font-weight:800;font-size:13px;color:#2D1B33;margin-bottom:10px;">✅ Konfirmasi selesai?</p>
                                    <div style="display:flex;gap:8px;">
                                        <button wire:click="selesai" wire:loading.attr="disabled" wire:target="selesai"
                                            style="flex:1;background:linear-gradient(135deg,#10B981,#8B5CF6);color:#fff;border:none;border-radius:12px;padding:10px;font-size:13px;font-weight:700;font-family:'Nunito',sans-serif;cursor:pointer;">
                                            <span wire:loading.remove wire:target="selesai">Ya, Selesai</span>
                                            <span wire:loading wire:target="selesai">
                                                <span class="dot1">●</span><span class="dot2">●</span><span class="dot3">●</span>
                                            </span>
                                        </button>
                                        <button wire:click="$set('confirmSelesai',false)"
                                            style="flex:1;background:#FFF0F5;color:#7B5E78;border:none;border-radius:12px;padding:10px;font-size:13px;font-weight:700;font-family:'Nunito',sans-serif;cursor:pointer;">
                                            Batal
                                        </button>
                                    </div>
                                </div>
                            @endif

                            @if($confirmSkip)
                                <div style="background:#fff;border:2px solid #FFD6E4;border-radius:14px;padding:14px;text-align:center;">
                                    <p style="font-weight:800;font-size:13px;color:#2D1B33;margin-bottom:10px;">⏭️ Skip pelanggan ini?</p>
                                    <div style="display:flex;gap:8px;">
                                        <button wire:click="skip" wire:loading.attr="disabled" wire:target="skip"
                                            style="flex:1;background:linear-gradient(135deg,#FF6B9D,#9B8FD4);color:#fff;border:none;border-radius:12px;padding:10px;font-size:13px;font-weight:700;font-family:'Nunito',sans-serif;cursor:pointer;">
                                            <span wire:loading.remove wire:target="skip">Ya, Skip</span>
                                            <span wire:loading wire:target="skip">
                                                <span class="dot1">●</span><span class="dot2">●</span><span class="dot3">●</span>
                                            </span>
                                        </button>
                                        <button wire:click="$set('confirmSkip',false)"
                                            style="flex:1;background:#FFF0F5;color:#7B5E78;border:none;border-radius:12px;padding:10px;font-size:13px;font-weight:700;font-family:'Nunito',sans-serif;cursor:pointer;">
                                            Batal
                                        </button>
                                    </div>
                                </div>
                            @endif
                        </div>

                    @else
                        <div style="background:#fff;border:2.5px dashed #FFD6E4;border-radius:22px;padding:40px 24px;text-align:center;">
                            <div style="font-size:42px;margin-bottom:10px;">😴</div>
                            <p style="font-weight:800;color:#7B5E78;margin-bottom:14px;">Tidak ada yang sedang dilayani</p>
                            @if($waitingList->count() > 0)
                                <button wire:click="mulaiLayani" wire:loading.attr="disabled" wire:target="mulaiLayani"
                                    style="background:linear-gradient(135deg,#FF6B9D,#9B8FD4);color:#fff;border:none;border-radius:20px;padding:10px 22px;font-size:14px;font-weight:700;font-family:'Nunito',sans-serif;cursor:pointer;">
                                    <span wire:loading.remove wire:target="mulaiLayani">Mulai Layani Antrian →</span>
                                    <span wire:loading wire:target="mulaiLayani">
                                        <span class="dot1">●</span><span class="dot2">●</span><span class="dot3">●</span>
                                    </span>
                                </button>
                            @else
                                <p style="font-size:13px;color:#B8A0B5;margin-top:6px;">Antrian sedang kosong 🎉</p>
                            @endif
                        </div>
                    @endif
                </div>

                {{-- Antrian Berikutnya --}}
                <div>
                    <div style="font-size:11px;font-weight:800;color:#7B5E78;letter-spacing:1.5px;text-transform:uppercase;margin-bottom:10px;">
                        Antrian Berikutnya ({{ $waitingList->count() }})
                    </div>
                    <div style="max-height:400px;overflow-y:auto;">
                        @forelse($waitingList as $index => $item)
                            <div style="background:#fff;border:2px solid #FFD6E4;border-radius:16px;padding:14px 16px;display:flex;align-items:center;gap:12px;margin-bottom:8px;">
                                <div style="width:34px;height:34px;background:linear-gradient(135deg,#FFD6E4,#D4CEFF);border-radius:50%;display:flex;align-items:center;justify-content:center;font-weight:900;font-size:14px;color:#7B5E78;flex-shrink:0;">
                                    {{ $index + 1 }}
                                </div>
                                <div style="flex:1;min-width:0;">
                                    <div style="display:flex;align-items:center;gap:6px;margin-bottom:2px;">
                                        <span style="font-weight:900;color:#FF6B9D;font-size:14px;">{{ $item->queue_number }}</span>
                                        <span style="font-size:10px;font-weight:700;background:#FFF0F5;color:#FF6B9D;padding:2px 8px;border-radius:10px;">
                                            {{ $item->service === 'grooming' ? '✂️ Grooming' : '🩺 Dokter' }}
                                        </span>
                                    </div>
                                    <div style="font-size:13px;font-weight:700;color:#2D1B33;overflow:hidden;text-overflow:ellipsis;white-space:nowrap;">{{ $item->owner_name }}</div>
                                    <div style="font-size:11px;color:#7B5E78;">🐾 {{ $item->pet_type }}</div>
                                </div>
                                <div style="font-size:11px;color:#B8A0B5;font-weight:700;">{{ $item->created_at->format('H:i') }}</div>
                            </div>
                        @empty
                            <div style="background:#fff;border:2px dashed #FFD6E4;border-radius:18px;padding:32px;text-align:center;">
                                <div style="font-size:36px;margin-bottom:8px;">🎉</div>
                                <p style="font-weight:700;color:#7B5E78;font-size:13px;">Antrian kosong!</p>
                            </div>
                        @endforelse
                    </div>
                </div>
            </div>
        @endif

        {{-- ===== TAB: HISTORY ===== --}}
        @if($tab === 'history')
            <div>
                {{-- Filters --}}
                <div style="display:flex;gap:8px;flex-wrap:wrap;align-items:center;margin-bottom:14px;">
                    <span style="font-size:12px;font-weight:800;color:#7B5E78;">Layanan:</span>
                    @foreach([['all','Semua'],['grooming','✂️ Grooming'],['vet','🩺 Dokter']] as [$val,$label])
                        <button wire:click="$set('filterService','{{ $val }}')"
                            style="padding:6px 14px;font-family:'Nunito',sans-serif;font-weight:700;font-size:12px;cursor:pointer;transition:all 0.2s;border-radius:20px;{{ $filterService === $val ? 'background:#FF6B9D;color:#fff;border:1.5px solid #FF6B9D;' : 'background:#fff;color:#7B5E78;border:1.5px solid #FFD6E4;' }}">
                            {{ $label }}
                        </button>
                    @endforeach

                    <span style="font-size:12px;font-weight:800;color:#7B5E78;margin-left:6px;">Status:</span>
                    @foreach([['all','Semua'],['waiting','Menunggu'],['serving','Dilayani'],['done','Selesai'],['skipped','Di-skip']] as [$val,$label])
                        <button wire:click="$set('filterStatus','{{ $val }}')"
                            style="padding:6px 14px;font-family:'Nunito',sans-serif;font-weight:700;font-size:12px;cursor:pointer;transition:all 0.2s;border-radius:20px;{{ $filterStatus === $val ? 'background:#9B8FD4;color:#fff;border:1.5px solid #9B8FD4;' : 'background:#fff;color:#7B5E78;border:1.5px solid #FFD6E4;' }}">
                            {{ $label }}
                        </button>
                    @endforeach
                </div>

                <div style="font-size:13px;color:#7B5E78;font-weight:700;margin-bottom:12px;">
                    Menampilkan <strong style="color:#FF6B9D;">{{ $historyQueues->count() }}</strong> dari {{ $totalQueues }} pelanggan
                </div>

                {{-- Table --}}
                <div style="background:#fff;border:2px solid #FFD6E4;border-radius:20px;overflow:hidden;box-shadow:0 4px 20px rgba(0,0,0,0.06);">
                    <div style="overflow-x:auto;">
                        <table style="border-collapse:collapse;width:100%;">
                            <thead>
                                <tr style="background:#FFF0F5;">
                                    @foreach(['No. Antrian','Nama Pemilik','Hewan','Layanan','Status','Catatan','Waktu'] as $h)
                                        <th style="padding:12px 14px;text-align:left;font-size:11px;font-weight:800;text-transform:uppercase;letter-spacing:0.8px;color:#7B5E78;white-space:nowrap;">{{ $h }}</th>
                                    @endforeach
                                </tr>
                            </thead>
                            <tbody>
                                @forelse($historyQueues as $i => $q)
                                    <tr style="border-bottom:1px solid #FFD6E4;background:{{ $i % 2 === 0 ? '#fff' : '#FFF0F5' }};">
                                        <td style="padding:11px 14px;">
                                            <strong style="color:#FF6B9D;font-size:14px;">{{ $q->queue_number }}</strong>
                                        </td>
                                        <td style="padding:11px 14px;font-weight:700;color:#2D1B33;">{{ $q->owner_name }}</td>
                                        <td style="padding:11px 14px;color:#7B5E78;font-size:13px;">{{ $q->pet_type }}</td>
                                        <td style="padding:11px 14px;font-size:13px;">{{ $q->service === 'grooming' ? '✂️ Grooming' : '🩺 Dokter' }}</td>
                                        <td style="padding:11px 14px;">
                                            @if($q->status === 'waiting')
                                                <span style="background:#FFF8E0;color:#7A5C00;font-size:11px;font-weight:800;padding:4px 10px;border-radius:20px;">Menunggu</span>
                                            @elseif($q->status === 'serving')
                                                <span style="background:#DCFCE7;color:#166534;font-size:11px;font-weight:800;padding:4px 10px;border-radius:20px;">Dilayani</span>
                                            @elseif($q->status === 'done')
                                                <span style="background:#E0E7FF;color:#3730A3;font-size:11px;font-weight:800;padding:4px 10px;border-radius:20px;">Selesai</span>
                                            @elseif($q->status === 'skipped')
                                                <span style="background:#FFE4E6;color:#9F1239;font-size:11px;font-weight:800;padding:4px 10px;border-radius:20px;">Di-skip</span>
                                            @endif
                                        </td>
                                        <td style="padding:11px 14px;color:#7B5E78;font-size:12px;">
                                            {{ $q->notes ?: '—' }}
                                        </td>
                                        <td style="padding:11px 14px;color:#7B5E78;font-weight:700;font-size:12px;white-space:nowrap;">
                                            {{ $q->created_at->format('d M, H:i') }}
                                        </td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="7" style="text-align:center;padding:32px;color:#B8A0B5;font-weight:700;">
                                            😿 Tidak ada data yang cocok
                                        </td>
                                    </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>
                </div>
                <div style="height:32px;"></div>
            </div>
        @endif

    </div>
</div>
