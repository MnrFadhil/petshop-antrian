<div>
    <div class="bg-white rounded-2xl shadow-sm border border-gray-200 p-6">
        <form wire:submit="cek" class="flex gap-3">
            <input type="text" wire:model="queue_number" placeholder="Contoh: A001"
                class="flex-1 border border-gray-300 rounded-lg px-4 py-2.5 text-sm focus:outline-none focus:ring-2 focus:ring-primary/40 focus:border-primary transition uppercase"
                style="text-transform: uppercase">
            <button type="submit" wire:loading.attr="disabled"
                class="bg-primary text-white px-5 py-2.5 rounded-lg text-sm font-medium hover:bg-secondary transition whitespace-nowrap">
                <span wire:loading.remove>Cek Antrian</span>
                <span wire:loading>Mencari...</span>
            </button>
        </form>
        @error('queue_number') <p class="text-red-500 text-xs mt-2">{{ $message }}</p> @enderror
    </div>

    @if($searched)
        <div class="mt-4">
            @if($error)
                <div class="bg-red-50 border border-red-200 rounded-xl p-5 text-center">
                    <div class="text-3xl mb-2">❌</div>
                    <p class="text-red-700 font-medium">{{ $error }}</p>
                    <p class="text-red-500 text-sm mt-1">Pastikan nomor antrian yang kamu masukkan sudah benar.</p>
                </div>
            @elseif($queue)
                <div class="bg-white rounded-2xl shadow-sm border border-gray-200 p-6">
                    <div class="flex items-center justify-between mb-4">
                        <div>
                            <p class="text-xs text-gray-400 uppercase tracking-wide">Nomor Antrian</p>
                            <p class="text-3xl font-bold text-primary">{{ $queue->queue_number }}</p>
                        </div>
                        <div class="text-right">
                            @if($queue->status === 'waiting')
                                <span class="bg-yellow-100 text-yellow-700 text-xs font-medium px-3 py-1 rounded-full">Menunggu</span>
                            @elseif($queue->status === 'serving')
                                <span class="bg-green-100 text-green-700 text-xs font-medium px-3 py-1 rounded-full">Sedang Dilayani</span>
                            @elseif($queue->status === 'done')
                                <span class="bg-gray-100 text-gray-600 text-xs font-medium px-3 py-1 rounded-full">Selesai</span>
                            @elseif($queue->status === 'skipped')
                                <span class="bg-red-100 text-red-600 text-xs font-medium px-3 py-1 rounded-full">Di-skip</span>
                            @endif
                        </div>
                    </div>

                    <div class="grid grid-cols-2 gap-4 text-sm mb-4">
                        <div>
                            <p class="text-gray-400 text-xs">Nama Pemilik</p>
                            <p class="font-medium text-gray-800">{{ $queue->owner_name }}</p>
                        </div>
                        <div>
                            <p class="text-gray-400 text-xs">Jenis Hewan</p>
                            <p class="font-medium text-gray-800">{{ $queue->pet_type }}</p>
                        </div>
                        <div>
                            <p class="text-gray-400 text-xs">Layanan</p>
                            <p class="font-medium text-gray-800">{{ $queue->service_label }}</p>
                        </div>
                        <div>
                            <p class="text-gray-400 text-xs">Daftar Sejak</p>
                            <p class="font-medium text-gray-800">{{ $queue->created_at->format('H:i') }}</p>
                        </div>
                    </div>

                    @if($queue->status === 'waiting')
                        <div class="border-t border-gray-100 pt-4">
                            <div class="flex items-center justify-between">
                                <div>
                                    <p class="text-xs text-gray-400">Posisi dalam antrian</p>
                                    <p class="text-2xl font-bold text-gray-800">
                                        #{{ $this->position }}
                                    </p>
                                </div>
                                @if($this->servingNow)
                                    <div class="text-right">
                                        <p class="text-xs text-gray-400">Sedang dilayani</p>
                                        <p class="font-semibold text-green-600">{{ $this->servingNow->queue_number }}</p>
                                    </div>
                                @endif
                            </div>
                            @if($this->position <= 2)
                                <div class="mt-3 bg-orange-50 border border-orange-200 rounded-lg px-4 py-2.5 text-sm text-orange-700">
                                    ⚡ Giliranmu hampir tiba! Segera menuju lokasi.
                                </div>
                            @endif
                        </div>
                    @elseif($queue->status === 'serving')
                        <div class="bg-green-50 border border-green-200 rounded-lg px-4 py-2.5 text-sm text-green-700">
                            🎉 Giliranmu sekarang! Silakan masuk ke ruangan.
                        </div>
                    @endif
                </div>
            @endif
        </div>
    @endif
</div>
