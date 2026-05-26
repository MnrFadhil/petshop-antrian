<x-app-layout>
    <x-slot name="title">Antrian Petshop & Petcare</x-slot>

    <!-- Hero -->
    <div class="bg-gradient-to-br from-primary to-secondary text-white py-16 px-4">
        <div class="max-w-3xl mx-auto text-center">
            <div class="text-6xl mb-4">🐾</div>
            <h1 class="text-4xl font-bold mb-3">Antrian Online Petshop</h1>
            <p class="text-lg opacity-90">Daftar antrian dari rumah, kami kabari saat giliranmu tiba.</p>
        </div>
    </div>

    <!-- Main Actions -->
    <div class="max-w-3xl mx-auto px-4 py-12">
        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">

            <!-- Daftar Antrian -->
            <a href="/daftar" class="group bg-white rounded-2xl shadow-sm border border-gray-200 p-8 flex flex-col items-center text-center hover:shadow-md hover:border-primary transition-all">
                <div class="text-5xl mb-4">📋</div>
                <h2 class="text-xl font-bold text-gray-800 group-hover:text-primary transition mb-2">Daftar Antrian</h2>
                <p class="text-gray-500 text-sm">Isi form pendaftaran dan dapatkan nomor antrian via email. Gratis & tanpa login.</p>
                <span class="mt-5 inline-block bg-primary text-white text-sm font-medium px-5 py-2 rounded-full group-hover:bg-secondary transition">
                    Daftar Sekarang →
                </span>
            </a>

            <!-- Cek Antrian -->
            <a href="/cek" class="group bg-white rounded-2xl shadow-sm border border-gray-200 p-8 flex flex-col items-center text-center hover:shadow-md hover:border-secondary transition-all">
                <div class="text-5xl mb-4">🔍</div>
                <h2 class="text-xl font-bold text-gray-800 group-hover:text-secondary transition mb-2">Cek Antrian</h2>
                <p class="text-gray-500 text-sm">Sudah punya nomor antrian? Cek posisimu sekarang kapan saja dan dari mana saja.</p>
                <span class="mt-5 inline-block bg-secondary text-white text-sm font-medium px-5 py-2 rounded-full group-hover:bg-primary transition">
                    Cek Posisi →
                </span>
            </a>
        </div>

        <!-- Layanan -->
        <div class="mt-12">
            <h2 class="text-center text-xl font-bold text-gray-700 mb-6">Layanan Tersedia</h2>
            <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                <div class="bg-white rounded-xl border border-gray-200 p-5 flex items-start gap-4">
                    <div class="text-3xl">✂️</div>
                    <div>
                        <h3 class="font-bold text-gray-800">Grooming</h3>
                        <p class="text-sm text-gray-500 mt-1">Mandi, potong rambut, perawatan kuku, dan kebersihan hewan peliharaanmu.</p>
                    </div>
                </div>
                <div class="bg-white rounded-xl border border-gray-200 p-5 flex items-start gap-4">
                    <div class="text-3xl">🩺</div>
                    <div>
                        <h3 class="font-bold text-gray-800">Pemeriksaan Dokter</h3>
                        <p class="text-sm text-gray-500 mt-1">Konsultasi dan pemeriksaan kesehatan oleh dokter hewan berpengalaman.</p>
                    </div>
                </div>
            </div>
        </div>

        <!-- Info -->
        <div class="mt-8 bg-amber-50 border border-amber-200 rounded-xl p-5 text-sm text-amber-800">
            <strong>Cara Kerja:</strong> Daftar → Terima email nomor antrian → Tunggu notifikasi → Datang ke lokasi saat dipanggil. Mudah!
        </div>
    </div>
</x-app-layout>
