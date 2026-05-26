<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $title ?? 'Antrian Petshop' }}</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <script>
        tailwind.config = {
            theme: {
                extend: {
                    colors: {
                        primary: '#4f7942',
                        secondary: '#7eb369',
                    }
                }
            }
        }
    </script>
    <style>
        [x-cloak] { display: none !important; }
    </style>
    @livewireStyles
</head>
<body class="bg-gray-50 min-h-screen flex flex-col">

    <!-- Navbar -->
    <nav class="bg-white shadow-sm border-b border-gray-200">
        <div class="max-w-4xl mx-auto px-4 py-3 flex items-center justify-between">
            <a href="/" class="flex items-center gap-2 font-bold text-primary text-xl">
                <span class="text-2xl">🐾</span>
                <span>PetCare Queue</span>
            </a>
            <div class="flex gap-3">
                <a href="/" class="text-sm text-gray-600 hover:text-primary transition">Beranda</a>
                <a href="/admin" class="text-sm text-gray-600 hover:text-primary transition">Admin</a>
            </div>
        </div>
    </nav>

    <!-- Content -->
    <main class="flex-1">
        {{ $slot }}
    </main>

    <!-- Footer -->
    <footer class="bg-white border-t border-gray-200 py-4 text-center text-sm text-gray-400">
        &copy; {{ date('Y') }} PetCare Queue System
    </footer>

    @livewireScripts
</body>
</html>
