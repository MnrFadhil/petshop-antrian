<div>
    <!-- Stats Bar -->
    <div class="grid grid-cols-3 gap-4 mb-6">
        <div class="bg-white rounded-xl border border-gray-200 p-4 text-center">
            <p class="text-2xl font-bold text-primary">{{ $waitingList->count() }}</p>
            <p class="text-xs text-gray-400 mt-1">Menunggu</p>
        </div>
        <div class="bg-white rounded-xl border border-gray-200 p-4 text-center">
            <p class="text-2xl font-bold text-green-600">{{ $serving ? 1 : 0 }}</p>
            <p class="text-xs text-gray-400 mt-1">Dilayani</p>
        </div>
        <div class="bg-white rounded-xl border border-gray-200 p-4 text-center">
            <p class="text-2xl font-bold text-gray-600">{{ $this->todayDoneCount }}</p>
            <p class="text-xs text-gray-400 mt-1">Selesai Hari Ini</p>
        </div>
    </div>

    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">

        <!-- Sedang Dilayani -->
        <div>
            <h2 class="text-sm font-semibold text-gray-500 uppercase tracking-wide mb-3">Sedang Dilayani</h2>
            @if($serving)
                <div class="bg-green-50 border-2 border-green-300 rounded-2xl p-5">
                    <div class="flex justify-between items-start mb-3">
                        <div>
                            <p class="text-3xl font-bold text-green-700">{{ $serving->queue_number }}</p>
                            <p class="text-lg font-semibold text-gray-800 mt-1">{{ $serving->owner_name }}</p>
                        </div>
                        <span class="bg-green-200 text-green-800 text-xs font-medium px-3 py-1 rounded-full">
                            {{ $serving->service === 'grooming' ? '✂️ Grooming' : '🩺 Dokter' }}
                        </span>
                    </div>
                    <div class="text-sm text-gray-600 space-y-1 mb-4">
                        <p>🐾 {{ $serving->pet_type }}</p>
                        @if($serving->notes)
                            <p>📝 {{ $serving->notes }}</p>
                        @endif
                        <p class="text-xs text-gray-400">📧 {{ $serving->email }}</p>
                    </div>
                    <div class="flex gap-3">
                        @if(!$confirmSelesai && !$confirmSkip)
                            <button wire:click="$set('confirmSelesai', true)"
                                class="flex-1 bg-green-600 text-white py-2.5 rounded-lg font-medium hover:bg-green-700 transition text-sm">
                                ✅ Selesai
                            </button>
                            <button wire:click="$set('confirmSkip', true)"
                                class="flex-1 bg-gray-200 text-gray-700 py-2.5 rounded-lg font-medium hover:bg-gray-300 transition text-sm">
                                ⏭️ Skip
                            </button>
                        @endif

                        @if($confirmSelesai)
                            <div class="flex-1 bg-white border border-green-300 rounded-lg p-3 text-center">
                                <p class="text-sm font-medium text-gray-700 mb-2">Konfirmasi selesai?</p>
                                <div class="flex gap-2">
                                    <button wire:click="selesai" wire:loading.attr="disabled" wire:target="selesai"
                                        class="flex-1 bg-green-600 text-white py-1.5 rounded text-sm font-medium disabled:opacity-60 flex items-center justify-center gap-1">
                                        <span wire:loading.remove wire:target="selesai">Ya, Selesai</span>
                                        <span wire:loading wire:target="selesai" class="flex items-center gap-1">
                                            <svg class="animate-spin h-3.5 w-3.5" viewBox="0 0 24 24" fill="none">
                                                <circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4"/>
                                                <path class="opacity-75" fill="currentColor" d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4z"/>
                                            </svg>
                                            Memproses...
                                        </span>
                                    </button>
                                    <button wire:click="$set('confirmSelesai', false)" wire:loading.attr="disabled" wire:target="selesai"
                                        class="flex-1 bg-gray-100 text-gray-600 py-1.5 rounded text-sm disabled:opacity-60">Batal</button>
                                </div>
                            </div>
                        @endif

                        @if($confirmSkip)
                            <div class="flex-1 bg-white border border-orange-300 rounded-lg p-3 text-center">
                                <p class="text-sm font-medium text-gray-700 mb-2">Skip customer ini?</p>
                                <div class="flex gap-2">
                                    <button wire:click="skip" wire:loading.attr="disabled" wire:target="skip"
                                        class="flex-1 bg-orange-500 text-white py-1.5 rounded text-sm font-medium disabled:opacity-60 flex items-center justify-center gap-1">
                                        <span wire:loading.remove wire:target="skip">Ya, Skip</span>
                                        <span wire:loading wire:target="skip" class="flex items-center gap-1">
                                            <svg class="animate-spin h-3.5 w-3.5" viewBox="0 0 24 24" fill="none">
                                                <circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4"/>
                                                <path class="opacity-75" fill="currentColor" d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4z"/>
                                            </svg>
                                            Memproses...
                                        </span>
                                    </button>
                                    <button wire:click="$set('confirmSkip', false)" wire:loading.attr="disabled" wire:target="skip"
                                        class="flex-1 bg-gray-100 text-gray-600 py-1.5 rounded text-sm disabled:opacity-60">Batal</button>
                                </div>
                            </div>
                        @endif
                    </div>
                </div>
            @else
                <div class="bg-white border-2 border-dashed border-gray-200 rounded-2xl p-8 text-center">
                    <div class="text-4xl mb-3">😴</div>
                    <p class="text-gray-500 font-medium">Tidak ada yang dilayani</p>
                    @if($waitingList->count() > 0)
                        <button wire:click="mulaiLayani"
                            class="mt-4 bg-primary text-white px-5 py-2 rounded-lg text-sm font-medium hover:bg-secondary transition">
                            Mulai Layani Antrian
                        </button>
                    @else
                        <p class="text-gray-400 text-sm mt-1">Antrian kosong</p>
                    @endif
                </div>
            @endif
        </div>

        <!-- Daftar Antrian Berikutnya -->
        <div>
            <h2 class="text-sm font-semibold text-gray-500 uppercase tracking-wide mb-3">
                Antrian Berikutnya ({{ $waitingList->count() }})
            </h2>
            <div class="space-y-2 max-h-96 overflow-y-auto">
                @forelse($waitingList as $index => $item)
                    <div class="bg-white rounded-xl border border-gray-200 p-4 flex items-center gap-3">
                        <div class="w-8 h-8 bg-gray-100 rounded-full flex items-center justify-center text-sm font-bold text-gray-500">
                            {{ $index + 1 }}
                        </div>
                        <div class="flex-1 min-w-0">
                            <div class="flex items-center gap-2">
                                <span class="font-bold text-primary text-sm">{{ $item->queue_number }}</span>
                                <span class="text-xs bg-gray-100 text-gray-600 px-2 py-0.5 rounded">
                                    {{ $item->service === 'grooming' ? 'Grooming' : 'Dokter' }}
                                </span>
                            </div>
                            <p class="text-sm text-gray-700 truncate">{{ $item->owner_name }}</p>
                            <p class="text-xs text-gray-400">🐾 {{ $item->pet_type }}</p>
                        </div>
                        <div class="text-xs text-gray-400">
                            {{ $item->created_at->format('H:i') }}
                        </div>
                    </div>
                @empty
                    <div class="bg-white rounded-xl border border-dashed border-gray-200 p-6 text-center text-gray-400">
                        <p class="text-sm">Tidak ada antrian yang menunggu</p>
                    </div>
                @endforelse
            </div>
        </div>
    </div>

    <!-- Auto refresh -->
    <div class="mt-4 text-center">
        <p class="text-xs text-gray-300">Dashboard otomatis terupdate</p>
    </div>
</div>
