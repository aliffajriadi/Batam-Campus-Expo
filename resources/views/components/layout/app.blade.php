<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $title ?? 'Batam Campus Expo' }}</title>

    <!-- Font -->
    <link href="https://fonts.googleapis.com/css2?family=Sancreek&display=swap" rel="stylesheet">

    <!-- Vite -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    @stack('styles')
</head>

<body>
    <div class="relative min-h-screen w-full overflow-hidden flex flex-col">

        <!-- NAVBAR - Tambahkan class navbar-animate -->
        <nav class="animate-navbar-slide opacity-0">
            @include('components.layout.navbar')
        </nav>

        {{ $slot }}

        <!-- FOOTER -->
        @include('components.layout.footer', ['nohp' => $nohp, 'lokasi' => $lokasi])

    </div>
    @stack('scripts')
</body>

</html>
