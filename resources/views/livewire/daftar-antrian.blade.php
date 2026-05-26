<div>
    @if($submitted)
        <!-- Sukses -->
        <div class="bg-white rounded-2xl shadow-sm border border-gray-200 p-8 text-center">
            @if($is_empty_queue)
                <div class="text-5xl mb-4">🎉</div>
                <h2 class="text-2xl font-bold text-green-700 mb-2">Tidak Ada Antrian!</h2>
                <p class="text-gray-600 mb-4">Saat ini antrian sedang kosong. Kamu bisa langsung datang ke lokasi untuk dilayani segera.</p>
                <div class="bg-green-50 border border-green-200 rounded-xl p-4 mb-6">
                    <p class="text-sm text-green-700">Nomor antrianmu: <strong class="text-lg">{{ $queue_number }}</strong></p>
                    <p class="text-xs text-green-600 mt-1">Email konfirmasi sudah dikirim ke email kamu.</p>
                </div>
            @else
                <div class="text-5xl mb-4">✅</div>
                <h2 class="text-2xl font-bold text-primary mb-2">Pendaftaran Berhasil!</h2>
                <p class="text-gray-600 mb-4">Nomor antrianmu sudah terdaftar. Kami akan mengirim email saat giliranmu hampir tiba.</p>
                <div class="bg-primary/10 border border-primary/30 rounded-xl p-5 mb-6">
                    <p class="text-sm text-gray-600">Nomor Antrian Kamu</p>
                    <p class="text-4xl font-bold text-primary my-2">{{ $queue_number }}</p>
                    <p class="text-xs text-gray-500">Detail sudah dikirim ke email kamu.</p>
                </div>
            @endif
            <div class="flex flex-col sm:flex-row gap-3 justify-center">
                <a href="/cek" class="bg-primary text-white px-5 py-2.5 rounded-lg text-sm font-medium hover:bg-secondary transition">
                    Cek Posisi Antrian
                </a>
                <a href="/" class="bg-gray-100 text-gray-700 px-5 py-2.5 rounded-lg text-sm font-medium hover:bg-gray-200 transition">
                    Kembali ke Beranda
                </a>
            </div>
        </div>
    @else
        <!-- Form -->
        <div class="bg-white rounded-2xl shadow-sm border border-gray-200 p-6">
            <form wire:submit="submit" class="space-y-5">

                <!-- Nama Pemilik -->
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-1">Nama Pemilik <span class="text-red-500">*</span></label>
                    <input type="text" wire:model="owner_name" placeholder="Contoh: Budi Santoso"
                        class="w-full border border-gray-300 rounded-lg px-4 py-2.5 text-sm focus:outline-none focus:ring-2 focus:ring-primary/40 focus:border-primary transition @error('owner_name') border-red-400 @enderror">
                    @error('owner_name') <p class="text-red-500 text-xs mt-1">{{ $message }}</p> @enderror
                </div>

                <!-- Email -->
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-1">Email <span class="text-red-500">*</span></label>
                    <input type="email" wire:model="email" placeholder="email@kamu.com"
                        class="w-full border border-gray-300 rounded-lg px-4 py-2.5 text-sm focus:outline-none focus:ring-2 focus:ring-primary/40 focus:border-primary transition @error('email') border-red-400 @enderror">
                    @error('email') <p class="text-red-500 text-xs mt-1">{{ $message }}</p> @enderror
                </div>

                <!-- Jenis Hewan -->
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-1">Jenis Hewan <span class="text-red-500">*</span></label>
                    <input type="text" wire:model="pet_type" placeholder="Contoh: Kucing, Anjing, Kelinci..."
                        class="w-full border border-gray-300 rounded-lg px-4 py-2.5 text-sm focus:outline-none focus:ring-2 focus:ring-primary/40 focus:border-primary transition @error('pet_type') border-red-400 @enderror">
                    @error('pet_type') <p class="text-red-500 text-xs mt-1">{{ $message }}</p> @enderror
                </div>

                <!-- Pilih Layanan -->
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-2">Pilih Layanan <span class="text-red-500">*</span></label>
                    <div class="grid grid-cols-2 gap-3">
                        <label class="cursor-pointer">
                            <input type="radio" wire:model.live="service" value="grooming" class="sr-only">
                            <div class="border-2 rounded-xl p-4 text-center transition {{ $service === 'grooming' ? 'border-primary bg-primary/5' : 'border-gray-200 hover:border-gray-300' }}">
                                <div class="text-2xl mb-1">✂️</div>
                                <div class="text-sm font-medium text-gray-700">Grooming</div>
                            </div>
                        </label>
                        <label class="cursor-pointer">
                            <input type="radio" wire:model.live="service" value="vet" class="sr-only">
                            <div class="border-2 rounded-xl p-4 text-center transition {{ $service === 'vet' ? 'border-primary bg-primary/5' : 'border-gray-200 hover:border-gray-300' }}">
                                <div class="text-2xl mb-1">🩺</div>
                                <div class="text-sm font-medium text-gray-700">Pemeriksaan Dokter</div>
                            </div>
                        </label>
                    </div>
                    @error('service') <p class="text-red-500 text-xs mt-1">{{ $message }}</p> @enderror
                </div>

                <!-- Keluhan / Catatan -->
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-1">Keluhan / Catatan <span class="text-gray-400 font-normal">(opsional)</span></label>
                    <textarea wire:model="notes" rows="3" placeholder="Ceritakan keluhan atau kondisi hewan kamu..."
                        class="w-full border border-gray-300 rounded-lg px-4 py-2.5 text-sm focus:outline-none focus:ring-2 focus:ring-primary/40 focus:border-primary transition resize-none @error('notes') border-red-400 @enderror"></textarea>
                    @error('notes') <p class="text-red-500 text-xs mt-1">{{ $message }}</p> @enderror
                </div>

                <button type="submit" wire:loading.attr="disabled" wire:loading.class="opacity-70"
                    class="w-full bg-primary text-white py-3 rounded-lg font-medium hover:bg-secondary transition flex items-center justify-center gap-2">
                    <span wire:loading.remove>Daftar Antrian</span>
                    <span wire:loading>
                        <svg class="animate-spin h-4 w-4" viewBox="0 0 24 24" fill="none">
                            <circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4"/>
                            <path class="opacity-75" fill="currentColor" d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4z"/>
                        </svg>
                        Memproses...
                    </span>
                </button>
            </form>
        </div>
    @endif
</div>
