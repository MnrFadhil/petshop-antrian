<x-app-layout>
    <x-slot name="title">Dashboard Admin</x-slot>
    <div class="max-w-4xl mx-auto px-4 py-10">
        <div class="mb-6 flex items-center justify-between">
            <div>
                <h1 class="text-2xl font-bold text-gray-800">Dashboard Admin</h1>
                <p class="text-gray-500 text-sm mt-1">Kelola antrian customer petshop.</p>
            </div>
            <span class="text-sm text-gray-400">{{ now()->format('d M Y') }}</span>
        </div>
        <livewire:admin-dashboard />
    </div>
</x-app-layout>
