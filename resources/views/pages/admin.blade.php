<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard Admin – PetCare</title>
    <link rel="icon" type="image/svg+xml" href="/favicon.svg">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700;800;900&display=swap" rel="stylesheet">
    <script src="https://cdn.tailwindcss.com"></script>
    <script>
        tailwind.config = {
            theme: {
                extend: {
                    colors: { primary: '#FF6B9D', secondary: '#9B8FD4' },
                    fontFamily: { sans: ['Nunito', 'sans-serif'] }
                }
            }
        }
    </script>
    <style>
        *, *::before, *::after { box-sizing: border-box; }
        body { font-family: 'Nunito', sans-serif; background: #FFF5F9; margin: 0; }
        :root {
            --primary: #FF6B9D;
            --primary-dark: #E8456E;
            --primary-light: #FFD6E4;
            --primary-pale: #FFF0F5;
        }
        @keyframes dotBlink {
            0%, 80%, 100% { opacity: 0.2; transform: scale(0.7); }
            40%            { opacity: 1;   transform: scale(1.3); }
        }
        .dot1 { animation: dotBlink 1.4s 0.00s infinite; display:inline-block; }
        .dot2 { animation: dotBlink 1.4s 0.45s infinite; display:inline-block; }
        .dot3 { animation: dotBlink 1.4s 0.90s infinite; display:inline-block; }
    </style>
    @livewireStyles
</head>
<body>
    <livewire:admin-dashboard />
    @livewireScripts
</body>
</html>
